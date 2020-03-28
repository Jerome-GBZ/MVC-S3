
    function checkPass()
    {
        // RECUPERATION DONNER du formulaire
        var password = document.getElementById('password1');
        var confirm  = document.getElementById('password2');

        // on recupere le champ pour placer du texte
        var message = document.getElementById('Error-Password');

        // COULEUR TEXTE / INPUT
        var good_color = "#66cc66";
        var bad_color  = "#ff6666";
        var else_color  = "#FFF";

        // COMPARAISON
        if(password.value == confirm.value && confirm.value != ""){
            confirm.style.backgroundColor = good_color;
            message.style.color           = good_color;
            message.innerHTML             = '✔ Mots de passe correct !';
        }else if (password.value != confirm.value && confirm.value != "") {
            confirm.style.backgroundColor = bad_color;
            message.style.color           = bad_color;
            message.innerHTML             = '❌ Mots de passe Incorrect !';
        }else {
          confirm.style.backgroundColor = else_color;
          message.innerHTML             = '';
        }

    }
