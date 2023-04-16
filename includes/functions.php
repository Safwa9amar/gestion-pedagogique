<?php

// cehck if server request url is api function
function isApi($url)
{
    $url = explode('/', $url);
    if ($url[1] == 'api') {
        return true;
    } else {
        return false;
    }
}

function getBrand($brand_id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT name FROM brands WHERE id = '$brand_id'";
    $brand = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $brand;
}

// get all brands
function getAllBrands()
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM brands";
    $brands = mysqli_query($connection, $query);
    return $brands;
}

// get all categories
function getAllCategories()
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);
    return $categories;
}
// get all clients
function getAllClients()
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM clients";
    $clients = mysqli_query($connection, $query);
    return $clients;
}

// get client by id
function getClient($id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM clients WHERE id = '$id'";
    $client = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $client;
}

// get all achats
function getAllAchats()
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM achats";
    $achats = mysqli_query($connection, $query);
    return $achats;
}


// get all wilayat
function getAllWilayat()
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM wilayat";
    $wilayat = mysqli_query($connection, $query);
    return $wilayat;
}
// get wilayat by id
function getWilayaById($wilayat_id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT name FROM wilayat WHERE id = '$wilayat_id'";
    $wilayat = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $wilayat;
}

function getCategory($category_id)
{

    isApi($_SERVER['REQUEST_URI'])
        ? include '../includes/database.php'
        : include 'includes/database.php';
    $query = "SELECT name FROM categories WHERE id = '$category_id'";
    $category = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $category;
}
// get all products
function getAllProducts()
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM products";
    $products = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);
    return $products;
}
// get product by id
function getProduct($id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM products WHERE id = '$id'";
    $product = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $product;
}

// getRowById
function getRowById($table, $id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM $table WHERE id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $row;
}
function getRowByParam($table, $param, $qr)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM $table WHERE $param = '$qr'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $row;
}
// get all rows from a table
function getAllRows($table)
{
    // check if api in url directory
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';

    $query = "SELECT * FROM $table";
    // fetch all rows from the table
    $rows = mysqli_fetch_all(mysqli_query($connection, $query), MYSQLI_ASSOC);
    return $rows;
}

// get category by id
function getCategoryById($id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "SELECT * FROM categories WHERE id = '$id'";
    $category = mysqli_fetch_assoc(mysqli_query($connection, $query));
    return $category;
}



// function that deletes a row from a table
function deleteRow($table, $id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "DELETE FROM $table WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    return $result;
}

// edit row
function editRow($table, array $data, $id)
{
    isApi($_SERVER['REQUEST_URI']) ? include '../includes/database.php' : include 'includes/database.php';
    $query = "UPDATE $table SET ";
    foreach ($data as $key => $value) {
        $query .= "$key = '$value', ";
    }
    $query = substr($query, 0, -2);
    $query .= " WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    return $result;
}
// compare old data with new data to see if there are any changes and return the changes
function compareData($old_data, $new_data)
{
    $changes = array();
    foreach ($old_data as $key => $value) {
        if ($value != $new_data[$key]) {
            $changes[$key] = $new_data[$key];
        }
    }
    return $changes;
}


// add row
function addRow($table, array $data)
{
    isApi($_SERVER['REQUEST_URI'])
        ? include '../includes/database.php'
        : include 'includes/database.php';
    $query = "INSERT INTO $table (";
    foreach ($data as $key => $value) {
        $query .= "$key, ";
    }
    $query = substr($query, 0, -2);
    $query .= ") VALUES (";
    foreach ($data as $key => $value) {
        $query .= "'$value', ";
    }
    $query = substr($query, 0, -2);
    $query .= ")";
    $result = mysqli_query($connection, $query);
    return $result;
}

// reference generator function
function generateReference($table, $column)
{
    include 'includes/database.php';
    $query = "SELECT $column FROM $table ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $reference = $row[$column];
    $reference = substr($reference, 4);
    $reference = (int) $reference;
    $reference++;
    $reference = "REF " . $reference;
    return $reference;
}

function uploadImg($img, $img_destination)
{
    $img_name = $img['name'];
    $img_tmp_name = $img['tmp_name'];
    $img_size = $img['size'];
    $img_error = $img['error'];
    $img_type = $img['type'];

    $img_ext = explode('.', $img_name);
    $img_actual_ext = strtolower(end($img_ext));

    $allowed = array('jpg', 'jpeg', 'png');
    // check if directory exists
    $directory = "path/to/directory"; // Replace with the path to the directory you want to check/create

    if (!is_dir($img_destination)) {
        mkdir($img_destination, 0777, true); // Creates the directory with full permissions
    }

    // check if file is not empty

    if (!empty($img_name)) {

        if (in_array($img_actual_ext, $allowed)) {
            // check if file type is allowed
            if ($img_error === 0) {
                if ($img_size < 1000000) {
                    $img_new_name = uniqid('') . "." . $img_actual_ext;
                    $new_img_destination = $img_destination . $img_new_name;
                    move_uploaded_file($img_tmp_name, $new_img_destination);
                    // unlink old image using tornary operator

                    return $img_new_name;
                } else {
                    // echo "Your file is too big!";
                    return 1;
                }
            } else {
                // echo "There was an error uploading your file!";
                return 2;
            }
        } else {
            // echo "You cannot upload files of this type!";
            return 3;
        }
    } else {
        // echo "Please select a file!";
        return 4;
    }
}


// generate cvs file from database
function generateCSV($table)
{
    include 'includes/database.php';
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);
    $num_fields = mysqli_num_fields($result);
    $headers = array();
    for ($i = 0; $i < $num_fields; $i++) {
        $headers[] = mysqli_fetch_field_direct($result, $i)->name;
    }
    $fp = fopen('php://output', 'w');
    if ($fp && $result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $table . '.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');
        fputcsv($fp, $headers);
        while ($row = mysqli_fetch_row($result)) {
            fputcsv($fp, array_values($row));
        }
        die;
    }
}