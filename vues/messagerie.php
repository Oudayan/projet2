<?php
/**
 * @file     messagerie.php
 * @author   Zoraida Ortiz
 * @version  2.0
 * @date     20 fevrier 2018
 * @brief    vue messagerie
 * @details  
 * source    https://www.jqueryscript.net/text/Rich-Text-Editor-jQuery-RichText.html
 */
?> 
<head> 
    <!-- Messagerie -->
     <!-- <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/richtext.scss">        
    <link rel="stylesheet" href="css/richtext.min.css">
       <!-- <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
   <!-- <script src="js/jquery.dataTables.min.js"></script> --> 
    <!--  <script src="js/jquery.richtext.js"></script>
   <!-- <script src="js/messagerie.js"></script>-->
</head>     

<div class="container">
  <div class="d-flex flex-row">
    <nav class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-compMessage-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill" href="#v-pills-compMessage" role="tab" aria-controls="v-pills-compMessage" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Composer un message</a>
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-boitRecp-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-boitRecp" role="tab" aria-controls="v-pills-boitRecp" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false">14</span><i class="fa fa-folder-open" aria-hidden="true"></i>Boîte de réception</a>      
      <a class="nav-link" id="v-pills-mEnvoyes-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-mEnvoyes" role="tab" aria-controls="v-pills-mEnvoyes" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Messages envoyés</a>
    </nav><!-- nav flex-column -->

    <div class="tab-content tab-messagerie col-9" id="v-pills-tabContent">
      <section class="composerMessage tab-pane fade " id="v-pills-compMessage" role="tabpanel" aria-labelledby="v-pills-compMessage-tab">
        <form>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="destinataire">À</label>
            </div>
            <select class="custom-select custom-select-sm" id="destinataire">
              <option selected>Selectionner Destinataire</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Sujet</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>
          <div class="input-group mb-3">
           <div class="input-group-prepend">
             <span class="input-group-text">Fichier joint</span>
           </div>
           <div class="custom-file">
             <input type="file" class="custom-file-input" id="inputGroupFile01">
             <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
           </div>
         </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Message</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" rows="3"></textarea>
        </div>
        <input id="date" type="hidden" value="<?php echo date('Y-m-d H:i:sP');?>">
         <button type="button" class="btn-bleu btn-sm" id="btnEnvoyer">Envoyer</button> 
      </form>
    </section><!-- composerMessage -->
      
    <div class="tab-pane fade show active" id="v-pills-boitRecp" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
       <div class="btnsMessagerie">
        <button type="button" class="btn-bleu btn-sm">Répondre</button><br><br>
      </div> 
        <table class="table table-sm responsive-sm table-hover display" id="messages">
          <thead>
            <tr>
              <th scope="col">lu</th>
              <th><i class="fa fa-level-down" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="boiteReception">
          </tbody>
        </table>
          <form id="boiteLecture1" class=" hidden">
            <button type="button" class="btn-bleu btn-sm">Répondre</button><hr> 
            <div class="form-group row heigthFormBLecture">
              <label class="col-sm-2 col-form-label-sm" text-end>De :</label>
              <div class="col-sm-10">
                <input class="form-control-plaintext expediteurBr form-control-sm" type="email">
              </div>
            </div>
             <div class="form-group row heigthFormBLecture">
              <label class="col-sm-2 col-form-label-sm">Date :</label>
              <div class="col-sm-10">
                <input class="form-control-plaintext dateCourrielBr form-control-sm" type="text" disabled>
              </div>
            </div>
           <div class="form-group row heigthFormBLecture">
              <label class="col-sm-2 col-form-label-sm">sujet :</label>
              <div class="col-sm-10">
                <input class="form-control-plaintext sujetBr form-control-sm" type="text" disabled>
              </div>
            </div>
           
            <div class="form-group row heigthFormBLecture">
              <label for="file_id" class="col-sm-2 col-form-label-sm">Fichier joint</label>
              <div class="col-10">
                <a href="#" download="">Télécharger
                </a>
              </div>
            </div>
            <div class="form-group row heigthFormBLecture">
            <!--<label class="col-sm-2 col-form-label" id="labelMessage">Message</label>-->
            <div class="col-12">
            <textarea class="form-control textMessageBr" rows="3"></textarea>
            </div>
            </div>
          </form>
      </div><!-- tab-pane boitRecp-->
      
      <div class="tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
            <tr>
              <th scope="col">lu</th>
              <th><i class="fa fa-level-up" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="msgEnvoyes"></tbody>
        </table>     
          <form id="boiteLecture" class=" hidden">
            <button type="button" class="btn-bleu btn-sm">Répondre</button><br><br> 
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">De :</label>
              <div class="col-sm-10">
                <input class="form-control-plaintext expediteur" type="email" disabled placeholder="">
              </div>
            </div>
           <div class="form-group row">
              <label class="col-sm-2 col-form-label">sujet :</label>
              <div class="col-sm-10">
                <input class="form-control-plaintext sujet" type="text" disabled placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Date :</label>
              <div class="col-sm-10">
                <input class="form-control-plaintext dateCourriel" type="text" disabled placeholder="">
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
            <textarea class="form-control textMessage" rows="3"></textarea><hr>
            </div>
          </form>
    </div><!-- tab-pane -->
    </div><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
</div><!-- container -->
<script type="text/javascript">
$(document).ready(function() {
      //  $('.content').richText(); 
        afficherBoiteReception();
        afficherMsgEnvoyes();
     
  });
    function afficherBoiteReception() {
    $.ajax({
        url: 'index.php?Messagerie&action=boiteReception', 
        type: 'POST',
        dataType: 'json',
       success: function(json) {
          $("#boiteReception").html("");
          $.each(json, function(i, item) {
          $("#boiteReception").append("<tr><td><a href='#' onclick='lireMessageBr(" + item.id_message + ")'>" + item.lu + "</a></td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td><td class='hidden'>" + item.id_message + "</td></tr>");
                
          });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    };
    
  function afficherMsgEnvoyes() {
    $.ajax({
        url: 'index.php?Messagerie&action=msgEnvoyes', 
        type: 'POST',
        dataType: 'json',
       success: function(json) {
        $("#msgEnvoyes").html("");
        $.each(json, function(i, item) {
           $("#msgEnvoyes").append("<tr><td><a href='#' onclick='lireMessage(" + item.id_message + ")'>" + item.lu + "</a></td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td><td class='hidden'>" + item.id_message + "</td></tr>");

          });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
    });
}; 
        
    function lireMessage(id){
       $.ajax({
          url: 'index.php?Messagerie&action=afficherMessage', 
          type: 'POST',
          data: {id_message: id },
          dataType: 'json',
          success: function(donnes) {
            console.log(donnes.expediteur, donnes.sujet, donnes.date, donnes.message[0], donnes.message[1]);
            if (donnes) {
                $('#boiteLecture').removeClass('hidden');
                $('.expediteur').val(donnes.expediteur);
                $('.sujet').val(donnes.sujet);
                $('.dateCourriel').val(donnes.date);
                //$("#textMessage").val("");
                //$("#textMessage").val(donnes.message);
                for(var i = 0; i < donnes.message.length; i++){              
                //$.each(donnes.message, function(i, item) {
                //};
                  $(".textMessage").val(donnes.message[i]);
                }
                
          }
           else {
                ('#boiteLecture1').addClass('hidden');
           }
          },
          error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
     }); 
  };
  
   function lireMessageBr(id){
       $.ajax({
          url: 'index.php?Messagerie&action=afficherMessage', 
          type: 'POST',
          data: {id_message: id },
          dataType: 'json',
          success: function(donnes) {
            console.log(donnes.expediteur, donnes.sujet, donnes.date, donnes.message[0], donnes.message[1]);
            if (donnes) {
                $('#boiteLecture1').removeClass('hidden');
                $('.expediteurBr').val(donnes.expediteur);
                $('.sujetBr').val(donnes.sujet);
                $('.dateCourrielBr').val(donnes.date);
                //$("#textMessage").val("");
                //$("#textMessage").val(donnes.message);
                for(var i = 0; i < donnes.message.length; i++){              
                //$.each(donnes.message, function(i, item) {
                //};
                  $(".textMessageBr").val(donnes.message[i]);
                }
                
            }
            else {
               // ('#boiteLecture1').addClass('hidden');
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
     }); 
  };
  
  function cacherBoitesLecture() {
    $('#boiteLecture1').addClass('hidden');
    $('#boiteLecture').addClass('hidden');
  }
  </script>
  
        
 
