<?php
  class VinyleDAO {
    private $db;

    function __construct(){
      $database = 'sqlite:data/vinyles.db';
      try {
        $this->db = new PDO($database);
      } catch (\PDOException $e) {
        die("erreur de connexion : ".$e->getMessage());
      }
    }

    function getAllEmail():ARRAY {
      $req_All = $this->db->prepare("SELECT email FROM newsletters");
      $req_All->execute();
      $resAll = $req_All->fetchAll();
      return $resAll;
    }

    // cette fonction va avoir pour but de verifier si l'email n'existe pas deja
    function verfieEmailExist($mail):INTEGER {
      $reqmail = $this->db->prepare("SELECT * FROM membres WHERE email = ?"); // remplacer "" par '' ?
      $reqmail->execute(array($mail));
      $mailexist = $reqmail->rowCount();

      // si = 0 le mail n'est pas encore enregistrer
      if ($mailexist == 0) {
        $res = 0;
      } else {  // si = 1 le mail y est deja
        $res = 1;
      }
      return $res;
    }

    // 
    function envoieUnMail($mail):VOID {
      $header="MIME-Version: 1.0\r\n";
      $header.='From:"Projet php"<projet.php.mail@gmail.com>'."\n";
      $header.='Content-Type:text/html; charset="uft-8"'."\n";
      $header.='Content-Transfer-Encoding: 8bit';

      $message='
      <html>
        <body>
          <div align="center">
            <br />
            J\'ai envoyé ce mail avec PHP !
            <br />
          </div>
        </body>
      </html>
      ';

      mail($mail, "Newsletters - Projet PHP", $message, $header);
    }
  }
?>
