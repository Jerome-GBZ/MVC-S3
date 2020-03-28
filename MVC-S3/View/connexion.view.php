<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../View/connexion.css" />
    <link rel="icon" href="../View/img/logo2.jpg" />
    <title>Le Viny - Connexion</title>
  </head>
  <body>
    <div class="titre">
        <h1>Connectez - Vous</h1>
    </div>

    <section id="Container-Connexion">
        <form method="post" action="" name="Co" id="Form-Connexion">
          <section id="infoperso1">
            <section id="info-Co">
                <input type="email" name="email" placeholder="Identifiant" id="EM" value="<?php if(isset($this->mailconnect)) {echo $this->mailconnect;} ?>"/>
                <h3> Votre identifiant est votre l’adresse mail. </h3>
                <input type="password" name="pass1" minlength="6" placeholder="Mot de passe" id="Pass"/>
            </section>

            <section id="Boutons">
              <p>
                <input type="submit" name="formconnexion" value="Connexion" id="envoi">
              </p>
            </section>
          </section>
        </form>

        <div id="info-supp">
            <a href="#" class="A-Deco"> <h2> Identifiant ou mot de passe oublié ? </h2> </a>
            <a href="mail_non_recu.ctrl.php" class="A-Deco"> <h2> Vous n’avez pas encore recu de mail de confirmation ? confirmez le ici</h2> </a>
            <a href="inscription.ctrl.php" class="A-Deco"> <h2> Vous n’avez pas encore crée votre compte ? Créez-en un maintenant. </h2> </a>
        </div>

        <?php
           if(isset($this->erreur1)) {
              echo "<p id=\"Erreur1\">",$this->erreur1,"</p>";
           }
        ?>
    </section>
  </body>
</html>
