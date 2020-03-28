<?php
  require_once('vinyle.class.php');
  require_once('vinyleDAO.class.php');

  // Récupération des données de configuration
  //$config = parse_ini_file('../Config/config.ini');

  // Creation de l'instace DAO
  $vinyles = new VinyleDAO(/*$config['database_path']*/);

  $v = $vinyles->getGenre('variété');
  var_dump($v);

  $v2 = $vinyles->get(38);
  var_dump($v2);

  $v3 = $vinyles->get(25);
  $id = $v3->getId();
  var_dump($id);
  $titre = $v3->getTitre();
  var_dump($titre);
  $auteur = $v3->getAuteur();
  var_dump($auteur);
  $url = $v3->getUrl();
  var_dump($url);
  $description = $v3->getDescription();
  var_dump($description);
  $prix = $v3->getPrix();
  var_dump($prix);
  $genre = $v3->getGenre();
  var_dump($genre);
?>
