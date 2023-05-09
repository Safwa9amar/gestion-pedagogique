<?php
include urlFor(CONTROLLERS, 'languagesController.php');
$db_lang = new LanguageController();
$db_lang->getLang();

foreach ($db_lang->includeLang(LANUAGES_FILES, LANG . '/') as $file) {
    include_once $file;
}

