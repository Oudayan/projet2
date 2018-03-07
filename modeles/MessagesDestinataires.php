<?php
/**
* @file MessagesDestinataires.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 3 mars 2018
* @brief Définit la classe MessagesDestinataires.
* @details Cette classe définit les attributs des MessagesDestinataires 
* 
*/

	class MessagesDestinataires {
		private $destinataire;
		private $lu;
		private $d_actif;
        private $id_message;
		private $id_reference;
		private $sujet;
		private $fichier_joint;
		private $message;
		private $msg_date;
        private $m_actif;
		private $expediteur;

		public function __construct($destinataire = NULL,  $lu = NULL, $d_actif = NULL, $id_message = 0, $id_reference = 0, $sujet = "", $fichier_joint = "", $message = "", $msg_date = "", $m_actif= "", $expediteur = NULL )
		{
			$this->ecrireDestinataire($destinataire);
			$this->ecrireLu($lu);
			$this->ecrireD_actif($d_actif);
            $this->ecrireId_message($id_message);
			$this->ecrireId_reference($id_reference);
			$this->ecrireSujet($sujet);
			$this->ecrireFichier_joint($fichier_joint);
			$this->ecrireMessage($message);
            $this->ecrireMsg_date($msg_date);
            $this->ecrireM_actif($m_actif);
			$this->ecrireExpediteur($expediteur);
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
	   public function ecrireId_message($id_message) {
            if (is_numeric($id_message) && trim($id_message) != "") {
                $this->id_message = $id_message;
            }
        }
		
		public function ecrireId_reference($id_reference) {
            if (is_numeric($id_reference) && trim($id_reference) != "") {
                $this->id_reference = $id_reference;
            }			
		}

		public function ecrireSujet($sujet){
            if (is_string($sujet) && trim($sujet) != "") {
                $this->sujet = $sujet;
            }			
		}

		public function ecrireFichier_joint($fichier_joint) {
            if (is_string($fichier_joint) && trim($fichier_joint) != "") {
                $this->fichier_joint = $fichier_joint;
            }			
		}
		public function ecrireMessage($message) {
            if (is_string($message) && trim($message) != "") {
                $this->message = $message;
            }			
		}
        public function ecrireMsg_date($msg_date) {
            if (is_string($msg_date) && trim($msg_date) != "") {
                $this->msg_date = $msg_date;
            }			
		}
        public function ecrireM_actif($m_actif) {
            if (is_bool($m_actif) && trim($m_actif) != "") {
                $this->m_actif = $m_actif;
            }			
		}
        
		public function ecrireExpediteur($expediteur) {
            if (is_string($expediteur) && trim($expediteur) != "") {
                $this->expediteur = $expediteur;
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
        
        public function lireId_message() {
            return $this->id_message;
        }
  
		public function lireId_reference() {
            return $this->id_reference;
		}

		public function lireSujet(){
            return $this->sujet;
		}

		public function lireFichier_joint(){
            return $this->fichier_joint;
		}
		
		public function lireMessage(){
            return $this->message;
		}
        public function lireMsg_date(){
            return $this->msg_date;
		}
        public function lireM_actif(){
            return $this->m_actif;
		}
        
		public function lireExpediteur(){
            return $this->expediteur;
		}

		
	} //fin de la classe

?>