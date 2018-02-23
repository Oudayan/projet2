<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container" id="messageRecu">
  <form>
    <button type="button" class="btn-bleu btn-sm">Répondre</button><br><br> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">De :</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext" id="expediteur" type="email" disabled placeholder="">
      </div>
    </div>
   <div class="form-group row">
      <label class="col-sm-2 col-form-label">sujet :</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext" id="sujet" type="text" disabled placeholder="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Date :</label>
      <div class="col-sm-10">
        <input class="form-control-plaintext" id="dateCourriel" type="text" disabled placeholder="">
      </div>
    </div>
    <div class="form-group row">
      <label for="file_id" class="col-2 col-form-label">Fichier joint</label>
      <div class="col-10">
        <input name="mon_image" type="file" id="file_id">
      </div>
    </div>  
    <div class="form-group row">
    <label for="exampleTextarea">Example textarea</label>
    <textarea class="form-control" id="textMessage" rows="3"></textarea>
  </div>
    </div><!-- form-group row -->
  </form>  
</div>