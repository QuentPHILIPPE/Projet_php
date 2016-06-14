<?php

class ArtisteController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Artiste::getList();
		$this->view->display(); 

	}
	public function afficherArtiste() {
		$id = $this->route["params"]["id"];
		$this->view->artiste = Artiste::getFromId($id);
		$this->view->display();
	}
	
	public function ajouterArtiste() {
  	$data = $this->route["params"]["post"];
    if(isset($data['nom']) && isset($data['lienWiki'])) {
   		$this->view->artiste = Artiste::ajouterArtiste($data['nom'], $data['lienWiki']);
  	}
   	else {
   		// echo "Un des champs est mal renseigné";
  	}
  	//header('location: ajouterArtiste');
		$this->view->display();
 }
}
?>
