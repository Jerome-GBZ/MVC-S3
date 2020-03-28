<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le Viny - Confirmation mail</title>
    <link rel="stylesheet" type="text/css" href="../View/inscription.css"/>
    <link rel="icon" href="../View/img/logo2.jpg" />
  </head>
  <body>
    <h1>Bonjour</h1>
    <?php
      if(isset($this->erreur)) {
         echo "<p id=\"Erreur1\">",$this->erreur,"</p>";
      }
    ?>
    <h2> Vous pouvez, <a href="../index.html"> revenir au menu</a> </h2>
  </body>
</html>
