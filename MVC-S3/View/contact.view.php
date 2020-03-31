
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Le Viny - contact </title>
    <link rel="stylesheet" type="text/css" href="../View/contact.css">
    <link rel="icon" href="../View/img/logo_2.png" />
  </head>
    <body>
        <section id="container-contact">
            <div class="titre">
                <h1> Page de Contact </h1>
                <h2> Si vous avez une question ou détecter un quelconque problème sur notre site merci de nous informer à l'aide de ce formulaire de contact. </h2>
            </div>
            <form method="post" action="" name="contact-nous">
                <section id="infoperso1">
                    <class class="Autres">
                      <h3>je place la phrase ici ca va donner quoui</h3>
                      <select name="choix[]" size="1" />
                          <option value="a">Une question sur nos produits ?</option>
                          <option value="b">Un problème sur notre site ?</option>
                          <option value="c">Autres...</option>
                      </select>
                      <textarea id="msg" name="user_message"  resize:both placeholder="Votre message ..." value="<?php if(isset($message_user)) {echo $message_user;} ?>"></textarea>
                    </class>

                    <class id="Boutons">
                        <p>
                          <input type="submit" name="formContact" value="Envoyer votre message">
                        </p>
                    </class>
                </section>
            </form>
            <?php
                if(isset($erreur)) {
                   echo '<p id="erreur">'.$erreur.'</p>';
                }
            ?>
        </section>
    </body>
</html>
