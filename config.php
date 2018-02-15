<?php
/**
 * @file    config.php
 * @author  Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version 1.0
 * @date    9 février 2018 dernière révision 
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
	
	define("HEBERGEUR", "localhost");
	define("TYPEBD", "mysql");
	
    if ($_SERVER["HTTP_HOST"]=="e1795138.webdev.cmaisonneuve.qc.ca")
	{
	// Déclaration des infos de connexion
		define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/alouer/");
		define("NOMBD", "e1795138");
		define("NOMUSAGER", "e1795138");
		define("MOTDEPASSE", "710626");
	}
	else if ($_SERVER["HTTP_HOST"]=="localhost:8888")
	{
		define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/projet2/");	
		define("NOMBD", "alouer");
		define("NOMUSAGER", "root");
		define("MOTDEPASSE", "root");
	}
	else 
	{
		define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/projet2/");	
		define("NOMBD", "alouer");
		define("NOMUSAGER", "root");
		define("MOTDEPASSE", "");
	}
?>