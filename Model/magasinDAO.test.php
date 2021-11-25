<?php
  require_once('magasin.class.php');
  require_once('magasinDAO.class.php');

  $magasins = new MagasinDao();

  $m1 = $magasins->get(1);
  var_dump($m1);

  $m2 = $magasins->get(2);
  var_dump($m2);

  $m3 = $magasins->get(3);
  var_dump($m3);

  $m4 = $magasins->get(4);
  var_dump($m4);
?>
