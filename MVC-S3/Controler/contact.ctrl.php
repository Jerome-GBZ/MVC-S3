<?php
    if(isset($_POST['formContact'])) {

       $prenom = htmlspecialchars($_POST['prenom']);
       $nom = htmlspecialchars($_POST['nom']);
       $mail = htmlspecialchars($_POST['email']);
       $message_user = htmlspecialchars($_POST['user_message']);

       if( (!empty($_POST['prenom'])) AND (!empty($_POST['nom'])) AND (!empty($_POST['email'])) AND (!empty($_POST['user_message']))) {
          if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              /* EMAIL ADRESSER A UN INTERNOTE POUR UN PROBLEME*/
              $header="MIME-Version: 1.0\r\n";
              $header.='From:"Jerome-GBZ.fr"<contact@Jerome-GBZ.fr>'."\n";
              $header.='Content-Type:text/html; charset="uft-8"'."\n";
              $header.='Content-Transfer-Encoding: 8bit';
              $message='
              <html>
                 <body>
                    <div align="center">
                      <img src="image/logo.jpg" alt="">
                      <h1> I Want Talk </h1>
                    </div>
                    <div align="justify">
                      <p> Bonjour '.$prenom.' '.$nom.',</p>
                      <p> Récapitulatif de votre demande d\'aide ou signalement d\'un problème sur notre site. </p>
                      <fieldset> '.$message_user.' </fieldset>
                      <p> Nous essayerons de repondre au plus vite. </p>
                      <p> Si vous n\'etes pas à l\'origine de cette action merci de nous informer à l\'adresse suivante : <a href="#">contact@Jerome-gbz.fr</a>.  </p>
                      <p> A bientôt, <br>L\'équipe I Want Talk.</p>
                    </div>
                 </body>
              </html>
              ';
              mail($mail, "Prise de contact", $message, $header);
               $erreur = "Le message a bien été transmis";

               /* EMAIL ADRESSER A JEROME GBZ POUR ETUDIER PROBLEME*/
               $header="MIME-Version: 1.0\r\n";
               $header.='From:"Jerome-GBZ.fr"<contact@Jerome-gbz.fr>'."\n";
               $header.='Content-Type:text/html; charset="uft-8"'."\n";
               $header.='Content-Transfer-Encoding: 8bit';
               $message='
               <html>
                  <body>
                     <div align="center">
                       <img src="image/logo.jpg" alt="">
                       <h1> I Want Talk </h1>
                     </div>
                     <div align="justify">
                       <p> Une personne du nom de '.$prenom.' '.$nom.', a essayé de vous joindre par le formulaire de contact. </p>
                       <p> Voici c\'est coordonée : </p>
                       <p>  -  Email : '.$mail.'</p>
                       <p>  -  Nom : '.$nom.'</p>
                       <p>  -  Prenom : '.$prenom.'</p>
                       <p> Récapitulatif de ça demande d\'aide ou signalement d\'un problème sur notre site: </p>
                       <fieldset> '.$message_user.' </fieldset>
                       <p> <br>A bientôt, <br>L\'équipe I Want Talk. </p>
                     </div>
                  </body>
               </html>
               ';
               mail("jer.gambiez@orange.fr", "Prise de contact", $message, $header);
          } else {
              $erreur = "L'email n'est pas conforme.";
          }
        } else {
            $erreur = "Un des champs du formulaire n'est pas complet.";
        }
     }
?>
