<?php
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/inscription.view.php");

  if(isset($_POST['forminscription'])) {
     if( (!empty($_POST['prenom'])) AND (!empty($_POST['nom'])) AND (!empty($_POST['email'])) AND (!empty($_POST['pass1'])) and (!empty($_POST['pass2']))) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['pass1']);
        $mdp2 = htmlspecialchars($_POST['pass2']);

        $view->nom = $nom;
        $view->prenom = $prenom;
        $view->email = $email;

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // On cree un objet membre
            $membres = new MembresDAO();
            $emailexist  = $membres->verfieEmailExist($email);

            if($emailexist == 0) {
                if($mdp == $mdp2) {
                    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                    $membres->inscrireUnMembre($nom, $prenom, $email, $mdp_hash);
                    $UnMembre = $membres->getMembres($email);
                    $membres->envoieUnMailConfirmation($m);

                    $view->erreur = "Votre compte a bien été créé !";
                    $view->chargement = 1;
                    // Stoppe pour 10 secondes pour laisser le temps de lire le message : Votre compte a bien été créé
                    sleep(15);
                    header('location: connexion.ctrl.php');
                } else {
                    $view->erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
              $view->erreur = "Adresse mail déjà utilisée !";
            }

       } else {
          $view->erreur = "L'email n'est pas valide !";
       }
    } else {
       $view->erreur = "Tous les champs doivent être complétés !";
    }
  }
  $view->show();
?>
