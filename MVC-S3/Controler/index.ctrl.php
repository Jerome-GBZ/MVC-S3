<?php
  session_start();
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/index.view.php");

  $m = unserialize($_SESSION['unMembre']);
  
  if(isset($_SESSION['unMembre'])) {
    $view->name = $m->getname();
  }

  $view->show();
?>
