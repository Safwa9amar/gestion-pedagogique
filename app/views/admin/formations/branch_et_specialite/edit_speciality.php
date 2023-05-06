<?php
include urlFor(MODELS, 'Speciality.php');
$speciality_id = $_GET['edit_speciality'];
$speciality = DataBaseController::getRowByIdStatic('specialities', $speciality_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_speciality = new Speciality();
    $update_speciality->setID($speciality_id);
    $update_speciality->setBranchId($_POST['spec_branch-code']);
    $update_speciality->setCode($_POST['speciality-code']);
    $update_speciality->setName($_POST['speciality']);
    $update_speciality->setLevel($_POST['speciality_level']);
    $update_speciality->setCertificate($_POST['speciality_certificate']);
    $update_speciality->setDuration($_POST['speciality_duration']);
    $update_speciality->setConditions($_POST['speciality_conditions']);
    $update_speciality->setBranchID($_POST['spec_branch-code']);
    $update_speciality->setTrainingMode($_POST['speciality_training_mode']);
    $update_speciality->setUpdatedAt(date('Y-m-d H:i:s'));

    if ($update_speciality->update()) {
        if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
            $_SESSION['success'] = 'تمت التعديل بنجاح';
        } else {
            $_SESSION['success'] = 'Ajouté avec succès';
        }
        echo "<script>window.location.href = '?view=formations&sub_view=branch_et_specialite';</script>";
    }
}
?>


<div role="tabpanel" id="add-speciality"
    class="tab-pane fade <?php echo isset($_GET['edit_speciality']) ? 'active show' : '' ?>">
    <form method="post">
        <div class="row">
            <!-- رمز الشعبة -->
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <!-- view all branch in select input -->
                <label for="spec_branch-code">
                    <?php echo $app_lang['branch_code'] ?>
                </label>
                <select class="form-control" name="spec_branch-code">
                    <?php
                    $branch = DataBaseController::getRowByIdStatic('branches', $speciality['branch_id']);
                    echo "<option value='" . $branch['id'] . "'>" . $branch['code'] . "</option>";
                    ?>
                    <?php foreach ($branches as $branch) { ?>
                        <option value="<?php echo $branch['id']; ?>">
                            <?php echo $branch['code']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <!-- رمز التخصص -->
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality-code">
                    <?php echo $app_lang['speciality_code'] ?>
                </label>
                <input type="text" class="form-control" name="speciality-code"
                    value="<?php echo $speciality['code']; ?>" />
            </div>
            <!-- اسم التخصص -->
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality">
                    <?php echo $app_lang['speciality_name'] ?>
                </label>
                <input type="text" class="form-control" name="speciality" value="<?php echo $speciality['name']; ?>" />
            </div>
        </div>
        <div class="row">
            <!-- مستوى التأهيل -->
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality_level">
                    <?php echo $app_lang['speciality_level'] ?>
                </label>
                <input type="text" class="form-control" name="speciality_level"
                    value="<?php echo $speciality['level']; ?>" />
            </div>
            <!-- speciality_certificate -->
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality_certificate">
                    <?php echo $app_lang['speciality_certificate'] ?>
                </label>
                <input type="text" class="form-control" name="speciality_certificate"
                    value="<?php echo $speciality['certificate']; ?>" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality_duration">
                    <?php echo $app_lang['speciality_duration'] ?>
                </label>
                <input type="text" class="form-control" name="speciality_duration"
                    value="<?php echo $speciality['duration']; ?>" />
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality_conditions">
                    <?php echo $app_lang['speciality_conditions'] ?>
                </label>
                <textarea class="form-control"
                    name="speciality_conditions"><?php echo $speciality['conditions']; ?></textarea>
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label for="speciality_training_mode">
                    <?php echo $app_lang['speciality_training_mode'] ?>
                </label>
                <input type="text" class="form-control" name="speciality_training_mode"
                    value="<?php echo $speciality['training_mode']; ?>" />
            </div>
        </div>
        <!-- submit -->
        <button type="submit" id="specialitySubmitBtn" class="btn btn-primary">
            <?php echo $app_lang['modifier'] ?>
        </button>
    </form>
</div>