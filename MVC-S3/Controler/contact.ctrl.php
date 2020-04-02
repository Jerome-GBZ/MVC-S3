<?php
  session_start();
  require_once('../Model/contactDAO.class.php');
  require_once('../Model/contact.class.php');

  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/contact.view.php");
  if(isset($_SESSION['unMembre'])) {
    // on recupère le membre connecté que l'on de serialize
    $m = unserialize($_SESSION['unMembre']);
    $view->message = '';
    if(isset($_POST['formContact'])) {
      // On cree un objet membre
      $membres = new MembresDAO();
      // on peut le cree en objet memebre evec l'eamail pour etre sur que toute les information soit a jour
      // si le membre a confirmer son mail entre temps il faut actualiser c'est donne car la session date de l'inscription
      $unMembre = $membres->getMembres($m->getemail());
      $choix = $_POST['choix'];
      $message = htmlspecialchars($_POST['user_message']);
      $view->message = $message;

      if(isset($choix) AND isset($message)) {
        // On cree un objet contact
        $contact = new ContactDAO();
        $contact->ajoutcontact($unMembre->getid(), $message, $choix['0']);

        $valider = "Votre message a bie été transmis vous pouvez suivre cela sur la page : ";
        $view->valider = $valider;
      } else {
        $erreur1 = "Un des champs du formulaire n'est pas complet.";
        $view->erreur1 = $erreur1;
      }
    } else {
      $appartition = "faire apparaitre le formulaire";
      $view->appartition = $appartition;
    }
  } else {
      $erreur = "Il faut etre connecté pour voir cette page !";
      $view->erreur = $erreur;
  }
  $view->show();
?>
