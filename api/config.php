<?php
// create array of routes 
session_start();

$routes = [
    'products' => 'products',
    'categories' => 'categories',
    'wilayat' => 'wilayat',
    'achats' => 'achats',
    'brands' => 'brands',
    'ventes' => 'ventes',
    'clients' => 'clients',
    'fournisseurs' => 'fournisseurs',
    'users' => 'users',
    'login' => 'login',
    'logout' => 'logout',
    'register' => 'register',
    'profile' => 'profile',
    'dashboard' => 'dashboard',
    'settings' => 'settings',
    '404' => '404',
    '500' => '500',
    'blank' => 'blank',
    'buttons' => 'buttons',
    'cards' => 'cards',
    'charts' => 'charts',
    'forgot-password' => 'forgot-password',
];


function globalApi($table, $id = null)
{
    if ($id != null) {
        $result = getRowById($table, $id);
        // return the result as json
        echo $result != null ? json_encode($result) : json_encode(['error' => 'not found']);
    } else {
        // get all products from db
        $result = getAllRows($table);
        // if search query is set
        if (isset($_GET['search'])) {
            // get the search query
            $search = $_GET['search'];
            // filter the result
            $result = array_filter($result, function ($item) use ($search) {
                // check if the search query is in the item name and suk
                if (strpos(strtolower($item['name']), strtolower($search)) !== false) {
                    return true;
                } else if (strpos($item['SKU'], $search) !== false) {
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