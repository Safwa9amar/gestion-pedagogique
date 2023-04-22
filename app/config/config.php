<?php
// $is_logged = isset($_SESSION['user']) ?? false;

define('APP_NAME', 'Gestion de service technique');
define('CURRENCY', 'DZD');
define('API', './api/?route=');

// app map path 
// app
define('APP', 'app');
// ├── components
define('COMPONENTS', 'components');
// │   ├── header.php
// │   ├── navbar.php
// │   ├── scripts.php
// │   ├── sidebare.php
// │   └── topbar.php
define('CONFIG', 'config');
// ├── config
// │   └── config.php
define('LANG', CONFIG . '/lang');
//     └── lang
//         ├── ar.php
//         └── fr.php
define('CONTROLLERS', 'controllers');
// ├── controllers
// │   ├── dataBaseController.php
// │   └── userController.php
define('HELPERS', 'helpers');
// ├── helpers
// │   ├── uploadFile.php
// │   └── urlFor.php
define('VIEWS', 'views');
// ├── views
define('DOC_UPLOADS', VIEWS . '/orientation/formulaires/');
// │   ├── 404.php
// │   ├── home.php
// │   ├── index.php
// │   ├── login.php
// │   ├── register.php
// │   └── resetPassword.php
define('PUBPLIC', '../public');
// └── public
define('CSS', 'public/css');
//     ├── css
define('JS', 'public/js');
//     ├── js
define('IMG', PUBPLIC . '/img');
//     └── img
//     └── icons
define('ICONS', PUBPLIC . '/icons');



// uploads/formulaires/

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