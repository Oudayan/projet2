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
            $modeleTypeLogement = $this->lireDAO("TypeLogement");
            $modelePhotosLogement = $this->lireDAO("PhotoLogement");
            $modelePieces = $this->lireDAO("Piece");
            $modeleDisponibilite = $this->lireDAO("Disponibilite");

            // Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page de location
                    case "afficherProprietes" :
                        $donnees["erreur"] = "";
                        if (isset($_SESSION["courriel"]) && isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] != 3) {
                            $logements = $modeleLogement->lireLogementParProprietaire($_SESSION["courriel"]);
                            for ($i=0; $i<count($logements); $i++) {
                                $donnees["logement"][$i] = $logements[$i];
                                $donnees["logement"][$i]["dispos"] = $modeleDisponibilite->lireDisponibilitesParLogement($logements[$i]->lireIdLogement());
                                $donnees["logement"][$i]["photos"] = $$modelePhotosLogement($logements[$i]->lireIdLogement());
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
