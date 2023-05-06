<?php
// list des branchulaires
$db = new DataBaseController();
$students = $db->getAllRows('students', 'id', 'ASC');
// list des students
// first_name
// gender
// last_name
// email
// phone
// address
// study_level
// study_year
// study_last_etablissement_name
// father_name
// father_job
// mother_name
// mother_job
// branch_id
// speciality_id
$table_head = '<tr>
                    <th>' . $app_lang['options'] . '</th>
                    <th>' . $app_lang['numero_seriel'] . '</th>
                    <th>' . $app_lang['numero_dinscription'] . '</th>
                    <th>' . $app_lang['nom'] . '/' . $app_lang['prenom'] . '</th>
                    <th>' . $app_lang['speciality'] . '</th>
                    <th>' . $app_lang['date_de_naissance'] . ' / ' . $app_lang['lieu_de_naissance'] . '</th>
                    <th>' . $app_lang['adresse'] . '</th>
                    <th>' . $app_lang['telephone'] . '</th>
                    <th>' . $app_lang['email'] . '</th>
                    <th>' . $app_lang['niveau_d_etude'] . '/' . $app_lang['annee_scolaire'] . '</th>
                    <th>' . $app_lang['dernier_etablissement'] . '</th>
                    <th>' . $app_lang['nom_du_pere'] . '</th>
                    <th>' . $app_lang['profession_du_pere'] . '</th>
                    <th>' . $app_lang['nom_et_prenom_de_la_mere'] . '</th>
                    <th>' . $app_lang['profession_de_la_mere'] . '</th>



              </tr>';
// delete branch
if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    // get row
    $row = $db->getRowById('studentes', $id);
    if ($row) {
        // delete row
        $db->deleteRow('studentes', $id);
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

<?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>
<?php foreach ($students as $student) { ?>
    <tr>
        <td>
            <a href="<?php echo '?view=formations&sub_view=branch_et_specialite&edit_branch=' . $student['id']; ?>"
                class="btn">
                <i class="fa fa-edit"></i>

            </a>
            <a href="<?php echo '?view=formations&sub_view=branch_et_specialite&delete_branch=' . $student['id'] ?>"
                class="btn">
                <i class="fa fa-trash"></i>

            </a>
        </td>
        <td>
            <?php echo $student['id'] ?>
        </td>
        <td>
            <?php echo $student['matricule'] ?>
        </td>
        <td>
            <?php echo $student['first_name'] . ' ' . $student['last_name'] ?>
        </td>
        <td>
            <?php
            $speciality = $db->getRowById('specialities', $student['speciality_id']);
            echo $speciality['code']
                ?>
        </td>
        <td>
            <?php echo $student['birthday'] . ' | ' . $student['born_place'] ?>
        </td>
        <td>
            <?php echo $student['address'] ?>
        </td>
        <td>
            <?php echo $student['phone'] ?>
        </td>
        <td>
            <?php echo $student['email'] ?>
        </td>
        <td>
            <textarea><?php echo $student['study_level'] . '\n' . $student['study_year'] ?></textarea>
        </td>
        <td>
            <?php echo $student['study_last_etablissement_name'] ?>
        </td>

        <td>
            <?php echo $student['father_name'] ?>
        </td>
        <td>
            <?php echo $student['father_job'] ?>
        </td>
        <td>
            <?php echo $student['mother_name'] ?>
        </td>
        <td>
            <?php echo $student['mother_job'] ?>
        </td>



    </tr>
<?php } ?>
<?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>