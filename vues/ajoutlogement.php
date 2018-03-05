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
<script src="js/managePhotos.js"></script>
<main>
		<?php $courriel = $_SESSION["courriel"];
		   $evaluation = null; ?>
		<div class="container">
		<input id='courriel' type="hidden" name="country" value="<?= $courriel?>">
		<form id="form_ajoute" onsubmit="return validateFormLogement()" action="index.php?Logement&action=enregistrerLogement" method="post"> <!--  -->
		<h3>Ajouter un logement</h3>
		<fieldset style="border:2px groove">
		<legend>Adresse</legend>
        <div class="form-group row">
			<div class="col-lg-3">
				<label for="apt">Appartement</label>
				<input type="text" class="form-control" name="apt" onblur="estApt()">
				<span id="errApt" style="color:red; visibility:hidden">* Numéro d'appartement invalide ou requis</span>
			</div>
			<div class="col-lg-3">
				<label for="no_civique">Exterieur:</label>
				<input type="text" class="form-control" name="no_civique" onblur="estNbCivique()" value='2030' required>
				<span id="errNbCivique" style="color:red; visibility:hidden">* Numéro invalide ou requis</span>
			</div>	
			<div class="col-lg-3">
				<label for="rue">Rue</label>
				<input type="rue" class="form-control" name="rue" onblur="estRue()" value='Pie-IX'required>
				<span id="errRue" style="color:red; visibility:hidden">* Rue invalide ou requise</span>
			</div>
			<div class="col-lg-3">
			    <label for="code_postal">Code postal</label>
				<input type="text" class="form-control" name="code_postal" onblur="estCodePostal()" value='H1V-2C8' required>
				<span id="errCodePostal" style="color:red; visibility:hidden">* Code Postal invalide ou requis</span>
			</div>	
		</div>
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="ville">Ville</label>
				<input type="text" class="form-control" name="ville" onblur="estVille()" value='Montreal' required>
				<span id="errVille" style="color:red; visibility:hidden">* Ville invalide ou requise</span>
			</div>
			<div class="col-lg-4">
				<label for="province">Province</label>
				<input type="text" class="form-control" name="province" onblur="estProvince()" value='Quebec' required>
				<span id="errProvince" style="color:red; visibility:hidden">* Province invalide ou requise</span>
			</div>
			<div class="col-lg-4">
				<label for="pays">Pays</label>
				<input type="text" class="form-control" name="pays" onblur="estPays()" value='Canada' required>
				<span id="errPays" style="color:red; visibility:hidden">* Pays invalide ou requis</span>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="latitude">Latitude:</label>
				<input type="text" class="form-control" name="latitude" >
				<span id="errLat" style="color:red; visibility:hidden">* Longitude invalide ou requis, cliquez sur le bouton Valider Adresse</span>
			</div>
			<div class="col-lg-4">
				<label for="longitude">Longitude:</label>
				<input type="text" class="form-control" name="longitude" >
				<span id="errLong" style="color:red; visibility:hidden">* Longitude invalide ou requis, cliquez sur le bouton Valider Adresse </span>
			</div>
			<div class="col-lg-4">
				<button type='button' onclick="ValiderAdresse()" class="btn btn-orange">Valider Adresse</button>
			</div>
		</div>
		</fieldset>
		<hr>
		<div class="col-lg-4">	
			<label>Type de logement</label>
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
				<input type="text" class="form-control" name="prix" value='160' onblur="estPrix()" required>
				<span id="errPrix" style="color:red; visibility:hidden">* Prix invalide ou requis</span>				
			</div>
			<div class="col-lg-4">
				<label for="prix">Frais de nettoyage</label>
				<input type="text" class="form-control" name="frais_nettoyage" value='35' onblur="estFraisNettoyage()" required>
				<span id="errFraisNettoyage" style="color:red; visibility:hidden">* Frais de nettoyage invalide ou requis</span>				
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-12">	
				<label for="description">Description</label>
				<textarea rows="6" cols="100" name="description" onblur="estDescription()" required>Esta es una descripcion</textarea>
				<span id="errDescription" style="color:red; visibility:hidden">* Description invalide ou requis</span>
			</div>
		</div><hr>
		<fieldset style="border:2px groove">
		<legend>Nombres</legend>
		<div class="form-group row">
			<div class="col-lg-2">			
				<label for="nb_personnes">Personnes</label>
				<input type="number" class="form-control" name="nb_personnes" value='5' onblur="estNbPersonnes()" required>
				<span id="errNbPersonnes" style="color:red; visibility:hidden">* Nombre de personnes invalide ou requis</span>
			</div>
			<div class="col-lg-2">			
				<label for="nb_chambres">Chambres</label>
				<input type="number" class="form-control" name="nb_chambres" value='4' onblur="estNbChambres()" required>
				<span id="errNbChambres" style="color:red; visibility:hidden">* Nombre de chambres invalide ou requis</span>
			</div>
			<div class="col-lg-2">			
				<label for="nb_lits">Lits</label>
				<input type="number" class="form-control" name="nb_lits" value='3' onblur="estNbLits()" required>
				<span id="errNbLits" style="color:red; visibility:hidden">* Nombre de lits invalide ou requis</span>
			</div>
	<!--	</div>
		<div class="form-group row"> -->
			<div class="col-lg-2">			
				<label for="nb_salle_de_bain">Salles de bain</label>
				<input type="number" class="form-control" onblur="estNbSalleDeBain()" value='2' name="nb_salle_de_bain">
				<span id="errNbSalleDeBain" style="color:red; visibility:hidden">* Nombre de salle de bain invalide ou requis</span>
			</div>
			<div class="col-lg-2">
				<label for="nb_demi_salle_de_bain">Demi-salles de bain</label>
				<input type="number" class="form-control" onblur="estNbDemiSalleDeBain()" value='1' name="nb_demi_salle_de_bain">
				<span id="errNbDemiSalleDeBain" style="color:red; visibility:hidden">* Nombre de demi salle de bain invalide ou requis</span>
			</div>
		</div>
		</fieldset>
		<br>
		<fieldset style="border:2px groove">
		<legend>Items </legend>
			<div class="form-group row">
				<div class="col-lg-2">
					<input type="checkbox" name="est_stationnement" checked data-toggle="toggle">
					<p>Stationnement</p>
				</div>	  
				<div class="col-lg-2">
					<input type="checkbox" name="est_wifi" data-toggle="toggle">
					<p>Wifi</p>
				</div>	  
				<div class="col-lg-2">	

					<input type="checkbox" name="est_cuisine" data-toggle="toggle">
					<p>Cuisine</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_tv" data-toggle="toggle">
					<p>Télévision</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_fer_a_repasser" data-toggle="toggle">
					<p>Fer à reppaser</p>
				</div>
			</div>	
			<div class="form-group row">
				<div class="col-lg-2">

					<input type="checkbox" name="est_ceintres" data-toggle="toggle">
					<p>Cintres</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_seche_cheveux" data-toggle="toggle">
					<p>Séche-cheveux</p>
				</div>	  
				<div class="col-lg-2">

					<input type="checkbox" name="est_climatise" data-toggle="toggle">
					<p>Clima</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_laveuse" data-toggle="toggle">
					<p>Laveuse</p>
				</div>	  
				<div class="col-lg-2">
					<input type="checkbox" name="est_secheuse" data-toggle="toggle">
					<p>Sécheuse</p>
				</div>
				<div class="col-lg-2">
					<input type="checkbox" name="est_chauffage" data-toggle="toggle">
					<p>Chauffage</p>
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
								<input id="multiplesPhotos" name="files[]" type="file" multiple="" accept="image/*" onchange="prePhotos(this)" style="display:none;"/>
							</label>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 1</legend> -->
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 1 
						<input type="file" id="image0" name="image0" accept="image/*" onchange="readURL(this);" id="0" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece0' name='piece0' style="display:none;" >
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece0 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>
					</label>
					<button id="trash0" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo0" name="photo0" style="width:250px; height:auto;" />  
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 2
						<input type="file" name="image1" accept="image/*" onchange="readURL(this);" id="1" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece1' name='piece1'style="display:none;" >
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece1 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash1" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo1" name="photo1" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 3
						<input type="file" name="image2" accept="image/*" onchange="readURL(this);" id="2" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece2' name='piece2'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece2 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>
					</label>
					<button id="trash2" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo2" name="photo2" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 4
						<input type="file" name="image3" accept="image/*" onchange="readURL(this);" id="3" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece3' name='piece3'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece3 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash3" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo3" name="photo3" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 2</legend> -->
			<div class="row justify-content-md-center">			
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 5
						<input type="file" name="image4" accept="image/*" onchange="readURL(this);" id="4" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece4' name='piece4' style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece4 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash4" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo4" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 6				
						<input type="file" name="image5" accept="image/*" onchange="readURL(this);" id="5" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece5' name='piece5' style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece5 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash5" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo5" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 7				
						<input type="file" name="image6" accept="image/*" onchange="readURL(this);" id="6" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece6' name='piece6' style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece2 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash6" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo6" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 8				
						<input type="file" name="image7" accept="image/*" onchange="readURL(this);" id="7" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece7' name='piece7' style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece7 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash7" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo7" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 3</legend> -->
			<div class="row justify-content-md-center">				
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 9				
						<input type="file" name="image8" accept="image/*" onchange="readURL(this);" id="8" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece8' name='piece8'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece8 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash8" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo8" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 10			
						<input type="file" name="image9" accept="image/*" onchange="readURL(this);" id="9" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece9' name='piece9'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece9 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash9" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo9" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 11				
						<input type="file" name="image10" accept="image/*" onchange="readURL(this);" id="10" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece10' name='piece10' style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece10 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash10" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo10" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 12				
						<input type="file" name="image11" accept="image/*" onchange="readURL(this);" id="11" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece11' name='piece11'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece11 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash11" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>
					<img src=""  id="photo11" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 4</legend> -->
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 13
						<input type="file" name="image12" accept="image/*" onchange="readURL(this);" id="12" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece12' name='piece12'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece12 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash12" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo12" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 14				
						<input type="file" name="image13" accept="image/*" onchange="readURL(this);" id="13" id="fileToUpload" style="display:none;"/>
					    <select class="form-control" id='piece13' name='piece13'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece13 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash13" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo13" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 15				
						<input type="file" name="image14" accept="image/*" onchange="readURL(this);" id="14" id="fileToUpload" style="display:none;"/>
					    <select class="form-control" id='piece14' name='piece14'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece14 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash14" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo14" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 16				
						<input type="file" name="image15" accept="image/*" onchange="readURL(this);" id="15" id="fileToUpload" style="display:none;"/>
						<select class="form-control" id='piece15' name='piece15'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece2 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>
					</label>
					<button id="trash15" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo15" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 5</legend> -->
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 17				
						<input type="file" name="image16" accept="image/*" onchange="readURL(this);" id="16" id="fileToUpload" style="display:none;"/>
					    <select class="form-control" id='piece16' name='piece16'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece16 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
					</label>
					<button id="trash16" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo16" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 18				
						<input type="file" name="image17" accept="image/*" onchange="readURL(this);" id="17" id="fileToUpload" style="display:none;"/>
						<select class="form-control" id='piece17' name='piece17'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece17 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>
					</label>
					<button id="trash17" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo17" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 19				
						<input type="file" name="image18" accept="image/*" onchange="readURL(this);" id="18" id="fileToUpload" style="display:none;" />
						<select class="form-control" id='piece18' name='piece18'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece18 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>
					</label>
					<button id="trash18" type="button" class="btn" style="display:none" onclick="removePhoto(id)">
						<i class="fa fa-trash"></i>
					</button>					
					<img src=""  id="photo18" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 20				
						<input type="file" name="image19" accept="image/*" onchange="readURL(this);" id="19" id="fileToUpload" style="display:none;" />
					    <select class="form-control" id='piece19' name='piece19'style="display:none;">
							<?php
							foreach($donnees["Pieces"] as $piece)
								{
									if ($piece->lireIdPiece() == $id_Piece19 )
										echo "<option value=" . $piece->lireIdPiece() ." selected ='selected' >" . $piece->lireDescriptionPiece() . "</option>";
									else 
										echo "<option value=" . $piece->lireIdPiece() . ">" . $piece->lireDescriptionPiece() . "</option>";        
								}
							?>
						</select>						
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
       <button onclick ="window.location.href='index.php'" class="btn btn-orange">Accueil</button>
		<input type="submit" value="Envoyer"/>
    </form>
	</div>
	</div>
</main>

