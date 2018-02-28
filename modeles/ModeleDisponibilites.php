<?php
/**
 * @file     ModeleDisponibilites.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     11 février 2018
 * @brief    Modèle Disponibilites 
 * @details  Fonctions "CRUD" pour la table al_type_logement 
 */

	class ModeleDisponibilites extends BaseDAO {

		public function lireNomTable() {
			return "al_type_logement";
		}
        
		public function lireDisponibilitesParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Disponibilites'); 
			return $resultat->fetch();
		}
		
        public function lireToutesDisponibilites() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Disponibilites");
    	}

		public function sauvegarderDisponibilites(Disponibilites $disponibilites) {
			if ($disponibilites->lireId() && $this->lire($disponibilites->lireId())->fetch()) {
				// update
				$sql = "UPDATE " . $this->lireNomTable() . " SET id_logement=?, date_debut=?, date_fin=?, expire=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($disponibilites->lireIdLogement(), $disponibilites->lireDateDebut(), $disponibilites->lireDateFin(), $disponibilites->lireExpire(), $disponibilites->id_disponibilite());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(id_logement, date_debut, date_fin, expire) VALUES (?, ?, ?, ?)"; 
				$donnees = array($disponibilites->lireIdLogement(), $disponibilites->lireDateDebut(), $disponibilites->lireDateFin(), $disponibilites->lireExpire());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerDisponibilites($id) {
        	return $this->effacer($id);
        }
        
    }

?>