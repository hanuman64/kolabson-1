<?php
/**
 * Created by PhpStorm.
 * User: Monkey3@KoLABSoN
 * Date: 21/05/2019
 * Time: 10:31
 */
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] != true) {
    header('Location: index.php#ancre2');
    exit(0);
}


try {
    $bdd = new PDO('mysql:host=localhost;dbname=kolabson;charset=utf8', 'kolabson', 'uCPjC1DbEcNaRNH');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



$req = $bdd->prepare('SELECT name FROM samples WHERE idSample=?'); // on selectionne le fichier à télécharger dans la base de données
$req->execute(array(
    $_GET['idSample']
));
$sampleATelecharger = $req->fetch();

//var_dump($sampleATelecharger['name']);


$file = $sampleATelecharger['name'];
$filepath = "uploads/samples/" . $file;

//On procède au téléchargement
if(file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
}
else
{
    echo 'Le fichier est introuvable';
}







?>