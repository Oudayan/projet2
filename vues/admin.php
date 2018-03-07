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



	<div class="row">
		<aside class="col-lg-3">
                </aside>
                <section class="col-lg-9">
                </section>
	</div>
</main>


<main class="container-fluid">
  <div class="row">
  <aside class="col-lg-3">
    <nav class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill"  role="tab" aria-controls="v-pills-validerUsagers" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Admin</a> <!-- href="#v-pills-validerUsagers" -->
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerUsagers" role="tab" aria-controls="v-pills-validerUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Valider usagers</a>      
      <a class="nav-link" id="v-pills-validerLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerLogements" role="tab" aria-controls="v-pills-validerLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Valider logements</a>
      <a class="nav-link" id="v-pills-listeUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeUsagers" role="tab" aria-controls="v-pills-listeUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Liste d'usagers</a>      
      <a class="nav-link" id="v-pills-listeLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeLogements" role="tab" aria-controls="v-pills-listeLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Liste des logements</a>

	</nav><!-- nav flex-column -->
</aside>
    <section class="tab-messagerie tab-content col-lg-9" id="v-pills-tabContent">
        <div class="tableauUserValider tab-pane fade show active" id="v-pills-validerUsagers" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
		  <h6>Usagers à valider</h6>
            <tr>
              <th>Prenom</th>
              <th>Nom</th>
              <th>Courriel</th>  <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
              <th>Téléphone</th>  <!-- i class="fa fa-phone" aria-hidden="true"></i> -->
            </tr>
          </thead>
          <tbody id="tableauUserValider">
          </tbody>
        </table>
      </div><!-- tab-pane validerLogements-->
	  
        <div class="boiteReception tab-pane fade" id="v-pills-validerLogements" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
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
      </div><!-- tab-pane validerLogements-->
	  
      <div class="messagesEnvoyes tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
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
      </div><!-- messagesEnvoyes -->
       <form class="ficheUsager hidden">
        <?php include 'ficheUsager.php';?>
      </form> 
    </section><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
  <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Bannir un Usager</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
           <div class="col-lg-12"> 
              <label for="description">Description</label>
              <textarea rows="6" cols="50" name="Explanation" onblur="estDescription()" required></textarea>
              <span id="errDescription" style="color:red; visibility:hidden">* Description invalide ou requis</span>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</main><!-- container -->
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
  
  usagersValider = {};
  function afficherUsagersaValider() {
    $.ajax({
        url: 'index.php?Usagers&action=listeavalider', 
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#tableauUserValider").html("");
          $.each(json, function(i, item) {
			  id = "rangee"+i;
            $("#tableauUserValider").append(
                "<tr class='clickable-row' id="+id +" data-href='#' onclick='afficherUsager(" + i + ",true)'>" +
                  "<td>" + item.nom + "</td>" +
                  "<td>" + item.prenom + "</td>" +
				          "<td>" + item.courriel + "</td>" +
                  "<td>" + item.cellulaire + "</td>" +
                  "<td class='hidden'>" + item.id_message + "</td>" +
                 "</tr>");
            usagersValider[i] = JSON.stringify(
              new Usager(
                item.courriel,
                item.nom,
                item.prenom,
                item.cellulaire
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
              "<tr class='clickable-row' data-href='#' onclick='afficherLogement(" + item.id_message + ",false)'>" +
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
  
  function afficherUsager(i,reception){
    var usager = JSON.parse(usagersValider[i]);
    $('.ficheUsager').removeClass('hidden');
    $('.nom').val(usager.nom);
    $('.prenom').val(usager.prenom);
	$('.courriel').val(usager.courriel);
    $('.cellulaire').val(usager.cellulaire); 
	$('.index').val(i); 
  }
  
  function cacherBoitesLecture() {
    $('.ficheUsager').addClass('hidden');
   // listeContacts();
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

				
    class Usager{
    constructor(courriel, nom, prenom, cellulaire){
      this.courriel = courriel;
      this.nom = nom;
      this.prenom = prenom;
      this.cellulaire = cellulaire;
    }
  };
	function validerUsager() {
		courriel = document.getElementById("courriel").value;
		i = document.getElementById("index").value;
		 $.ajax({
              type        : 'POST', 
              url         : 'index.php?Usagers&action=validerUsager', 
              data: {courriel:courriel},
 		  success: function(json) {
			alert('Ok, validado',json);
			cacherBoitesLecture();
			$("#rangee"+i).hide();
         },
		  error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		}) 

	}

	function bannirUsager() {
       $('#myModal').modal('show');
      courriel = document.getElementById("courriel").value;
      i = document.getElementById("index").value;

      
    /*  $.ajax({
              type        : 'POST', 
              url         : 'index.php?Usagers&action=bannirUsager', 
              data: {courriel:courriel},
      success: function(json) {
          alert('Ok, Banni',json);
          cacherBoitesLecture();
          $("#rangee"+i).hide();
           },
      error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    }) */

		 
	 }



  </script>
  <style>
  #feedback { font-size: 0.9em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin-left: 5px; padding: 0em; font-size: 0.8em; }
  </style>
        
 