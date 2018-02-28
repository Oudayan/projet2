<?php
    /** 
	* @ file	ajoutlogement.php
	* @ autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
	* @ version 1.1
	* @ date    19 février 2018
	* @ brief 	formulaire pour ajouter un logement 
	*
	* @ details 
	*/ 
?>
<!-- <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->

<style>


</style>
<script src="js/validerFormLogement.js"></script>
<main>
		<?php $courriel = $_SESSION["courriel"];
		   $evaluation = null ?>
		<div class="container">
		<form id="form_ajoute" onsubmit="return validateForm()" action="index.php?Presenta&action=ajoutlogement" method="post">
		<h3>Ajouter un logement</h3>
        <div class="form-group row">
			<div class="col-lg-3">
				<label for="apt">Appartement</label>
				<input type="text" class="form-control" name="apt" onblur="estApt()">
				<span id="errApt" style="color:red; visibility:hidden">* Numéro d'appartement invalide ou requis</span>
			</div>
			<div class="col-lg-3">
				<label for="no_civique">Exterieur:</label>
				<input type="text" class="form-control" name="no_civique" onblur="estNbCivique()" required>
				<span id="errNbCivique" style="color:red; visibility:hidden">* Numéro invalide ou requis</span>
			</div>	
			<div class="col-lg-3">
				<label for="rue">Rue</label>
				<input type="rue" class="form-control" name="rue" onblur="estRue()" required>
				<span id="errRue" style="color:red; visibility:hidden">* Rue invalide ou requise</span>
			</div>
			<div class="col-lg-3">
			    <label for="code_postal">Code postal</label>
				<input type="text" class="form-control" name="code_postal" onblur="estCodePostal()" required>
				<span id="errCodePostal" style="color:red; visibility:hidden">* Code Postal invalide ou requis</span>
			</div>	
		</div>
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="ville">Ville</label>
				<input type="text" class="form-control" name="ville" onblur="estVille()" required>
				<span id="errVille" style="color:red; visibility:hidden">* Ville invalide ou requise</span>
			</div>
			<div class="col-lg-4">
				<label for="province">Province</label>
				<input type="text" class="form-control" name="province" onblur="estProvince()" required>
				<span id="errProvince" style="color:red; visibility:hidden">* Province invalide ou requise</span>
			</div>
			<div class="col-lg-4">
				<label for="pays">Pays</label>
				<input type="text" class="form-control" name="pays" onblur="estPays()" required>
				<span id="errPays" style="color:red; visibility:hidden">* Pays invalide ou requis</span>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="latitude">Latitude:</label>
				<input type="text" class="form-control" name="latitude" >
			</div>
			<div class="col-lg-4">
				<label for="longitude">Longitude:</label>
				<input type="text" class="form-control" name="longitude" >
			</div>
		</div>
		
		<div class="col-lg-4">	
			<Label>Type de logement</label>
            <select class="form-control" name='id_TypeLogement'>
				<?php
                foreach($donnees["TypeLogements"] as $Tlogement)
                    {
                    if ($Tlogement->lireIdTypeLogement() == $id_TypeLogement )
                        echo "<option value=" . $Tlogement->lireIdTypeLogement() ." selected ='selected' >" . $Tlogement->lireTypeLogement() . "</option>";
                    else 
                        echo "<option value=" . $Tlogement->lireIdTypeLogement() . ">" . $Tlogement->lireTypeLogement() . "</option>";        
                        }
				?>                        
            </select>
		</div>		
	<hr>
	<div class="container">	
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="prix">Prix</label>
				<input type="text" class="form-control" name="prix" onblur="estPrix()" required>
				<span id="errPrix" style="color:red; visibility:hidden">* Prix invalide ou requis</span>				
			</div>
			<div class="col-lg-8">	
				<label for="description">Description</label>
				<textarea rows="6" cols="100" name="description" onblur="estDescription()"></textarea>
				<span id="errDescription" style="color:red; visibility:hidden">* Description invalide ou requis</span>
			</div>
		</div><hr>
		<fieldset style="border:2px groove">
		<legend>Nombres</legend>
		<div class="form-group row">
			<div class="col-lg-2">			
				<label for="nb_personnes">Personnes</label>
				<input type="number" class="form-control" name="nb_personnes" onblur="estNbPersonnes()" required>
				<span id="errNbPersonnes" style="color:red; visibility:hidden">* Nombre de personnes invalide ou requis</span>
			</div>
			<div class="col-lg-2">			
				<label for="nb_chambres">Chambres</label>
				<input type="number" class="form-control" name="nb_chambres" onblur="estNbChambres()" required>
				<span id="errNbChambres" style="color:red; visibility:hidden">* Nombre de chambres invalide ou requis</span>
			</div>
			<div class="col-lg-2">			
				<label for="nb_lits">Lits</label>
				<input type="number" class="form-control" name="nb_lits" onblur="estNbLits()" required>
				<span id="errNbLits" style="color:red; visibility:hidden">* Nombre de lits invalide ou requis</span>
			</div>
	<!--	</div>
		<div class="form-group row"> -->
			<div class="col-lg-2">			
				<label for="nb_salle_de_bain">Salles de bain</label>
				<input type="number" class="form-control" onblur="estNbSalleDeBain()" name="nb_salle_de_bain">
				<span id="errNbSalleDeBain" style="color:red; visibility:hidden">* Nombre de salle de bain invalide ou requis</span>
			</div>
			<div class="col-lg-2">
				<label for="nb_demi_salle_de_bain">Demi-salles de bain</label>
				<input type="number" class="form-control" onblur="estNbDemiSalleDeBain()" name="nb_demi_salle_de_bain">
				<span id="errNbDemiSalleDeBain" style="color:red; visibility:hidden">* Nombre de demi salle de bain invalide ou requis</span>
			</div>
		</div>
		</fieldset>
		<br>
		<fieldset style="border:2px groove">
		<legend>Items </legend>
			<div class="form-group row">
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_stationnement">
					<input type="checkbox" class="form-check-input" name="est_stationnement">Stationnement
					</label>
					</div>
				</div>	  
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_Wifi">
					<input type="checkbox" class="form-check-input" name="est_Wifi">Wifi
					</label>
					</div>
				</div>	  
				<div class="col-lg-2">	
					<div class="form-check">
					<label for="est_cuisine">
					<input type="checkbox" class="form-check-input" name="est_cuisine">Cuisine
					</label>
					</div>
				</div>
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_tv">
					<input type="checkbox" class="form-check-input" name="est_tv">TV
					</label>
					</div>				
				</div>
				<div class="col-lg-2">
					<div class="form-check">
						<label class="form-check-label" for="est_fer_a_repasser">
						<input type="checkbox" class="form-check-input" name="est_fer_a_repasser">Fer à reppaser
						</label>
					</div>	
				</div>
			</div>	
			<div class="form-group row">
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_ceintres">
					<input type="checkbox" class="form-check-input" name="est_ceintres">Cintres
					</label>
					</div>
				</div>
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_seche_cheveux">
					<input type="checkbox" class="form-check-input" name="est_seche_cheveux">Seche chevaux
					</label>
					</div>
				</div>	  
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_climatise">
					<input type="checkbox" class="form-check-input" name="est_climatise">Clima
					</label>
					</div>
				</div>
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_laveuse">
					<input type="checkbox" class="form-check-input" name="est_laveuse">Laveuse
					</label>
					</div>
				</div>	  
				<div class="col-lg-2">
					<div class="form-check">
					<label for="est_chauffage">
					<input type="checkbox" class="form-check-input" name="est_chauffage">Secheuse
					</label>
					</div>
				</div>
			</div>
		</fieldset>
		<!-- Photo -->
	    <fieldset style="border:2px groove">
		<legend>Photos</legend>
			<div id="monConteneur">
				<legend>Choix multiple des photos</legend>
				<div class="row justify-content-md-center">
					<div class="col-lg-12 col-md-auto">
						<p>Seulement JPEG,PNG,JPG</p>
					</div>	
					<div class="col-lg-12 col-md-auto">
						<div id="filediv">
							<label class="btn btn-primary">
								<i class="fa fa-upload"></i> Des photos ... 
								<input id="multiplesPhotos" name="files[]" type="file" multiple="" onchange="prePhotos(this)" style="display:none;"/>
							</label>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<legend>Photos Section 1</legend>
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 
						<input type="file" name="image0" accept="image/*" onchange="readURL(this);" id="0" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash0" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo0" style="width:250px; height:auto;" />  
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 
						<input type="file" name="image1" accept="image/*" onchange="readURL(this);" id="1" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash1" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo1" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 
						<input type="file" name="image2" accept="image/*" onchange="readURL(this);" id="2" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash2" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo2" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 
						<input type="file" name="image3" accept="image/*" onchange="readURL(this);" id="3" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash3" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo3" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<legend>Photos Section 2</legend>
			<div class="row justify-content-md-center">			
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 
						<input type="file" name="image4" accept="image/*" onchange="readURL(this);" id="4" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash4" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo4" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image5" accept="image/*" onchange="readURL(this);" id="5" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash5" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo5" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image6" accept="image/*" onchange="readURL(this);" id="6" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash6" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo6" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image7" accept="image/*" onchange="readURL(this);" id="7" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash7" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo7" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<legend>Photos Section 3</legend>
			<div class="row justify-content-md-center">				
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image8" accept="image/*" onchange="readURL(this);" id="8" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash8" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo8" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image9" accept="image/*" onchange="readURL(this);" id="9" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash9" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo9" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image10" accept="image/*" onchange="readURL(this);" id="10" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash10" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo10" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image11" accept="image/*" onchange="readURL(this);" id="11" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash11" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo11" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<legend>Photos Section 4</legend>
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 
						<input type="file" name="image12" accept="image/*" onchange="readURL(this);" id="12" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash12" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo12" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image13" accept="image/*" onchange="readURL(this);" id="13" id="fileToUpload" style="display:none;"/>
					</label>
					<button id="trash13" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo13" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image14" accept="image/*" onchange="readURL(this);" id="14" id="fileToUpload" style="display:none;"/>
					</label>
					<button id="trash14" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo14" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image15" accept="image/*" onchange="readURL(this);" id="15" id="fileToUpload" style="display:none;"/>
					</label>
					<button id="trash15" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo15" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
			</div>
			<hr>
			<legend>Photos Section 5</legend>
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image16" accept="image/*" onchange="readURL(this);" id="16" id="fileToUpload" style="display:none;"/>
					</label>
					<button id="trash16" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo16" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image17" accept="image/*" onchange="readURL(this);" id="17" id="fileToUpload" style="display:none;"/>
					</label>
					<button id="trash17" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo17" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image18" accept="image/*" onchange="readURL(this);" id="18" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash18" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo18" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 				
						<input type="file" name="image19" accept="image/*" onchange="readURL(this);" id="19" id="fileToUpload" style="display:none;" />
					</label>
					<button id="trash19" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo19" style="width:250px; height:auto;" />
				</div>
			</div>
		</fieldset>
		<hr>
		<br>
       <button id="btn_create" type="submit" class="btn btn-default">Submit</button>
    </form>
	</div>
	</div>
</main>

<script>
	$
	$
	function readURL(input) {
		console.log(input.id);
		// for(i=0;i<20;i++){
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#photo'+input.id)
						.attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
				$("#photo"+input.id).show();
				$("#trash"+input.id).show();
				$('#monConteneur').hide();	
			}
		// }
	}

	function LongLat(adresse) {
        var markers = Array();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': adresse}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                markers.push(latitude);
                markers.push(longitude);
            }
        });
        console.log(markers[0]);
        return markers;
		}
		
	function prePhotos(input) {
		if (input.files.length >= 20) {
			alert ("Votre choix a dépassé la limite, jusqu'a 20 Photos" )
		}
		files = input.files;
		console.log(files);
		if (input.files.length > 0){
				$('#monConteneur').hide();
			}
			console.log(input.files[0]);
			mesDonnees = JSON.stringify(input.files[0].name);
			console.log(mesDonnees);
	/*		$.ajax({
				url: "vues/upload.php",
				type: "POST",
				data: {input:files},
				success: function (res) {
					//document.getElementById("response").innerHTML = res;
					alert(res);
				},
				error: function(){
					alert('Erreur');
				}
			});*/
		for(i=0;i<input.files.length;i++){
			 $("#photo"+i).show()
				.attr('src','images/Logements/9/' + input.files[i].name); 
			$("#trash"+i).show();
		}
	}
	
	function removePhoto(input){
		i = extractNumbers(input);
		$("#trash"+i).hide();
		$("#photo"+i).hide()
			.attr('src',"");;
		validaBtnMPhotos();
	}
	
	function extractNumbers(str) {
		var thenum = str.replace( /^\D+/g, '');
	return thenum;
	}
	
	function validaBtnMPhotos(){
		photos = 0 ; 
		for (i=0;i<20;i++){
			myPhoto = document.getElementById("photo"+i).width;
			if (myPhoto != 0) {
				photos++;}
		}
		if (photos == 0){
			$('#monConteneur').show();	
		}
	}

</script>