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
                            $locations = $modeleLocation->lireLocationsParProprietaire($_SESSION["courriel"]);
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

                    // Sauvegarder disponibilité
                    case "sauvegarderDisponibilite" :
                        $donnees["erreur"] = "";
                        if (isset($params["idDisponibilite"]) && isset($params["datesDispo"]) && isset($params["idLogement"])) {
                            if ($params["idDisponibilite"] != 0) {
                                $modeleDisponibilite->desactiverDisponibilite($params["idDisponibilite"]);
                            }
                            $unique = true;
                            $dates = explode("  au  ", $params["datesDispo"]);
                            $dispos = $modeleDisponibilite->lireDisponibilitesParLogement($params["idLogement"]);
                            foreach ($dispos as $dispo) {
                                if (strtotime($dates[0]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[0]) <= strtotime($dispo->lireDateFin()) && $dispo->lireDActive() == 1) {
                                    $unique = false;
                                    $donnees["erreur"] = "La date de début est en conflit avec une disponibilité existante.";
                                }
                                if (strtotime($dates[1]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[1]) <= strtotime($dispo->lireDateFin()) && $dispo->lireDActive() == 1) {
                                    $unique = false;
                                    $donnees["erreur"] = "La date de fin est en conflit avec une disponibilité existante.";
                                }
                                if (strtotime($dates[0]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[0]) <= strtotime($dispo->lireDateFin()) && strtotime($dates[1]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[1]) <= strtotime($dispo->lireDateFin()) && $dispo->lireDActive() == 1) {
                                    $unique = false;
                                    $donnees["erreur"] = "La date de début et la date de fin sont en conflits avec une disponibilité existante.";
                                }
                            }
                            if ($unique) {
                                $disponibilite = new Disponibilite($params["idDisponibilite"], $params["idLogement"], $dates[0], $dates[1], true);
                                $modeleDisponibilite->sauvegarderDisponibilite($disponibilite);
                            }
                            else {
                                $modeleDisponibilite->reactiverDisponibilite($params["idDisponibilite"]);
                            }
                        }
                        else {
                            $donnees["erreur"] = "Données manquantes pour sauvegarder la disponibilité. Veuillez recommencer.";
                        }
                        $this->afficherDisponilitesLogement($params["idLogement"], $donnees["erreur"]);
                        break;

                    // Modifier disponibilité
                    case "modifierDisponibilite" :
                        $donnees["erreur"] = "";
                        if (isset($params["idDisponibilite"]) && isset($params["idLogement"])) {
                            $disponibilite = $modeleDisponibilite->lireDisponibiliteParId($params["idDisponibilite"]);
                            $dispo = array();
                            $dispo["id"] = $disponibilite->lireIdDisponibilite();
                            $dispo["dateDebut"] = $disponibilite->lireDateDebut();
                            $dispo["dateFin"] = $disponibilite->lireDateFin();
                            echo json_encode($dispo);
                        }
                        else {
                            $donnees["erreur"] = "Données manquantes pour effacer la disponibilité. Veuillez recommencer.";
                        }
                        break;

                    // Désactiver disponibilité
                    case "desactiverDisponibilite" :
                        $donnees["erreur"] = "";
                        if (isset($params["idDisponibilite"]) && isset($params["idLogement"])) {
                            $modeleDisponibilite->desactiverDisponibilite($params["idDisponibilite"]);
                        }
                        else {
                            $donnees["erreur"] = "Données manquantes pour effacer la disponibilité. Veuillez recommencer.";
                        }
                        $this->afficherDisponilitesLogement($params["idLogement"]);
                        break;

                    // Action par défaut
                    default :
					    $this->afficherVues("proprietaire");
                        break;

			 	} // Fin du switch
					
		  	}
		  	else {
				$this->afficherVues("accueil");
		  	}

	  	} // Fin d'index

        // Fonction pour afficher les disponibilités d'un logement
        public function afficherDisponilitesLogement($logement, $erreur = "") {
            $modeleDisponibilite = $this->lireDAO("Disponibilite");
            $dispos = $modeleDisponibilite->lireDisponibilitesParLogement($logement);
            if ($erreur != "") {
                echo '<p class="text-danger">' . $erreur . '</p>';
            }
            for ($i=0; $i<count($dispos); $i++) {
                echo '<tr>';
                echo    '<th scope="row" class="pt-3">' . ($i + 1) . '</th>';
                echo    '<td class="pt-3">' . $dispos[$i]->lireDateDebut() . '</td>';
                echo    '<td class="pt-3">' . $dispos[$i]->lireDateFin() . '</td>';
                echo    '<td><button class="btn btn-bleu btn-sm" onclick="modifierDispo(' . $dispos[$i]->lireIdDisponibilite() . ', ' . $dispos[$i]->lireIdLogement() . ')">Modifier</button></td>';
                echo    '<td><button class="btn btn-secondary btn-sm"onclick="effacerDispo(' . $dispos[$i]->lireIdDisponibilite() . ', ' . $dispos[$i]->lireIdLogement() . ')">Effacer</button></td>';
                echo '</tr>';
            }
        }
            
    }
