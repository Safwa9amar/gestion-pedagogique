<?php
include_once '../app/config/config.php';
include_once '../app/controllers/dataBaseController.php';
$db = new DatabaseController();
$students = $db->getRowsByParam('students', 'speciality_id', $_GET['id']);
echo json_encode($students);