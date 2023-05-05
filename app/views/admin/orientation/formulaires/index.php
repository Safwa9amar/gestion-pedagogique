<?php
session_start();

if ($_SESSION['lang'] == 'ar') {
    include './lang/ar.php';
} else {
    include './lang/fr.php';
}
print_r($_SESSION['lang']);
// ignore fatal errors

$filename = $_GET['file'];
$prin_name = $_GET['name'];

try {
    // create a new instance of Word
    $word = new COM("Word.Application") or die("Unable to instantiate Word");

    // open the file
    $doc = $word->Documents->Open(realpath($filename));
    // print the file with name
    
    $doc->PrintOut();

    // close the file and Word
    $doc->Close();
    $word->Quit();
    // back to impresssion_des_formulaires.php
    $_SESSION['success'] = 'succes';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch (Exception $e) {
    //set error message and redirect to error page
    $_SESSION['error'] = $lang['print_error']. $e->getMessage();
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}

?>