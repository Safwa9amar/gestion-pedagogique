<?php
include 'includes/config.php';
if (isset($_GET['deleteRow']) && $is_logged) {
    $id = $_GET['deleteRow'];
    deleteRow('categories', $id);
    echo "<script>window.location.href='?page=produits&sub_page=list_categories'</script>";
}
$all_categories = getAllCategories();
$table_head = '
    <tr>
        <th>Nom de la catégorie</th>
        <th>Code de la catégorie</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    ';
// csv

?>
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Liste des catégories de produits</h4>
            <h6>Visualiser/Rechercher des catégories de produits</h6>
        </div>
        <div class="page-btn">
            <a href="addcategory.html" class="btn btn-added">
                <img src="assets/img/icons/plus.svg" class="me-1" alt="img">Ajouter une catégorie
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card">
            <div class="card-body">
                <?php include 'templates/components/list_table_head.php'; ?>
                <?php
                $num = mysqli_num_rows($all_categories);
                if ($num > 0) {
                    // loop through all_categories
                    while ($category = mysqli_fetch_assoc($all_categories)) {
                        $category_id = $category['id'];
                        $category_name = $category['name'];
                        $category_code = $category['code'];
                        $category_description = $category['description'];
                        ?>
                        <tr>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="<?php echo $category_upload_dir . $category['img']; ?>" alt="product">
                                </a>
                                <a href="javascript:void(0);">
                                    <?php echo $category_name ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $category_code ?>
                            </td>
                            <td>
                                <?php echo $category_description ?>
                            </td>
                            <td>
                                <a href='?page=produits&sub_page=edit_category&id=<?php echo $category_id ?>'
                                    class='btn btn-edit'>
                                    <img src='assets/img/icons/edit.svg' class='me-1' alt='img'>
                                </a>
                                <a href='?page=produits&sub_page=list_categories&deleteRow=<?php echo $category_id ?>'
                                    class='btn btn-delete'>
                                    <img src='assets/img/icons/delete.svg' class='me-1' alt='img'>
                                </a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                <?php include 'templates/components/list_table_footer.php'; ?>

            </div>
        </div>


    </div>
</div>

</div>
[]