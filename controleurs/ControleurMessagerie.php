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
                    case "composerMessage":
                      break;
                    default:
							// $this->afficheListeSujets();
							trigger_error($params["action"] . " Action invalide.");	    
                }
            }
        }
    }
		
?>