<!DOCTYPE html>
<html lang="en">
<?php
include 'config/config.php';
include 'helpers/urlFor.php';
include COMPONENTS . '/header.php';

?>

<body class="error-page">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <div class="error-box">
            <h1>404</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i>Oops! Page non trouvée!</h3>
            <p class="h4 font-weight-normal">La page que vous avez demandée n'a pas été trouvée.</p>
            <a href="index.php" class="btn btn-primary">Retour </a>
        </div>
    </div>


</body>
<?php include  COMPONENTS . '/scripts.php'; ?>

</html>