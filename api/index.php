<?php
include '../app/config/config.php';
include 'config.php';
if (isset($_SESSION['is_logged'])) {
    // check if request is valid 
    if (isset($_GET['route'])) {
        // get the route
        $route = $_GET['route'];
        // check if the route exists
        if (array_key_exists($route, $routes)) {
            // get the file name
            $table = $routes[$route];
            // include the file
            try {
                // handle fatal errors from routes 
                if (isset($_GET['id'])) {
                    globalApi($table, $_GET['id']);
                } else {
                    globalApi($table);
                }
            } catch (TypeError) {
                echo json_encode(['error' => 'invalid request']);
            }
        } else {
            echo json_encode(['error' => 'invalid request']);
        }
    } else {
        echo json_encode(['error' => 'invalid request']);
    }
} else {
    echo json_encode(['error' => 'unauthorized']);
}