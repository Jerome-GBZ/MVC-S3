<?php
  session_start();
  require_once('../Model/contactDAO.class.php');
  require_once('../Model/contact.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/contact.view.php");
  $m = unserialize($_SESSION['unMembre']);

  if (isset($m)) {
    // On cree un objet membre
    $membres = new MembresDAO();
    // on peut le cree en objet memebre evec l'eamail pour etre sur que toute les information soit a jour
    // si le membre a confirmer son mail entre temps il faut actualiser c'est donne car la session date de l'inscription
    $unMembre = $membres->getMembres($m->getemail());
    if (isset($_POST['formContact'])) {
      $choix = htmlspecialchars($_POST['choix']);
      $message = htmlspecialchars($_POST['user_message']);
      if ( isset($choix) AND !empty($choix) AND isset($message) AND !empty($message) ) {
        // On cree un objet contact
        $contact = new ContactDAO();
        $contact->ajoutcontact($unMembre, $message, $choix);
      } else {
        $erreur = "Un des champs du formulaire n'est pas complet.";
        $this->erreur = $erreur;
      }
    }
  } else {
    $erreur = "Il faut etre connecté pour voir cette page";
    $this->erreur = $erreur;
  }
  $view->show();
?>
