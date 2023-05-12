<?php
include '../app/config/config.php';
include '../app/controllers/DataBaseController.php';
include '../app/models/MainModel.php';
include '../app/models/Section.php';
// check if all required fields are set
print_r($_POST);
if (
    !isset($_POST['numero']) ||
    !isset($_POST['date']) ||
    !isset($_POST['code']) ||
    !isset($_POST['speciality']) ||
    !isset($_POST['qualification']) ||
    !isset($_POST['debut']) ||
    !isset($_POST['fin']) ||
    !isset($_POST['students']) ||
    !isset($_POST['manager'])
) {
    sleep(1);
    http_response_code(400);
    $_SESSION['error'] = 'Missing required fields';
    echo json_encode(['message' => 'Missing required fields']);
    exit();
}
$db = new dataBaseController();
$section = new Section();
$selected_students = [];
$students = $db->getAllRows('students');
foreach ($students as $student) {
    if (in_array($student['id'], $_POST['students'])) {
        array_push($selected_students, $student);
    }
}
$girls = 0;
$boys = 0;
foreach ($selected_students as $student) {
    if ($student['gender'] == 'f') {
        $girls++;
    } else {
        $boys++;
    }
}
$section->setGirls($girls);
$section->setBoys($boys);

$section->setCode($_POST['code']);
$section->setNumero($_POST['numero']);
$section->setDate($_POST['date']);
$section->setSpeciality($_POST['speciality']);
$section->setQualification($_POST['qualification']);
$section->setStart($_POST['debut']);
$section->setEnd($_POST['fin']);
$section->setEffective(count($_POST['students']));
// TODO:: get manager id from session
$section->setManager($_POST['manager']);
// TODO:: get manager id from session

$section->setTrainees(implode(',', $_POST['students']));
sleep(1);
if ($section->create()) {
    http_response_code(200);
} else {
    http_response_code(500);
}