<?php
// read data json file
$json = file_get_contents('../app/views/admin/data.json');
// decode json

$json_data = json_decode($json, true);
$new_json_data = [
    'title' => [
        'arabic' => '',
        'french' => '',
    ]
];

$arabic = $json_data['arabic'];
$french = $json_data['french'];