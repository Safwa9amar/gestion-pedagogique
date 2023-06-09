<?php
$formateur = new Formateur();
$formateurs = $formateur->generateSql();
// INSERT
if (isset($_POST['add'])) {
    $formateur->setCin($_POST['cin']);
    $formateur->setNom($_POST['nom']);
    $formateur->setPrenom($_POST['prenom']);
    $formateur->setGrade($_POST['grade']);
    $formateur->setDateNaissance($_POST['date_naissance']);
    $formateur->setLieuNaissance($_POST['lieu_naissance']);
    $formateur->setAdresse($_POST['adresse']);
    $formateur->setTelephone($_POST['tel']);
    $formateur->setEmail($_POST['email']);
    $formateur->setDiplome($_POST['diplome']);
    $formateur->setSpecialite($_POST['specialite']);
    $checkEmail = $formateur->checkIfRowExistsByParam($formateur->table, 'email', $_POST['email']);
    if ($checkEmail) {
        unset($_SESSION['success']);
        $_SESSION['error'] = $app_lang['email_exists'];
        // history back to the previous page
        echo "<script>window.history.back()</script>";
    } else {
        $result = $formateur->create();
        if ($result) {
            unset($_SESSION['error']);
            $_SESSION['success'] = $app_lang['formateur_added'];
            echo "<script>window.location.href='?view=orientation&sub_view=list_formateur'</script>";
        } else {
            unset($_SESSION['success']);
            $_SESSION['error'] = $app_lang['formateur_not_added'];
        }
    }
}


if (isset($_GET['delete'])) {
    $formateur->setId($_GET['id']);
    $formateur->delete();
}

// UPDATE
$isUpdate = false;

if (isset($_GET['update_id'])) {
    $isUpdate = true;
    $formateur = new Formateur();
    $formateur->setId($_GET['update_id']);
    $update_result = $formateur->getById();

}
if (isset($_POST['update'])) {
    $formateur = new Formateur();
    $formateur->setId($_GET['update_id']);
    $formateur->setCin($_POST['cin']);
    $formateur->setNom($_POST['nom']);
    $formateur->setPrenom($_POST['prenom']);
    $formateur->setGrade($_POST['grade']);
    $formateur->setDateNaissance($_POST['date_naissance']);
    $formateur->setLieuNaissance($_POST['lieu_naissance']);
    $formateur->setAdresse($_POST['adresse']);
    $formateur->setTelephone($_POST['tel']);
    $formateur->setEmail($_POST['email']);
    $formateur->setDiplome($_POST['diplome']);
    $formateur->setExperience($_POST['experience']);
    $formateur->setSpecialite($_POST['specialite']);
    $result = $formateur->update();
    if ($result) {
        $_SESSION['success'] = $app_lang['formateur_updated'];
        echo "<script>window.location.href='?view=orientation&sub_view=list_formateur'</script>";
    } else {
        $_SESSION['error'] = $app_lang['formateur_not_updated'];
    }
}
?>
<div class="content">
    <!-- title -->
    <div class="page-title">
        <h3>
            <?php echo $app_lang['add_formateur']; ?>
        </h3>
    </div>
    <hr>
    <form action="" method="post">
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label for="nom">
                    <?php echo $app_lang['nom']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['nom'] : ''; ?>" type="text" name="nom" id="nom"
                    class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label for="prenom">
                    <?php echo $app_lang['prenom']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['prenom'] : ''; ?>" type="text" name="prenom"
                    id="prenom" class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label for="cin">CIN</label>
                <input value="<?php echo $isUpdate ? $update_result['CIN'] : ''; ?>" type="text" name="cin" id="cin"
                    class="form-control" aria-describedby="helpId">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label for="date_naissance">
                    <?php echo $app_lang['date_de_naissance']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['date_naissance'] : ''; ?>" type="date"
                    name="date_naissance" id="date_naissance" class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label for="lieu_naissance">
                    <?php echo $app_lang['lieu_de_naissance']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['lieu_naissance'] : ''; ?>" type="text"
                    name="lieu_naissance" id="lieu_naissance" class="form-control" aria-describedby="helpId">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="tel">
                    <?php echo $app_lang['telephone']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['telephone'] : ''; ?>" type="text" name="tel"
                    id="tel" class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="email">
                    <?php echo $app_lang['email']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['email'] : ''; ?>" type="text" name="email"
                    id="email" class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="adresse">
                    <?php echo $app_lang['adresse']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['adresse'] : ''; ?>" type="text" name="adresse"
                    id="adresse" class="form-control" aria-describedby="helpId">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="specialite">
                    <?php echo $app_lang['speciality']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['specialite'] : ''; ?>" type="text"
                    name="specialite" id="specialite" class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="diplome">
                    <?php echo $app_lang['diplome']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['diplome'] : ''; ?>" type="text" name="diplome"
                    id="diplome" class="form-control" aria-describedby="helpId">
            </div>
            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="experience">
                    <?php echo $app_lang['experience_professionnelle']; ?>
                </label>
                <input value="<?php echo $isUpdate ? $update_result['experience'] : ''; ?>" type="text"
                    name="experience" id="experience" class="form-control" aria-describedby="helpId">
            </div>

            <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                <label for="grade">
                    <?php echo $app_lang['grade']; ?>
                </label>
                <select value="<?php echo $isUpdate ? $update_result['grade'] : ''; ?>" type="text" name="grade"
                    id="grade" class="form-control" aria-describedby="helpId">
                    <option value="">
                        choisissez un grade
                    </option>
                    <option value="PFP">
                        <?php echo $app_lang['PFP']; ?>
                    </option>
                    <option value="PSFEP2">
                        <?php echo $app_lang['PSFEP2']; ?>
                    </option>
                    <option value="PSFEP1">
                        <?php echo $app_lang['PSFEP1']; ?>
                    </option>
                </select>
            </div>
            <!-- add button -->
            <div class="row">
                <div class="form-group col-lg-4 col-md-6 col-sm-12 ">
                    <button type="submit" name="<?php echo $isUpdate ? 'update' : 'add'; ?>" class="btn btn-primary">
                        <?php
                        if ($isUpdate) {
                            echo $app_lang['modifier'];
                        } else {
                            echo $app_lang['ajouter'];
                        }
                        ?>
                    </button>
                </div>
            </div>
    </form>
</div>