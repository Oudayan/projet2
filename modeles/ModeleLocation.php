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
		
        public function lireToutesLocations() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Location");
    	}

		public function sauvegarderLocation(Location $location) {
			if ($location->lireId() && $this->lire($location->lireId())->fetch()) {
				// update
				$sql = "UPDATE " . $this->lireNomTable() . " SET id_logement=?, id_proprietaire=?, id_locataire=?, date_debut=?, date_retour=?, date_reservation=?, cout=?, valide=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($location->lireIdLogement(), $location->lireIdProprietaire(), $location->lireIdLocataire(), $location->lireDateDebut(), $location->lireDateRetour(), $location->lireDateReservation(), $location->lireCout(), $location->lireValide(), $location->lireIdReservation());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(id_logement, id_proprietaire, id_locataire, date_debut, date_retour, date_reservation, cout, valide) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 
				$donnees = array($location->lireIdLogement(), $location->lireIdProprietaire(), $location->lireIdLocataire(), $location->lireDateDebut(), $location->lireDateRetour(), $location->lireDateReservation(), $location->lireCout(), $location->lireValide());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerLocation($id) {
        	return $this->effacer($id);
        }
        
    }

?>