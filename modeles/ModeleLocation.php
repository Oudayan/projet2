<?php
/**
 * @file     ModeleLocation.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     11 février 2018
 * @brief    Modèle Location 
 * @details  Fonctions "CRUD" pour la table al_type_logement 
 */

	class ModeleLocation extends BaseDAO {

		public function lireNomTable() {
			return "al_location";
		}
        
		public function lireLocationParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Location'); 
			return $resultat->fetch();
		}
		
		public function lireLocationsParProprietaire($id_proprietaire) {
            $resultat = $this->lire($id, "id_proprietaire");
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Location'); 
			return $resultat->fetch();
		}
		
		public function lireLocationsAValider($id_proprietaire) {
            $sql = "SELECT * FROM " . $this->lireNomTable() . " WHERE id_proprietaire = '" . $id_proprietaire . "' AND valide = 0" ;
			$resultat = $this->requete($sql);
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Location");
		}
		
        public function lireToutesLocations() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Location");
    	}

		public function sauvegarderLocation(Location $location) {
			if ($location->lireIdLocation() && $this->lire($location->lireIdLocation())->fetch()) {
				// update
				$sql = "UPDATE " . $this->lireNomTable() . " SET id_logement=?, id_proprietaire=?, id_locataire=?, date_debut=?, date_fin=?, date_location=?, cout=?, valide=?, evaluation=?, commentaire=?, date_evaluation=?, e_banni=?, e_date_banni=?, e_commentaire_banni=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($location->lireIdLogement(), $location->lireIdProprietaire(), $location->lireIdLocataire(), $location->lireDateDebut(), $location->lireDateFin(), $location->lireDateLocation(), $location->lireCout(), $location->lireValide(), $location->lireEvaluation(), $location->lireCommentaire(), $location->lireDateEvaluation(), $location->lireEBanni(), $location->lireEDateBanni(), $location->lireECommentaireBanni(), $location->lireIdLocation());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(id_logement, id_proprietaire, id_locataire, date_debut, date_fin, date_location, cout, valide, evaluation, commentaire, date_evaluation, e_banni, e_date_banni, e_commentaire_banni) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
				$donnees = array($location->lireIdLogement(), $location->lireIdProprietaire(), $location->lireIdLocataire(), $location->lireDateDebut(), $location->lireDateFin(), $location->lireDateLocation(), $location->lireCout(), $location->lireValide(), $location->lireEvaluation(), $location->lireCommentaire(), $location->lireDateEvaluation(), $location->lireEBanni(), $location->lireEDateBanni(), $location->lireECommentaireBanni());
			}
            //var_dump($this->requete($sql, $donnees));
            //die();
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerLocation($id) {
        	return $this->effacer($id);
        }
        
        // $action = 0-À valider / 1-Accepté / 2-Refusé / 3-Expiré:
        public function validerLocation($id, $action) {
            return $this->modifierChamp($id, "valide", $action);
        }
        
        public function bannirEvaluation($id) {
            return $this->modifierChamp($id, "e_banni", 1);
        }
        
    }

?>