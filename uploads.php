<?php
include('verifConnexion.php');
?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://www.google.com/recaptcha/api.js?render=6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>LE LAB - UPLOADS</title>

</head>


<body>

<div class="wrapper">
    <header>
        <nav>
            <div class="menu-icon">
                <img src="images/icons8-chevron-carré-bas-50.png">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="logo" id="logoHeader">
                <a href="index.php"><img src="images/logoMin.png"></a>
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
            <h1><strong>LAB - UPLOADS</strong></h1>
        </div>
        <div class="ha-parallax-divider-wrapper">
            <span class="ha-diamond-divider-md img-responsive"><img src="images/icoUploadTrans.png"> </span>
        </div>
        <div class="ha-heading-parallax"><strong>Partagez vos créations !</strong><br> KoLABSoN TEAM</div>
    </div>
</div>



<!--profile Box start-->

<div class="container" id="profilBox">

        <div class="span4 well">
            <div class="row">
                <div class="span1"><img src="images/iconmonstr-user-20-72.png" alt="icone utilisateur"></div>
                <div class="span3">

                    <p><strong><?php echo $_SESSION['pseudo']; ?></strong></p>
                    <span class=" badge badge-warning">8 messages</span> <span class=" badge badge-info">15 followers</span>
                </div>
            </div>
        </div>
</div>

    <!--profile Box end-->


<br>
<br>
<br>

    <div class="row">

        <div class="col">
            <div class="span3 well" id="formUploads">

                <div class="container">
                    <h2 id="titreFormUpload"> Envoyer vos Créations :</h2>

                    <!--Formulare uploagFile-->

                    <form action="saveSamples.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Titre</label>
                            <textarea class="form-control" id="FormControlTextarea" rows="1" name="titre"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="FormControlTextarea1" rows="3" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Catégorie</label>
                            <textarea class="form-control" id="exampleFormControlText" rows="1" name="categorie"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">BPM</label>
                            <textarea class="form-control" id="FormControlT" rows="1" name="BPM"></textarea>

                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="type" value="sample"/><label for="sample">SAMPLE</label>

                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="type" value="track"  /> <label for="track">TRACK</label>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Fichier audio</label>
                            <input type="file" class="form-control-file" id="FormControlFile1" name="uploadAudio">
                        </div>
                        <input type="hidden" name="tokenGoogle" class="token">
                        <button type="submit" class="btn btn-primary">Envoyer</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="row form-group product-chooser">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                    <div class="product-chooser-item selected">
                        <img src="images/keyboard.jpg" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">
                        <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                            <div class="clear">
                                <p>KOLABSON</p>
                                <p>Pour protéger vos créations, seuls les samples pourront être télécharger.</p>
                                <p>Les autres utilisateurs pourront ains écouter vos compositions sans les télécharger !</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                    <img src="images/icoUploadMax.png" alt="icone du lab">
                </div>

             </div>
         </div>
    </div>

<div class="ha-bg-parallax text-center block-marginb-none" id="paralaxLab" data-type="background" data-speed="20">
    <div class="ha-parallax-body">
        <div class="ha-content ha-content-whitecolor">
            <h4><strong>La musique est le véritable souffle de la vie. On mange pour ne pas mourir de faim. On chante pour s'entendre vivre.</strong></h4>
            <h5>Yasmina Khadra ,</h5>
            <p>Les hirondelles de Kaboul</p>
        </div>
    </div>
</div>


<br>
<br>

        <!-- Footer -->

        <section id="footer">
            <div class="container" id="footerUpload">
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
                        <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                        <p class="h6"> All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">KoLABSoN</a></p>
                    </div>
                </div>

            </div>
        </section>


</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="jquery/js/script.js"></script>
<script src="jquery/js/jquery-3.3.1.slim.min.js"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty', {action: 'login'}).then(function(token) {
        ...
        });
    });
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</html>