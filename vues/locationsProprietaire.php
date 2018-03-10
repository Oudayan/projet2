<?php
/** 
 * @file        locationsProprietaire.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        2 mars 2018
 * @brief       Vue partielle pour afficher toutes les demandes de location de logements pour un propriétaire
 * 
 * @details     Vue partielle locationsProprietaire.php insérée dans la page proprietaire.php par requête Ajax
 */ 
           
            if (isset($donnees["location"])) { ?>
                <div class="card card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Vous avez <?= (count($donnees["location"]) == 1 ? "une demande" : count($donnees["location"]) . " demandes") ?> de location</h3>
                        <button type="button" class="close" data-toggle="collapse" data-target="#locationsProprietaire" aria-expanded="false" aria-controls="locationsProprietaire" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logement</th>
                                <th scope="col">Date début</th>
                                <th scope="col">Date fin</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Locataire</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=0; $i<count($donnees["location"]); $i++) { ?>
                            <tr>
                                <th scope="row" class="pt-4"><?= ($i + 1) ?></th>
                                <td class="pt-4"><?= $donnees["logement"][$i]->lireNoCivique() . " " . $donnees["logement"][$i]->lireRue() . " " . $donnees["logement"][$i]->lireApt() . ", " . $donnees["logement"][$i]->lireVille() . ", " . $donnees["logement"][$i]->lireProvince() . ", " . $donnees["logement"][$i]->lirePays() . ", " . $donnees["logement"][$i]->lireCodePostal(); ?></td>
                                <td class="pt-4"><?= $donnees["location"][$i]->lireDateDebut() ?></td>
                                <td class="pt-4"><?= $donnees["location"][$i]->lireDateFin() ?></td>
                                <td class="pt-4"><?= $donnees["location"][$i]->lireCout() ?>&nbsp;$</td>
                                <td class="pt-3"><a href="index.php?Messagerie&action=afficherMessagerie"><i class="fa fa-envelope iconMessage"></i><?= $donnees["locataire"][$i]->lirepreNom() . " " . $donnees["locataire"][$i]->lireNom() ?></a></td>
                                <td>
                                    <button class="btn btn-orange m-1" onclick="approuverLocation(<?= $donnees['location'][$i]->lireIdLocation() ?>)">Approuver</button>
                                    <button class="btn btn-bleu m-1" onclick="refuserLocation(<?= $donnees['location'][$i]->lireIdLocation() ?>)">Refuser</button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
