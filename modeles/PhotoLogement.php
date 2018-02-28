<?php
/**
 * @file    PhotoLogement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    13 février 2018
 * @brief   Définit la classe PhotoLogement.
 * @details Cette classe définit les attributs privés d'une Photo de logement avec toutes les méthodes publiques "getters" et "setters" pour écrire et lire les attributs
 */
	class PhotoLogement {

		// Attributs
		private $id_photo_logement;
		private $chemin_photo;
		private $id_piece;
		private $id_logement;

        // Constructeur
		public function __construct($id_photo_logement = 0, $chemin_photo = "", $id_piece = "", $id_logement = 0) {
			$this->ecrireIdPhotoLogement($id_photo_logement);
			$this->ecrireCheminPhoto($chemin_photo);			
			$this->ecrireIdPiece($id_piece);			
			$this->ecrireIdLogement($id_logement);			
		}
        
         // "SETTERS"
        // Écrire id_photo_logement
        public function ecrireIdPhotoLogement($id_photo_logement) {
            if (is_numeric($id_photo_logement) && trim($id_photo_logement) != "") {
                $this->id_photo_logement = $id_photo_logement;
            }
        }
        // Écrire chemin_photo
        public function ecrireCheminPhoto($chemin_photo) {
            if (is_string($chemin_photo) && trim($chemin_photo) != "") {
                $this->chemin_photo = $chemin_photo;
            }
        }
        // Écrire id_piece
        public function ecrireIdPiece($id_piece) {
            if (is_numeric($id_piece) && trim($id_piece) != "") {
                $this->id_piece = $id_piece;
            }
        }
        // Écrire id_logement
        public function ecrireIdLogement($id_logement) {
            if (is_numeric($id_logement) && trim($id_logement) != "") {
                $this->id_logement = $id_logement;
            }
        }

        // "GETTERS"
        // Lire id_photo_logement
        public function lireIdPhotoLogement() {
            return $this->id_type_logement;
        }
        // Lire chemin_photo
        public function lireCheminPhoto() {
            return $this->chemin_photo;
        }
        // Lire id_piece
        public function lireIdPiece() {
            return $this->id_piece;
        }
        // Lire id_logement
        public function lireIdLogement() {
            return $this->id_logement;
        }

    }
