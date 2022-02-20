<?php session_start();?>
<?php
if(isset($_POST['']))
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
    <title>KolabSon</title>
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <div class="menu-icon">
                <img src="https://img.icons8.com/ios/20/000000/down-squared.png" alt="icone menu" id="iconeMenu">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="logo" id="logoHeader">
                <a href="index.php"><img src="images/logoMin.png" alt="logo"></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">ACCUEIL</a></li>
                    <li><a href="#ancre">A PROPOS</a></li>
                    <li><a href="#ancre2">INSCRIPTION / CONNEXION</a></li>
                    <?php
                    if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
                        echo '<li><a href="lab.php">LAB</a></li>';
                    }
                    ?>
                    <li><a href="#ancre3">CONTACT</a></li>
                </ul>
            </div>
        </nav>
    </header>
</div>
<!--text Box-->
<div class="jumbotron jumbotron-fluid" id="textBox">
    <div class="container">
        <h1 class="heading" data-target-resolver>a</h1>
    </div>
</div>
<!--Alert info cookies-->
<div class="container-fluid">
    <div class="alert alert-warning alert-dismissible fade show" id="infoCookie" role="alert">
        <strong>Bienvenue sur KoLABSoN !</strong> <p>La navigation sur le site <a href="http://kolabson.tk/">kolabson.tk</a> est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p>
        <p>Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur pour refuser l’installation des cookies </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" id="btnInfoCookie">&times;</span>
        </button>
    </div>
</div>
<!--Image d'accueil-->
<div class="container-fluid" id="caroussel">
    <img src="images/back1.jpg" class="d-block w-100" alt="logo de KoLABSoN">
</div>
<br>
<br>
<br>
<br>
<div class="ha-bg-parallax text-center block-marginb-none" data-type="background" data-speed="20" id="parallaxBlock1">
    <div class="ha-parallax-body">
        <div class="ha-heading-parallax">"Keep On Create!" KoLABSoN TEAM</div>
    </div>
</div>
<div class="container" id="corpsPage">
    <div id="ancre" class="scroll"></div>
    <br>
    <br>
    <br>
    <h2>A PROPOS</h2>
    <br>
    <br>
    <br>
    <div class="row form-group product-chooser">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item selected">
                <div id="icoApropos" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12">
                    <img src="images/icoLabMin.png" alt="icone du Lab">
                    <img src="images/iconmonstr-user-20-72.png" alt="icone utilisateur" >
                    <img src="images/icoChatMin.jpg" alt="icone du Tchat">
                    <img src="images/icoUpload.png" alt="icone de téléchargement">
                </div>
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">ECHANGE</span>
                    <span class="description" id="pApropos1">Le but principal de ce site est de favoriser les contacts entre les créateurs que nous sommes! Echanger, commenter ou tout simplement faire découvrir vos créations, KoLABSoN vous offre la possibilité de pouvoir vous mettre en lumière sans pour autant quitter votre caverne !</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item selected">
                <img src="images/speaker3.jpg" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12"  alt="image d'illustration">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">KOLABSON</span>
                    <span class="description" id="pApropos">L'histoire commence dans un modeste Home-Studio. Ma caverne. Me vient alors l'idée de créer une plate-forme ou tout les hermites, créateurs de musique, pourraient se retrouver pour pouvoir échanger leurs savoirs. Ainsi est né KoLABSoN. (Kolaborativ Labs On)  </span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item selected">
                <img src="images/headphones.gif" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="image d'illustration">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">PARTAGE</span>
                    <span class="description" id="pApropos2">Sur KoLABSoN, vous pouvez écouter, discuter, uploader vos créations (samples ou morceaux complets) ou télécharger des samples pour les integrer à vos propres créations! Par souci de protection de vos compositions seul les samples peuvent être téléchargés. </span>
                    <span class="description">Bienvenue dans KoLABSoN ! !   !      <a href="index.php#ancre3">Nous contacter</a> </span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<div class="ha-bg-parallax text-center block-marginb-none" data-type="background" data-speed="20" id="parallaxDiv2">
    <div class="ha-parallax-body">
        <div class="ha-content ha-content-whitecolor">
            "La vie sans musique est tout simplement une erreur, une fatigue, un exil."
        </div>
        <div class="ha-parallax-divider-wrapper">
            <span class="ha-diamond-divider-md img-responsive"></span>
        </div>
        <div class="ha-heading-parallax">Friedrich Nietzsche</div>
    </div>
</div>
<br>
<br>
<br>
<!-- Div Inscription/Connexion -->
<div id="ancre2"></div>
<div class="container" id="contact_inscription">
    <h2>INSCRIPTION / CONNEXION</h2>
    <br>
    <br>
    <br>
    <div class="jumbotron jumbotron-fluid" id="blockForm2">
<!-- Columns are always 50% wide, on mobile and desktop -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="container">
 <!--AFFICHAGE DES ERREURS DE SAISIE UTILISATEURS-->
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'ok')
                    {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'">Vous êtes inscrit et pouvez vous connecter!</div>';
                    }
                    else if (isset($_GET['message']) && $_GET['message'] == 'erreurPseudo')
                    {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'">Pseudo déja utilisé !</div>';
                    }
                    else if (isset($_GET['message']) && $_GET['message'] == 'erreurMail')
                    {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'>Format mail incorrect !</div>';
                    }
                    else if (isset($_GET['message']) && $_GET['message'] == 'erreurMdpChiffre')
                    {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'>Le mot de passe doit contenir un chiffre !</div>';
                    }
                    else if (isset($_GET['message']) && $_GET['message'] == 'erreurMdpLength')
                    {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'>Le mot de passe doit contenir au moins 8 caractères !</div>';
                    }
                    else if (isset($_GET['message']) && $_GET['message'] == 'erreurSameMdp')
                    {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'>Les mots de passe doivent être identiques !</div>';
                    }
                    ?>
 <!--form inscription-->
                    <br>
                    <br>
                    <br>
                    <div class="container" id="formulaire">
                        <h3 id="titreInsc">INSCRIPTION</h3>
                        <form action="inscription.php" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Votre adresse mail</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nom@exemple.com" name="mail">
                                <small id="emailHelp1" class="form-text text-muted">Nous nous engageons à ne jamais communiquer votre adresse mail.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Votre Pseudo (8 caractères minimum + 1 chiffre)</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="pseudo"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="mdp1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Veuillez confirmer votre mot de passe :</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Mot de passe" name="mdp2">
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty"> </div>

                            <input type="hidden" class="token" name="tokenGoogle">
                            <button type="submit" class="btn btn-primary" id="btnEnvoye">ENVOYER</button>
                        </form>
                    </div>
                </div>
            </div>

<!--Formulaire Connexion-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <!--AFFICHAGE DES ERREURS DE SAISIE UTILISATEURS-->
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'erreurMdpConex')
                {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'>Veuillez vérifier vos identifiants !</div>';

                } else if (isset($_GET['message']) && $_GET['message'] == 'erreurNoInscription') {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" role=\'alert\' id=\'#myAlert\'>Le pseudo n\'existe pas !</div>';
                }
                ?>
                <div class="container" id="connexionDroit">
                    <div class="row" id="connexionForm">
                        <h3 id="titreConnex">CONNEXION</h3>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form action="connexion.php" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Votre Pseudo (8 caractères minimum + 1 chiffre)</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="1" name="pseudoCo"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mot de passe</label>
                                    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Mot de passe" name="mdp">
                                </div>
                                <input type="hidden" name="tokenGoogle" class="token">
                                <button type="submit" class="btn btn-primary" id="btnEnvoyerCo">ENVOYER</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <span class="description" id="infoForm">Nous ne divulguerons jamais votre adresse mail à des tiers!  Pour plus d'informations veuillez vous réferer à notre <a href="">politique de confidentialité</a>. </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div>
        <div class="ha-bg-parallax text-center block-marginb-none" data-type="background" data-speed="20">
            <div class="ha-parallax-body">
                <div class="ha-content ha-content-whitecolor">
                    "La musique [...] est la vapeur de l'art. Elle est à la poésie ce que la rêverie est à la pensée, ce que le fluide est au liquide, ce que l'océan des nuées est à l'océan des ondes."
                </div>
                <div class="ha-parallax-divider-wrapper">
                    <span class="ha-diamond-divider-md img-responsive"></span>
                </div>
                <div class="ha-heading-parallax">Victor Hugo</div>
            </div>
        </div>
        <br>
        <br>
        <br>
 <!--Div contact-->
        <div class="container" id="corpsPage2">
            <div id="ancre3" class="scroll"></div>
            <h2>CONTACT</h2>
            <br>
            <br>
            <br>
            <div class="jumbotron jumbotron-fluid" id="blockForm">
                <div class="container">
                    <form id="formContact" action="mail.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Votre adresse mail:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="expedMail">
                            <small id="emailHelp" class="form-text text-muted">Nous nous engageons à ne jamais communiquer votre adresse mail.</small>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea3" name="textMail" rows="4" placeholder="Votre message"></textarea>
                        </div>
                        <br>
                        <br>
 <!-- RECAPTCHA  -->
                        <input type="hidden" name="tokenGoogle" class="token">
                        <br>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary" id="btnEnvoieMail">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row grid-divider">
                <div class="col-sm">
                    <span class="title">KOLABSON</span>
                    <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                </div>
                <div class="col-sm">
                    <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                </div>
                <div class="col-sm">
                    <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="ha-bg-parallax text-center block-marginb-none" data-type="background" data-speed="20" id="parllaxDiv2">
        <div class="ha-parallax-body">
            <div class="ha-content ha-content-whitecolor">
                "La chose superbe à propos de la musique, c'est que lorsqu'elle vous touche, vous ne ressentez plus la douleur."
            </div>
            <div class="ha-parallax-divider-wrapper">
                <span class="ha-diamond-divider-md img-responsive"></span>
            </div>
            <div class="ha-heading-parallax">Bob Marley</div>
        </div>
    </div>
    <br>
    <br>
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
                <p><u><a href="https://kolabson.tk/">KoLABSoN</a></u> est un projet professionnel développé par Monkey3.</p>
                <p class="h5"> All right Reversed.<a class="text-green ml-2" href="https://kolabson.tk/" target="_blank">KoLABSoN</a></p>
            </div>
        </div>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="jquery/js/jquery-3.3.1.slim.min.js"></script>
<script src="jquery/js/script.js"></script>
<!--<script src="jquery/js/traitementContact.js"></script>-->
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty', {action: 'login'}).then(function(token) {
            // console.log(token);
            //document.getElementsByClassName("token").value = token;

            var tokenElts = document.getElementsByClassName("token");
            //console.log(tokenElts);
            for (let i = 0; i < tokenElts.length; i++){
                tokenElts[i].value = token;
            }
        });
    });
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery/js/scriptAnimationIndex.js"></script>
<script src="jquery/scripts/smoothScroll.js"></script>
</body>

</html>