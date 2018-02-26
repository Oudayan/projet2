<?php
/**
* @file MessagesDestinataires.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 26 fevrier 2018
* @brief Définit la classe MessagesDestinataires.
* @details Cette classe définit les attributs des MessagesDestinataires 
* 
*/

	class MessagesDestinataires extends Messages{
		private $destinataire;
		private $lu;
		private $actif;

		public function __construct($id_message = 0, $id_reference = 0, $sujet = "", $fichier_joint = "", $message = "", $msg_date = "", $expediteur = "" $destinataire = "",  $lu = NULL, $actif = NULL )
		{
			$this->ecrireDestinataire($destinataire);
			$this->ecrireLu($lu);
			$this->ecrireActif($actif);
		}
		
        // "SETTERS"
        
		public function ecrireDestinataire($destinataire) {
            if (is_string($destinataire) && trim($destinataire) != "") {
                $this->destinataire = $destinataire;
            }			
		}
		
		public function ecrireLu($lu) {
            if (is_bool($lu) && trim($lu) != "") {
                $this->lu = $lu;
            }			
		}

		public function ecrireActif($actif){
            if (is_bool($actif) && trim($actif) != "") {
                $this->actif = $actif;
            }			
		}
	
		
		// "GETTERS"				
		
		public function lireDestinataire(){
            return $this->destinataire;
		}
		
  
		public function lireLu() {
            return $this->lu;
		}

		public function lireActif(){
            return $this->actif;
		}
		
	} //fin de la class

?>