<?php
/** 
 * @file        evaluation.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        10 février 2018
 * @brief       Page pour évaluer et commenter un logement
 * 
 * @details     
 */ 
?>
        <main class="container">
            <?php if ($donnees["erreur"] == "") { ?>
            <div class="d-flex justify-content-around mt-3">
                <h1 class="text-center">Évaluation du <?= $donnees["adresse"]; ?> (du&nbsp;<?= $donnees["location"]->lireDateDebut() ?>&nbsp;au&nbsp;<?= $donnees["location"]->lireDateFin() ?>)</h1>
            </div>
            <div class="d-flex justify-content-around mt-3">
                <h2>Cette évaluation sera fermée et compilée le <?= $donnees["dateLimite"] ?> à minuit</h2>
            </div>
            <section class="py-5">
                <form method="POST" action="index.php?Evaluation">
                    <input type="hidden" name="action" value="sauvegarderEvaluation">
                    <input type="hidden" name="idLocation" value="<?= $donnees["location"]->lireIdLocation() ?>">
                    <input type="hidden" name="jeton" value="<?= (isset($donnees['jeton']) ? $donnees['jeton'] : "") ?>">
                    <div class="form-group">
                        <label for="evaluation">Évaluation sur 5 étoiles&nbsp;:</label>
                        <select class="form-control" id="evaluation" name="evaluation">
                            <option value="0" <?= ($donnees["location"]->lireEvaluation() == 0 || $donnees["location"]->lireEvaluation() == NULL ? 'selected' : ''); ?>>Aucune étoile</option>
                            <option value="0.5" <?= ($donnees["location"]->lireEvaluation() == 0.5 ? 'selected' : ''); ?>>Une demie étoile</option>
                            <option value="1" <?= ($donnees["location"]->lireEvaluation() == 1 ? 'selected' : ''); ?>>1 étoile</option>
                            <option value="1.5" <?= ($donnees["location"]->lireEvaluation() == 1.5 ? 'selected' : ''); ?>>1 étoile et demie</option>
                            <option value="2" <?= ($donnees["location"]->lireEvaluation() == 2 ? 'selected' : ''); ?>>2 étoiles</option>
                            <option value="2.5" <?= ($donnees["location"]->lireEvaluation() == 2.5 ? 'selected' : ''); ?>>2 étoiles et demie</option>
                            <option value="3" <?= ($donnees["location"]->lireEvaluation() == 3 ? 'selected' : ''); ?>>3 étoiles</option>
                            <option value="3.5" <?= ($donnees["location"]->lireEvaluation() == 3.5 ? 'selected' : ''); ?>>3 étoiles et demie</option>
                            <option value="4" <?= ($donnees["location"]->lireEvaluation() == 4 ? 'selected' : ''); ?>>4 étoiles</option>
                            <option value="4.5" <?= ($donnees["location"]->lireEvaluation() == 4.5 ? 'selected' : ''); ?>>4 étoiles et demie</option>
                            <option value="5" <?= ($donnees["location"]->lireEvaluation() == 5 ? 'selected' : ''); ?>>5 étoiles</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description de votre expérience et commentaires&nbsp;:</label>
                        <textarea class="form-control" id="commentaire" name="commentaire" rows="10" ><?= $donnees["location"]->lireCommentaire() ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Soumettre</button>
                 </form>
            </section>
            <section class="d-flex justify-content-around mt-3">
                <h3 class="text-center text-danger m-3"><?= (isset($donnees["succes"]) ? $donnees["succes"] : "") ?></h3>
            </section>
            <?php }
            else { ?>
                <div class="d-flex justify-content-around mt-3">
                    <h1 class="text-center">Évaluation d'une location</h1>
                </div>
                <section class="my-5 py-5">
                    <h3 class="text-center m-3"><?= $donnees["erreur"] ?></h3>
                </section>
            <?php } ?>
        </main>