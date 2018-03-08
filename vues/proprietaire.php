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
            <div class="d-flex justify-content-around mt-3">
                <h1>Gestion de mes propriétés</h1>
            </div>
            <?php if (isset($_SESSION["courriel"]) && ($_SESSION["typeUser"] == 1 || $_SESSION["typeUser"] == 2)) { ?>
                <div id="locationsProprietaire" class="collapse my-3">
                </div>
                <div class="row">
                    <aside class="col-xl-3">
                        <nav class="nav flex-column nav-pills v-pills-tab" id="proprietaire-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link py-3 active" id="disponibilites-tab" data-toggle="pill" href="#disponibilites" role="tab" aria-controls="disponibilites" aria-selected="true">Logements - Disponibilites</a>
                            <a class="nav-link py-3" id="locations-tab" data-toggle="pill" href="#locations" role="tab" aria-controls="locations" aria-selected="false">Locations courantes</a>
                            <a class="nav-link py-3" id="historique-tab" data-toggle="pill" href="#historique" role="tab" aria-controls="historique" aria-selected="false">Historique des demandes de location</a>
                        </nav>
                    </aside>
                    <section class="col-xl-9 mt-2">
                        <div class="tab-content" id="proprietaire-tabContent">
                            <article class="tab-pane fade show active" id="disponibilites" role="tabpanel" aria-labelledby="disponibilites-tab">
                                <a href="index.php?Logement&action=formAjoutLogement" class="btn btn-lg btn-orange my-3">Ajouter un logement</a>
                                <?php if (isset($donnees["logements"])) { 
                                    for ($i=0; $i<count($donnees["logements"]); $i++) { ?>
                                    <div class="row border rounded mx-1 my-3 p-3">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class=""><?= $donnees["logements"][$i]->lireNoCivique() . " " . $donnees["logements"][$i]->lireRue() . " " . $donnees["logements"][$i]->lireApt() . ", " . $donnees["logements"][$i]->lireVille() . ", " . $donnees["logements"][$i]->lireProvince() . ", " . $donnees["logements"][$i]->lirePays() . ", " . $donnees["logements"][$i]->lireCodePostal(); ?></h5>
                                                </div>
                                                <div class="col-12">
                                                    <img src="<?= $donnees["photos"][$i][0]->lireCheminPhoto() ?>">
                                                </div>
                                                <div class="col-12 d-flex flex-col justify-content-between align-content-center">
                                                   <!-- <a href="index.php?Logement&action=modifierLogement&idLogement=<?= $donnees["logements"][$i]->lireIdLogement() ?>" class="btn btn-bleu my-2">Modifier ce logement</a> -->
                                                   <a href="index.php?Logement&action=formAjoutLogement&idLogement=<?= $donnees["logements"][$i]->lireIdLogement() ?>" class="btn btn-bleu my-2">Modifier ce logement</a>
                                                    <a href="index.php?Logement&action=desactiverLogement&idLogement=<?= $donnees["logements"][$i]->lireIdLogement() ?>" class="btn btn-secondary my-2">Effacer ce logement</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="pt-1">Disponibilités&nbsp;:</h5>
                                                <button type="button" class="btn btn-sm btn-orange mb-2" onclick="ajouterDispo(<?= $donnees["logements"][$i]->lireIdLogement() ?>)">Ajouter une disponibilité</button>
                                            </div>
                                            <div class="collapse" id="dispos<?= $donnees["logements"][$i]->lireIdLogement() ?>">
                                                <div class="card card-block">
                                                    <div class="form-group date-form m-2">
                                                        <div class="d-flex justify-content-between">
                                                            <label class="pt-1" for="datesDisposLogement<?= $donnees["logements"][$i]->lireIdLogement() ?>">Dates de disponibilité&nbsp;:</label>
                                                            <button type="button" class="close mb-2" data-toggle="collapse" data-target="#dispos<?= $donnees["logements"][$i]->lireIdLogement() ?>" aria-expanded="false" aria-controls="dispos<?= $donnees["logements"][$i]->lireIdLogement() ?>" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <input type="hidden" class="idDispoLogement" id="idDispoLogement<?= $donnees["logements"][$i]->lireIdLogement() ?>" name="idDispo" value="<?= $donnees["logements"][$i]->lireIdLogement() ?>">
                                                        <input type="text" id="datesDisposLogement<?= $donnees["logements"][$i]->lireIdLogement() ?>" name="datesdispos" class="datesDisposLogement form-control">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar date-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Date début</th>
                                                        <th scope="col">Date fin</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="disposLogement<?= $donnees["logements"][$i]->lireIdLogement() ?>">
                                                <?php for ($j=0; $j<count($donnees["dispos"][$i]); $j++) { ?>
                                                    <tr>
                                                        <th scope="row" class="pt-3"><?= ($j + 1) ?></th>
                                                        <td class="pt-3"><?= $donnees["dispos"][$i][$j]->lireDateDebut() ?></td>
                                                        <td class="pt-3"><?= $donnees["dispos"][$i][$j]->lireDateFin() ?></td>
                                                        <td><button class="btn btn-bleu btn-sm" onclick="modifierDispo(<?= $donnees["dispos"][$i][$j]->lireIdDisponibilite() ?>, <?= $donnees["logements"][$i]->lireIdLogement() ?>)">Modifier</button></td>
                                                        <td><button class="btn btn-secondary btn-sm"onclick="effacerDispo(<?= $donnees["dispos"][$i][$j]->lireIdDisponibilite() ?>, <?= $donnees["logements"][$i]->lireIdLogement() ?>)">Effacer</button></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            </article>
                            <article class="tab-pane fade" id="locations" role="tabpanel" aria-labelledby="locations-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logement</th>
                                            <th scope="col">Date début</th>
                                            <th scope="col">Date fin</th>
                                            <th scope="col">Locataire</th>
                                            <th scope="col">Évaluation</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($donnees["locations"])) {
                                        for ($i=0; $i<count($donnees["locations"]); $i++) { 
                                            if ($donnees["locations"][$i]->lireValide() == 0 || $donnees["locations"][$i]->lireValide() == 1) { ?>
                                            <tr>
                                                <th scope="row" class="pt-4"><?= (count($donnees["locations"]) - $i) ?></th>
                                                <td class="pt-4"><?= $donnees["logement"][$i]->lireNoCivique() . " " . $donnees["logement"][$i]->lireRue() . " " . $donnees["logement"][$i]->lireApt() . ", " . $donnees["logement"][$i]->lireVille() . ", " . $donnees["logement"][$i]->lireProvince() . ", " . $donnees["logement"][$i]->lirePays() . ", " . $donnees["logement"][$i]->lireCodePostal(); ?></td>
                                                <td class="pt-4"><?= $donnees["locations"][$i]->lireDateDebut() ?></td>
                                                <td class="pt-4"><?= $donnees["locations"][$i]->lireDateFin() ?></td>
                                                <td class="pt-3"><a href="index.php?Messagerie&action=afficherMessagerie"><i class="fa fa-envelope iconMessage"></i><?= $donnees["locataire"][$i]->lirepreNom() . " " . $donnees["locataire"][$i]->lireNom() ?></a></td>
                                                <td class="pt-2">
                                                <?php if ($donnees["locations"][$i]->lireEvaluation() !== NULL) {
                                                    echo round($donnees["locations"][$i]->lireEvaluation(), 2); ?>&nbsp;/&nbsp;5 <span class="score"><span style="width: <?= ($donnees["locations"][$i]->lireEvaluation() / 5) * 100 ?>%"></span></span>
                                                <?php }
                                                else { ?>
                                                    Aucune
                                                <?php } ?>
                                                </td>
                                                <td><button class="btn btn-secondary btn-sm" onclick="" <?= (strtotime($donnees["locations"][$i]->lireDateDebut()) <= strtotime(date('Y-m-d')) ? "disabled" : "") ?>>Annuler</button></td>
                                            </tr>
                                            <?php }
                                        }
                                    } ?>
                                    </tbody>
                                </table>
                            </article>
                            <article class="tab-pane fade" id="historique" role="tabpanel" aria-labelledby="historique-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logement</th>
                                            <th scope="col">Date début</th>
                                            <th scope="col">Date fin</th>
                                            <th scope="col">Locataire</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($donnees["locations"])) {
                                        for ($i=0; $i<count($donnees["locations"]); $i++) { 
                                            if ($donnees["locations"][$i]->lireValide() != 0 && $donnees["locations"][$i]->lireValide() != 1) { ?>
                                            <tr>
                                                <th scope="row" class="pt-4"><?= (count($donnees["locations"]) - $i) ?></th>
                                                <td class="pt-4"><?= $donnees["logement"][$i]->lireNoCivique() . " " . $donnees["logement"][$i]->lireRue() . " " . $donnees["logement"][$i]->lireApt() . ", " . $donnees["logement"][$i]->lireVille() . ", " . $donnees["logement"][$i]->lireProvince() . ", " . $donnees["logement"][$i]->lirePays() . ", " . $donnees["logement"][$i]->lireCodePostal(); ?></td>
                                                <td class="pt-4"><?= $donnees["locations"][$i]->lireDateDebut() ?></td>
                                                <td class="pt-4"><?= $donnees["locations"][$i]->lireDateFin() ?></td>
                                                <td class="pt-3"><a href="index.php?Messagerie&action=afficherMessagerie"><i class="fa fa-envelope iconMessage"></i><?= $donnees["locataire"][$i]->lirepreNom() . " " . $donnees["locataire"][$i]->lireNom() ?></a></td>
                                                <td class="pt-4">
                                                <?=  ($donnees["locations"][$i]->lireValide() == 0 ? "À valider" : 
                                                ($donnees["locations"][$i]->lireValide() == 1 ? "Acceptée" : 
                                                ($donnees["locations"][$i]->lireValide() == 2 ? "Refusée" : 
                                                ($donnees["locations"][$i]->lireValide() == 3 ? "Expirée" : 
                                                ($donnees["locations"][$i]->lireValide() == 4 ? "Déclinée (Multiple)" : ""))))) ?>
                                                </td>
                                                <td><button class="btn btn-secondary btn-sm" onclick="" <?= (strtotime($donnees["locations"][$i]->lireDateDebut()) <= strtotime(date('Y-m-d')) ? "disabled" : "") ?>>Annuler</button></td>
                                            </tr>
                                            <?php }
                                        }
                                    } ?>
                                    </tbody>
                                </table>
                            </article>
                        </div>
                    </section>
                </div>
            <?php }
            else { ?>
                <section class="row">
                    <h3 class="text-center m-3">Vous n'avez pas les permissions nécessaires pour accéder à cette page.</h3>
                </section>
            <?php } ?>
        </main>

        <script>

        // Initialiser le sélectionneur de dates
        $('.datesDisposLogement').daterangepicker({
            "showDropdowns": true, 
            "autoApply": true, 
            "dateLimit": {
                "months": 3
            },
            "locale": {
                "direction": "ltr",
                "format": "YYYY-MM-DD",
                "separator": "  au  ",
                "applyLabel": "Appliquer",
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
            // Date minimum est égale à aujourd'hui
            "minDate": moment().format(), 
            "isInvalidDate": function(date) {
                return true;
            },
            "startDate": moment().format(),
            "endDate": moment().add(13, 'days').format(),
            "applyClass": "btn-orange",
            "opens": "left"
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });


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
                        rafraichirDisponibilites();
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

            // Rafraîchir les disponibilites
            function rafraichirDisponibilites() {
                $(".idDispoLogement").each(function() {
                    var idLogement = $(this).val();
                    $.ajax({
                        url: 'index.php?Proprietaire&action=rafraichirDisponibilites',
                        type: 'POST',
                        data: {
                            "idLogement": idLogement,
                        },
                        dataType: 'html',
                        success: function(dispos) {
                            $("#disposLogement" + idLogement).empty();
                            $(dispos).appendTo("#disposLogement" + idLogement);
                        }
                    });
                });
            };


            // Ajouter un disponibilité au sélectionneur de date
            function ajouterDispo(idLogement) {
                $("#idDispoLogement" + idLogement).val(0);
                $("#datesDisposLogement" + idLogement).val(moment().format().substring(0, 10) + "  au  " + moment().add(13, 'days').format().substring(0, 10));
                $("#datesDisposLogement" + idLogement).data('daterangepicker').setStartDate(moment().format());
                $("#datesDisposLogement" + idLogement).data('daterangepicker').setEndDate(moment().add(13, 'days').format());
                $("#dispos" + idLogement).collapse('show');
            };

            // Sauvegarder disponibilité
            $(document).on("change", ".datesDisposLogement", function() {
                var idDisponibilite = $(this).prev().val();
                var idLogement = $(this).attr('id').substring(19, 100);
                var datesDispo = $(this).val();
                $.ajax({
                    url: 'index.php?Proprietaire&action=sauvegarderDisponibilite',
                    type: 'POST',
                    data: {
                        "idDisponibilite": idDisponibilite,
                        "idLogement": idLogement,
                        "datesDispo": datesDispo,
                    },
                    dataType: 'html',
                    success: function(dispos) {
                        $("#disposLogement" + idLogement).empty();
                        $(dispos).appendTo("#disposLogement" + idLogement);
                        $("#dispos" + idLogement).collapse("hide");
                    }
                });      
            });

            // Modifer un disponibilité en la rajoutant au sélectionneur de date
            function modifierDispo(idDisponibilite, idLogement) {
                $.ajax({
                    url: 'index.php?Proprietaire&action=modifierDisponibilite',
                    type: 'POST',
                    data: {
                        "idDisponibilite": idDisponibilite,
                        "idLogement": idLogement,
                    },
                    dataType: 'json',
                    success: function(dispo) {
                        $("#idDispoLogement" + idLogement).val(dispo.id);
                        $("#datesDisposLogement" + idLogement).val(dispo.dateDebut + "  au  " + dispo.dateFin);
                        $("#datesDisposLogement" + idLogement).data('daterangepicker').setStartDate(dispo.dateDebut);
                        $("#datesDisposLogement" + idLogement).data('daterangepicker').setEndDate(dispo.dateFin);
                        $("#dispos" + idLogement).collapse("show");
                    }
                });            
            };

            // Désactiver un disponibilité
            function effacerDispo(idDisponibilite, idLogement) {
                $.ajax({
                    url: 'index.php?Proprietaire&action=desactiverDisponibilite',
                    type: 'POST',
                    data: {
                        "idDisponibilite": idDisponibilite,
                        "idLogement": idLogement,
                    },
                    dataType: 'html',
                    success: function(dispos) {
                        $("#disposLogement" + idLogement).empty();
                        $(dispos).appendTo("#disposLogement" + idLogement);
                    }
                });            
            };

        </script>
