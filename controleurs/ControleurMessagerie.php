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
<<<<<<< HEAD
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
                        
                        $modeleMessages = $this->lireDAO("Messages");
                        $modeleMessagesDestinataires = $this->lireDAO("MessagesDestinataires");
                        
                        $recus = $modeleMessagesDestinataires->messagesRecus($_SESSION["courriel"]);
                        /*
                        echo "<pre>";
                        var_dump($recus);
                        echo "</pre>";*/
                            
							$donnees = array();
                            for ($i=0; $i< count($recus); $i++){
                                $donnees[$i]=array();
                                $donnees[$i][0]= $recus[$i]->lireDestinataire();
                                $donnees[$i][1]=$recus[$i]->lireLu(); 
                                $donnees[$i][2]=$recus[$i]->lireD_actif();
                                $donnees[$i][3]=$recus[$i]->lireId_message();
                                $donnees[$i][4]=$recus[$i]->lireId_reference();
                                $donnees[$i][5]=$recus[$i]->lireSujet();
                                $donnees[$i][6]=$recus[$i]->lireFichier_joint();
                                $donnees[$i][7]=$recus[$i]->lireMessage();
                                $donnees[$i][8]=$recus[$i]->lireMsg_date();
                                $donnees[$i][9]=$recus[$i]->lireExpediteur();
                                $donnees[$i][10]=$recus[$i]->lireM_actif();
                        	}  
                              //var_dump($donnees);
                               // die();
							echo json_encode($donnees);
							return;					                                                 //contient la liste des messages recus
							break;  
                     case "msgEnvoyes":
                        
                        $modeleMessages = $this->lireDAO("Messages");
                        $modeleMessagesDestinataires = $this->lireDAO("MessagesDestinataires");
                        
                        $envoyes = $modeleMessagesDestinataires->messagesEnvoyes($_SESSION["courriel"]);
                        /*
                        echo "<pre>";
                        var_dump($recus);
                        echo "</pre>";*/
                            //$x = $recus->fetchAll();
							$donnees = array();
                            for ($i=0; $i< count($recus); $i++){
                                $donnees[$i]=array();
                                $donnees[$i][0]= $recus[$i]->lireDestinataire();
                                $donnees[$i][1]=$recus[$i]->lireLu(); 
                                $donnees[$i][2]=$recus[$i]->lireD_actif();
                                $donnees[$i][3]=$recus[$i]->lireId_message();
                                $donnees[$i][4]=$recus[$i]->lireId_reference();
                                $donnees[$i][5]=$recus[$i]->lireSujet();
                                $donnees[$i][6]=$recus[$i]->lireFichier_joint();
                                $donnees[$i][7]=$recus[$i]->lireMessage();
                                $donnees[$i][8]=$recus[$i]->lireMsg_date();
                                $donnees[$i][9]=$recus[$i]->lireExpediteur();
                                $donnees[$i][10]=$recus[$i]->lireM_actif();
                        	}  
                              //var_dump($donnees);
                               // die();
							echo json_encode($donnees);
							return;					                                                 //contient la liste des messages recus
							break;  
                        
                    case "composerMessage" :
                        $nom_fichier=$_FILES["fichierJoint"]["name"];
                        var_dump($nom_fichier);
                        $destination = "upload/";
                        $msg = "";
                        if(trim($nom_fichier) != '' || trim($nom_fichier) == '' && isset($_POST["destinataire"]) && isset($_POST["sujet"]) && isset($_POST["textMessage"]))                        
                        { 
                            $id_message = sauvegarderMessage($_POST["destinataire"], $_POST["sujet"], $_POST["textMessage"], $_SESSION["courriel"] );
                            $taille_max = 1024; //Taille en kilobytes
                            $msg = charge_image("fichierJoint", $destination, $taille_max, $id_message);                           
                        }
                        if (trim($msg) != '')
                        {
                            $msg_validation= "La taille de l'image n'est pas valide";
                            $this->afficherVues("messagerie");
                        }
                        else
                        {
                            $msg_validation='Message envoyé';
                            $this->afficherVues("messagerie");
                        }
                        break; 
                        
					/*default:		
																								
						trigger_error("Action invalide");
					*/	
				}                                                                                   // fin du switch	
			}                                                                                       //fin du if params action
			/*
            else
			{
				//var_dump("No");
				$this->afficherVues("messagerie"); 													//action par defaut- affiche la page d'accueil de la messagerie
			}
            */
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
function charge_fichier($nom_fichier, $destination, $fichier_taille, $nom_dest)
{
    $message = "";
    if($_FILES[$nom_fichier]['error'] > 0){
                $message = 'An error ocurred when uploading.';
            }

            if(!getimagesize($_FILES[$nom_fichier]['tmp_name'])){
                $message = 'Please ensure you are uploading an image.';
            }

            // Check filetype
            $valid_types = array("image/exe", "image/js");
            if (in_array($_FILES[$nom_fichier]['type'], $valid_types)) {
                $message = 'Unsupported filetype uploaded.';
            }

            // Check filesize
            if($_FILES[$nom_fichier]['size'] > $fichier_taille * 1024 ){ //Bytes
                $message = 'File uploaded exceeds maximum upload size.';
            }

            // Check if the file exists
            if(file_exists($destination . $_FILES[$nom_fichier]['name'])){
                $message = 'File with that name already exists.';
            }

            // Upload file
            if(!move_uploaded_file($_FILES[$nom_fichier]['tmp_name'], $destination . $nom_dest)){
                $message = 'Error uploading file - check destination is writeable.';
            }

            return $message;

}

		
?>