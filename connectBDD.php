<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/2019
 * Time: 16:16
 */

try {
    $bdd = new PDO('mysql:host=localhost;dbname=kolabson;charset=utf8', 'kolabson', 'uCPjC1DbEcNaRNH');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
