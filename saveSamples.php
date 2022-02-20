<?php
session_start();
// On se connecte à la BDD
include('connectBDD.php');

if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) //si la session existe
{
    //Si le fichier audio s'est bien envoyé, error==0
    if (isset($_FILES['uploadAudio']) && ($_FILES['uploadAudio']['error'] == 0))
    {

        $infoNomFichierAudio = pathinfo($_FILES['uploadAudio']['name']);

        echo $_FILES['uploadAudio']['name'];

        $extensionFile = $infoNomFichierAudio['extension'];

        $extensionsFileAutorisees = array("WAV");//Si l'extension du fichier correspond bien aux extensions autorisées

        $extensionFileAutorisees = array("WAV");

        if (in_array(strtoupper($extensionFile), $extensionsFileAutorisees) == true && in_array(strtoupper($extensionFile), $extensionFileAutorisees) == true)
        {

            if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['categorie']) && isset($_POST['BPM']) && isset($_SESSION['pseudo']))
            {

                if (isset($_FILES['uploadAudio']) && ($_FILES['uploadAudio']['error'] == 0))
                {

                    $req = $bdd->prepare('INSERT INTO samples(idSample, name, description, categorie, BPM, pseudoUtilisateur, dateSample) VALUES(NULL, :titre, :description, :categorie, :BPM, :pseudoUtilisateur, :dateSample)');

                    $req->execute(array(
                        'titre' => htmlspecialchars($_FILES['uploadAudio']['name']),
                        'description' => htmlspecialchars($_POST['description']),
                        'categorie' => htmlspecialchars($_POST['categorie']),
                        'BPM' => htmlspecialchars($_POST['BPM']),
                        'pseudoUtilisateur' => ($_SESSION['pseudo']), //On récupère le pseudo depuis le serveur pour qu'il ne soit pas modifiable.
                        'dateSample' => date("Y-m-d H:i:s")
                    ));

                    $_ID = $bdd->lastInsertId(NULL);//Retourne l'identifiant autogénéré qui a pu être éxecuté correctement sur cette session
                    move_uploaded_file($_FILES['uploadAudio']['tmp_name'], 'uploads/samples/' . $_FILES['uploadAudio']['name']);


                    echo "<div class=\"alert alert-success\" role=\"alert\">
                       Upload réussi!  Fichier envoyé !
                     </div>";
                    echo "<p><a href='lab.php'>retour vers le site</a></p>";

                }

            }

        }
    }

} else
    {

        echo "Une erreur s'est produite. Veuillez recommencer";
        header('Location: lab.php');
    }
?>
