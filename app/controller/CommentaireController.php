<?php
session_start();
class CommentaireController extends Controller {

public function ajouterCommentaire() {
		
  	$data = $this->route["params"]["post"];
    if(isset($data['note'])) {
   		$this->view->commentaire = Commentaire::ajouterCommentaire($_SESSION['pseudo'], $_GET['id'], $data['note'], $data['message']);
  	}
   	else {
   		// echo "Un des champs est mal renseigné";
  	}
		$this->view->display();
 } 
 }
?>