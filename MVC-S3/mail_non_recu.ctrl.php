<?php
  session_start();
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/mail_non_recu.view.php");
  $m = unserialize($_SESSION['unMembre']);

  if(isset($m)) {
      // On cree un objet membre
      $membres = new MembresDAO();
      $unMembre = $membres->getMembres($m->getemail());

      if ($unMembre->getmail_verif() == 0) {
        $membres->envoieUnMailConfirmation($unMembre);

        $erreur1 = "vue que les mail ne fonctionneront pas si on est pas sur le d'autre machine que la notre nous mettons en place un bouton pour confirmer son mail";
        $view->erreur1 = $erreur1;

        // on lui donne aussi les 3 paramtre du membre pour qui puisse aller sur la page confirmation_mail.ctrl.php avec les bon parametre dedans
        // le bouton replace le lien cliquable qui est dans le mail
        $view->name = $unMembre->getname();
        $view->email = $unMembre->getemail();
        $view->id = $unMembre->getid();

        $erreur = "Un mail vous a été envoyer merci de ne pas réessayer avant 5 minutes !";
        $view->erreur = $erreur;
      } else {
          $erreur = "Vous avez déjà confirme votre mail !";
          $view->erreur = $erreur;
      }
  } else {
      $erreur = "Il faut etre connecté pour voir cette page !";
      $view->erreur = $erreur;
  }
  $view->show();
?>
