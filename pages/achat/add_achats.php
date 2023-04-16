<?php
include 'includes/config.php';
// getAllRows from fournisseurs table
$fournisseurs = getAllRows('fournisseurs');
$achat_ref = generateReference('achats', 'Reference');
?>
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Purchase Add</h4>
            <h6>Add/Update Purchase</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Fournisseur</label>
                        <div class="col-lg-10 col-sm-10 col-10">
                            <input class="form-control" list="suppliers" type="text" />
                            <datalist id="suppliers">
                                <?php
                                foreach ($fournisseurs as $fournisseur) {
                                    echo "<option value='" . $fournisseur['id'] . "'> " . $fournisseur['name'] . " </option>";
                                }
                                ?>
                            </datalist>
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
                        <select class="form-control">
                            <option>Choose Status</option>
                            <option>Complété</option>
                            <option>En cours</option>
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
                            <datalist id="datalistOptions"> </datalist>
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
<!-- Jquery -->
<script>
    function addPurchase() {
        var data = getDataFromTable(document.querySelector(".table tbody")).filter(function (row) {
            return row.qty != "" && row.product_id != "";
        });
        // get selected supplier
        var supplier = document.querySelector("input[list='suppliers']").value;
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
                window.location.href = "?page=achats&sub_page=list_achats";
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
    // get purchase data

</script>