<?php
include urlFor(MODELS, 'Section.php');
$table_head = '<tr>
                <th scope="col">' . $app_lang['code_section'] . '</th>
                <th scope="col">' . $app_lang['speciality'] . '</th>
                <th scope="col">' . $app_lang['debut_stage'] . '</th>
                <th scope="col">' . $app_lang['fin_stage'] . '</th>
                <th scope="col">' . $app_lang['qualification'] . '</th>
                <th scope="col">' . $app_lang['trainees_number'] . '</th>
                <th scope="col">' . $app_lang['responsable'] . '</th>
                <th scope="col">' . $app_lang['options'] . '</th>

            </tr>';
$section = new Section();
$sections = $section->readAll();

// delete_section
if (isset($_GET['delete_section'])) {
    $section->deleteById($_GET['delete_section']);
    echo "<script>window.location.href = '?view=formations&sub_view=show_section';</script>";
}

?>

<div style="padding:1rem; width:80vw;" class="card">
    <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>
    <?php foreach ($sections as $section) { ?>
        <tr>
            <td>
                <?php echo $section['code'] ?>
            </td>
            <td>
                <?php
                $db = new DataBaseController();
                try {
                    echo $db->getRowById('specialities', $section['speciality'])['name'];
                } catch (\Throwable $th) {
                    echo '/';
                }
                ?>
            </td>
            <td>
                <?php echo $section['start'] ?>
            </td>
            <td>
                <?php echo $section['end'] ?>
            </td>
            <td>
                <?php echo $section['qualification'] ?>
            </td>
            <td>
                <?php echo $section['effectif'] ?>
            </td>
            <td>
                <?php
                $db = new DataBaseController();
                $responsable = $db->getRowById('formateurs', $section['manager']);
                try {
                    //code...
                    echo $responsable['nom'] . ' ' . $responsable['prenom'];
                } catch (\Throwable $th) {
                    echo '/';
                }
                ?>
            </td>
            <td>
                <!-- print -->
                <a href="<?php echo '../' . API . 'print_section.php?print_section=' . $section['id']; ?>" class="btn">
                    <i class="fa fa-download "></i>
                    <?php echo $app_lang['telecharger'] ?>
                </a>
                <!-- delete -->
                <a href="<?php echo '?view=formations&sub_view=show_section&delete_section=' . $section['id']; ?>"
                    class="btn">
                    <i class="fa fa-trash"></i>
                    <?php echo $app_lang['delete'] ?>
                </a>
            </td>
        </tr>
    <?php } ?>
    <?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>

</div>