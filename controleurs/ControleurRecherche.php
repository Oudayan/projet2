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
                        //var_dump($donnees["logements"] );
                        /*if ($donnees["logements"]) {
                            foreach ($donnees["logements"] as $logement) {
                                echo '<article id="fiche_' . $logement->lireIdLogement() . '" class="row border rounded text-center m-2 p-2">';
                                echo    '<div class="col-lg-4">';
                                echo        '<div id="carousel_' . $logement->lireIdLogement() . '" class="carousel slide mb-5" data-ride="carousel">';
                                echo            '<ol id="carousel_pagination_' . $logement->lireIdLogement() . '" class="carousel-indicators">';
                                $imagesCarousel = $modelePhotosLogement->lireToutesPhotosParLogement($logement->lireIdLogement());
                                for ($i=0; $i<count($imagesCarousel); $i++) {
                                    if ($i == 0) {
                                        echo        '<li data-target="#carousel_' . $logement->lireIdLogement() . '" data-slide-to="' . $i . '" active></li>';
                                    }
                                    else {
                                        echo        '<li data-target="#carousel_' . $logement->lireIdLogement() . '" data-slide-to="' . $i . '"></li>';
                                    }
                                }
                                echo            '</ol>';
                                echo            '<div id="liste_image_' . $logement->lireIdLogement() . '" class="carousel-inner">';
                                for ($i=0; $i<count($imagesCarousel); $i++) {
                                    if ($i == 0) {
                                        echo        '<div class="carousel-item active">';
                                    }
                                    else {
                                        echo        '<div class="carousel-item">';
                                    }
                                    $pieces = $modelePieces->lirePieceParId($imagesCarousel[$i]->lireIdPiece());
                                    echo                '<img class="d-block w-100" src="' . $imagesCarousel[$i]->lireCheminPhoto() . '" alt="' . $pieces->lireDescriptionPiece() . '">';
                                    echo                '<div class="carousel-caption d-none d-md-block">';
                                    echo                    '<h5>' . $pieces->lireDescriptionPiece() . '</h5>';
                                    echo                '</div>';
                                    echo            '</div>';
                                }
                                echo            '</div>';
                                echo            '<a class="carousel-control-prev" href="#carousel_' . $logement->lireIdLogement() . '" role="button" data-slide="prev">';
                                echo                '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                                echo                '<span class="sr-only">Previous</span>';
                                echo            '</a>';
                                echo            '<a class="carousel-control-next" href="#carousel_' . $logement->lireIdLogement() . '" role="button" data-slide="next">';
                                echo                '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                                echo                '<span class="sr-only">Next</span>';
                                echo            '</a>';
                                echo        '</div>';
                                echo    '</div>';
                                echo    '<div class="col-lg-8 description-fiche">';
                                echo        '<a href="index.php?Logement&action=afficherLogement">';
                                echo            '<div class="row">';
                                echo                '<h4 class="titre-fiche col-12 p-2">' . $logement->lireNoCivique() . " " . $logement->lireRue() . " " . $logement->lireApt() . ", " . $logement->lireVille() . ", " . $logement->lireProvince() . '</h4>';
                                echo                '<div class="col-sm-12 text-left my-3">';
                                echo                    $logement->lireDescription() . '<br>';
                                echo                '</div>';
                                echo                '<div class="col-sm-12 text-left my-1">';
                                $typesLogements = $modeleTypeLogement->lireTousTypeLogements();
                                foreach ($typesLogements as $typeLogement) { 
                                    if ($typeLogement->lireIdTypeLogement() == $logement->lireIdTypeLogement()) {
                                        echo            "Type de logement&nbsp;:&nbsp;" . $typeLogement->lireTypeLogement();
                                    }
                                }
                                echo                '</div>';
                                echo                '<div class="col-sm-6 text-center text-sm-left my-3">';
                                echo                    'Prix&nbsp;:&nbsp;<br><span class="prix mt-3"><strong>' . $logement->lirePrix() . '&nbsp;$</strong></span>';
                                echo                '</div>';
                                echo                '<div class="col-sm-6 text-center text-sm-right my-3">';
                                echo                    'Évaluation&nbsp;:&nbsp;' . round($logement->lireEvaluation(), 2) . '&nbsp;/&nbsp;5';
                                echo                    '<br><span class="score"><span style="width:' . ($logement->lireEvaluation() / 5) * 100 . ' %"></span></span>';
                                echo                '</div>';
                                echo            '</div>';
                                echo        '</a>';
                                echo    '</div>';
                                echo '</article>';
                            }
                        }
                        else {
                            echo    '<div class="text-center m-5 py-5">';
                            echo        '<h3 class="m-5 py-5">Désolé, il n\'y a aucun logement trouvé avec ces critères de&nbsp;recherche.</h3>';
                            echo    '</div>';
                        }*/
                        //$this->afficherVues("recherche", $donnees);
                        break;

                    // Affichage de la recherche par carte avec ajax
					case "rechercheCarte" :
                        // Requête logement
                        $donnees["logements"] = $this->filtrerLogements($params);
                        $infosCarte = array();
                        for ($i = 0; $i<count($donnees["logements"]); $i++) {
                            $infosCarte[$i] = array();
                            $infosCarte[$i][0] = '<a href="index.php?Logement&action=afficherLogement"><h4 class="p-2">' . $donnees["logements"][$i]->lireNoCivique() . ' ' . $donnees["logements"][$i]->lireRue() . ' ' . $donnees["logements"][$i]->lireApt() . ', ' . $donnees["logements"][$i]->lireVille() . ', ' . $donnees["logements"][$i]->lireProvince() . '</h4></span><img src="' . $donnees["logements"][$i]->lirePremierePhoto() . '"><div class="d-flex justify-content-between"><span class="prix pt-2"><strong>' . $donnees["logements"][$i]->lirePrix() . '$</strong></span><span class="score"><span style="width:' . ($donnees["logements"][$i]->lireEvaluation() / 5) * 100 . '%"></span></div></a>';
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

           // Affichage de la carte ou des fiches
            $_SESSION["recherche"]["action"] = "index.php?Recherche&carte=true";
            $_SESSION["recherche"]["affichage"] = "carte";
            if (isset($params["fiches"])) {
                $_SESSION["recherche"]["action"] = "index.php?Recherche&fiches=true";
                $_SESSION["recherche"]["affichage"] = "fiches";
            }
            // Construction du filtre de la requête
            $filtre = "l_actif = true";
            // Date de location
            if (isset($params["datesLocation"])) {
                $dates = explode("  au  ", $params["datesLocation"]);
                $filtre .= ($filtre == "" ? "" : " AND ") . "date_debut <= '" . $dates[0] . "' AND date_fin >= '" . $dates[1] . "'";
                $_SESSION["recherche"]["debutLocation"] = $dates[0];
                $_SESSION["recherche"]["finLocation"] = $dates[1];
            }
            else if (!isset($_SESSION["recherche"]["datesLocation"])) {
                $_SESSION["recherche"]["datesLocation"] = date("m-d-Y");
            }
            // Région
            if (isset($params["region"])) {
                //$filtre .= ($filtre == "" ? "" : " AND ") . "region = " . $params["region"];
                $_SESSION["recherche"]["region"] = $params["region"];
            }
            else if (!isset($_SESSION["recherche"]["region"])) {
                $_SESSION["recherche"]["region"] = 6;
            }
            // Latitude
            if (isset($params["latitude"])) {
                $_SESSION["recherche"]["latitude"] = $params["latitude"];
            }
            else if (!isset($_SESSION["recherche"]["latitude"])) {
                $_SESSION["recherche"]["latitude"] = 45.57;
            }
            // Longitude
            if (isset($params["longitude"])) {
                $_SESSION["recherche"]["longitude"] = $params["longitude"];
            }
            else if (!isset($_SESSION["recherche"]["longitude"])) {
                $_SESSION["recherche"]["longitude"] = -73.57;
            }
            // Rayon
            if (isset($params["rayon"])) {
                $_SESSION["recherche"]["rayon"] = $params["rayon"];
                // Tableau associatif des rayons de recherche et du niveau de zoom de la carte
                $zoom = ["0.5"=>18, 1=>17, 2=>16, 3=>15, 4=>14, 5=>13, 10=>12, 15=>11.5, 20=>11, 25=>10.5, 50=>10, 75=>9.25, 100=>8.75, 150=>8.25, 200=>8, 250=>7.5, 500=>7, 1000=>6];
                foreach ($zoom as $rayon=>$valeur) {
                    if ($rayon == $params["rayon"]) {
                        $_SESSION["recherche"]["zoom"] = $valeur;
                    }
                }
            }
            else if (!isset($_SESSION["recherche"]["rayon"])) {
                $_SESSION["recherche"]["rayon"] = 20;
                $_SESSION["recherche"]["zoom"] = 11;
            }
            // Prix minimum
            if (isset($params["prixMin"])) {
                $filtre .= ($filtre == "" ? "" : " AND ") . "prix >= " . $params["prixMin"];
                $_SESSION["recherche"]["prixMin"] = $params["prixMin"];
            }
            else if (!isset($_SESSION["recherche"]["prixMin"])) {
                $_SESSION["recherche"]["prixMin"] = 0;
            }
            // Prix Maximum
            if (isset($params["prixMax"])) {
                $filtre .= ($filtre == "" ? "" : " AND ") . "prix <= " . $params["prixMax"];
                $_SESSION["recherche"]["prixMax"] = $params["prixMax"];
            }
            else if (!isset($_SESSION["recherche"]["prixMax"])) {
                $_SESSION["recherche"]["prixMax"] = 1000000;
            }
            // Type de logement
            $_SESSION["recherche"]["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
            $cnt = 0;
            for ($i = 1; $i <= count($_SESSION["recherche"]["typesLogements"]); $i++) {
                if (isset($params["typeLogement" . $i])) {
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
                $_SESSION["recherche"]["evaluation"] = 0;
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