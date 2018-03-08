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
                  //====================Accéder à la messagerie===========
					
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
                                  "fichier_joint"=> $recus[$i]->lireFichier_joint(),
                                  "texteMessage" => $recus[$i]->lireMessage(),
                                  "msg_date" => $recus[$i]->lireMsg_date(),
                                  "expediteur"=>$recus[$i]->lireExpediteur(),
                                  "m_actif"=>$recus[$i]->lireM_actif()
                                );
                        	}  
							echo json_encode($donnees);
                            //contient la liste des messages recus
							break;
                            
                    case "msgEnvoyes":
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
                                  "fichier_joint"=> $envoyes[$i]->lireFichier_joint(),
                                  "texteMessage" => $envoyes[$i]->lireMessage(),
                                  "msg_date" => $envoyes[$i]->lireMsg_date(),
                                  "expediteur"=>$envoyes[$i]->lireExpediteur(),
                                  "m_actif"=>$envoyes[$i]->lireM_actif()
                                );
                        	} 
							echo json_encode($donnees);
			                                                 //contient la liste des messages recus
							break; 
                    case "listeContacts":
                      $modeleMessagesDestinataires = $this->lireDAO("MessagesDestinataires");
                      $recus = $modeleMessagesDestinataires->listeContacts($_SESSION["courriel"]);
                      $donnees = array();
                      for ($i=0; $i< count($recus); $i++){
                        $donnees[$i]=array($recus[$i]->lireExpediteur());  
                      }
                      echo json_encode($donnees);
                      break;
                            
                    case "supprimerMessage": 
                      if(isset($_SESSION["courriel"]) && isset($_POST["listeSupp"]) && isset($_POST["actif"])){ 
                           $modeleMessagerie = $this->lireDAO("MessagesDestinataires");
                           $msgSupp = $_POST["listeSupp"];
                        	for ($i=0;$i<count($msgSupp);$i++){
								$messagesSupprimes = new Message(
								$msgSupp[$i],
								$_SESSION["courriel"], 
								$_POST["actif"]);
								$modeleMessagerie->desactiverMessage($messagesSupprimes);                               
							}  
                      }
                      break;
                    
                    case "messageLu":
                         if(isset($_SESSION["courriel"]) && isset($_POST["id_message"]) && isset($_POST["message_lu"])){ 
                             $modeleMessagerie = $this->lireDAO("MessagesDestinataires");
                             $modeleMessagerie->CourrielLu($_SESSION["courriel"], $_POST["id_message"], $_POST["message_lu"]);
                         }
                      
                         //il faut faire update sur la table al_destinataire column lu
                         //il ne faut pas retourne rien 
                      break;  
                    
                    case "messageAutomatique":                     
                      if (isset($params["message"]) && isset($params["sujet"]) && isset($params["locataire"]) && isset($params["proprietaire"])) {
                        var_dump($params["message"]);
                        $modeleMessagerie = $this->lireDAO("MessagesDestinataires");
                        $lu = false;
                        $m_actif = true;
                        $newDestinataire = new Destinataire (
                            $params["locataire"],
                            $idMessage, 
                            $lu, 
                            $m_actif);
                        $modeleMessagerie->sauvegarderDestinataire($newDestinataire);
							
                        $newMessage = new Message ( // Selon le modele Message
                            "", // id_message
                            "", // id_reference
                            $params["sujet"], // Sujet
                            "", // Fichier joint 
                            $params["message"], // Message
                            '',  // msg_date
                            true, 
                            $params["proprietaire"]
                        );
                        $modeleMessagerie->sauvegarderMessage($newMessage);
                        header("Location: index.php?Proprietaire&action=afficherLogements");
                      }
                      break;
                    
                    case "composerMessage" :
						$contact = explode(',',$_POST["liste_contacts"]);
                        //condition pour remplir la variable à utiliser pour la destination du fichier
						if (isset($_FILES["fichierJoint"]["name"]))
							$nom_fichier = $_FILES["fichierJoint"]["name"];
					    else 
							$nom_fichier = "";
                        
                       $destination = "pieces_jointes/";
                       $msg = "";
                        if(isset($_POST["liste_contacts"]) && isset($_POST["sujet"]) && isset($_POST["textMessage"]))                        
                        { 
                          // Variable de type classe Messagerie
                          $modeleMessagerie = $this->lireDAO("MessagesDestinataires");
                          
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
                          // Creer un nouveau objet de classe Messagerie avec les donnes pour enregistrer uniquement le message 
                          $idMessage = $modeleMessagerie->sauvegarderMessage($newMessage);
                          
                            $lu = false;
                            $m_actif = true;
							for ($i=0;$i<count($contact);$i++){
								$newDestinataire = new Destinataire(
								$contact[$i],
								$idMessage, 
								$lu,
								$m_actif );
								$modeleMessagerie->sauvegarderDestinataire($newDestinataire);
							}
                            
                            if($nom_fichier != "") {
                              $taille_max = 1024; //Taille en kilobytes
                              $msg = charge_fichier("fichierJoint", $destination, $taille_max, $idMessage);   
                            }                     
                        }
						else if(trim($msg) != '')
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
                 
					default:																	
						trigger_error("Action invalide");					
				} 
			}
            else
			{
				$this->afficherVues("messagerie");
			}	
		}	
	}               
          
/**
 * @brief   fait le téléchargement d'un fichier
 * @param   string| $nom_fichier   
 * @param   string| $destination 
 * @param   string| $fichier_taille
 * @param   string| $nom_dest
 * @return  les messages dans un cas où il y a des erreurs dans le format et la taille du fichier
 */
function charge_fichier($fichierJoint, $destination, $fichier_taille, $id_message)
{
    $message = "";
    if($_FILES[$fichierJoint]['error'] > 0){
        $message = 'An error ocurred when uploading.';
    }

    // Vérification type de fichier
    $invalid_types = array("application/vnd.microsoft.portable-executable", "text/javascript");
    if (in_array($_FILES[$fichierJoint]['type'], $invalid_types)) {
        $message = "Erreur pendant l'envoi : Fichier non valide";
    }

    // Vérification taille fichier
    if($_FILES[$fichierJoint]['size'] > $fichier_taille * 1024 ){ //Bytes
        $message = "Le fichier téléchargé excède la taille de téléchargement maximale.";
    }

    // Vérification si le fichier existe déjà
    if(file_exists($destination . $_FILES[$fichierJoint]['name'])){
        $message = "Le fichier avec ce nom existe déjà";
    }

    // Téléverser fichier.
    if(!move_uploaded_file($_FILES[$fichierJoint]['tmp_name'], $destination . $id_message)){
        $message = "Erreur pendant l'envoi  - vérifier la destination.";
    }

    return $message;
}
		
?>