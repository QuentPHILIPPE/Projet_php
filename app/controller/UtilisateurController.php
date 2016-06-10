<?php

class UtilisateurController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Utilisateur::getList();
		$this->view->display(); 
	}
  
	public function afficherUtilisateur() {
		$id = $this->route["params"]["pseudo"];
		$this->view->utilisateur = Utilisateur::getFromPseudo($pseudo);
		$this->view->display();
	}
}
?>
