<?php
/**
* @file Messages.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 2.0
* @date 23 janvier 2018
* @brief Définit la classe Messages pour la messagerie.
*
* @details Cette classe définit les attributs d'un message
* 
*/

	class Messages {
		private $id_message;
		private $id_reference;
		private $sujet;
		private $fichier_joint;
		private $message;
		private $msg_date;
		private $expediteur;
		

		public function __construct($id_message = 0, $id_reference = 0, $sujet = "", $fichier_joint = "", $message = "", $msg_date = "", $expediteur = "" )
		{
			$this->ecrireId_message($id_message);
			$this->ecrireId_reference($id_reference);
			$this->ecrireSujet($sujet);
			$this->ecrireFichier_joint($fichier_joint);
			$this->ecrireMessage($message);
			$this->ecrireExpediteur($expediteur);
			
		}
		
        // "SETTERS"
        
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

		public function ecrireExpediteur($expediteur) {
            if (is_string($expediteur) && trim($expediteur) != "") {
                $this->expediteur = $expediteur;
            }			
		}

			
		
		// "GETTERS"				
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

		public function lireExpediteur(){
            return $this->expediteur;
		}

			
		
		
	} //fin de la classe

?>