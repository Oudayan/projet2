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
                <h1>Paiement et confirmation</h1>
            </div>
            <?php if (isset($donnees["succes"])) { ?>
            <section id="facture" class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4 border rounded m-1 p-2">
                    <div class="text-center my-3">
                        <h3>Facture</h3>
                    </div>
                    <h5>Location du <?= $donnees["logement"]->lireNoCivique() . " " . $donnees["logement"]->lireRue() . " " . $donnees["logement"]->lireApt() . ", " . $donnees["logement"]->lireVille() . ", " . $donnees["logement"]->lireProvince() . ", " . $donnees["logement"]->lirePays() . ", " . $donnees["logement"]->lireCodePostal(); ?></h5>
                    <hr />
                    <label>Dates de location&nbsp;:</label>
                    <p>Du&nbsp;<?= $donnees["datesLocation"] ?></p>
                    <hr />
                    <?php if (isset($_SESSION["location"]["nettoyage"]) && $_SESSION["location"]["nettoyage"] > 0) { ?>
                    <div class="row">
                        <label class="col-6 text-left">Frais de nettoyage&nbsp;:</label>
                        <span class="col-6 text-right">
                            <?= $_SESSION["location"]["nettoyage"] ?>
                        </span>
                    </div>
                    <hr />
                    <?php } 
                    if (isset($_SESSION["location"]["fraisService"]) && $_SESSION["location"]["fraisService"] > 0) { ?>
                    <div class="row">
                        <label class="col-6 text-left">Frais de service&nbsp;:</label>
                        <span class="col-6 text-right">
                            <?= $_SESSION["location"]["fraisService"] ?>
                        </span>
                    </div>
                    <hr />
                    <?php } ?>
                    <div class="row">
                    <?php if (isset($_SESSION["location"]["taxe"])) { ?>
                        <h6 class="col-12 text-left">TAXES&nbsp;:</h6>
                        <?php for ($i = 0; $i<count($_SESSION["location"]["taxe"]); $i++) { ?>
                            <label class="col-6 text-left"><?= $_SESSION["location"]["taxe"][$i] ?>&nbsp;: <?= $_SESSION["location"]["taux"][$i] ?>&nbsp;%</label>
                            <span class="col-6 text-right"><?= $_SESSION["location"]["sousTotalTaxe"][$i] ?></span>
                        <?php }
                    } ?>
                    </div>
                    <hr />
                    <div class="row">
                        <label class="col-6 text-left"><h5>TOTAL&nbsp;:</h5></label>
                        <h5 class="col-6 text-right"><?= (isset($_SESSION["location"]["prixTotalFormate"]) ? $_SESSION["location"]["prixTotalFormate"] : ""); ?></h5>
                    </div>
                </div>
                <div class="col-sm-4 border rounded m-1 p-2">
                    <div class="text-center mt-3">
                        <h3>Veuillez confirmer votre méthode de&nbsp;paiement</h3>
                    </div>
                    <form method="POST" action="">
                        <div class="funkyradio">
                            <div class="funkyradio-bleu">
                                <input type="radio" name="payment" id="paypal" value="paypal" <?= (isset($donnees["paypal"]) ? $donnees["paypal"] : "") ?>/>
                                <label for="paypal">PayPal <i class="fa fa-cc-paypal"></i></label>
                            </div>
                            <div class="funkyradio-bleu">
                                <input type="radio" name="payment" id="mastercard" value="mastercard" <?= (isset($donnees["mastercard"]) ? $donnees["mastercard"] : "") ?>/>
                                <label for="mastercard">MasterCard <i class="fa fa-cc-mastercard"></i></label>
                            </div>
                            <div class="funkyradio-bleu">
                                <input type="radio" name="payment" id="visa" value="visa" <?= (isset($donnees["visa"]) ? $donnees["visa"] : "") ?>/>
                                <label for="visa">Visa <i class="fa fa-cc-visa"></i></label>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-end my-2">
                        <button id="confirmation" class="btn btn-orange">Confirmer</button>
                    </div>
                </div>
            </section>
            <section class="row">
                <div id="succes" class="col-12 text-center m-3 hidden">
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
        <script>

            $("#confirmation").on("click", function() {
                $("#facture").addClass("hidden");
                $("#succes").removeClass("hidden");
            });
            
        </script>