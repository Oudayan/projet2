<?php
/**
 * @file     config.php
 * @author   Oudayan Dutta
 * @version  1.0
 * @date     31 janvier 2018
 * @brief    Définit les constantes et paths 
 * @details  Auto-load des paths des répertoires et des paramètres de connexion à la base de données
 */

	function __autoload($className) {
		
        $directories = array(
            ROOT . "controllers/", 
            ROOT . "models/",
            ROOT . "views/"
        );

		foreach ($directories as $dir) {
			$fileName = $dir . $className . ".php";
			if (file_exists($fileName)) {
				require_once($fileName);
				return;
			}
		}
	}

	// déclaration de la racine du projet
	define("ROOT", $_SERVER["DOCUMENT_ROOT"] . "/ALouer/");
	// déclaration des infos de connexion
	define("DBNAME", "ALouer");
	define("USERNAME", "root");
    define("PWD", "root");
	// define("HOST", "127.0.0.1");
	define("HOST", "localhost");
	define("DBTYPE", "mysql");

?>
