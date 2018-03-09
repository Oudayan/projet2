<?php
/**
 * @file    TypePaiement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 1.0
 * @date    14 février 2018
 * @brief   Définit la classe TypePaiement.
 *
 * @details Cette classe définit les attributs d'un type de paiement
 * 
 */
	class TypePaiement {
		// Attributs
		private $id_paiement;
		private $paiement;
		// Constructeur
		public function __construct($id_paiement = "", $paiement = "")
		{
			$this->ecrireidpaiement($id_paiement);
			$this->ecrirepaiement($paiement);

		}
		
        // "SETTERS"
        /**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypePaiement
		 * @param      [numeric]  $id_paiement  identifiant du paiement
		 * @return     [object]
		 */
		public function ecrireidPaiement($id_paiement) {
            if (is_numeric($id_paiement) && trim($id_paiement) != "") {
                $this->id_paiement = $id_paiement;
            }
        }
		/**     
		 * @brief      Permet de définir en ecriture l'attribut de la classe TypePaiement
		 * @param      [string]  $paiement  le paiement
		 * @return     [object]
		 */
		public function ecrirePaiement($paiement) {
            if (is_string($paiement) && trim($paiement) != "") {
                $this->paiement = $paiement;
            }			
		}
		
		// "GETTERS"
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe TypePaiement
		 * @param      [numeric]  $id_paiement  identifiant du paiement
		 * @return     [object]
		 */
		public function lireidPaiement() {
            return $this->id_paiement;
        }
		/**     
		 * @brief      Permet de définir en lecture l'attribut de la classe TypePaiement
		 * @param      [string]  $paiement  le paiement
		 * @return     [object]
		 */
		public function lirePaiement() {
            return $this->paiement;
		}

	}

?>