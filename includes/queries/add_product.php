<?php
  // print data from form
  if (isset($_POST['name'])) {
    echo $_POST['name'];
    echo $_POST['category'];
    echo $_POST['brand'];
    echo $_POST['unit'];
    echo $_POST['sku'];
    echo $_POST['qty'];
    echo $_POST['description'];
    echo $_POST['price'];
    echo $_POST['status'];
    echo $_POST['img'];
  }
?>
