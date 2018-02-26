<?php
/**
 * @file    Type_Logement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    8 février 2018
 * @brief   Définit la classe TypeLogement.
 * @details Cette classe définit les attributs privés d'un type de logement avec toutes les méthodes publiques "getters" et "setters" pour écrire et lire les attributs
 */
	class TypeLogement {

		// Attributs
		private $id_type_logement;
		private $type_logement;

        // Constructeur
		public function __construct($id_type_logement = 0, $type_logement = "") {
			$this->ecrireIdTypeLogement($id_type_logement);
			$this->ecrireTypeLogement($type_logement);			
		}
        
        // "SETTERS"
        // Écrire id_type_logement
        public function ecrireIdTypeLogement($id_type_logement) {
            if (is_numeric($id_type_logement) && trim($id_type_logement) != "") {
                $this->id_type_logement = $id_type_logement;
            }
        }
        // Écrire type_logement
        public function ecrireTypeLogement($type_logement) {
            if (is_string($type_logement) && trim($type_logement) != "") {
                $this->type_logement = $type_logement;
            }
        }

        // "GETTERS"
        // Lire id_type_logement
        public function lireIdTypeLogement() {
            return $this->id_type_logement;
        }
        // Lire type_logement
        public function lireTypeLogement() {
            return $this->type_logement;
        }

    }
