<?php
  require_once('../Model/membresDAO.class.php');
  require_once('../Model/membres.class.php');
  include("../Framework/view.class.php");

  $view = new View("../View/inscription.view.php");

  // on regarde si on a bien recu le formulaire de connexion (si la variable n'est pas null)
  if(isset($_POST['forminscription'])) {
  if( (!empty($_POST['prenom'])) AND (!empty($_POST['nom'])) /* AND (!empty($_POST['email'])) AND (!empty($_POST['pass1'])) and (!empty($_POST['pass2']))*/) {
        // htmlspecialchars: utilisée pour convertir des caractères spéciaux
        // cela evite qu'on puisse faire passer un code pour potentiellement hack la base de donne ou autre
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['pass1']);
        $mdp2 = htmlspecialchars($_POST['pass2']);

        $view->nom = $nom;
        $view->prenom = $prenom;
        $view->email = $email;

        // pour supprimer d'abord tous les caractères spéciaux si il en reste mais verifie si c'est bien un email valide
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // On cree un objet membre
            $membres = new MembresDAO();
            // on verifie si l'eamil fournie dans lurl fait partie d'un membre deja inscrit
            $emailexist  = $membres->verfieEmailExist($email);
            // si le resultat renvoyer par la fonctuon est 0 le mail n'exite pas dans la base de donné
            // il faut qye le mail soit unique donc 1 fois dans notre base pas plus
            if($emailexist == 0) {
                // on test si nos mot de passe sont identique vue quil y a 2 champs
                if($mdp == $mdp2) {
                    // on hash le mot de passe pour le crypté
                    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                    // on inscrit le membre a la base de donné
                    $membres->inscrireUnMembre($nom, $prenom, $email, $mdp_hash);
                    // une fois inscrit on peut le cree en objet memebre
                    $UnMembre = $membres->getMembres($email);
                    // on lui envoie un mail pour quil confirme sont email
                    $membres->envoieUnMailConfirmation($UnMembre);

                    $view->erreur = "Votre compte a bien été créé !";
                    $view->chargement = 1;
                    // Stoppe pour 15 secondes pour laisser le temps de lire le message : Votre compte a bien été créé
                    sleep(15);
                    // puis on envoie le membre sur la page de connexion
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
