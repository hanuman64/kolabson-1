//Gestion du probleme de temps(2 mins) de vie du token googleRecaptcha

grecaptcha.ready(function() {
    console.log('OK');
    function traitementContact(e) {
        console.log('OK');
        e.preventDefault();
        grecaptcha.execute('6LdD2qUUAAAAADzDhVij6lxol-VtwKzdv5UKO7ty', {action: 'login'}).then(function (token) {
            console.log(token);
            //document.getElementsByClassName("token").value = token;

            var tokenElts = document.getElementsByClassName("token");
            console.log(tokenElts);
            for (let i = 0; i < tokenElts.length; i++) {
                tokenElts[i].value = token;
            }
        });
    }

    var boutonEnvoi = document.getElementById('btnEnvoieMail');
    console.log(boutonEnvoi);
    boutonEnvoi.addEventListener('submit', traitementContact);
    console.log(boutonEnvoi);

});

