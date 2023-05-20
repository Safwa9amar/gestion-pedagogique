<?php
include '../app/config/config.php';
include '../app/controllers/DataBaseController.php';
include '../app/models/MainModel.php';
include '../app/models/Section.php';
// check if all required fields are set
print_r($_POST);
if (
    empty($_POST['numero']) ||
    empty($_POST['date']) ||
    empty($_POST['code']) ||
    empty($_POST['speciality']) ||
    empty($_POST['qualification']) ||
    empty($_POST['debut']) ||
    empty($_POST['students']) ||
    empty($_POST['manager'])
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
$speciality = $db->getRowById('specialities', $_POST['speciality']);
$students = $db->getAllRows('stagaires');
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
$section->setEnd();
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