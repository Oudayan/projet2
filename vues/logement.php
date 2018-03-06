<?php
/** 
 * @file        logement.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        10 février 2018
 * @brief       
 * @details     
 */ 
?>
<main class="container">
    <h2 class="text-center text-warning">Page en construction !</h2>

    <button type="button" class="btn btn-lg btn-orange" data-toggle="modal" data-target="#modalLocation" onclick="chercherPrix()">Louez ce logement&nbsp;!</button>
    <a href="index.php?Recherche&action=recherche"><button type="button" class="btn btn-lg btn-bleu">Retour à la page recherche</button></a>

    <div class="modal fade" id="modalLocation" tabindex="-1" role="dialog" aria-labelledby="modalLocationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="modalLocation-content" class="modal-content">
            </div>
        </div>
    </div>

    <script>
        
        function chercherPrix() {
            $.ajax({
                url: 'index.php?Location&action=afficherLocation', 
                type: 'POST',
                data:  { 
                    <?= "idLogement: " . $donnees["logement"]->lireIdLogement() . ", "; ?> 
                    datesLocation: $("#datesLocation").val(), 
                }, 
                dataType: 'html',
                success: function(donnees) {
                    $("#modalLocation-content").empty();
                    $("#modalLocation-content").html(donnees);
                }
            });
        }
        
    </script>

</main>