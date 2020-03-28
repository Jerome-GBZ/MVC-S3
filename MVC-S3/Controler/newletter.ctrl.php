<?php
  session_start();
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/mail_non_recu.view.php");
  $m = unserialize($_SESSION['unMembre']);
  if(isset($m)) {

  } else {
    // si le membre n'est pas connecté lui afficher un formulaire pour quil puisse rentrer son email
    $erreur = "afficher le formulaire";
    $view->erreur = $erreur;

    // puis verifier si le mail entrer nest pas deja dans la base de donné 
  }

  $view->show();
?>
