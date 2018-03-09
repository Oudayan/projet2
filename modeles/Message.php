<?php
/**
 * @file 	Message.php
 * @author 	Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 	1.0
 * @date 	26 fevrier 2018
 * @brief 	Définit la classe Message.
 *
 * @details 	Cette classe définit les attributs des Messages 
 * 
 */

	class Message {
		// Attributs
        private $id_message;
		private $id_reference;
		private $sujet;
		private $fichier_joint;
		private $message;
		private $msg_date;
        private $m_actif;
		private $expediteur;
		// Constructeur
		public function __construct($id_message = null, $id_reference = 0, $sujet = "", $fichier_joint = "", $message = "", $msg_date = "", $m_actif= false, $expediteur = NULL )
		{
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
       /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [numeric]  $id_message  identifiant du message
		 * @return     [object]
		 */
	   public function ecrireId_message($id_message) {
            if (is_numeric($id_message) && trim($id_message) != "") {
                $this->id_message = $id_message;
            }
        }
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [numeric]  $id_reference  identifiant du message en reference
		 * @return     [object]
		 */
		public function ecrireId_reference($id_reference) {
            if (is_numeric($id_reference) && trim($id_reference) != "") {
                $this->id_reference = $id_reference;
            }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [string]  $sujet  le titre du message
		 * @return     [object]
		 */
		public function ecrireSujet($sujet){
            if (is_string($sujet) && trim($sujet) != "") {
                $this->sujet = $sujet;
            }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [string]  $fichier_joint  fichier qui est joint au message
		 * @return     [object]
		 */
		public function ecrireFichier_joint($fichier_joint) {
            if (is_string($fichier_joint) && trim($fichier_joint) != "") {
                $this->fichier_joint = $fichier_joint;
            }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [string]  $message  texte du message
		 * @return     [object]
		 */
		public function ecrireMessage($message) {
            if (is_string($message) && trim($message) != "") {
                $this->message = $message;
            }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [string]  $msg_date  la date où le message a été envoyé
		 * @return     [object]
		 */
        public function ecrireMsg_date($msg_date) {

            //if (is_string($msg_date) && trim($msg_date) != "") {
                $this->msg_date = $msg_date;
           // }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [bool]  $m_actif  dit si le message est actif ou non
		 * @return     [object]
		 */
        public function ecrireM_actif($m_actif) {
            if (is_bool($m_actif)) {
                $this->m_actif = $m_actif;
            }			
		}
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Message
		 * @param      [string]  $expediteur  l'expéditeur du message
		 * @return     [object]
		 */
		public function ecrireExpediteur($expediteur) {
            if (is_string($expediteur) && trim($expediteur) != "") {
                $this->expediteur = $expediteur;
            }			
		}

		// "GETTERS"				
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [numeric]  $id_message  numéro du message
		 * @return     [object]
		 */
        public function lireId_message() {
            return $this->id_message;
        }
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [numeric]  $id_reference  identifiant du message
		 * @return     [object]
		 */
		public function lireId_reference() {
            return $this->id_reference;
		}
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [string]  $sujet  le titre du message
		 * @return     [object]
		 */
		public function lireSujet(){
            return $this->sujet;
		}
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [string]  $fichier_joint  fichier qui est joint au message
		 * @return     [object]
		 */
		public function lireFichier_joint(){
            return $this->fichier_joint;
		}
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [string]  $message  texte du message
		 * @return     [object]
		 */
		public function lireMessage(){
            return $this->message;
		}
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [string]  $msg_date  la date où le message a été envoyé
		 * @return     [object]
		 */
        public function lireMsg_date(){
            return $this->msg_date;
		}
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [bool]  $m_actif  dit si le message est actif ou non
		 * @return     [object]
		 */
        public function lireM_actif(){
            return $this->m_actif;
		}
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Message
		 * @param      [string]  $expediteur  l'expéditeur du message
		 * @return     [object]
		 */
		public function lireExpediteur(){
            return $this->expediteur;
		}

		
	} //fin de la classe

?>