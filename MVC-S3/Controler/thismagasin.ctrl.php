<?php
  require_once('../Model/magasinDAO.class.php');
  require_once('../Model/magasin.class.php');
  include("../Framework/view.class.php");

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  $magasins = new MagasinDao();

  $magasin = $magasins->get($id);
  $pays = $magasin->getPays();
  $ville = $magasin->getVille();
  $codePostal = $magasin->getCodePostal();
  $adresse = $magasin->getAdresse();
  $url = 'http://'.$magasin->getUrl();
  $description = $magasin->getDescription();

  if ($pays == 'France') {
    $drapeau = 'https://t4.ftcdn.net/jpg/02/10/63/89/240_F_210638910_WNraQwBx54nL7Rv012L0YnHgZ2bigur2.jpg';
  }
  else if ($pays == 'États-Unis') {
    $drapeau = 'https://t3.ftcdn.net/jpg/00/42/94/44/240_F_42944453_NuynmPUOA0vjaMKpmTQhrbzARHcaqbI4.jpg';
  }
  else if ($pays == 'Royaume-Uni') {
    $drapeau = 'https://t3.ftcdn.net/jpg/00/69/10/62/240_F_69106259_lMtSe5fv0GBBxzbpaABnqRXjku8pQaE1.jpg';
  }
  else if ($pays = 'Australie') {
    $drapeau = 'https://t4.ftcdn.net/jpg/00/69/39/65/240_F_69396539_OlrKk7npVhoWMJWzXd2pYZiNJVcjpnq4.jpg';
  }

  $view = new View('/../View/thismagasin.view.php');
  $view->pays = $pays;
  $view->ville = $ville;
  $view->codePostal = $codePostal;
  $view->adresse = $adresse;
  $view->url = $url;
  $view->description = $description;
  $view->drapeau = $drapeau;

  $view->show();
?>
