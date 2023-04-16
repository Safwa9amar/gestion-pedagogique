<?php
include 'includes/config.php';
if (isset($_GET['id']) && $is_logged) {
    $product = getProduct($_GET['id']);
    if ($product) {

        $product_id = $product['id'];
        $product_name = $product['name'];
        $product_sku = $product['SKU'];
        $product_unit = $product['unit'];
        $product_category = $product['category'];
        $product_brand = $product['brand'];
        $product_price = $product['price'];
        $product_quantity = $product['qty'];
        $product_description = $product['description'];
        $product_image = $product['img'];
        $product_status = $product['status'];
        // get brand 
        $brand = getBrand($product_brand);
        // get category
        $category = getCategory($product_category);
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && $is_logged) {
    $product_name = $_POST['product_name'];
    $product_sku = $_POST['product_sku'];
    $product_unit = $_POST['product_unit'];
    $product_category = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_description = $_POST['product_description'];
    $product_img = $_FILES['product_img'];
    $product_status = $_POST['product_status'];
    if (!empty($product_img['name'])) {
        $imgUploaded = uploadImg($product_img, $product_upload_dir);
    }
    $data = [
        'name' => $product_name,
        'SKU' => $product_sku,
        'unit' => $product_unit,
        'category' => $product_category,
        'brand' => $product_brand,
        'price' => $product_price,
        'qty' => $product_quantity,
        'description' => $product_description,
        'img' => $imgUploaded ?? $product_image,
        'status' => $product_status,
    ];


    switch ($imgUploaded ?? 0) {
        case 1:
            alert("veuillez réessayer ! la taille de l'image est trop grande", "danger");
            break;
        case 2:
            alert("veuillez réessayer ! le fichier n'a pas été téléchargé", "danger");
            break;
        case 3:
            alert("veuillez réessayer ! le fichier n'est pas une image", "danger");
            break;

        default:
            $result = editRow('products', $data, $product_id);
            if ($result) {
                alert("Produit edité avec succès", "success");
                if (!empty($product_img['name'])) {
                    // delete the old image
                    unlink($product_upload_dir . $product_image);
                }
            } else {
                alert("Echec d'ajout du produit", "danger");
            }
            break;
    }
}
?>


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Modification de produit</h4>
            <h6>Modifiez votre produit</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <?php if ($product): ?>
                <form method="post" class="row" enctype="multipart/form-data">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom du produit</label>
                            <input type="text" name="product_name" value="<?php echo $product_name ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select class="form-control" name="category">
                                <option selected value="<?php echo $product_category ?>">
                                    <?php echo $category['name'] ?>
                                </option>
                                <?php
                                // récupérer toutes les catégories
                                $all_categories = getAllCategories();
                                // boucler à travers toutes les catégories
                                while ($row = mysqli_fetch_assoc($all_categories)) {

                                    if ($product_category != $row['id']) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php echo $row['name'] ?>
                                        </option>
                                        <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Marque</label>
                            <select class="form-control" name="brand">
                                <option selected value="<?php echo $product_brand ?>">
                                    <?php echo $brand['name'] ?>
                                </option>
                                <?php
                                // récupérer toutes les marques
                                $all_brands = getAllBrands();
                                // boucler à travers toutes les marques
                                while ($row = mysqli_fetch_assoc($all_brands)) {
                                    if ($product_brand != $row['id']) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php echo $row['name'] ?>
                                        </option>
                                        <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Unité</label>
                            <input type="text" name="product_unit" value="<?php echo $product_unit ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" name="product_sku" value="<?php echo $product_sku ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Quantité</label>
                            <input type="text" name="product_quantity" value="<?php echo $product_quantity ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="product_description"
                                class="form-control"><?php echo $product_description ?></textarea>

                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="text" name="product_price" value="<?php echo $product_price ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Status</label>
                            <select name="product_status" class="form-control">
                                <option value='<?php echo $product_status ?>'>
                                    <?php echo $product_status == 1 ? 'Disponible' : 'Non disponible'; ?>
                                </option>
                                <option value='1'>Disponible</option>
                                <option value='0'>Non disponible</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Produit Image</label>
                            <div class="image-upload">
                                <input type="file" name="product_img">
                                <div class="image-uploads">
                                    <img src="assets/img/icons/upload.svg" alt="img">
                                    <h4>Glisser et déposer un fichier à télécharger</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product-list">
                            <ul class="row">
                                <li>
                                    <div class="productviews">
                                        <div class="productviewsimg">
                                            <img src="<?php echo !is_numeric($product_image) ? $product_upload_dir . $product_image : $product_upload_dir . $product['img'] ?>"
                                                alt="img">
                                        </div>
                                        <div class="productviewscontent">
                                            <div class="productviewsname">
                                                <h2>
                                                    <?php echo $product_image ?>
                                                </h2>
                                            </div>
                                            <a href="javascript:void(0);" class="hideset">x</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2">Mettre à jour</button>
                        <a href="?page=produits&sub_page=list_product" class="btn btn-cancel">Annuler</a>
                    </div>
                </form>
            <?php else:
                alert('Produit introuvable', 'danger');
                ?>
            <?php endif; ?>

        </div>
    </div>

</div>