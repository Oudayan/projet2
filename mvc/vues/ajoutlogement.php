<?php
    /** 
	* @ file	ajoutlogement.php
	* @ autheurs	@autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
	* @ version 1.0
	* @ date    9 février 2018
	* @ brief 	formulaire pour ajouter un logement 
	*
	* @ details 
	*/ 
?>
<html>
	<head>
            <meta charset="utf-8">
            <meta name="author" content="Équipe">
            <link href="https://fonts.googleapis.com/css?family=Jaldi" rel="stylesheet">
            <link href="_css/font-awesome.min.css" rel="stylesheet" >
          <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
          <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->       
          <!--  <link rel="stylesheet" href="./css/style.css" type="text/css" media="all"> -->
            <title>Ajouter Logement</title>
	</head>
  <style>
    body { margin :15

    }
  </style>
	<body>
    <h2>À louer</h2>
      <form id="form_ajoute" action="index.php?Presenta&action=ajoutlogement" method="post">
      
        <label for="titre">Interieur:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Exterieur:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Rue:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Code postal:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Province:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Ville:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Nb persones:</label>
        <input type="number" class="form-control" name="titre" required>
        <label for="titre">Nb chambres:</label>
        <input type="number" class="form-control" name="titre" required>
        <label for="titre">Nb Lits:</label>
        <input type="number" class="form-control" name="titre" required>
        <label for="titre">Nb Salle de bain:</label>
        <input type="number" class="form-control" name="titre" required>
        <label for="titre">NB demi salle de bain:</label>
        <input type="number" class="form-control" name="titre" required>
        <label for="titre">Latitude:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Longitude:</label>
        <input type="text" class="form-control" name="titre" required>
        <label for="titre">Description:</label>
        <input type="text" class="form-control" name="titre" required>
        <fieldset >
          <label for="titre">Stationnement:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Wifi:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Cuisine:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">TV</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Fer à reppaser:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Cintres:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Seche chevaux:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Clima:</label>
          <input type="checkbox" class="form-control" name="titre" required>
          <label for="titre">Laveuse:</label>
          <input type="text" class="form-control" name="titre" required>
          <label for="titre">Secheuse:</label>
          <input type="text" class="form-control" name="titre" required>
          </fieldset >
        <label for="titre">Photo:</label>
        <input type="text" class="form-control" name="titre" required>



        <label for="titre">Latitude:</label>
        <input type="text" class="form-control" name="titre" required>



        <label for="titre">Propietaire:</label>
        <input type="text" class="form-control" name="titre" required>



        <label for="titre">Type de Logement:</label>
        <input type="text" class="form-control" name="titre" required>




      <div class="form-group">
        <label for="thematique">Categorie:</label>
        <!-- <input type="text" class="form-control" id="categorie"> -->
        <select name="thematique">
        <?php 
            foreach($data["categories"] as $categorie)
            {echo "<option value=" . $categorie->id . "> " . $categorie->description. "</option>"; }            
        ?>
        </select>
      </div> 

       <button id="btn_create" type="submit" class="btn btn-default">Submit</button>
    </form>
	</body>
 </html>