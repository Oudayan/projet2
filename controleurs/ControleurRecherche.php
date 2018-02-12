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

			// Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page de recherche par carte
					case "recherche" :
                        $donnees["typesLogements"] = $modeleTypeLogement->lireTousTypeLogements();
                        $donnees["logements"] = $modeleLogement->lireTousLogements();
                        /*echo "<pre>";
                        var_dump($donnees["logements"]);
                        echo "</pre>";*/
                        $this->afficherVues("recherche", $donnees);
                       /*if (isset($params["CategoryId"]) && $params["CategoryId"] != "") {
                            $category = $categoriesModel->getCategoryById($params["CategoryId"]);
                            echo $category->Description;
                        }*/
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

    }
?>