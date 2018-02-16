<?php
/**
* @file Usager.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 14 février 2018
* @brief Définit la classe TypePaiement.
*
* @details Cette classe définit les attributs d'un type de paiement
* 
*/

	class TypePaiement {
		private $id_paiement;
		private $paiement;

		public function __construct($id_paiement = "", $paiement = "")
		{
			$this->ecrireidpaiement($id_paiement);
			$this->ecrirepaiement($paiement);

		}
		
        // "SETTERS"
        // Écrire id_logement
		public function ecrireidPaiement($id_paiement) {
            if (is_numeric($id_paiement) && trim($id_paiement) != "") {
                $this->id_paiement = $id_paiement;
            }
        }
		
		public function ecrirePaiement($paiement) {
            if (is_string($paiement) && trim($paiement) != "") {
                $this->paiement = $paiement;
            }			
		}
		
		// "GETTERS"				
		public function lireidPaiement() {
            return $this->id_paiement;
        }
  
		public function lirePaiement() {
            return $this->paiement;
		}

	}

?>