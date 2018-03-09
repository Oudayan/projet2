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
                            echo "Vous n'avez pas les permissions nécessaires pour effectuer cette action.";
                        }
                        $this->afficherVues("proprietaire", $donnees);
                        break;

                    // Sauvegarder disponibilité - Ajax
                    case "sauvegarderDisponibilite" :
                        $donnees["erreur"] = "";
                        if (isset($params["idDisponibilite"]) && isset($params["datesDispo"]) && isset($params["idLogement"])) {
                            if ($params["idDisponibilite"] != 0) {
                                $modeleDisponibilite->desactiverDisponibilite($params["idDisponibilite"]);
                            }
                            $unique = true;
                            $dates = explode("  au  ", $params["datesDispo"]);
                            // Boucler à travers les disponibilités pour vérifier s'il y a conflit de plages de disponibilités
                            $dispos = $modeleDisponibilite->lireDisponibilitesParLogement($params["idLogement"]);
                            foreach ($dispos as $dispo) {
                                // Conflits dates début et fin
                                if (strtotime($dates[0]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[0]) <= strtotime($dispo->lireDateFin()) && strtotime($dates[1]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[1]) <= strtotime($dispo->lireDateFin()) && $dispo->lireDActive() == 1) {
                                    $unique = false;
                                    echo "<tr class='erreur'><td colspan='5' class='text-danger'>La date de début et la date de fin sont en conflits avec une disponibilité existante.</td></tr>";
                                }
                                // Conflit date de début
                                else if (strtotime($dates[0]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[0]) <= strtotime($dispo->lireDateFin()) && $dispo->lireDActive() == 1) {
                                    $unique = false;
                                    echo "<tr class='erreur'><td colspan='5' class='text-danger'>La date de début est en conflit avec une disponibilité existante.</td></tr>";
                                }
                                // Conflit date de fin
                                else if (strtotime($dates[1]) >= strtotime($dispo->lireDateDebut()) && strtotime($dates[1]) <= strtotime($dispo->lireDateFin()) && $dispo->lireDActive() == 1) {
                                    $unique = false;
                                    echo "<tr class='erreur'><td colspan='5' class='text-danger'>La date de fin est en conflit avec une disponibilité existante.</td></tr>";
                                }
                            }
                            // Boucler à travers les locations du logement pour vérifier s'il y a conflit de plages de disponibilités
                            $locations = $modeleLocation->lireLocationsActivesParLogement($params["idLogement"]);
                            foreach ($locations as $location) {
                                // Conflits dates début et fin
                                if (strtotime($dates[0]) >= strtotime($location->lireDateDebut()) && strtotime($dates[0]) <= strtotime($location->lireDateFin()) && strtotime($dates[1]) >= strtotime($location->lireDateDebut()) && strtotime($dates[1]) <= strtotime($location->lireDateFin())) {
                                    $unique = false;
                                    echo "<tr class='erreur'><td colspan='5' class='text-danger'>La date de début et la date de fin sont en conflits avec une location existante.</td></tr>";
                                }
                                // Conflit date de début
                                else if (strtotime($dates[0]) >= strtotime($location->lireDateDebut()) && strtotime($dates[0]) <= strtotime($location->lireDateFin())) {
                                    $unique = false;
                                    echo "<tr class='erreur'><td colspan='5' class='text-danger'>La date de début est en conflit avec une location existante.</td></tr>";
                                }
                                // Conflit date de fin
                                else if (strtotime($dates[1]) >= strtotime($location->lireDateDebut()) && strtotime($dates[1]) <= strtotime($location->lireDateFin())) {
                                    $unique = false;
                                    echo "<tr class='erreur'><td colspan='5' class='text-danger'>La date de fin est en conflit avec une location existante.</td></tr>";
                                }
                            }
                            // Sauvegarder si aucun conflit
                            if ($unique) {
                                $disponibilite = new Disponibilite($params["idDisponibilite"], $params["idLogement"], $dates[0], $dates[1], true);
                                $modeleDisponibilite->sauvegarderDisponibilite($disponibilite);
                            }
                            else {
                                $modeleDisponibilite->reactiverDisponibilite($params["idDisponibilite"]);
                            }
                        }
                        else {
                            echo "<tr class='erreur'><td colspan='5' class='text-danger'>Données manquantes pour sauvegarder la disponibilité. Veuillez recommencer.</td></tr>";
                        }
                        $this->afficherDisponilitesLogement($params["idLogement"], $donnees["erreur"]);
                        break;

                    // Modifier disponibilité - Ajax
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
                            echo "<tr class='erreur><td colspan='5' class='text-danger'>Données manquantes pour effacer la disponibilité. Veuillez recommencer.</td></tr>";
                        }
                        break;

                    // Désactiver disponibilité - Ajax
                    case "desactiverDisponibilite" :
                        $donnees["erreur"] = "";
                        if (isset($params["idDisponibilite"]) && isset($params["idLogement"])) {
                            $modeleDisponibilite->desactiverDisponibilite($params["idDisponibilite"]);
                        }
                        else {
                            echo "<tr class='erreur><td colspan='5' class='text-danger'>Données manquantes pour effacer la disponibilité. Veuillez recommencer.</td></tr>";
                        }
                        $this->afficherDisponilitesLogement($params["idLogement"]);
                        break;

                    // Mettre à jour les diponibilités dans la page Prorpriétaire - Ajax
                    case "rafraichirDisponibilites" :
                        $donnees["erreur"] = "";
                        if (isset($params["idLogement"])) {
                            $this->afficherDisponilitesLogement($params["idLogement"]);
                        }
                        else {
                            echo "<tr class='erreur><td colspan='5' class='text-danger'>Données manquantes pour effacer la disponibilité. Veuillez recommencer.</td></tr>";
                        }
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

        // Fonction pour afficher les disponibilités d'un logement en retour de requête Ajax
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
