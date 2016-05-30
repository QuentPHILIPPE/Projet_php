<?php 

class Artiste {
    public $idAlbum, //int
    public $nomAlbum //string
    public $dateSortie //date
    public $lienYoutube //string
    public $nbreNote //int
    public $note //int
    
    function __construct($id,$nom,$date,$lien)    {
        $this->idAlbum = $id;
        $this->nomAlbum = $nom;
        $this->dateSortie = $date;
        $this->lienYoutube = $lien;
    }
    
    function getNom() {
        return $this->nomAlbum;
    }
    
    function getDateNaiss() {
        return $this->dateSortie;
    }
  
    function getYoutube() {
        return $this->lienYoutube;
    }
    
    function getNbreNote() {
        return $this->nbreNote;
    }    
    
    function getNote() {
        return ($this->note/$this->nbreNote);
    }
    
    function setNom($nom) {
        $this->nomAlbum=$nom;
    }
    
    function setDateSortie($date) {
        $this->dateSortie=$date;
    }
       
    function setYoutube($youtube) {
        $this->lienYoutube=$youtube;
    }
    
    function addNote($note) {
        $this->nbreNote++;
        $this->note+=$note;
    }
    
}


?>