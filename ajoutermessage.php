<?php
if (isset($_POST['pseudo']) && isset($_POST['message']) )//Si les champs pseudo et message existent
{
    // Connexion à la base de données
    include 'connectBDD.php';



// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO messages (id, pseudo, message, dateMessage) VALUES(NULL, :pseudo, :message, :dateMessage)');
    $req->execute(array(
        'pseudo' => htmlspecialchars ($_POST['pseudo']),
        'message' => htmlspecialchars($_POST['message']),
        'dateMessage' => date("Y-m-d H:i:s")));

}
else
{
    echo "Veuillez recommencer SVP";
}



?>