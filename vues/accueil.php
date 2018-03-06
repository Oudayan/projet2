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
        <main class="container-fluid background text-center">
            <div class="row">
                <div class="depart col-md-4 offset-md-4">
                    <div class="row">
                        <h2 class="col-12">Recherche par</h2>
                        <a href='index.php?Recherche&action=recherche&fiches=true' class="col-md-6"><button class='btn m-1'>Fiches</button></a>
                        <a href='index.php?Recherche&action=recherche&carte=true' class="col-md-6"><button class='btn m-1'>Carte</button></a>
                    </div>
                </div>
            </div>
        </main>