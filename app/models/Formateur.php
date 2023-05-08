<?php
class Formateur extends MainModel
{
    // table name
    public $table = "formateurs";
    // Numéro 
    public $id;
    // Cin
    private $cin;
    // Nom 
    private $nom;
    // Prénom 
    private $prenom;
    // Date de naissance 
    private $date_naissance;
    // Lieu de naissance 
    private $lieu_naissance;
    // Adresse 
    private $adresse;
    // Téléphone 
    private $telephone;
    // Email 
    private $email;
    // Diplôme 
    private $diplome;
    // Spécialité 
    // Experience
    private $experience;
    private $specialite;
    // constructor
    public function __construct()
    {
        parent::__construct();
        $this -> generateSql();
        $max_id = parent::getMaxId($this->table);
        // return if id is not set
        if (!isset($this->id)) return;
        $data = parent::getRowById($this->table, $this->id ?? $max_id);
        // set all properties
        $this->cin = $data['CIN'];
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->date_naissance = $data['date_naissance'];
        $this->lieu_naissance = $data['lieu_naissance'];
        $this->adresse = $data['adresse'];
        $this->telephone = $data['telephone'];
        $this->email = $data['email'];
        $this->diplome = $data['diplome'];
        $this->specialite = $data['specialite'];
    }
    //create
    public function create()
    {
        $param = [
            'CIN' => $this->cin,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->date_naissance,
            'lieu_naissance' => $this->lieu_naissance,
            'adresse' => $this->adresse,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'diplome' => $this->diplome,
            'specialite' => $this->specialite,
        ];
        return parent::createRow($this->table, $param);
    }
    //update
    public function update()
    {
        $param = [
            'CIN' => $this->cin,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->date_naissance,
            'lieu_naissance' => $this->lieu_naissance,
            'adresse' => $this->adresse,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'diplome' => $this->diplome,
            'experience' => $this->experience,
            'specialite' => $this->specialite,
        ];
        return parent::updateRow($this->table, $this->id, $param) ? true : false;
    }
    //delete
    public function delete()
    {
        return parent::deleteRow($this->table, $this->id);
    }
    // getById
    public function getById()
    {
        return parent::getRowById($this->table, $this->id);
    }
    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getCin()
    {
        return $this->cin;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }
    public function getLieuNaissance()
    {
        return $this->lieu_naissance;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getDiplome()
    {
        return $this->diplome;
    }
    // getExperience
    public function getExperience()
    {
        return $this->experience;
    }
    public function getSpecialite()
    {
        return $this->specialite;
    }
    //setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setCin($cin)
    {
        $this->cin = $cin;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }
    public function setLieuNaissance($lieu_naissance)
    {
        $this->lieu_naissance = $lieu_naissance;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;
    }
    // setExperience
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }
    // generate sql for create table
    public function generateSql()
    {
        $sql = "CREATE TABLE IF NOT EXISTS formateurs(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            CIN VARCHAR(30) NOT NULL,
            nom VARCHAR(30) NOT NULL,
            prenom VARCHAR(30) NOT NULL,
            date_naissance DATE NOT NULL,
            lieu_naissance VARCHAR(30) NOT NULL,
            adresse VARCHAR(30) NOT NULL,
            telephone VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            diplome VARCHAR(30) NOT NULL,
            experience VARCHAR(30) NOT NULL,
            specialite VARCHAR(30) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        )";
        // execute sql code
        return parent::executeSqlCode($sql);

    }

    // read all
    public function readAll()
    {
        return parent::getAllRows($this->table);
    }
}