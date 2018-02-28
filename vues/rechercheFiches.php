                <?php if ($donnees["logements"]) {
                    if (isset($donnees["succes"])) { ?>
                    <div id="alerte-resultat" class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><?= $donnees["succes"] ?></strong> 
                    </div> 
                    <?php }
                    foreach ($donnees["logements"] as $logement) { ?>
                        <article id="fiche_<?= $logement->lireIdLogement(); ?>" class="row border rounded text-center m-2 p-2">
                            <div class="col-lg-4">
                                <div id="carousel_<?= $logement->lireIdLogement(); ?>" class="carousel slide mb-5" data-ride="carousel">
                                    <ol id="carousel_pagination_<?= $logement->lireIdLogement(); ?>" class="carousel-indicators">
                                        <li data-target="#carousel_<?= $logement->lireIdLogement(); ?>" data-slide-to="0"></li>
                                    </ol>
                                    <div id="liste_image_<?= $logement->lireIdLogement(); ?>" class="carousel-inner">
                                        <div class="carousel-item active"><img class="d-block w-100"  src="<?= $logement->lirePremierePhoto(); ?>"><div class="carousel-caption d-none d-md-block"><h5>Façade</h5></div></div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel_<?= $logement->lireIdLogement(); ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel_<?= $logement->lireIdLogement(); ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <script type="text/javascript">
                                        // Création des images du caroussel
                                        $.ajax({
                                            url: 'index.php?Recherche&action=afficherImagesCarousel', 
                                            type: 'POST',
                                            data:  { idLogement: <?= $logement->lireIdLogement(); ?> }, 
                                            dataType: 'json',
                                            success: function(donnees) {
                                                console.log(donnees);
                                                $('#liste_image_' + <?= $logement->lireIdLogement(); ?>).empty();
                                                $('#carousel_pagination_' + <?= $logement->lireIdLogement(); ?>).empty();
                                                for (var i=0; i<donnees.length; i++) {
                                                    $('<div class="carousel-item"><img class="d-block w-100" src="' + donnees[i][0] + '" alt="' + donnees[i][1] + '"><div class="carousel-caption d-none d-md-block"><h5>' + donnees[i][1] + '</h5></div></div>').appendTo('#liste_image_' + <?= $logement->lireIdLogement(); ?>);
                                                    $('<li data-target="#carousel_<?= $logement->lireIdLogement(); ?>" data-slide-to="' + i + '"></li>').appendTo('#carousel_pagination_' + <?= $logement->lireIdLogement(); ?>);
                                                    $(".carousel-item:first-child").addClass("active");
                                                    $(".carousel_pagination_" + <?= $logement->lireIdLogement(); ?> + ":first-child").addClass("active");
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-8 description-fiche">
                                <a href="index.php?Logement&action=afficherLogement">
                                    <div class="row">
                                        <h4 class="titre-fiche col-12 p-2"><?= $logement->lireNoCivique() . " " . $logement->lireRue() . " " . $logement->lireApt() . ", " . $logement->lireVille() . ", " . $logement->lireProvince(); ?></h4>
                                        <div class="col-sm-12 text-left my-3">
                                            <?= $logement->lireDescription(); ?><br>
                                        </div>
                                        <div class="col-sm-12 text-left my-1">
                                        <?php foreach ($donnees["typesLogements"] as $typesLogements) { 
                                            if ($typesLogements->lireIdTypeLogement() == $logement->lireIdTypeLogement()) {
                                                echo "Type de logement&nbsp;:&nbsp;" . $typesLogements->lireTypeLogement();
                                            }
                                        } ?>
                                        </div>
                                        <div class="col-sm-6 text-center text-sm-left my-3">
                                            Prix&nbsp;:&nbsp;<br><span class="prix mt-3"><strong><?= $logement->lirePrix(); ?>&nbsp;$</strong></span><small> par&nbsp;nuit</small>
                                        </div>
                                        <div class="col-sm-6 text-center text-sm-right my-3">
                                            Évaluation&nbsp;:&nbsp;<?= round($logement->lireEvaluation(), 2); ?>&nbsp;/&nbsp;5
                                            <br><span class="score"><span style="width: <?= ($logement->lireEvaluation() / 5) * 100 ?>%"></span></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    <?php }
                }
                else { ?>
                    <div class="text-center m-5 py-5">
                        <h3 class="m-5 py-5">Désolé, il n'y a aucun logement trouvé avec ces critères de&nbsp;recherche.</h3>
                    </div>
                <?php } ?>

                    <script>
                    	window.setTimeout(function() {
                            $("#alerte-resultat").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                        }, 4000);

                    </script>
