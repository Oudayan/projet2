<?php

session_start();
	$courriel = $_SESSION["courriel"];
	var_dump($_SESSION["courriel"]);
	$dir = '../images/' .$courriel ;
	 if (!is_dir($dir))
	    	mkdir ($dir,0777); 
	$chemin = $dir . '/';
	var_dump($_FILES);
	foreach ($_FILES["files"]["error"] as $key => $error) {
		if ($error == UPLOAD_ERR_OK) {
			$name = $_FILES["files"]["name"][$key];
			move_uploaded_file( $_FILES["files"]["tmp_name"][$key], $chemin . $_FILES['files']['name'][$key]);
		}
	}
	echo "<h2>Successfully Uploaded Images</h2>";
	
/* var_dump($_FILES["files"]["name"]);
var_dump($_FILES["files"]["type"]);
var_dump($_FILES["files"]["tmp_name"]);
var_dump($_FILES["files"]["error"]);
var_dump($_FILES["files"]["size"]); */ 