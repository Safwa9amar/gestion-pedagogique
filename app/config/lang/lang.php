<?php
// french lang file
include urlFor(CONTROLLERS, 'languagesController.php');
$lang['dashboard'] = 'Tableau de bord';
$db_lang = new LanguageController();
$db_lang->getLang();
$db_lang->includeLang(LANUAGES_FILES,LANG.'/');
?>