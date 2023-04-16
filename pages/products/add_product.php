<div class="content">
  <div class="page-header">
    <div class="page-title">
      <h4>Ajouter un produit</h4>
      <h6>Créer un nouveau produit</h6>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" class="row" enctype="multipart/form-data">
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Nom du produit</label>
            <input name="name" type="text" />
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Catégorie</label>
            <select class="form-control" name="category">
              <?php
              $all_categories = getAllCategories();
              while ($category = mysqli_fetch_assoc($all_categories)) {
                echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Marque</label>
            <select class="form-control" name="brand">
              <?php
              $all_brands = getAllBrands();
              while ($brand = mysqli_fetch_assoc($all_brands)) {
                echo "<option value='" . $brand['id'] . "'>" . $brand['name'] . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Unité</label>
            <input type="text" name="unit" />

          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>SKU</label>
            <input type="text" name="sku" />
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Quantité</label>
            <input type="text" name="qty" />
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
        </div>


        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Prix</label>
            <input type="text" name="price" />
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label>Statut</label>
            <select class="form-control" name="status">
              <option value='1'>Disponible</option>
              <option value='0'>Non disponible</option>
            </select>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label>Image du produit</label>
            <div class="image-upload">
              <input type="file" name="img" />
              <div class="image-uploads">
                <img src="assets/img/icons/upload.svg" alt="img" />
                <h4>Drag and drop a file to upload</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <?php
          include 'includes/database.php';
          include 'includes/config.php';
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // insert data into database
            $name = htmlspecialchars($_POST['name']);
            $category = htmlspecialchars($_POST['category']);
            $brand = htmlspecialchars($_POST['brand']);
            $unit = htmlspecialchars($_POST['unit']);
            $sku = htmlspecialchars($_POST['sku']);
            $qty = htmlspecialchars($_POST['qty']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $status = htmlspecialchars($_POST['status']);
            //insert data into database using addRow function
          
            $imgUploaded = uploadImg($_FILES['img'], $product_upload_dir);

            switch ($imgUploaded) {
              case 1:
                alert("veuillez réessayer ! la taille de l'image est trop grande", "danger");
                break;
              case 2:
                alert("veuillez réessayer ! le fichier n'a pas été téléchargé", "danger");
                break;
              case 3:
                alert("veuillez réessayer ! le fichier n'est pas une image", "danger");
                break;
              default:
                $result = addRow("products", [
                  "name" => $name,
                  "category" => $category,
                  "brand" => $brand,
                  "unit" => $unit,
                  "SKU" => $sku,
                  "qty" => $qty,
                  "description" => $description,
                  "price" => $price,
                  "status" => $status,
                  "img" => $imgUploaded
                ]);
                if ($result) {
                  alert("Produit ajouté avec succès", "success");
                } else {
                  alert("Echec d'ajout du produit", "danger");
                }
                break;
            }
          }
          ?>
          <button class="btn btn-submit me-2">Submit</button>
          <a href="?page=produits&sub_page=list_product" class="btn btn-cancel">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jquery -->
<!-- <script src="assets/js/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $(".btn-submit").click(function () {
      var name = $("input[name=name]").val();
      var category = $("select[name=category]").val();
      var brand = $("select[name=brand]").val();
      var unit = $("select[name=unit]").val();
      var sku = $("input[name=sku]").val();
      var qty = $("input[name=qty]").val();
      var description = $("textarea[name=description]").val();
      var price = $("input[name=price]").val();
      var status = $("select[name=status]").val();
      var img = $("input[name=img]").val();
      $.ajax({
        url: "pages/products/add_product.php",
        type: "POST",
        data: {
          name: name,
          category: category,
          brand: brand,
          unit: unit,
          sku: sku,
          qty: qty,
          description: description,
          price: price,
          status: status,
          img: img,
        },
        success: function (data) {
          console.log(data);
        },
      });
    });
  });
</script> -->