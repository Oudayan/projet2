<?php
/**
 * @file    Type_Logement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 1.0
 * @date    8 février 2018
 * @brief   Définit la classe TypeLogement.
 *
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
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypeLogement
		 * @param      [numeric]  $id_type_logement  numero du type de logement
		 * @return     [object]
		 */
        public function ecrireIdTypeLogement($id_type_logement) {
            if (is_numeric($id_type_logement) && trim($id_type_logement) != "") {
                $this->id_type_logement = $id_type_logement;
            }
        }
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypeLogement
		 * @param      [string]  $type_logement  type de logement
		 * @return     [object]
		 */
        public function ecrireTypeLogement($type_logement) {
            if (is_string($type_logement) && trim($type_logement) != "") {
                $this->type_logement = $type_logement;
            }
        }

        // "GETTERS"
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe TypeLogement
		 * @param      [numeric]  $id_type_logement  numero du type de logement
		 * @return     [object]
		 */
        public function lireIdTypeLogement() {
            return $this->id_type_logement;
        }
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe TypeLogement
		 * @param      [string]  $type_logement  type de logement
		 * @return     [object]
		 */
        public function lireTypeLogement() {
            return $this->type_logement;
        }

    }
