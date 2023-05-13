<?php
// create array of routes 
session_start();
include '../app/controllers/dataBaseController.php';
$routes = [
    'users' => 'users',
    'stagaires' => 'stagaires',
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
                // check if the search query is in the item name and suk
                if (strpos(strtolower($item['matricule']), strtolower($search)) !== false) {
                    return true;
                } else if (strpos($item['id'], $search) !== false) {
                    return true;
                } else {
                    return false;
                }
            });
        }
        // return the result as json
        echo json_encode($result);
    }
}