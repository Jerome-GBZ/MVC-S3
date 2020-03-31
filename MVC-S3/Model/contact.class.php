<?php
  class Contact {
    private $id;
    private $idmembre;
    private $message;
    private $messagereponse;
    private $datemessage;
    private $datereponse;

    function getid():string  {
      return $this->id;
    }
    function getidmembre():string {
      return $this->idmembre;
    }
    function getmessage():string {
      return $this->message;
    }
    function getmessagereponse():string {
      return $this->messagereponse;
    }
    function getdatemessage():string {
      return $this->datemessage;
    }
    function getdatereponse():string {
      return $this->datereponse;
    }
  }
?>
