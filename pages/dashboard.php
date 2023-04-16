<?php
include 'includes/config.php';
$clients = getAllRows('clients');
$sales = getAllRows('achats');
$products = getAllRows('products');

?>


<div class="content">
    <div class="row">

        <div class="col-lg-4 col-sm-6 col-12 d-flex">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4><span class="counters" data-count="<?php echo count($clients) ?>"><?php echo count($clients) ?></span></h4>
                    <h5>Customers</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12 d-flex">
            <div class="dash-count das1">
                <div class="dash-counts">
                    <h4><span class="counters" data-count="<?php echo count($sales) ?>"><?php echo count($sales) ?></span>
                    </h4>
                    <h5>Vents</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12 d-flex">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4><span class="counters" data-count="<?php echo count($products) ?>"><?php echo count($products) ?></span></h4>
                    <h5>Produits</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="file-text"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Recently Added Products</h4>
                    <div class="dropdown">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="productlist.html" class="dropdown-item">Product List</a>
                            </li>
                            <li>
                                <a href="addproduct.html" class="dropdown-item">Product Add</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataview">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th> Quantité </th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- get last 4 added products -->
                                <?php
                                $products = getAllRows('products', 'id', 'DESC', 4);
                                $i = 1;
                                foreach ($products as $product) {
                                    ?>
                                    <tr>
                                        <td class="productimgname">
                                            <a href="productlist.html" class="product-img">
                                                <img src="<?php echo $product_upload_dir . $product['img'] ?>"
                                                    alt="product">
                                            </a>
                                            <a href="productlist.html">
                                                <?php echo $product['name'] ?>
                                            </a>
                                        <td>
                                            <?php echo $i ?>
                                        </td>
                                        <td>
                                            <?php echo $product['price'] ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>