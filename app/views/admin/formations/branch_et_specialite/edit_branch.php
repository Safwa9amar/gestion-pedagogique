<?php
include urlFor(MODELS, 'Branch.php');
$branch_id = $_GET['edit_branch'];
$branch = DataBaseController::getRowByIdStatic('branches', $branch_id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_branch = new Branch();
    $update_branch->setID($branch_id);
    $update_branch->setCode($_POST['branch-code']);
    $update_branch->setNameAr($_POST['branch-ar']);
    $update_branch->setNameFr($_POST['branch-fr']);
    if ($update_branch->update()) {
        if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
            $_SESSION['success'] = 'تمت التعديل بنجاح';
        } else {
            $_SESSION['success'] = 'Ajouté avec succès';
        }
        echo "<script>window.location.href = '?view=formations&sub_view=branch_et_specialite';</script>";
    }
    else {
        if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
            $_SESSION['error'] = 'حدث خطأ ما';
        } else {
            $_SESSION['error'] = 'Une erreur s\'est produite';
        }
    }
}
?>

<!-- edit branch -->
<div role="tabpanel" id="add-branch" class="tab-pane fade <?php echo isset($_GET['edit_branch']) ? 'active show' : '' ?> ">
    <form id='add-branch' method="post" >
        <!-- code de branche -->
        <div class="form-group">
            <label for="branch-code">
                <?php echo $app_lang['branch_code'] ?>
            </label>
            <input type="text" class="form-control" name="branch-code" value="<?php echo $branch['code'] ?>">
        </div>

        <!-- nom de branch in french -->
        <div class="form-group">
            <label for="branch-fr">
                <?php echo $app_lang['branch_name_fr'] ?>
            </label>
            <input type="text" class="form-control" name="branch-fr" value="<?php echo $branch['Intitule_fr'] ?>">
        </div>
        <!-- nom de branch in arabic -->
        <div class="form-group">
            <label for="branch-ar">
                <?php echo $app_lang['branch_name_ar'] ?>
            </label>
            <input type="text" class="form-control" name="branch-ar" value="<?php echo $branch['Intitule_ar'] ?>">
        </div>
        <button id="submitBtn" type="submit" class="btn btn-primary">
            <?php echo $app_lang['modifier'] ?>
        </button>
    </form>
</div>
