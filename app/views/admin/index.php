<?php
// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();
include urlFor(COMPONENTS, 'sidebare.php');

?>
<div 
style="
  padding: 5rem;
"
class="container">
<?php include urlFor(COMPONENTS, 'navbar.php'); ?>
<div class="jumbotron">
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
</div>