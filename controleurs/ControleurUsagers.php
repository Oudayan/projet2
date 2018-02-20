<?php
/**
* @file ControleurUsagers.php
* @autheurs 
* @version 1.0
* @date 12 février 2018
* @brief Définit la classe pour le controleur usagers
*
* @details Cette classe définit les différentes activités concernant les usagers du site.
* 
*/
	class ControleurUsagers extends BaseControleur
	{
		public function index(array $params)
		{

			if(isset($params["action"]))
			{
				//var_dump("Si",$params);
				// var_dump($_POST);
				switch($params["action"])
				
				{
					//====================================================Login et verification des permissions==================================================================
					
					case "verificationLogin" :   
																									
						if (isset($params["courriel"]) && isset($params["MotDePasse"]) )
						{
								$modeleUsagers = $this->lireDao("Usagers");
								//$nouveauUsager = new Usagers();
								//$nouveauUsager->ecrireCourriel($params["courriel"]);
								//$my=$nouveauUsager->lireCourriel();
								// var_dump("my",$modeleUsagers);
								$data = $modeleUsagers->obtenir_par_courriel($params["courriel"]);  
								//var_dump($data);
								if ($data && $data->lireCourriel() == $params["courriel"] && $data->lireMotDePasse() == $params["MotDePasse"])	//verifie si $data est "vraie" et si les donnees de la bd sont pareil comme les entrées.
								{																								//$data sera faux si le courriel ne se trouve pas dans la bd
																		
									if($data->lireestBanni() == 1)										//si l'usager est bannis
									{
										$this->afficherVues("MessageBanned");							//message pour les usagers bannis du site et destruction de la session
										if (isset($_SESSION["courriel"]))
											session_destroy();																	
									}	
									else															
									{									 
										// $controleur = "Sujets"; 									// chercher la classe avec le nom du controleur Sujets pour pouvoir afficher la liste des sujets
										// $classe = "Controleur_" . $controleur;
										//if(class_exists($classe))
										/*{

											$objetControleur = new $classe;							
											if($objetControleur instanceof BaseControleur)
											{
												$_REQUEST["action"] = "afficheListeSujets";
												$objetControleur->traite($_REQUEST);
										 	}
											else
											trigger_error("Controleur invalide.");
										} */
									}
									$_SESSION["courriel"] = $params["courriel"];	
									$_SESSION["typeUser"] = $data->lireTypeUsager();
									$_SESSION["prenom"] = $data->lirepreNom();
								  $_SESSION["succes"]= "Bienvenue ! " . $_SESSION["prenom"] . " " ;
									header("Location: index.php");
								}
								else
								{
									$_SESSION["erreur"]= "Le courriel ou le MotDePasse est inexact ";
									header("Location: index.php");
								}

						}
						else {
							  $_SESSION["warning"]="Erreur en parametres";
						    header("Location: index.php");
						}
						
					break;
					
					case "ajouterUsager" : 
						  $modeleTypeContact = $this->lireDAO("TypeContact");
						  $modeleTypePaiement = $this->lireDAO("TypePaiement");
					  	$donnees["listeContacts"] = $modeleTypeContact->lireTousTypeContact();
					  	$donnees["listePaiements"] = $modeleTypePaiement->lireTousTypePaiement();
					  	$this->afficherVues("ajoutUsager", $donnees);
					break;

					//====================================================partie administrative===========================
					
				
					case "afficheListeUsagers":														//affiche la liste des usagers
						  $this->afficheListeUsagers();
					break;					
									
					
					case "modifieUsager":															//va chercher un usager pour permettre la modification
						
						if(isset($params["courriel"]))
						{
							  $modeleUsagers = $this->lireDAO("Usagers");
							  $data = $modeleUsagers->obtenir_par_courriel($params["courriel"]);		//obtenir les informations d'un usager en se servant du courriel de AfficheListeUsagers
							  $this->afficherVues("AfficheUsager", $data);								//affiche une vue de l'usager que l'on veut modifier
						}
						else
						{
							  trigger_error("Pas de courriel spécifié...");
						}
						break;
					
					
					case "enregistrerUsager" :														//va chercher un usager pour permettre la modification
						var_dump($params);
						//die();
						if(!isset($params["courriel"]) || !isset($params["nom"]) || !isset($params["prenom"]))
						{	
					       echo "Erreur .... !";
							$this->afficherVues("AfficheUsager");
						}
						else
						{
								$modeleUsagers = $this->lireDAO("Usagers");                                  
								$modification["Usager"] = new Usagers($params["courriel"],$params["nom"],$params["prenom"], $params["mot_de_passe"], $params["cellulaire"],"","","",$params["id_contact"],3,$params["id_paiement"]);
								$succes= $modeleUsagers->sauvegarde($modification["Usager"]);		//sauvegarder les informations d'un usager en se servant d'un tableau
								$this->afficheListeUsagers();
						}
						break;
					case "Logout":																	//va chercher un usager pour permettre la modification
					    $this->deconnection();
					    header("Location: index.php");
					    break;
                    
          case "nouvelMessage":
              $this->afficherVues("messagerie");
            break;
            
					/*default:		
																								
						trigger_error("Action invalide");
					*/	
				}	
			}
			else
			{
				  var_dump("No");
				  $this->afficherVuess("accueil"); 													//action par defaut- affiche le login
			}	
		}
		
		/**
		* @brief Affiche la liste des usagers
		* @details Prend les renseignements sur les usagers et les affiche. Puis ouvre la vue AfficheListeUsagers
		* @details Utilise le Modele_Usagers
		* @param point1 data
		* @return à une vue.
		*/

		private function afficheListeUsagers()
		{
			$modeleUsagers = $this->lireDAO("Usagers");
			$data["usagers"] = $modeleUsagers->obtenir_tous();
			$this->afficherVues("AfficheListeUsagers", $data);
		}

		
		/**
		* @brief Permet la déconnection de la session
		* @details Se retouve sur les pages ecepté sur la page de loggin
		* @param point1 courriel
		* @return aucun.
		*/
		private function deconnection()
		{
		
			if (isset($_SESSION["courriel"])) 
			{
				unset($_SESSION["courriel"]);
				setcookie("courriel", null, -1, '/');
			}
			if (isset($_SESSION["typeUser"]))
			{
				unset($_SESSION["typeUser"]);
				setcookie("typeUser", null, -1, '/');
			}	
			if (isset($_SESSION["prenom"]))
			{
				unset($_SESSION["prenom"]);
				setcookie("prenom", null, -1, '/');
			}
		}
		
	}
    
?>