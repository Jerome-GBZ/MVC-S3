<?php
  session_start();
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/connexion.view.php");

  // on regarde si on a bien recu le formulaire de connexion (si la variable n'est pas null)
  if(isset($_POST['formconnexion'])) {
      // htmlspecialchars: utilisée pour convertir des caractères spéciaux
      // cela evite qu'on puisse faire passer un code pour potentiellement hack la base de donne ou autre
      $mailconnect = htmlspecialchars($_POST['email']);
      $mdp = htmlspecialchars($_POST['pass1']);
      $view->mailconnect = $mailconnect;

      // on verifie si elle ne sont pas vide
      if( (isset($mailconnect) AND isset($mdp)) AND (!empty($mailconnect) AND !empty($mdp)) ) {
          // pour supprimer d'abord tous les caractères spéciaux si il en reste mais verifie si c'est bien un email valide
          if(filter_var($mailconnect, FILTER_VALIDATE_EMAIL)) {
              // On cree un objet membre
              $membres = new MembresDAO();
              // on verifie si l'eamil fournie dans lurl fait partie d'un membre deja inscrit
              $userexist = $membres->verfieEmailExist($mailconnect);
              // si le resultat renvoyer par la fonctuon est 1 le mail exite dans la base de donné
              if($userexist == 1) {
                  // a partir de lemail on cree un membre
                  $UnMembre = $membres->getMembres($mailconnect);
                  // on verifie si le mot de passe correcpond a celui contenue dans la base de donne
                  // etant donner que le mot de passe est crypté dans notre base de donne il faut utilisée password_verify()
                  if (password_verify($mdp, $UnMembre->getpassword())) {
                       // session est est une variable qui nous permet de faire passer des information entre les pages
                       // est va avec la function session_start(); qui est debut de chaque page qui aurait besoin de savoir
                       // si un membre est déjà connecté

                       // serialize des données signifie convertir une valeur en une séquence de bits
                       // nous utilisons cette function pour faire passer l'bojet memebre. car un objet utilise des poiteurs.
                       $_SESSION['unMembre'] = serialize($UnMembre);
                       // une fois connecté on rediriger sur la page de shops
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
