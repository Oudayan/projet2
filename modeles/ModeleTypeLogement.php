<?php
/**
 * @file     ModeleTypeLogement.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     11 février 2018
 * @brief    Modèle TypeLogement 
 * @details  Fonctions "CRUD" pour la table al_type_logement 
 */

	class ModeleTypeLogement extends BaseDAO {

		public function checherNomTable() {
			return "al_type_logement";
		}
        
		public function lireTypeLogementParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'TypeLogement'); 
			return $resultat->fetch();
		}
		
        public function lireTousTypeLogements() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "TypeLogement");
    	}

		public function sauvegarderTypeLogement(TypeLogement $typeLogement) {
			if ($typeLogement->lireId() && $this->lire($typeLogement->lireId())->fetch()) {
				// update
				$sql = "UPDATE " . $this->checherNomTable() . " SET type_logement=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($typeLogement->lireTypeLogement(), $typeLogement->lireIdTypeLogement());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->checherNomTable() . "(type_logement) VALUES (?)"; 
				$donnees = array($typeLogement->lireTypeLogement());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerTypeLogement($id) {
        	return $this->effacer($id);
        }
        
    }

?>