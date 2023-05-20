<?php
// list des branchulaires
$db = new DataBaseController();
$branches = $db->getAllRows('branches', 'id', 'ASC');
// list des branchulaires
$table_head = '<tr>
                    <th scope="col">' . $app_lang['branch_id'] . '</th>
                    <th scope="col">' . $app_lang['branch_code'] . '</th>
                    <th scope="col">' . $app_lang['branch_name'] . '</th>
                    <th scope="col">' . $app_lang['branch_intitule'] . '</th>
                    <th scope="col">' . $app_lang['options'] . '</th>
              </tr>';
// delete branch
if (isset($_GET['delete_branch'])) {
    $id = $_GET['delete_branch'];
    // get row
    $row = $db->getRowById('branches', $id);
    if ($row) {
        // delete row
        $db->deleteRow('branches', $id);
        if ($db) {
            if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                $_SESSION['success'] = 'تم حذف  بنجاح';
            } else {
                $_SESSION['success'] = ' supprimé avec succès';
            }
        }
        echo "<script>window.location.href = 'index.php?view=formations&sub_view=branch_et_specialite';</script>";
    }

}
?>

<div role="tabpanel" id="branch-list"
    class="tab-pane fade <?php echo isset($_GET['edit_branch']) || isset($_GET['edit_speciality']) ? '' : 'active show' ?>">
    <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>
    <?php foreach ($branches as $branch) { ?>
    <tr>
        <td>
            <?php echo $branch['id'] ?>
        </td>
        <td>
            <?php echo $branch['code']; ?>
        </td>
        <td>
            <?php echo $branch['Intitule_ar'] ?>
        </td>
        <td>
            <?php echo $branch['Intitule_fr'] ?>
        </td>
        <td>
            <a href="<?php echo '?view=formations&sub_view=branch_et_specialite&edit_branch=' . $branch['id']; ?>"
                class="btn">
                <i class="fa fa-edit"></i>
                <?php echo $app_lang['modifier'] ?>
            </a>
            <a href="<?php echo '?view=formations&sub_view=branch_et_specialite&delete_branch=' . $branch['id'] ?>"
                class="btn">
                <i class="fa fa-trash"></i>
                <?php echo $app_lang['delete'] ?>
            </a>
        </td>
    </tr>
    <?php } ?>
    <?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>
</div>