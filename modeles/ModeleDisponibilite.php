<?php
/**
 * @file     ModeleDisponibilite.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     11 février 2018
 * @brief    Modèle Disponibilite
 * 
 * @details  Fonctions "CRUD" pour la table al_disponibilite 
 */

	class ModeleDisponibilite extends BaseDAO {

		public function lireNomTable() {
			return "al_disponibilite";
		}
        
		public function lireDisponibiliteParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Disponibilite'); 
			return $resultat->fetch();
		}
		
		public function lireDisponibilitesParLogement($id) {
            $sql = "SELECT * FROM " . $this->lireNomTable() . " WHERE id_logement = '" . $id . "' AND d_active = 1 ORDER BY date_debut" ;
			$resultat = $this->requete($sql);
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Disponibilite");
		}
		
        public function lireToutesDisponibilites() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Disponibilite");
    	}

		public function sauvegarderDisponibilite(Disponibilite $disponibilite) {
			if ($disponibilite->lireIdDisponibilite() && $this->lire($disponibilite->lireIdDisponibilite())->fetch()) {
				// update
				$sql = "UPDATE " . $this->lireNomTable() . " SET id_logement=?, date_debut=?, date_fin=?, d_active=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($disponibilite->lireIdLogement(), $disponibilite->lireDateDebut(), $disponibilite->lireDateFin(), $disponibilite->lireDActive(), $disponibilite->lireIdDisponibilite());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(id_logement, date_debut, date_fin, d_active) VALUES (?, ?, ?, ?)"; 
				$donnees = array($disponibilite->lireIdLogement(), $disponibilite->lireDateDebut(), $disponibilite->lireDateFin(), $disponibilite->lireDActive());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerDisponibilite($id) {
        	return $this->effacer($id);
        }
        
        public function desactiverDisponibilite($id) {
            return $this->modifierChamp($id, "d_active", false);
        }
        
        public function reactiverDisponibilite($id) {
            return $this->modifierChamp($id, "d_active", true);
        }
        
    }

?>