<?php
// create language cotroller class 
class LanguageController extends DataBaseController
{
    // table name
    public $table = 'lang';
    // language variables
    // lang
    private $lang;
    public $app_lang = [];
    // constructor
    public function __construct()
    {
        parent::__construct();
        // get language from database
        $db_lang = $this->getRowByParam('config', 'name', 'language');
        $this->setLang($db_lang['value']);
        // set language session variable
        $_SESSION['lang'] = $this->lang ? $this->lang : $_SESSION['lang'];
        $data = $this->getAllRows($this->table);
        foreach ($data as $key => $value) {
            if ($_SESSION['lang'] == 'ar') {
                $this->app_lang[$value['key']] = $value['arabic'];
            } else if ($_SESSION['lang'] == 'fr') {
                $this->app_lang[$value['key']] = $value['french'];
            }
        }
    }
    public function setLang($lang)
    {
        $this->lang = $lang;
    }
    public function updateLang()
    {
        $this->updateRowByParam('config', ['value' => $this->lang], 'language', 'name');
        $this->__construct();
    }
}