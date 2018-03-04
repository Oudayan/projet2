<?php
/** 
 * @file        locationsProprietaire.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        2 mars 2018
 * @brief       Vue partielle pour afficher toutes les demandes de location de logements pour un propriétaire
 * @details     Vue partielle locationsProprietaire.php insérée dans la page proprietaire.php par requête Ajax
 */ 
?>            
            <div id="locationsProprietaire" class="collapse">
            <?php if (isset($donnees["location"])) { ?>
                <div class="card card-body">
                    <h3>Vous avez <?= (count($donnees["location"]) == 1 ? "une demande" : count($donnees["location"]) . " demandes") ?> de location</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logement</th>
                                <th scope="col">Date début</th>
                                <th scope="col">Date fin</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=0; $i<count($donnees["location"]); $i++) { ?>
                            <tr>
                                <th scope="row"><?= ($i + 1) ?></th>
                                <td><?= $donnees["location"][$i]["logement"]->lireNoCivique() . " " . $donnees["location"][$i]["logement"]->lireRue() . " " . $donnees["location"][$i]["logement"]->lireApt() . ", " . $donnees["location"][$i]["logement"]->lireVille() . ", " . $donnees["location"][$i]["logement"]->lireProvince() . ", " . $donnees["location"][$i]["logement"]->lirePays() . ", " . $donnees["location"][$i]["logement"]->lireCodePostal(); ?></td>
                                <td><?= $donnees["location"][$i]->lireDateDebut() ?></td>
                                <td><?= $donnees["location"][$i]->lireDateFin() ?></td>
                                <td><?= $donnees["location"][$i]->lireCout() ?></td>
                                <td><a href="index.php?Location&action=approuverLocation" class="btn btn-success m-1">Approuver</a><a href="index.php?Location&action=refuserLocation" class="btn btn-danger m-1">Refuser</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            </div>
