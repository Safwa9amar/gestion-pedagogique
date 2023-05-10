<?php
$lang = new LanguageController();
$app_lang = $lang->app_lang;

$sub_views = [
    'branch_et_specialite',
    'impression_des_formulaires',
    'open_section',
    'show_section',
    
];
if (isset($_GET['sub_view'])) {
    $sub_view = $_GET['sub_view'];
    if (in_array($sub_view, $sub_views)) {
        include 'views/admin/formations/' . $sub_view . '.php';
    } else {
        // error document 404 
        gotoPage('404_box');
    }  
}

?>