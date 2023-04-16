<?php

if (isset($_GET['sub_page'])) {
    $page = $_GET['sub_page'];
    if ($page == "add_sales") {
        include "vents/add_sales.php";
    } elseif ($page == "list_sales") {
        include "vents/list_sales.php";
    } elseif ($page == "edit_vent") {
        include "vents/edit_vent.php";
    } else {
        include "404_box.php";
    }
} else {
    include "vents/list_product.php";
}
