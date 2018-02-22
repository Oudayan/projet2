<?php
/**
* @file Destinataires.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 21 janvier 2018
* @brief Définit la classe Destinataires.
*
* @details Cette classe définit les attributs des destinataires 
* 
*/

	class Destinataires {
		private $courriel;
		private $id_message;
		private $lu;
		private $effacer;
		
		
		

		public function __construct($courriel = "", $id_message = NULL, $lu = NULL, $effacer = "" )
		{
			$this->ecrireCourriel($courriel);
			$this->ecrireId_message($id_message);
			$this->ecrireLu($lu);
			$this->ecrireEffacer($effacer);
			
		}
		
        // "SETTERS"
        
		public function ecrireCourriel($courriel) {
            if (is_string($courriel) && trim($courriel) != "") {
                $this->courriel = $courriel;
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

		public function ecrireEffacer($effacer){
            if (is_bool($effacer) && trim($effacer) != "") {
                $this->effacer = $effacer;
            }			
		}

			
		
		// "GETTERS"				
		
		public function lireCourriel(){
            return $this->courriel;
		}
		
		
		public function lireId_message() {
            return $this->id_message;
        }
  
		public function lireLu() {
            return $this->lu;
		}

		public function lireEffacer(){
            return $this->effacer;
		}
		
	} //fin de la classe

?>