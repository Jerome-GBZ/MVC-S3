<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le Viny - Réponse</title>
    <link rel="stylesheet" type="text/css" href="../View/contact.css">
    <link rel="icon" href="../View/img/logo_2.png" />
  </head>
  <body>
    <div class="titre">
      <h1> Toute les reponses aux questions !</h1>
      <a href="index.ctrl.php"><h2>retour à l'accueil</h2></a>

    </div>
    <?php
      if (isset($this->objetReponses)) {
        $tab = $this->objetReponses;
        foreach ($tab as $key => $value) {
            echo " <div id=\"message\">
            <p id=\"idmessage\">numéro de la demande : ".$value['id']."</p>
            <fieldset>
              <p id=\"typeQ\"".$value['typeQuestion']."</p>
              ".$value['idmembre']." : <q cite=\"\">".$value['message']."</q>
              <p id=\"datemessage\">date : ".$value['datemessage']."</p>
              <p class=\"reponsemsg\">Le viny : ".$value['reponse']."</p>
              <p class=\"reponsemsg\">date : ".$value['datereponse']."</p>
            ";
            if (isset($this->admin)) {
              echo "<form method=\"post\" action=\"\" name=\"contact-nous\">
                  <section id=\"infoperso1\">
                      <class class=\"Autres\">
                        <textarea id=\"msg\" name=\"user_message\"  resize:both minlength=\"10\" placeholder=\"Votre message ...\" value=\"<?php if(isset($this->message)) {echo $this->message;} ?>\"></textarea>
                        <h3>Repondre a la question ici</h3>
                      </class>
                      <input id=\"id\" name=\"id\" type=\"hidden\" value=\"".$value['id']."\">
                      <class id=\"Boutons\">
                          <p>
                            <input type=\"submit\" name=\"formContact\" value=\"Envoyer votre message\">
                          </p>
                      </class>
                  </section>
              </form>";
            }
            echo "</fieldset> </div>";
        }
      } else {
        echo "<p id=\"erreur\">vous n'avez posé aucune question</p>";
      }

    ?>


    </form>
  </body>
</html>
