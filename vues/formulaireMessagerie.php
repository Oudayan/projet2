<?php
/**
 * @file     formulaire.php
 * @author   Zoraida Ortiz
 * @version  1.0
 * @date     26 fevrier 2018
 * @brief    formulaire pour afficher un message 
 * 
 */
?>

  <form class="boiteLecture hidden">
    <button type="button" class="btn-bleu btn-sm">Répondre</button>
    <button type="button" class="btn-bleu btn-sm">Transférer</button><hr>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">De :</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm expediteur" type="email"disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">Date :</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm dateCourriel" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm">sujet :</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm sujet" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label for="file_id" class="col-sm-3 col-form-label-sm">Fichier joint</label>
      <div class="col-9">
        <a href="#" download="">download
        </a>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <div class="col-12">
        <textarea class="form-control textMessage" rows="6"></textarea>
      </div>
    </div>
  </form>
