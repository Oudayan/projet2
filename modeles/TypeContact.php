<?php
/**
 * @file TypeContact.php
 * @author Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date 14 février 2018
 * @brief Définit la classe TypeContact.
 *
 * @details Cette classe définit les attributs d'un usager
 * 
 */

	class TypeContact {
		// Attributs
		private $id_contact;
		private $contact;
		// Constructeur
		public function __construct($id_contact = "", $contact = "")
		{
			$this->ecrireidContact($id_contact);
			$this->ecrireContact($contact);

		}
		
        // "SETTERS"
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypeContact
		 * @param      [numeric]  $id_contact  identifiant du contact
		 * @return     [object]
		 */
		public function ecrireidContact($id_contact) {
            if (is_numeric($id_contact) && trim($id_contact) != "") {
                $this->id_contact = $id_contact;
            }
        }
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypeContact
		 * @param      [string]  $contact  nom du contact
		 * @return     [object]
		 */
		public function ecrireContact($contact) {
            if (is_string($contact) && trim($contact) != "") {
                $this->contact = $contact;
            }			
		}
		
		// "GETTERS"	
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe TypeContact
		 * @param      [numeric]  $id_contact  identifiant du contact
		 * @return     [object]
		 */
		public function lireidContact() {
            return $this->id_contact;
        }
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypeContact
		 * @param      [string]  $contact  nom du contact
		 * @return     [object]
		 */
		public function lireContact() {
            return $this->contact;
		}

	}

?>