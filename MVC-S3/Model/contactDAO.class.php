<?php
class MembresDAO {
  private $db;

  function __construct(){
    $database = 'sqlite:'.dirname(__FILE__).'/data/vinyles.db';
    try {
      $this->db = new PDO($database);
    } catch (\PDOException $e) {
      die("erreur de connexion : ".$e->getMessage());
    }
  }

  // fonction pour voir tous les messages de Contact envoyer
  function getAllContact():array {
    $reqAllMembres = "SELECT * FROM contact";
    $req_getAllContact = $this->db->prepare($reqAllMembres);
    $req_getAllContact->execute();
    $res_getAllContact = $req_getAllContact->fetchAll();
    return $res_getAllContact;
  }

  // cree des objets membres a partir de leur email
  function getContact(string $id):Contact {
    $reqMembres = "SELECT * FROM membres WHERE id = :id";
    $req_getContact = $this->db->prepare($reqMembres);
    $req_getContact->BindParam(':id', $id);
    $req_getContact->execute();
    $res_getContact = $req_getContact->fetchAll(PDO::FETCH_CLASS, 'Contact');
    return $res_getContact[0];
  }

}

?>
