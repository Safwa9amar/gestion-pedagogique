<?php
include '../app/config/config.php';
include '../app/controllers/dataBaseController.php';
class Branch{
    private $code;
    private $name_ar;
    private $name_fr;

   
    public function getCode(){
        return $this->code;
    }

    public function getNameAr(){
        return $this->name_ar;
    }

    public function getNameFr(){
        return $this->name_fr;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function setNameAr($name_ar){
        $this->name_ar = $name_ar;
    }   

    public function setNameFr($name_fr){
        $this->name_fr = $name_fr;
    }

    public function create(){
        $db = new DataBaseController();
        $data = array(
            'code' => $this->code,
            'Intitule_ar' => $this->name_ar,
            'Intitule_fr' => $this->name_fr
        );
        return $db->insertRow('branches', $data) ? true : false; 

    }
    public function update(){
        $db = new DataBaseController();
        $data = array(
            'code' => $this->code,
            'Intitule_ar' => $this->name_ar,
            'Intitule_fr' => $this->name_fr
        );
        $db->updateRow('branches', $this->code, $data);
    }

}