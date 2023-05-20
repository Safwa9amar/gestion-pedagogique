<?php
// list des speciality 
$db = new DataBaseController();
$specialities = $db->getAllRows('specialities', 'id', 'ASC');
// list des speciality 
$table_head = '<tr>
                    <th scope="col">' . $app_lang['speciality_id'] . '</th>
                    <th scope="col">' . $app_lang['branch_code'] . '</th>
                    <th scope="col">' . $app_lang['speciality_code'] . '</th>
                    <th scope="col">' . $app_lang['speciality_name'] . '</th>
                    <th scope="col">' . $app_lang['speciality_level'] . '</th>
                    <th scope="col">' . $app_lang['speciality_certificate'] . '</th>
                    <th scope="col">' . $app_lang['speciality_duration'] . '</th>
                    <th scope="col">' . $app_lang['speciality_conditions'] . '</th>
                    <th scope="col">' . $app_lang['speciality_training_mode'] . '</th>
                    <th scope="col">' . $app_lang['options'] . '</th>
              </tr>';
// delete speciality
if (isset($_GET['delete_speciality'])) {
    $id = $_GET['delete_speciality'];
    
    // get row
    $row = $db->getRowById('specialities', $id);
    if ($row) {
        // delete row
        $db->deleteRow('specialities', $id);
        if ($db) {
            if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                $_SESSION['success'] = 'تم حذف  بنجاح';
            } else {
                $_SESSION['success'] = ' supprimé avec succès';
            }
            // unset success
            unset($_SESSION['success']);
            echo '<script>window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
        }
    }

}
?>
<div role="tabpanel" id="specialities-list" class="tab-pane fade ">
    <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>
    <?php foreach ($specialities as $speciality) {
        $branch = $db->getRowById('branches', $speciality['branch_id']);
        ?>
    <tr>
        <td>
            <?php echo $speciality['id']; ?>
        </td>
        <td>
            <?php echo $branch['code'];?>
        </td>
        <td>
            <?php echo $speciality['code']; ?>
        </td>
        <td>
            <?php echo $speciality['name']; ?>
        </td>
        <td>
            <?php echo $speciality['level']; ?>
        </td>
        <td>
            <?php echo $speciality['certificate']; ?>
        </td>
        <td>
            <?php echo $speciality['duration']; ?>
        </td>
        <td>
                    <?php echo $speciality['conditions']; ?>

        </td>
        <td>
            <?php echo $speciality['training_mode']; ?>
        </td>
        <td>
            <a href="<?php echo '?view=formations&sub_view=branch_et_specialite&edit_speciality=' . $speciality['id']; ?>"
                class="btn">
                <i class="fa fa-edit"></i>

                <?php echo $app_lang['modifier'] ?>
            </a>
            <a href="<?php echo '?view=formations&sub_view=branch_et_specialite&delete_speciality=' . $speciality['id']; ?>"
                class="btn">
                <i class="fa fa-trash"></i>
                <?php echo $app_lang['delete'] ?>
            </a>
        </td>

    </tr>
    <?php } ?>
    <?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>
</div>