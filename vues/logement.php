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
            <div class="d-flex justify-content-around mt-3 text-center">
                <h1><?= $donnees["logement"]->lireNoCivique() . " " . $donnees["logement"]->lireRue() . " " . $donnees["logement"]->lireApt() . ", " . $donnees["logement"]->lireVille() . ", " . $donnees["logement"]->lireProvince() . ", " . $donnees["logement"]->lirePays() . ", " . $donnees["logement"]->lireCodePostal(); ?></h1>
            </div>
            <section>
                <div id="carousel_<?= $donnees["logement"]->lireIdLogement(); ?>" class="carousel slide my-3" data-ride="carousel">
                    <ol id="carousel_pagination_<?= $donnees["logement"]->lireIdLogement(); ?>" class="carousel-indicators">
                        <li data-target="#carousel_<?= $donnees["logement"]->lireIdLogement(); ?>" data-slide-to="0"></li>
                    </ol>
                    <div id="liste_image_<?= $donnees["logement"]->lireIdLogement(); ?>" class="carousel-inner">
                        <div class="carousel-item active"></div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel_<?= $donnees["logement"]->lireIdLogement(); ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel_<?= $donnees["logement"]->lireIdLogement(); ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <script type="text/javascript">
                        // Création des images du caroussel
                        $.ajax({
                            url: 'index.php?Recherche&action=afficherImagesCarousel', 
                            type: 'POST',
                            data:  { idLogement: <?= $donnees["logement"]->lireIdLogement(); ?> }, 
                            dataType: 'json',
                            success: function(donnees) {
                                console.log(donnees);
                                $('#liste_image_' + <?= $donnees["logement"]->lireIdLogement(); ?>).empty();
                                $('#carousel_pagination_' + <?= $donnees["logement"]->lireIdLogement(); ?>).empty();
                                for (var i=0; i<donnees.length; i++) {
                                    $('<div class="carousel-item"><img class="d-block w-100" src="' + donnees[i][0] + '" alt="' + donnees[i][1] + '"><div class="carousel-caption d-none d-md-block"><h5>' + donnees[i][1] + '</h5></div></div>').appendTo('#liste_image_' + <?= $donnees["logement"]->lireIdLogement(); ?>);
                                    $('<li data-target="#carousel_<?= $donnees["logement"]->lireIdLogement(); ?>" data-slide-to="' + i + '"></li>').appendTo('#carousel_pagination_' + <?= $donnees["logement"]->lireIdLogement(); ?>);
                                    $(".carousel-item:first-child").addClass("active");
                                    $(".carousel_pagination_" + <?= $donnees["logement"]->lireIdLogement(); ?> + ":first-child").addClass("active");
                                }
                            }
                        });
                    </script>
                </div>
                <br>
            </section>
            <hr />
            <section class="p-3">
                <div>
                    <h3>Description&nbsp;:</h3>
                    <p><?= $donnees["logement"]->lireDescription(); ?></p>
                </div>
                <div class="row">
                    <div class="col-6 text-left my-3">
                        <strong>Prix&nbsp;:</strong><br><span class="prix mt-3"><strong><?= $donnees["logement"]->lirePrix(); ?>&nbsp;$</strong></span><small> par&nbsp;nuit</small>
                    </div>
                    <div class="col-6 text-right my-3">
                        <strong>Évaluation&nbsp;:</strong> <?= round($donnees["logement"]->lireEvaluation(), 2); ?>&nbsp;/&nbsp;5
                        <br><span class="score"><span style="width: <?= ($donnees["logement"]->lireEvaluation() / 5) * 100 ?>%"></span></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 p-3">
                        <strong>Frais de nettoyage&nbsp;:&nbsp;</strong>
                        <span><?= $donnees["logement"]->lireFraisNettoyage(); ?>&nbsp;$</span>
                    </div>
                    <div class="col-lg-6 p-3 text-lg-right">
                        <strong>Propriétaire&nbsp;:&nbsp;</strong>
                        <span><?= $donnees["proprietaire"]->lirepreNom() . " " . $donnees["proprietaire"]->lireNom() ?></span>
                    </div>
                </div>
            </section>
            <hr />
            <section class="p-3">
                <h3>Charactéristiques&nbsp;:</h3>
                <div class="row">
                    <div class="col-lg-6 p-3">
                        <span><strong>Type de logement&nbsp;:&nbsp;</strong><?= $donnees["typeLogement"]->lireTypeLogement(); ?></span>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span><strong>Nombre de personnes&nbsp;:&nbsp;</strong><?= $donnees["logement"]->lireNbPersonnes(); ?></span>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span><strong>Nombre de chambres&nbsp;:&nbsp;</strong><?= $donnees["logement"]->lireNbChambres(); ?></span>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span><strong>Nombre de lits&nbsp;:&nbsp;</strong><?= $donnees["logement"]->lireNbLits(); ?></span>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span><strong>Nombre de salles de bain&nbsp;:&nbsp;</strong><?= $donnees["logement"]->lireNbSalleDeBain(); ?></span>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span><strong>Nombre de demies salles de bain&nbsp;:&nbsp;</strong><?= $donnees["logement"]->lireNbDemiSalleDeBain(); ?></span>
                    </div>
                </div>
            </section>
            <hr />
            <section class="p-3">
                <h3>Services&nbsp;:</h3>
                <div class="d-flex flex-wrap justify-content-between mt-3">
                    <?= ($donnees["logement"]->lireEstStationnement() ? "<p>Stationnement</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstWifi() ? "<p>Wi-Fi</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstCuisine() ? "<p>Cuisine</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstTv() ? "<p>Télévision</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstFerARepasser() ? "<p>Fer à repasser</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstCintres() ? "<p>Cintres</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstSecheCheveux() ? "<p>Séchoir à cheveux</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstLaveuse() ? "<p>Laveuse</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstSecheuse() ? "<p>Sécheuse</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstClimatise() ? "<p>Air climatisé</p>" : "") ?>
                    <?= ($donnees["logement"]->lireEstChauffage() ? "<p>Chauffage</p>" : "") ?>
                </div>
            </section>
            <hr />
            <section class="p-3">
                <div class="row">
                    <div class="col-lg-6 p-3">
                        <div id="carteLogement">
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <div id="disponibilités my-2">
                            <h3>Disponibilités</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date début</th>
                                        <th scope="col">Date fin</th>
                                    </tr>
                                </thead>
                                <tbody id="disposLogement<?= $donnees["logement"]->lireIdLogement() ?>">
                                <?php for ($i=0; $i<count($donnees["disposLogement"]); $i++) { ?>
                                    <tr>
                                        <th scope="row" class="pt-3"><?= ($i + 1) ?></th>
                                        <td class="pt-3"><?= $donnees["disposLogement"][$i]->lireDateDebut() ?></td>
                                        <td class="pt-3"><?= $donnees["disposLogement"][$i]->lireDateFin() ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <nav class="d-flex justify-content-between my-3">
                <a href="index.php?Recherche&action=recherche"><button type="button" class="btn btn btn-bleu">Page recherche</button></a>
                <button type="button" class="btn btn btn-orange" data-toggle="modal" data-target="#modalLocation" onclick="chercherPrix()">Louez ce logement&nbsp;!</button>
            </nav>
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

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA22Ascl7tbt6eLIQVW8E_2h2rCIoFA4Aw&callback=initialize"></script>
            <script type="text/javascript">

                // Chargement des icones pointeurs
                var icones = [
                  'images/red-dot.png',
                  'images/orange-dot.png',
                  'images/yellow-dot.png',
                  'images/purple-dot.png',
                  'images/blue-dot.png',
                  'images/green-dot.png',
                  'images/pink-dot.png'
                ]

                function initialize() {
                    var latitude = <?= $donnees["logement"]->lireLatitude() ?>;
                    var longitude = <?= $donnees["logement"]->lireLongitude() ?>;
                    map = new google.maps.Map(document.getElementById("carteLogement"), {
                        zoom: 15,
                        center: new google.maps.LatLng(latitude, longitude),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        zoomControlOptions: {
                            position: google.maps.ControlPosition.LEFT_BOTTOM
                        }
                    });
                    var marqueur = new google.maps.Marker({
                        position: new google.maps.LatLng(latitude, longitude),
                        map: map,
                        icon: icones[<?= $donnees["logement"]->lireIdTypeLogement() - 1 ?>],
                        animation: google.maps.Animation.DROP
                    });
                };

            </script>
        </main>