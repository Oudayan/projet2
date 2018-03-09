<?php
/**
 * @file    Type_Logement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 1.0
 * @date    28 février 2018
 * @brief   Définit la classe Option.
 *
 * @details Cette classe définit les attributs privés d'un type de logement avec toutes les méthodes publiques "getters" et "setters" pour écrire et lire les attributs
 */
	class Option {

		// Attributs
		private $id_option;
		private $nom_option;
		private $valeurs_option;

        // Constructeur
		public function __construct($id_option = 0, $nom_option = "", $valeurs_option = "") {
			$this->ecrireIdOption($id_option);
			$this->ecrireNomOption($nom_option);			
			$this->ecrireValeursOption($valeurs_option);			
		}
        
        // "SETTERS"
         /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Option
		 * @param      [numeric]  $id_option  identifiant de l'option
		 * @return     [object]
		 */
        public function ecrireIdOption($id_option) {
            if (is_numeric($id_option) && trim($id_option) != "") {
                $this->id_option = $id_option;
            }
        }
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Option
		 * @param      [string]  $nom_option  nom de l'option
		 * @return     [object]
		 */
        public function ecrireNomOption($nom_option) {
            if (is_string($nom_option) && trim($nom_option) != "") {
                $this->nom_option = $nom_option;
            }
        }
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe Option
		 * @param      [string]  $valeurs_option  valeur de l'option
		 * @return     [object]
		 */
        public function ecrireValeursOption($valeurs_option) {
            if (is_string($valeurs_option) && trim($valeurs_option) != "") {
                $this->valeurs_option = $valeurs_option;
            }
        }

        // "GETTERS"
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Option
		 * @param      [numeric]  $id_option  identifiant de l'option
		 * @return     [object]
		 */
        public function lireIdOption() {
            return $this->id_option;
        }
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Option
		 * @param      [string]  $nom_option  nom de l'option
		 * @return     [object]
		 */
        public function lireNomOption() {
            return $this->nom_option;
        }
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Option
		 * @param      [string]  $valeurs_option  valeur de l'option
		 * @return     [object]
		 */
        public function lireValeursOption() {
            return $this->valeurs_option;
        }

    }
