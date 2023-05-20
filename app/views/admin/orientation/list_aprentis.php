<?php
// list des branchulaires
$db = new DataBaseController();
$students = $db->getAllRows('students', 'id', 'ASC');

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
if (isset($_GET['delete_student'])) {
    $student = new Student();
    $student->setId($_GET['delete_student']);
    $student->delete();
    if ($student) {
        if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
            $_SESSION['success'] = 'تم حذف  بنجاح';
        } else {
            $_SESSION['success'] = ' supprimé avec succès';
        }
        echo "<script>window.location.href = '?view=orientation&sub_view=list_aprentis';</script>";
    }
}


?>
<div style="padding:1rem; width:80vw;" class="card">

    <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>
    <?php foreach ($students as $student) { ?>
        <tr>
            <td>
                <a href="<?php echo '?view=orientation&sub_view=add_aprentis&update_id=' . $student['id']; ?>" class="btn">
                    <i class="fa fa-edit"></i>

                </a>
                <a href="<?php echo '?view=orientation&sub_view=list_aprentis&delete_student=' . $student['id'] ?>"
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
                try {
                    //code...
                    echo $speciality['code'];
                } catch (\Throwable $th) {
                    echo '/';
                    //throw $th;
                }
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
                <?php echo $student['study_level'] . '\n' . $student['study_year'] ?>
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
</div>