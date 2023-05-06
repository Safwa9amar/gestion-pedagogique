<?php
class Section extends MainModel{
    // table name
    private $table = "sections";
    // Numéro 
    private $id;
    // Date 
    private $date;
    // Spécialité 
    private $speciality;
    // Code de la section 
    private $code;
    // Niveau de qualification 
    private $qualification;
    // Début de formation 
    private $start;
    // Fin de formation
    private $end;
    // Nombre d'apprenants  effectif
    private $effective;
    // Nombre d'apprenants  girls
    private $girls;
    // Nombre d'apprenants  boys
    private $boys;
    // Responsable  de la section
    private $manager;
    // LISTE DES APPRENANTS  INCORPORES
    private $trainees;
    // constructor
    public function __construct() {
        parent::__construct();
        
    }
    //create
    public function create() {
        $param = [
            'date' => $this->date,
            'speciality' => $this->speciality,
            'code' => $this->code,
            'qualification' => $this->qualification,
            'start' => $this->start,
            'end' => $this->end,
            'effectif' => $this -> effective,
            'manager' => $this->manager,
            'trainees' => $this->trainees,
        ];
        return parent::createRow($this->table, $param) ? true : false;
    }
    // setter and getter
    public function setId($id) {
        $this->id = $id;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setSpeciality($speciality) {
        $this->speciality = $speciality;
    }
    public function setCode($code) {
        $this->code = $code;
    }
    public function setQualification($qualification) {
        $this->qualification = $qualification;
    }
    public function setStart($start) {
        $this->start = $start;
    }
    public function setEnd($end) {
        $this->end = $end;
    }
    public function setEffective($effective) {
        $this->effective = $effective;
    }

    public function setManager($manager) {
        $this->manager = $manager;
    }
    public function setTrainees($trainees) {
        $this->trainees = $trainees;
    }
    // getters
    public function getId() {
        return $this->id;
    }
    public function getDate() {
        return $this->date;
    }
    public function getSpeciality() {
        return $this->speciality;
    }
    public function getCode() {
        return $this->code;
    }
    public function getQualification() {
        return $this->qualification;
    }
    public function getStart() {
        return $this->start;
    }
    public function getEnd() {
        return $this->end;
    }
    public function getEffective() {
        return $this->effective;
    }
    public function getManager() {
        return $this->manager;
    }
    public function getTrainees() {
        return $this->trainees;
    }
    // read all
    public function readAll() {
        $sql = "SELECT * FROM $this->table";
        return parent::getAllRows($this->table);
    }
}