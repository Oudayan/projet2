<?php
/**
 * @file     ficheLogement.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  1.0
 * @date     06 mars 2018
 * @brief    formulaire pour afficher un Logement dans le module admin
 * 
 */
?>
	<div style="height:500px" id="ficheLogement">
    <button type="button" class="btn btn-bleu repondre" onclick="validerLogement();">Valider</button>
    <button type="button" class="btn btn-secondary" onclick="bannirLogement()">Bannir</button><hr>
    <div class="form-group row heigthFormBLecture">
	  <input type="hidden" name="id_logement" id="id_logement">
      <label class="col-sm-2 col-form-label-sm"><b>Prix</b></label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm mprix" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm"><b>Frais de nettoyage</b></label>
      <div class="col-sm-10">
        <input class="form-control-plaintext form-control-sm frais_nettoyage" type="text" disabled>
      </div>
    </div>
    <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm"><b>Courriel</b></label>
      <div class="col-sm-10">
		<input type="hidden" class="index" id="vlindex">
        <input class="form-control-plaintext form-control-sm courriel" name='courriel' id="vuCourriel" type="email" disabled>
      </div>
    </div>
     <div class="form-group row heigthFormBLecture">
      <label class="col-sm-2 col-form-label-sm"><b>Type Logement</b></label>
	  <div class="col-sm-10">
	  <input class="form-control-plaintext form-control-sm type_logement" name='courriel' type="email" disabled>
      </div>
    </div>
	<div class="table-responsive">  <!-- form-group row heigthFormBLecture -->
        <table class="table">
			<thead class="thead-dark">
                <tr>
                  <th>Stationnement</th>
                  <th>Wifi</th>
                  <th>Cuisine</th>
                  <th>TV</th>
                  <th>fer_a_repasser</th>
                  <th></th>
                </tr>
            </thead>
                <tr>
                  <td id="stationnement"></td>
                  <td id="wifi"></td>
                  <td id="cuisine"></td>
                  <td id="tv"></td>
                  <td id="fer_a_repasser"></td>
                  <td></td>
                </tr>
			<thead class="thead-light">
                <tr>
                  <th>Cintres</th>
                  <th>Seche à cheveux</th>
                  <th>Climatisé</th>
                  <th>Laveuse</th>
                  <th>Sécheuse</th>
                  <th>Chauffage</th>
                </tr>
            </thead>
			<tr>
              <td id="cintres"></td>
              <td id="seche_a_cheveaux"></td>
              <td id="climatise"></td>
              <td id="laveuse"></td>
              <td id="secheuse"></td>
			  <td id="chauffage"></td>
            </tr>
        </table>
        </div>
            <div class="form-group row heigthFormBLecture">
              <div class="col-12">
                <textarea class="form-control description" rows="6" disabled></textarea>
              </div>
            </div>
            <div class="form-group row heigthFormBLecture" style="margin-top:150px;">
                <div style="height:30vh; overflow: scroll;">
                <div class="container" id="mesPhotos" >

                </div> <!-- /container -->
                    <div id="myModalimg" class="modal">
                        <span class="close" id="closeImg">&times;</span>
                        <img class="modal-contentImg" id="img01">
                    </div>
                </div> 
            </div>
        </div>

    