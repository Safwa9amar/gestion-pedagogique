<?php
// $is_logged = isset($_SESSION['user']) ?? false;

define('APP_NAME', 'Gestion de service technique');
define('CURRENCY', 'DZD');
define('API', './api/?route=');

//define folder structure
define('ASSETS', 'assets');
define('JS', 'assets/js');
define('CSS', 'assets/css');
define('TEMPLATES', 'templates');
define('COMPONENTS', 'components');
define('LANG', 'lang');
define('INCLUDES', 'includes');
define('CONTROLLERS', 'controllers');

// database config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'service_technique');

// define pages
define('VIEWS','views');
define('VIEWSLIST', [
    'dashboard',
    'profile',
    'settings',
]);