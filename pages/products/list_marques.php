<?php
include 'includes/config.php';
if (isset($_GET['deleteRow']) && $is_logged) {
    $id = $_GET['deleteRow'];
    deleteRow('brands', $id);
    echo "<script>window.location.href='?page=produits&sub_page=list_marques'</script>";
}
$all_brands = getAllBrands();
$table_head = '
        <tr>
            <th>Nom de la marque</th>
            <th>Description de la marque</th>
            <th>Action</th>
        </tr>
    ';

?>
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Liste des marques</h4>
            <h6>Gérez votre marque</h6>
        </div>
        <div class="page-btn">
            <a href="?page=produits&sub_page=add_marques" class="btn btn-added"><img src="assets/img/icons/plus.svg"
                    class="me-2" alt="img">Ajouter une marque</a>
        </div>
    </div>
    <div class="card">
        <div class="card">
            <div class="card-body">
                <?php include 'templates/components/list_table_head.php'; ?>
                <?php
                $num = mysqli_num_rows($all_brands);
                if ($num > 0) {
                    // loop through all_brands
                    while ($brand = mysqli_fetch_assoc($all_brands)) {
                        $brand_id = $brand['id'];
                        $brand_name = $brand['name'];
                        $brand_description = $brand['description'];
                        $brand_img = $brand['img'];
                        ?>
                        <tr>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="<?php echo $brand_upload_dir . $brand['img']; ?>" alt="product">
                                </a>
                                <a href="javascript:void(0);">
                                    <?php echo $brand_name ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $brand_description ?>
                            </td>
                            <td>
                                <a href='?page=produits&sub_page=edit_brand&id=<?php echo $brand_id ?>' class='btn btn-edit'>
                                    <img src='assets/img/icons/edit.svg' class='me-1' alt='img'>
                                </a>
                                <a href='?page=produits&sub_page=list_marques&deleteRow=<?php echo $brand_id ?>'
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