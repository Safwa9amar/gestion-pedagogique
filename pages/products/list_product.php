<?php
include_once 'includes/queries/product_list.php';
include 'includes/config.php';
if (isset($_GET['deleteRow']) && $is_logged) {
  $id = $_GET['deleteRow'];
  deleteRow('products', $id);
  echo "<script>window.location.href='?page=produits&sub_page=list_product'</script>";
}

$table_head = '
  <tr>
    <th>Nom du produit</th>
    <th>SKU</th>
    <th>Catégorie</th>
    <th>Marque</th>
    <th>Prix</th>
    <th>Unité</th>
    <th>Qté</th>
    <th>Créé par</th>
    <th>Action</th>
  </tr>
    ';
?>

<div class="content">
  <div class="page-header">
    <div class="page-title">
      <h4>Liste des produits</h4>
      <h6>Gérez vos produits</h6>
    </div>
    <div class="page-btn">
      <a href="?page=produits&sub_page=add_product" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
          class="me-1">Ajouter un nouveau produit</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <?php include 'templates/components/list_table_head.php'; ?>
      <?php
      $num = mysqli_num_rows($all_products);
      if ($num > 0) {
        // loop through all rows
        while ($row = mysqli_fetch_assoc($all_products)) {
          // get brand 
          $brand = getBrand($row["brand"]);
          // get category 
          $category = getCategory($row["category"]);
          ?>
          <tr>
            <td class="productimgname">
              <a href="javascript:void(0);" class="product-img">
                <img src="<?php echo $product_upload_dir . $row["img"] ?>" alt="product">
              </a>
              <a href="javascript:void(0);">
                <?php echo $row["name"] ?>
              </a>
            </td>
            <td>
              <?php echo $row["SKU"] ?>
            </td>
            <td>
              <?php echo $category["name"] ?>
            </td>
            <td>
              <?php echo $brand["name"] ?>
            </td>
            <td>
              <?php echo $row["price"] ?>
            </td>
            <td>
              <?php echo $row["unit"] ?>
            </td>
            <td>
              <?php echo $row["qty"] ?>
            </td>
            <td>
              <?php echo $row["created_by"] ?>
            </td>
            <td>
              <a class="me-3" href="?page=produits&sub_page=product_details&id=<?php echo $row['id'] ?>">
                <img src="assets/img/icons/eye.svg" alt="img">
              </a>
              <a class="me-3" href="?page=produits&sub_page=edit_product&id=<?php echo $row['id'] ?>">
                <img src="assets/img/icons/edit.svg" alt="img">
              </a>
              <a class="confirm-text" href="?page=produits&sub_page=list_product&deleteRow=<?php echo $row['id'] ?>">
                <img src="assets/img/icons/delete.svg" alt="img">
              </a>
            </td>
          </tr>
          <?php
        }
      }
      ?>
      <?php include 'templates/components/list_table_footer.php'; ?>
    </div>

  </div>