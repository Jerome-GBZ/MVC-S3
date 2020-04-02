<?php
<<<<<<< HEAD
  $cheminMagasin = "../Model/magasin.class.php";
  $cheminMagasinDAO = "../Model/magasinDAO.class.php";
  $cheminFramework = "../Framework/view.class.php";
  require_once($cheminMagasin);
  require_once($cheminMagasinDAO);
  include($cheminFramework);
=======
  require_once("../Model/magasin.class.php");
  require_once("../Model/magasinDAO.class.php");
  include("../Framework/view.class.php");
>>>>>>> 467ea4866e6c25f6081b8ca88910174591dd0b0a

  $magasinDAO = new MagasinDao();

  for ($i = 1; $i < 5; $i++) {
    $magasins[$i] = $magasinDAO->get($i);
  }

  $view = new View('../View/magasins.view.php');
  $view->magasins = $magasins;

  $view->show();
?>
