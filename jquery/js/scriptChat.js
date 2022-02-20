
function ajaxGet(url, callback) {//Exécute un appel AJAX GET Prend en paramètres l'URL cible et la fonction callback appelée en cas de succès
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {         // Appelle la fonction callback en lui passant la réponse de la requête
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL :" + url);
    });
    req.send(null);
}

function afficher(reponse)
{
    console.log(reponse);
    var messages = JSON.parse(reponse);
    var conteneur = document.getElementById("messages");      //declaration de la div parent
    conteneur.innerHTML = "";

    for (var i = 0; i < messages.length; i++) {
        var newDivElt = document.createElement("div");        //Déclaration nouvel élement div
        newDivElt.classList.add("alert");
        newDivElt.classList.add("alert-dark");
        newDivElt.setAttribute("role", "alert");
        conteneur.appendChild(newDivElt);                              //Ajout du nouvel enfant
        var pseudoElt = document.createElement("h5");         //Déclaration du pseudo
        pseudoElt.textContent = "" + messages[i].pseudo;
        var dateElt = document.createElement("p.dateMessage");
        dateElt.textContent = "" + messages[i].dateMessage + "\n" ;
        var messageElt = document.createElement("p.messagePseudo"); //Déclaration du message
        messageElt.textContent = "" + messages[i].message;
        //Ajout des élements
        newDivElt.appendChild(pseudoElt);
        newDivElt.appendChild(dateElt);
        newDivElt.appendChild(messageElt);
    }
}
window.setInterval(function (){
    ajaxGet("message.php", afficher);
                                     }, 5000); //Temps entre deux appels en ms.

//Création fonction "envoyerFormulaire"
function envoyerFormulaire(e) {
    var champPseudo = document.getElementById("formGroupExampleInputPseudo");//déclaration du champ Pseudo et du champ message
    var champMessage = document.getElementById("exampleFormControlTextarea1");


//Méthode POST
    var reqPost = new XMLHttpRequest(); //Déclaration de la requête HTTP
    reqPost.open('POST','ajoutermessage.php'); // Cible de la requête
    reqPost.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    reqPost.send('pseudo=' + champPseudo.value + '&message=' + champMessage.value );
    e.preventDefault();
}


//Ajout du gestionnaire d'évenement
var formulaire = document.getElementsByTagName("form");
formulaire[0].addEventListener("submit", envoyerFormulaire); //!!form renvoie un tableau donc il faut indiqué l'emplacement precis de l'élement!!