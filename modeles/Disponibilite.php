<?php
/**
 * @file    Disponibilite.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 1.0
 * @date    20 février 2018
 * @brief   Définit la classe Disponibilite
 *
 * @details Cette classe définit les attributs privés d'une disponibilité avec toutes les méthodes publiques "getters" et "setters" pour écrire et lire les attributs
 */

	class Disponibilite {

        // Attributs
		private $id_disponibilite;
		private $id_logement;
		private $date_debut;
		private $date_fin;
		private $d_active;

        // Constructeur
		public function __construct($id_disponibilite = "", $id_logement = "", $date_debut = "", $date_fin = "", $d_active = true) {
			$this->ecrireIdDisponibilite($id_disponibilite);
			$this->ecrireIdLogement($id_logement);
			$this->ecrireDateDebut($date_debut);
			$this->ecrireDateFin($date_fin);
			$this->ecrireDActive($d_active);
		}
		
        // "SETTERS"
        /**
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [numeric]  $id_disponibilite identifiant de la diponibillite
		 * @return     [object]
		 */
		public function ecrireIdDisponibilite($id_disponibilite) {
            if (is_numeric($id_disponibilite) && trim($id_disponibilite) != "") {
                $this->id_disponibilite = $id_disponibilite;
            }
        }
		
        /**
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [numeric] $id_logement  identifiant pour le logement
		 * @return     [object]
		 */
		public function ecrireIdLogement($id_logement) {
            if (is_numeric($id_logement) && trim($id_logement) != "") {
                $this->id_logement = $id_logement;
            }
        }
		
        /**
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [string]  $date_debut    date de début de la location
		 * @return     [object]
		 */
		public function ecrireDateDebut($date_debut) {
            if (is_string($date_debut) && trim($date_debut) != "") {
                $this->date_debut = $date_debut;
            }
        }
        /**
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [string]  $date_fin    date de fin de la location
		 * @return     [object]
		 */
		public function ecrireDateFin($date_fin) {
            if (is_string($date_fin) && trim($date_fin) != "") {
                $this->date_fin = $date_fin;
            }			
		}		
        /**     
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [bool]  $d_active  Pour la valeur true : la location est active
		 * @return     [object]
		 */
		public function ecrireDActive($d_active) {
            if (is_bool($d_active) && trim($d_active) != "") {
                $this->d_active = $d_active;
            }			
		}
		
		// "GETTERS"
        /**
		 * @brief      Permet de définir en lecture l'attribut de la classe Disponibilite
		 * @param      [numeric]  $id_disponibilite identifiant de la diponibillite
		 * @return     [object]
		 */
		public function lireIdDisponibilite() {
            return $this->id_disponibilite;
        }
        /**
		 * @brief      Permet de définir en lecture l'attribut de la classe Disponibilite
		 * @param      [numeric] $id_logement  identifiant pour le logement
		 * @return     [object]
		 */
		public function lireIdLogement() {
            return $this->id_logement;
		}
        /**
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [string]  $date_debut    date de début de la location
		 * @return     [object]
		 */
		public function lireDateDebut() {
            return $this->date_debut;
		}
        /**
		 * @brief      Permet de définir en écriture l'attribut de la classe Disponibilite
		 * @param      [string]  $date_fin    date de fin de la location
		 * @return     [object]
		 */
		public function lireDateFin() {
            return $this->date_fin;
		}
        /**     
		 * @brief      Permet de définir en lecture l'attribut de la classe Disponibilite
		 * @param      [bool]  $d_active  Pour la valeur true : la location est active
		 * @return     [object]
		 */
		public function lireDActive() {
            return $this->d_active;
		}

	}

?>