<?php
$table_head = '<tr>
                <th>' . $app_lang['numero_seriel'] . '</th>
                <th>' . $app_lang['prenom'] . ' ' . $app_lang['and'] . ' ' . $app_lang['nom'] . '</th>
                <th>' . $app_lang['date_de_naissance'] . '</th>
                <th>' . $app_lang['lieu_de_naissance'] . '</th>
                <th>' . $app_lang['adresse'] . '</th>
                <th>' . $app_lang['telephone'] . '</th>
                <th>' . $app_lang['email'] . '</th>
                <th>' . $app_lang['diplome'] . '</th>
                <th>' . $app_lang['speciality'] . '</th>
                <th>' . $app_lang['options'] . '</th>
            </tr>';
$formateur = new Formateur();
$formateurs = $formateur->readAll();
// delete_formateur
if (isset($_GET['delete_formateur'])) {
    $formateur->setId($_GET['delete_formateur']);
    $formateur->delete();
    echo "<script>window.location.href = 'index.php?view=orientation&sub_view=list_formateur';</script>";
}
?>
<div 
style="padding:1rem; width:80vw;"
class="card">
    <?php include urlFor(COMPONENTS, 'list_table_head.php') ?>
    <?php foreach ($formateurs as $formateur) { ?>
        <tr>
            <td>
                <?php echo $formateur['id'] ?>
            </td>
            <td>
                <?php echo $formateur['nom'] . ' ' . $formateur['prenom'] ?>
            </td>
            <td>
                <?php echo $formateur['date_naissance'] ?>
            </td>
            <td>
                <?php echo $formateur['lieu_naissance'] ?>
            </td>
            <td>
                <?php echo $formateur['adresse'] ?>
            </td>
            <td>
                <?php echo $formateur['telephone'] ?>
            </td>
            <td>
                <?php echo $formateur['email'] ?>
            </td>
            <td>
                <?php echo $formateur['diplome'] ?>
            </td>
            <td>
                <?php echo $formateur['specialite'] ?>
            </td>
            <td>
                <a href="<?php echo '?view=orientation&sub_view=add_formateur&update_id=' . $formateur['id'] ?>"
                    class="btn">
                    <i class="fas fa-edit" aria-hidden="true"></i>
                </a>
                <a href="<?php echo '?view=orientation&sub_view=list_formateur&delete_formateur=' . $formateur['id'] ?>"
                    class="btn">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </td>

        </tr>
    <?php } ?>
    <?php include urlFor(COMPONENTS, 'list_table_footer.php') ?>
</div>