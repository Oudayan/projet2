<?php
/**
 * @file     ModeleOption.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     23 février 2018
 * @brief    Modèle Option 
 *
 * @details  Fonctions "CRUD" pour la table al_options 
 */

	class ModeleOption extends BaseDAO {

		public function lireNomTable() {
			return "al_options";
		}
        
		public function lireOptionParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Option'); 
			return $resultat->fetch();
		}
		
        public function lireToutesOptions() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Option");
    	}

		public function sauvegarderOption(Option $options) {
			if ($options->lireIdOption() && $this->lire($options->lireIdOption())->fetch()) {
				// Update
				$sql = "UPDATE " . $this->lireNomTable() . " SET nom_option=?, valeurs_option=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($options->lireNomOption(), $options->lireValeursOption(), $options->lireIdOption());
			} 
			else {
				// Insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(nom_option, valeurs_option) VALUES (?, ?)"; 
				$donnees = array($options->lireNomOption(), $options->lireValeursOption());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerOptions($id) {
        	return $this->effacer($id);
        }
        
    }

?>