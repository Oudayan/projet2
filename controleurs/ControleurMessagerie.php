<?php
/**
* @file ControleurMessagerie.php
* @autheurs Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
* @version 1.0
* @date 26 février 2018
* @brief Définit la classe pour le controleur de la messagerie
*
* @details Cette classe définit les différentes activités concernant la messagerie.
* 
*/
	class ControleurMessagerie extends BaseControleur
	{
		public function index(array $params)
		{
            //si le paramètre action existe
			if(isset($params["action"]))
			{
				//switch en fonction de l'action qui nous est envoyée
				switch($params["action"])
				
				{
					//====================================================Accéder à la messagerie==================================================================
					
					case "afficherMessagerie":
                        if($_SESSION["courriel"])
                        {
                            $this->afficherVues("messagerie");
                        }
                        else
                        {  
                            echo "<option value='0' selected disabled>Vous devez être inscrit pour avoir accès à la messagerie</option>";
                        }
                        break;																			
						// aller chercher les messages recues
                      
                    
                    case "messagesRecus":  
                        $modeleMessagesDestinataires = $this->getDao("MessagesDestinataires");
                        $recus = $modeleMessagesDestinataires->obtenir_par_expediteur($_SESSION["courriel"])
                               
							$donnees = array();
                            for ($i=0; $i< count($recus);$i++){
                                $donnees[$i]=array();
                                $donnees[$i][0]=this->lireDestinataire();
                                $donnees[$i][1]=this->lireId_message();
                                $donnees[$i][2]=this->lireId_reference();
                                $donnees[$i][3]=this->lireSujet();
                                $donnees[$i][4]=this->lireFichier_joint();
                                $donnees[$i][4]=this->lireLu();   
                                $donnees[$i][5]=this->lireExpediteur();
                        	}  
							echo json_encode($donnees);
							return;					                                                 //contient la liste des messages recus
							break;  
                        
                        	

					
					
					/*default:		
																								
						trigger_error("Action invalide");
					*/	
				}                                                                                   // fin du switch	
			}                                                                                       //fin du if params action
			else
			{
				//var_dump("No");
				$this->afficherVues("messagerie"); 													//action par defaut- affiche la page d'accueil de la messagerie
			}                                                                                       // fin du else du param action	
		}                                                                                           //fin de la fonction index
		
		
		
	}                                                                                               //fin de la classe ControleurMessagerie
	
		
?>