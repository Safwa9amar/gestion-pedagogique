<?php
class Student extends MainModel
{
    // table name
    private $table = "students";
    // table fields
    private $id;
    private $matricule;
    private $password;
    private $gender;
    private $first_name;
    private $last_name;
    private $birthday;
    private $born_place;
    private $email;
    private $phone;
    private $address;
    private $study_level;
    private $study_year;
    private $study_last_etablissement_name;
    private $father_name;
    private $father_job;
    private $mother_name;
    private $mother_job;
    private $branch_id;
    private $speciality_id;
    private $created_at;
    private $updated_at;
    // 26 -8 = 18
    private $connection;
    public function __construct()
    {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        // set matricule
        $this->matricule = $this->generateMatricule();
        // set password from matricule hash
        $this->password = password_hash($this->matricule, PASSWORD_DEFAULT);
    }

    // setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }
    // gender
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
    public function setBornPlace($born_place)
    {
        $this->born_place = $born_place;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function setStudyLevel($study_level)
    {
        $this->study_level = $study_level;
    }
    public function setStudyYear($study_year)
    {
        $this->study_year = $study_year;
    }
    public function setStudyLastEtablissementName($study_last_etablissement_name)
    {
        $this->study_last_etablissement_name = $study_last_etablissement_name;
    }
    public function setFatherName($father_name)
    {
        $this->father_name = $father_name;
    }
    public function setFatherJob($father_job)
    {
        $this->father_job = $father_job;
    }
    public function setMotherName($mother_name)
    {
        $this->mother_name = $mother_name;
    }
    public function setMotherJob($mother_job)
    {
        $this->mother_job = $mother_job;
    }
    public function setBranchId($branch_id)
    {
        $this->branch_id = $branch_id;
    }
    public function setSpecialityId($speciality_id)
    {
        $this->speciality_id = $speciality_id;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    // getters
    public function getId()
    {
        return $this->id;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function getBirthday()
    {
        return $this->birthday;
    }
    public function getBornPlace()
    {
        return $this->born_place;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getStudyLevel()
    {
        return $this->study_level;
    }
    public function getStudyYear()
    {
        return $this->study_year;
    }
    public function getStudyLastEtablissementName()
    {
        return $this->study_last_etablissement_name;
    }
    public function getFatherName()
    {
        return $this->father_name;
    }
    public function getFatherJob()
    {
        return $this->father_job;
    }
    public function getMotherName()
    {
        return $this->mother_name;
    }
    public function getMotherJob()
    {
        return $this->mother_job;
    }
    public function getBranchId()
    {
        return $this->branch_id;
    }
    public function getSpecialityId()
    {
        return $this->speciality_id;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    public function getMatricule()
    {
        return $this->matricule;
    }

    // create
    public function create()
    {
        $params = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'born_place' => $this->born_place,
            'matricule' => $this->matricule,
            'password' => $this->password,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'study_level' => $this->study_level,
            'study_year' => $this->study_year,
            'study_last_etablissement_name' => $this->study_last_etablissement_name,
            'father_name' => $this->father_name,
            'father_job' => $this->father_job,
            'mother_name' => $this->mother_name,
            'mother_job' => $this->mother_job,
            'branch_id' => $this->branch_id,
            'speciality_id' => $this->speciality_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
            // 199 - 218 = 19
        ];
        parent::createRow('users', [
            'name' => $this->first_name.' '.$this->last_name,
            'tel' => $this->phone,
            'email' => $this->email,
            'password' => $this->password,
            'role' => 'student',
        ]);
        return parent::createRow($this->table, $params) ? true : false;
    }
    // update
    public function update()
    {
        $params = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'born_place' => $this->born_place,
            'matricule' => $this->matricule,
            'password' => $this->password,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'study_level' => $this->study_level,
            'study_year' => $this->study_year,
            'study_last_etablissement_name' => $this->study_last_etablissement_name,
            'father_name' => $this->father_name,
            'father_job' => $this->father_job,
            'mother_name' => $this->mother_name,
            'mother_job' => $this->mother_job,
            'branch_id' => $this->branch_id,
            'speciality_id' => $this->speciality_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
        parent::updateRow($this->table, $this->id, $params);
    }
    // delete
    public function delete()
    {
        parent::deleteRow($this->table, $this->id);
    }
    // generate student matricule : 1-seriel number 2-session 3-year
    public function generateMatricule()
    {
        $max_id = parent::getMaxId("students");
        $current_session = parent::getCurrentSession();
        //removce first 2 digits from current year
        $year = substr(date("Y"), 2);
        // the first part of matricule should be 4 digits
        $seriel_number = str_pad($max_id+1, 4, "0", STR_PAD_LEFT);
        // $matricule = $seriel_number . $current_session . $year;
        $matricule = $seriel_number . "-" . $current_session['month'] . "-" . $year;
        return $matricule;
    }
}