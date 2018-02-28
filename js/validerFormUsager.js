/*
* Fichier: valideFormUsager.js
* fonction validateForm
* Autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats
* Date 21 février 2018
*/

/*
* 
* fonction validateForm
* Paramètres: aucun
* Description: valider le formulaire une fois que vous avez cliqué sur le bouton « submit »
*/

var typepaiement = null;
// console.log(typepaiement);

function validateForm() {    
	cleanErreurs();
	err = 0 ; 					
	err = estCourriel();			
	err = estMotdePasse();				
	err = estConfirmaMotdePasse();			
	err = estNom();		
	err = estPreNom();	
	err = estCellulaire();	
	if (err != 0) { 
        console.log(err);
		alert ("Le formulaire est invalide");
		return false;
	}
	else {
		cleanErreurs();
		return true;
	}
}

/*
* 
* fonction cleanErreurs
* Paramètres: aucun
* Description: fait disparaître les messages d'erreur
*/

function cleanErreurs()  {  
	document.getElementById("errCourriel").style.visibility="hidden";
	document.getElementById("errMot_de_passe").style.visibility="hidden";
	document.getElementById("errConfirmaMotdePasse").style.visibility="hidden";
	document.getElementById("errNom").style.visibility="hidden";
	document.getElementById("errPrenom").style.visibility="hidden";
	document.getElementById("errCellulaire").style.visibility="hidden";
	return;
}

function estCourriel() { // pour valider le courriel
	monErr = 0;
	var x = document.forms["ajoutUsager"]["courriel"].value;
	expr =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!x.match(expr)) {
		document.getElementById("errCourriel").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errCourriel").style.visibility="hidden";
	}	
	return (monErr);
}

function estMotdePasse() { // pour valider le môt de passe
	monErr = 0;
	var x = document.forms["ajoutUsager"]["mot_de_passe"].value;		
	expr =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/g;
	if (!x.match(expr)) {
		document.getElementById("errMot_de_passe").style.visibility="visible";
		monErr++ ;
	}
	else {
		document.getElementById("errMot_de_passe").style.visibility="hidden";		
	}
	return (monErr);
}

function estConfirmaMotdePasse() {  // pour valider la confirmation du môt de passe
	monErr = 0;
	var x = document.forms["ajoutUsager"]["mot_de_passe"].value;
	var y = document.forms["ajoutUsager"]["confirma_mot_de_passe"].value;
	if (x != y) {
		document.getElementById("errConfirmaMotdePasse").style.visibility="visible";
		monErr ++;
	}
		else {
		document.getElementById("errConfirmaMotdePasse").style.visibility="hidden";		
	}
	return (monErr);
}

function estNom() { // pour valider le nom
	monErr = 0;
	var x = document.forms["ajoutUsager"]["nom"].value;
	expr =/^[A-Z][a-zA-Z ]+$\s?/g;
	if (!x.match(expr)) {
		document.getElementById("errNom").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errNom").style.visibility="hidden";
	}
	return (monErr);	
}

function estPreNom() { // pour valider le prenom
	monErr = 0;
	var x = document.forms["ajoutUsager"]["prenom"].value;
	expr =/^[A-Z][a-zA-Z ]+$\s?/g;
	if (!x.match(expr)) {
		document.getElementById("errPrenom").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errPrenom").style.visibility="hidden";
	}
	return (monErr);	
}


function estCellulaire() { // pour valider le téléphone
	monErr = 0;
	var x = document.forms["ajoutUsager"]["cellulaire"].value;
	expr =/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/g;
	if (!x.match(expr)) {
		document.getElementById("errCellulaire").style.visibility="visible";
		monErr ++;
	}
	else {
		document.getElementById("errCellulaire").style.visibility="hidden";
	}
	return (monErr);				
}



	
/*
* 
* fonction: openType
* Paramètres: evt, typePay
* Description: pour afficher le formulaire selon le type choisi (onglet)
*/

function openType(evt, typePay) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(typePay).style.display = "block";
    evt.currentTarget.className += " active";
	typepaiement = typePay;
	console.log(typepaiement);
	return 
}			
			
			
			
			
			
			
			
			
			
			