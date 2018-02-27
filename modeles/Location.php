<?php
/**
 * @file    Location.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    20 février 2018
 * @brief   Définit la classe Location.
 * @details Cette classe définit les attributs privés d'une location avec toutes les méthodes publiques "getters" et "setters" pour écrire et lire les attributs
 */
	class Location {

		// Attributs
		private id_location;
		private $id_logement;
		private $id_proprietaire;
		private $id_locataire;
		private $date_debut;
		private $date_retour;
		private $date_location;
		private $cout;
		private $valide;

        // Constructeur
		public function __construct($id_location = 0, $id_logement = 0, $id_proprietaire = "", $id_locataire = "", $date_debut = "", $date_retour = "", $date_location = "", $cout = 0, $valide = false) {
			$this->ecrireIdReservation($id_location);
			$this->ecrireIdLogement($id_logement);
			$this->ecrireIdProprietaire($id_proprietaire);
			$this->ecrireIdLocataire($id_locataire);
			$this->ecrireDateDebut($date_debut);			
			$this->ecrireDateRetour($date_retour);			
			$this->ecrireDateReservation($date_location);			
			$this->ecrireCout($cout);			
			$this->ecrireValide($valide);			
		}
        
         // "SETTERS"
        // Écrire id_location
        public function ecrireIdReservation($id_location) {
            if (is_numeric($id_location) && trim($id_location) != "") {
                $this->id_location = $id_location;
            }
        }
        // Écrire id_logement
        public function ecrireIdLogement($id_logement) {
            if (is_numeric($id_logement) && trim($id_logement) != "") {
                $this->id_logement = $id_logement;
            }
        }
        // Écrire id_proprietaire
        public function ecrireIdProprietaire($id_proprietaire) {
            if (is_string($id_proprietaire) && trim($id_proprietaire) != "") {
                $this->id_proprietaire = $id_proprietaire;
            }
        }
        // Écrire id_locataire
        public function ecrireIdLocataire($id_locataire) {
            if (is_string($id_locataire) && trim($id_locataire) != "") {
                $this->id_locataire = $id_locataire;
            }
        }
        // Écrire date_debut
        public function ecrireDateDebut($date_debut) {
            if (is_string($date_debut) && trim($date_debut) != "") {
                $this->date_debut = $date_debut;
            }
        }
        // Écrire date_retour
        public function ecrireDateRetour($date_retour) {
            if (is_string($date_retour) && trim($date_retour) != "") {
                $this->date_retour = $date_retour;
            }
        }
        // Écrire date_location
        public function ecrireDateReservation($date_location) {
            if (is_string($date_location) && trim($date_location) != "") {
                $this->date_location = $date_location;
            }
        }
        // Écrire cout
        public function ecrireCout($cout) {
            if (is_numeric($cout) && trim($cout) != "") {
                $this->cout = $cout;
            }
        }
        // Écrire valide
        public function ecrireValide($valide) {
            if (is_bool($valide) && trim($valide) != "") {
                $this->valide = $valide;
            }
        }

        // "GETTERS"
        // Lire id_location
        public function lireIdReservation() {
            return $this->id_location;
        }
        // Lire id_logement
        public function lireIdLogement() {
            return $this->id_logement;
        }
        // Lire id_proprietaire
        public function lireIdProprietaire() {
            return $this->id_proprietaire;
        }
        // Lire id_locataire
        public function lireIdLocataire() {
            return $this->id_locataire;
        }
        // Lire date_debut
        public function lireDateDebut() {
            return $this->date_debut;
        }
        // Lire date_retour
        public function lireDateRetour() {
            return $this->date_retour;
        }
        // Lire date_location
        public function lireDateReservation() {
            return $this->date_location;
        }
        // Lire cout
        public function lireCout() {
            return $this->cout;
        }
        // Lire valide
        public function lireValide() {
            return $this->valide;
        }

    }
