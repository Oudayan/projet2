<?php
/** 
 * @file        accueil.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        10 février 2018
 * @brief       Page d'accueil du site
 * @details     Liens pour recherche de logements par carte ou par liste
 */ 
?>
<main class="container text-center">
    <h3>Ceci est la page d'accueil</h3>
    <div class="d-flex justify-content-between">
        <a href='index.php?Recherche&action=recherche'><button class='btn btn-bleu'>Recherche par carte</button></a>
        <a href='index.php?Recherche&action=RechercheFiches'><button class='btn btn-orange'>Recherche par fiches</button></a>
    </div>
</main>