<?php
include('verifConnexion.php');
include('connectBDD.php');


if (isset($_GET['id'])) {
    $req = $bdd->prepare('SELECT * FROM samples WHERE ID=?');
    $req->execute(array($_GET['id']));
    $resultat = $req->fetch();
}

/*TODO      pb multipost Chat/ UPLOADS DE TRACKS AVEC LES CHECK BOX / FAIRE UN PHP UNIQUE POUR L UPLOAD PARAM MAIL*/
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://www.google.com/recaptcha/api.js?render=6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <title>LE LAB</title>
</head>

<body>
<div class="wrapper">
    <header>
        <nav>
            <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="logo" id="logoHeader">
                <a href="index.php"><img src="images/logoMin.png" alt="logo de KoLABSoN" ></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">ACCUEIL</a></li>
                    <li><a href="lab.php#ancreChat">CHATBOX</a></li>
                    <li><a href="lab.php#ancreExplorer">EXPLORER</a></li>
                    <li><a href="uploads.php">UPLOAD</a></li>
                    <li><a href="index.php#ancre">A PROPOS</a></li>
                    <li><a href="index.php#ancre2">INSCRIPTION / CONNEXION</a></li>
                    <li><a href="index.php#ancre3">CONTACT</a></li>
                </ul>
            </div>
        </nav>
    </header>
</div>
<br>
<br>
<br>
<br>
<br>
<div class="ha-bg-parallax text-center block-marginb-none" id="paralaxLab" data-type="background" data-speed="20">
    <div class="ha-parallax-body">
        <div class="ha-content ha-content-whitecolor">
            <h1><strong>KoLABSoN : LE LAB</strong></h1>
        </div>
        <div class="ha-parallax-divider-wrapper">
            <span class="ha-diamond-divider-md img-responsive"><img src="images/icoLab4.png"></span>
        </div>
        <div class="ha-heading-parallax"  id="ancreChat"><strong>Keep On Create !!!</strong></div>
    </div>
</div>
    <div class="container">
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <div class="container">
 <!--profile Box-->
                        <div class="container" id="profilBox">
                            <div class="row">
                                <div class="span4 well">
                                    <div class="row">
                                        <div class="span1"><img src="images/iconmonstr-user-20-72.png"
                                                                alt="icone utilisateur"></div>
                                        <div class="span3">
                                            <p><strong><?php echo $_SESSION['pseudo']; ?></strong></p>
                                            <span class=" badge badge-info"><?php echo $_SESSION['dateInscription'];?></span>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="dropdown-item header" data-toggle="modal" data-target="#modalDeconnexion" ><a id="lienDeconnexion" href="deconnexion.php" >Se deconnecter</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <a href="uploads.php" class="btn btn-secondary btn-lg active" role="button"
                               aria-pressed="true" >Uploader vos créations !</a>
                        </div>
                        <br/>

<!--Formulaire Chat-->
                        <h4>Chattez en direct : <img src="images/icoChatMin.jpg" ></h4>
                        <form>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="formGroupExampleInputPseudo"
                                       value="<?php echo $_SESSION['pseudo']; ?>" name="pseudo">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                            </div>
                            <input type="hidden" name="tokenGoogle" class="token">
                            <button type="submit" class="btn btn-primary" id="btnEnvoye">ENVOYER</button>
                            <div class="g-recaptcha" data-sitekey="6LeloaAUAAAAAGwsCQ2CIc7IvFYV8vGYA5-A7L60"> </div>
                        </form>
<br>
<br>
<br>
<br>
                    </div>
                </div>
 <!--   Block postsUtilisateurs / VOS PUBLICATIONS -->

                <div class="col-md-6 gedf-main" id="postUtilisateur">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img src="images/icoLab3.png"
                                         alt="icone lab">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0" ><strong><?php echo $_SESSION['pseudo'] . '</strong>' . ' :Vos Publications'; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

<?php

/*AFFICHAGE DES SAMPLES POSTES PAR L UTILISATEUR*/

                        $req = $bdd->prepare('SELECT * FROM samples WHERE pseudoUtilisateur=?');
                        $req->execute(array(
                                $_SESSION['pseudo']
                        ));
                        $resultats = $req->fetchAll();

                        /*var_dump($resultats);*/
                    foreach ($resultats as $resultat) {
?>
                    <div class="jumbotron jumbotron-fluid" id="boxPostUtilisateur">
                        <div class="container" >
                            <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i>SAMPLE</div>
                            <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'><?php echo $resultat['dateSample'] ;?></i></div>
                            <h3><?php echo $resultat['name'] . '  /  ' . $resultat['categorie'] . ' / ' . $resultat['BPM'] . ' BPM'?><h3>
                            <p class="lead"><?php echo $resultat['description'] ?></p>
                            <audio src="uploads/samples/<?php echo $resultat['name'] ;?>" controls></audio>
                        </div>
                    </div>
<?php
                    }
?>


 <?php



/*AFFICHAGE DES TRACKS POSTES PAR L UTILISATEUR*/

                    $req = $bdd->prepare('SELECT * FROM tracks WHERE pseudoUtilisateur=?');
                    $req->execute(array(
                        $_SESSION['pseudo']
                    ));
                    $resultatsTracks = $req->fetchAll();

                    /*var_dump($resultats);*/
                    foreach ($resultatsTracks as $resultatTrack)
                    {
?>
                        <div class="jumbotron jumbotron-fluid" id="boxPostUtilisateur">
                            <div class="container" >
                                <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i>TRACK</div>
                                <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'><?php echo $resultatTrack['dateTrack'] ;?></i></div>
                                <h3><?php echo $resultatTrack['name'] . '  /  ' . $resultatTrack['categorie'] ?><h3>
                                        <p class="lead"><?php echo $resultatTrack['description'] ?></p>
                                        <audio src="uploads/tracks/<?php echo $resultatTrack['name'] ;?>" controls></audio>
                            </div>
                        </div>
 <?php
                    }
 ?>

                    <br>
                </div>

<!-- CHAT BOX -->
                <div class="col-md-3" id="colDroite">
                    <div class="jumbotron" id="chat">
                        <img src="images/icoChat.jpeg">
                        <h3>KoLABSoN Chat Box</h3>
                        <div id="messages">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<!--EXPLORER START-->
    <div class="ha-bg-parallax text-center block-marginb-none" id="paralaxLab" data-type="background" data-speed="20">
        <div class="ha-parallax-body">
            <div class="ha-content ha-content-whitecolor">
                <h1><strong>EXPLORER</strong></h1>
            </div>
            <div class="ha-heading-parallax" id="ancreExplorer">KoLABSoN TEAM</div>
        </div>
    </div>
    <br>
    <br>

<!--  Bloc SAMPLES START  -->
    <div class='row'>
        <div class='col-md-6 gedf-main' id='postSamples'>
            <h2><strong>SAMPLES</strong></h2>
            <br>
            <br>


<!--EXPLORER     ///      AFFICHAGE DES SAMPLES-->

<?php
            $req = $bdd->query('SELECT * FROM samples ');
            $listeSamples = $req->fetchAll();

            /*var_dump($listeSamples);*/
            foreach ($listeSamples as $ligneSample)
            {
?>
            <div class="jumbotron jumbotron-fluid" id="boxPostUtilisateur">
                <div class='card-header' id="userBoxSample">
                    <div class='d-flex justify-content-between align-items-center' >

                            <div class="mr-2">
                                <img src="images/icoLabMin.png"
                                     alt="icone lab">
                                <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i>SAMPLE</div>
                                <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i><?php echo $ligneSample['dateSample'] ;?></div>
                            </div>

                            <div class='ml-2'>
                                <img class="rounded-circle" width="45" src="images/iconmonstr-user-20-72.png"
                                     alt="icone utilisateur">
                                <?php echo $ligneSample['pseudoUtilisateur'] ?>
                            </div>

                    </div>
                    <?php echo $ligneSample['name'] . '  /  ' . $ligneSample['categorie'] . ' / ' . $ligneSample['BPM'] . ' BPM'?>
                </div>

                <div class="container" >
                    <div class="container" id="blocTelechargement">
                            <p class="lead"><?php echo $ligneSample['description'] ?></p>
                            <audio src="uploads/samples/<?php echo $ligneSample['name'] ;?>" controls id="lecteur"></audio>
                    </div>
                            <a href="download.php?idSample=<?php echo $ligneSample['idSample']; ?>" class="btn btn-info">Télécharger</a>


<!--FORMULAIRE COMMENTAIRES-->

                    <form method="post" action="commentairesSample.php?id=<?php echo $ligneSample['idSample'] ?>">
                        <div class="form-group">
                            <input type="hidden" name="pseudo" value="<?php echo $_SESSION['pseudo'];?>">
                        </div>

                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='1' placeholder="commenter:"
                                  name='commentaire'></textarea>
                        <br>
                        <input type="hidden" name="tokenGoogle" class="token">
                        <input class="btn btn-primary" type="submit" value="Envoyer" id="btnCommentSample">

                    </form>
                </div>



<!--AFFICHAGE DES COMMENTAIRES SAMPLES-->

                <?php
                $req = $bdd->prepare('SELECT * FROM commentairessample WHERE fileID=?');
                $req->execute(array(
                    $ligneSample['idSample']
                ));

                $commentairesSample = $req->fetchAll();
                foreach ($commentairesSample as $commentaireSample){
                ?>

                <div class="container" id="divCommentaires">
                    <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i><?php echo $commentaireSample['dateCommentaireSample'] ;?></div>
                        <p><?php echo $commentaireSample['pseudo']; ?></p>
                        <p><?php echo $commentaireSample['commentaire']; ?></p>
                </div>

<?php
                }
?>

            </div>

<?php
            }
?>

        </div>


<!--  EXPLORER   /// BLOC TRACKS START   -->

        <div class="col-md-6 gedf-main" id="postTrack">
            <h2><strong>COMPOSITIONS</strong></h2>
            <br>
            <br>

<!--AFFICHAGE DES TRACKS-->

 <?php
            $req = $bdd->query('SELECT * FROM tracks ');
            $listeTracks = $req->fetchAll();

            /*var_dump($listeTracks);*/
            foreach ($listeTracks as $ligneTrack)
            {
 ?>
            <div class="jumbotron jumbotron-fluid" id="boxPostUtilisateurTrack">
                    <div class='card-header' id="userBoxTrack">
                        <div class='d-flex justify-content-between align-items-center'>
                                <div class="mr-2">
                                    <img src="images/icoLabMin.png"
                                         alt="icone lab">
                                    <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i>TRACK</div>
                                    <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i> <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'></i><?php echo $ligneTrack['dateTrack'] ;?></div></div>
                                </div>
                                <div class='ml-2'>
                                    <img class="rounded-circle" width="45" src="images/iconmonstr-user-20-72.png"
                                         alt="icone utilisateur">
                                    <?php echo $ligneTrack['pseudoUtilisateur'] ?>

                                </div>
                        </div>
                        <?php echo $ligneTrack['name'] . '  /  ' . $ligneTrack['categorie']?>
                    </div>


                    <div class="container" >
                                <p class="lead"><?php echo $ligneTrack['description'] ?></p>
                                <audio src="uploads/tracks/<?php echo $ligneTrack['name'] ;?>" controls id="lecteur1"></audio>

<!--FORMULAIRE COMMENTAIRES TRACKS-->

                                <form method="post" action="commentairesTrack.php?id=<?php echo $ligneTrack['idTrack'] ?>">
                                    <br>
                                    <div class="form-group">
                                        <input type="hidden" name="pseudo" value="<?php echo $_SESSION['pseudo'];?>">
                                    </div>

                                    <textarea class='form-control' id='exampleFormControlTextarea11' rows='1' placeholder="commenter:"
                                              name='commentaire'></textarea>
                                    <br>
                                    <input type="hidden" name="tokenGoogle" class="token">
                                    <input class="btn btn-primary" type="submit" value="Envoyer" id="btnCommentTrack">
                                </form>
                    </div>

<!--AFFICHAGE DES COMMENTAIRES TRACKS-->
 <?php
                $req = $bdd->prepare('SELECT * FROM commentairestrack WHERE fileID=?');
                $req->execute(array(
                    $ligneTrack['idTrack']
                ));

                $commentairesTrack = $req->fetchAll();
                foreach ($commentairesTrack as $commentaireTrack)
                {
 ?>
                    <div class="container" id="divCommentaires">
                        <div class='text-muted h7 mb-2'><i class='fa fa-clock-o'><?php echo $ligneTrack['dateTrack'] ;?></i>
                        <p><?php echo $commentaireTrack['pseudo']; ?></p>
                        <p><?php echo $commentaireTrack['commentaire']; ?></p>
                    </div>
<?php
                }
 ?>

<?php
            }
?>

        </div>
    </div>

</div>

    </div>

<!-- Footer -->

<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">

            <div class="col-xs-12 col-sm-4 col-md-4">
                <h4><a href="index.php">KoLABSoN</a></h4>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <h4><a href="mentions.html">MENTIONS LEGALES</a></h4>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <h4><a href="confidentialite.html">Politique de confidentialité</a></h4>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p><u><a href="http://localhost/kolabsonv11/index.php">KoLABSoN</a></u> est une
                    marque déposée et protégée !</p>
                <p class="h5"> Copyright.<a class="text-green ml-2" href="http://localhost/kolabsonV3+/index.php"
                                            target="_blank">KoLABSoN</a></p>
            </div>
        </div>

    </div>
</section>



</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="jquery/js/script.js"></script>
<script src="jquery/js/jquery-3.3.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty', {action: 'login'}).then(function(token) {

        });
    });
</script>
<script type="text/javascript" src="jquery/js/scriptChat.js"></script>

</html>
