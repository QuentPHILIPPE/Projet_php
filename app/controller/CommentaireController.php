<?php
public function ajouterCommentaire() {
		
  	$data = $this->route["params"]["post"];
    if(isset($data['message'])) {
   		$this->view->commentaire = Commentaire::ajouterCommentaire($data['message']);
  	}
   	else {
   		// echo "Un des champs est mal renseigné";
  	}
  	
		$this->view->display();
 } 
  }
?>