<?php
/**
* @file ModeleDestinataires.php
* @author Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
* @version 2.0
* @date 23 janvier 2018
* @brief Définit la classe ModeleDestinataire
*
* @details Cette classe définit les attributs nécessaire pour tout ce qui touche les messages aux destinataires.
* 
*/
	
	class ModeleDestinataires extends BaseDAO
	{
		/**
		* @brief Pour aller chercher le nom d'une table
		* @details Permet d'aller chercher le nom d'une table.
		* @param point1 
		* @param point2 
		* @return string destinataire.
		*/
		public function checherNomTable()
		{
			return "al_destinataire";
		}
		
         /**
		* @brief Pour aller chercher tous ls messages d'un usager qui est logger 
		* @details Permet d'aller chercher les renseignements relatif aux messages pour l'usager qui est logger.
		* @param point1 destinataire
		* @return array resultat.
		*/
		public function obtenir_par_destinataire($destinataire)
		{
			$resultat = $this->lire($destinataire, "destinataire");
			 return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Destinataires");
		}
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        /**
		* @brief Pour aller chercher ls infos pour un id_message
		* @details Permet d'aller chercher ds infos en utilisant le id_message.
		* @param point1 id_message
		* @param point2 resultat
		* @return array unInformation.
		*/
		public function obtenir_par_id_message($id_message)
		{
			$resultat = $this->lire($id_message, "id_message");//reference BaseDAO
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Destinataires'); 
			$unInformation = $resultat->fetch();
			return $unInformation;
		}
	
        
        
        
        /**
		* @brief Obtenir tous les destinataires 
		* @details Permet d'obtenir les destinataires.
		* @param point1 resultat
		* @return array desDestinataires.
		*/																	
		public function obtenir_tous()
		{
			$resultat = $this->lireTous();  //reference BaseDAO
			$desDestinataires = $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Destinataires");
			return $desDestinataires;
		}
	
        
        
       
		
        
		/**
		* @brief Sauvegarde un destinataire
		* @details Prend les informations entrées et les sauvegarde dans la base de données.
		* @param point1 unDestinataire
		* @param point2 id_message
		* @param point3 lu
		* @param point4 actif
		* @return aucun.
		*/
		public function sauvegarde(Destinataires $unDestinataire)
		{

		/*	if($unDestinataire->destinataire && $this->lire($unDestinataire->destinataire)->fetch())
			{
				$query = "UPDATE " . $this->getTableName() . " SET destinataire=?, id_message=?, lu=?, actif=? WHERE destinataire = ?";
				$donnees = array($unDestinataire->destinataire,$unDestinataire->id_message,$unDestinataire->lu,$unDestinataire->actif) ;
				$resultat = $this->requete($query, $donnees);
			
			}
			
			
			
			else
			{ */
				//insert
				var_dump($unDestinataire);
				$query = "INSERT INTO " . $this->checherNomTable() . "(destinataire, id_message, lu, actif) VALUES (?, ?, ?, ?)";
				$donnees = array($unDestinataire->lireDestinataire(), $unDestinataire->lireId_message(),$unDestinataire->lireLu(),
				$unDestinataire->lireActif());

				return $this->requete($query, $donnees);
			/*}*/
		}
		
	}
?>