<?php
  class Magasin {
    private $id;
    private $pays;
    private $ville;
    private $codePostal;
    private $adresse;
    private $url;
    private $description;

    function getId() {
      return $this->id;
    }

    function getPays() {
      return $this->pays;
    }

    function getVille() {
      return $this->ville;
    }

    function getCodePostal() {
      return $this->codePostal;
    }

    function getAdresse() {
      return $this->adresse;
    }

    function getUrl() {
      return $this->url;
    }

    function getDescription() {
      return $this->description;
    }
  }
?>
