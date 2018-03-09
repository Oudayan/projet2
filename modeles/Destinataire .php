<?php
/**
 * @file 	Destinataire.php
 * @author 	Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 1.0
 * @date 	6 mars 2018
 * @brief 	Définit la classe MessagesDestinataires.
 *
 * @details Cette classe définit les attributs des Destinataires 
 * 
 */

	class Destinataire {
		// Attributs
		private $destinataire;
		private $id_message;
		private $lu;
		private $d_actif;
		// Constructeur
		public function __construct($destinataire = '', $id_message = 0, $lu = NULL, $d_actif = NULL)
		{
			$this->ecrireDestinataire($destinataire);
			$this->ecrireId_message($id_message);
			$this->ecrireLu($lu);
			$this->ecrireD_actif($d_actif);
		}
		
        // "SETTERS"
		/**
		 * @brief      Permet de définir en ecriture l'attribut de la classe Destinataire
		 * @param      [string]  $destinataire     clé primaire
		 * @return     [object]
		 */
		public function ecrireDestinataire($destinataire) {
            if (is_string($destinataire) && trim($destinataire) != "") {
                $this->destinataire = $destinataire;
            }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Destinataire
		 * @param      [numeric]  $id_message  numéro du message
		 * @return     [object]
		 */
		public function ecrireId_message($id_message) {
            if (is_numeric($id_message) && trim($id_message) != "") {
                $this->id_message = $id_message;
            }
        }
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Destinataire
		 * @param      [bool]  $lu  donne le status du message s'il est lu ou non
		 * @return     [object]
		 */
		public function ecrireLu($lu) {
            if (is_bool($lu) && trim($lu) != "") {
                $this->lu = $lu;
            }			
		}
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Destinataire
		 * @param      [bool]  $d_actif  permet de ne plus afficher ce message
		 * @return     [object]
		 */
		public function ecrireD_actif($d_actif){
            if (is_bool($d_actif) && trim($d_actif) != "") {
                $this->d_actif = $d_actif;
            }			
		}
		
		// "GETTERS"
				/**
		 * @brief      Permet de définir en lecture l'attribut de la classe Destinataire
		 * @param      [string]  $destinataire     
		 * @return     [object]
		 */	
		public function lireDestinataire(){
            return $this->destinataire;
		}
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Destinataire
		 * @param      [bool]  $lu  
		 * @return     [object]
		 */
		public function lireLu() {
            return $this->lu;
		}

		public function lireD_actif(){
            return $this->d_actif;
		}
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Destinataire
		 * @param      [bool]  $d_actif  
		 * @return     [object]
		 */
        public function lireId_message() {
            return $this->id_message;
        }

	} //fin de la classe

?>