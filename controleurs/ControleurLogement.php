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
		/**
         * @brief   Méthode qui sera appelée par les controleurs
         * @details Méthode abstraite pour traiter les "cases" des contrôleurs
         * @param   [array] $params La chaîne de requête URL ("query string") captée par le Routeur.php
         * @return  L'acces aux vues, aux données et aux différents messages pour ce contrôleur.
         */
		public function index(array $params) {

            $modeleLogement = $this->lireDAO("Logement");
            $modeleTypeLogement = $this->lireDAO("TypeLogement");
            $modelePhotosLogement = $this->lireDAO("PhotoLogement");
            $modelePiece = $this->lireDAO("Piece");
            $modeleDisponibilite = $this->lireDAO("Disponibilite");
            $modeleUsagers = $this->lireDAO("Usagers");
            
			if (isset($params["action"])) {	

                switch ($params["action"]) {
                    
                    case "afficherLogement" :
                        if (isset($params["idLogement"])) {
                            // Chercher les données du logement
                            $donnees["logement"] = $modeleLogement->lireLogementParId($params["idLogement"]);
                            $donnees["proprietaire"] = $modeleUsagers->obtenir_par_courriel($donnees["logement"]->lireCourriel());
                            $donnees["typeLogement"] = $modeleTypeLogement->lireTypeLogementParId($donnees["logement"]->lireIdTypeLogement());
                            $donnees["disposLogement"] = $modeleDisponibilite->lireDisponibilitesParLogement($params["idLogement"]);
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
					case "LogementaValider":
                    	$donnees = $modeleLogement->obtenir_listeaValider();
						
                    	$data = array();
                    	for ($i=0 ;$i<count($donnees);$i++){
                    		$data[$i]=array(
							'id_logement'=>$donnees[$i]->lireIdLogement(),
                    		'apt'=>$donnees[$i]->lireApt(),
                    		'no_civique'=>$donnees[$i]->lireNoCivique(),
                    		'rue'=>$donnees[$i]->lireRue(),
                    		'ville'=>$donnees[$i]->lireVille(),
                    		'province'=>$donnees[$i]->lireProvince(),
                    		'pays'=>$donnees[$i]->lirePays(),
                    		'code_postal'=>$donnees[$i]->lireCodePostal(),
                    		'prix'=>$donnees[$i]->lirePrix(),	
							'description'=>$donnees[$i]->lireDescription(),	

                    		'id_type_logement'=>$donnees[$i]->lireIdTypeLogement(),
                    		'courriel'=>$donnees[$i]->lireCourriel(),
                    		'frais_nettoyage'=>$donnees[$i]->lireFraisNettoyage(),
                    		'est_stationnement'=>$donnees[$i]->lireEstStationnement(),
                    		'est_wifi'=>$donnees[$i]->lireEstWifi(),
                    		'est_cuisine'=>$donnees[$i]->lireEstCuisine(),
                    		'est_tv'=>$donnees[$i]->lireEstTv(),	
							'est_fer_a_repasser'=>$donnees[$i]->lireEstFerARepasser(),	

							'est_cintres'=>$donnees[$i]->lireEstCintres(),	
							'est_seche_cheveux'=>$donnees[$i]->lireEstSecheCheveux(),
							'est_climatise'=>$donnees[$i]->lireEstClimatise(),	
							'est_laveuse'=>$donnees[$i]->lireEstLaveuse(),	
							'est_secheuse'=>$donnees[$i]->lireEstSecheuse(),	
							'est_chauffage'=>$donnees[$i]->lireEstChauffage(),	
							'l_valide'=>$donnees[$i]->lireLValide(),	
							'lireLBanni'=>$donnees[$i]->lireLBanni(),
							'l_commentaire_banni'=>$donnees[$i]->lireLCommentaireBanni(),
                    		);
							$mesPhotos = $modelePhotosLogement->lireToutesPhotosParLogement($donnees[$i]->lireIdLogement());
							for ($j=0 ;$j<count($mesPhotos);$j++){
								$data[$i]["Photos"][$j]=$mesPhotos[$j]->lireCheminPhoto();
							}
                    	}
                    	  echo json_encode($data);				
						break;
                    case "formAjoutLogement" :
                        if (isset($_SESSION["courriel"])) {
							if (isset($params['idLogement'])){
								$donnees["Logement"]=$modeleLogement->lireLogementParId($params['idLogement']);
								$donnees["Photos"]=$modelePhotosLogement->lireToutesPhotosParLogement($params['idLogement']);
							}
                            $donnees["Pieces"]=$modelePiece->lireToutesPieces();
                            $donnees["TypeLogements"]=$modeleTypeLogement->lireTousTypeLogements();
                            $this->affichervues("ajoutLogement", $donnees);				//action par défaut - afficher la liste des sujets
							}
                        else {
                            $_SESSION["warning"]= "Vous devez vous authentifier pour accès à enregistrer un logement";
                            header("Location: index.php");
                        }
                        break;

                    case "enregistrerLogement" :  // Insert ou Update 
							/* &&&&&& Preparation de donnees &&&&&& */
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
							var_dump($params['id_logement']);
							
						if (trim($params['id_logement']) != 0) {   /* Si dans le parametres on trouve le id_logement alors c'est un modification   */
							var_dump("Modifica");
							$nouveau["Logement"] = new Logement($_POST["id_logement"],	$_POST["no_civique"], $_POST["apt"], $_POST["rue"], $_POST["ville"], $_POST["province"], $_POST["pays"], 
							$_POST["code_postal"], "0", "0", $_POST["id_TypeLogement"], $_POST["prix"],
							null, $_POST["description"], $courriel, $_POST["nb_personnes"], $_POST["nb_chambres"], $_POST["nb_lits"], 
							$_POST["nb_salle_de_bain"], $_POST["nb_demi_salle_de_bain"], $_POST["frais_nettoyage"], $stationement, 
							$wifi, $cuisine, $tv, $fer_a_repasser, $ceintres, $seche_cheveux, $climatise, $laveuse, 
							$secheuse, $chauffage, false, true, false, null, null );
							$modeleLogement->actualiserLogement($nouveau["Logement"]); 
							$_SESSION["succes"]= "Votre logement a été modifié, merci de attendre un confirmation dans votre courriel ! ";
							header("Location: index.php?Proprietaire&action=afficherLogements");
							}
						else {
							var_dump("Nuevo");
							$nouveau["Logement"] = new Logement("",	$_POST["no_civique"], $_POST["apt"], $_POST["rue"], $_POST["ville"], $_POST["province"], $_POST["pays"], 
							$_POST["code_postal"], "0", "0", $_POST["id_TypeLogement"], $_POST["prix"],
							null, $_POST["description"], $courriel, $_POST["nb_personnes"], $_POST["nb_chambres"], $_POST["nb_lits"], 
							$_POST["nb_salle_de_bain"], $_POST["nb_demi_salle_de_bain"], $_POST["frais_nettoyage"], $stationement, 
							$wifi, $cuisine, $tv, $fer_a_repasser, $ceintres, $seche_cheveux, $climatise, $laveuse, 
							$secheuse, $chauffage, false, true, false, null, null );
							 $id = $modeleLogement->sauvegarderLogement($nouveau["Logement"]); 
							 var_dump($id);
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
									$nomFichier = $chemin . '/'. $nomFichier ;
									$modelePhotosLogement = $this->lireDAO("PhotoLogement");
									$piece = $_POST["piece".$i];
									$nouvellePhoto = new PhotoLogement("", $nomFichier, $piece, $id);
									$modelePhotosLogement->sauvegarderPhotoLogement($nouvellePhoto);
								}
							}
                        $_SESSION["succes"]= "Votre logement a été enregistré, merci de attendre un confirmation dans votre courriel ! ";
                        header("Location: index.php?Proprietaire&action=afficherLogements");
						}

                        break;
					case "validerLogement";
						var_dump($params);
						if(isset($_SESSION["courriel"]) && $_SESSION["typeUser"] == 1)  {
								echo "OUi, loggé";
								var_dump("dans le controleur");
								$id_logement = $params["id_logement"];
								$data = $modeleLogement->lireLogementParId($id_logement);
								$modeleLogement->ValiderLogement($data);
							}
							else
								echo "voues n'est pas loggé";
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