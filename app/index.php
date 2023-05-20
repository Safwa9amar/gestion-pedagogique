<?php
require '../vendor/autoload.php';
session_start();
include 'config/config.php';
include 'helpers/urlFor.php';
include 'helpers/goTopage.php';
include 'helpers/alert.php';
include 'helpers/uploadFile.php';
include 'controllers/dataBaseController.php';
include 'controllers/languagesController.php';
include 'models/MainModel.php';
include 'models/Student.php';
include 'models/Formateur.php';
include 'models/Speciality.php';
// url for config
// check if user is logged in
if (!isset($_SESSION['user'])) {
    header('location:../index.php');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    sleep(1);
    header('location:../index.php');
}

$lang = new LanguageController();
$app_lang = $lang->app_lang;

    if (isset($_GET['lang'])) {
    $lang->setLang($_GET['lang']);
    $lang->updateLang();
    $lang->__construct();
    echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "'</script>";
}

?>
<!DOCTYPE html>
<?php include urlFor(COMPONENTS, 'header.php'); ?>

<bod dir="<?php
if (isset($_SESSION['lang'])) {
    if ($_SESSION['lang'] == 'ar') {
        echo 'rtl';
    } else {
        echo 'ltr';
    }
} else {
    echo 'ltr';
}

?>">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <?php
    //    check user role
    if ($_SESSION['user']['role'] == 'admin') {
        include urlFor(VIEWS . '/admin/', 'index.php');
    } elseif ($_SESSION['user']['role'] == 'student') {
        include urlFor(VIEWS . '/student/', 'index.php');
    } elseif ($_SESSION['user']['role'] == 'formateur') {
        include urlFor(VIEWS . '/formateur/', 'index.php');

    }

    ?>

    </div>
    <?php

    foreach (MSG_TYPES as $type) {
        if (isset($_SESSION[$type])) {
            echo $_SESSION[$type];
            include 'helpers/msg/' . $type . '.php';
        }
    }
    ?>
</body>
<?php include urlFor(COMPONENTS, 'scripts.php'); ?>

</html>