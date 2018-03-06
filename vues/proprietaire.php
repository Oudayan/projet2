<?php
/** 
 * @file        proprietaire.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        2 mars 2018
 * @brief       
 * @details     
 */ 
?>
        <main class="container-fluid">
        <?php if (isset($_SESSION["courriel"]) && isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] != 3) { ?>
            <div id="locationsProprietaire" class="collapse my-3">
            </div>
            <h2 class="text-center text-warning">Page Propriétaire en construction !</h2>
            <?php if ($donnees["erreur"] != "") { ?>
            <section class="row text-center">
                <p><?= $donnees["succes"] ?></p>
            </section>
            <? }
            else { ?>
                <section class="row text-center p-3">
                    <p class="col-12"><?= $donnees["erreur"]; ?></p>
                    <div class="col-sm-6 offset-sm-3 d-flex justify-content-around">
                        <a href="index.php?Recherche&action=recherche" class="btn btn-orange">Retour à la page recherche</a>
                    </div>
                </section>
            <?php }
        }
        else { ?>
            <section class="row text-center p-3">
                <h3>Vous n'avez pas les permissions nécessaires pour accéder à cette page.</h3>
            </section>
        <?php } ?>
        </main>

        <script>

            // Vérifier pour des demandes de locations au chargement de la page
            $(window).on("load", function() {
                locationsAValider();
            });

            // Vérifier pour des demandes de locations à valider
            function locationsAValider() {
                $.ajax({
                    url: 'index.php?Location&action=lireLocationsAValider', 
                    type: 'POST',
                    dataType: 'html',
                    success: function(locations) {
                        $("#locationsProprietaire").empty();
                        $(locations).appendTo("#locationsProprietaire");
                        $("#locationsProprietaire").collapse('show');
                    }
                });        
            };
            
            // Approuver une demande de location
            function approuverLocation(idLocation) {
                $.ajax({
                    url: 'index.php?Location&action=approuverLocation', 
                    type: 'POST',
                    data: { 
                        "idLocation": idLocation,
                        }, 
                    dataType: 'html',
                    success: function(resultat) {
                        locationsAValider();
                    }
                });        
            };

            // Refuser une demande de location
            function refuserLocation(idLocation) {
                $.ajax({
                    url: 'index.php?Location&action=refuserLocation', 
                    type: 'POST',
                    data: { 
                        "idLocation": idLocation,
                        }, 
                    dataType: 'html',
                    success: function(resultat) {
                        locationsAValider();
                    }
                });        
            };

        </script>