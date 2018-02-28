<?php
/** 
 * @file        ControleurLocation.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     3.0
 * @date        25 février 2018
 * @brief       Controleur pour la location de logements
 * @details     
 */ 

	class ControleurLocation extends BaseControleur {

		public function index(array $params) {

            $modeleLocation = $this->lireDAO("Location");
            $modeleLogement = $this->lireDAO("Logement");
            $modeleDisponibilites = $this->lireDAO("Disponibilites");

            // Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page d'accueil
					case "accueil" :
						$this->afficherVues("accueil");
                        break;

                    // Affichage de la page de location
					case "location" 
                        if (isset($params["idLogement"])) {
                        $donnees["logement"] = $this->lireLogementParId($params["idLogement"]);
						$this->afficherVues("location", $donnees);
                        break;

					default :
					    $this->afficherVues("accueil");
                        break;

			 	}
					
		  	}
		  	else {
				$this->afficherVues("location");
 		  	
		  	}

	  	} // end of switch
