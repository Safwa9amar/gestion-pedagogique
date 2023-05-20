<?php
// create array of routes 
session_start();
include '../app/controllers/dataBaseController.php';
$routes = [
    'users' => 'users',
<<<<<<< HEAD
    'students' => 'students',
    'specialities' => 'specialities',
=======
    'stagaires' => 'stagaires',
>>>>>>> 9011bfa69bb15fa1b898989237cfb8d45c18ac3c
];

function globalApi($table, $id = null)
{
    $db = new DatabaseController();
    if ($id != null) {
        // use dateBaseCotrller 
        // get the row by id
        $result = $db->getRowById($table, $id);
        // return the result as json
        echo $result != null ? json_encode($result) : json_encode(['error' => 'not found']);
    } else {
        // get all products from db
        $result = $db->getAllRows($table);
        // if search query is set
        if (isset($_GET['search'])) {
            // get the search query
            $search = $_GET['search'];
            // filter the result
            $result = array_filter($result, function ($item) use ($search) {
                // return false if key is not found
               if (strpos($item['id'], $search) !== false) {
                    return true;
                } else {
                    return false;
                }
            });
        }
        // convert the result to array
        $result = array_values($result);
        // return the result as json
        echo json_encode($result);
    }
}