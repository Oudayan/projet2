<?php
/**
 * @file     delete_photo.php
 * @author   J Subirats 
 * @version  2.0
 * @date     5 mars 2018
 * @brief    destination Photos
 *
 */

$fichier = $_POST['files'][0];
$solo = strstr($fichier,"/images/");
$solo1 = ".." . $solo ;
var_dump($solo1);
			unlink($solo1);

/* var_dump($_FILES["files"]["name"]);
var_dump($_FILES["files"]["type"]);
var_dump($_FILES["files"]["tmp_name"]);
var_dump($_FILES["files"]["error"]);
var_dump($_FILES["files"]["size"]); */