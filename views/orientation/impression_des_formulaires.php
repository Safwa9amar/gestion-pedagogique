<?php
// list des formulaires
$db = new DataBaseController();
$forms = $db->getAllRows('formulaires');
// list des formulaires
$table_head = '
    <tr>
        <th scope="col">' . $lang['nom'] . '</th>
        <th scope="col">
            ' . $lang['description'] . '
        </th>
        <th scope="col">
            ' . $lang['fichier'] . '
        </th>
        <th scope="col">
            ' . $lang['actions'] . '
        </th>
    </tr>
';
// delete form
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // get row
    $row = $db->getRowById('formulaires', $id);
    // delete files
    $filename_ar = $row['filename_ar'];
    $filename_fr = $row['filename_fr'];
    echo $filename_ar;
    echo $filename_fr;
    $file_ar = DOC_UPLOADS . $filename_ar;
    $file_fr = DOC_UPLOADS . $filename_fr;
    
    if (file_exists($file_ar)) {
        unlink($file_ar);
    }
    if (file_exists($file_fr)) {
        unlink($file_fr);
    }
    // delete row

    $db->deleteRow('formulaires', $id);
    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
        $_SESSION['success'] = 'تم حذف النموذج بنجاح';
    } else {
        $_SESSION['success'] = 'Formulaire supprimé avec succès';
    }
}

// insert data and uplad files using uploadFile function
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['user']) {
    $filename_ar = uploadFile($_FILES['filename_ar'], DOC_UPLOADS);
    $filename_fr = uploadFile($_FILES['filename_fr'], DOC_UPLOADS);
    $data = [
        'name_fr' => $_POST['name_fr'],
        'name_ar' => $_POST['name_ar'],
        'description_fr' => $_POST['description_fr'],
        'description_ar' => $_POST['description_ar'],
        'filename_ar' => $filename_ar,
        'filename_fr' => $filename_fr,
    ];
    $db->insertRow('formulaires', $data);
    $_SESSION['success'] = 'Formulaire ajouté avec succès';
    // redirect to the same page
    // header('Location: ' . $_SERVER['REQUEST_URI']);
}
?>
<div class="card flex-fill bg-white">
    <div class="card-header">
        <ul role="tablist" class="nav nav-tabs card-header-tabs float-right">
            <li class="nav-item">
                <a href="#tab-1" data-bs-toggle="tab" class="nav-link active">
                    <?php echo $lang['view_all'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab-2" data-bs-toggle="tab" class="nav-link">
                    <?php echo $lang['add_form'] ?>
                </a>
            </li>

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content ">

            <div role="tabpanel" id="tab-1" class="tab-pane fade active show">
                <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>
                <!-- bootstrap horiwental card -->
                <?php foreach ($forms as $form) { ?>
                    <tr>
                        <td>
                            <?php echo isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar'
                                ? $form['name_ar']
                                : $form['name_fr']; ?>
                        </td>
                        <td>
                            <?php echo isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar'
                                ? $form['description_ar']
                                : $form['description_fr']; ?>
                        </td>
                        <td>
                            <?php $filename_ar = $form['filename_ar'];
                            $filename_fr = $form['filename_fr']; ?>
                            <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') { ?>
                                <a href="views/orientation/formulaires/?file=<?php echo $filename_ar ?>&name=<?php echo $form['name_ar'] ?>"
                                    class="btn btn-primary"><?php echo $lang['imprimer'] ?></a>
                            <?php } else { ?>
                                <a href="views/orientation/formulaires/?file=<?php echo $filename_fr ?>&name=<?php echo $form['name_fr'] ?>"
                                    class="btn btn-primary"><?php echo $lang['imprimer'] ?></a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="views/orientation/formulaires/?delete=<?php echo $form['id'] ?>"
                                class="btn btn-danger"><?php echo $lang['delete'] ?></a>
                        </td>
                    </tr>
                <?php } ?>
                <?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>
                <div role="tabpanel" id="tab-2" class="tab-pane fade ">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                <label for="name_fr">
                                    <?php
                                    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                        echo 'اسم النموذج بالفرنسية';
                                    } else {
                                        echo 'Nom en français';
                                    }
                                    ?>
                                </label>
                                <input type="text" class="form-control" id="name_fr" name="name_fr">
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                <label for="name_ar">
                                    <?php
                                    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                        echo 'اسم النموذج بالعربية';
                                    } else {
                                        echo 'Nom en arabe';
                                    }
                                    ?>
                                </label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                <label for="description_fr">
                                    <?php
                                    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                        echo 'وصف النموذج بالفرنسية';
                                    } else {
                                        echo 'description en français';
                                    }
                                    ?>
                                </label>
                                <textarea class="form-control" name="description_fr"></textarea>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                <label for="description_ar">
                                    <?php
                                    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                        echo 'وصف النموذج بالعربية';
                                    } else {
                                        echo 'description en arabe';
                                    }
                                    ?>
                                </label>
                                <textarea class="form-control" name="description_ar"></textarea>
                            </div>
                            <!-- input file  -->
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="formFile_fr" class="form-label">
                                    <?php
                                    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                        echo 'الملف بلغة الفرنسية';
                                    } else {
                                        echo 'formulaire en français';
                                    }
                                    ?>
                                </label>
                                <input class="form-control" type="file" name="filename_fr" id="formFile_fr">
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="formFile_ar" class="form-label">
                                    <?php
                                    if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                        echo 'الملف بلغة العربية';
                                    } else {
                                        echo 'formulaire en arabe';
                                    }
                                    ?>
                                </label>
                                <input class="form-control" type="file" name="filename_ar" id="formFile_ar">
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <button type="submit" name="add_form" class="btn btn-primary">
                                <?php echo $lang['ajouter'] ?>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>