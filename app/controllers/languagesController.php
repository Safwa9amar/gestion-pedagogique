<?php
// create language cotroller class 
class LanguageController
{
    //  language the first row from config table in this class
    public function getLang()
    {
        $db = new DatabaseController();
        // get row by pa
        $config = $db->getRowByParam('config', 'name', 'language');

        $selcted_lang = $config['value'];

        if ($selcted_lang) {
            $_SESSION['lang'] = $selcted_lang;
        }
        if (isset($_GET['lang'])) {
            $_SESSION['lang'] = $_GET['lang'];
            // update lang in db
            $db->updateRow('config', 1, ['language' => $_GET['lang']]);
        } else if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'fr';
        }
        
    }
    // include language file 
    public function includeLang($fileList, $path = 'app/config/lang/')
    {
        $lang = $_SESSION['lang'];
        foreach ($fileList as $file) {
            include $path. $lang . '/' . $file . '.php';
        }
    }

}