<?php
// Path: views\orientation\impression_des_formulaires.php
// list des formulaires
$db = new DataBaseController();
$forms = $db->getAllRows('formulaires');
// show list

?>

<!-- bootstrap horiwental card -->
<?php
foreach ($forms as $form) {
    ?>
    <div class="card flex-fill bg-white">

        <div class="card-body">
            <h5 class="card-title">
                <?php
                if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                    echo $form['name_ar'];
                } else {
                    echo $form['name_fr'];
                }
                ?>
            </h5>
            <p class="card-text">
                <?php
                if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                    echo $form['description_ar'];
                } else {
                    echo $form['description_fr'];
                }
                ?>

            </p>
        </div>
        <div class="card-footer text-muted">
            <?php
            $filename_ar = $form['filename_ar'];
            $filename_fr = $form['filename_fr'];
            ?>
            <?php
            if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                if ($filename_ar != '') {
                    ?>
                    <a href="views/orientation/formulaires/?file=<?php echo $filename_ar ?>" class="btn btn-primary">
                        <?php echo $lang['imprimer'] ?>
                    </a>
                    <?php
                }
            } else {
                if ($filename_fr != '') {
                    ?>
                    <a href="views/orientation/formulaires/?file=<?php echo $filename_fr ?>" class="btn btn-primary">
                        <?php echo $lang['imprimer'] ?>
                    </a>
                    <?php
                }
            }
            ?>
            </a>
        </div>
    </div>
    <?php
}
?>