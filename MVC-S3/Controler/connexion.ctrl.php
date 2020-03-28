<?php
  session_start();
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/connexion.view.php");

  if(isset($_POST['formconnexion'])) {
      $mailconnect = htmlspecialchars($_POST['email']);
      $mdp = htmlspecialchars($_POST['pass1']);
      $view->mailconnect = $mailconnect;

      if( (isset($mailconnect) AND isset($mdp)) AND (!empty($mailconnect) AND !empty($mdp)) ) {
          if(filter_var($mailconnect, FILTER_VALIDATE_EMAIL)) {
              // On cree un objet membre
              $membres = new MembresDAO();
              $userexist = $membres->verfieEmailExist($mailconnect);

              if($userexist == 1) {
                  $UnMembre = $membres->getMembres($mailconnect);

                  // $_SESSION['id'] = $UnMembre->getid();
                  // $_SESSION['name'] = $UnMembre->getname();
                  // $_SESSION['email'] = $UnMembre->getemail();
                  // $_SESSION['newsletters'] = $UnMembre->getnewsletters();
                  // $_SESSION['password'] = $UnMembre->getpassword();
                  $_SESSION['unMembre'] = serialize($UnMembre);

                  if (password_verify($mdp, $UnMembre->getpassword())) {
                     header("Location: shops.ctrl.php");
                  } else {
                     $erreur1 = "Mauvais mot de passe !";
                     $view->erreur1 = $erreur1;
                  }
              } else {
                    $erreur1 = "Mauvais mail ou mot de passe !";
                    $view->erreur1 = $erreur1;
              }
          }else{
              $erreur1 = "Email n'est pas valide !";
              $view->erreur1 = $erreur1;
          }
      }else{
          $erreur1 = "Tous les champs doivent être complétés !";
          $view->erreur1 = $erreur1;
      }
   }

  $view->show();
?>
