<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le Viny - inscription</title>
    <link rel="stylesheet" type="text/css" href="../View/inscription.css"/>
    <link rel="icon" href="../img/logo2.jpg" />
  </head>
  <body>
    <script type="text/javascript" src="../js/verif_mdp.js"> </script>
    <section id="container-inscription">
         <div class="titre">
             <h1> Crée votre identifiant </h1>
             <h2> Si vous avez déjà un compte <a href="connexion.ctrl.php">Retrouvez-le ici</a> </h2>
         </div>

         <form method="post" action="" name="Membres">
             <section id="infoperso1">
                 <class class="PreNom">
                     <input type="text" name="prenom" id="name" placeholder="Prénom" value="<?php if(isset($this->prenom)) {echo $this->prenom;} ?>" maxlength="120" />
                     <input type="text" name="nom" id="nom" placeholder="Nom de Famille" value="<?php if(isset($this->nom)) {echo $this->nom;} ?>" />
                 </class>

                 <class class="Autres">
                   <input type="email" name="email" id="idmail" placeholder="Email" value="<?php if(isset($this->email)) {echo $this->email;} ?>" />
                   <h3> Cette adresse sera votre identifiant </h3>

                   <input type="password" name="pass1" id="password1" minlength="6" placeholder="Mot de passe" onkeyup="checkPass();">
                   <h3> Le mot de passe doit au moins contenir 6 caractères </h3>
                   <input type="password" name="pass2" id="password2" minlength="6" placeholder="Confirmer le mot de passe" onkeyup="checkPass();">
                   <h3 id="Error-Password" class="Error-Password1"></h3>
                   <h3> En vous inscrivant vous acceptez recevoir des mails de promotion !</h3>
                 </class>

                 <class id="Boutons">
                     <p>
                       <input type="submit" name="forminscription" value="Inscription">
                     </p>
                 </class>
             </section>
         </form>

         <?php
           if(isset($this->erreur)) {
              echo "<p id=\"Erreur1\">",$this->erreur,"</p>";
           }
           if(isset($this->chargement)) {
              echo "<img src=\"../img/spin.gif\" alt=\"\">";
           }
         ?>

     </section>
  </body>
</html>
