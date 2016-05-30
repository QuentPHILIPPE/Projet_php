<?php 

class Artiste {
    public $idArtiste, //int
    public $nomArtiste //string
    public $dateNaissance //date
    public $biographie //string
    public $membresGroupe[] //string
    public $lienWiki //string
    
    function __construct($id,$nom,$date,$bio,$membres,$lien)    {
        $this->idArtiste = $id;
        $this->nomArtiste = $nom;
        $this->dateNaissance = $date;
        $this->biographie = $bio;
        $this->membresGroupe = $membres;
        $this->lienWiki = $lien;
    }
    
    function getNom() {
        return $this->nomArtiste;
    }
    
    function getDateNaiss() {
        return $this->dateNaissance;
    }
    
    function getBio() {
        return $this->biographie;
    }
    
    function getGroupe() {  //A completer
        return $this->membresGroupe;
    }
    
    function getWiki() {
        return $this->lienWiki;
    }
    
    function setNom($nom) {
        $this->nomArtiste=$nom;
    }
    
    function setDateNaiss($date) {
        $this->dateNaissance=$date;
    }
    
    function setBio($bio) {
        $this->biographie=$bio;
    }
    
    function setGroupe($membre) {  //A completer ( liste chainée ?)
        $this->membresGroupe=$membre;
    }
    
    function setWiki($wiki) {
        $this->lienWiki=$wiki;
    }
    
}


?>