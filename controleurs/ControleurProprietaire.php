<?php
/** 
 * @file        ControleurProprietaire.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     3.0
 * @date        2 mars 2018
 * @brief       Controleur pour la gestion des logements d'un propriétaire
 * @details     
 */ 

	class ControleurProprietaire extends BaseControleur {

		public function index(array $params) {

            $modeleLogement = $this->lireDAO("Logement");
            $modelePhotosLogement = $this->lireDAO("PhotoLogement");
            $modeleDisponibilite = $this->lireDAO("Disponibilite");
            $modeleLocation = $this->lireDAO("Location");
            $modeleUsagers = $this->lireDAO("Usagers");

            // Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page de location
                    case "afficherLogements" :
                        $donnees["erreur"] = "";
                        if (isset($_SESSION["courriel"]) && isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] != 3) {
                            $logements = $modeleLogement->lireLogementParProprietaire($_SESSION["courriel"]);
                            for ($i=0; $i<count($logements); $i++) {
                                $donnees["logements"][$i] = $logements[$i];
                                $donnees["dispos"][$i] = $modeleDisponibilite->lireDisponibilitesParLogement($logements[$i]->lireIdLogement());
                                $donnees["photos"][$i] = $modelePhotosLogement->lireToutesPhotosParLogement($logements[$i]->lireIdLogement());
                            }
                            $locations = $modeleLocation->lireLocationsCourantesParProprietaire($_SESSION["courriel"]);
                            for ($i=0; $i<count($locations); $i++) {
                                $donnees["locations"][$i] = $locations[$i];
                                $donnees["logement"][$i] = $modeleLogement->lireLogementParId($locations[$i]->lireIdLogement());
                                $donnees["locataire"][$i] = $modeleUsagers->obtenir_par_courriel($locations[$i]->lireIdLocataire());
                            }
                        }
                        else {
                            $donnees["erreur"] = "Vous n'avez pas les permissions nécessaires pour effectuer cette action.";
                        }
                        $this->afficherVues("proprietaire", $donnees);
                        break;

                    default :
					    $this->afficherVues("proprietaire");
                        break;

			 	} // Fin du switch
					
		  	}
		  	else {
				$this->afficherVues("accueil");
		  	}

	  	} // Fin d'index
       
    }
