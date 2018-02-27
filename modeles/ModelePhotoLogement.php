<?php
/**
 * @file     ModelePhotoLogement.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     13 février 2018
 * @brief    Modèle des images de logements
 * @details  Fonctions "CRUD" pour la table al_photos_logement 
 */

	class ModelePhotoLogement extends BaseDAO {

        // Déclaration du nom de la table (fonction abstraite)
		public function lireNomTable() {
			return "al_photos_logement";
		}
        
        // Lire une photo
		public function lirePhotoLogementParId($idPhoto) {
            $resultat = $this->lire($idPhoto);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'PhotoLogement'); 
			return $resultat->fetch();
		}
		
        // Lire toutes les photos d'un logement
        public function lireToutesPhotosParLogement($idLogement) {
            $sql = "SELECT * FROM " . $this->lireNomTable() . " WHERE id_logement=?";
            $donnees = array($idLogement);
            $resultat =  $this->requete($sql, $donnees);
            return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "PhotoLogement");
    	}

		public function sauvegarderPhotoLogement(PhotoLogement $photoLogement) {
			if ($photoLogement->lireIdPhotoLogement() && $this->lire($photoLogement->lireIdPhotoLogement())->fetch()) {
				// update
				$sql = "UPDATE " . $this->lireNomTable() . " SET chemin_photo=?, description_photo=?, id_logement=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($photoLogement->lireCheminPhoto(), $photoLogement->lireIdPiece(), $photoLogement->lireIdLogement(), $photoLogement->lireIdPhotoLogement());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(chemin_photo, description_photo, id_logement) VALUES (?, ?, ?)"; 
				$donnees = array($photoLogement->lireCheminPhoto(), $photoLogement->lireIdPiece(), $photoLogement->lireIdLogement());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerPhotoLogement($id) {
        	return $this->effacer($id);
        }
        
    }

?>