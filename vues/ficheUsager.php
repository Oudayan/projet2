<?php
/**
 * @file     ficheUsager.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  1.0
 * @date     06 mars 2018
 * @brief    formulaire pour afficher un usager dans le module admin
 * 
 */
?>
    <button type="button" class="btn-bleu btn-sm repondre" onclick="validerUsager();">Valider</button>
    <button type="button" class="btn-bleu btn-sm" onclick="bannirUsager()">Bannir</button><hr>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">Nom</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm nom" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">Prenom</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm prenom" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">Courriel</label>
      <div class="col-sm-10">
		<input type="hidden" class="index" id="index">
        <input class="form-control-plaintext form-control-sm courriel" name='courriel' id='courriel' type="email" disabled>
      </div>
    </div>
     <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">Cellulaire</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm cellulaire" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <div class="col-12">
        <textarea class="form-control description" rows="6" disabled></textarea>
      </div>
    </div>


    
