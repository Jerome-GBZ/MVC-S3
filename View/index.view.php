<!doctype html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Le Viny - Accueil</title>
        <link rel="stylesheet" href="../View/index.css">
        <link rel="icon" href="../View/img/logo2.jpg" />
    </head>

    <body>
        <?php
          if (isset($this->name)) {
            echo "<p id=\"user\">Deconnecter de $this->name <a href=\"deconnexion.ctrl.php\">X</a> </p>";
          }
        ?>
        <h1 id="title-1">Le Viny</h1>
        <!-- PARTIE LOGO : -->
        <div id="home-wrapper">
            <div id="home" class="clearfix container">
                <a href="shops.ctrl.php" class="home-pochette" id="pochette_1">
                  <div class="bg">
                        <img width="200px" height="auto" src="../View/img/index/svg/pink.svg" alt="">
                  </div>
                  <div class="text">Shop</div>
                </a>

                <a href="magasins.ctrl.php" class="home-pochette" id="pochette_2">
                  <div class="bg">
                        <img width="200px" height="auto" src="../View/img/index/svg/Bad.svg" alt="">
                  </div>
                  <div class="text">Stores</div>
                </a>

                <a href="contact.ctrl.php" class="home-pochette" id="pochette_3">
                  <div class="bg">
                        <img width="200px" height="auto" src="../View/img/index/svg/jvlivs.svg" alt="">
                  </div>
                  <div class="text">Contact</div>
                </a>

                <a href="reponse.ctrl.php" class="home-pochette" id="pochette_4">
                  <div class="bg">
                        <img width="200px" height="auto" src="../View/img/index/svg/johnny.svg" alt="">
                  </div>
                  <div class="text">Historiques des questions</div>
                </a>
            </div>
        </div>

        <div class="connexion">
            <a href="connexion.ctrl.php" class="button"> Vous pouvez vous connecter ici </a>
        </div>
    </body>
</html>
