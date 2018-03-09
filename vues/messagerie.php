<?php
/**
 * @file     messagerie.php
 * @author   Zoraida Ortiz
 * @version  2.0
 * @date     5 mars 2018
 * @brief    vue messagerie
 * @details  
 */
?> 

<main class="container-fluid">
  <div class="d-flex justify-content-around mt-3">
        <h1>Messagerie interne</h1>
    </div>
  <div class="row">
  <aside class="col-lg-3" id="menuMessagerie">
    <nav class="nav flex-column nav-pills v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-compMessage-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill" href="#v-pills-compMessage" role="tab" aria-controls="v-pills-compMessage" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Composer un message</a>
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-boitRecp-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-boitRecp" role="tab" aria-controls="v-pills-boitRecp" aria-selected="false"><i class="fa fa-folder-open" aria-hidden="true"></i>Boîte de réception</a>      
      <a class="nav-link" id="v-pills-mEnvoyes-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-mEnvoyes" role="tab" aria-controls="v-pills-mEnvoyes" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Messages envoyés</a>
    </nav><!-- nav flex-column -->
  </aside>  

    <section class="tab-messagerie tab-content col-lg-9" id="v-pills-tabContent">
      <div class="composerMessage tab-pane fade " id="v-pills-compMessage" role="tabpanel" aria-labelledby="v-pills-compMessage-tab">
        <form enctype="multipart/form-data" id="formMessagerie" method="post">
         <div class="input-group input-group-sm mb-3 col-9">
           <input type="text" class="form-control " aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="liste_contacts" id="liste_contacts">
            <button type="button" class="btn btn-bleu" data-toggle="modal" data-target="#modalContacts" data-whatever="@mdo">Ajouter destinataire</button>
          </div><!--input-group -->
          
          <!-- Modal pour chercher un contcat-->
          <div class="modal fade" id="modalContacts" tabindex="-1" role="dialog" aria-labelledby="modalContactsLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalContactsLabel">Vous pouvez en sélectionner un ou plusieurs</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><!-- modal-header -->
                <div class="modal-body">
                  <div class="input-group input-group-sm col-12">
                   <div class="col-12">
                   <p id="feedback">
                    <span id="select-contacts"data-toggle="tooltip" data-placement="top" title="Appuyer sur click et glisser ou appuyer sur Ctrl+click "></span>
                   </p>
                   </div>
                      <div class="afficherContacts col-lg-12">
                         <ol id="selectable"></ol>
                      </div>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="">Fermer</button>
                  <button type="button" class="btn btn-orange btn-sm"  onclick="afficherSelection();">Selection de contacts</button>
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
              <label for="file_name"><p class="text-primary">Taille max 1 Mo :</p></label>
                <input name="fichierJoint" type="file" id="file_name">
          </div>
          <div class="input-group group-sm mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">Message</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" rows="6" name="textMessage" id="textMessage"></textarea>
          </div>
            <input type="submit" class="btn btn-orange btn-sm" value="Envoyer">
            <input type="reset" class="btn btn-secondary btn-sm" value="Annuler">
            <!--<input type="button" class="btn-bleu btn-sm" onclick="envoyerMessage()" value="Envoyer"> -->
        </form>
      </div><!-- composerMessage id="EnvoyerForm" id input envoyer-->
      
      <div class="boiteReception tab-pane fade show active" id="v-pills-boitRecp" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
        <form  class="formSuppMsg1"  method="POST">
        <table class="table table-sm responsive-sm table-hover display">
          <button type="submit" class="btn btn-secondary btn-sm suppMsg"><i class="fa fa-trash"  aria-hidden="false"></i>Effacer Messages</button>	
          <thead>
            <tr>
              <th><input type="checkbox" class='tous'/></th>
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
          <input type="text" name="actif" value="false" hidden/>
       </form>    
      </div><!-- tab-pane boitRecp-->
      <div class="messagesEnvoyes tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
        <form class="formSuppMsg2" method="POST">
        <table class="table table-sm responsive-sm table-hover display">
          <button type="submit" class="btn btn-secondary btn-sm suppMsg"><i class="fa fa-trash"  aria-hidden="false"></i>Effacer Messages</button>
          <thead>
            <tr>
              <th><input type="checkbox" class='tous' /></th>
              <th><i class="fa fa-level-up" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="msgEnvoyes"></tbody>
        </table>
          <input type="text" name="actif" value="false" hidden/>
       </form>
      </div><!-- messagesEnvoyes -->
       <form class="boiteLecture hidden">
        <?php include 'formulaireMessagerie.php';?>
      </form> 
    </section><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
</main>
<script type="text/javascript">
  $(document).ready(function() {
      afficherBoiteReception();
      afficherMsgEnvoyes();
      $('.tous').change(function () {
           $("input:checkbox").prop('checked', $(this).prop("checked"));
      });
  });
  
   function cacherBoitesLecture() {
    $('.boiteLecture').addClass('hidden');
    listeContacts();
    $("input:checkbox").prop('checked', false);
  }
  
  class Message{
    constructor(id_messsage, expediteur, destinataire, msg_date, sujet, fichierJoint, textMessage){
      this.id_messsage = id_messsage;
      this.expediteur = expediteur;
      this.destinataire = destinataire;
      this.msg_date = msg_date;
      this.sujet = sujet;
      this.fichierJoint = fichierJoint;
      this.textMessage = textMessage;
    }
  };
  
  //fonction pour la selection de destinataires pour envoyer un message
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
          console.log(json);
          $("#boiteReception").html("");
          $.each(json, function(i, item) {
            var enveloppe = item.lu == '0' ? "" : '-open';
            var expediteurs = item.expediteur.length > 30 ? item.expediteur.substr(0,28) + "...": item.expediteur;
            var joint = item.fichier_joint == null ? "" : "<i class='fa fa-paperclip' aria-hidden='true'</i>";            
            $("#boiteReception").append(
                "<tr class='clickable-row' data-href='#' onclick='lireMessage(" + item.id_message + ",true)'>" +
                  "<td><input class='inpChecked' type='checkbox' name='listeSupp[]' value='"+ item.id_message +"'/></td>" +
                  "<td><i class='fa fa-envelope" + enveloppe + "' id='env_" + item.id_message + "' aria-hidden='true'></i></td>" +
                  "<td>" + expediteurs + "</td>" +
                  "<td>" + item.sujet + "</td>" +
                  "<td>" + joint + "</td>" +
                  "<td>" + item.msg_date + "</td>" +
                "</tr>");
            mes_messages[item.id_message] = JSON.stringify(
              new Message(
                item.id_message,
                item.expediteur,
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
    
  function afficherMsgEnvoyes() {
    $.ajax({
        url: 'index.php?Messagerie&action=msgEnvoyes', 
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#msgEnvoyes").html("");
          var summaireMessage = {};
          $.each(json, function(i, item) {
			  console.log("Envoye",json);
            var destinateurs = item.destinataire.length > 30 ? item.destinataire.substr(0,28) + "...": item.destinataire;
            var joint = item.fichier_joint == null ? "" : item.fichier_joint;
           $("#msgEnvoyes").append(
              "<tr class='clickable-row' data-href='#' onclick='lireMessage(" + item.id_message + ",false)'>" +
                "<td><input class='inpChecked' type='checkbox' name='listeSupp[]' value='"+ item.id_message +"'/></td>" +
                "<td>" + destinateurs + "</td>" +
                "<td>" + item.sujet + "</td>" +
                "<td>" + joint + "</td>" +
                "<td>" + item.msg_date + "</td>" +
              "</tr>"); 
              mes_messages[item.id_message] = JSON.stringify(
                  new Message(
                    item.id_message,
                    item.expediteur,
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
  
  var message_selectione;
  function lireMessage(idMessage,reception){
    message_selectione = idMessage;
    var message = JSON.parse(mes_messages[idMessage]);
    $('.boiteLecture').removeClass('hidden');
    $('.sujet').val(message.sujet);
    $('.dateCourriel').val(message.msg_date);
    $('.textMessage').val(message.textMessage); 
     if (!message.fichierJoint){
       $('#file_id').addClass('hidden');
      } else {
       $('#file_id').empty();
        $("<a href='pieces_jointes/"+ message.id_messsage +"' download='"+ message.fichierJoint +"'>"+ message.fichierJoint +"</a>").appendTo('#file_id');
        $('#file_id').removeClass('hidden');
      }
     
    $('#env_' + message.id_messsage).removeClass('fa-envelope');
    $('#env_' + message.id_messsage).addClass('fa-envelope-open');
    if(reception) {
      $('.expediteur').val(message.expediteur);
      $('.destinataireLabel').addClass('hidden');
      $('.repondre').removeClass('hidden');
    } else {
      $('.destinataire').val(message.destinataire);
      $('.expediteurLabel').addClass('hidden');
      $('.destinataireLabel').removeClass('hidden');
      $('.repondre').addClass('hidden');
    }
     $.ajax({
        url: 'index.php?Messagerie&action=messageLu', 
        type: 'POST',
        data: {id_message: message.id_messsage,
                message_lu: true}    
      });
  }

  function listeContacts(){
     $.ajax({
        url: 'index.php?Messagerie&action=listeContacts', 
        type: 'POST',
        dataType: 'json',
        success: function(json) {
           $("#contacts").find('option').remove().end();
           $("#selectable").find('li').remove().end();
            $("#contacts").append("<option value='Chucknorris@gmail'>Admin</option>");
            $("#selectable").append("<li class='ui-widget-content' id='cont_0'>Chucknorris@gmail</li>");
          $.each(json, function(i, item) {
             $("#contacts").append("<option value='" + item + "'>" + item  + "</option>");
             $("#selectable").append("<li class='ui-widget-content' id='cont_" + ++i + "'>" + item + "</li>");
          }); 
        }
      });    
  }
  
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

 //function pour supprimir un message recu
  $(function(){
    $(".formSuppMsg1").on("submit", function(e){
      var dataString = $(".formSuppMsg1").serialize();
         alert('Désirez-vous supprimer les messages sélectionnés?');
      $.ajax({
          type:'POST',
          url:'index.php?Messagerie&action=supprimerMessage',
          data: dataString,
          dataType: 'json',
        /*  success: function(json) {
           alert('asf');
          }*/
      });
      
    });    
  });
  
  $(function(){
    $(".formSuppMsg2").on("submit", function(e){
      var dataString = $(".formSuppMsg2").serialize();
         alert('Désirez-vous supprimer les messages sélectionnés?');
      $.ajax({
          type:'POST',
          url:'index.php?Messagerie&action=supprimerMessage',
          data: dataString,
          dataType: 'json',
         /* success: function(json) {
           alert('asf');
          }*/
     });
     
    });    
  });

//function pour envoyer un message
  $(function(){
    $("#formMessagerie").on("submit", function(e){
          var formData = new FormData(document.getElementById("formMessagerie"));
          $.ajax({
              type        : 'POST', 
              url         : 'index.php?Messagerie&action=composerMessage', 
              data: formData,
              cache: false,
              contentType: false,
              processData: false
          });  
    });
  });
  
  function transfererMessage() {
    var expediteurs = JSON.parse(mes_messages[message_selectione]).expediteur;
    var dateMessage = JSON.parse(mes_messages[message_selectione]).msg_date;
    var message = '\n________________________________________\n' + 
            expediteurs + ' a écrit le ' + dateMessage + '\n\n';
    
    $('input[name=liste_contacts]').val('');
    $('input[name=sujet]').val('TR: ' + $('.sujet').val());
    $('textarea[name=textMessage]').val(message + $('.textMessage').val());
    
    document.getElementById('v-pills-compMessage-tab list-group-item-action').click();
  }
  
  function repondreMessage() {
    var expediteurs = JSON.parse(mes_messages[message_selectione]).expediteur;
    var dateMessage = JSON.parse(mes_messages[message_selectione]).msg_date;
    var message = '\n________________________________________\n' + 
            expediteurs + ' a écrit le ' + dateMessage + '\n\n';
    
    $('input[name=liste_contacts]').val(expediteurs);
    $('input[name=sujet]').val('RE: ' + $('.sujet').val());
    $('textarea[name=textMessage]').val(message + $('.textMessage').val());
    
    document.getElementById('v-pills-compMessage-tab list-group-item-action').click();
  }
  
  </script>

        
 