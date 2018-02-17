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
                        $donnees["action"] = "index.php?Recherche&carte=true";
                        if (isset($params["fiches"])) {
                            $donnees["action"] = "index.php?Recherche&fiches=true";
                        }
                        // Construction du filtre de la requête
                        $filtre = "";
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
                        $donnees["logements"] = $modeleLogement->lireTousLogements($filtre, $tri);
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
        
		private function showCategories() {
	  		$categoriesModel = $this->getDAO("Categories");
            $categories = $categoriesModel->getAllCategories();
            echo "<option value='0' selected disabled>Veuillez choisir une catégorie</option>";
			foreach ($categories as $category) {
                echo "<option value=" . $category->Id . ">" . $category->Description . "</option>";
            }
        }


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