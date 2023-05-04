<?php
// include config file
include '../app/config/config.php';
include '../app/controllers/dataBaseController.php';
// get values and check if values not empty and insert branch
if (isset($_POST['branch_code'])  && isset($_POST['branch_fr']) && isset($_POST['branch_ar'])) {
    $branch_code = $_POST['branch_code'];
    $branch_fr = $_POST['branch_fr'];
    $branch_ar = $_POST['branch_ar'];
    if (!empty($branch_code)  && !empty($branch_fr) && !empty($branch_ar)) {
        // insert branch
        $db = new DataBaseController();
        $db->insertRow('branches', [
            'code' => $branch_code,
            'Intitule_ar' => $branch_fr,
            'Intitule_fr' => $branch_ar
        ]);
        sleep(1);
        if ($db) {
            http_response_code(200);
        } else {
            http_response_code(500);
        }
    }
}