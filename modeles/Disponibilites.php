<?php
/**
 * @file     Disponibilites.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  1.0
 * @date     20 février 2018
 * @brief    Définit la classe Disponibilites
 * @details  Cette classe définit les attributs des disponibiités
 * 
 */

	class Disponibilites {
		private $id_disponibilite;
		private id_logement;
		private $date_debut;
		private $date_fin;
		private $expire;

		public function __construct($id_disponibilite = "", $id_logement = "", $date_debut = "", $date_fin = "", $expire = "") {
			$this->ecrireidDisponibilite($id_disponibilite);
			$this->ecrireidLogement(id_logement);
			$this->ecrireDateDebut($date_debut);
			$this->ecrireDateFin($date_fin);
			$this->ecrireExpire($expire);
		}
		
        // "SETTERS"
        // Écrire id_logement
		public function ecrireIdDisponibilites($id_disponibilite) {
            if (is_numeric($id_disponibilite) && trim($id_disponibilite) != "") {
                $this->id_disponibilite = $id_disponibilite;
            }
        }
		
        // Écrire id_logement
		public function ecrireIdLogement($id_logement) {
            if (is_numeric($id_logement) && trim($id_logement) != "") {
                $this->id_logement = $id_logement;
            }
        }
		
        // Écrire id_logement
		public function ecrireDateDebut($date_debut) {
            if (is_string($date_debut) && trim($date_debut) != "") {
                $this->date_debut = $date_debut;
            }
        }
		
		public function ecrireDateFin($date_fin) {
            if (is_string($date_fin) && trim($date_fin) != "") {
                $this->date_fin = $date_fin;
            }			
		}
		
		public function ecrireExpire($expire) {
            if (is_bool($expire) && trim($expire) != "") {
                $this->expire = $expire;
            }			
		}
		
		// "GETTERS"				
		public function lireIdDisponibilites() {
            return $this->id_disponibilite;
        }
  
		public function lireIdLogement() {
            return $this->id_logement;
		}

		public function lireDateDebut() {
            return $this->date_debut;
		}

		public function lireDateFin() {
            return $this->date_debut;
		}

		public function lireExpire() {
            return $this->expire;
		}

	}

?>