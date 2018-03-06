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
    <?php if (isset($_SESSION["courriel"]) && ($_SESSION["typeUser"] == 1 || $_SESSION["typeUser"] == 2)) { ?>
        <div class="d-flex justify-content-around mt-3">
            <h1>Gestion de mes propriétés</h1>
        </div>
        <div id="locationsProprietaire" class="collapse my-3">
        </div>
        <!-- <div class="container"> -->
            <div class="row">
                <aside class="col-xl-3">
                    <div class="nav flex-column nav-pills" id="proprietaire-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="disponibilites-tab" data-toggle="pill" href="#disponibilites" role="tab" aria-controls="disponibilites" aria-selected="true">Logements - Disponibilites</a>
                        <a class="nav-link" id="locations-tab" data-toggle="pill" href="#locations" role="tab" aria-controls="locations" aria-selected="false">Historique des locations</a>
                        <a class="nav-link" id="historique-tab" data-toggle="pill" href="#historique" role="tab" aria-controls="historique" aria-selected="false">Historique des demandes de location</a>
                    </div>
                </aside>
                <section class="col-xl-9">
                    <div class="tab-content" id="proprietaire-tabContent">
                        <article class="tab-pane fade show active" id="disponibilites" role="tabpanel" aria-labelledby="disponibilites-tab">
                            <a href="index.php?Logement&action=formAjoutLogement" class="btn btn-lg btn-orange my-3">Ajouter un logement</a>
                            <?php for ($i=0; $i<count($donnees["logements"]); $i++) { ?>
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
                                            <a href="index.php?Logement&action=modifierLogement&idLogement=<?= $donnees["logements"][$i]->lireIdLogement() ?>" class="btn btn-bleu my-2">Modifier ce logement</a>
                                            <a href="index.php?Logement&action=desactiverLogement&idLogement=<?= $donnees["logements"][$i]->lireIdLogement() ?>" class="btn btn-secondary my-2">Effacer ce logement</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="pt-1">Disponibilités&nbsp;:</h5>
                                        <a href="index.php?Logement&action=formAjoutLogement" class="btn btn-sm btn-orange mb-2">Ajouter une disponibilité</a>
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
                                        <tbody>
                                        <?php for ($j=0; $j<count($donnees["dispos"][$i]); $j++) { ?>
                                            <tr>
                                                <th scope="row" class="pt-3"><?= ($j + 1) ?></th>
                                                <td class="pt-3"><?= $donnees["dispos"][$i][$j]->lireDateDebut() ?></td>
                                                <td class="pt-3"><?= $donnees["dispos"][$i][$j]->lireDateFin() ?></td>
                                                <td><button class="btn btn-bleu btn-sm" onclick="">Modifier</button></td>
                                                <td><button class="btn btn-secondary btn-sm" onclick="">Effacer</button></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
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
                                <?php for ($i=0; $i<count($donnees["locations"]); $i++) { 
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
                                <?php for ($i=0; $i<count($donnees["locations"]); $i++) { 
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
                                } ?>
                                </tbody>
                            </table>
                        </article>
                    </div>
                </section>
            </div>
        <!-- </div> -->
        <?php }
        else { ?>
            <section class="row">
                <h3 class="text-center m-3">Vous n'avez pas les permissions nécessaires pour accéder à cette page.</h3>
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
