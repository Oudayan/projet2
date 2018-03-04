            <div class="modal-header">
                <h5 class="modal-title" id="modalLocationLabel">Location du logement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="location" method="post" action="index.php?Location" class="p-2">
                <div class="modal-body">
                    <aside class="location border rounded py-3 mt-2">
                        <input type="hidden" id="action" name="action" value="louerLogement">
                        <input type="hidden" id="idLogement" name="idLogement" value="<?= $donnees["logement"]->lireIdLogement(); ?>">
                        <div class="row">
                            <div class="col-6 text-center text-left my-3">
                                Prix&nbsp;:&nbsp;<br><span class="prix mt-3"><strong><?= $donnees["logement"]->lirePrix(); ?>&nbsp;$</strong></span><small> par&nbsp;nuit</small>
                            </div>
                            <div class="col-6 text-center text-right my-3">
                                Évaluation&nbsp;:&nbsp;<?= round($donnees["logement"]->lireEvaluation(), 2); ?>&nbsp;/&nbsp;5
                                <br><span class="score"><span style="width: <?= ($donnees["logement"]->lireEvaluation() / 5) * 100 ?>%"></span></span>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group date-form">
                            <label for="datesLocation">Dates&nbsp;:</label>
                            <input type="text" id="datesLocation" name="datesLocation" class="form-control">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar date-icon"></i>
                        </div>
                        <?php if (isset($donnees["location"]["nbJours"]) && $donnees["location"]["nbJours"] >= 1) { ?>
                        <section class="p-3">
                            <div class="row">
                                <label class="col-6 text-left">
                                    <?= (isset($donnees["location"]["nbJours"]) ? $donnees["location"]["nbJours"] . " X " : ""); ?>
                                    <?= (isset($donnees["location"]["prix"]) ? $donnees["location"]["prix"] . " <small>par nuit</small>" : ""); ?>
                                </label>
                                <span class="col-6 text-right">
                                    Sous-total&nbsp;: <?= (isset($donnees["location"]["sousTotal"]) ? $donnees["location"]["sousTotal"] : ""); ?>
                                </span>
                            </div>
                            <hr />
                            <?php if (isset($donnees["location"]["nettoyage"]) && $donnees["location"]["nettoyage"] > 0) { ?>
                            <div class="row">
                                <label class="col-6 text-left">Frais de nettoyage&nbsp;:</label>
                                <span class="col-6 text-right">
                                    <?= $donnees["location"]["nettoyage"] ?>
                                </span>
                            </div>
                            <hr />
                            <?php } 
                            if (isset($donnees["location"]["fraisService"]) && $donnees["location"]["fraisService"] > 0) { ?>
                            <div class="row">
                                <label class="col-6 text-left">Frais de service&nbsp;:</label>
                                <span class="col-6 text-right">
                                    <?= $donnees["location"]["fraisService"] ?>
                                </span>
                            </div>
                            <hr />
                            <?php } ?>
                            <div class="row">
                            <?php if (isset($donnees["location"]["taxe"])) { ?>
                                <h6 class="col-12 text-left">TAXES&nbsp;:</h6>
                                <?php for ($i = 0; $i<count($donnees["location"]["taxe"]); $i++) { ?>
                                    <label class="col-6 text-left"><?= $donnees["location"]["taxe"][$i] ?>&nbsp;: <?= $donnees["location"]["taux"][$i] ?>&nbsp;%</label>
                                    <span class="col-6 text-right"><?= $donnees["location"]["sousTotalTaxe"][$i] ?></span>
                                <?php }
                            } ?>
                            </div>
                            <hr />
                            <div class="row">
                                <label class="col-6 text-left"><h5>TOTAL&nbsp;:</h5></label>
                                <h5 class="col-6 text-right"><?= (isset($donnees["location"]["prixTotal"]) ? $donnees["location"]["prixTotal"] : ""); ?></h5>
                            </div>
                        </section>
                        <?php } ?>
                    </aside>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Annuler</button>
                    <?php if (isset($_SESSION["courriel"])) { ?>
                    <button type="submit" class="btn btn-orange">Louer !</button>
                    <?php }
                    else { ?>
                    <a href="index.php?Usagers&action=ajouterUsager" class="btn btn-orange">Inscrivez-vous !</a>
                    <?php } ?>
                </div>
            </form>

            <script>

                // Initialiser le sélectionneur de dates
                $('#datesLocation').daterangepicker({
                    "showDropdowns": true, 
                    "autoApply": true, 
                    "dateLimit": {
                        "months": 3
                    },
                    "locale": {
                        "direction": "ltr",
                        "format": "YYYY-MM-DD",
                        "separator": "  au  ",
                        "applyLabel": "Sélectionner",
                        "cancelLabel": "Annuler",
                        "fromLabel": "Du",
                        "toLabel": "Au",
                        "customRangeLabel": "Sur mesure",
                        "daysOfWeek": [
                            "Di",
                            "Lu",
                            "Ma",
                            "Me",
                            "Je",
                            "Ve",
                            "Sa"
                        ],
                        "monthNames": [
                            "Janvier",
                            "Février",
                            "Mars",
                            "Avril",
                            "Mai",
                            "Juin",
                            "Juillet",
                            "Août",
                            "Septembre",
                            "Octobre",
                            "Novembre",
                            "Décembre"
                        ],
                        "firstDay": 1
                    },
                    // Si la disponibilité dateDebut est assignée en $_SESSION et qu'elle dépasse ou est égale à la date d'aujourd'hui, mettre cette date comme date minimum, sinon la date minimum est égale à aujourd'hui
                    <?= (isset($_SESSION['disponibilite']['dateDebut']) && strtotime($_SESSION['disponibilite']['dateDebut']) >= strtotime(date("Y-m-d")) ? '"minDate": "' . $_SESSION['disponibilite']['dateDebut'] . '", ' : '"minDate": "' . date("Y-m-d") . '", ') ?>
                    // Si la disponibilité dateFin est assignée en $_SESSION, mettre cette date comme date maximum, sinon, pas de date maximum
                    <?= (isset($_SESSION['disponibilite']['dateFin']) ? '"maxDate": "' . $_SESSION['disponibilite']['dateFin'] . '", ' : '') ?>
                    // Si la date de début du formulaire recherche est assigné en $_SESSION, mettre cette date comme date de début de la sélection, sinon à la date d'aujourd'hui
                    <?= (isset($_SESSION['recherche']['debutLocation']) ? '"startDate": "' . $_SESSION['recherche']['debutLocation'] . '", ' : ' "startDate": "' . strtotime(date("Y-m-d")) . '", ') ?>
                    // Si la date de fin du formulaire recherche est assigné en $_SESSION, mettre cette date comme date de fin de la sélection, sinon à la date de demain
                    <?= (isset($_SESSION['recherche']['finLocation']) ? '"endDate": "' . $_SESSION['recherche']['finLocation'] . '", ' : '"endDate": "' . strtotime(date("Y-m-d")) . '", ') ?>
                    "opens": "center", 
                    "applyClass": "btn-orange"
                }, function(start, end, label) {
                    console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
                });

                $("#datesLocation").on("change", function() {
                    window.setTimeout(function() {
                        chercherPrix();
                    }, 10);
                });


            </script>