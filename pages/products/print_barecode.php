<?php
include 'includes/config.php';
$products = getAllProducts();
?>

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Print Barcode</h4>
            <h6>Print product barcodes
                (
                <kbd>Ctrl</kbd> + <kbd>Alt</kbd> + <kbd>P</kbd>
                )
            </h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label> Nom du produit </label>
                <div class="row">

                    <div class="col-lg-10 col-sm-10 col-10">
                        <input autofocus list="datalistOptions" id="search_product" type="text"
                            placeholder="Scan/Search Product by code and select..." />

                        <datalist id="datalistOptions">
                            <?php
                            foreach ($products as $product) {
                                echo "<option value='{$product['SKU']}'>{$product['name']}</option>";
                            }

                            ?>
                        </datalist>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                        <div id="addProduct" class="add-icon">
                            <a href="javascript:void(0);"><img src="assets/img/icons/plus1.svg" alt="img"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-height">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Qty</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <a id="submitBareCode" href="javascript:void(0);" class="btn btn-submit me-2">
                        imprimer
                    </a>
                    <a href="?page=produits&sub_page=list_product" class="btn btn-cancel">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const search_product = document.getElementById('search_product');
        // addProduct
        const addProduct = document.getElementById('addProduct');
        // addProduct.addEventListener('click', addProductFunction())
        const table = document.querySelector('table tbody');
        // submitBareCode
        const submitBareCode = document.getElementById('submitBareCode');

        // tr data 
        let product = {};

        let addTableRow = function (product, table) {
            // add tr to table
            if (product.name == undefined ) return
            const html = `
                        <tr>
                            <td class='name'>${product.name}</td>
                            <td class='sku'>${product.SKU}</td>
                            <td class='price'>${product.qty}</td>
                            <td class="text-end">
                                <a
                                // remove tr on click
                                    onclick="this.parentNode.parentNode.remove()"
                                    href="javascript:void(0);"
                                class="delete-me"><img src="assets/img/icons/delete.svg" alt="img"></a>
                            </td>
                        </tr>`
            table.innerHTML += html;
            search_product.value = '';

        }

        let getTableTrDate = function (table) {
            let trs = table.querySelectorAll('tr');
            let trs_data = [];
            trs.forEach(tr => {
                let tds = tr.querySelectorAll('td');
                let tr_data = {};
                tds.forEach(td => {
                    tr_data[td.className] = td.innerText;
                })
                trs_data.push(tr_data);
            })
            return trs_data;
        }



        search_product.addEventListener('input', function (e) {
            // get value of input
            const search_product_value = e.target.value;
            let url = "<?php echo $api . 'products' ?>";
            //    fetch data from database
            fetch(url + "&search=" + search_product_value).then(res => res.json()).then(data => {
                Object.entries(data).forEach(([key, value]) => {
                    product = value;
                })
            })
        })
        addProduct.addEventListener('click', function () {
            addTableRow(product, table);

            console.log(getTableTrDate(table));
        })
        // add product when press enter
        search_product.addEventListener('keyup', function (e) {
            if (e.key === 'Enter') {
                addTableRow(product, table);
            }
        })
        // printBarcode function
        function printBarcode() {
            let bareCodeDate = getTableTrDate(table);
            console.log(bareCodeDate);
            let url = "api/generateBarcode.php";
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(bareCodeDate)
            }).then(res => res.status == 200
                ? window.open('api/printBareCode.php')
                : alert('aucun produit selectionné')
            )
        }
        submitBareCode.addEventListener('click', printBarcode)
        // print when press ctrl + alt + p
        document.addEventListener('keydown', function (e) {
            if (e.ctrlKey && e.altKey && e.key === 'p') {
                printBarcode();
            }
        })

    })

</script>