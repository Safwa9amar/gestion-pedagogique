<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="hamza hassani , 0674020244">
    <meta name="description" content="Gestion de service technique">
    <title>
        <?php
        if (isset($_GET['page'])) {
            // capitalize first letter
            $page = ucfirst($_GET['page']);
            echo $page;
        } else {
            echo APP_NAME;
        }
        ?>
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7a3ec529632909.55fc107b84b8c.png?>">
    <link rel="stylesheet" href="<?php
    // check if the app folder in  request url
    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../' . CSS, 'bootstrap.min.css', 24);

    } else {
        echo '../' . urlFor('../' . CSS, 'bootstrap.min.css', 24);
        echo urlFor(CSS, 'bootstrap.min.css', 24);
    }

    ?>">

    <link rel="stylesheet" href="<?php
    // check if the app folder in  request url
    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../' . CSS, 'dataTables.bootstrap4.min.css', 24);

    } else {
        echo urlFor(CSS, 'dataTables.bootstrap4.min.css', 24);
    }

    ?>">
    <link rel="stylesheet" href="<?php
    // check if the app folder in  request url
    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../public/plugins/fontawesome/css', 'fontawesome.min.css', 24);

    } else {
        echo urlFor('../public/plugins/fontawesome/css', 'fontawesome.min.css', 24);
    }
    ?>">
    <link rel="stylesheet" href="<?php
    // check if the app folder in  request url
    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../public/plugins/fontawesome/css', 'all.min.css', 24);
    } else {
        echo urlFor('../public/plugins/fontawesome/css', 'all.min.css', 24);
    }

    ?>">
    <link rel="stylesheet" href="<?php
    // check if the app folder in  request url
    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../' . CSS, 'navbar-fixed-right.min.css', 24);

    } else {
        echo urlFor(CSS, 'navbar-fixed-right.min.css', 24);
    }
    ?>">
    <link rel="stylesheet" href="<?php
    // check if the app folder in  request url
    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../' . CSS, 'navbar-fixed-left.min.css', 24);

    } else {
        echo urlFor(CSS, 'navbar-fixed-left.min.css', 24);
    }
    ?>">
    <link rel="stylesheet" href="<?php

    if (strpos($_SERVER['REQUEST_URI'], 'app')) {
        echo '../' . urlFor('../' . CSS, 'style.css', 24);
    } else {
        echo urlFor(CSS, 'style.css', 24);
    }
    ?>">



    <?php
    if (!isset($_SESSION['is_logged'])) {
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
    }
    ?>
</head>
