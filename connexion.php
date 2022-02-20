<?php
session_start();
error_reporting(E_ALL);                     //A SUPPRIMER APRES VALIDATION
ini_set('display_errors', 1);    //A SUPPRIMER APRES VALIDATION
//Connexion à la BDD
include('connectBDD.php');

 //Recaptcha validation
if(isset($_POST['tokenGoogle'])){
    //si on a la valeur du token dans le post
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => "6LdD2qUUAAAAADuZxawgm0y2gLJ2xr7e644QHf4L",
        'response' => $_POST['tokenGoogle'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    $res = (json_decode($response, true));
    //var_dump($res);
    if($res['success'] == true && $res['score'] > 0.7) {
        //Si on a la reponse :

        if(isset($_POST['pseudoCo']) && $_POST['mdp'])    //Si les champs pseudoCo et mdp sont remplis
        {
//On prépare une requete avec le pseudo en paramètre
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=?');
        $req->execute(array(
            $_POST['pseudoCo'] // le parametre est fourni depuis le champ du formulaire

        ));

        $resultat = $req->fetch();
//On affiche le resultat de la requete (si une ligne correspondant à la requete existe) ou 'false' sera affiché si n'existe pas

        if ($resultat != false)// Si le resultat ne vaut pas false
        {
            if (password_verify($_POST['mdp'], $resultat['mdp']))
            {
                $_SESSION['connecte'] = true;
                $_SESSION['pseudo'] = $_POST['pseudoCo'];
                $_SESSION['dateInscription'] = $resultat['dateInscription'];
                header('Location: lab.php');
            }
            else
            {
                echo "Mauvais mot de passe";
                /*header('Location: /index.html#ancre2');//Redirection  connexion*/
                header('Location: index.php?message=erreurMdpConex#ancre2');

            }
        }
        else
        {
            echo "Vous devez vous inscrire !";
            /* header('Location: /index.html#ancre2');*/
            header('Location: index.php?message=erreurNoInscription#ancre2');
        }
    }

    } else {
        echo 'erreur de validation google recaptcha';
        echo "<a href='index.php#ancre2'>se connecter</a>";
    }
}






