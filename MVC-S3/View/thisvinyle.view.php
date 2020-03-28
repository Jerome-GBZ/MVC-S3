<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../View/img/logo2.jpg" />
    <title>Play</title>
    <style>
    .arrow{
      margin: 1px;
      width: 30px;
      height: 30px;
    }

    *{
      text-decoration: none;
    }
    a{
      color: black;
    }

    div{
      text-align: center;
    }

    h1{
      text-align: center;
    }

    h2{
      text-align: center;
    }

    img{
        margin: 50px;
        margin-top: 1px;
        margin-bottom: 1px;
    }

    .vignette{
      text-align: center;
    }

    .description{
      margin-left: 30%;
      margin-right: 30%;
    }

    .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .petit{
      padding: 7px 25px;
      font-size: 14px;
    }

    .gris {background-color: #e7e7e7; color: black;} /* Gris */


/*----------------------------------------------------------------------*/


    </style>
  </head>
  <body>
    <div class="top">
      <h1>VINY</h1>
      <button class="button gris ">Accueil</button>


    <?php
      echo "
      <a href=\"../Controler/shops.ctrl.php?firstId=",$this->firstId,"&genre=",$this->genre,"\">
        <button class=\"button gris\">Retour</button>
      </a>
            </div>
           ";


echo "<div class=\"center\">";
echo "
      <a href=\"../Controler/shops.ctrl.php?firstId=0&genre=",$genre,"\">
        <button class=\"button gris petit\">
          $this->genre
        </button>
      </a>";
      echo "<h2><strong>$this->titre </strong></h2>";
      echo("<img src=\"http://$this->url\" style = \"width:200px; height:200px\">");
      echo "<p>$this->auteur</p>";
      echo "<p><strong>$this->prix €</strong></p>";


  echo "<div class=\"description\">";
      echo("<table width=\"100%\" border =\"1\" cellspacing=\"1\" cellpadding=\"5\"><tr><td>$this->description</td><tr></table>");
  echo "</div>";

echo "</div>";
    ?>

  </body>
</html>
