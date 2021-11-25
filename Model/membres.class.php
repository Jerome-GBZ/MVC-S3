<?php
  class Membres {
    private $id;
    private $name;
    private $prenom;
    private $email;
    private $newsletters;
    private $password;
    private $mail_verif;

    function getid():string  {
      return $this->id;
    }
    function getname():string {
      return $this->name;
    }
    function getprenom():string {
      return $this->prenom;
    }
    function getemail():string {
      return $this->email;
    }
    function getnewsletters():string {
      return $this->newsletters;
    }
    function getpassword():string {
      return $this->password;
    }
    function getmail_verif():string  {
      return $this->mail_verif;
    }
}
?>
