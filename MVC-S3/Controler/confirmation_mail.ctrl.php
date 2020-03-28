<?php
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/confirmation_mail.view.php");

  $name = $_GET['name'];
  $email = $_GET['email'];
  $id = $_GET['id'];

  if(isset($name) AND isset($email) AND isset($id) AND (!empty($name)) AND (!empty($email)) AND (!empty($id))) {
      // On cree un objet membre
      $membres = new MembresDAO();
      $userexist = $membres->verfieEmailExist($email);
      if($userexist == 1) {
        $UnMembre = $membres->getMembres($email);
        var_dump($UnMembre);
        if ($UnMembre->getname() == $name AND $UnMembre->getid() == $id) {
          $mail_verif = $UnMembre->getmail_verif();
          if ($mail_verif == 0) {
            var_dump($UnMembre);
            $membres->update_mail_confirmation($UnMembre);
            $erreur = "Votre compte a bien été confirmé !";
            $view->erreur = $erreur;
          } else {
            $erreur = "Votre compte a déjà été confirmé !";
            $view->erreur = $erreur;
          }
        } else {
          $erreur = "Vos information sont falsifié (id ou name)!";
          $view->erreur = $erreur;
        }
      } else {
        $erreur = "Vos information sont falsifié (email)!";
        $view->erreur = $erreur;
      }
  } else {
    $erreur = "Un des paramètres est vide !";
    $view->erreur = $erreur;
  }
  $view->show();
?>
