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
<main class="container background text-center">
    <h3>Ceci est la page d'accueil</h3>
    <div class="d-flex justify-content-between">
        <a href='index.php?Recherche&action=recherche'><button class='btn btn-bleu'>Recherche par carte</button></a>
        <a href='index.php?Recherche&action=recherche'><button class='btn btn-orange'>Recherche par fiches</button></a>
    </div>
</main>

<script>
    /* Source : http://callmenick.com/post/advanced-parallax-scrolling-effect 
    (function(){
        var parallax = document.querySelectorAll(".background"), speed = 0.33;
        window.onscroll = function(){
            [].slice.call(parallax).forEach(function(el,i) {
                var windowYOffset = window.pageYOffset, elBackgrounPos = "0 " + (windowYOffset * speed) + "px";
                el.style.backgroundPosition = elBackgrounPos;
            });
        };
    })();*/
</script>
