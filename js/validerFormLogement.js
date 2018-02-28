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


function validateForm(){
	cleanErreurs();
	err = 0; 
	err = estApt();
	err = estNbCivique();
	err = estRue();
	err = estCodePostal();
	err = estVille();
	err = estProvince();
	err = estPays();
	err = estPrix();
	err = estDescription();
	err = estNbPersonnes();
	err = estNbChambres();
	err = estNbLits();
	err = estNbSalleDeBain();
	err = estNbDemiSalleDeBain();
	if (err != 0)
	{
		alert ("Le formulaire est invalide");
		return false;
	}
	else {
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
	if (x != null) {
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





			
			
			
			
			
			
			
			
			
			