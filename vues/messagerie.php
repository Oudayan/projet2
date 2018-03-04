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
  <script src="js/validerFormCompMsg.js"></script>
</head>     

<div class="container">
  <div class="d-flex flex-row">
    <nav class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-compMessage-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill" href="#v-pills-compMessage" role="tab" aria-controls="v-pills-compMessage" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Composer un message</a>
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-boitRecp-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-boitRecp" role="tab" aria-controls="v-pills-boitRecp" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false">14</span><i class="fa fa-folder-open" aria-hidden="true"></i>Boîte de réception</a>      
      <a class="nav-link" id="v-pills-mEnvoyes-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-mEnvoyes" role="tab" aria-controls="v-pills-mEnvoyes" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Messages envoyés</a>
    </nav><!-- nav flex-column -->

    <aside class="tab-messagerie tab-content col-9" id="v-pills-tabContent">
      <section class="composerMessage tab-pane fade " id="v-pills-compMessage" role="tabpanel" aria-labelledby="v-pills-compMessage-tab">
        <form enctype="multipart/form-data" action="index.php?Messagerie&action=composerMessage" method="POST"><!--id="formMessagerie"-->
         <div class="input-group input-group-sm mb-3 col-6">
           <input type="text" class="form-control " aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="liste_contacts" id="liste_contacts" disabled>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContacts" data-whatever="@mdo">Ajouter destinataire</button>
          </div><!--input-group -->
          
          <!-- Modal pour chercher un contcat-->
          <div class="modal fade" id="modalContacts" tabindex="-1" role="dialog" aria-labelledby="modalContactsLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalContactsLabel">Sélection des destinataires</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><!-- modal-header -->
                <div class="modal-body">
                 <div class="input-group input-group-sm col-12">
                   <div class="col-12">
                   <p id="feedback">
                    <span id="select-contacts">Aucun</span>
                   </p>
                   </div>
                      <div class="input-group-prepend">
                        <label class="input-group-text col-form-label-sm" for="destinataire">À</label>
                      </div>
                      <ol id="selectable"></ol>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="">Close</button>
                  <button type="button" class="btn btn-primary"  onclick="afficherSelection();">Selection de contacts</button>
                </div><!-- modal-footer -->
              </div><!-- modal-content -->
            </div><!-- modal-dialog -->
          </div><!-- modalContacts -->
          
          <div class="input-group input-group-sm mb-3 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Sujet</span>
            </div>
            <input type="text" class="form-control " aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="sujet" id="sujet">
          </div>
          <div class="input-group group-sm mb-3 col-6">
              <label for="file_id"><p class="text-primary">Taille max 1 Mo :</p></label>
                <input name="fichierJoint" type="file" id="file_id">
              
           <!--<div class="input-group-prepend">
             <span class="input-group-text small">Fichier joint</span>
           </div>
           <div class="custom-file">
             <input type="file" class="custom-file-input" id="fichierJoint" name="fichierJoint">
             <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
           </div>-->
          </div>
          <div class="input-group group-sm mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">Message</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" rows="6"name="textMessage" id="textMessage"></textarea>
          </div>
            <input id="date" type="hidden" value="<?php echo date('Y-m-d H:i:sP');?>"><br>
            <input type="submit" class="btn-bleu btn-sm"  value="Envoyer"> 
        </form>    
      </section><!-- composerMessage id="EnvoyerForm" id input envoyer-->
      
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
      </section><!-- tab-pane boitRecp-->
      <section class="messagesEnvoyes tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
            <tr>
              <th><i class="fa fa-level-up" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="msgEnvoyes"></tbody>
        </table>
      </section><!-- messagesEnvoyes -->
       <form class="boiteLecture hidden">
        <?php include 'formulaireMessagerie.php';?>
      </form> 
    </aside><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
</div><!-- container -->
<script type="text/javascript">
  $(document).ready(function() {
        //  $('.content').richText(); 
          afficherBoiteReception();
          afficherMsgEnvoyes();
  });
  
  function afficherSelection(){
    var listeContacts = document.getElementById('select-contacts').innerHTML;
    document.getElementById('liste_contacts').value = listeContacts;
    $('#modalContacts').modal('hide')
}
  
  var mes_messages = {};
  
  function afficherBoiteReception() {
    $.ajax({
        url: 'index.php?Messagerie&action=messagesRecus', 
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#boiteReception").html("");
          $.each(json, function(i, item) {
            var enveloppe = item.lu == '0' ? "" : '-open';
            var expediteurs = item.expediteur.length > 30 ? item.expediteur.substr(0,28) + "...": item.expediteur;
            var joint = item.fichier_joint == null ? "" : item.fichier_joint;
            $("#boiteReception").append(
                "<tr class='clickable-row' data-href='#' onclick='lireMessage(" + item.id_message + ",true)'>" +
                  "<td><i class='fa fa-envelope" + enveloppe + "' id='env_" + item.id_message + "' aria-hidden='true'></i></td>" +
                  "<td>" + expediteurs + "</td>" +
                  "<td>" + item.sujet + "</td>" +
                  "<td>" + joint + "</td>" +
                  "<td>" + item.msg_date + "</td>" +
                  "<td class='hidden'>" + item.id_message + "</td>" +
                "</tr>");
            mes_messages[item.id_message] = JSON.stringify(
              new Message(
                item.id_message,
                item.expediteur,
                item.msg_date,
                item.sujet,
                item.fichier_joint,
                item.texteMessage
              )
            );
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
          var summaireMessage = {};
          $.each(json, function(i, item) {
            var destinateurs = item.destinataire.length > 30 ? item.destinataire.substr(0,28) + "...": item.destinataire;
            var joint = item.fichier_joint == null ? "" : item.fichier_joint;
           $("#msgEnvoyes").append(
              "<tr class='clickable-row' data-href='#' onclick='lireMessage(" + item.id_message + ",false)'>" +
                "<td>" + destinateurs + "</td>" +
                "<td>" + item.sujet + "</td>" +
                "<td>" + joint + "</td>" +
                "<td>" + item.msg_date + "</td>" +
                "<td class='hidden'>" + item.id_message + "</td>" +
              "</tr>"); 
              mes_messages[item.id_message] = JSON.stringify(
                  new Message(
                    item.id_message,
                    item.destinataire,
                    item.msg_date,
                    item.sujet,
                    item.fichier_joint,
                    item.texteMessage
                  )
                );
          });
        },
        error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
  }; 
  
  class Message{
    constructor(id_messsage, expediteur, msg_date, sujet, fichierJoint, textMessage){
      this.id_messsage = id_messsage;
      this.expediteur = expediteur;
      this.msg_date = msg_date;
      this.sujet = sujet;
      this.fichierJoint = fichierJoint;
      this.textMessage = textMessage;
    }
  };
  
  function lireMessage(idMessage,reception){
    var message = JSON.parse(mes_messages[idMessage]);
    $('.boiteLecture').removeClass('hidden');
    $('.expediteur').val(message.expediteur);
    $('.sujet').val(message.sujet);
    $('.dateCourriel').val(message.msg_date);
    $('.textMessage').val(message.textMessage); 
    $('#env_' + message.id_messsage).removeClass('fa-envelope');
    $('#env_' + message.id_messsage).addClass('fa-envelope-open');
    if(reception) {
      $('.repondre').removeClass('hidden');
    } else {
      $('.repondre').addClass('hidden');
    }
     $.ajax({
        url: 'index.php?Messagerie&action=messageLu', 
        type: 'POST',
        data: {id_message: message.id_messsage,
                message_lu: true}    
      });
  }
  
  function cacherBoitesLecture() {
    $('.boiteLecture').addClass('hidden');
    listeContacts();
  }
  
  function listeContacts(){
    var contacts = {};
    for(var index in mes_messages) {
      var expediteurs = JSON.parse(mes_messages[index]).expediteur;
      var listeExpediteurs = expediteurs.split(",");
      for(var i in listeExpediteurs){
        var expediteur =  listeExpediteurs[i];
        contacts[expediteur] = expediteur;
      }
    }
    $("#contacts").find('option').remove().end();
    $("#contacts").append("<option selected value='0'>Selectionner Destinataire</option>")
    $("#contacts").append("<option value='Chucknorris@gmail'>Admin</option>");
    $("#selectable").find('li').remove().end();
    var index = 0;
    for(var contact in contacts){
      $("#contacts").append(
         "<option value='" + contact + "'>" + contact + "</option>"   
      );
      $("#selectable").append("<li class='ui-widget-content' id='cont_" + index++ + "'>" + contact + "</li>")
    } 
  }

/*  function lireMessage(idMessage){
    $.ajax({
        url: 'index.php?Messagerie&action=messagesRecus', 
        type: 'POST',
        data: {id_message: id },
        dataType: 'json',
        success: function(donnes) {
        mes_messages
          if (item) {
            
              $('.boiteLecture').removeClass('hidden');
              $('.expediteur').val(item.expediteur);
              $('.sujet').val(item.sujet);
              $('.dateCourriel').val(item.msg_date);
              $(".textMessage").val("");
               $(".textMessage").val(item.texteMessage);
                 for(var i = 0; i < item.texteMessage.length; i++){
                  $(".textMessage").val(item.texteMessage[i]);
                }  
          }
       },
       error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
  };*/

 /*function transfereMessage(id){
    $.ajax({
        url: 'index.php?Messagerie&action=destinatairesAjoutes', 
        type: 'POST',
        data: {id_message: id },
        dataType: 'json',
        success: function(donnes) {
          if (donnes) {
             
                }     
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    }); 
  };*/
  
  
 /* $("#EnvoyerForm").on("click", function() {
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

 /* $("#formMessagerie").on("change", function(){
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
  });*/
  </script>
<script>
  $( function() {
    $( "#selectable" ).selectable({
      stop: function() {
        var result = $( "#select-contacts" ).empty();
        var count = 0;
        $( ".ui-selected", this ).each(function() {
          var index = $( "#selectable li" ).index( this );
          var destinataire  = document.getElementById("cont_" + index).innerHTML
          if(++count == 1) {
            result.append( destinataire );
          } else {
            result.append( "," + ( destinataire ) );
         }
        });
      }
    });
  } );
  
  
  

  </script>
  <style>
  #feedback { font-size: 0.9em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin-left: 5px; padding: 0em; font-size: 0.8em; }
  </style>
        
 