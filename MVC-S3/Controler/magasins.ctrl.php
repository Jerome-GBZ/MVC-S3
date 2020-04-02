<?php
  require_once("../Model/magasin.class.php");
  require_once("../Model/magasinDAO.class.php");
  include("../Framework/view.class.php");

  $magasinDAO = new MagasinDao();

  for ($i = 1; $i < 5; $i++) {
    $magasins[$i] = $magasinDAO->get($i);
  }

  $view = new View('../View/magasins.view.php');
  $view->magasins = $magasins;

  $view->show();
?>
