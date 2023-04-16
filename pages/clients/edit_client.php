<?php
include 'includes/config.php';

if (isset($_GET['id']) && $is_logged) {
    $id = $_GET['id'];
    $client = getClient($id);
    if ($client) {
        $name = $client['name'];
        $email = $client['mail'];
        $phone = $client['phone'];
        $city = $client['city'];
        $address = $client['address'];
        $code = $client['code'];
        $img = $client['img'];

    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $is_logged) {
    // obtenir les données du formulaire en utilisant htmlspecialchars
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);
    $address = htmlspecialchars($_POST['address']);
    $code = htmlspecialchars($_POST['code']);
    $client_img = $_FILES['img'];

    if (!empty($client_img)) {
        $client_img = uploadImg($client_img, $clients_upload_dir);
    }
    switch ($client_img ?? 0) {
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
                'clients',
                array(
                    'name' => $name,
                    'mail' => $email,
                    'code' => $code,
                    'phone' => $phone,
                    'city' => $city,
                    'address' => $address,
                    'img' => !is_numeric($client_img) ? $client_img : $client['img']
                ),
                $id
            );
            if ($result) {
                alert("Client modifié avec succès", "success");
                if (!is_numeric($client_img)) {
                    unlink($clients_upload_dir . $client['img']);
                }
            } else {
                alert("Une erreur s'est produite lors de la modification de Client", "danger");
            }
            break;
    }
}

?>

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Edit Customer Management</h4>
            <h6>Edit/Update Customer</h6>
        </div>
    </div>

    <form method="post" enctype="multipart/form-data" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input name="name" type="text" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>code</label>
                        <input name="code" type="text" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" type="text" value="<?php echo $phone; ?>">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>City</label>
                        <select name="city" class="form-control">
                            <option value="<?php echo $city ?>" selected>
                                <?php echo getWilayaById($city)['name'] ?>
                            </option>
                            <!-- get all wilaya -->
                            <?php
                            $wilayas = getAllWilayat();
                            foreach ($wilayas as $wilaya) {
                                echo "<option value='" . $wilaya['id'] . "'>" . $wilaya['code'] . '-' . $wilaya['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="image-upload">
                            <input name="img" type="file">
                            <div class="image-uploads">
                                <img class="avatar" src="<?php
                                                            if (!empty($client['img'])) {
                                                                echo $clients_upload_dir . $client['img'];
                                                            } else if (!empty($client_img)) {
                                                                echo $clients_upload_dir . $client_img;
                                                            } else {
                                                                echo $clients_upload_dir . 'default.png';
                                                            }

                                                            ?>" alt="img">
                                <h4>Faites glisser un fichier pour le télécharger</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2">Update</button>
                    <a href="index.php?page=clients&sub_page=list_clients " class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>