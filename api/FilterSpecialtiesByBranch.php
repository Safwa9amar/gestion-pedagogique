<?php
include_once '../app/config/config.php';
include_once '../app/controllers/dataBaseController.php';
$db = new DatabaseController();
$specialities = $db->getRowsByParam('specialities', 'branch_id', $_POST['id']);
echo json_encode($specialities);