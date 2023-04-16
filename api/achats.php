<?php
// Path: api\add_purchase.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '../includes/database.php';
    include '../includes/functions.php';
    if (isset($_GET['add'])) {

        $data = [
            'Supplier' => $_POST['supplier'],
            'Date' => $_POST['purchase_date'],
            'Status' => $_POST['status'],
            'product_list' => $_POST['data'],
            'Reference' => $_POST['ref'],
            'Grand_Total' => $_POST['grand_total'],
        ];
        $result = addRow('achats', $data);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Purchase added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Purchase not added']);
        }
    }
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        $data = [
            'Supplier' => $_POST['supplier'],
            'Date' => $_POST['purchase_date'],
            'Status' => $_POST['status'],
            'product_list' => $_POST['data'],
            'Reference' => $_POST['ref'],
            'Grand_Total' => $_POST['grand_total'],
        ];
        $result = editRow('achats', $data, $id);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Purchase updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Purchase not updated']);
        }
    }
}