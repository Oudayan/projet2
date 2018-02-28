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
		private $d_actif;

		public function __construct($id_message = 0, $id_reference = 0, $sujet = "", $fichier_joint = "", $message = "", $msg_date = "", $m_actif= "", $expediteur = "", $destinataire = "",  $lu = NULL, $d_actif = NULL )
		{
			$this->ecrireDestinataire($destinataire);
			$this->ecrireLu($lu);
			$this->ecrireD_actif($d_actif);
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

		public function ecrireD_actif($d_actif){
            if (is_bool($d_actif) && trim($d_actif) != "") {
                $this->d_actif = $d_actif;
            }			
		}
	
		
		// "GETTERS"				
		
		public function lireDestinataire(){
            return $this->destinataire;
		}
		
  
		public function lireLu() {
            return $this->lu;
		}

		public function lireD_actif(){
            return $this->d_actif;
		}
		
	} //fin de la class

?>