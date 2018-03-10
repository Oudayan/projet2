/**
 * @file     admin.js
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  2.0
 * @date     5 mars 2018
 * @brief  
 *   
 * @details  
 */
 
  $(document).ready(function() {
        //  $('.content').richText(); 
			afficherUsagersaValider();
			afficherListeUsagers();
			afficherLogementsaValider();
		   // afficherListeLogements();
		
	var span = document.getElementById("closeImg");
	span.onclick = function() { 
    modal.style.display = "none";		
	}
	
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
			  id = "lurangee"+i;
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
			  id = "lvrangee"+i;
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
  
 listeValider = {};
 photosValider = {};
 function afficherListeLogements(){
	    $.ajax({
        url: 'index.php?Logement&action=lireTousLogements',
        type: 'POST',
        dataType: 'json',
        success: function(json) {
          $("#validerLogements").html("");
          $.each(json, function(i, item) {
			  id = "lvrangee"+i;
			  if (item.apt == null)
				  item.apt = '';
			  else 
				  item.apt += '-';
			  	banni = item.u_banni == 1 ? "Banni" : "";
			  valide = item.u_valide != 1 && item.u_banni != 1 ? "À valider" : "";
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
		 document.getElementById("id_logement").value = logement.id_logement;
		$('.ficheLogement').removeClass('hidden');
		$('.mprix').val(logement.prix);
		$('.frais_nettoyage').val(logement.frais_nettoyage);
		$('.courriel').val(logement.courriel);
		$('.type_logement').val(logement.id_type_logement); 
		$('.description').val(logement.description)
		xyz = $('.stationnement');
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
				chemin = "http://127.0.0.1/projet2/"+photosValider[i][j];
				$("#mesPhotos").append(  // ajouter des photos dans la fiche 

			'<img id="myImg'+j+'" class="image" src="'+photosValider[i][j]+'" style="width:120px" >'
				);
			 });
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
		courriel = document.getElementById("vuCourriel").value;
		i = document.getElementById("index").value;
		 $.ajax({
              type        : 'POST', 
              url         : 'index.php?Usagers&action=validerUsager', 
              data: {courriel:courriel},
 		  success: function(json) {
			alert('Ok, validé',json);
			cacherBoitesLecture();
			$("#rangee"+i).hide();
         },
		  error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		}) 
	}
	
	function validerLogement( ) {
		 id_logement = document.getElementById('id_logement').value;
		 i = document.getElementById("vlindex").value;
		 console.log(id_logement);
		 $.ajax({
              type        : 'POST', 
              url         : 'index.php?Logement&action=validerLogement', 
              data: {id_logement:id_logement},
 		  success: function(json) {
			alert('Ok, validé',json);
			cacherBoitesLecture();
			$("#lvrangee"+i).hide();
         },
		  error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		})
	}
	
	function bannirLogement() {
		alert("Allez, bannir");
	}
	function bannirUsager() {
       $('#myModal').modal('show');
      courriel = document.getElementById("vuCourriel").value;
      i = document.getElementById("index").value;
	 }

   function bannir(){
	   	courriel = document.getElementById("vuCourriel").value;
		i = document.getElementById("index").value;
		var x = document.getElementById("description").value;
		if (x.trim()!=""){
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
			afficherListeUsagers();
			}
		else
			alert('Nous avons un probléme');
		
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

    var modal = document.getElementById('myModalimg');
    var modalImg = document.getElementById("img01");
    $('#mesPhotos').click(function (e) {
        console.log(e.target.id);
        var img = document.getElementById(e.target.id);
        modal.style.display = "block";
        modalImg.src = img.src;
    });
