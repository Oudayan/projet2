<?php
/**
 * @file     ModeleLogement.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     11 février 2018
 * @brief    Modèle Logement 
 * @details  Fonctions "CRUD" pour la table al_logement 
 */

	class ModeleLogement extends BaseDAO {

		public function lireNomTable() {
			return "al_logements";
		}
        
		public function lireLogementParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Logement'); 
			$logement = $resultat->fetch();
			return $logement;
		}
		
        public function lireTousLogements() {
			$sql = "SELECT * FROM " . $this->checherNomTable();
			$resultat = $this->requete($sql);
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Logement");
    	}

        // Source : https://stackoverflow.com/questions/8850336/radius-of-40-kilometers-using-latitude-and-longitude
        public function filterLogements($filtre = "id_logement > 0", $ordre = "evaluation DESC", $distance = "20", $latitude = "45.56", $longitude = "-73.57") {
            $sql = "SELECT *, (6371 * acos(cos(radians(" . $latitude . ")) * cos(radians(`latitude`)) * cos(radians(`longitude`) - radians(" . $longitude . ")) + sin(radians(" . $latitude . ") ) * sin(radians(`latitude`)))) AS distance FROM " . $this->checherNomTable() . " WHERE " . $filtre . " HAVING distance <= " . $distance . " ORDER BY " . $ordre;
			$resultat = $this->requete($sql);
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Logement");
    	}        

		public function sauvegarderLogement(Logement $logement) {
			if ($logement->lireId() && $this->lire($logement->lireId())->fetch()) {
				// update
				$sql = "UPDATE " . $this->checherNomTable() . " SET no_civique=?, apt=?, rue=?, ville=?, province=?, pays=?, code_postal=?, latitude=?, longitude=?, id_type_logement=?, nb_interieur=?, premiere_photo=?, prix=?, evaluation=?, description=?, courriel=?, nb_personnes=?, nb_chambres=?, nb_lits=?, nb_salle_de_bain=?, nb_demi_salle_de_bain=?, est_staionnement=?, est_wifi=?, est_cuisine=?, est_tv=?, est_fer_a_repasser=?, est_cintres=?, est_seche_cheveux=?, est_climatise=?, est_laveuse=?, est_secheuse=?, est_chauffage=?, l_banni=?, l_date_banni=?, l_commentaire_banni=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($logement->lireNoCivique(), $logement->lireApt(), $logement->lireRue(), $logement->lireVille(), $logement->lireProvince(), $logement->lirePays(), $logement->lireCodePostal(), $logement->lireLatitude(), $logement->lireLongitude(), $logement->lireCourriel(), $logement->lireIdTypeLogement(), $logement->lireNbInterieur(), $logement->lirePremierePhoto(), $logement->lirePrix(), $logement->lireEvaluation(), $logement->lireDescription(), $logement->lireNbPersonnes(), $logement->lireNbChambres(), $logement->lireNbLits(), $logement->lireNbSalleDeBain(), $logement->lireNbDemiSalleDeBain(), $logement->lireEstStaionnement(), $logement->lireEstWifi(), $logement->lireEstCuisine(), $logement->lireEstTv(), $logement->lireEstFerARepasser(), $logement->lireEstCintres(), $logement->lireEstSecheCheveux(), $logement->lireEstClimatise(), $logement->lireEstLaveuse(), $logement->lireEstSecheuse(), $logement->lireEstChauffage(), $logement->lireLBanni(), $logement->lireLDateBanni(), $logement->lireLCommentaireBanni(), $logement->lireIdLogement());
			}
			else {
				// insert
                $sql = "INSERT INTO " . $this->checherNomTable() . "(no_civique, apt, rue, ville, province, pays, code_postal, latitude, longitude, id_type_logement, nb_interieur, premiere_photo, prix, evaluation, description, courriel, nb_personnes, nb_chambres, nb_lits, nb_salle_de_bain, nb_demi_salle_de_bain, est_staionnement, est_wifi, est_cuisine, est_tv, est_fer_a_repasser, est_cintres, est_seche_cheveux, est_climatise, est_laveuse, est_secheuse, est_chauffage, l_banni, l_date_banni, l_commentaire_banni) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$donnees = array($logement->lireNoCivique(), $logement->lireApt(), $logement->lireRue(), $logement->lireVille(), $logement->lireProvince(), $logement->lirePays(), $logement->lireCodePostal(), $logement->lireLatitude(), $logement->lireLongitude(), $logement->lireCourriel(), $logement->lireIdTypeLogement(), $logement->lireNbInterieur(), $logement->lirePremierePhoto(), $logement->lirePrix(), $logement->lireEvaluation(), $logement->lireDescription(), $logement->lireNbPersonnes(), $logement->lireNbChambres(), $logement->lireNbLits(), $logement->lireNbSalleDeBain(), $logement->lireNbDemiSalleDeBain(), $logement->lireEstStaionnement(), $logement->lireEstWifi(), $logement->lireEstCuisine(), $logement->lireEstTv(), $logement->lireEstFerARepasser(), $logement->lireEstCintres(), $logement->lireEstSecheCheveux(), $logement->lireEstClimatise(), $logement->lireEstLaveuse(), $logement->lireEstSecheuse(), $logement->lireEstChauffage(), $logement->lireLBanni(), $logement->lireLDateBanni(), $logement->lireLCommentaireBanni());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerLogement($id) {
        	return $this->effacer($id);
        }
        
    }

?>