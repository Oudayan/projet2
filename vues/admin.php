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
      <!-- <a class="nav-link" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()" data-toggle="pill"  role="tab" aria-controls="v-pills-validerUsagers" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Admin</a> <!-- href="#v-pills-validerUsagers" -->
       <div class="dropdown-divider"></div>
		<a class="nav-link" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerUsagers" role="tab" aria-controls="v-pills-validerUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Valider usagers</a>      
		<div class="dropdown-divider"></div>
		<a class="nav-link" id="v-pills-listeUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeUsagers" role="tab" aria-controls="v-pills-listeUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Liste d'usagers</a>      
		<div class="dropdown-divider"></div>
		<a class="nav-link" id="v-pills-validerLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerLogements" role="tab" aria-controls="v-pills-validerLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Valider logements</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" id="v-pills-listeLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeLogements" role="tab" aria-controls="v-pills-listeLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Liste des logements</a>
		
	</nav><!-- nav flex-column -->
</aside>
    <section class="tab-usagers tab-content col-lg-9" id="v-pills-tabContent">
        <div class="tableauUserValider tab-pane fade show active" id="v-pills-validerUsagers" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
		  <h6>Usagers à valider</h6>
            <tr>
              <th>Prenom</th>
              <th>Nom</th>
              <th><i class="fa fa-envelope" aria-hidden="true"></i></th>  
              <th><i class="fa fa-phone" aria-hidden="true"></i></th>  
            </tr>
          </thead>
          <tbody id="tableauUserValider">
          </tbody>
        </table>
      </div><!-- tab-pane validerUsagers-->
	  
	  <div class="listeUsagers tab-pane fade" id="v-pills-listeUsagers" role="tabpanel" aria-labelledby="v-pills-listeUsagers-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
		  <h6>Liste d'usagers</h6>
            <tr>
              <th>Prenom</th>
              <th>Nom</th>
              <th><i class="fa fa-envelope" aria-hidden="true"></i></th>  
              <th><i class="fa fa-phone" aria-hidden="true"></i></th>  
            </tr>
          </thead>
          <tbody id="tableauListeUsagers"></tbody>
        </table>
      </div><!-- listeUsagers -->
	  
        <div class="boiteReception tab-pane fade" id="v-pills-validerLogements" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
            <tr>
				<h6>Logements à valider</h6>
              <th>Adresse </th>
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
	  

       <form class="ficheUsager hidden">
        <?php include 'ficheUsager.php';?>
      </form> 
    </section><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
  <!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> 
  Open modal
</button> -->

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
              <textarea rows="6" cols="50" id="description" onblur="estDescription()" required></textarea>
              <span id="errDescription" style="color:red; visibility:hidden">* Description invalide ou requis</span>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="bannir" class="btn btn-danger" onclick="bannir()" data-dismiss="modal"disabled>Bannir</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
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
			afficherListeUsagers();
			//afficherListeLogements();
		  
  });
  
 
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
                "<tr class='clickable-row' id="+id +" data-href='#' onclick='afficherValider(" + i + ",true)'>" +
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
		  console.log(usagersValider);
        },
        error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
  };
   usagersListe = {};
  function afficherListeUsagers() {
    $.ajax({
        url: 'index.php?Usagers&action=afficheListeUsagersJson',
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#tableauListeUsagers").html("");
          $.each(json, function(i, item) {
			  console.log(item);
			  id = "rangee"+i;
			  banni = item.u_banni == 1 ? "Banni" : "";
			  valide = item.u_valide != 1 && item.u_banni != 1 ? "À valider" : "";
            $("#tableauListeUsagers").append(
                "<tr class='clickable-row' id="+id +" data-href='#' onclick='afficherUsager(" + i + ",true)'>" +
                  "<td>" + item.nom + "</td>" +
                  "<td>" + item.prenom + "</td>" +
				  "<td>" + item.courriel + "</td>" +
                  "<td>" + item.cellulaire + "</td>" +
				  "<td>" + banni + "</td>" +
				  "<td>" + valide + "</td>" +
                  "<td class='hidden'>" + item.id_message + "</td>" +
                 "</tr>");
            usagersListe[i] = JSON.stringify(
              new Usager(
                item.courriel,
				item.nom,
				item.prenom,
				item.cellulaire,
				item.u_banni,
				item.u_commentaire_banni
              )
            );
          });
		  console.log(usagersListe);
        },
        error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
 
  }; 
  
  
  function afficherValider(i,reception){
    var usager = JSON.parse(usagersValider[i]);
    $('.ficheUsager').removeClass('hidden');
    $('.nom').val(usager.nom);
    $('.prenom').val(usager.prenom);
	$('.courriel').val(usager.courriel);
    $('.cellulaire').val(usager.cellulaire); 
	$('.index').val(i); 
  }
  
    function afficherUsager(i,reception){
    var usager = JSON.parse(usagersListe[i]);
    $('.ficheUsager').removeClass('hidden');
    $('.nom').val(usager.nom);
    $('.prenom').val(usager.prenom);
	$('.courriel').val(usager.courriel);
    $('.cellulaire').val(usager.cellulaire);
	$('.index').val(i); 
	x = usager.u_commentaire_banni;
	console.log(x);
	$('.description').val(usager.u_commentaire_banni)

  }
  
  function cacherBoitesLecture() {
    $('.ficheUsager').addClass('hidden');
   // listeContacts();
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
    constructor(courriel, nom, prenom, cellulaire,u_banni, u_commentaire_banni, u_valide ){
      this.courriel = courriel;
      this.nom = nom;
      this.prenom = prenom;
      this.cellulaire = cellulaire;
	  this.u_banni = u_banni;
	  this.u_commentaire_banni = u_commentaire_banni;
	  this.u_valide = u_valide
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
	 }

   function bannir(){
	   	courriel = document.getElementById("courriel").value;
		i = document.getElementById("index").value;
		var x = document.getElementById("description").value;
		if (x.trim()!=""){
			alert('Ahora si, a bannir'); 
		    $.ajax({
              type        : 'POST', 
              url         : 'index.php?Usagers&action=bannirUsager', 
              data: {courriel:courriel,description:x},
			   success: function(json) {
					alert('Ok, Banni',json);
					cacherBoitesLecture();
					$("#rangee"+i).hide();
					},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
            }) 
			}
		else
			alert('No paso');
		
   }
   
	function estDescription() {
		monErr = 0;
		var x = document.getElementById("description").value;
		expr =/^([A-Z][a-zA-Z ]+[\s]?[\-]?[a-zA-Z ]*)$/g;
		if (!x.match(expr)) {
			document.getElementById("errDescription").style.visibility="visible";
			$("#bannir").prop("disabled", true);
			monErr ++;
		}
		else {
			document.getElementById("errDescription").style.visibility="hidden";
			$("#bannir").prop("disabled", false);
		}	
	return (monErr);	
}
  </script>
  <style>
  #feedback { font-size: 0.9em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin-left: 5px; padding: 0em; font-size: 0.8em; }
  </style>
        
 