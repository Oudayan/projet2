<?php
/**
 * @file    Routeur.php
 * @author  Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version 1.0
 * @date    9 février 2018
 * @brief   Route vers le bon controlleur 
 * @details Route toute les requêtes URL (query string) au bon controleur 
 */
	class Routeur {

		public static function route() {
			//obtenir le controleur qui devra traiter la requête.
			$chaineRequete = $_SERVER["QUERY_STRING"];
			$esperluette = strpos($chaineRequete, "&");

			if ($esperluette === FALSE) {
				$controleur = $chaineRequete;
            }
			else {
				$controleur = substr($chaineRequete, 0, $esperluette);
            }

			// Si aucun controleur n'a été spécifié, mettre un controleur par défaut
			if ($controleur == "") {
				$controleur = "Recherche";
            }
			// Chercher la classe avec le nom du controleur
			$class = "Controleur" . $controleur ;
			if (class_exists($class)) {
				// Déclaration du controleur
				$objectControleur = new $class;
				if ($objectControleur instanceof BaseControleur) {
					$objectControleur->index($_REQUEST);
                }
				else {
					trigger_error("Controleur invalide.");
                }
			}
			else {
				trigger_error("Erreur 404! Le controleur $class n'existe pas.");
			}
		}

	}

?>
