<?php
/**
 * @file    config.php
 * @author  Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats autre example
 * @version 1.0
 * @date    9 février 2018
 * @brief   Définit les constantes et chemins 
 * @details Auto-chargement des classes et des paramètres de connexion à la base de données
 */

    // Déprécié : function __autoload($nomClasse) {
	function autoChargement($nomClasse) {
		
        $repertoires = array(
            RACINE . "controleurs/", 
            RACINE . "modeles/",
            RACINE . "vues/"
        );

		foreach ($repertoires as $rep) {
			$nomFichier = $rep . $nomClasse . ".php";
			if (file_exists($nomFichier)) {
				require_once($nomFichier);
				return;
			}
		}
	}

    spl_autoload_register('autoChargement');


	// Déclaration de la racine du projet
	define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/alouer/");
	// Déclaration des infos de connexion
	define("NOMBD", "e1795138");
	define("NOMUSAGER", "e1795138");
    define("MOTDEPASSE", "710626");
	//define("NOMBD", "alouer");
	//define("NOMUSAGER", "root");
    //define("MOTDEPASSE", "root");
	define("HEBERGEUR", "localhost");
	define("TYPEBD", "mysql");

?>