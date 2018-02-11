<?php
/**
 * @file     config.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats
 * @version  1.0
 * @date     8 février 2018
 * @brief    Définit les constantes et paths 
 * @details  Auto-load des paths des répertoires et des paramètres de connexion à la base de données
 */

	function __autoload($nomClasse) {
		
        $repertoires = array(
            RACINE . "controleurs/", 
            RACINE . "modeles/",
            RACINE . "vues/"
        );

		foreach($repertoires as $rep)
		{
			$nomFichier = $rep . $nomClasse . ".php";
			if(file_exists($nomFichier))
			{
				require_once($nomFichier);
				return;
			}
		}
	}

	// déclaration de la racine du projet
	define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/alouer/");
	// déclaration des infos de connexion
	define("DBNAME", "e1795138");
	define("USERNAME", "e1795138");
    define("PWD", "710626");
	// define("HOST", "127.0.0.1");
	define("HOST", "localhost");
	define("DBTYPE", "mysql");

?>
