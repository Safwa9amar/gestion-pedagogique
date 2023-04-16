<?php
$user = "root";
$password = '';
$host = "localhost";
$db = "gestion_stock";
$connection = mysqli_connect($host, $user, $password) or die("Unable to connect!");

$db_q = "CREATE DATABASE IF NOT EXISTS gestion_stock";
mysqli_query($connection, $db_q);
mysqli_select_db($connection, $db) or die("Unable to select database!");
// check if db is empty
$check = mysqli_query($connection, "SELECT * FROM `clients`");
if (mysqli_num_rows($check) == 0) {
    // import sql file
    $sql = file_get_contents("./gestion_stock.sql");
    if (mysqli_multi_query($connection, $sql)) {
        echo "SQL file imported successfully";
    } else {
        echo "Error importing SQL file: " . mysqli_error($connection);
    }
}
