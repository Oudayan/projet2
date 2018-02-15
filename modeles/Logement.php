<?php
/**
 * @file    Logement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.1
 * @date    11 février 2018
 * @brief   Définit la classe Logement.
 * @details Cette classe définit les attributs d'un Logement 
 */
	class Logement {
        
        // Attributs
		private $id_logement;
		private $no_civique;
		private $apt;	
		private $rue;
		private $ville;
		private $province;
		private $pays;
		private $code_postal;
		private $latitude;
		private $longitude;
		private $courriel;
		private $id_type_logement;
		private $premiere_photo;
		private $prix;
		private $evaluation;
		private $description;
		private $nb_personnes;
		private $nb_chambres;
		private $nb_lits;
		private $nb_salle_de_bain;
		private $nb_demi_salle_de_bain;
		private $est_staionnement;
		private $est_wifi;
		private $est_cuisine;
		private $est_tv;
		private $est_fer_a_repasser;
		private $est_cintres;
		private $est_seche_cheveux;
		private $est_climatise;
		private $est_laveuse;
		private $est_secheuse;
		private $est_chauffage;
		private $l_actif;
		private $l_banni;
		private $l_date_banni;
		private $l_commentaire_banni;

        // Constructeur
		private function __construct($id_logement = 0, $no_civique = 0, $apt = "", $rue = "", $ville = "", $province = "", $pays = "", $code_postal = "", $latitude = "", $longitude = "", $id_type_logement = 0, $premiere_photo = "", $prix = 0, $evaluation = 0, $description = "", $courriel = "", $nb_personnes = 0, $nb_chambres = 0, $nb_lits = 0, $nb_salle_de_bain = 0, $nb_demi_salle_de_bain = 0, $est_staionnement = NULL, $est_wifi = NULL, $est_cuisine = NULL, $est_tv = NULL, $est_fer_a_repasser = NULL, $est_cintres = NULL, $est_seche_cheveux = NULL, $est_climatise = NULL, $est_laveuse = NULL, $est_secheuse = NULL, $est_chauffage = NULL, $l_actif = NULL, $l_banni = NULL, $l_date_banni = "", $l_commentaire_banni = "") {
            $this->ecrireIdLogement($id_logement);
            $this->ecrireNoCivique($no_civique);
            $this->ecrireApt($apt);		
            $this->ecrireRue($rue);
            $this->ecrireVille($ville);
            $this->ecrireProvince($province);
            $this->ecrirePays($pays);
            $this->ecrireCodePostal($code_postal);
            $this->ecrireLatitude($latitude);
            $this->ecrireLongitude($longitude);
            $this->ecrireCourriel($courriel);
            $this->ecrireIdTypeLogement($id_type_logement);		
            $this->ecrirePremierePhoto($premiere_photo);
            $this->ecrirePrix($prix);
            $this->ecrireEvaluation($evaluation);
            $this->ecrireDescription($description);
            $this->ecrireNbPersonnes($nb_personnes);
            $this->ecrireNbChambres($nb_chambres);
            $this->ecrireNbLits($nb_lits);
            $this->ecrireNbSalleDeBain($nb_salle_de_bain);
            $this->ecrireNbDemiSalleDeBain($nb_demi_salle_de_bain);
            $this->ecrireEstStaionnement($est_staionnement);
            $this->ecrireEstWifi($est_wifi);
            $this->ecrireEstCuisine($est_cuisine);
            $this->ecrireEstTv($est_tv);
            $this->ecrireEstFerARepasser($est_fer_a_repasser);
            $this->ecrireEstCintres($est_cintres);
            $this->ecrireEstSecheCheveux($est_seche_cheveux);
            $this->ecrireEstClimatise($est_climatise);
            $this->ecrireEstLaveuse($est_laveuse);
            $this->ecrireEstSecheuse($est_secheuse);
            $this->ecrireEstChauffage($est_chauffage);
            $this->ecrireLActif($l_actif);
            $this->ecrireLBanni($l_banni);
            $this->ecrireLDateBanni($l_date_banni);
            $this->ecrireLCommentaireBanni($l_commentaire_banni);
		}
    
        // "SETTERS"
        // Écrire id_logement
        public function ecrireIdLogement($id_logement) {
            if (is_numeric($id_logement) && trim($id_logement) != "") {
                $this->id_logement = $id_logement;
            }
        }
        // Écrire no_civique
        public function ecrireNoCivique($no_civique) {
            if (is_numeric($no_civique) && trim($no_civique) != "") {
                $this->no_civique = $no_civique;
            }
        }
        // Écrire apt
        public function ecrireApt($apt) {
            if (is_string($apt) && trim($apt) != "") {
                $this->apt = $apt;
            }
        }
        // Écrire rue
        public function ecrireRue($rue) {
            if (is_string($rue) && trim($rue) != "") {
                $this->rue = $rue;
            }
        }
        // Écrire ville
        public function ecrireVille($ville) {
            if (is_string($ville) && trim($ville) != "") {
                $this->ville = $ville;
            }
        }
        // Écrire province
        public function ecrireProvince($province) {
            if (is_string($province) && trim($province) != "") {
                $this->province = $province;
            }
        }
        // Écrire pays
        public function ecrirePays($pays) {
            if (is_string($pays) && trim($pays) != "") {
                $this->pays = $pays;
            }
        }
        // Écrire code_postal
        public function ecrireCodePostal($code_postal) {
            if (is_string($code_postal) && trim($code_postal) != "") {
                $this->code_postal = $code_postal;
            }
        }
        // Écrire latitude
        public function ecrireLatitude($latitude) {
            if (is_string($latitude) && trim($latitude) != "") {
                $this->latitude = $latitude;
            }
        }
        // Écrire longitude
        public function ecrireLongitude($longitude) {
            if (is_string($longitude) && trim($longitude) != "") {
                $this->longitude = $longitude;
            }
        }
        // Écrire courriel
        public function ecrireCourriel($courriel) {
            if (is_string($courriel) && trim($courriel) != "") {
                $this->courriel = $courriel;
            }
        }
        // Écrire id_type_logement
        public function ecrireIdTypeLogement($id_type_logement) {
            if (is_numeric($id_type_logement) && trim($id_type_logement) != "") {
                $this->id_type_logement = $id_type_logement;
            }
        }
        // Écrire premiere_photo
        public function ecrirePremierePhoto($premiere_photo) {
            if (is_string($premiere_photo) && trim($premiere_photo) != "") {
                $this->premiere_photo = $premiere_photo;
            }
        }
        // Écrire prix
        public function ecrirePrix($prix) {
            if (is_numeric($prix) && trim($prix) != "") {
                $this->id_logement = $prix;
            }
        }
        // Écrire evaluation
        public function ecrireEvaluation($evaluation) {
            if (is_numeric($evaluation) && trim($evaluation) != "") {
                $this->evaluation = $evaluation;
            }
        }
        // Écrire description
        public function ecrireDescription($description) {
            if (is_string($description) && trim($description) != "") {
                $this->description = $description;
            }
        }
        // Écrire nb_personnes
        public function ecrireNbPersonnes($nb_personnes) {
            if (is_numeric($nb_personnes) && trim($nb_personnes) != "") {
                $this->nb_personnes = $nb_personnes;
            }
        }
        // Écrire nb_chambres
        public function ecrireNbChambres($nb_chambres) {
            if (is_numeric($nb_chambres) && trim($nb_chambres) != "") {
                $this->nb_chambres = $nb_chambres;
            }
        }
        // Écrire nb_lits
        public function ecrireNbLits($nb_lits) {
            if (is_numeric($nb_lits) && trim($nb_lits) != "") {
                $this->nb_lits = $nb_lits;
            }
        }
        // Écrire nb_salle_de_bain
        public function ecrireNbSalleDeBain($nb_salle_de_bain) {
            if (is_numeric($nb_salle_de_bain) && trim($nb_salle_de_bain) != "") {
                $this->nb_salle_de_bain = $nb_salle_de_bain;
            }
        }
        // Écrire nb_demi_salle_de_bain
        public function ecrireNbDemiSalleDeBain($nb_demi_salle_de_bain) {
            if (is_numeric($nb_demi_salle_de_bain) && trim($nb_demi_salle_de_bain) != "") {
                $this->nb_demi_salle_de_bain = $nb_demi_salle_de_bain;
            }
        }
        // Écrire est_staionnement
        public function ecrireEstStaionnement($est_staionnement) {
            if (is_bool($est_staionnement) && trim($est_staionnement) != "") {
                $this->est_staionnement = $est_staionnement;
            }
        }
        // Écrire est_wifi
        public function ecrireEstWifi($est_wifi) {
            if (is_bool($est_wifi) && trim($est_wifi) != "") {
                $this->est_wifi = $est_wifi;
            }
        }
        // Écrire est_cuisine
        public function ecrireEstCuisine($est_cuisine) {
            if (is_bool($est_cuisine) && trim($est_cuisine) != "") {
                $this->est_cuisine = $est_cuisine;
            }
        }
        // Écrire est_tv
        public function ecrireEstTv($est_tv) {
            if (is_bool($est_tv) && trim($est_tv) != "") {
                $this->est_tv = $est_tv;
            }
        }
        // Écrire est_fer_a_repasser
        public function ecrireEstFerARepasser($est_fer_a_repasser) {
            if (is_bool($est_fer_a_repasser) && trim($est_fer_a_repasser) != "") {
                $this->est_fer_a_repasser = $est_fer_a_repasser;
            }
        }
        // Écrire est_cintres
        public function ecrireEstCintres($est_cintres) {
            if (is_bool($est_cintres) && trim($est_cintres) != "") {
                $this->est_cintres = $est_cintres;
            }
        }
        // Écrire est_seche_cheveux
        public function ecrireEstSecheCheveux($est_seche_cheveux) {
            if (is_bool($est_seche_cheveux) && trim($est_seche_cheveux) != "") {
                $this->est_seche_cheveux = $est_seche_cheveux;
            }
        }
        // Écrire est_climatise
        public function ecrireEstClimatise($est_climatise) {
            if (is_bool($est_climatise) && trim($est_climatise) != "") {
                $this->est_climatise = $est_climatise;
            }
        }
        // Écrire est_laveuse
        public function ecrireEstLaveuse($est_laveuse) {
            if (is_bool($est_laveuse) && trim($est_laveuse) != "") {
                $this->est_laveuse = $est_laveuse;
            }
        }
        // Écrire est_secheuse
        public function ecrireEstSecheuse($est_secheuse) {
            if (is_bool($est_secheuse) && trim($est_secheuse) != "") {
                $this->est_secheuse = $est_secheuse;
            }
        }
        // Écrire est_chauffage
        public function ecrireEstChauffage($est_chauffage) {
            if (is_bool($est_chauffage) && trim($est_chauffage) != "") {
                $this->est_chauffage = $est_chauffage;
            }
        }
        // Écrire l_actif
        public function ecrireLActif($l_actif) {
            if (is_bool($l_actif) && trim($l_actif) != "") {
                $this->l_actif = $l_actif;
            }
        }
        // Écrire l_banni
        public function ecrireLBanni($l_banni) {
            if (is_bool($l_banni) && trim($l_banni) != "") {
                $this->l_banni = $l_banni;
            }
        }
        // Écrire l_date_banni
        public function ecrireLDateBanni($l_date_banni) {
            if (is_string($l_date_banni) && trim($l_date_banni) != "") {
                $this->l_date_banni = $l_date_banni;
            }
        }
        // Écrire l_commentaire_banni
        public function ecrireLCommentaireBanni($l_commentaire_banni) {
            if (is_string($l_commentaire_banni) && trim($l_commentaire_banni) != "") {
                $this->l_commentaire_banni = $l_commentaire_banni;
            }
        }
        
        // "GETTERS"
        // Lire id_logement
        public function lireIdLogement() {
            return $this->id_logement;
        }
        // Lire no_civique
        public function lireNoCivique() {
            return $this->no_civique;
        }
        // Lire apt
        public function lireApt() {
            return $this->apt;
        }
        // Lire rue
        public function lireRue() {
            return $this->rue;
        }
        // Lire ville
        public function lireVille() {
            return $this->ville;
        }
        // Lire province
        public function lireProvince() {
            return $this->province;
        }
        // Lire pays
        public function lirePays() {
            return $this->pays;
        }
        // Lire code_postal
        public function lireCodePostal() {
            return $this->code_postal;
        }
        // Lire latitude
        public function lireLatitude() {
            return $this->latitude;
        }
        // Lire longitude
        public function lireLongitude() {
            return $this->longitude;
        }
        // Lire courriel
        public function lireCourriel() {
            return $this->courriel;
        }
        // Lire id_type_logement
        public function lireIdTypeLogement() {
            return $this->id_type_logement;
        }
        // Lire premiere_photo
        public function lirePremierePhoto() {
            return $this->premiere_photo;
        }
        // Lire prix
        public function lirePrix() {
            return $this->prix;
        }
        // Lire evaluation
        public function lireEvaluation() {
            return $this->evaluation;
        }
        // Lire description
        public function lireDescription() {
            return $this->description;
        }
        // Lire nb_personnes
        public function lireNbPersonnes() {
            return $this->nb_personnes;
        }
        // Lire nb_chambres
        public function lireNbChambres() {
            return $this->nb_chambres;
        }
        // Lire nb_lits
        public function lireNbLits() {
            return $this->nb_lits;
        }
        // Lire nb_salle_de_bain
        public function lireNbSalleDeBain() {
            return $this->nb_salle_de_bain;
        }
        // Lire nb_demi_salle_de_bain
        public function lireNbDemiSalleDeBain() {
            return $this->nb_demi_salle_de_bain;
        }
        // Lire est_staionnement
        public function lireEstStaionnement() {
            return $this->est_staionnement;
        }
        // Lire est_wifi
        public function lireEstWifi() {
            return $this->est_wifi;
        }
        // Lire est_cuisine
        public function lireEstCuisine() {
            return $this->est_cuisine;
        }
        // Lire est_tv
        public function lireEstTv() {
            return $this->est_tv;
        }
        // Lire est_fer_a_repasser
        public function lireEstFerARepasser() {
            return $this->est_fer_a_repasser;
        }
        // Lire est_cintres
        public function lireEstCintres() {
            return $this->est_cintres;
        }
        // Lire est_seche_cheveux
        public function lireEstSecheCheveux() {
            return $this->est_seche_cheveux;
        }
        // Lire est_climatise
        public function lireEstClimatise() {
            return $this->est_climatise;
        }
        // Lire est_laveuse
        public function lireEstLaveuse() {
            return $this->est_laveuse;
        }
        // Lire est_secheuse
        public function lireEstSecheuse() {
            return $this->est_secheuse;
        }
        // Lire est_chauffage
        public function lireEstChauffage() {
            return $this->est_chauffage;
        }
        // Lire l_actif
        public function lireLActif() {
            return $this->l_actif;
        }
        // Lire l_banni
        public function lireLBanni() {
            return $this->l_banni;
        }
        // Lire l_date_banni
        public function lireLDateBanni() {
            return $this->l_date_banni;
        }
        // Lire l_commentaire_banni
        public function lireLCommentaireBanni() {
            return $this->l_commentaire_banni;
        }

	}

?>
