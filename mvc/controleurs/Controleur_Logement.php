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

	class Controleur_Logement extends BaseControleur
	{		
		public function traite(array $params)
		{
			
			//si le paramètre action existe
			if(isset($params["action"]) )
			{	
				
					//echo $params["action"];
					//switch en fonction de l'action qui nous est envoyée
					//ce switch détermine la vue et obtient le modèle
					switch($params["action"])
					{

						case "getbyid":
							$json = array();
							if (isset($params["id"]))
								$id  = $params["id"];
							else
								$id = 1;
							$modelePresenta = $this->getDAO("Presenta");
							$data = $modelePresenta->obtenir_par_id($id);
							$json["data"] = $data;
							echo json_encode($json);
							return;					//affiche la liste des sujets et des réponses
							break;
							
						case "delete_me":
							$djson = array();
							//$djson["post"]=isset($params["id"]);	
							//var_dump($djson);
							if (isset($params["id"])) 
							{
								$categorie_id  = $params["id"];
								$modelePresenta = $this->getDAO("Presenta");
								$data = $modelePresenta->effacer_presenta_pour_id($params["id"]);
								$djson["message"]= $data;
								$djson["message1"]= "L'item a été effacé";
							}
							else {
									$categorie_id  = $params["id"];
									$djson["error"] = "il y a un erreur";	
								}
							//echo "<p>" . var_dump($djson). "</p>";
							echo json_encode($djson);	
								return;
							break;
						case "getbycategorie":
							$json = array();
							if (isset($_POST["id"])) 
							{
								$categorie_id  = $_POST["id"];
								$modelePresenta = $this->getDAO("Presenta");
								$data = $modelePresenta->obtenir_presenta_pour_id($categorie_id);
								$json["data"] = $data;
							}
							else
								$json["error"] = "il y a un erreur";	
							echo json_encode($json);
							return;					//affiche la liste des sujets et des réponses
							break;

						case "Modifier" :
						    var_dump("Modify");
							break;
						case "ajoutpresenta" :
						
								$json = array();
								$modelePresenta = $this->getDAO("Presenta");
							    $nouveau["Presenta"] = new Presenta(0, $_POST["titre"],
								$_POST["resume"], $_POST["thematique"], $_POST["date_Presenta"],
								$_POST["heure_debut"], $_POST["heure_fin"], $_POST["salle"], $_POST["presentateur"] ); 
								$json["data"] = $modelePresenta->sauvegarde($nouveau["Presenta"]);
								 
								echo json_encode($json);
								return;
							break;
						default:
							// $this->afficheListeSujets();
							trigger_error($params["action"] . " Action invalide.");		
					}  // Case Switch
			} // if 
			else
			{
																								
				$this->affichevue("ajoutlogement");														//action par défaut - afficher la liste des sujets
			}
		}
		/**
		* @brief Affiche la liste des categories
		* @details Prend les categories et les affiche.
		* @details Utilise le Modele_Presenta
		* @param point1 data
		* @return à une vue.
		*/
		private function afficheCategories()
		{
			$modelePresenta = $this->getDAO("Presenta");
			$data["categories"] = $modelePresenta->obtenir_categories();
			$data["presenta"] =  $modelePresenta->obtenir_presenta();
			$data["presentateurs"] =  $modelePresenta->obtenir_presentateurs();
			$this->afficheVue("conference",$data);
		}
		
		
		/**
		* @brief Affiche le formulaire pour la suppression d'un sujet
		* @details 
		* @details 
		* @param point1 data
		* @return à une vue.
		*/
		private function formsupprimerSujet()  
		{
			$this->afficheVue("FormsuprimerSujet", $data);
		}
		/**
		* @brief Fait une validation des sujets
		* @details Regarde si es information sont été bien entrées
		* @param point1 titre
		* @param point2 texte
		* @return erreurs.
		*/
		private function valideFormSujet($titre, $texte)
		{
			$erreurs = "";
			$titre = trim($titre);
			if($titre == "")
				$erreurs .= "Le titre ne peut être vide.<br>";
			if($texte == "")
				$erreurs .= "Le texte ne peut être vide.<br>";
			return $erreurs;
		}
		/**
		* @brief Affiche la liste des sujets et des réponses
		* @details Prend les sujets et ses réponses et les affiche. Puis ouvre la vue AfficheSujetReponse
		* @details Utilise le Modele_Sujets et le Modele_Reponses
		* @param point1 data
		* @param point2 idSujets
		* @return à une vue.
		*/
		public function afficheSujetetReponses($idSujet)
		{
			$modelePresenta = $this->getDAO("Sujets");
			$data["Sujet"] = $modelePresenta->obtenir_par_id($idSujet);
			$modelReponses = $this->getDAO("Reponses");
			$data["Reponses"] = $modelReponses->obtenir_reponse_tous($idSujet);
			$this->afficheVue("AfficheSujetReponses", $data);
			
		}
		

	}
?>