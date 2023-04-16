<?php
include 'includes/config.php';

if (isset($_GET['id']) && $is_logged) {
    $id = $_GET['id'];
    $category = getCategoryById($id);
    if ($category) {
        $category_name = $category['name'];
        $category_code = $category['code'];
        $category_description = $category['description'];
        $category_img = $category['img'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $is_logged) {
    // obtenir les données du formulaire en utilisant htmlspecialchars
    $category_name = htmlspecialchars($_POST['category_name']);
    $category_code = htmlspecialchars($_POST['category_code']);
    $category_description = htmlspecialchars($_POST['category_description']);
    $category_img = $_FILES['category_img'];
    if (!empty($category_img['name'])) {
        $category_img = uploadImg($category_img, $category_upload_dir);
    }
    // mettre à jour la catégorie en utilisant la fonction editRow

    switch ($category_img ?? 0) {
        case 1:
            alert("Veuillez réessayer ! La taille de l'image est trop grande", "danger");
            break;
        case 2:
            alert("Veuillez réessayer ! L'image n'est pas au bon format", "danger");
            break;
        case 3:
            alert("Veuillez réessayer ! L'image n'a pas été téléchargée", "danger");
            break;
        default:
            $result = editRow(
                'categories',
                [
                    'name' => $category_name,
                    'code' => $category_code,
                    'description' => $category_description,
                    'img' => !is_numeric($category_img) ? $category_img : $category['img']
                ],
                $id
            );
            if ($result) {
                alert("La catégorie a été modifiée avec succès", "success");
                if (!is_numeric($category_img)) {
                    unlink($category_upload_dir.$category['img']);
                }
            } else {
                alert("Une erreur s'est produite lors de la modification de la catégorie", "danger");
            }
            break;
    }
}
?>
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Modifier une catégorie de produit</h4>
            <h6>Modifier une catégorie de produit</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <?php if ($category) : ?>
            <form method="post" class="row" enctype="multipart/form-data">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nom de la catégorie</label>
                        <input name="category_name" type="text" value="<?php echo $category_name ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Code de la catégorie</label>
                        <input name="category_code" type="text" value="<?php echo $category_code ?>">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="category_description"
                            class="form-control"><?php echo $category_description ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Image du produit</label>
                        <div class="image-upload">
                            <input type="file" name="category_img">
                            <div class="image-uploads">
                                <img src="assets/img/icons/upload.svg" alt="img">
                                <h4>Glissez-déposez un fichier pour téléverser</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product-list">
                        <ul class="row">
                            <li class="ps-0">
                                <div class="productviews">
                                    <div class="productviewsimg">
                                        <img src="<?php echo !is_numeric($category_img) ? $category_upload_dir . $category_img : $category_upload_dir . $category['img'] ?>"
                                            alt="img">
                                    </div>
                                    <div class="productviewscontent">
                                        <div class="productviewsname">
                                            <h2>
                                                <?php echo $category_name ?>
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
                    <button class="btn btn-submit me-2">Soumettre</button>
                    <a href="categorylist.html" class="btn btn-cancel">Annuler</a>
                </div>
            </form>
            <?php else : ?>
                <?php 
                    alert("La catégorie n'existe pas", "danger");    
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>