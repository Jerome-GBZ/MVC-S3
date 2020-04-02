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
    </style>
  </head>
  <body>
    <h1>VINY</h1>
    <div class="magasins">
      <?php
        foreach($this->magasins as $magasin) {
          $id = $magasin->getId();
          $pays = $magasin->getPays();
          $url = $magasin->getUrl();
          $href = dirname(__FILE__).'/../Controler/thismagasin.ctrl.php';

          echo "<div class=\"magasin\">";
          echo "<a href=\"$href?id=", $id,"\">
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
