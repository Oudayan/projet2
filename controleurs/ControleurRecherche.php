<?php
/** 
 * @file        ControleurRecherche.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        10 février 2018
 * @brief       Controleur pour la recherche de logements
 * @details     
 */ 

	class ControleurRecherche extends BaseControleur {

		public function index(array $params) {

            $modeleLogement = $this->lireDAO("Logement");
            $modeleTypeLogement = $this->lireDAO("TypeLogement");
            $modelePhotosLogement = $this->lireDAO("PhotoLogement");

			// Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page d'accueil
					case "accueil" :
						$this->accueil();
                        break;

                    // Affichage de la page de recherche
					case "recherche" :
                        // Afficheche de la carte ou des fiches
                        $donnees["action"] = "index.php?Recherche&carte=true";
                        if (isset($params["fiches"])) {
                            $donnees["action"] = "index.php?Recherche&fiches=true";
                        }
                        // Construction du filtre de la requête
                        $filtre = "";
                        // Région
                        if (isset($params["region"])) {
                            //$filtre .= ($filtre == "" ? "" : " AND ") . "region = " . $params["region"];
                            $donnees["region"] = $params["region"];
                        }
                        else {
                            $donnees["region"] = 6;
                        }
                        // Rayon
                        if (isset($params["rayon"])) {
                            //$filtre .= ($filtre == "" ? "" : " AND ") . "rayon <= " . $params["rayon"];
                            $donnees["rayon"] = $params["rayon"];
                            if ($params["rayon"] == 0.5) {
                                $donnees["zoom"] = 18;
                            }
                            if ($params["rayon"] == 1) {
                                $donnees["zoom"] = 17;
                            }
                            if ($params["rayon"] == 2) {
                                $donnees["zoom"] = 16;
                            }
                            if ($params["rayon"] == 3) {
                                $donnees["zoom"] = 15;
                            }
                            if ($params["rayon"] == 4) {
                                $donnees["zoom"] = 14;
                            }
                            if ($params["rayon"] == 5) {
                                $donnees["zoom"] = 13;
                            }
                            if ($params["rayon"] == 10) {
                                $donnees["zoom"] = 12;
                            }
                            if ($params["rayon"] == 15) {
                                $donnees["zoom"] = 11.5;
                            }
                            if ($params["rayon"] == 20) {
                                $donnees["zoom"] = 11;
                            }
                            if ($params["rayon"] == 25) {
                                $donnees["zoom"] = 10.5;
                            }
                            if ($params["rayon"] == 50) {
                                $donnees["zoom"] = 10;
                            }
                            if ($params["rayon"] == 75) {
                                $donnees["zoom"] = 9.25;
                            }
                            if ($params["rayon"] == 100) {
                                $donnees["zoom"] = 8.5;
                            }
                            if ($params["rayon"] == 150) {
                                $donnees["zoom"] = 8.25;
                            }
                            if ($params["rayon"] == 200) {
                                $donnees["zoom"] = 8;
                            }
                            if ($params["rayon"] == 250) {
                                $donnees["zoom"] = 7.5;
                            }
                            if ($params["rayon"] == 500) {
                                $donnees["zoom"] = 7;
                            }
                            if ($params["rayon"] == 1000) {
                                $donnees["zoom"] = 6;
                            }
                        }
                        else {
                            $donnees["rayon"] = 20;
                            $donnees["zoom"] = 11;
                        }
                        // Prix minimum
                        if (isset($params["prixMin"])) {
                            $filtre .= ($filtre == "" ? "" : " AND ") . "prix >= " . $params["prixMin"];
                            $donnees["prixMin"] = $params["prixMin"];
                        }
                        else {
                            $donnees["prixMin"] = 0;
                        }
                        // Prix Maximum
                        if (isset($params["prixMax"])) {
                            $filtre .= ($filtre == "" ? "" : " AND ") . "prix <= " . $params["prixMax"];
                            $donnees["prixMax"] = $params["prixMax"];
                        }
                        else {
                            $donnees["prixMax"] = 1000000;
                        }
                        // Type de logement
                        $donnees["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
                        $cnt = 0;
                        for ($i = 1; $i <= count($donnees["typesLogements"]); $i++) { 
                            if (isset($params["typeLogement" . $i])) {
                                $cnt++;
                                if ($cnt == 1) {
                                    $filtre .= ($filtre == "" ? "(" : " AND (") . "id_type_logement = " . $params["typeLogement" . $i];
                                }
                                else {
                                    $filtre .= (" OR ") . "id_type_logement = " . $params["typeLogement" . $i];
                                }
                                $donnees["typeLogement" . ($i)] = "checked";
                            }
                            else {
                                $donnees["typeLogement" . ($i)] = "";
                            }
                        }
                        if ($cnt == 0) {
                            for ($i = 1; $i <= count($donnees["typesLogements"]); $i++) { 
                                $donnees["typeLogement" . $i] = "checked";
                            }
                        }
                        else {
                            $filtre .= ")";
                        }
                        // Évaluation
                        if (isset($params["evaluation"])) {
                            $filtre .= ($filtre == "" ? "" : " AND ") . "evaluation >= " . $params["evaluation"];
                            $donnees["evaluation"] = $params["evaluation"];
                        }
                        else {
                            $donnees["evaluation"] = 0;
                        }
                        if ($filtre == "") {
                            $filtre = "id_logement > 0";
                        }
                        // Construction du tri de la requête
                        $tri = "";
                        if (isset($params["tri"])) {
                            $tri .= "prix";
                            $donnees["tri"] = "checked";
                        }
                        else {
                            $tri .= "evaluation";
                            $donnees["tri"] = "";
                        }
                        if (isset($params["asc"])) {
                            $tri .= " ASC";
                            $donnees["asc"] = "checked";
                        }
                        else {
                            $tri .= " DESC";
                            $donnees["asc"] = "";
                        }
                        $donnees["logements"] = $modeleLogement->filterLogements($filtre, $tri, $donnees["rayon"]);
                        $this->afficherVues("recherche", $donnees);
                        break;

                    // Affichage de la page de recherche par carte
					case "afficherImagesCarousel" :
                        if (isset($params["idLogement"]) && $params["idLogement"] != "") {
                            $imagesCarousel = $modelePhotosLogement->lireToutesPhotosParLogement($params["idLogement"]);
                            $infosCarousel = array();
                            for ($i = 0; $i<count($imagesCarousel); $i++) {
                                $infosCarousel[$i] = array();
                                $infosCarousel[$i][0] = $imagesCarousel[$i]->lireCheminPhoto();
                                $infosCarousel[$i][1] = $imagesCarousel[$i]->lireDescriptionPhoto();
                            }
                            echo json_encode($infosCarousel);
                        }
                        break;

					default :
					    $this->accueil();
                        break;

			 	}
					
		  	}
		  	else {
				$this->accueil();

 		  	
		  	}

	  	} // end of switch

        /* Source : https://stackoverflow.com/questions/7672759/how-to-calculate-distance-from-lat-long-in-php
        SELECT ( 3959 * acos( cos( radians( 45.56 ) * cos( radians( latitude ) ) * 
        cos( radians( longitude ) - radians( -73.57 ) ) + sin( radians( 45.56 )
        ) * sin( radians( latitude ) ) ) ) ) AS distance FROM al_logements 
        HAVING distance <= 10 ORDER BY distance ASC */
            
        // Source : https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php
        private function distance($lat1, $lon1, $lat2, $lon2, $unite = "") {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unite = strtoupper($unite);
            if ($unite == "M") {
                // Miles
                return $miles;
            }
            else if ($unite == "N") {
                // Miles nautiques
                return ($miles * 0.8684);
            }
            else {
                // Kilomètres
                return ($miles * 1.609344);
            }
        }

		
        // km = (40000 / 2^zoomlevel) * 2

        
	  	private function validateCategoryId($idCategory) {
			if (filter_var($idCategory, FILTER_SANITIZE_NUMBER_INT) !== false) {
				return false;
			}
			else {
				$errors .= "Une erreur s'est glissée lors de la modification, veuillez recommencer.<br>";
				return $errors;
			}
		}
		
		public function accueil() {
			if (!isset($_SESSION["courriel"])) {
				$this->afficherVues("accueil");
			}
			else {
				header("Location: index.php?Recherche&action=recherche&fiches=true");
			}
		return;
		}

    }
?>