<?php
class Router {
   public static function analyze( $query ) {
      $result = array(
         "controller" => "Error",
         "action" => "error404",
         "params" => array()
	 );
      if( $query === "" || $query === "/" ) {
         $result["controller"] = "Index";
		 $result["action"] = "index";
      } else {
		  $parts = explode("/", $query);
		  
				if($parts[0] == "contact")  {
						if (count($parts) == 1){
							$result["controller"] = "Contact";
							$result['action'] = "afficherListe";
			  	}	
				  if ((count($parts) == 2) && ($parts[1] == "afficher")){
        	    $result["controller"] = "Index";
          	  $result["action"] = "afficherListe";
        	    //$result["params"]["slug"] = $parts[1];            
			  	}
			  	if ( (count($parts) == 3)  && ($parts[1] == "afficher") && ($parts[0] == "contact")){

					  $result["controller"] = "Contact";
					  $result["action"] = "afficherContact";
					  $result["params"]["id"] = $parts[2];            
				  	}
						if ((count($parts) == 3) && ($parts[1] == "modifier")){

				  	$result["controller"] = "Contact";
				 	 $result["action"] = "modifierContact";
				 	 $result["params"]["id"]= $parts[2];
				  	$result["params"]["post"]= $_POST;
			  			}
				}
				
			  if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";
            //$result["params"]["slug"] = $parts[1];            
			  }
			  if ( (count($parts) == 3)  && ($parts[1] == "afficher") && ($parts[0] == "utilisateur")){

					  $result["controller"] = "Utilisateur";
					  $result["action"] = "afficherUtilisateur";
					  $result["params"]["id"] = $parts[2];            
				  }
			  //

				if ((count($parts) == 3) && ($parts[1] == "modifier")){

				  $result["controller"] = "Utilisateur";
				  $result["action"] = "modifierUtilisateur";
				  $result["params"]["adresseMail"]= $parts[2];
				  $result["params"]["post"]= $_POST;
			  }	
					
					
				if($parts[0] == "artiste")  {
					if (count($parts) == 1){
						$result["controller"] = "Artiste";
						$result['action'] = "afficherListe";
					}
			  if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";
            //$result["params"]["slug"] = $parts[1];            
			  }
			  if ( (count($parts) == 3) && ($parts[1] == "afficher") && ($parts[0] == "artiste")){
					  $result["controller"] = "Artiste";
					  $result["action"] = "afficherArtiste";
					  $result["params"]["id"] = $parts[2];        
				}
				
				if ((count($parts) == 3) && ($parts[1] == "modifier")){

				  $result["controller"] = "Artiste";
				  $result["action"] = "modifierArtiste";
				  $result["params"]["id"]= $parts[2];
				  $result["params"]["post"]= $_POST;
			  }	
	
				if ((count($parts) == 2) && ($parts[1] == "ajouterArtiste")) {
				 $result["controller"] = "Artiste";
				 $result["action"] = "ajouterArtiste";
				 $result["params"]["post"]= $_POST;
				}
		  }
					
				if($parts[0] == "utilisateur")  {
					if (count($parts) == 1){
						$result["controller"] = "Utilisateur";
						$result['action'] = "afficherListe";
			  	}
					if ( (count($parts) == 3) && ($parts[1] == "afficher") && ($parts[0] == "utilisateur")) {
					  $result["controller"] = "Utilisateur";
					  $result["action"] = "afficherUtilisateur";
					  $result["params"]["pseudo"] = $parts[2];        
					}
							
				}  
			  //
		  if($parts[0] == "album")  {
					if (count($parts) == 1){
						$result["controller"] = "Album";
						$result['action'] = "afficherListe";
					}
			  	if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";
            //$result["params"]["slug"] = $parts[1];            
			 		}
			  	if ((count($parts) == 3) && ($parts[1] == "afficher") && ($parts[0] == "album")){
					  $result["controller"] = "Album";
					  $result["action"] = "afficherAlbum";
					  $result["params"]["id"] = $parts[2];        
					}
					if ((count($parts) == 3) && ($parts[1] == "modifier")){
				  	$result["controller"] = "Album";
				  	$result["action"] = "modifierAlbum";
				  	$result["params"]["id"]= $parts[2];
				  	$result["params"]["post"]= $_POST;
			  	}	
					
					if ((count($parts) == 2) && ($parts[1] == "ajouterAlbum")) {
						$result["controller"] = "Album";
						$result["action"] = "ajouterAlbum";
				 		$result["params"]["post"]= $_POST;
				 		
					}	
				}

				if($parts[0] == "inscription")  {
					if (count($parts) == 1){
						$result["controller"] = "Inscription";
						$result['action'] = "Inscription";
					}
				}
				
				if($parts[0] == "connexion")  {
					if (count($parts) == 1){
						$result["controller"] = "Connexion";
						$result['action'] = "Connexion";
					}
				
					if ((count($parts) == 2) && ($parts[1] == "validConnexion")){
        		$result["controller"] = "Connexion";
          	$result["action"] = "validConnexion";         
			  	}
				}
				
				if($parts[0] == "deconnexion") {
					if (count($parts) == 1){
						$result["controller"] = "Connexion";
						$result['action'] = "deconnexion";
					}
				}
				
			}
	  return $result;
   }
}
?>
