        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <aside class="location border rounded py-3 mt-2">
                    <form id="location" method="post" action="index.php?Location" class="py-2">
                        <input type="hidden" id="action" name="action" value="location">
                        <input type="hidden" id="idLogement" name="idLogement" value="<?=  ?>">
                        <h3>Location&nbsp;:</h3>
                        <div class="row">
                            <div class="col-sm-6 text-center text-sm-left my-3">
                                Prix&nbsp;:&nbsp;<br><span class="prix mt-3"><strong><?= $donnees["logement"]->lirePrix(); ?>&nbsp;$</strong></span><small> par&nbsp;nuit</small>
                            </div>
                            <div class="col-sm-6 text-center text-sm-right my-3">
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
                    </form>
                </aside>
            </div>
        </div>