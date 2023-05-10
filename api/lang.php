<?php

die();
$lang = new LanguageController();
$json = file_get_contents('../app/views/admin/data.json');
// decode json

$json_data = json_decode($json, true);
$new_json_data = [
    'title' => [
        'arabic' => '',
        'french' => '',
    ],  
];

$arabic = $json_data['arabic'];
$french = $json_data['french'];
$final_data = [];
// loop through arabic and french
foreach ($arabic as $key => $value) {
    // push data to new json
    $new_json_data = [
        $key => [
            'arabic' => $value,
            'french' => $french[$key],
        ],  
    ];
    // $db = new DataBaseController();
    // $db -> execute("INSERT INTO `lang` (`id`,`key` ,`arabic`, `french`) VALUES (NULL, '$key','$value', '$french[$key]')");
    // push data to final data
    array_push($final_data, $new_json_data);

}
