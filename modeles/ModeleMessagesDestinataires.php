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
			return "al_destinataire";
		}

		
        public function lireNomTableMessagerie()
		{
			return "al_messagerie";
		}
		
        /**
		* @brief Pour aller chercher les messages pour un utilisateur qui est logger
		* @details Permet d'aller chercher les renseignements sur les messages reçus en utilisant le courriel de l'utilisateur.
		* @param point1 destinataire
		* @param point2 resultat
		* @return array donnees.
		*/
        
        public function messagesRecus($destinataire)
        {
        $sql = "SELECT *        
        FROM " . $this->lireNomTable() .
        " JOIN al_messagerie  
        ON " . $this->lireNomTable() . ".id_message = al_messagerie.id_message 
        WHERE destinataire = '" . $destinataire . "'
        AND d_actif = 1 
        ORDER BY al_messagerie.msg_date DESC";
        
        $resultat = $this->requete($sql);
        $resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "MessagesDestinataires"); 
        return $resultat->fetchAll();
          
        }
        public function messagesEnvoyes($expediteur)
        {
       $sql = "SELECT GROUP_CONCAT( destinataire SEPARATOR ',') as destinataire," . 
                "d_actif,al_messagerie.id_message,id_reference,sujet,fichier_joint," .
                "msg_date,m_actif,expediteur,message " . 
                "FROM " . $this->lireNomTable() . " JOIN al_messagerie " . 
                "ON " . $this->lireNomTable() . ".id_message = al_messagerie.id_message " .
                "WHERE expediteur = '" . $expediteur . "' " . 
                "AND m_actif = 1 " . 
                "GROUP BY d_actif,al_messagerie.id_message, id_reference," . 
                "sujet, fichier_joint,msg_date,m_actif, expediteur,message " . 
                "ORDER BY al_messagerie.msg_date DESC";  

        $resultat = $this->requete($sql);
        $resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "MessagesDestinataires"); 
        return $resultat->fetchAll();
          
        }
        
        /**
		* @brief Pour aller chercher un message
		* @details Permet d'aller chercher les renseignements sur un message reçu en utilisant le id du message.
		* @param point1 id_message
		* @param point2 resultat
		* @return array unMessage.
		*/
		public function obtenir_par_id_message($id_message)
		{
			$resultat = $this->lire($id_message);//reference BaseDAO
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, '"MessagesDestinataires"'); 
			$unMessage = $resultat->fetch();
			return $unMessage;
		}
        
         /**
		* @brief Pour aller chercher un message
		* @details Permet d'aller chercher les renseignements sur un message reçu en utilisant le courriel de l'utilisateur.
		* @param point1 expediteur
		* @param point2 resultat
		* @return array unMessage.
		*/
		public function obtenir_par_expediteur($expediteur)
		{
			$resultat = $this->lire($expediteur, "expediteur");//reference BaseDAO
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Messages'); 
			$unMessage = $resultat->fetch();
			return $unMessage;
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
		
        public function sauvegarderMessage(Message $unMessage)
		{
            $query = "INSERT INTO " . $this->lireNomTableMessagerie() . 
                    " (sujet, fichier_joint, message, msg_date, m_actif, expediteur) VALUES (?, ?, ?, now(),?, ?)";
            $donnees = array(
                $unMessage->lireSujet(),
                $unMessage->lireFichier_joint(),
                $unMessage->lireMessage(),
                $unMessage->lireM_actif(),
                $unMessage->lireExpediteur());
            
            $this->requete($query, $donnees);
            $query = "SELECT * FROM " . $this->lireNomTableMessagerie() .  " ORDER BY id_message DESC LIMIT 1";
                $donnees = $this->requete($query);
                $donnees->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Message'); 
                $id = $donnees->fetch();
                $mon_id = $id->lireId_message();
            return $mon_id;
        }
 
        public function sauvegarderDestinataire(Destinataire $unMessage){
			$query = "INSERT INTO " . $this->lireNomTable() . " (destinataire, id_message, lu, d_actif) VALUES (?, ?, ?, ?)";
			$donnees = array(
                $unMessage->lireDestinataire(),
                $unMessage->lireId_message(),
                $unMessage->lireLu(),
                $unMessage->lireD_actif());
            
			$this->requete($query, $donnees);
			return;
		}
        
        public function CourrielLu($destinataire, $idMessage, $boolean){
            $query  = "UPDATE " . $this->lireNomTable() . " SET lu = " . $boolean . " "
               . "WHERE id_message = " . $idMessage . ""
               . " AND destinataire = '" . $destinataire . "'";
            $this->requete($query);
          
        }
	}	
    
?>