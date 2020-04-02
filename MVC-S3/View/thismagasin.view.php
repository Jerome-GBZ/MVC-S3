<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Store</title>
    <style media="screen">
      body {
        text-align: center;
      }
      div {
        display: flex;
        justify-content: center;
      }

      div img {
        margin-top: 15px;
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

      .gris {background-color: #e7e7e7; color: black;} /* Gris */
    </style>
  </head>
  <body>
    <div class="">
      <img src="<?php echo "$this->drapeau"; ?>" alt="" style="width:75px; height:50px">
      <h1>Viny <?php echo " $this->pays"; ?></h1>
    </div>
    <h2><?php echo "$this->ville"; ?></h2>
    <img src="<?php echo "$this->url"; ?>" alt="" style="width=:200px; height:200px">
    <h3><?php echo "$this->adresse, ", "$this->codePostal, $this->ville"; ?></h3>
    <p><?php echo "<div class=\"description\">",
                    ("<table width=\"100%\" border =\"1\" cellspacing=\"1\" cellpadding=\"5\"><tr><td>$this->description</td><tr></table>"),
                    "</div>";; ?>
    </p>

    <a href="..">
      <button class="button gris ">Accueil</button>
    </a>
  </body>
</html>
