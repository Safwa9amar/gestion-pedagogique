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
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo urlFor('assets/img', 'favicon.jfif') ?>">
    <link rel="stylesheet" href="<?php echo urlFor(CSS, 'bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo urlFor(CSS, 'animate.css') ?>">
    <link rel="stylesheet" href="<?php echo urlFor(CSS, 'dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo urlFor('assets/plugins/fontawesome/css', 'fontawesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo urlFor('assets/plugins/fontawesome/css', 'all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo urlFor(CSS, 'style.css') ?>">
</head>