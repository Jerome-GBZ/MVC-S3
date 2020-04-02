<?php
  $cheminMagasin = dirname(__FILE__)."/../Model/magasin.class.php";
  $cheminMagasinDAO = dirname(__FILE__)."/../Model/magasinDAO.class.php";
  $cheminFramework = dirname(__FILE__)."/../Framework/view.class.php";
  require_once($cheminMagasin);
  require_once($cheminMagasinDAO);
  include($cheminFramework);

  $magasinDAO = new MagasinDao();

  for ($i = 1; $i < 5; $i++) {
    $magasins[$i] = $magasinDAO->get($i);
  }

  $view = new View(dirname(__FILE__).'/../View/magasins.view.php');
  $view->magasins = $magasins;

  $view->show();
?>
