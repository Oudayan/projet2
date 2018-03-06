/*
* Fichier: validerFormLogement.js
* fonction validateForm
* Auteurs: Autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats
*/

/*
* 
* fonction validateForm
* Paramètres: aucun
* Description: valider le formulaire une fois que vous avez cliqué sur le bouton « submit »
*/

function validateFormLogement(){
	cleanErreurs();
	err = 0; 
	err += estApt();
	err += estNbCivique();
	err += estRue();
	err += estVille();
	err += estProvince();
	err += estPays();
	err += estCodePostal();
	err += estLatitude();
	err += estLongitude();
	err += estPrix();
	err += estFraisNettoyage();
	err += estDescription();
	err += estNbPersonnes();
	err += estNbChambres();
	err += estNbLits();
	err += estNbSalleDeBain();
	err += estNbDemiSalleDeBain();
	if (err != 0)
	{
		alert ("Le formulaire est invalide");
		return false;
	}
	else {
			nbCivique = document.forms["form_ajoute"]["no_civique"].value;
			Rue =  document.forms["form_ajoute"]["rue"].value;
			Ville = document.forms["form_ajoute"]["ville"].value;
			Province = document.forms["form_ajoute"]["province"].value;
			codePostal = document.forms["form_ajoute"]["code_postal"].value;
			adresse = nbCivique +' '+ Rue +' '+ Ville + ', '+ Province +' '+codePostal;
		return true;
	}
}

function cleanErreurs(){
	document.getElementById("errApt").style.visibility="hidden";
	document.getElementById("errNbCivique").style.visibility="hidden";
	document.getElementById("errRue").style.visibility="hidden";
	document.getElementById("errCodePostal").style.visibility="hidden";
	document.getElementById("errVille").style.visibility="hidden";
	document.getElementById("errProvince").style.visibility="hidden";
	document.getElementById("errPays").style.visibility="hidden";
	document.getElementById("errPrix").style.visibility="hidden";
	document.getElementById("errDescription").style.visibility="hidden";
	document.getElementById("errNbPersonnes").style.visibility="hidden";
	document.getElementById("errNbChambres").style.visibility="hidden";
	document.getElementById("errNbLits").style.visibility="hidden";
	document.getElementById("errNbSalleDeBain").style.visibility="hidden";
	document.getElementById("errNbDemiSalleDeBain").style.visibility="hidden";
	return;
}

function estApt() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["apt"].value;
	if (x.length != 0) {
		expr =/^([A-Z0-9]*[\s]?[a-zA-Z0-9]+[\s]?[\-]?[a-zA-Z ]*)$/g;
		if (!x.match(expr)) {
			document.getElementById("errApt").style.visibility="visible";
			monErr ++;
			}
	}
	document.getElementById("errApt").style.visibility="hidden";
	return (monErr);
}

function estNbCivique() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["no_civique"].value;
	expr =/^([A-Z0-9]*[\s]?[a-zA-Z0-9]+[\s]?[\-]?[a-zA-Z ]*)$/g;
	if (!x.match(expr)) {
		document.getElementById("errNbCivique").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNbCivique").style.visibility="hidden";
	}	
	return (monErr);
}

function estRue() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["rue"].value;
	expr =/^([A-Z0-9]*[\s]?[a-zA-Z0-9]+[\s]?[\-]?[a-zA-Z ]*)$/g;
	if (!x.match(expr)) {
		document.getElementById("errRue").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errRue").style.visibility="hidden";
	}	
	return (monErr);	
}

function estCodePostal() { // pour valider le code postal
	monErr = 0;
	var x = document.forms["form_ajoute"]["code_postal"].value;
	x = x.toString().trim();
	//console.log("valeur 2 de x:" + x);
	var expr = /([ABCEGHJKLMNPRSTVXY]\d)([ABCEGHJKLMNPRSTVWXYZ]\d){2}/i;
	x = expr.test(x.toString().replace(/\W+/g, '')); 
	//console.log("valeur 3 de x :" + x);	
	if (!x) {
		document.getElementById("errCodePostal").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errCodePostal").style.visibility="hidden";
	}
	// console.log(monErr);
	return (monErr);
} 

function estVille() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["ville"].value;
	expr =/^([A-Z][a-zA-Z ]+[\s]?[\-]?[a-zA-Z ]*)$/g;
	if (!x.match(expr)) {
		document.getElementById("errVille").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errVille").style.visibility="hidden";
	}	
	return (monErr);	
}

function estProvince() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["province"].value;
	expr =/^([A-Z][a-zA-Z ]+[\s]?[\-]?[a-zA-Z ]*)$/g;	
	if (!x.match(expr)) {
		document.getElementById("errProvince").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errProvince").style.visibility="hidden";
	}	
	return (monErr);	
}

function estPays() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["pays"].value;
	expr =/^([A-Z][a-zA-Z ]+[\s]?[\-]?[a-zA-Z ]*)$/g;
	if (!x.match(expr)) {
		document.getElementById("errPays").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errPays").style.visibility="hidden";
	}	
	return (monErr);	
}
function estLatitude() {
	monErr = 0;
	x = document.forms["form_ajoute"]["latitude"].value;
	if (x.length==0){
		monErr = 1;
		document.getElementById("errLat").style.visibility="visible"; }
	return (monErr);
}

function estLongitude() {
	monErr = 0;
	x = document.forms["form_ajoute"]["longitude"].value;
	console.log(x.length)
	if (x.length==0) {
		monErr = 1;
		document.getElementById("errLong").style.visibility="visible";
	}
	return (monErr);
}

function estPrix() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["prix"].value;
	if (x<=0) {
		document.getElementById("errPrix").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errPrix").style.visibility="hidden";
	}	
	return (monErr);	
}

function estFraisNettoyage() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["frais_nettoyage"].value;
	if (x<=0) {
		document.getElementById("errFraisNettoyage").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errFraisNettoyage").style.visibility="hidden";
	}	
	return (monErr);	
}

function estDescription() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["description"].value;
	expr =/^([A-Z][a-zA-Z ]+[\s]?[\-]?[a-zA-Z ]*)$/g;
	if (!x.match(expr)) {
		document.getElementById("errDescription").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errDescription").style.visibility="hidden";
	}	
	return (monErr);	
}

function estNbPersonnes() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["nb_personnes"].value;
	if (x<0) {
		document.getElementById("errNbPersonnes").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNbPersonnes").style.visibility="hidden";
	}	
	return (monErr);	
}

function estNbChambres() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["nb_chambres"].value;
	if (x<0) {
		document.getElementById("errNbChambres").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNbChambres").style.visibility="hidden";
	}	
	return (monErr);	
}

function estNbLits() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["nb_lits"].value;
	if (x<0) {
		document.getElementById("errNbLits").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNbLits").style.visibility="hidden";
	}	
	return (monErr);	
}

function estNbSalleDeBain() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["nb_salle_de_bain"].value;
	if (x<0) {
		document.getElementById("errNbSalleDeBain").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNbSalleDeBain").style.visibility="hidden";
	}	
	return (monErr);	
}

function estNbDemiSalleDeBain() {
	monErr = 0;
	var x = document.forms["form_ajoute"]["nb_demi_salle_de_bain"].value;
	if (x<0) {
		document.getElementById("errNbDemiSalleDeBain").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNbDemiSalleDeBain").style.visibility="hidden";
	}	
	return (monErr);	
}

function ValiderAdresse() {
	nbCivique = document.forms["form_ajoute"]["no_civique"].value;
	Rue =  document.forms["form_ajoute"]["rue"].value;
	Ville = document.forms["form_ajoute"]["ville"].value;
	Province = document.forms["form_ajoute"]["province"].value;
	codePostal = document.forms["form_ajoute"]["code_postal"].value;
	adresse = nbCivique +' '+ Rue +' '+ Ville + ', '+ Province +' '+codePostal;
//	adresse =  Ville + ', '+ Province;
	console.log(adresse);
	LongLat(adresse);
	return
}

function LongLat(adresse) {
    var markers = Array();
    var geocoder = new google.maps.Geocoder();
	console.log(adresse);
    geocoder.geocode({'address': adresse}, function(results, status) {
		console.log(status);
		if (status == google.maps.GeocoderStatus.OK) {
			var latitude = results[0].geometry.location.lat();
			var longitude = results[0].geometry.location.lng();
			document.forms["form_ajoute"]["latitude"].setAttribute('value',latitude);
			document.forms["form_ajoute"]["longitude"].setAttribute('value',longitude);
			$('#errLat').hide();
			$('#errLong').hide();
			//document.getElementsByName('latitude').value=latitude;
			return 
		}
		 else {
            alert("Geocode was not successful for the following reason: " + status);
        }
	});
	console.log(markers);
	return markers;
}
