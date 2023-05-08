<?php
include '../app/config/config.php';
include '../app/helpers/urlFor.php';
include '../app/controllers/DataBaseController.php';
include '../app/models/MainModel.php';
include '../app/models/Section.php';
// print_section
require '../vendor/autoload.php';

if (isset($_GET['print_section'])) {
    $section = new Section();
    $section->setId($_GET['print_section']);
    $section->printSection($_GET['print_section'], '../app/templates/section.docx');

}
?>