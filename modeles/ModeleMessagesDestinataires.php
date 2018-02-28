<?php
/**
* @file ModeleMessagesDestinataires.php
* @author Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
* @version 1.0
* @date 28 février 2018
* @brief Définit la classe ModeleMessagesDestinataires
*
* @details Cette classe définit les attributs nécessaire pour tout ce qui touche les messages entrant et actif.
* 
*/
	
	class ModeleMessagesDestinataires extends BaseDAO
	{
		/**
		* @brief Pour aller chercher le nom d'une table
		* @details Permet d'aller chercher le nom d'une table.
		* @param point1 
		* @param point2 
		* @return string messagerie.
		*/
		public function lireNomTable()
		{
			return "al_destinataires";
		}
		
        
        SELECT al_destinataire.destinataire, al_destinataire.lu, al_destinataire.id_message, al_messagerie.id_reference, al_messagerie.sujet, al_messagerie.fichier_joint, al_messagerie.message, al_messagerie.msg_date, al_messagerie.expediteur
        
         SELECT *   
        FROM al_destinataire
        JOIN al_messagerie 
        ON al_destinataire.id_message = al_messagerie.id_message
        WHERE destinataire = "missde0404@gmail.com" AND actif = true
        ORDER BY  al_messagerie.msg_date DESC;
        
        
        /**
		* @brief Pour aller chercher les messages pour un utilisateur qui est logger
		* @details Permet d'aller chercher les renseignements sur les messages reçus en utilisant le courriel de l'utilisateur.
		* @param point1 destinataire
		* @param point2 resultat
		* @return array donnees.
		*/
        
        public function messageRecu($destinataire)
        $sql = "SELECT *
        
        FROM " . $this->lireNomTable() .
        " JOIN al_messagerie  
        ON " . $this->checherNomTable() .".id_message = al_messagerie.id_message 
        WHERE destinataire =? 
        AND m_actif =true 
        ORDER BY al_messagerie.msg_date DESC";
        
        $resultat = $this->requete($sql);
		return $this->requete($sql, $donnees);
          
        
        
        
        
        
        
        
        
        
        /**
		* @brief Pour aller chercher un message
		* @details Permet d'aller chercher les renseignements sur un message reçu en utilisant le courriel de l'utilisateur.
		* @param point1 expediteur
		* @param point2 resultat
		* @return array unMessage.
		*/
		public function obtenir_par_destinataires($expediteur)
		{
			$resultat = $this->lire($expediteur, "expediteur");//reference BaseDAO
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Messages'); 
			$unMessage = $resultat->fetch();
			return $unMessage;
		}
		
        
        
        
        /**
		* @brief Obtenir tous les messages pour un expediteur 
		* @details Permet d'obtenir les informations de tous les messages d'un expediteur.
		* @param point1 resultat
		* @return array desMessages.
		*/																	
		public function obtenir_tous()
		{
			$resultat = $this->lireTous();  //reference BaseDAO
			$desMessages = $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Messages");
			return $desMessages;
		}
		
        
        
        /**
		* @brief Pour aller chercher un usager 
		* @details Permet d'aller chercher les renseignements sur un usager utilisant le nom.
		* @param point1 nom
		* @return array unUsager.
		*/
		public function obtenir_par_nom($nom)
		{
			$resultat = $this->lire($nom);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Messages'); 
			$unUsager = $resultat->fetch();
			return $unUsager;
		}
		
        
		/**
		* @brief Sauvegarde un message
		* @details Prend les informations entrées et les sauvegarde dans la base de données.
		* @param point1 unMessage
		* @param point2 id_message
		* @param point3 sujet
		* @param point4 fichier_joint
		* @param point5 message
		* @param point6 msg_date
		* @param point7 courriel
		* @return aucun.
		*/
		public function sauvegarde(Usagers $unUsager)
		{

		/*	if($unUsager->courriel && $this->lire($unUsager->courriel)->fetch())
			{
				$query = "UPDATE " . $this->getTableName() . " SET nom=?, prenom=?, isAdmin=?, isBanned=? WHERE courriel = ?";
				$donnees = array($unUsager->nom,$unUsager->prenom,$unUsager->isAdmin,$unUsager->isBanned,$unUsager->courriel) ;
				$resultat = $this->requete($query, $donnees);
			
			}
			
			
			
			else
			{ */
				//insert
				var_dump($unMessage);
				$sql = "INSERT INTO " . $this->checherNomTable() . "(sujet, fichier_joint, message, msg_date, courriel,) VALUES (?, ?, ?, ?, ?)";
				$donnees = array($unMessage->lireSujet(), $unMessage->lireFichier_joint(),	$unMessage->lireMessage(),
				$unMessage->lireMsg_date(),$unMessage->lireCourriel(),
				$unMessage->lireContact(),$unMessage->lireTypeUsager(),	$unMessage->lireTypePaiement()
				);

				return $this->requete($sql, $donnees);
			/*}*/
		}
		
	}
?>