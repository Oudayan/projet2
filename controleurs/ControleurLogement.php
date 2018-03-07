<?php
/**
* @file Controleur_Logement.php
* @author Jorge Subirats
* @version 1.0
* @date 21 janvier 2018
* @brief Définit la classe pour les controleurs
*
* @details Cette classe définit les différentes activités concernant les Logements.
* 
*/

	class ControleurLogement extends BaseControleur {

		public function index(array $params) {

            $modeleLogement = $this->lireDAO("Logement");
            $modeleTypeLogement = $this->lireDAO("TypeLogement");
            $modelePiece = $this->lireDAO("Piece");
            
			if (isset($params["action"])) {	

                switch ($params["action"]) {
                    
                    case "afficherLogement" :
                        if (isset($params["idLogement"])) {
                            // Chercher les données du logement
                            $donnees["logement"] = $modeleLogement->lireLogementParId($params["idLogement"]);
                        }
                        else {
                            $donnees["erreur"] = "Aucun logement n'est sélectionné";
                        }
                        $this->afficherVues("logement", $donnees);
                        break;

                    case "desactiverLogement" :
                        if (isset($params["idLogement"])) {
                            $modeleLogement->desactiverLogement($params["idLogement"]);
                            header("Location: index.php?Proprietaire&action=afficherLogements");
                        }
                        break;

                    case "Modifier" :
                        var_dump("Modify");
                        break;

                    case "formAjoutLogement" :
                        if (isset($_SESSION["courriel"])) {
                            $donnees["Pieces"]=$modelePiece->lireToutesPieces();
                            $donnees["TypeLogements"]=$modeleTypeLogement->lireTousTypeLogements();
                            $this->affichervues("ajoutLogement", $donnees);				//action par défaut - afficher la liste des sujets
                        }
                        else {
                            $_SESSION["warning"]= "Vous devez vous authentifier pour accès à enregistrer un logement";
                            header("Location: index.php");
                        }
                        break;

                    case "enregistrerLogement" :
                        echo "<pre>";
                        $courriel=$_SESSION["courriel"];
                        if (isset($params['est_stationnement']))
                            $stationement = 1;
                        else
                            $stationement = 0;
                        if (isset($params['est_wifi']))
                            $wifi = 1;
                        else
                            $wifi = 0;
                        if (isset($params['est_cuisine']))
                            $cuisine = 1;
                        else
                            $cuisine = 0;
                        if (isset($params['est_tv']))
                            $tv = 1;
                        else
                            $tv = 0;
                        if (isset($params['est_fer_a_repasser']))
                            $fer_a_repasser = 1;
                        else
                            $fer_a_repasser = 0;
                        if (isset($params['est_ceintres']))
                            $ceintres = 1;
                        else
                            $ceintres = 0;
                        if (isset($params['est_seche_cheveux']))
                            $seche_cheveux = 1;
                        else
                            $seche_cheveux = 0;
                        if (isset($params['est_climatise']))
                            $climatise = 1;
                        else
                            $climatise = 0;
                        if (isset($params['est_laveuse']))
                            $laveuse = 1;
                        else
                            $laveuse = 0;
                        if (isset($params['est_secheuse']))
                            $secheuse = 1;
                        else
                            $secheuse = 0;
                        if (isset($params['est_chauffage']))
                            $chauffage = 1;
                        else
                            $chauffage = 0;			
                        $json = array();
                        // Instanciation de la classe Logement
                        $nouveau["Logement"] = new Logement("",	$_POST["no_civique"], $_POST["apt"], $_POST["rue"], $_POST["ville"], $_POST["province"], $_POST["pays"], 
                        $_POST["code_postal"], "0", "0", $_POST["id_TypeLogement"], $_POST["prix"],
                        null, $_POST["description"], $courriel, $_POST["nb_personnes"], $_POST["nb_chambres"], $_POST["nb_lits"], 
                        $_POST["nb_salle_de_bain"], $_POST["nb_demi_salle_de_bain"], $_POST["frais_nettoyage"], $stationement, 
                        $wifi, $cuisine, $tv, $fer_a_repasser, $ceintres, $seche_cheveux, $climatise, $laveuse, 
                        $secheuse, $chauffage, false, true, false, null, null );	
                        $id = $modeleLogement->sauvegarderLogement($nouveau["Logement"]);
                        /* &&&& Enregistrement des photos &&&& */ 
                        $ancienNom = "./images/Logements/".$courriel;
                        $nouveauNom = "./images/Logements/".$id;
                        $chemin = "images/Logements/".$id;
                        rename($ancienNom, $nouveauNom);
                        for ($i=0;$i<20;$i++){
                            $nomPhoto = false;
                            if (isset($_POST['files'][$i])){
                              $nomFichier = $_POST['files'][$i];
                              $nomPhoto = true;
                              }
                            else if ($_POST["image".$i]) {
                                $nomFichier = $_POST["image".$i];
                                $nomPhoto = true;										
                            }
                            if ($nomPhoto) {
                                $nomFichier = $chemin . $nomFichier ;
                                $modelePhotos = $this->lireDAO("PhotoLogement");
                                $piece = $_POST["piece".$i];
                                $nouvellePhoto = new PhotoLogement("", $nomFichier, $piece, $id);
                                $modelePhotos->sauvegarderPhotoLogement($nouvellePhoto);
                            }
                        }

                        $_SESSION["succes"]= "Votre logement a été enregistré, merci de attendre un confirmation dans votre courriel ! ";
						die();
                        header("Location: index.php?Proprietaire&action=afficherLogements");
                        return;
                        break;

                    default:
                        trigger_error($params["action"] . " Action invalide.");		
					
                }  // Case Switch
			
            } // if 
			else {
				header("Location: index.php");
			}
		
        }		

	}

?>
