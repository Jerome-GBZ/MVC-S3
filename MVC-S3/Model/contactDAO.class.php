<?php
class ContactDAO {
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
    $reqAllMembres = "SELECT * FROM contact ORDER BY datemessage DESC limit 1";
    $req_getAllContact = $this->db->prepare($reqAllMembres);
    $req_getAllContact->execute();
    $res_getAllContact = $req_getAllContact->fetchAll();
    return $res_getAllContact;
  }


  function getContact(string $idmembre):Contact {
    $reqMembres = "SELECT * FROM contact WHERE idmembre = :idmembre";
    $req_getContact = $this->db->prepare($reqMembres);
    $req_getContact->BindParam(':idmembre', $idmembre);
    $req_getContact->execute();
    $res_getContact = $req_getContact->fetchAll(PDO::FETCH_CLASS, 'Contact');
    return $res_getContact[0];
  }

  function getContactid(string $id):Contact {
    $reqMembres = "SELECT * FROM contact WHERE id = :id";
    $req_getContact = $this->db->prepare($reqMembres);
    $req_getContact->BindParam(':id', $id);
    $req_getContact->execute();
    $res_getContact = $req_getContact->fetchAll(PDO::FETCH_CLASS, 'Contact');
    return $res_getContact[0];
  }

  // rajouter un message quuand on la recu
  function ajoutcontact(STRING $idmembre, STRING $message, STRING $typeQuestion):void {
    // on genere un id aleatoire qui sera unique
    $id = uniqid();
    $reponse = "Votre message n'a pas encore été lu !"; // vide de base
    $datemessage = date('d/m/Y - H:i');
    $datereponse = "...";

    $requette = $this->db->prepare('INSERT INTO contact VALUES(:id, :idmembre, :typeQuestion, :message, :datemessage, :reponse, :datereponse)');
    $requette->execute(array(
        'id' => $id,
        'idmembre' => $idmembre,
        'typeQuestion' => $typeQuestion,
        'message' => $message,
        'datemessage' => $datemessage,
        'reponse' => $reponse,
        'datereponse' => $datereponse));
  }

  // fuction qui permet de mettre a jour la collone mail_verif a laide dun update
  function update_reponse(Contact $c, $reponse):void {
    $datereponse = date('d/m/Y - H:i');
    $updatecontact = $this->db->prepare("UPDATE contact SET reponse = ?, datereponse = ? WHERE id = ? AND idmembre = ?");
    $updatecontact->execute(array($reponse, $datereponse, $c->getid(), $c->getidmembre()));
  }
}

?>
