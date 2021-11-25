<?php
  class MagasinDao {
    private $db;

    function __construct(){
      $database = 'sqlite:'.dirname(__FILE__).'/data/vinyles.db';
      try {
        $this->db = new PDO($database);
      } catch (\PDOException $e) {
        die("erreur de connexion : ".$e->getMessage());
      }
    }

    function get(int $id):Magasin {
      $req = "SELECT * FROM magasin WHERE id = :id";
      $stmt = $this->db->prepare($req);
      $stmt->BindParam(':id', $id);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Magasin');
      return $res[0];
    }
  }
?>
