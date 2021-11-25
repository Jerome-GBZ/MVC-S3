<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VINY</title>
    <style media="screen">
      body {
        text-align: center;
      }

      .magasins {
        display: flex;
        justify-content: space-around;
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

      .gris {background-color: #e7e7e7; color: black;} /* Gris */
    </style>
  </head>
  <body>
    <h1>VINY</h1>
    <a href="..">
      <button class="button gris ">Accueil</button>
    </a>
    <div class="magasins">
      <?php
        foreach($this->magasins as $magasin) {
          $id = $magasin->getId();
          $pays = $magasin->getPays();
          $url = $magasin->getUrl();

          echo "<div class=\"magasin\">";
          echo "<a href=\"../Controler/thismagasin.ctrl.php?id=", $id,"\">
                  <img src=\"http://$url\" alt=\"\" style = \"width:200px; height:200px\">
                </a>";
          echo "<br>";
          echo "<p>$pays</p>";
          echo "</div>";
        }
      ?>
    </div>
  </body>
</html>
