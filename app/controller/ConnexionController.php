<?php
class ConnexionController extends Controller {
	
	public function Connexion(){
		$this->view->display(); 
	}
  public function verifConnexion() {
    extract($_POST);
    if(isset($pseudo) && ($mdp)) {
			$this->view->connexion = Connexion::verifConnexion($pseudo,$mdp);
			$this->view->display();
  	}
  }
	public function deconnexion() {
			session_start();
			session_unset();
			session_destroy();
			$this->view->display();
	}
}
?>