<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le viny - Mail non recu</title>
    <link rel="stylesheet" type="text/css" href="../View/inscription.css"/>
    <link rel="icon" href="../img/logo2.jpg" />
  </head>
  <body>
    <h1>Bonjour</h1>
    <?php
      if(isset($this->erreur)) {
         echo "<p id=\"Erreur1\">",$this->erreur,"</p>";
      }
      if (isset($this->erreur1)) {
        echo "<a href=\"confirmation_mail.ctrl.php?name=".$this->name."&email=".$this->email."&id=".$this->id."\"><button type=\"button\" name=\"button\">Confirmer votre email</button></a> <br>";
      }
    ?>
    <a href="../index.html">Revenir en arrière</a>
  </body>
</html>
