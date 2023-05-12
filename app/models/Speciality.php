<?php
include 'MainModel.php';
// Speciality class model
class Speciality extends MainModel {
    private $id;
    private $branch_id;
    private $code;
    private $name;
    private $level;
    private $certificate;
    private $duration;
    private $conditions;
    private $training_mode;

    private $created_at;
    private $updated_at;
    public function __construct() {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        parent::__construct();
    }
    public function getId() {
        return $this->id;
    }
    public function getBranchId() {
        return $this->branch_id;
    }
    public function getCode() {
        return $this->code;
    }
    public function getName() {
        return $this->name;
    }
    public function getLevel() {
        return $this->level;
    }
    public function getCertificate() {
        return $this->certificate;
    }
    public function getDuration() {
        return $this->duration;
    }
    public function getConditions() {
        return $this->conditions;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }
    public function getUpdatedAt() {
        return $this->updated_at;
    }
    public function setId($id) {
        $this->id = $id;
    }
      // getTrainingMode
      public function getTrainingMode() {
        return $this->training_mode;
    }
    // setTrainingMode
    public function setTrainingMode($training_mode) {
        $this->training_mode = $training_mode;
    }
    public function setBranchId($branch_id) {
        $this->branch_id = $branch_id;
    }
    public function setCode($code) {
        $this->code = $code;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setLevel($level) {
        $this->level = $level;
    }
    public function setCertificate($certificate) {
        $this->certificate = $certificate;
    }
    public function setDuration($duration) {
        $this->duration = $duration;
    }
    public function setConditions($conditions) {
        $this->conditions = $conditions;
    }
  

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
    // create
    public function create() {
        // dataBaseController
        $arr = array(
            'branch_id' => $this->branch_id,
            'code' => $this->code,
            'name' => $this->name,
            'level' => $this->level,
            'certificate' => $this->certificate,
            'duration' => $this->duration,
            'conditions' => $this->conditions,
            'training_mode' => $this->training_mode,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        );
        return $this->insertRow('specialities', $arr) ? true : false; 
    }
    public function update() {
        // dataBaseController
        $arr = array(
            'branch_id' => $this->branch_id,
            'code' => $this->code,
            'name' => $this->name,
            'level' => $this->level,
            'certificate' => $this->certificate,
            'duration' => $this->duration,
            'conditions' => $this->conditions,
            'training_mode' => $this->training_mode,
            'updated_at' => $this->updated_at
        );
        return $this->updateRow('specialities', $this->id, $arr) ? true : false;
    }
}