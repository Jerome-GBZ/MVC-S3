<?php
require_once ("../Model/vinyle.class.php");
require_once ("../Model/vinyleDAO.class.php");
include("../Framework/view.class.php");


$vinyle = new VinyleDAO();


if (isset($_GET['firstId'])) {
  $firstId = $_GET['firstId'];
} else {
  $firstId = 1;
}

if (isset($_GET['genre']) && $_GET['genre'] != '') {
  $genre = $_GET['genre'];
} else {
  $genre = 'nothing';
}

$nbElemPage = 3;

$lastId = $firstId + $nbElemPage;

$next = $firstId + $nbElemPage;

if ($firstId>1) {
  $prev = $firstId - $nbElemPage;
} else {
  $prev = 1;
}

if ($firstId >= $nbElemPage) {
  $currentPage = ($firstId-1)/$nbElemPage +1;
} else {
  $currentPage = 1;
}

if($genre == "nothing"){
  for ($i=$firstId; $i < $lastId; $i++) {
    $m = $vinyle->get($i);
    $list[$i] = $m->getUrl();
  }
}else{

  $tab = $vinyle->getGenre($genre);

  for ($i=$firstId-1; $i < $lastId -1; $i++) {
    $m = $tab[$i];
    $list[$m->getId()] = $m->getUrl();
  }

}
//var_dump($tab);


$view = new View('../View/shops.view.php');
$view->prev = $prev;
$view->next = $next;
$view->genre = $genre;
$view->currentPage = $currentPage;
$view->list = $list;
$view->firstId = $firstId;

$view->show();
?>
