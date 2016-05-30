<?php 

class Morceau {
    public $idChanson //int
    public $nomChanson //string
    public $dureeChanson //float
    public $artiste //string
    public $album //int
    public $lienYoutube //int
    
    function __construct($id,$nom,$duree,$artiste,$album,$lien)    {
        $this->idChanson = $id;
        $this->nomChanson = $nom;
        $this->dureeChanson = $duree;
        $this->artiste = $artiste;
        $this->album = $album;
        $this->lienYoutube = $lien;
    }
    
}


?>