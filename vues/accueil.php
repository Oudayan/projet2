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

        <script>
            /* Source : http://callmenick.com/post/advanced-parallax-scrolling-effect 
            (function(){
                var parallax = document.querySelectorAll(".background"), speed = 0.5;
                window.onscroll = function(){
                    [].slice.call(parallax).forEach(function(el,i) {
                        var windowYOffset = window.pageYOffset, elBackgrounPos = "0 " + (windowYOffset * speed) + "px";
                        el.style.backgroundPosition = elBackgrounPos;
                    });
                };
            })();*/
        </script>

        <script type="text/javascript">
            /*$(window).on("load resize", function() {
                var url = window.location.search.substring(1);
                var home1 = new RegExp(/&action=accueil/, "gi");
                var home2 = new RegExp(/&action=/, "gi");
                if ((home1.test(url) ^ home2.test(url)) || $(window).width() < 768) {
                    $("header").removeClass("accueil");
                }
                else {
                    $("header").addClass("accueil");
                }
            });*/
        </script>
