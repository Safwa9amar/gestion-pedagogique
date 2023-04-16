<?php
session_start();
include 'includes/database.php';
include 'includes/goTopage.php';
include 'includes/config.php';
include 'includes/alert.php';
include 'includes/functions.php';
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
$config = getRowById('config', 1);
$selcted_lang = $config['lang'];

if ($selcted_lang) {
    $_SESSION['lang'] = $selcted_lang;
}

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    // update lang in db
    editRow('config', ['lang' => $_GET['lang']], 1);
} else if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

if (isset($_SESSION['lang'])) {
    include 'lang/' . $_SESSION['lang'] . '.php';
}
?>
<!DOCTYPE html>
<?php include 'templates/components/header.php'; ?>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        <?php
        include 'templates/components/navbar.php';
        include 'templates/components/sidebare.php';
        ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if (in_array($page, $pages)) {
                        gotoPage($page);
                    } else {
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
<?php include 'templates/components/scripts.php'; ?>
<script>
    // $(document).on('DOMContentLoaded',function () {
    //     console.clear()
    // })
</script>

</html>