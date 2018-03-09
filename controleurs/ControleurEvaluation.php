<?php
/** 
 * @file        ControleurEvaluation.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     3.0
 * @date        7 mars 2018
 * @brief       Contrôleur pour l'évaluation d'un logement
 * @details     
 */ 

	class ControleurEvaluation extends BaseControleur {

		public function index(array $params) {

            $modeleLocation = $this->lireDAO("Location");
            $modeleLogement = $this->lireDAO("Logement");

            // Si le paramètre action existe
			if (isset($params["action"])) {

				// Switch en fonction de l'action qui nous est envoyée
				switch($params["action"]) {
					
                    // Affichage de la page de location
                    case "evaluerLogement" :
                        $this->afficherEvaluation($params);
                        break;
                    
                    case "sauvegarderEvaluation" :
                        if (isset($params["idLocation"]) && isset($params["evaluation"]) && isset($params["commentaire"])) {
                            // Sauvegarder l'évaluation et commentaire dans la table location
                            $aujourdhui = date('Y-m-d h:m:s');
                            $modeleLocation->nouvelleEvaluation($params["idLocation"], $params["evaluation"], $params["commentaire"], $aujourdhui, false);
                            // Calculer la nouvelle moyenne d'évaluations pour le logement
                            $location = $modeleLocation->lireLocationParId($params["idLocation"]);
                            $notes = $modeleLocation->lireEvaluationsParLogement($location->lireIdLogement());
                            $totalNotes = 0;
                            $cnt = 0;
                            foreach ($notes as $evaluation) {
                                $cnt++;
                                foreach($evaluation as $note) {
                                    $totalNotes += $note;
                                }
                            }
                            $moyenne = $totalNotes / $cnt;
                            // Sauvegarer la nouvelle note dans la table logement
                            $modeleLogement->nouvelleEvaluationLogement($params["idLocation"], $moyenne);
                            $donnees["succes"] = "Votre évaluation a été sauvegardée !";
                        }
                        $this->afficherEvaluation($params, $donnees);
                        break;
                        
                    default :
                        $donnees["erreur"] = "Vous n'avez pas les permissions nécessaires pour accéder à cette page.";
					    $this->afficherEvaluation($params);
                        break;

			 	} // Fin du switch
					
		  	}
		  	else {
				$this->afficherVues("accueil");
		  	}

	  	} // Fin d'index

        // Fonction pour afficher la page evaluation
        public function afficherEvaluation($params, $donnees = array()) {
            $modeleLocation = $this->lireDAO("Location");
            $modeleLogement = $this->lireDAO("Logement");
            $donnees["erreur"] = "";
            // S'assurer que l'accès à la page soit uniquement pour un usager connecté
            if (isset($_SESSION["courriel"]) && isset($params["idLocation"]) && isset($params["jeton"])) {
                $location = $modeleLocation->lireLocationParId($params["idLocation"]);
                $locataire = $location->lireIdLocataire();
                $jeton = $location->lireJeton();
                $logement = $modeleLogement->lireLogementParId($location->lireIdLogement());
                $adresse = $logement->lireNoCivique() . " " . $logement->lireRue() . " " . $logement->lireApt() . ", " . $logement->lireVille() . ", " . $logement->lireProvince() . ", " . $logement->lirePays() . ", " . $logement->lireCodePostal();
                $aujourdhui = date('Y-m-d');
                $dateLimite = date('Y-m-d', strtotime('+1 day', strtotime($location->lireDateFin())));
                // S'assurer que le bon utilisateur évalue le bon logement
                if ($locataire == $_SESSION["courriel"] && $jeton == $params["jeton"] && $location->lireValide() == 1) {
                    // S'assurer que la date limite d'évaluation ne soit pas passée
                    if ($aujourdhui <= $dateLimite) {
                        $donnees["location"] = $location;
                        $donnees["adresse"] = $adresse;
                        $donnees["jeton"] = $jeton;
                        $donnees["dateLimite"] = $dateLimite;
                    }
                    else {
                        $donnees["erreur"] = "Désolé, l'évaluation pour la location du " . $adresse . " est expirée.";
                    }
                }
                else {
                    $donnees["erreur"] = "Vous n'avez pas les permissions nécessaires pour évaluer cette location.";
                }
            }
            else {
                $donnees["erreur"] = "Vous n'avez pas les permissions nécessaires pour accéder à cette page.";
            }
            $this->afficherVues("evaluation", $donnees);
        }
    }

?>