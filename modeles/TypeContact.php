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
		private $id_contact;
		private $contact;

		public function __construct($id_contact = "", $contact = "")
		{
			$this->ecrireidContact($id_contact);
			$this->ecrireContact($contact);

		}
		
        // "SETTERS"
        // Écrire id_logement
		public function ecrireidContact($id_contact) {
            if (is_numeric($id_contact) && trim($id_contact) != "") {
                $this->id_contact = $id_contact;
            }
        }
		
		public function ecrireContact($contact) {
            if (is_string($contact) && trim($contact) != "") {
                $this->contact = $contact;
            }			
		}
		
		// "GETTERS"				
		public function lireidContact() {
            return $this->id_contact;
        }
  
		public function lireContact() {
            return $this->contact;
		}

	}

?>