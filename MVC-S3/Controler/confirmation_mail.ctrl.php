<?php
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/confirmation_mail.view.php");

  // on recupère les informations contenue dans lurl
  $name = $_GET['name'];
  $email = $_GET['email'];
  $id = $_GET['id'];

  // on verifie si elle ne sont pas vide
if(isset($name) AND isset($email) AND isset($id) /*AND (!empty($name)) AND (!empty($email)) AND (!empty($id))*/) {
      // On cree un objet membre
      $membres = new MembresDAO();
      // on verifie si l'eamil fournie dans lurl fait partie d'un membre deja inscrit
      $userexist = $membres->verfieEmailExist($email);
      // si l'eamil est dans la base de donné on passe dans le if sinon dans le else
      if($userexist == 1) {
        // a partir de lemail on cree un membre
        $UnMembre = $membres->getMembres($email);
        // on verifie si les 2 autre info corresponde au membres
        if ($UnMembre->getname() == $name AND $UnMembre->getid() == $id) {
          // on test si le membre a pas deja verfier sont mail
          $mail_verif = $UnMembre->getmail_verif();
          // si il na pas deja verifier $mail_verif == 0 sinon passe dans le else
          if ($mail_verif == 0) {
            // on update dans la table membre la valeur qui passe de 0 a 1 pour dire que sont mail est confirmer
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
