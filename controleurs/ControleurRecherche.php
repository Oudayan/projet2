<?php
/** 
 * @file        ControleurRecherche.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     3.0
 * @date        23 février 2018
 * @brief       Controleur pour la recherche de logements
 * @details     
 */ 

	class ControleurRecherche extends BaseControleur {

		public function index(array $params) {

            $modeleLogement = $this->lireDAO("Logement");
            $modeleTypeLogement = $this->lireDAO("TypeLogement");
            $modelePhotosLogement = $this->lireDAO("PhotoLogement");
            $modelePieces = $this->lireDAO("Piece");

            $_SESSION["recherche"]["rafraichir"] = 0;

            // Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page d'accueil
					case "accueil" :
						$this->afficherVues("accueil");
                        break;

                    // Affichage de la page de recherche par carte
					case "recherche" :
                        $donnees["logements"] = $this->filtrerLogements($params);
                        $donnees["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
						$this->afficherVues("recherche", $donnees);
                        break;

                    // Affichage de la recherche par fiches avec ajax
					case "rechercheFiches" :
                        // Requête logement
                        $donnees["logements"] = $this->filtrerLogements($params);
                        $donnees["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
                        unset ($donnees["succes"]);
                        unset ($donnees["erreur"]);
                        if ($donnees["logements"]) {
                            $donnees["succes"] = count($donnees["logements"]) . (count($donnees["logements"]) == 1 ? "&nbsp;logement trouvé&nbsp;!" : "&nbsp;logements trouvés&nbsp;!");
                        }
                        else {
                            $donnees["erreur"] = "Aucun logement trouvé&nbsp;!";
                        }
                        $this->afficherVues("rechercheFiches", $donnees, false);
                        break;

                    // Affichage de la recherche par carte avec ajax
					case "rechercheCarte" :
                        // Requête logement
                        $donnees["logements"] = $this->filtrerLogements($params);
                        $infosCarte = array();
                        for ($i = 0; $i<count($donnees["logements"]); $i++) {
                            $infosCarte[$i] = array();
                            $premierePhoto = $modelePhotosLogement->lirePremierePhotoLogement($donnees["logements"][$i]->lireIdLogement());
                            $infosCarte[$i][0] = '<a href="index.php?Logement&action=afficherLogement&idLogement=' . $donnees["logements"][$i]->lireIdLogement() . '"><h4 class="p-2">' . $donnees["logements"][$i]->lireNoCivique() . ' ' . $donnees["logements"][$i]->lireRue() . ' ' . $donnees["logements"][$i]->lireApt() . ', ' . $donnees["logements"][$i]->lireVille() . ', ' . $donnees["logements"][$i]->lireProvince() . '</h4></span><img src="' . $premierePhoto->lireCheminPhoto() . '"><div class="d-flex justify-content-between"><span class="prix pt-2"><strong>' . $donnees["logements"][$i]->lirePrix() . '$</strong></span><span class="score"><span style="width:' . ($donnees["logements"][$i]->lireEvaluation() / 5) * 100 . '%"></span></div></a>';
                            $infosCarte[$i][1] = $donnees["logements"][$i]->lireLatitude();
                            $infosCarte[$i][2] = $donnees["logements"][$i]->lireLongitude();
                            $infosCarte[$i][3] = ($donnees["logements"][$i]->lireIdTypeLogement() - 1);
                        } 
                        echo json_encode($infosCarte);
                        break;

                    // Affichage des images carousel de chaque logement avec ajax
					case "afficherImagesCarousel" :
                        if (isset($params["idLogement"]) && $params["idLogement"] != "") {
                            $imagesCarousel = $modelePhotosLogement->lireToutesPhotosParLogement($params["idLogement"]);
                            $infosCarousel = array();
                            for ($i = 0; $i<count($imagesCarousel); $i++) {
                                $infosCarousel[$i] = array();
                                $infosCarousel[$i][0] = $imagesCarousel[$i]->lireCheminPhoto();
                                $pieces = $modelePieces->lirePieceParId($imagesCarousel[$i]->lireIdPiece());
                                $infosCarousel[$i][1] = $pieces->lireDescriptionPiece();
                            }
                            echo json_encode($infosCarousel);
                        }
                        break;

					default :
					    $this->afficherVues("accueil");
                        break;

			 	}
					
		  	}
		  	else {
				$this->afficherVues("accueil");
 		  	
		  	}

	  	} // end of switch

        
        public function filtrerLogements(array $params) {
            
            $modeleLogement = $this->lireDAO("Logement");
            $modeleTypeLogement = $this->lireDAO("TypeLogement");
            $modelePhotosLogement = $this->lireDAO("PhotoLogement");
            $modelePieces = $this->lireDAO("Piece");
            $modeleOption = $this->lireDAO("Option");
            
            // Aller chercher les valeurs défaut du formulaire de recherche dans la table options
            $option = $modeleOption->lireOptionParId(1);
            $valeursOption = unserialize($option->lireValeursOption());
            //var_dump($valeursOption["latitude"]);
            
            //$options = ["affichage"=>"carte", "tri"=>"evaluation", "asc"=>"DESC", "region"=>6, "latitude"=>45.57, "longitude"=>-73.57, "rayon"=>20, "zoom"=>11, "prixMin"=>0, "prixMax"=>1000000, "evaluation"=>0];
            /*$options = [["Canada", "TPS", 5.0000], 
                        ["QC", "TVQ", 9.9750], 
                        ["ON", "HST", 8.0000], 
                        ["NB", "HST", 10.0000], 
                        ["NS", "HST", 10.0000], 
                        ["NF", "HST", 10.0000], 
                        ["PE", "HST", 10.0000], 
                        ["MB", "PST", 8.0000], 
                        ["SK", "PST", 6.0000], 
                        ["BC", "PST", 7.0000]];
            var_dump(serialize($options));*/
            
            // Affichage de la carte ou des fiches
            $_SESSION["recherche"]["action"] = "index.php?Recherche&carte=true";
            $_SESSION["recherche"]["affichage"] = "carte";
            if (isset($params["fiches"])) {
                $_SESSION["recherche"]["action"] = "index.php?Recherche&fiches=true";
                $_SESSION["recherche"]["affichage"] = "fiches";
            }
            // Construction du filtre de la requête
            $filtre = "l_actif = true AND d_active = true";
            // Date de location
            $aujourdhui = new DateTime();
            $demain = new DateTime("+1 day");
            if (!isset($_SESSION['recherche']['datesLocation'])) {
                $_SESSION['recherche']['datesLocation'] = $aujourdhui->format("Y-m-d") . "  au  " . $demain->format("Y-m-d");
            }
            if (!isset($_SESSION['recherche']['debutLocation'])) {
                $_SESSION['recherche']['debutLocation'] = $aujourdhui->format("Y-m-d");
            }
            if (!isset($_SESSION['recherche']['finLocation'])) {
                $_SESSION['recherche']['finLocation'] = $demain->format("Y-m-d");
            }
            if (isset($params["datesLocation"]) && $params["datesLocation"] != "") {
                $dates = explode("  au  ", $params["datesLocation"]);
                //var_dump($dates);
                $filtre .= ($filtre == "" ? "" : " AND ") . "date_debut <= '" . $dates[0] . "' AND date_fin >= '" . $dates[1] . "'";
                $_SESSION["recherche"]["debutLocation"] = $dates[0];
                $_SESSION["recherche"]["finLocation"] = $dates[1];
                $_SESSION['recherche']['datesLocation'] = $dates[0] . "  au  " . $dates[1];
            }
            // Nombre de personnes
            if (isset($params["nbPersonnes"])) {
                $filtre .= ($filtre == "" ? "" : " AND ") . "nb_personnes >= " . $params["nbPersonnes"];
                $_SESSION["recherche"]["nbPersonnes"] = $params["nbPersonnes"];
            }
            else if (!isset($_SESSION["recherche"]["nbPersonnes"])) {
                $_SESSION["recherche"]["nbPersonnes"] = $valeursOption["nbPersonnes"];
            }
            // Adresse de départ des recherches
            if (isset($params["adresseDepart"])) {
                $_SESSION["recherche"]["adresseDepart"] = $params["adresseDepart"];
            }
            else if (!isset($_SESSION["recherche"]["adresseDepart"])) {
                $_SESSION["recherche"]["adresseDepart"] = "";
            }
            // Latitude
            if (isset($params["latitude"])) {
                $_SESSION["recherche"]["latitude"] = $params["latitude"];
            }
            else if (!isset($_SESSION["recherche"]["latitude"])) {
                $_SESSION["recherche"]["latitude"] = $valeursOption["latitude"];
            }
            // Longitude
            if (isset($params["longitude"])) {
                $_SESSION["recherche"]["longitude"] = $params["longitude"];
            }
            else if (!isset($_SESSION["recherche"]["longitude"])) {
                $_SESSION["recherche"]["longitude"] = $valeursOption["longitude"];
            }
            // Rayon de recherche du point de départ
            if (isset($params["rayon"])) {
                $_SESSION["recherche"]["rayon"] = $params["rayon"];
                // Tableau associatif des rayons de recherche et du niveau de zoom de la carte
                $zoom = ["0.5"=>16, 1=>15, 2=>14, 3=>13.66, 4=>13.33, 5=>13, 10=>12, 15=>11.5, 20=>11, 25=>10.5, 50=>10, 75=>9.25, 100=>8.75, 150=>8.25, 200=>8, 250=>7.5, 500=>7, 1000=>6];
                foreach ($zoom as $rayon=>$valeur) {
                    if ($rayon == $params["rayon"]) {
                        $_SESSION["recherche"]["zoom"] = $valeur;
                    }
                }
            }
            else if (!isset($_SESSION["recherche"]["rayon"])) {
                $_SESSION["recherche"]["rayon"] = $valeursOption["rayon"];
                $_SESSION["recherche"]["zoom"] = $valeursOption["zoom"];
            }
            // Prix minimum
            if (isset($params["prixMin"])) {
                $filtre .= ($filtre == "" ? "" : " AND ") . "prix >= " . $params["prixMin"];
                $_SESSION["recherche"]["prixMin"] = $params["prixMin"];
            }
            else if (!isset($_SESSION["recherche"]["prixMin"])) {
                $_SESSION["recherche"]["prixMin"] = $valeursOption["prixMin"];
            }
            // Prix Maximum
            if (isset($params["prixMax"])) {
                $filtre .= ($filtre == "" ? "" : " AND ") . "prix <= " . $params["prixMax"];
                $_SESSION["recherche"]["prixMax"] = $params["prixMax"];
            }
            else if (!isset($_SESSION["recherche"]["prixMax"])) {
                $_SESSION["recherche"]["prixMax"] = $valeursOption["prixMax"];
            }
            // Type de logement
            $_SESSION["recherche"]["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
            $cnt = 0;
            for ($i = 1; $i <= count($_SESSION["recherche"]["typesLogements"]); $i++) {
                if (isset($params["typeLogement" . $i])) {
                    $_SESSION["recherche"]["rafraichir"]++;
                    $cnt++;
                    if ($cnt == 1) {
                        $filtre .= ($filtre == "" ? "(" : " AND (") . "id_type_logement = " . $i;
                    }
                    else {
                        $filtre .= (" OR ") . "id_type_logement = " . $i;
                    }
                    $_SESSION["recherche"]["typeLogement" . $i] = "checked";
                }
                else {
                    $_SESSION["recherche"]["typeLogement" . $i] = "";
                }
                
            }
            if ($cnt == 0) {
                for ($i = 1; $i <= count($_SESSION["recherche"]["typesLogements"]); $i++) { 
                    $_SESSION["recherche"]["typeLogement" . $i] = "checked";
                }
            }
            else {
                $filtre .= ")";
            }
            // Évaluation
            if (isset($params["evaluation"])) {
                $filtre .= ($filtre == "" ? "" : " AND ") . "evaluation >= " . $params["evaluation"];
                $_SESSION["recherche"]["evaluation"] = $params["evaluation"];
            }
            else if (!isset($_SESSION["recherche"]["evaluation"])) {
                $_SESSION["recherche"]["evaluation"] = $valeursOption["evaluation"];
            }
            // Construction du tri de la requête
            $tri = "";
            if (isset($params["tri"])) {
                $tri .= "prix";
                $_SESSION["recherche"]["tri"] = "checked";
            }
            else {
                $tri .= "evaluation";
                $_SESSION["recherche"]["tri"] = "";
            }
            if (isset($params["asc"])) {
                $tri .= " ASC";
                $_SESSION["recherche"]["asc"] = "checked";
            }
            else {
                $tri .= " DESC";
                $_SESSION["recherche"]["asc"] = "";
            }
            return $modeleLogement->filterLogements($filtre, $tri, $_SESSION["recherche"]["rayon"], $_SESSION["recherche"]["latitude"], $_SESSION["recherche"]["longitude"]);
        }
        
        
        /* Source : https://stackoverflow.com/questions/7672759/how-to-calculate-distance-from-lat-long-in-php
        SELECT ( 3959 * acos( cos( radians( 45.56 ) * cos( radians( latitude ) ) * 
        cos( radians( longitude ) - radians( -73.57 ) ) + sin( radians( 45.56 )
        ) * sin( radians( latitude ) ) ) ) ) AS distance FROM al_logements 
        HAVING distance <= 10 ORDER BY distance ASC */
            
        // Source : https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php
        private function distance($lat1, $lon1, $lat2, $lon2, $unite = "") {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
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

		public function accueil() {
			if (!isset($_SESSION["courriel"])) {
				$this->afficherVues("accueil");
			}
			else {
				$modeleLogement = $this->lireDAO("Logement");
				$modeleTypeLogement = $this->lireDAO("TypeLogement");
				$donnees["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
				$donnees["logements"] = $modeleLogement->lireTousLogements();
				$this->afficherVues("recherche", $donnees);
			}
		return;
		}

    }

?>