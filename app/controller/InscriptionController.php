<?php
class InscriptionController extends Controller {
	
	public function Inscription(){
		$this->view->display(); 
	}
  public function verifInscription() {
    extract($_POST);
    if(isset($pseudo) && isset($email) && isset ($mdp) && isset($mdpConfirm)) {
      if($mdp != $mdpConfirm) {
        echo "<p>Les mots de passe ne correspondent pas </p>";
      }
      else {
        //Cryptage du mdp
        //$mdp1 = sha1($mdp1);
        $this->view->inscription = Inscription::envoiInscription($email,$pseudo,$mdp);
				$this->view->display();
      } 
    }
		//echo "<p> Un administrateur prendra en charge votre demande </p>";
		
  }
}
?>
