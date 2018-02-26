<?php
/**
* @file Destinataires.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 25 janvier 2018
* @version 2.0
* @date 25 janvier 2018
* @brief Définit la classe Destinataires.
* @details Cette classe définit les attributs des destinataires 
* 
*/

	class Destinataires {
		private $destinataire;
		private $id_message;
		private $lu;
		private $actif;

		public function __construct($destinataire = "", $id_message = 0, $lu = NULL, $actif = NULL )
		{
			$this->ecrireDestinataire($destinataire);
			$this->ecrireId_message($id_message);
			$this->ecrireLu($lu);
			$this->ecrireActif($actif);
		}
		
        // "SETTERS"
        
		public function ecrireDestinataire($destinataire) {
            if (is_string($destinataire) && trim($destinataire) != "") {
                $this->destinataire = $destinataire;
            }			
		}
		
		public function ecrireId_message($id_message) {
            if (is_numeric($id_message) && trim($id_message) != "") {
                $this->id_message = $id_message;
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
		
		
		public function lireId_message() {
            return $this->id_message;
        }
  
		public function lireLu() {
            return $this->lu;
		}

		public function lireActif(){
            return $this->actif;
		}
		
	} //fin de la classe

?>