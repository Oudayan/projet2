<?php
/**
* @file Controleur_Usagers.php
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
				// var_dump("Si",$params);
				// var_dump($_POST);
				switch($params["action"])
				
				{
					//====================================================Login et verification des permissions==================================================================
					
					case "verificationLogin" :   
																									
						if(isset($params["courriel"]) && isset($params["MotDePasse"]) )
						{
							$erreurs = $this->valide($params["courriel"], $params["MotDePasse"]); 	
																									
							if($erreurs == "" )
							{
								$modeleUsagers = $this->lireDao("Usagers");
								//$nouveauUsager = new Usagers();
								//$nouveauUsager->ecrireCourriel($params["courriel"]);
								//$my=$nouveauUsager->lireCourriel();
								var_dump("my",$modeleUsagers);
								$data = $modeleUsagers->obtenir_par_courriel($params["courriel"]);  
								var_dump($data);
								if($data && $data->lireCourriel() == $params["courriel"] && $data->lireMotDePasse() == $params["MotDePasse"])	//verifie si $data est "vraie" et si les donnees de la bd sont pareil comme les entrées.
								{																								//$data sera faux si le courriel ne se trouve pas dans la bd
																		
									if($data->lireestBanni() == 1)										//si l'usager est bannis
									{
										$this->afficherVues("MessageBanned");							//message pour les usagers bannis du site et destruction de la session
										if (isset($_SESSION["courriel"]))
											session_destroy();																	
									}	
									else															
									{	
									     var_dump("vous-etes authentifié");																							
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
									header("Location: http://e1795138.webdev.cmaisonneuve.qc.ca/alouer"); 
								}
								else
								{
									echo "Le courriel ou le MotDePasse est inexact";             
								
								}
							}
							
							else
							{
								$this->afficherVues("FormLogin");	
							}
						}
						else 
							var_dump("Erreur en parametres");
						
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
					
					
					case "sauvegardeUsager" :														//va chercher un usager pour permettre la modification
						 
						if(!isset($params["courriel"]) || !isset($params["nom"]) || !isset($params["prenom"]))
						{	
					       echo "Erreur .... !";
							$this->afficherVues("AfficheUsager");
						}
						else
						{
							if ($params["courriel"])
							{ 
								if(isset($params["isAdmin"])) 
									$params["isAdmin"]="1"; 
								else 
									$params["isAdmin"]="0";
								
								if(isset($params["isBanned"]))
									$params["isBanned"]="1";
								else 
									$params["isBanned"]="0";
								
								$params["MotDePasse"]="";
								$modeleUsagers = $this->lireDAO("Usagers");                                  
								$modification["Usager"] = new Usager($params["courriel"],$params["nom"],$params["prenom"], $params["MotDePasse"], $params["isAdmin"],$params["isBanned"]);
								$succes= $modeleUsagers->sauvegarde($modification["Usager"]);		//sauvegarder les informations d'un usager en se servant d'un tableau
								$this->afficheListeUsagers();
							}
						}
						break;
					case "Logout":																	//va chercher un usager pour permettre la modification
					   $this->deconnection();
					   header("Location: http://e1795138.webdev.cmaisonneuve.qc.ca/alouer");

					break;
					/*default:		
																								
						trigger_error("Action invalide");
					*/	
				}	
			}
			else
			{
				var_dump("No");
				$this->afficherVuess("FormLogin"); 													//action par defaut- affiche le login
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
		* @brief Valide le courriel et le MotDePasse
		* @details Fait les validations nécessaires pour la sécurité du site
		* @param point1 erreurs
		* @param point2 courriel
		* @param point3 MotDePasse
		* @return erreurs.
		*/
		
		private function valide($courriel, $MotDePasse)
		{
			$erreurs = "";
			$courriel = trim($courriel);
			$MotDePasse = trim($MotDePasse);
			
			if($courriel == "")
				$erreurs .= "Le courriel ne peut etre vide.<br>";
			if(strlen($courriel) > 30)
				$erreurs .= "Le courriel ne dépasse pas 30 caracteres.";
			
			if($MotDePasse == "")
				$erreurs .= "Le MotDePasse ne peut etre vide.<br>";
			if(strlen($MotDePasse) > 30)
				$erreurs .= "Le MotDePasse ne dépasse pas 30 caracteres.";
			
			echo "$erreurs";   																	
			return $erreurs;
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

		}
		
	}
	

	
		
?>