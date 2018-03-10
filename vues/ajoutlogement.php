﻿<?php
    /** 
	* @ file	ajoutlogement.php
	* @ author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
	* @ version 1.1
	* @ date    19 février 2018
	* @ brief 	formulaire pour ajouter un logement 
	*
	*/ 
?>
<!-- <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->

<?php
	for ($i=0;$i<20;$i++){
		${"photo".$i }= "";
		${"id_Piece".$i} = 0; 
	}
    if (isset($donnees['Logement'])) {
        //echo '<PRE>';
        //var_dump($donnees['Photos']);
        //echo '</PRE>';
        $id_logement = $donnees['Logement']->lireIdLogement();
        $titre= "Modification de logement";
        $apt = $donnees['Logement']->lireApt();
        $no_civique = $donnees['Logement']->lireNoCivique();
        $rue = $donnees['Logement']->lireRue();
        $ville = $donnees['Logement']->lireVille();
        $province = $donnees['Logement']->lireProvince();
        $pays = $donnees['Logement']->lirePays();
        $code_postal = $donnees['Logement']->lireCodePostal();
        $latitude = $donnees['Logement']->lireLatitude();
        $longitude = $donnees['Logement']->lireLongitude();
        $id_TypeLogement = $donnees['Logement']->lireIdTypeLogement();
        $prix = $donnees['Logement']->lirePrix();
        $description = $donnees['Logement']->lireDescription();
        $nb_personnes = $donnees['Logement']->lireNbPersonnes();
        $nb_chambres = $donnees['Logement']->lireNbChambres();
        $nb_lits = $donnees['Logement']->lireNbLits();
        $nb_salle_de_bain = $donnees['Logement']->lireNbSalleDeBain();
        $nb_demi_salle_de_bain = $donnees['Logement']->lireNbDemiSalleDeBain();
        $frais_nettoyage = $donnees['Logement']->lireFraisNettoyage();

		if ($donnees['Logement']->lireEstStationnement()==1)
			$est_stationnement = 'checked';
		else
			$est_stationnement = '';
		if ($donnees['Logement']->lireEstWifi()==1)
			$est_wifi = 'checked';
		else
			$est_wifi = '';
		if ($donnees['Logement']->lireEstCuisine()==1)
			$est_cuisine = 'checked';
		else
			$est_cuisine = '';
		if ($donnees['Logement']->lireEstTv()==1)
			$est_tv ='checked' ;
		else
			$est_tv ='' ;
		if ($donnees['Logement']->lireEstFerARepasser())
			$est_fer_a_repasser = 'checked';
		else
			$est_fer_a_repasser = '';
		if ($donnees['Logement']->lireEstCintres())
			$est_cintres ='checked' ;
		else
			$est_cintres ='' ;
		if ($donnees['Logement']->lireEstSecheCheveux())
			$est_seche_cheveux ='checked' ;
		else
			$est_seche_cheveux ='' ;
		if ($donnees['Logement']->lireEstClimatise())
			$est_climatise ='checked' ;
		else
			$est_climatise ='' ;
		if ($donnees['Logement']->lireEstLaveuse())
			$est_laveuse ='checked' ;
		else
			$est_laveuse ='' ;
		if ($donnees['Logement']->lireEstSecheuse())
			$est_secheuse ='checked' ;
		else
			$est_secheuse ='' ;
		if ($donnees['Logement']->lireEstChauffage())
			$est_chauffage ='checked' ;
		else
			$est_chauffage ='' ;
		/*********************  Chargement des photos  *****************/ 
		
		for ($i=0;$i<20;$i++){
			${"photo".$i }= "";
			${"id_Piece".$i} = 0; 
		}		
		$mes_photos= array();
		for ($i=0;$i<count($donnees['Photos']);$i++){
			$mes_photos["photo"][$i] = $donnees['Photos'][$i]->lireCheminPhoto();
			$mes_photos["id_piece"][$i] = $donnees['Photos'][0]->lireIdPiece();
			?>
			<script>
				
			</script>
			<?php
			${"photo".$i }= './' . $donnees['Photos'][$i]->lireCheminPhoto();
			${"id_Piece".$i} = $donnees['Photos'][0]->lireIdPiece(); 
		}
	}
  else {
	  
	$titre= "Ajouter un logement"; $id_logement = '';
	$apt = $no_civique = $rue = $ville = $province = $pays = $code_postal = $latitude = $longitude =  $id_type_logement = "";
	$prix = $description = $nb_personnes = $nb_chambres = $nb_lits = $nb_salle_de_bain = $nb_demi_salle_de_bain = $frais_nettoyage = "";
	$est_stationnement = $est_wifi = $est_cuisine = $est_tv = $est_fer_a_repasser = $est_cintres = $est_seche_cheveux = $est_climatise = $est_laveuse = $est_secheuse = $est_chauffage = "";
  }
?>

<!-- <link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet"> -->
<script src="js/validerFormLogement.js"></script>
<script src="js/managePhotos.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3prxRP0MgiciOnRm7HODXcLJziJ_TJuc"></script>

    <main class="container" onload="checkPhotos()">
        <div class="d-flex justify-content-around mt-3">
            <h1><?= $titre?></h1>
        </div>
		<?php $courriel = $_SESSION["courriel"];
        $evaluation = null; ?>
		<form id="form_ajoute" onsubmit="return validateFormLogement()" action="index.php?Logement&action=enregistrerLogement" method="post"> <!--  -->
			<input name='courriel' id='courriel' type="hidden" value="<?= $courriel?>">
			<input name='id_logement' id='id_logement' type="hidden" value="<?= $id_logement?>">
		<fieldset style="border:2px groove" class="p-2">
		<legend>Adresse</legend>
        <div class="form-group row">
			<div class="col-lg-3">
				<label for="apt">Appartement</label>
				<input type="text" class="form-control" name="apt" value='<?= $apt?>' onblur="estApt()">
				<span id="errApt" style="color:red; visibility:hidden">* Numéro d'appartement invalide ou requis</span>
			</div>
			<div class="col-lg-3">
				<label for="no_civique">No Civique</label>
				<input type="text" class="form-control" name="no_civique" value='<?= $no_civique?>' onblur="estNbCivique()" required>
				<span id="errNbCivique" style="color:red; visibility:hidden">* Numéro invalide ou requis</span>
			</div>	
			<div class="col-lg-3">
				<label for="rue">Rue</label>
				<input type="rue" class="form-control" name="rue" value='<?= $rue?>' onblur="estRue()" required>
				<span id="errRue" style="color:red; visibility:hidden">* Rue invalide ou requise</span>
			</div>
			<div class="col-lg-3">
			    <label for="code_postal">Code postal</label>
				<input type="text" class="form-control" name="code_postal" value='<?= $code_postal?>' onblur="estCodePostal()" required>
				<span id="errCodePostal" style="color:red; visibility:hidden">* Code Postal invalide ou requis</span>
			</div>	
		</div>
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="ville">Ville</label>
				<input type="text" class="form-control" name="ville" value='<?= $ville?>' onblur="estVille()" required>
				<span id="errVille" style="color:red; visibility:hidden">* Ville invalide ou requise</span>
			</div>
			<div class="col-lg-4">
				<label for="province">Province</label>
				<input type="text" class="form-control" name="province" value='<?= $province ?>' onblur="estProvince()"required>
				<span id="errProvince" style="color:red; visibility:hidden">* Province invalide ou requise</span>
			</div>
			<div class="col-lg-4">
				<label for="pays">Pays</label>
				<input type="text" class="form-control" name="pays" value='<?= $pays?>' onblur="estPays()" required>
				<span id="errPays" style="color:red; visibility:hidden">* Pays invalide ou requis</span>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-4">
				<label for="latitude">Latitude:</label>
				<input type="text" class="form-control" value='<?= $latitude?>' name="latitude" >
				<span id="errLat" style="color:red; visibility:hidden">* Longitude invalide ou requis, cliquez sur le bouton Valider Adresse</span>
			</div>
			<div class="col-lg-4">
				<label for="longitude">Longitude:</label>
				<input type="text" class="form-control" value='<?= $longitude?>' name="longitude" >
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
				<input type="text" class="form-control" value='<?= $prix?>' name="prix" onblur="estPrix()" required>
				<span id="errPrix" style="color:red; visibility:hidden">* Prix invalide ou requis</span>				
			</div>
			<div class="col-lg-4">
				<label for="prix">Frais de nettoyage</label>
				<input type="text" class="form-control" value='<?= $frais_nettoyage?>' name="frais_nettoyage" onblur="estFraisNettoyage()" required>
				<span id="errFraisNettoyage" style="color:red; visibility:hidden">* Frais de nettoyage invalide ou requis</span>				
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-12">	
				<label for="description">Description</label>
				<textarea rows="6" cols="100" name="description" onblur="estDescription()" required><?= $description?></textarea>
				<span id="errDescription" style="color:red; visibility:hidden">* Description invalide ou requis</span>
			</div>
		</div><hr>
		<fieldset style="border:2px groove" class="p-2">
		<legend>Nombres</legend>
		<div class="form-group row">
			<div class="col-lg-2">			
				<label for="nb_personnes">Personnes</label>
				<input type="number" class="form-control" value='<?= $nb_personnes?>' name="nb_personnes" onblur="estNbPersonnes()" required>
				<span id="errNbPersonnes" style="color:red; visibility:hidden">* Nombre de personnes invalide ou requis</span>
			</div>
			<div class="col-lg-2">			
				<label for="nb_chambres">Chambres</label>
				<input type="number" class="form-control" value='<?= $nb_chambres?>' name="nb_chambres" onblur="estNbChambres()" required>
				<span id="errNbChambres" style="color:red; visibility:hidden">* Nombre de chambres invalide ou requis</span>
			</div>
			<div class="col-lg-2">			
				<label for="nb_lits">Lits</label>
				<input type="number" class="form-control" value='<?= $nb_lits?>' name="nb_lits" onblur="estNbLits()" required>
				<span id="errNbLits" style="color:red; visibility:hidden">* Nombre de lits invalide ou requis</span>
			</div>
	<!--	</div>
		<div class="form-group row"> -->
			<div class="col-lg-2">			
				<label for="nb_salle_de_bain">Salles de bain</label>
				<input type="number" class="form-control" value='<?= $nb_salle_de_bain?>' onblur="estNbSalleDeBain()" name="nb_salle_de_bain">
				<span id="errNbSalleDeBain" style="color:red; visibility:hidden">* Nombre de salle de bain invalide ou requis</span>
			</div>
			<div class="col-lg-2">
				<label for="nb_demi_salle_de_bain">Demi-salles de bain</label>
				<input type="number" class="form-control" value='<?= $nb_demi_salle_de_bain?>' onblur="estNbDemiSalleDeBain()" name="nb_demi_salle_de_bain">
				<span id="errNbDemiSalleDeBain" style="color:red; visibility:hidden">* Nombre de demi salle de bain invalide ou requis</span>
			</div>
		</div>
		</fieldset>
		<br>
		<fieldset style="border:2px groove" class="p-2">
		<legend>Items </legend>
			<div class="form-group row">
				<div class="col-lg-2">
				<div class="form-group d-flex justify-content-between">
					<input type="checkbox" name="est_stationnement" <?= $est_stationnement?> data-toggle="toggle">
					<p>Stationnement</p>
				</div>	  
				</div>
				<div class="col-lg-2">
					<input type="checkbox" name="est_wifi" <?= $est_wifi?> data-toggle="toggle">
					<p>Wifi</p>
				</div>	  
				<div class="col-lg-2">	

					<input type="checkbox" name="est_cuisine" <?= $est_cuisine?> data-toggle="toggle">
					<p>Cuisine</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_tv" <?= $est_tv?> data-toggle="toggle">
					<p>Télévision</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_fer_a_repasser" <?= $est_fer_a_repasser?> data-toggle="toggle">
					<p>Fer à reppaser</p>
				</div>
			</div>	
			<div class="form-group row">
				<div class="col-lg-2">

					<input type="checkbox" name="est_ceintres" <?= $est_cintres?> data-toggle="toggle">
					<p>Cintres</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_seche_cheveux" <?= $est_seche_cheveux?> data-toggle="toggle">
					<p>Séche-cheveux</p>
				</div>	  
				<div class="col-lg-2">

					<input type="checkbox" name="est_climatise" <?= $est_climatise?> data-toggle="toggle">
					<p>Clima</p>
				</div>
				<div class="col-lg-2">

					<input type="checkbox" name="est_laveuse" <?= $est_laveuse?> data-toggle="toggle">
					<p>Laveuse</p>
				</div>	  
				<div class="col-lg-2">
					<input type="checkbox" name="est_secheuse" <?= $est_secheuse?> data-toggle="toggle">
					<p>Sécheuse</p>
				</div>
				<div class="col-lg-2">
					<input type="checkbox" name="est_chauffage" <?= $est_chauffage?> data-toggle="toggle">
					<p>Chauffage</p>
				</div>	
			</div>
		</fieldset>
		<!-- Photo -->
	    <fieldset style="border:2px groove" class="p-2">
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
								<input id="multiplesPhotos" name="files[]" type="file" multiple="" accept="image/*" onchange="prePhotos(this)" style="display:none;" />
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
						<input type="file" name="image0" value="<?= $photo0 ?>" accept="image/*" onchange="readURL(this);" id="0" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo0 ?>"  = id="photo0" name="photo0" style="width:250px; height:auto;" />  
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 2
						<input type="file" name="image1" value="<?= $photo1 ?>"accept="image/*" onchange="readURL(this);" id="1" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo1 ?>"  id="photo1" name="photo1" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 3
						<input type="file" name="image2" value="<?= $photo2 ?>" accept="image/*" onchange="readURL(this);" id="2" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo2 ?>"  id="photo2" name="photo2" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 4
						<input type="file" name="image3" value="<?= $photo3 ?>" accept="image/*" onchange="readURL(this);" id="3" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo3 ?>"  id="photo3" name="photo3" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 2</legend> -->
			<div class="row justify-content-md-center">			
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 5
						<input type="file" name="image4" value="<?= $photo4 ?>" accept="image/*" onchange="readURL(this);" id="4" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo4 ?>"  id="photo4" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 6				
						<input type="file" name="image5" value="<?= $photo5 ?>" accept="image/*" onchange="readURL(this);" id="5" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo5 ?>"  id="photo5" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 7				
						<input type="file" name="image6" value="<?= $photo6 ?>" accept="image/*" onchange="readURL(this);" id="6" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo6 ?>"  id="photo6" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 8				
						<input type="file" name="image7" value="<?= $photo7 ?>" accept="image/*" onchange="readURL(this);" id="7" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo7 ?>"  id="photo7" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 3</legend> -->
			<div class="row justify-content-md-center">				
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 9				
						<input type="file" name="image8" value="<?= $photo8 ?>" accept="image/*" onchange="readURL(this);" id="8" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo8 ?>"  id="photo8" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 10			
						<input type="file" name="image9" value="<?= $photo9 ?>" accept="image/*" onchange="readURL(this);" id="9" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo9 ?>"  id="photo9" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 11				
						<input type="file" name="image10" value="<?= $photo10 ?>" accept="image/*" onchange="readURL(this);" id="10" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo10 ?>"  id="photo10" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 12				
						<input type="file" name="image11" value="<?= $photo11 ?>" accept="image/*" onchange="readURL(this);" id="11" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo11 ?>"  id="photo11" style="width:250px; height:auto;" />
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 4</legend> -->
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 13
						<input type="file" name="image12" value="<?= $photo12 ?>" accept="image/*" onchange="readURL(this);" id="12" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo12 ?>"  id="photo12" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 14				
						<input type="file" name="image13" value="<?= $photo13 ?>" accept="image/*" onchange="readURL(this);" id="13" id="fileToUpload" style="display:none;"/>
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
					<img src="<?= $photo13 ?>"  id="photo13" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 15				
						<input type="file" name="image14" value="<?= $photo14 ?>" accept="image/*" onchange="readURL(this);" id="14" id="fileToUpload" style="display:none;"/>
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
					<img src="<?= $photo14 ?>"  id="photo14" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 16				
						<input type="file" name="image15" value="<?= $photo15 ?>" accept="image/*" onchange="readURL(this);" id="15" id="fileToUpload" style="display:none;"/>
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
					<img src="<?= $photo15 ?>"  id="photo15" style="width:250px; height:auto;" />  <!-- visibility:hidden; -->
				</div>
			</div>
			<hr>
			<!-- <legend>Photos Section 5</legend> -->
			<div class="row justify-content-md-center">
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 17				
						<input type="file" name="image16" value="<?= $photo16 ?>" accept="image/*" onchange="readURL(this);" id="16" id="fileToUpload" style="display:none;"/>
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
					<img src="<?= $photo16 ?>"  id="photo16" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 18				
						<input type="file" name="image17" value="<?= $photo17 ?>" accept="image/*" onchange="readURL(this);" id="17" id="fileToUpload" style="display:none;"/>
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
					<img src="<?= $photo17 ?>"  id="photo17" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 19				
						<input type="file" name="image18" value="<?= $photo18 ?>" accept="image/*" onchange="readURL(this);" id="18" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo18 ?>"  id="photo18" style="width:250px; height:auto;" />
				</div>
				<div class="col-lg-3 col-md-auto">
					<label class="btn btn-success">
						<i class="fa fa-file-image-o"></i> Photo 20				
						<input type="file" name="image19" value="<?= $photo19 ?>" accept="image/*" onchange="readURL(this);" id="19" id="fileToUpload" style="display:none;" />
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
					<img src="<?= $photo19 ?>"  id="photo19" style="width:250px; height:auto;" />
				</div>
			</div>
		</fieldset>
		<hr>
		<br>
        <div class="d-flex justify-content-around mt-3">
            <a href="index.php?Recherche&action=recherche"><button type="button" class="btn btn-lg btn-secondary">Page recherche</button></a>
            <a href="index.php?Proprietaire&action=afficherLogements"><button type="button" class="btn btn-lg btn-bleu">Mes propriétés</button></a>
            <input type="submit" class="btn btn-lg btn-orange" value="Sauvegarder"/>
        </div>
	</div>
    </form>

    <div class="modal fade" id="modalLocation" tabindex="-1" role="dialog" aria-labelledby="modalLocationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="modalLocation-content" class="modal-content">
            </div>
        </div>
    </div>
</main>

<script>
	 function chercherPrix() {
		$.ajax({
			url: 'index.php?Location&action=afficherLocation', 
			type: 'POST',
			data:  { 
				<?= "idLogement: " . $donnees["logement"]->lireIdLogement() . ", "; ?> 
				datesLocation: $("#datesLocation").val(), 
			}, 
			dataType: 'html',
			success: function(donnees) {
				$("#modalLocation-content").empty();
				$("#modalLocation-content").html(donnees);
			}
		});
	}
</script>

