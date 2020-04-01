<?php
  require_once("..Model/magasin.class.php");
  require_once("..Model/magasinDAO.class.php");
  include("../Framework/view.class.php");

  $magasins = new MagasinDao();

  $view = new View('../View/magasins.view.php');

  $view->show();
?>
