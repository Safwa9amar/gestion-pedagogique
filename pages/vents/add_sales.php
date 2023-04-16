<?php
include 'includes/config.php';
// getAllRows from clients table
$clients = getAllRows('clients');
$products = getAllRows('products');
$achat_ref = generateReference('achats', 'Reference');
?>
<div class="content">
  <div class="page-header">
    <div class="page-title">
      <h4>Purchase Add</h4>
      <h6>Add/Update Purchase</h6>
      <div class="col-12">
        <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-scanner-set"><img
            src="assets/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a>
      </div>
      <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="qr-reader" style="
                width: 100%;
                height: 100%;
                max-width: 500px;
                max-height: 500px;
                margin: 0 auto;
              "></div>
              <div id="qr-reader-results"></div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
          <label>Nom du client</label>
          <div class="row">
            <div class="col-lg-10 col-sm-10 col-10">
              <select class="form-control" name="client" id="selectedClient">
                <?php
                foreach ($clients as $client) {
                  echo "<option value='" . $client['id'] . "'> " . $client['name'] . " </option>";
                }
                ?>
              </select>
            </div>
            <div class="col-lg-2 col-sm-2 col-2 ps-0">
              <div class="add-icon">
                <a href="?page=clients&sub_page=add_clients"><img src="assets/img/icons/plus1.svg" alt="img"></a>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
          <label>Purchase Date </label>
          <input value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" />
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
          <label>Reference No.</label>
          <input readonly value="<?php echo $achat_ref ?>" type="text" />
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
          <label>Status</label>
          <select name="status" class="form-control">
            <option>Choose Status</option>
            <option value="1">Complété</option>
            <option value='0'> En cours</option>
          </select>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
          <label>Product Name</label>
          <div class="input-groupicon">
            <input autofocus list="datalistOptions" id="search_product" type="text"
              placeholder="Scan/Search Product by code and select..." />
            <div class="addonset">
              <img src="assets/img/icons/scanners.svg" alt="img" />
            </div>
            <datalist id="datalistOptions">
              <?php
              foreach ($products as $product) {
                echo "<option value='" . $product['id'] . "'> " . $product['name'] . " </option>";
              }

              ?>
            </datalist>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>QTY</th>
              <th>Purchase Price(
                <?php echo $currency ?>)
              </th>
              <th class="text-end">Total Cost (
                <?php echo $currency ?>)
              </th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr id="tr_placehoder">
              <td colspan="4">Vous n'avez ajouté aucune donnée</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 float-md-right">
        <div class="total-order">
          <ul>
            <li class="total">
              <h4>Grand Total</h4>
              <h5 id="grand_total">0.00
                <?php echo $currency ?>
              </h5>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <button onclick="addPurchase();" class="btn btn-submit me-2">Submit</button>
        <a href="?page=achats&sub_page=list_achats" class="btn btn-cancel">Cancel</a>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  function docReady(fn) {
    // see if DOM is already available
    if (
      document.readyState === "complete" ||
      document.readyState === "interactive"
    ) {
      // call on next available tick
      setTimeout(fn, 1);
    } else {
      document.addEventListener("DOMContentLoaded", fn);
    }
  }

  docReady(function () {
    var resultContainer = document.getElementById("qr-reader-results");
    var lastResult,
      countResults = 0;
    function onScanSuccess(decodedText, decodedResult) {
      if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        // Handle on success condition with the decoded message.
        console.log(`Scan result ${decodedText}`, decodedResult);
        url = "api/?route=products&search=" + decodedText;
        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            Object.keys(data).forEach(function (key) {
              data = data[key];
              var tr = document.createElement("tr");
              tr.id = data.id;
              // set the innerHTML of the tr element
              tr.innerHTML = `
                            <td id='${data.id}'>
                                <a class="product-img">
                                    <img src="<?php echo $product_upload_dir ?>${data.img}" alt="product">
                                </a>
                                ${data.name}
                            </td>
                            <td>
                                <input 
                                type="number"
                                value="0"
                                class="form-control"
                                min="1" max="250"
                                style="width: 100px;"
                                oninput="calculTotalCost(this.value, ${data.price}, ${data.id})"
                                />
                            </td>
                            <td>
                                ${data.price}
                            </td>
                            <td class="text-end" id='total_cost_${data.id}' >
                                0
                            </td>
                            <td class="text-end">
                                <button 
                                onclick="
                                 (function() {
                                     // get the total cost of the deleted row and substract it from the grand total
                                     var grand_total = parseFloat(document.getElementById('grand_total').textContent);
                                     var total_cost = parseFloat(document.getElementById('total_cost_${data.id}').textContent);
                                     document.getElementById('grand_total').textContent = grand_total - total_cost;
                                     document.querySelector('.table tbody').removeChild(document.getElementById('${data.id}'));

                                })()
                                ;"
                                class="btn btn-delete">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </button>
                            </td>
                        `;
              // check if tr already exist
              var trs = document.querySelectorAll(".table tbody tr");
              var exist = false;
              trs.forEach(function (tr) {
                if (tr.id == data.id) {
                  exist = true;
                }
              });
              if (!exist) {
                // append the tr element to the tbody
                document.querySelector(".table tbody").appendChild(tr);
              }
            });
          });
      }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", {
      fps: 10,
      qrbox: 300,
    });
    html5QrcodeScanner.render(onScanSuccess);
  });

</script>

<script>
  function addPurchase() {
    var data = getDataFromTable(document.querySelector(".table tbody")).filter(function (row) {
      return row.qty != "" && row.product_id != "";
    });
    // get selected supplier
    var supplier = document.querySelector("#selectedClient").value;
    // get purchase date
    var purchase_date = document.querySelector("input[type='date']").value;
    // get purchase status
    var status = document.querySelector("select").value;

    var ref = '<?php echo $achat_ref ?>'
    // create formData object
    var formData = new FormData();
    formData.append("supplier", supplier);
    formData.append("purchase_date", purchase_date);
    formData.append("status", status);
    formData.append("data", JSON.stringify(data));
    formData.append("ref", ref);
    // apend grand total
    formData.append("grand_total", document.getElementById("grand_total").innerText);
    if (data.length === 0) return
    fetch("api/achats.php?add", {
      method: "POST",
      body: formData
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      if (data.status == "success") {
        window.location.href = "?page=ventes&sub_page=list_sales";
      } else {
        alert(data.message);
      }
    });
  }

  // tr_placehoder
  var tr_placehoder = document.getElementById("tr_placehoder");

  // calculTotalCost function

  function calculTotalCost(qty, purchase_price, id) {
    var total_cost = qty * purchase_price;
    document.getElementById(`total_cost_${id}`).textContent = total_cost;
    // console.log(getDataFromTable(document.querySelector(".table tbody")));
    // grand_total
    var grand_total = 0;
    var rows = document.querySelectorAll(".table tbody tr");
    rows.forEach(function (row) {
      var cols = row.querySelectorAll("td");
      cols.forEach(function (col, index) {
        if (index == 3) {
          grand_total += parseFloat(col.textContent);
        }
      });
    });
    document.getElementById("grand_total").textContent = grand_total;

  }

  function getDataFromTable(table) {
    var data = [];
    var rows = table.querySelectorAll("tr");
    rows.forEach(function (row) {
      var cols = row.querySelectorAll("td");
      var obj = {};
      cols.forEach(function (col, index) {
        if (index == 0) {
          obj["product_id"] = col.id;
        }
        if (index == 1) {
          obj["qty"] = col.querySelector("td input").value;
        }
        if (index == 2) {
          obj["purchase_price"] = cols[2].innerText;
        }
        if (index == 3) {
          obj["total_cost"] = cols[3].innerText;
        }
      });
      data.push(obj);
    });
    return data;
  }

  // fetch api for product search
  document.getElementById("search_product").onkeydown = function () {
    let url = "<?php echo $api . 'products' ?>";
    var search = this.value;
    var outer = document.getElementById("datalistOptions");
    // clear the list
    if (search.length > 0) {
      tr_placehoder.style.display = "none";
      fetch(url + "&search=" + search)
        .then((response) => response.json())
        .then((data) => {
          console.log(data);
          var html = "";
          data.forEach(function (item) {
            html += `<option value="${item.id}"> ${item.name} ${item.SKU} </option> `;
          });
          outer.innerHTML = html;
          this.onchange = function () {
            data = data.filter((item) => item.id == this.value)[0];
            // create a new tr element
            var tr = document.createElement("tr");
            tr.id = data.id;
            // set the innerHTML of the tr element
            tr.innerHTML = `
                            <td id='${data.id}'>
                                <a class="product-img">
                                    <img src="<?php echo $product_upload_dir ?>${data.img}" alt="product">
                                </a>
                                ${data.name}
                            </td>
                            <td>
                                <input
                                type="number"
                                value="0"
                                class="form-control"
                                min="1" max="250"
                                style="width: 100px;"
                                oninput="calculTotalCost(this.value, ${data.price}, ${data.id})"
                                />
                            </td>
                            <td>
                                ${data.price}
                            </td>
                            <td class="text-end" id='total_cost_${data.id}' >
                                0
                            </td>
                            <td class="text-end">
                                <button
                                onclick="
                                 (function() {
                                     // get the total cost of the deleted row and substract it from the grand total
                                     var grand_total = parseFloat(document.getElementById('grand_total').textContent);
                                     var total_cost = parseFloat(document.getElementById('total_cost_${data.id}').textContent);
                                     document.getElementById('grand_total').textContent = grand_total - total_cost;
                                     document.querySelector('.table tbody').removeChild(document.getElementById('${data.id}'));

                                })()
                                ;"
                                class="btn btn-delete">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </button>
                            </td>
                        `;
            // check if tr already exist
            var trs = document.querySelectorAll(".table tbody tr");
            var exist = false;
            trs.forEach(function (tr) {
              if (tr.id == data.id) {
                exist = true;
              }
            });
            if (!exist) {
              // append the tr element to the tbody
              document.querySelector(".table tbody").appendChild(tr);
            }
          };
        });
      //   outer.innerHTML = "";
    }
  };
  //   // get purchase data

</script>