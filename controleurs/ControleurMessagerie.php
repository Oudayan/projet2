<?php
/**
* @file ControleurMessagerie.php
* @autheurs Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
* @version 1.0
* @date 20 février 2018
* @brief Définit la classe pour le controleur de la messagerie
*
* @details Cette classe définit les différentes activités concernant la messagerie.
* 
*/
	class ControleurMessagerie extends BaseControleur
	{
		public function index(array $params)
		{

			if(isset($params["action"]))
			{
				
				switch($params["action"])
				
				{
					//====================================================Accéder à la messagerie==================================================================
					
					case "afficherMessagerie":
                        if(isset($_SESSION["courriel"])){
                         $this->afficherVues("messagerie");
                        }
                        break;
                    case "boiteReception":
                      if(isset($_SESSION["courriel"])){
                      $data = array (
                               "id1"=>array(
                                          "lu"=>1,
                                          "nom"=>"joel@",
                                          "sujet"=>"courriel reçu", 
                                          "fichierJoint"=>"algo.pdf", 
                                          "msg_date"=>"febrero",
                                          "id_message"=>"1"
                                        ),
                              "id2"=>array(
                                          "lu"=>0,
                                          "nom"=>"pepe",
                                          "sujet"=>"courriel reçu", 
                                          "fichierJoint"=>"algo.pdf", 
                                          "msg_date"=>"febrero",
                                         "id_message"=>"2"
                                        ),
                               "id3"=>array(
                                          "lu"=>1,
                                          "nom"=>"tito",
                                          "sujet"=>"courriel reçu", 
                                          "fichierJoint"=>"algo.pdf", 
                                          "msg_date"=>"febrero",
                                          "id_message"=>"3"
                                        )                              
                            );
                            echo json_encode($data);
                       }    
                        break; 
                    case "msgEnvoyes":
                      if(isset($_SESSION["courriel"])){
                      $data = array (
                               "id1"=>array(
                                          "lu"=>1,
                                          "nom"=>"pepito",
                                          "sujet"=>"courriel envoyé", 
                                          "fichierJoint"=>"algo.pdf", 
                                          "msg_date"=>"febrero",
                                          "id_message"=>"1"
                                        ),
                              "id2"=>array(
                                          "lu"=>0,
                                          "nom"=>"Lola",
                                          "sujet"=>"courriel envoyé", 
                                          "fichierJoint"=>"algo.pdf", 
                                          "msg_date"=>"febrero",
                                          "id_message"=>"2"
                                        ),
                               "id3"=>array(
                                          "lu"=>1,
                                          "nom"=>"Maria",
                                          "sujet"=>"courriel envoyé", 
                                          "fichierJoint"=>"algo.pdf", 
                                          "msg_date"=>"febrero",
                                          "id_message"=>"3"
                                        )                              
                            );
                            echo json_encode($data);
                       }    
                        break;
                        
                    case "msg":
                      break;
                    
                    case "afficherMessage":
                      if(isset($params["id_message"])){
                      $data = array( 
                                //"id1"=>array(
                                  "expediteur" => "pepito@gmail.com", 
                                  "sujet" => "mon sujet",
                                  "date"=> "02/28/2018 11:30",  
                                  "message" => array ("blabla", "blablabla2")
                                  //)  
                              );
                            echo json_encode($data);
                            }
                      
                      break;
                        
                     case "composerMessage" :
                        $nom_fichier=$_FILES["fichierJoint"]["name"];
                        $destination = "fichiersMessagerie/";
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
                            $msg_validation='En attendant de validation';
                            $this->afficherVues("messagerie");
                        }
                        break;  
                    default:
							// $this->afficheListeSujets();
							trigger_error($params["action"] . " Action invalide.");	    
                }
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
function charge_fichier($nom_fichier, $destination, $fichier_taille, $nom_dest)
{
    $fichier = "";
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