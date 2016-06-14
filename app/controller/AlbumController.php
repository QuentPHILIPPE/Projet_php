<?php

class AlbumController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Album::getList();
		$this->view->display(); 
	}
  
	public function afficherAlbum() {
		$id = $this->route["params"]["id"];
		$this->view->album = Album::getFromId($id);
		$this->view->display();
	}
	
	public function ajouterAlbum() {
			$this->view->list = Album::getArtiste();		
		
  	$data = $this->route["params"]["post"];
    if(isset($data['nom']) && isset($data['dateSortie']) && isset($data['lienLastFm']) && isset($data['artiste'])) {
   		$this->view->album = Album::ajouterAlbum($data['nom'], $data['dateSortie'], $data['lienLastFm'], $data['artiste'] );
  	}
   	else {
   		// echo "Un des champs est mal renseigné";
  	}
  	
		$this->view->display();
 }
}
?>