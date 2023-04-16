<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Marque ADD</h4>
            <h6>Créer une nouvelle marque</h6>
        </div>
    </div>
    <form method="post"  class="card" enctype="multipart/form-data" >
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nom de la marque</label>
                        <input name="name" type="text">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Image du produit</label>
                        <div class="image-upload">
                            <input name="img" type="file">
                            <div class="image-uploads">
                                <img src="assets/img/icons/upload.svg" alt="img">
                                <h4>Glissez-déposez un fichier pour téléverser</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // add category 
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    include './includes/config.php';
                    $name = htmlspecialchars($_POST['name']);
                    $description = htmlspecialchars($_POST['description']);
                    $imgUploaded = uploadImg($_FILES['img'], $brand_upload_dir);

                    // use addRow function to add category
                    switch ($imgUploaded) {
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
                            $image = $imgUploaded;
                            $result = addRow(
                                'brands',
                                array(
                                    'name' => $name,
                                    'description' => $description,
                                    'img' => $image
                                )
                            );
                            if ($result) {
                                alert("Catégorie ajoutée avec succès", "success");
                            } else {
                                alert("Erreur ! catégorie non ajoutée", "danger");
                            }
                            break;
                    }
                }

                ?>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2">Soumettre</button>
                    <a href="?page=produits&sub_page=list_marques" class="btn btn-cancel">Annuler</a>
                </div>
            </div>
        </div>
    </form>


</div>