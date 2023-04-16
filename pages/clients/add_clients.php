<?php
// Path: pages\clients\add_clients.php
include 'includes/config.php';

?>

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Gestion des clients</h4>
            <h6>Ajouter/Modifier un client</h6>
        </div>
    </div>

    <form method="post" class="card" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nom du client</label>
                        <input name="name" type="text">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input name="phone" type="text">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Ville</label>
                        <select name="city" class="form-control">
                            <option disabled>Choisissez une ville</option>
                            <?php
                            $cities = getAllWilayat();
                            foreach ($cities as $city) {
                                echo '<option value="' . $city['id'] . '">' . $city['code'] . '-' . $city['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-1 ">
                    <div class="form-group">
                        <label>Code</label>
                        <input name="code" type="text">
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="form-group">
                        <label>Adresse</label>
                        <input name="address" type="text">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="image-upload">
                            <input name="img" type="file">
                            <div class="image-uploads">
                                <img src="assets/img/icons/upload.svg" alt="img">
                                <h4>Faites glisser un fichier pour le télécharger</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // add client
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    include './includes/config.php';
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $phone = htmlspecialchars($_POST['phone']);
                    $city = htmlspecialchars($_POST['city']);
                    $address = htmlspecialchars($_POST['address']);
                    $code = htmlspecialchars($_POST['code']);
                    $imgUploaded = uploadImg($_FILES['img'], $clients_upload_dir);

                    // use addRow function to add client
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
                                'clients',
                                array(
                                    'name' => $name,
                                    'mail' => $email,
                                    'code' => $code,
                                    'phone' => $phone,
                                    'city' => $city,
                                    'address' => $address,
                                    'img' => $image
                                )
                            );
                            if ($result) {
                                alert("Client ajouté avec succès", "success");
                            } else {
                                // if error echo error
                                alert("Erreur lors de l'ajout du client", "danger");
                            }
                            break;
                    }
                }

                ?>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2">Submit</button>
                    <a href="?page=clients&sub_page=list_clients" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>