<?php
/** 
 * @file        paiement.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        2 mars 2018
 * @brief       
 * @details     
 */ 
?>
        <main class="container">
            <div class="d-flex justify-content-around mt-3">
                <h1>Méthode de paiement</h1>
            </div>
            <h2 class="text-center text-warning">Page en construction !</h2>
            <?php if (isset($donnees["succes"])) { ?>
            <section class="row">
                <div class="col-12 text-center m-3">
                    <h3><?= $donnees["succes"] ?></h3>
                </div>
            </section>
            <? }
            else if (isset($donnees["erreur"])) { ?>
                <section class="row text-center">
                    <p class="col-12"><?= $donnees["erreur"]; ?></p>
                    <div class="col-sm-6 offset-sm-3 d-flex justify-content-between">
                        <?php if (isset($donnees["idLogement"])) { ?>     
                            <a href="index.php?Logement&action=afficherLogement&idLogement=<?= $donnees["idLogement"]; ?>" class="btn btn-bleu m-1">Retour à la page du logement</a>
                        <?php } ?>
                        <a href="index.php?Recherche&action=recherche" class="btn btn-orange m-1">Retour à la page recherche</a>
                    </div>
                </section>
            <?php } ?>
        </main>