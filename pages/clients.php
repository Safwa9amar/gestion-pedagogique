<?php

if (isset($_GET['sub_page'])) {
    $page = $_GET['sub_page'];
    if ($page == "add_clients") {
        include "clients/add_clients.php";
    }
     elseif ($page == "list_clients") {
        include "clients/list_clients.php";
    } 
     elseif ($page == "edit_client") {
        include "clients/edit_client.php";
    } 
    else {
        include "404_box.php";
    }
} else {
    include "client/list_product.php";
}
