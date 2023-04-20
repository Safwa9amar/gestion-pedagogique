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
define('HELPERS', 'helpers');
define('VIEWS','views');
// uploads/formulaires/
define('DOC_UPLOADS', VIEWS . '/orientation/formulaires/');

// database config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'service_technique');

// define pages
define('VIEWSLIST', [
    'dashboard',
    'profile',
    'settings',
    'orientation',
]);
// SUBVIEWSLIST
define('SUBVIEWSLIST', [
   'impression_des_formulaires'
]);

// msessage types
define('MSG_TYPES', [
    'success',
    'error',
    'warning',
    'info',
]);