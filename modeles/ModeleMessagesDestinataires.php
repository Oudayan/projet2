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
        $sql = "SELECT *
        
        FROM " . $this->lireNomTable() .
        " JOIN al_messagerie  
        ON " . $this->lireNomTable() . ".id_message = al_messagerie.id_message 
        WHERE expediteur = '" . $expediteur . "'
        AND m_actif = 1 
        ORDER BY al_messagerie.msg_date DESC";
        
        $resultat = $this->requete($sql);
        $resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "MessagesDestinataires"); 
        return $resultat->fetchAll();
          
        }
        
        
	} //fin de la class ModeleMessagesDestinataires 
		
	
?>