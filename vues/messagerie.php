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
    <!--  <script src="js/jquery.richtext.js"></script>-->
  <script src="js/validerFormCompMsg.js"></script>
  <!--     <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>-->
</head>     

<div class="container">
  <div class="d-flex flex-row">
    <nav class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-compMessage-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill" href="#v-pills-compMessage" role="tab" aria-controls="v-pills-compMessage" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Composer un message</a>
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-boitRecp-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-boitRecp" role="tab" aria-controls="v-pills-boitRecp" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false">14</span><i class="fa fa-folder-open" aria-hidden="true"></i>Boîte de réception</a>      
      <a class="nav-link" id="v-pills-mEnvoyes-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-mEnvoyes" role="tab" aria-controls="v-pills-mEnvoyes" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Messages envoyés</a>
    </nav><!-- nav flex-column -->

    <main class="tab-messagerie tab-content col-9" id="v-pills-tabContent">
      <section class="composerMessage tab-pane fade " id="v-pills-compMessage" role="tabpanel" aria-labelledby="v-pills-compMessage-tab">
        <form  action="" id="formMessagerie">
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <label class="input-group-text col-form-label-sm" for="destinataire">À</label>
            </div>
            <select class="custom-select custom-select-sm " id="destinataire">
              <option selected value="0">Selectionner Destinataire</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Sujet</span>
            </div>
            <input type="text" class="form-control " aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="sujet">
          </div>
          <div class="input-group group-sm mb-3 col-6">
           <div class="input-group-prepend">
             <span class="input-group-text small">Fichier joint</span>
           </div>
           <div class="custom-file">
             <input type="file" class="custom-file-input" id="fichierJoint" >
             <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
           </div>
          </div>
          <div class="input-group group-sm mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">Message</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" rows="6" id="textMessage"></textarea>
          </div>
            <input id="date" type="hidden" value="<?php echo date('Y-m-d H:i:sP');?>"><br>
            <input type="submit" class="btn-bleu btn-sm" id="EnvoyerForm" value="Envoyer" disabled> 
        </form>    
      </section><!-- composerMessage -->
      
      <section class="boiteReception tab-pane fade show active" id="v-pills-boitRecp" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
        <table class="table table-sm responsive-sm table-hover display">
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
           <?php include 'formulaireMessagerie.php';?>
      </section><!-- tab-pane boitRecp-->
      
      <section class="messagesEnvoyes tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
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
           <?php include 'formulaireMessagerie.php';?>
      </section><!-- messagesEnvoyes -->
    </main><!-- tab-messagerie -->
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
          $("#boiteReception").append("<tr><td><a href='#' onclick='lireMessage(" + item.id_message + ")'>" + item.lu + "</a></td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td><td class='hidden'>" + item.id_message + "</td></tr>");
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
             $("#msgEnvoyes").append("<tr><td><a href='#' onclick='lireMessage(" + item.id_message + ")'>" + item.lu  + "</a></td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td><td class='hidden'>" + item.id_message + "</td></tr>");
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
          if (donnes) {
              $('.boiteLecture').removeClass('hidden');
              $('.expediteur').val(donnes.expediteur);
              $('.sujet').val(donnes.sujet);
              $('.dateCourriel').val(donnes.date);
              $(".textMessage").val("");
                for(var i = 0; i < donnes.message.length; i++){
                  $(".textMessage").val(donnes.message[i]);
                }     
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    }); 
  };
  
  function cacherBoitesLecture() {
    $('.boiteLecture').addClass('hidden');
  }
  
  $("#EnvoyerForm").on("click", function() {
    $.ajax({
        url: 'index.php?Presentations&action=sauvegarderMessage',
        type: 'POST',
        data: { 
                destinataire: $('#destinataire').val(),
                sujet: $('#sujet').val(), 
                fichierJoint: $('#fichierJoint').val(), 
                date: $('#date').val(), 
                textMessage: $('#textMessage').val(), 
            }, 
        dataType: 'html',
       
    });
});

  $("#formMessagerie").on("change", function(){
     var resultat = validaterFormMsg();
     if(resultat){
       console.log(resultat);
       $("#EnvoyerForm").prop("disabled", false);
     }
     else{
       $("#EnvoyerForm").prop("disabled", true);
     }
  });
  
  $("#fichierJoint").on("blur",function(){
      validerExtension();
  });
  </script>
  
        
 
