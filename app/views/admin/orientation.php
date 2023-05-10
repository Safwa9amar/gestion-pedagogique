<?php
$lang = new LanguageController();
$app_lang = $lang->app_lang;

$sub_views = [
    'add_aprentis',
    'list_aprentis',
    'add_formateur',
    'list_formateur',
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