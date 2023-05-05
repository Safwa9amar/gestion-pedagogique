<?php
include '../app/models/Speciality.php';
// request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if the submit button is clicked
        // check if the form is valid
        if (isset($_POST['branch_id']) && isset($_POST['code']) && isset($_POST['name']) && isset($_POST['level']) && isset($_POST['certificate']) && isset($_POST['duration']) && isset($_POST['training_mode']) && isset($_POST['conditions'])) {
            // create a new speciality
            $speciality = new Speciality();
            $speciality->setBranchId($_POST['branch_id']);
            $speciality->setCode($_POST['code']);
            $speciality->setName($_POST['name']);
            $speciality->setLevel($_POST['level']);
            $speciality->setCertificate($_POST['certificate']);
            $speciality->setDuration($_POST['duration']);
            $speciality->setTrainingMode($_POST['training_mode']);
            $speciality->setConditions($_POST['conditions']);
            sleep(1);
            $speciality->create() ? http_response_code(200) : http_response_code(500);
            // header('Location: index.php?controller=specialities&action=showAll');
        }
}