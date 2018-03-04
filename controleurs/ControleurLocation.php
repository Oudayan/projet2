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
            $modeleDisponibilite = $this->lireDAO("Disponibilite");
            $modeleOption = $this->lireDAO("Option");

            // Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page de location
                    case "afficherLocation" :
                        if (isset($params["idLogement"])) {
                            // Chercher les données du logement
                            $donnees["logement"] = $modeleLogement->lireLogementParId($params["idLogement"]);
                            // Chercher les dates de location du logement
                            $dispos = $modeleDisponibilite->lireDisponibilitesParLogement($params["idLogement"]);
                            foreach ($dispos as $dispo) {
                                // Sélectionner la plage de disponibilité du logement correspondante au formulaire recherche
                                if ($dispo->lireDateDebut() <= $_SESSION["recherche"]["debutLocation"] && $dispo->lireDateFin() >= $_SESSION["recherche"]["finLocation"]) {
                                    // Assigner les valeurs de dates minimum et maximum selon les dispos du logement
                                    $_SESSION["disponibilite"]["dateDebut"] = $dispo->lireDateDebut();
                                    $_SESSION["disponibilite"]["dateFin"] = $dispo->lireDateFin();
                                }
                            }
                            // Si de nouvelles dates de locations sont entrées, les sauvegarder en $_SESSION
                            if (isset($params["datesLocation"]) && $params["datesLocation"] != "") {
                                $dates = explode("  au  ", $params["datesLocation"]);
                                $_SESSION["recherche"]["debutLocation"] = $dates[0];
                                $_SESSION["recherche"]["finLocation"] = $dates[1];
                                $_SESSION['recherche']['datesLocation'] = $dates[0] . "  au  " . $dates[1];
                            }
                            // Si aucune date est en $_SESSION, assigner les valeurs défaut aujourd'hui à demain
                            else if (!isset($_SESSION['recherche']['datesLocation'])) {
                                $aujourdhui = new DateTime();
                                $_SESSION["recherche"]["debutLocation"] = $aujourdhui;
                                $demain = new DateTime("+1 day");
                                $_SESSION["recherche"]["finLocation"] = $demain;
                                $_SESSION['recherche']['datesLocation'] = $aujourdhui . "  au  " . $demain;
                            }
                            // Calculer le nombre de jours de location
                            $dateDebut = strtotime($_SESSION["recherche"]["debutLocation"]);
                            $dateFin = strtotime($_SESSION["recherche"]["finLocation"]);
                            $donnees["location"]["nbJours"] =  round(($dateFin - $dateDebut) / 86400);
                            // Calculer le prix sans taxes
                            $sousTotal = $donnees["location"]["nbJours"] * $donnees["logement"]->lirePrix();
                            // Chercher les frais de nettoyage du logement
                            $nettoyage = $donnees["logement"]->lireFraisNettoyage();
                            // Chercher les frais de service dans la table options
                            $fraisService = 0;
                            $fraisServiceLogement = $modeleOption->lireOptionParId(2);
                            $fraisService = $fraisServiceLogement->lireValeursOption();
                            // Calculer le prix total
                            $prixTotal = $sousTotal + $nettoyage + $fraisService;
                            // Chercher les taxes dans la table options
                            $valeursOption = $modeleOption->lireOptionParId(3);
                            $taxes = unserialize($valeursOption->lireValeursOption());
                            $cnt = 0;
                            foreach ($taxes as $taxe) {
                                if ($taxe[0] == $donnees["logement"]->lirePays() || $taxe[0] == $donnees["logement"]->lireProvince()) {
                                    $donnees["location"]["taxe"][$cnt] = $taxe[1];
                                    $donnees["location"]["taux"][$cnt] = $taxe[2];
                                    $donnees["location"]["sousTotalTaxe"][$cnt] = $this->formatMonnaie($prixTotal * $taxe[2] / 100);
                                    $prixTotal = $prixTotal * (100 + $taxe[2]) / 100;
                                    $cnt++;
                                }
                            }
                        }
                        $donnees["location"]["prix"] = $this->formatMonnaie($donnees["logement"]->lirePrix());
                        $donnees["location"]["sousTotal"] = $this->formatMonnaie($sousTotal);
                        $donnees["location"]["nettoyage"] = $this->formatMonnaie($nettoyage);
                        $donnees["location"]["fraisService"] = $this->formatMonnaie($fraisService);
                        $donnees["location"]["prixTotal"] = $this->formatMonnaie($prixTotal);
                        $_SESSION["location"]["prixTotal"] = $prixTotal;
						$this->afficherVues("location", $donnees, false);
                        break;

                    // Louer un logement - Gestion des disponibilités
					case "louerLogement" :
                        if (isset($_SESSION["courriel"])) {
                            if (isset($params["idLogement"]) && isset($params["datesLocation"])) {
                                $dates = explode("  au  ", $params["datesLocation"]);
                                // Chercher toutes les disponibilités du logement
                                $dispos = $modeleDisponibilite->lireDisponibilitesParLogement($params["idLogement"]);
                                foreach ($dispos as $dispo) {
                                    if ($dates[0] >= $dispo->lireDateDebut() && $dates[1] <= $dispo->lireDateFin()) {
                                        // Désactiver la diponibilité
                                        $modeleDisponibilite->desactiverDisponibilite($dispo->lireIdDisponibilite());
                                        // Dates début et dates fin sont différentes des dates dispos
                                        if ($dates[0] > $dispo->lireDateDebut() && $dates[1] < $dispo->lireDateFin()) {
                                            $dispoDebut1 = $dispo->lireDateDebut();
                                            $dispoFin1 = date('Y-m-d', strtotime('-1 day', strtotime($dates[0])));
                                            $dispoDebut2 = date('Y-m-d', strtotime('+1 day', strtotime($dates[1])));
                                            $dispoFin2 = $dispo->lireDateFin();
                                            // Insérer les disponibilités d'une durée de plus d'un jour (enlever les 0 nuit)
                                            if ($dispoDebut1 != $dispoFin1) {
                                                $nouvelleDispo1 = new Disponibilite(0, $params["idLogement"], $dispoDebut1, $dispoFin1, true);
                                                $modeleDisponibilite->sauvegarderDisponibilite($nouvelleDispo1);
                                            }
                                            if ($dispoDebut2 != $dispoFin2) {
                                                $nouvelleDispo2 = new Disponibilite(0, $params["idLogement"], $dispoDebut2, $dispoFin2, true);
                                                $modeleDisponibilite->sauvegarderDisponibilite($nouvelleDispo2);
                                            }
                                        }
                                        // Dates début identique mais dates fin différentes
                                        else if ($dates[0] == $dispo->lireDateDebut() && $dates[1] < $dispo->lireDateFin()) {
                                            $dispoDebut1 = date('Y-m-d', strtotime('+1 day', strtotime($dates[1])));
                                            $dispoFin1 = $dispo->lireDateFin();
                                            $nouvelleDispo = new Disponibilite(0, $params["idLogement"], $dispoDebut1, $dispoFin1);
                                            $modeleDisponibilite->sauvegarderDisponibilite($nouvelleDispo);
                                        }
                                        // Dates fin identique mais dates début différentes
                                        else if ($dates[0] > $dispo->lireDateDebut() && $dates[1] == $dispo->lireDateFin()) {
                                            $dispoDebut1 = $dispo->lireDateDebut();
                                            $dispoFin1 = date('Y-m-d', strtotime('-1 day', strtotime($dates[0])));
                                            $nouvelleDispo = new Disponibilite(0, $params["idLogement"], $dispoDebut1, $dispoFin1);
                                            $modeleDisponibilite->sauvegarderDisponibilite($nouvelleDispo);
                                        }
                                    }

                                }
                                $logement = $modeleLogement->lireLogementParId($params["idLogement"]);
                                $proprietaire = $logement->lireCourriel();
                                $maintenant = date('Y-m-d H:m:s');
                                $location = new Location(0, $params["idLogement"], $proprietaire, $_SESSION["courriel"], $dates[0], $dates[1], $maintenant, $_SESSION["location"]["prixTotal"], 0, NULL, NULL, NULL, NULL, NULL, NULL);
                                $modeleLocation->sauvegarderLocation($location);
                                
                                $this->afficherVues("paiement");
                            }
                        }
                        else {
                            echo "Vous n'avez pas les permissions nécessaires pour effectuer cette action";
                        }
                        break;

                    // Afficher les demandes de location pour un propriétaire ou admin
					case "lireLocationsAValider" :
                        if (isset($_SESSION["courriel"]) && isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] != 3) {
                            $locations = $modeleLocation->lireLocationsAValider($_SESSION["courriel"]);
                            for ($i = 0; $i < count($locations); $i++) {
                                if ($locations[$i]->lireDateDebut() > date('Y-m-d')) {
                                    $donnees["location"][$i] = $modeleLocation->lireLocationParId($locations[$i]->lireIdLocation());
                                    $donnees["location"][$i]["logement"] = $modeleLogement->lireLogementParId($locations[$i]->lireIdLogement()]);
                                }
                                else {
                                    // Demande expirée - mettre valide=3 : 
                                    $modeleLocation->validerLocation($locations[$i]->lireIdLocation(), 3);
                                }
                            }
                            $this->afficherVues("locationProprietaire");
                        }
                        else {
                            $donnees["erreur"] = "Vous n'avez pas les permissions nécessaires pour effectuer cette action";
                        }
                        break;
                    
                    // Accepter une location
					case "approuverLocation" :
                            $modeleLocation->sauvegarderLocation($location); 
                        break;
                    
                    // Accepter une location
					case "refuserLocation" :

                        break;
                    
                    default :
					    $this->afficherVues("location");
                        break;

			 	}
					
		  	}
		  	else {
				$this->afficherVues("accueil");
 		  	
		  	}

	  	} // Fin du switch

        public function formatMonnaie($nombre) {
            if (is_numeric($nombre)) {
                $nombre = number_format(ceil($nombre / 0.01) * 0.01, 2, '.', ' ') . " $";
                return $nombre;
            }
            return false;
        }

    }

?>