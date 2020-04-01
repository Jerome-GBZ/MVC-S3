<?php
  require_once('../Model/vinyleDAO.class.php');
  require_once('../Model/vinyle.class.php');
  include("../Framework/view.class.php");
  session_start();

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  if (isset($_GET['firstId'])) {
    $firstId = $_GET['firstId'];
  }

  if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
  }


  $vinyle = new VinyleDAO();
  $m = $vinyle->get($id);
  $url = $m->getUrl();
  $desc = $m->getDescription();
  $auteur = $m->getAuteur();
  $titre = $m->getTitre();
  $prix = $m->getPrix();
  $txt_reduction = '';
  if( isset($_SESSION['unMembre']) && ($_SESSION['unMembre'] != '') ){
      $prix = ($prix*0.70);
      $txt_reduction = '-30%';
  }

  $genre = $m->getGenre();

  // $cover = $url.'img/'.$m->cover;
  // $music = $url.'mp3/'.$m->mp3;


  $view = new View("../View/thisvinyle.view.php");
  $view->id = $id;
  $view->genre = $genre;
  $view->url = $url;
  $view->description = $desc;
  $view->auteur = $auteur;
  $view->titre = $titre;
  $view->prix = $prix;
  $view->txt_reduction = $txt_reduction;
  $view->genre = $genre;
  $view->firstId = $firstId;

  $view->show();



?>
