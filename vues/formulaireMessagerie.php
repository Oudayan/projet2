<?php
/**
 * @file     formulaireMessagerie.php
 * @author   Zoraida Ortiz
 * @version  3.0
 * @date     8 mars 2018
 * @brief    Vue partielle pour afficher les donnees d'un message 
 * 
 */
?>
    <button type="button" class="btn btn-bleu btn-sm repondre" onclick="repondreMessage();">Répondre</button>
    <button type="button" class="btn btn-bleu btn-sm" onclick="transfererMessage()">Transférer</button>
    <hr>
    <div class="form-group row heigthFormBLecture expediteurLabel">
        <label class="col-sm-2 col-form-label-sm ">De :</label>
        <div class="col-sm-10">
            <input class="form-control-plaintext form-control-sm expediteur" type="email" disabled>
        </div>
    </div>
    <div class="form-group row heigthFormBLecture destinataireLabel">
        <label class="col-sm-2 col-form-label-sm ">À :</label>
        <div class="col-sm-10">
            <input class="form-control-plaintext form-control-sm destinataire" type="email" disabled>
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
        <label for="file_id" class="col-sm-2 col-lg-2 col-form-label-sm">Fichier joint</label>
        <div id="file_id" class="download col-6">
        </div>
    </div>
    <div class="form-group row heigthFormBLecture">
        <div class="col-12">
            <textarea class="form-control textMessage" rows="6" disabled></textarea>
        </div>
    </div>
