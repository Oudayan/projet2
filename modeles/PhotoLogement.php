<?php
/**
* @file     PhotoLogement.php
* @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version  1.0
* @date     13 février 2018
* @brief    Définit la classe PhotoLogement.
* @details  Cette classe définit les attributs d'une Photo de Logement
*/
	class PhotoLogement {

		// Attributs
		private $id_photo_logement;
		private $chemin_photo;
		private $description_photo;
		private $id_logement;

        // Constructeur
		public function __construct($id_photo_logement = 0, $chemin_photo = "", $description_photo = "", $id_logement = 0) {
			$this->ecrireIdPhotoLogement($id_photo_logement);
			$this->ecrireCheminPhoto($chemin_photo);			
			$this->ecrireDescriptionPhoto($description_photo);			
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
        // Écrire description_photo
        public function ecrireDescriptionPhoto($description_photo) {
            if (is_string($description_photo) && trim($description_photo) != "") {
                $this->description_photo = $description_photo;
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
        // Lire description_photo
        public function lireDescriptionPhoto() {
            return $this->description_photo;
        }
        // Lire id_logement
        public function lireIdLogement() {
            return $this->id_logement;
        }

    }
