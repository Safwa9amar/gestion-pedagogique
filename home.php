<?php
session_start();
include 'config.php';
include 'helpers/urlFor.php';
include 'helpers/goTopage.php';
include 'helpers/alert.php';
include urlFor(CONTROLLERS, 'dataBaseController.php');
// check if user is logged in
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('location:index.php');
}

// language
$db = new DatabaseController();
$config = $db->getRowById('config', 1);
$selcted_lang = $config['lang'];

if ($selcted_lang) {
    $_SESSION['lang'] = $selcted_lang;
}

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    // update lang in db
    $db->updateRow('config', 1, ['lang' => $_GET['lang']]);
} else if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

if (isset($_SESSION['lang'])) {
    include urlFor(LANG, $_SESSION['lang'] . '.php');
}
?>
<!DOCTYPE html>
<?php include urlFor(COMPONENTS, 'header.php'); ?>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        <?php
        include urlFor(COMPONENTS, 'sidebare.php');
        include urlFor(COMPONENTS, 'navbar.php');
        ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if (in_array($page, VIEWSLIST)) {
                        gotoPage($page);
                    } else {
                        // error document 404 
                        gotoPage('404_box');
                    }
                } else {
                    gotoPage('dashboard');
                }

                ?>
            </div>
        </div>

    </div>
</body>
<?php include urlFor(COMPONENTS, 'scripts.php'); ?>
</html>