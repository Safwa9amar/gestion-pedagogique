<?php
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
include urlFor(COMPONENTS, 'sidebare.php');
include urlFor(COMPONENTS, 'navbar.php');
?>
<div style="<?php
if (isset($_SESSION['lang'])) {
    if ($_SESSION['lang'] == 'ar') {
        echo 'margin-right: 260px;';
    } else {
        echo 'margin-left: 260px;';
    }
} else {
    echo 'margin-left: 260px;';
}
?>
    " class="page-wrapper">
    <?php
    if (isset($_GET['view'])) {
        $view = $_GET['view'];
        if (in_array($view, VIEWSLIST)) {
            gotoPage($view);
        } else {
            // error document 404 
            gotoPage('404_box');
        }
    } else {
        gotoPage('dashboard');
    }

    ?>
</div>