<?php
/** 
	* @ file	ajoutUsager.php
	* @ author	Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats
	* @ version 2.1
	* @ date     16 février 2018
	* @ brief 	 formulaire d'ajout de un nouvel utilisateur 
	*
	* @ details 
	*/	
        
?>
<script src="js/validerFormUsager.js"></script>
	<main>
        <div class="d-flex justify-content-around mt-3">
            <h1>Inscription d'un usager</h1>
        </div>
        <?php
       //  var_dump($donnees);  
         if (!empty($_POST))
            {$valide = ValideUser();  // Appeler la fonction pour valider les donnes du formulaire d<utilisateur
             /* var_dump($valide);*/ 
            }
         else 
         {
            $valide["courriel"] = $valide["nom"] = $valide["prenom"] = $valide["cellulaire"] = $valide["mot_de_passe"] = $valide["c_mot_de_passe"] =
            $valide["Adresse"] = $valide["CodePostal"] = $valide["Quartier"] =
            $valide["id_contact"] = $valide["id_type_usager"] = $valide["id_paiement"]= "";
         }
            if (!empty($_POST)) // Si les donnees son dans le formulaire 
             {
                $courriel = testdatainput($_POST["Courriel"]);
                $nom = $_POST["Nom"];
                $prenom = $_POST["Prenom"];
				$cellulaire = $_POST["cellulaire"];
                $mot_de_passe = testdatainput($_POST["mot_de_passe"]);
				$c_mot_de_passe = testdatainput($_POST["mot_de_passe"]);
                $id_contact = $_POST["id_contact"];
                $id_type_usager = $_POST["id_type_usager"];
                $id_paiement = $_POST["id_paiement"];
             }
            else  // Si il n'as pas de donnees les variables seront vidées
            {
            $courriel = $nom = $prenom = $cellulaire = $mot_de_passe = $c_mot_de_passe = "";
			$id_contact = $id_type_usager = $id_paiement = 0;
            }
        ?>
	
	<!-- form method="POST" action="index.php" id="contenu" -->
        <!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="contenu">    -->
		<div class="container">
			<form name="ajoutUsager" onsubmit="return validateForm()" action="index.php?Usagers&action=enregistrerUsager" method="POST" id="contenu">    
                <h3>Merci de remplir vos infos</h3>
				<p>Votre courriel sera l'identifiant de votre compte</p><br/>
				<div class="form-group row">
					<div class="col-lg-4">				
						<label>Courriel</label>
						<input id='valideCourriel' type="hidden"> 
						<input class="form-control" type="text" name="courriel"  value="<?= $courriel; ?>" onblur="estCourriel()" required>
						<span id="errCourriel" style="color:red; visibility:hidden">* Invalide ou requis</span>
					</div>
					<div class="col-lg-4">
						<label>Mot de Passe</label>
						<input class="form-control" type="password" name="mot_de_passe" value="<?= $mot_de_passe; ?>" onblur="estMotdePasse()" required>
						<span id="errMot_de_passe" style="color:red; visibility:hidden" >* Invalide</span>
					</div>
					<div class="col-lg-4">
						<label>Confirmation</label>
						<input class="form-control" type="password" name="confirma_mot_de_passe" value="<?= $c_mot_de_passe; ?>" onblur="estConfirmaMotdePasse()" required>
						<span id="errConfirmaMotdePasse" style="color:red; visibility:hidden">* Reesayez </span>
					</div>
				</div><hr>
				<div class="form-group row">
					<div class="col-lg-4">
						<label>Nom</label>
						<input class="form-control" type="text" name="nom" value="<?= $nom; ?>" onblur="estNom()" required>
						<span id="errNom" style="color:red; visibility:hidden">* Nom invalid</span>
					</div>
					<div class="col-lg-4">	
						<label>Prenom</label>
						<input class="form-control" type="text" name="prenom" value="<?= $prenom; ?>" onblur="estPreNom()" required>
						<span id="errPrenom" style="color:red; visibility:hidden">* Prenom invalid</span>
					</div>
					<div class="col-lg-4">	
						<label>Cellulaire</label>
						<input class="form-control" type="text" name="cellulaire" value="<?= $cellulaire; ?>" onblur="estCellulaire()" required>
						<span id="errCellulaire" style="color:red; visibility:hidden">* Cellulaire invalide</span>
					</div>
				</div><hr>
				<div class="form-group row">
					<div class="col-lg-4">	
					<label>Contact</label>
                    <select class="form-control" name='id_contact'>
							<?php
                            foreach($donnees["listeContacts"] as $contact)
                            {
                                if ($contact->lireidContact() == $Moyenne )
                                    echo "<option value=" . $contact->lireidContact() ." selected ='selected' >" . $contact->lireContact() . "</option>";
                                else 
                                   echo "<option value=" . $contact->lireidContact() . ">" . $contact->lireContact() . "</option>"; 
                                
                            }
							?>                        
                    </select>
					</div>
					<div class="col-lg-4">	
                    <label>Type de paiement</label>
                    <select class="form-control" name='id_paiement'>
							<?php
                            foreach($donnees["listePaiements"] as $paiement)
                            {
                                if ($paiement->lireidPaiement() == $Tpaiement)
                                    echo "<option value=" . $paiement->lireidPaiement() ." selected ='selected'>" . $paiement->lirePaiement() . "</option>";
                                else                                     
                                   echo "<option value=" . $paiement->lireidPaiement() .">" . $paiement->lirePaiement() . "</option>";
                            }
							?>                        
                    </select>
					</div>
					</div><hr>
		<!-- input type="hidden" name="action" value="ValiderUser" / -->
        <nav class="d-flex justify-content-around mt-3">
            <button onclick ="window.location.href='index.php'" class="btn btn-secondary">Accueil</button>
            <a href="index.php?Recherche&action=recherche"><button type="button" class="btn btn btn-bleu">Page recherche</button></a>
            <input type="submit" value="Envoyer" class="btn btn-orange"/>
        </nav>
		
	</form>
	
	</div>
	
	<!-- <form method="GET" action="index.php"> -->  <!-- il ne marche pas c'est ligne ici -->

	</main>
