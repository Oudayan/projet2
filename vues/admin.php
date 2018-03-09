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
<head>
<style>
	body {font-family: Arial, Helvetica, sans-serif;}

.image {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.image:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
</head>
<main class="container-fluid" style="height:900px">
        <div class="d-flex justify-content-around mt-3">
            <h1>Tâches d'administrateur</h1>
        </div>
  <div class="row">
	  <aside class="col-lg-3">
		<nav class="nav flex-column nav-pills v-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link " id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerUsagers" role="tab" aria-controls="v-pills-validerUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Valider usagers</a>      
			<a class="nav-link" id="v-pills-listeUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeUsagers" role="tab" aria-controls="v-pills-listeUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Liste d'usagers</a>      
			<div class="dropdown-divider"></div>
			<a class="nav-link active" id="v-pills-validerLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerLogements" role="tab" aria-controls="v-pills-validerLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Valider logements</a>
			<a class="nav-link" id="v-pills-listeLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeLogements" role="tab" aria-controls="v-pills-listeLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Liste des logements</a>
		</nav><!-- nav flex-column -->
	  </aside>
  <section class="tab-usagers tab-content col-lg-9" id="v-pills-tabContent">
      <div class="tableauUserValider tab-pane fade show active" id="v-pills-validerUsagers" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab" style="height:40vh; overflow: scroll;">
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
	  
    <div class="listeUsagers tab-pane fade" id="v-pills-listeUsagers" role="tabpanel" aria-labelledby="v-pills-listeUsagers-tab" style="height:40vh; overflow: scroll;">
      <form class="formSuppMsg" method="POST">
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
	  	 <input type="text" name="actif" value="false" hidden/>
    </form>
    </div><!-- listeUsagers -->
	  
    <div class="validerLogements tab-pane fade" id="v-pills-validerLogements" role="tabpanel" aria-labelledby="v-pills-validerLogements-tab" style="height:20vh; overflow: scroll;" >
   <form class="formSuppMsg" method="POST">
   <table class="table table-sm responsive-sm table-hover display">
	<h6>Logements à valider</h6>
      <thead>
        <tr>
           <th>Numéro </th>
		   <th>Rue </th>
           <th>Ville</th>
           <th>Province</th>
           <th>Pays</th>
           <th>Code Postal</th>
        </tr>
      </thead>
      <tbody id="validerLogements">
      </tbody>
    </table>
	 <input type="text" name="actif" value="false" hidden/>
    </form>
  </div><!-- tab-pane validerLogements-->
	      <div class="messagesEnvoyes tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
        <form class="formSuppMsg" method="POST">
        <table class="table table-sm responsive-sm table-hover display">
          <button type="submit" class="btn btn-orange btn-sm suppMsg"><i class="fa fa-trash"  aria-hidden="false"></i></button>
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
     <form class="ficheLogement hidden">
       <?php include 'ficheLogement.php';?>
     </form> 
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
<script>
  $(document).ready(function() {
        //  $('.content').richText(); 
		//	afficherUsagersaValider();
		//	afficherListeUsagers();
			afficherLogementsaValider();
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
  
   usagersListe = {};
  function afficherListeUsagers() {
    $.ajax({
        url: 'index.php?Usagers&action=afficheListeUsagersJson',
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#tableauListeUsagers").html("");
          $.each(json, function(i, item) {
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
        },
        error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
 
  }; 
  
 logementaValider = {};
 photosValider = {};
 function afficherLogementsaValider(){
	    $.ajax({
        url: 'index.php?Logement&action=LogementaValider',
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#validerLogements").html("");
          $.each(json, function(i, item) {
			 console.log(item);
			  id = "rangee"+i;
			  if (item.apt == null)
				  item.apt = '';
			  else 
				  item.apt += '-';
            $("#validerLogements").append(
                "<tr class='clickable-row' id="+id +" data-href='#' onclick='afficherDetailLogement(" + i + ",true)'>" +
                  "<td>" + item.apt + item.no_civique + "</td>" +
				  "<td>" + item.rue + "</td>" +
                  "<td>" + item.ville + "</td>" +
				  "<td>" + item.province + "</td>" +
				  "<td>" + item.pays + "</td>" +
				  "<td>" + item.code_postal + "</td>" +
                 "</tr>");
				 photosValider[i] = {};
				 $.each(item.Photos, function(j, photo){
					 photosValider[i][j] = item.Photos[j];
				 })
            logementaValider[i] = JSON.stringify(
              new Logement(
				item.id_logement,
                item.apt,
				item.no_civique,
				item.rue,
				item.ville,
				item.province,
				item.pays,
				item.code_postal, 
				item.latitude,
				item.longitude,
				item.id_type_logement,
				item.prix, 
				item.evaluation,
				item.description,
				item.courriel,
				item.nb_personnes,
				item.nb_chambres,
				item.nb_lits,
				item.nb_salle_de_bain,
				item.nb_demi_salle_de_bain,
				item.frais_nettoyage,
				item.est_stationnement,
				item.est_wifi,
				item.est_cuisine,
				item.est_tv,
				item.est_fer_a_repasser,
				item.est_cintres,
				item.est_seche_cheveux,
				item.est_climatise,
				item.est_laveuse,
				item.est_secheuse,
				item.est_chauffage,
				item.l_valide,
				item.l_actif,
				item.l_banni,
				item.l_date_banni,
				item.l_commentaire_banni
              )
            );
			
          });
		  // console.log(logementaValider[0]);
        },
        error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
 }
  
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
	$('.description').val(usager.u_commentaire_banni)
	
  }
  
	  function afficherDetailLogement(i,reception){
		var logement = JSON.parse(logementaValider[i]);
		 console.log(logement);
		$('.ficheLogement').removeClass('hidden');
		$('.mprix').val(logement.prix);
		$('.frais_nettoyage').val(logement.frais_nettoyage);
		$('.courriel').val(logement.courriel);
		$('.type_logement').val(logement.id_type_logement); 
		$('.description').val(logement.description)
		xyz = $('.stationnement');
		console.log(xyz);
		if (logement.est_stationnement == 1) 
			document.getElementById('stationnement').innerHTML = "Oui";
		else
			document.getElementById('stationnement').innerHTML = "-";
		if (logement.est_wifi == 1) 
			document.getElementById('wifi').innerHTML = "Oui";
		else
			document.getElementById('wifi').innerHTML = "-";
		if (logement.est_cuisine == 1) 
			document.getElementById('cuisine').innerHTML = "Oui";
		else
			document.getElementById('cuisine').innerHTML = "-";
		if (logement.est_tv == 1) 
			document.getElementById('tv').innerHTML = "Oui";
		else
			document.getElementById('tv').innerHTML = "-";
		if (logement.est_fer_a_repasser == 1) 
			document.getElementById('fer_a_repasser').innerHTML = "Oui";
		else
			document.getElementById('fer_a_repasser').innerHTML = "-";
		if (logement.est_cintres == 1) 
			document.getElementById('cintres').innerHTML = "Oui";
		else	
			document.getElementById('cintres').innerHTML = "-";
		if (logement.est_seche_cheveux == 1) 
			document.getElementById('seche_a_cheveaux').innerHTML = "Oui";
		else
			document.getElementById('seche_a_cheveaux').innerHTML = "-";
		if (logement.est_climatise == 1) 
			document.getElementById('climatise').innerHTML = "Oui";
		else
			document.getElementById('climatise').innerHTML = "-";
		if (logement.est_laveuse == 1) 
			document.getElementById('laveuse').innerHTML = "Oui";
		else
			document.getElementById('laveuse').innerHTML = "-";
		if (logement.est_secheuse == 1) 
			document.getElementById('secheuse').innerHTML = "Oui";
		else
			document.getElementById('secheuse').innerHTML = "-";
		if (logement.est_chauffage == 1) 
			document.getElementById('chauffage').innerHTML = "Oui";	
		else
			document.getElementById('chauffage').innerHTML = "-";	
		$('.index').val(i);  // Valeur pour avoir le nombre  de ligne, dans le tableau
		$('#mesPhotos').find('img').remove();
		$.each(photosValider[i], function(j, photo){
			console.log(j);
				chemin = "http://127.0.0.1/projet2/"+photosValider[i][j];
				$("#mesPhotos").append(  // ajouter des photos dans la fiche 

			'<img id="myImg'+j+'" class="image" src="'+photosValider[i][j]+'" style="width:120px" >'
				);
			 });
  }
  
  function verifierPhotos() {
	  alert("Fonction photos");
	   $("#lightgallery").lightGallery(); 
	   alert("Fin");
  }
  
  
  function cacherBoitesLecture() {
    $('.ficheUsager').addClass('hidden');
	$('.ficheLogement').addClass('hidden');
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
  
  		class Logement{
		constructor (id_logement, no_civique, apt, rue, ville, province, pays, code_postal, latitude, longitude, id_type_logement, 
		prix, evaluation, description, courriel, nb_personnes, nb_chambres, nb_lits, 
		nb_salle_de_bain, nb_demi_salle_de_bain, frais_nettoyage, 
		est_stationnement, est_wifi, est_cuisine, est_tv, est_fer_a_repasser, est_cintres, est_seche_cheveux, est_climatise, 
		est_laveuse, est_secheuse, est_chauffage, l_valide, l_actif, l_banni, l_date_banni, l_commentaire_banni) {
			this.id_logement=id_logement; 
			this.no_civique=no_civique; 
			this.apt=apt; 
			this.rue=rue; 
			this.ville=ville; 
			this.province=province; 
			this.pays=pays; 
			this.code_postal=code_postal; 
			this.latitude=latitude; 
			this.longitude=longitude; 
			this.id_type_logement=id_type_logement; 
			this.prix=prix; 
			this.evaluation=evaluation; 
			this.description=description; 
			this.courriel=courriel; 
			this.nb_personnes=nb_personnes; 
			this.nb_chambres=nb_chambres; 
			this.nb_lits=nb_lits; 
			this.nb_salle_de_bain=nb_salle_de_bain; 
			this.nb_demi_salle_de_bain=nb_demi_salle_de_bain; 
			this.frais_nettoyage=frais_nettoyage; 
			this.est_stationnement=est_stationnement; 
			this.est_wifi=est_wifi; 
			this.est_cuisine=est_cuisine; 
			this.est_tv=est_tv; 
			this.est_fer_a_repasser=est_fer_a_repasser; 
			this.est_cintres=est_cintres; 
			this.est_seche_cheveux=est_seche_cheveux; 
			this.est_climatise=est_climatise; 
			this.est_laveuse=est_laveuse; 
			this.est_secheuse=est_secheuse; 
			this.est_chauffage=est_chauffage; 
			this.l_valide=l_valide; 
			this.l_actif=l_actif; 
			this.l_banni=l_banni; 
			this.l_date_banni=l_date_banni; 
			this.l_commentaire_banni=l_commentaire_banni;
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

var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
$('#mesPhotos').click(function (e) {
			console.log(e.target.id);
			var img = document.getElementById(e.target.id);
			modal.style.display = "block";
			modalImg.src = img.src;
        });

var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
  </script>
  <style>
  #feedback { font-size: 0.9em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin-left: 5px; padding: 0em; font-size: 0.8em; }
  </style>
        
 