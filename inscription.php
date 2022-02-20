<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <title>INSCRIPTION</title>
</head>

<body>

<?php
/*include'header.php';
include 'form.php';
include 'footer.php';*/
if(isset($_POST['tokenGoogle'])) {
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

    if ($res['success'] == true && $res['score'] > 0.7) {
        //Si on a la reponse :
        if (isset($_POST['mdp1']) && isset($_POST['mdp2']) && isset($_POST['mail']) && isset($_POST['pseudo']))//Si les mdp et le mail existent
        {

            if ($_POST['mdp1'] === $_POST['mdp2']) //Si mdp1  == mdp2
            {

                if (strlen($_POST['mdp1']) > 8)//Si mdp1 comporte au moins 8 caractères
                {
                    if (preg_match('/\d/', $_POST['mdp1']) == true)//Si mdp comporte au moins 1 chiffre
                    {
                        if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $_POST['mail'])) //Si le format mail est valide
                        {

                            include 'connectBDD.php';

                            $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=?');
                            $req->execute(array(
                                $_POST['pseudo']
                            ));
                            $resultat = $req->fetch();

                            if ($resultat != false)//Affiche pseudo deja utilisé
                            {
                                header('Location: index.php?message=erreurPseudo#ancre2');
                            } else {

                                //Insertion dans la BDD
                                $req = $bdd->prepare('INSERT INTO utilisateurs (ID, pseudo, mdp, mail, dateInscription) VALUES(NULL, :pseudo, :mdp, :mail, :dateInscription)');
                                $req->execute(array(
                                    'pseudo' => htmlspecialchars($_POST['pseudo']),
                                    'mdp' => password_hash($_POST['mdp1'], PASSWORD_DEFAULT),
                                    'mail' => htmlspecialchars($_POST['mail']),
                                    'dateInscription' => date("Y-m-d H:i:s")
                                ));

                                header('Location: index.php?message=ok#ancre2'); //Redirection vers la page de connexion

                            }
                        } else { // Si email pas valide

                            header('Location: index.php?message=erreurMail#ancre2');
                        }

                    } else {

                        header('Location: index.php?message=erreurMdpChiffre#ancre2'); //en cas d'erreur sur mot de passe
                    }

                } else {
                    header('Location: index.php?message=erreurMdpLength#ancre2'); //en cas de mdp < 8 caractères

                }


            } else {

                header('Location: index.php?message=erreurSameMdp#ancre2');//En cas de mots de passe différents
            }
        }
    }
}
?>



 Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="jquery/js/jquery-3.3.1.slim.min.js"></script>
<script src="jquery/js/script.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>