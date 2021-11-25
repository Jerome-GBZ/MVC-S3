<?php
  class Vinyle {
    private $id;
    private $titre;
    private $auteur;
    private $url;
    private $description;
    private $prix;
    private $genre;

    function getId() {
      return $this->id;
    }

    function getTitre() {
      return $this->titre;
    }

    function getAuteur() {
      return $this->auteur;
    }

    function getUrl() {
      return $this->url;
    }

    function getDescription() {
      return $this->description;
    }

    function getPrix() {
      return $this->prix;
    }

    function getGenre() {
      return $this->genre;
    }
  }
?>
