
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Le Viny - contact </title>
    <link rel="stylesheet" type="text/css" href="../View/contact.css">
    <link rel="icon" href="../View/img/logo_2.png" />
  </head>
    <body>
        <section id="container-contact">
            <div class="titre">
                <h1> Page de Contact </h1>
                <h2> Si vous avez une question ou détecter un quelconque problème sur notre site merci de nous informer à l'aide de ce formulaire de contact. </h2>
            </div>
            <?php
                if(isset($this->erreur)) {
                   echo '<p id="erreur">'.$this->erreur.'</p>';
                }
                if (isset($this->appartition) or isset($this->erreur1) or isset($this->valider)) {
                  // nous savons que ce n'est pas tres propre mais nous arrivons pas a faire autrement
                  echo "<form method=\"post\" action=\"\" name=\"contact-nous\">
                      <section id=\"infoperso1\">
                          <class class=\"Autres\">
                            <h3>si je place la phrase ici ca va donner quoui</h3>
                            <select name=\"choix[]\" size=\"1\" />
                                <option value=\"Une question sur nos produits ?\">Une question sur nos produits ?</option>
                                <option value=\"Un problème sur notre site ?\">Un problème sur notre site ?</option>
                                <option value=\"Autres...\">Autres...</option>
                            </select>
                            <textarea id=\"msg\" name=\"user_message\"  resize:both minlength=\"10\" placeholder=\"Votre message ...\" value=\"<?php if(isset($this->message)) {echo $this->message;} ?>\"></textarea>
                          </class>

                          <class id=\"Boutons\">
                              <p>
                                <input type=\"submit\" name=\"formContact\" value=\"Envoyer votre message\">
                              </p>
                          </class>
                      </section>
                  </form>";

                  echo '<p id="erreur">'.$this->erreur1.'</p>';
                  if (isset($this->valider)) {
                    echo "<p id=\"valider\">$this->valider<a href=\"reponse.ctrl.php\"> Les réponses </a></p>";
                  }
                }
            ?>

        </section>
    </body>
</html>
