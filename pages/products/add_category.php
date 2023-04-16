<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Ajouter une catégorie de produit</h4>
            <h6>Créer une nouvelle catégorie de produit</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" class="row" enctype="multipart/form-data" >
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nom de la catégorie</label>
                        <input name="name" type="text">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Code de la catégorie</label>
                        <input name="code" type="text">
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
                                <h4>Glisser-déposer un fichier pour télécharger</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // add category 
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    include './includes/config.php';
                    $name = htmlspecialchars($_POST['name']);
                    $code = htmlspecialchars($_POST['code']);
                    $description = htmlspecialchars($_POST['description']);
                    $imgUploaded = uploadImg($_FILES['img'], $category_upload_dir);

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
                                'categories',
                                array(
                                    'name' => $name,
                                    'code' => $code,
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
                    <a href="categorylist.html" class="btn btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>


</div>