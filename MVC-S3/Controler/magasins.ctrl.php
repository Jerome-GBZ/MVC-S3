<?php
  $cheminMagasin = "../Model/magasin.class.php";
  $cheminMagasinDAO = "../Model/magasinDAO.class.php";
  $cheminFramework = "../Framework/view.class.php";
  require_once($cheminMagasin);
  require_once($cheminMagasinDAO);
  include($cheminFramework);

  $magasinDAO = new MagasinDao();

  for ($i = 1; $i < 5; $i++) {
    $magasins[$i] = $magasinDAO->get($i);
  }

  $view = new View('/../View/magasins.view.php');
  $view->magasins = $magasins;

  $view->show();
?>
