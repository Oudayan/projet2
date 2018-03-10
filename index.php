<?php
/**
 * @file    index.php
 * @author  Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version 1.0
 * @date    9 février 2018
 * @brief   Page défaut du site
 * 
 * @details Inclus tous les fichiers du MVC via config.php, part une session, définit le fuseau horaire & date/heure et appelle le routeur pour rediriger au bon controlleur
 */
    
    // Inclusion des fichiers selon le répertoire et déclaration des paramètres de connexion
    require_once("config.php");
 
    // Départ de la session
    session_start();

    // Déclaration du fuseau horaire et de la date d'aujourd'hui
    date_default_timezone_set("America/New_York"); 
    $now = date("Y-m-d H:i");

    // Redirection au bon controleur
	Routeur::route();

?>