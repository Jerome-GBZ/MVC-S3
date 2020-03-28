<?php
  class VinyleDAO {
    private $db;

    function __construct(){
      $database = 'sqlite:'.dirname(__FILE__).'/data/vinyles.db';
      try {
        $this->db = new PDO($database);
      } catch (\PDOException $e) {
        die("erreur de connexion : ".$e->getMessage());
      }
    }

    function get(int $id):Vinyle {
      $req = "SELECT * FROM vinyle WHERE id = :id";
      $stmt = $this->db->prepare($req);
      $stmt->BindParam(':id', $id);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Vinyle');
      return $res[0];
    }

    function getGenre(string $genre):array {
      $req = "SELECT * FROM vinyle WHERE genre = :genre";
      $stmt = $this->db->prepare($req);
      $stmt->BindParam(':genre', $genre);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Vinyle');
      return $res;
    }
  }
?>
