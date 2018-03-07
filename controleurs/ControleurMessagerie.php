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
                        $modeleMessagesDestinataires = $this->lireDAO("MessagesDestinataires");
                        $recus = $modeleMessagesDestinataires->messagesRecus($_SESSION["courriel"]);
							$donnees = array();
                            for ($i=0; $i< count($recus); $i++){
                                $donnees[$i]=array(
                                  "destinataire" => $recus[$i]->lireDestinataire(),
                                  "lu" => $recus[$i]->lireLu(),
                                  "d_actif" => $recus[$i]->lireD_actif(),
                                  "id_message" => $recus[$i]->lireId_message(),
                                  "id_reference" => $recus[$i]->lireId_reference(),
                                  "sujet" => $recus[$i]->lireSujet(),
                                  "Fichier_join"=> $recus[$i]->lireFichier_joint(),
                                  "texteMessage" => $recus[$i]->lireMessage(),
                                  "msg_date" => $recus[$i]->lireMsg_date(),
                                  "expediteur"=>$recus[$i]->lireExpediteur(),
                                  "m_actif"=>$recus[$i]->lireM_actif()
                                );
                        	}  
							echo json_encode($donnees);					                                                 //contient la liste des messages recus
							break;
                            
                    case "msgEnvoyes":
                        $modeleMessages = $this->lireDAO("Messages");
                        $modeleMessagesDestinataires = $this->lireDAO("MessagesDestinataires");
                        $envoyes = $modeleMessagesDestinataires->messagesEnvoyes($_SESSION["courriel"]);
							$donnees = array();
                            for ($i=0; $i< count($envoyes); $i++){
                                $donnees[$i]=array(
                                  "destinataire" => $envoyes[$i]->lireDestinataire(),
                                  "lu" => $envoyes[$i]->lireLu(),
                                  "d_actif" => $envoyes[$i]->lireD_actif(),
                                  "id_message" => $envoyes[$i]->lireId_message(),
                                  "id_reference" => $envoyes[$i]->lireId_reference(),
                                  "sujet" => $envoyes[$i]->lireSujet(),
                                  "Fichier_join"=> $envoyes[$i]->lireFichier_joint(),
                                  "texteMessage" => $envoyes[$i]->lireMessage(),
                                  "msg_date" => $envoyes[$i]->lireMsg_date(),
                                  "expediteur"=>$envoyes[$i]->lireExpediteur(),
                                  "m_actif"=>$envoyes[$i]->lireM_actif()
                                );
                        	} 
							echo json_encode($donnees);
			                                                 //contient la liste des messages recus
							break; 
                            
                    case "supprimirMessage": 
                      //tenir en compte que cela peut être plusieurs
                         $_POST["id_message"]; //paramètre qu'envoie cotè client.                      
                      //faire le code puur mettre inactif le message
                      //il ne faut pas retourner rien
                      break;
                    
                    case "messageLu":
                         $_POST["id_message"];
                         $_POST["message_lu"];//true
                         //il faut faire update sur la table al_destinataire column lu
                         //il ne faut pas retourne rien 
                      break;   

                    case "composerMessage" :
						echo "<pre>";
						var_dump("Entrando al controlador");

						$contact = explode(',',$_POST["liste_contacts"]);

						if (isset($_FILES["fichierJoint"]["name"]))  // &&&&&&&&&& S'il y a un nom du fichier
							$nom_fichier = $_FILES["fichierJoint"]["name"];
					    else 
							$nom_fichier = "";
                       $destination = "pieces_jointes/";
                       $msg = "";
                        if(isset($_POST["liste_contacts"]) && isset($_POST["sujet"]) && isset($_POST["textMessage"]))                        
                        { 
			
							$modeleMessagerie = $this->lireDAO("MessagesDestinataires"); // &&&&&&&&&& Variable de type classe Messagerie &&& 
							$newMessage = new Message( // Selon le modele Message
								"", // id_message
								"", // id_reference
								$_POST["sujet"], // Sujet
								$_FILES["fichierJoint"]["name"], // Fichier joint 
								$_POST["textMessage"], // Message
								'',  // msg_date
								true, 
								$_SESSION["courriel"]
								
							);

							// &&&&&&&&&& Creer un nouveau objet de classe Messagerie avec les donnes pour enregistrer uniquement le message &&&&&&&&&&
                            $idMessage = $modeleMessagerie->sauvegarderMessage($newMessage);
							var_dump($idMessage);
							var_dump(count($contact));
							for ($i=0;$i<count($contact);$i++){
								$newDestinataire = new Destinataire(
								$contact[$i],
								$idMessage, 
								false,
								true );
								$modeleMessagerie->sauvegarderDestinataire($newDestinataire);
							}
							die();
                            $taille_max = 1024; //Taille en kilobytes
                            $msg = charge_fichier($nom_fichier, $destination, $taille_max, $id_message);                           
                        }
						else {
							var_dump('Ahora no entró');
						}
                        if (trim($msg) != '')
                        {
                          echo $msg;
                            $this->afficherVues("messagerie");
                        }
                        else
                        {
                          echo $msg;
                            $this->afficherVues("messagerie");

                        }
   
                        break;
                        
					/*default:		
																								
						trigger_error("Action invalide");
					*/	

                }                                                                                 // fin du switch	

			}                                                                                       //fin du if params action
            else
			{
				//var_dump("No");
				$this->afficherVues("messagerie"); 													//action par defaut- affiche la page d'accueil de la messagerie
			}
           
            // fin du else du param action	
		}                                                                                           //fin de la fonction index
		
		
		
	}                
          
/**
 * @brief   fait le téléchargement d'un fichier
 * @param   string| $nom_fichier   
 * @param   string| $destination 
 * @param   string| $fichier_taille
 * @param   string| $nom_dest
 * @return  les messages dans un cas où il y a des erreurs dans le format et la taille du fichier
 */
function charge_fichier($nom_fichier, $destination, $fichier_taille, $id_message)
{
    $message = "";
    if($_FILES[$nom_fichier]['error'] > 0){
                $message = 'An error ocurred when uploading.';
            }

            // Check filetype
            $invalid_types = array("application/vnd.microsoft.portable-executable", "text/javascript");
            if (in_array($_FILES[$nom_fichier]['type'], $invalid_types)) {
                $message = "Erreur pendant l'envoi : Fichier non valide";
            }

            // Check filesize
            if($_FILES[$nom_fichier]['size'] > $fichier_taille * 1024 ){ //Bytes
                $message = "Le fichier téléchargé excède la taille de téléchargement maximale.";
            }

            // Check if the file exists
            if(file_exists($destination . $_FILES[$nom_fichier]['name'])){
                $message = "Le fichier avec ce nom existe déjà";
            }

            // Upload file
            if(!move_uploaded_file($_FILES[$nom_fichier]['tmp_name'], $destination . $id_message)){
                $message = "Erreur pendant l'envoi  - vérifier la destination.";
            }

            return $message;

}

		
?>
