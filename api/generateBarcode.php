<?php
// Path: api\barecode.php
require '../vendor/autoload.php';
$data = json_decode(file_get_contents('php://input'), true);

$generator = new Picqer\Barcode\BarcodeGeneratorSVG();
// delete all files in code folder
// check if data is empty
if (empty($data)) {
    // fire unauthorized error
    http_response_code(401);
    echo json_encode(array('message' => 'empty'));
    exit();
} else {
    array_map('unlink', glob('code/*'));
    // create new files
    foreach ($data as $code) {
        $file_name = $code['sku'] . '.svg';
        file_put_contents('code/' . $file_name, $generator->
            getBarcode($code['sku'], $generator::TYPE_CODE_128));
    }
    // check if file exists
    if (file_exists('code/' . $file_name)) {
        http_response_code(200);
        echo json_encode(array('message' => 'success'));
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'failed'));
    }
}