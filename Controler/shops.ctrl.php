<?php
  require_once ("../Model/vinyle.class.php");
  require_once ("../Model/vinyleDAO.class.php");
  include("../Framework/view.class.php");

  $vinyle = new VinyleDAO();

  // recupère le firstId dans lurl si y en a pas par deffault on met : '1'
  if (isset($_GET['firstId'])) {
    $firstId = $_GET['firstId'];
  } else {
    $firstId = 1;
  }

  // recupère le genre dans lurl si y en a pas par deffault on met : 'nothing'
  if (isset($_GET['genre']) && $_GET['genre'] != '') {
    $genre = $_GET['genre'];
  } else {
    $genre = 'nothing';
  }
  // nombre element dans la page
  $nbElemPage = 3;
  // calcule le dernier id de la page en question
  $lastId = $firstId + $nbElemPage;
  // calcule id suivant
  $next = $firstId + $nbElemPage;

  // if permet de bloquer la fleche de gauche quand il n'y a plus delement precedent.
  if ($firstId>1) {
    $prev = $firstId - $nbElemPage;
  } else {
    $prev = 1;
  }

  // calcule la page ou on est
  if ($firstId >= $nbElemPage) {
    $currentPage = ($firstId-1)/$nbElemPage +1;
  } else {
    $currentPage = 1;
  }

  if($genre == "nothing"){
    for ($i=$firstId; $i < $lastId; $i++) {
      if ($i >= $vinyle->nbElementTotal()+1) {
        $list['non'.$i] = "#";
      } else {
        $m = $vinyle->get($i);
        $list[$m->getId()] = $m->getUrl();
      }
    }
    $nbpagetotal = (int)($vinyle->nbElementTotal()/$nbElemPage)+1;
  } else{
    $tab = $vinyle->getGenre($genre);

    for ($i=$firstId-1; $i < $lastId-1; $i++) {
      $m = $tab[$i];
      if ($m == NULL) {
        $list['non'.$i] = "#";
      } else {
        $list[$m->getId()] = $m->getUrl();
      }
    }
    $nbpagetotal = (int)(count($tab)/$nbElemPage)+1;
  }
  foreach ($list as $key => $value) {
    if ($value == '#') {
      $next = $firstId;
    }
  }
  
  $view = new View('../View/shops.view.php');
  $view->prev = $prev;
  $view->next = $next;
  $view->genre = $genre;
  $view->currentPage = $currentPage;
  $view->nbpagetotal = $nbpagetotal;
  $view->list = $list;
  $view->firstId = $firstId;

  $view->show();
?>
