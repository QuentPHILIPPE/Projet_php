<?php 

class Artiste {
    public $nomArtiste; //string
    public $dateNaissance; //date
    public $biographie; //string
    public $lienWiki; //string
    public $groupe; //int
    
    function __construct($nom,$date,$bio,$groupe,$lien)    {
        $this->nomArtiste = $nom;
        $this->dateNaissance = $date;
        $this->biographie = $bio;
        $this->lienWiki = $lien;
        $this->groupe = $groupe;
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
    
    function getGroupe() {  
        return $this->groupe;
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
    
    function setGroupe($groupe) {  
        $this->groupe=$groupe;
    }
    
    function setWiki($wiki) {
        $this->lienWiki=$wiki;
    }
    
}


?>