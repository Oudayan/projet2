<?php
/**
 * @file     admin.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  2.0
 * @date     5 mars 2018
 * @brief    vue admin
 * @details  
 * source    https://www.jqueryscript.net/text/Rich-Text-Editor-jQuery-RichText.html
 */
?> 


<div class="container">
  <div class="d-flex flex-row">
    <nav class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill"  role="tab" aria-controls="v-pills-validerUsagers" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Admin</a> <!-- href="#v-pills-validerUsagers" -->
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerUsagers" role="tab" aria-controls="v-pills-validerUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Valider usagers</a>      
      <a class="nav-link" id="v-pills-validerLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerLogements" role="tab" aria-controls="v-pills-validerLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Valider logements</a>
      <a class="nav-link" id="v-pills-listeUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeUsagers" role="tab" aria-controls="v-pills-listeUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Liste d'usagers</a>      
      <a class="nav-link" id="v-pills-listeLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeLogements" role="tab" aria-controls="v-pills-listeLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Liste des logements</a>

	</nav><!-- nav flex-column -->

    <aside class="tab-messagerie tab-content col-9" id="v-pills-tabContent">
        <section class="tableauUserValider tab-pane fade show active" id="v-pills-validerUsagers" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
		  <h6>Usager à valider</h6>
            <tr>
              <th scope="col">lu</th>
              <th><i class="fa fa-level-down" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="tableauUserValider">
          </tbody>
        </table>
      </section><!-- tab-pane validerLogements-->
	  
        <section class="boiteReception tab-pane fade show active" id="v-pills-validerLogements" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
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
      </section><!-- tab-pane validerLogements-->
	  
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
			afficherUsagersaValider();
			//afficherLogementsaValider();
			//afficherListeUsagers();
			//afficherListeLogements();
		  
  });
  
  function afficherSelection(){
    var listeContacts = document.getElementById('select-contacts').innerHTML;
    document.getElementById('liste_contacts').value = listeContacts;
    $('#modalContacts').modal('hide')
}
  
  
  function afficherUsagersaValider() {
    $.ajax({
        url: 'index.php?Usagers&action=listeavalider', 
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#tableauUserValider").html("");
          $.each(json, function(i, item) {
            var enveloppe = item.lu == '0' ? "" : '-open';
            var expediteurs = item.expediteur.length > 30 ? item.expediteur.substr(0,28) + "...": item.expediteur;
            var joint = item.fichier_joint == null ? "" : item.fichier_joint;
            $("#tableauUserValider").append(
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
        
 