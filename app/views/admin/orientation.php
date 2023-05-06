<?php

$db_lang = new LanguageController();
$db_lang->getLang();

foreach ($db_lang->includeLang(LANUAGES_FILES, LANG . '/') as $file) {
    include $file;
}

$sub_views = [
    'add_aprentis',
    'list_aprentis',
];
if (isset($_GET['sub_view'])) {
    $sub_view = $_GET['sub_view'];
    if (in_array($sub_view, $sub_views)) {
        include 'views/admin/orientation/' . $sub_view . '.php';
    } else {
        // error document 404 
        gotoPage('404_box');
    }  
}

?>