<?php

class Section extends MainModel
{
    // table name
    private $table = "sections";
    // Numéro 
    private $id;
    // numero
    private $numero;
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
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->id)) return;
        $max_id = parent::getMaxId($this->table);
        $data = parent::getRowById($this->table, $this->id ?? $max_id);
        // set all properties
        $this->numero = $data['numero'];
        $this->date = $data['date'];
        $this->speciality = $data['speciality'];
        $this->code = $data['code'];
        $this->qualification = $data['qualification'];
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->effective = $data['effectif'];
        $this->manager = $data['manager'];
        // $data['trainees'] to string
        $data['trainees'] = explode(',', $data['trainees']);
        foreach ($data['trainees'] as $train) {
            $this->trainees[] = parent::getRowById('students', $train);
        }
    }
    //create
    public function create()
    {
        $param = [
            'date' => $this->date,
            'code' => $this->code,
            'speciality' => $this->speciality,
            'start' => $this->start,
            'end' => $this->end,
            'qualification' => $this->qualification,
            'effectif' => $this->effective,
            'manager' => $this->manager,
            'trainees' => $this->trainees,
            'girls' => $this->girls,
            'boys' => $this->boys,
        ];
        return parent::createRow($this->table, $param) ? true : false;
    }

    public function update()
    {
        $param = [
            'date' => $this->date,
            'speciality' => $this->speciality,
            'code' => $this->code,
            'qualification' => $this->qualification,
            'start' => $this->start,
            'end' => $this->end,
            'effectif' => $this->effective,
            'manager' => $this->manager,
            'trainees' => $this->trainees,
            'girls' => $this->girls,
            'boys' => $this->boys,
        ];
        return parent::updateRow($this->table, $this->id, $param) ? true : false;
    }
    // delete
    public function delete()
    {
        return parent::deleteRow($this->table, $this->id) ? true : false;
    }
    // delete
    public function deleteById($id)
    {
        return parent::deleteRow($this->table, $id) ? true : false;
    }

    // setter and getter
    public function setId($id)
    {
        $this->id = $id;
    }
    // numero
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    // set girls
    public function setGirls($girls)
    {
        $this->girls = $girls;
    }
    public function setBoys($boys)
    {
        $this->girls = $boys;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setSpeciality($speciality)
    {
        $this->speciality = $speciality;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }
    public function setStart($start)
    {
        $this->start = $start;
    }
    public function setEnd($end)
    {
        $this->end = $end;
    }
    public function setEffective($effective)
    {
        $this->effective = $effective;
    }

    public function setManager($manager)
    {
        $this->manager = $manager;
    }
    public function setTrainees($trainees)
    {
        $this->trainees = $trainees;
    }
    // getters
    public function getId()
    {
        return $this->id;
    }
    // numero
    public function getNumero()
    {
        return $this->numero;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getSpeciality()
    {
        return $this->speciality;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getQualification()
    {
        return $this->qualification;
    }
    public function getStart()
    {
        return $this->start;
    }
    public function getEnd()
    {
        return $this->end;
    }
    public function getEffective()
    {
        return $this->effective;
    }
    public function getManager()
    {
        return $this->manager;
    }
    public function getTrainees()
    {
        return $this->trainees;
    }
    // read all
    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        return parent::getAllRows($this->table);
    }

    // show json 
    public function jsonify()
    {
        return json_encode(parent::getRowById($this->table, $this->id));
    }

    // printSection
    public function printSection($id, $template)
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);
        // send data to template
        $data = parent::getRowById($this->table, $id);
        $data['trainees'] = explode(',', $data['trainees']);
        foreach ($data['trainees'] as $train) {
            $this->trainees[] = parent::getRowById('students', $train);
        }
        $templateProcessor->setValue('numero', $data['numero']);
        $templateProcessor->setValue('date', $data['date']);
        $templateProcessor->setValue('speciality', $data['speciality']);
        $templateProcessor->setValue('code', $data['code']);
        $templateProcessor->setValue('qualification', $data['qualification']);
        $templateProcessor->setValue('start', $data['start']);
        $templateProcessor->setValue('end', $data['end']);
        $templateProcessor->setValue('effective', $data['effectif']);
        $templateProcessor->setValue('girls', $data['girls']);
        $templateProcessor->setValue('manager', $data['manager']);
        $templateProcessor->cloneRow('matricule', count($data['trainees']));
        $i = 1;
        foreach ($this->trainees as $trainee) {
            $templateProcessor->setValue('nom#' . $i, $trainee['first_name'] . ' ' . $trainee['last_name']);
            $templateProcessor->setValue('matricule#' . $i, $trainee['matricule']);
            $templateProcessor->setValue('date_naissance#' . $i, $trainee['birthday'] . '/' . $trainee['born_place']);
            $templateProcessor->setValue('niveau#' . $i, $trainee['study_level']);
            $templateProcessor->setValue('nom_pere#' . $i, $trainee['father_name']);
            $templateProcessor->setValue('nom_mere#' . $i, $trainee['mother_name']);
            $templateProcessor->setValue('adress#' . $i, $trainee['address']);
            $i++;
        }
        // fix the table

        $templateProcessor->saveAs('section.docx');
        // print as pdf
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=section_' . $data['code'] . '_.docx');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        if (file_exists('section.docx')) {
            readfile('section.docx');
            unlink('section.docx');

        }
        exit;

    }

}