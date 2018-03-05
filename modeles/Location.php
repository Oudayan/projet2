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
		private $id_location;
		private $id_logement;
		private $id_proprietaire;
		private $id_locataire;
		private $date_debut;
		private $date_fin;
		private $date_location;
		private $cout;
		private $valide;
		private $evaluation;
		private $commentaire;
		private $date_evaluation;
		private $e_banni;
		private $e_date_banni;
		private $e_commentaire_banni;

        // Constructeur
		public function __construct($id_location = 0, $id_logement = 0, $id_proprietaire = "", $id_locataire = "", $date_debut = "", $date_fin = "", $date_location = "", $cout = 0, $valide = 0, $evaluation = NULL, $commentaire = NULL, $date_evaluation = NULL, $e_banni = NULL, $e_date_banni = NULL, $e_commentaire_banni = NULL) {
			$this->ecrireIdLocation($id_location);
			$this->ecrireIdLogement($id_logement);
			$this->ecrireIdProprietaire($id_proprietaire);
			$this->ecrireIdLocataire($id_locataire);
			$this->ecrireDateDebut($date_debut);			
			$this->ecrireDateFin($date_fin);			
			$this->ecrireDateLocation($date_location);			
			$this->ecrireCout($cout);			
			$this->ecrireValide($valide);
            $this->ecrireEvaluation($evaluation);
            $this->ecrireCommentaire($commentaire);
            $this->ecrireDateEvaluation($date_evaluation);
            $this->ecrireEBanni($e_banni);
            $this->ecrireEDateBanni($e_date_banni);
            $this->ecrireECommentaireBanni($e_commentaire_banni);
		}
        
         // "SETTERS"
        // Écrire id_location
        public function ecrireIdLocation($id_location) {
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
        // Écrire date_fin
        public function ecrireDateFin($date_fin) {
            if (is_string($date_fin) && trim($date_fin) != "") {
                $this->date_fin = $date_fin;
            }
        }
        // Écrire date_location
        public function ecrireDateLocation($date_location) {
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
            if (is_numeric($valide) && trim($valide) != "") {
                $this->valide = $valide;
            }
        }

        // Écrire evaluation
        public function ecrireEvaluation($evaluation) {
            if (is_numeric($evaluation) && trim($evaluation) != "") {
                $this->evaluation = $evaluation;
            }
        }
        // Écrire commentaire
        public function ecrireCommentaire($commentaire) {
            if (is_string($commentaire) && trim($commentaire) != "") {
                $this->commentaire = $commentaire;
            }
        }
        // Écrire date_evaluation
        public function ecrireDateEvaluation($date_evaluation) {
            if (is_string($date_evaluation) && trim($date_evaluation) != "") {
                $this->date_evaluation = $date_evaluation;
            }
        }
        // Écrire e_banni
        public function ecrireEBanni($e_banni) {
            if (is_bool($e_banni) && trim($e_banni) != "") {
                $this->e_banni = $e_banni;
            }
        }
        // Écrire e_date_banni
        public function ecrireEDateBanni($e_date_banni) {
            if (is_string($e_date_banni) && trim($e_date_banni) != "") {
                $this->e_date_banni = $e_date_banni;
            }
        }
        // Écrire e_commentaire_banni
        public function ecrireECommentaireBanni($e_commentaire_banni) {
            if (is_string($e_commentaire_banni) && trim($e_commentaire_banni) != "") {
                $this->e_commentaire_banni = $e_commentaire_banni;
            }
        }

        // "GETTERS"
        // Lire id_location
        public function lireIdLocation() {
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
        // Lire date_fin
        public function lireDateFin() {
            return $this->date_fin;
        }
        // Lire date_location
        public function lireDateLocation() {
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
        // Lire evaluation
        public function lireEvaluation() {
            return $this->evaluation;
        }
        // Lire commentaire
        public function lireCommentaire() {
            return $this->commentaire;
        }
        // Lire date_evaluation
        public function lireDateEvaluation() {
            return $this->date_evaluation;
        }
        // Lire e_banni
        public function lireEBanni() {
            return $this->e_banni;
        }
        // Lire e_date_banni
        public function lireEDateBanni() {
            return $this->e_date_banni;
        }
        // Lire e_commentaire_banni
        public function lireECommentaireBanni() {
            return $this->e_commentaire_banni;
        }

    }
