<?php
// include config file
include '../app/models/Branch.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if the submit button is clicked
        // check if the form is valid
        if (isset($_POST['branch_code']) && isset($_POST['branch_fr']) && isset($_POST['branch_ar'])) {
            // create a new branch
            $branch = new Branch();
            $branch->setCode($_POST['branch_code']);
            $branch->setNameAr($_POST['branch_fr']);
            $branch->setNameFr($_POST['branch_ar']);
            
            sleep(1);
            $branch->create() ? http_response_code(200) : http_response_code(500);
            
            // header('Location: index.php?controller=specialities&action=showAll');
        }
}