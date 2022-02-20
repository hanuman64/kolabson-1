<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17/05/2019
 * Time: 12:02
 */

include 'verifConnexion.php';


if (isset($_SESSION['pseudo']) && isset($_POST['commentaire']) && isset($_GET['id']) )//Si les champs pseudo, commentaire et id existent
{


    // Connexion à la base de données
    include 'connectBDD.php';


    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO commentairestrack (id, pseudo, commentaire, fileID, dateCommentaireTrack) VALUES(NULL, :pseudo, :commentaire, :fileID, :dateCommentaireTrack)');
    $req->execute(array(
        'pseudo' => htmlspecialchars ($_SESSION['pseudo']),
        'commentaire' => htmlspecialchars($_POST['commentaire']),
        'fileID' =>  htmlspecialchars($_GET['id']),
        'dateCommentaireTrack' => date("Y-m-d H:i:s")));

    echo "<div class=\"alert alert-success\" role=\"alert\">
                         Votre commentaire a été envoyé !
                     </div>";
    echo "<p><a href='lab.php'>retour vers le site</a></p>";


}
else
{
    echo "Veuillez recommencer SVP";
    echo "<p><a href='lab.php'>retour vers le site</a></p>";
    echo $_SESSION['pseudo'] . $_POST['commentaire'] . $_GET['id'];
}



?>