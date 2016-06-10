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
    if(isset($data['nomArtiste']) && isset($data['lienWiki'])) {
   $this->view->artiste = Artiste::ajouterArtiste($data['nomArtiste'],$data['lienWiki']);
  }
   else {
   echo "Un des champs est mal renseigné";
  }
  header('location: ajouterArtiste');
 }
	
}
?>
