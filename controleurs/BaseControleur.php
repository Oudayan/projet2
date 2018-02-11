<?php
/**
* @file BaseControleur.php
* @author Jorge Subirats 
* @version 1.0
* @date 21 janvier 2018
* @brief Définit la classe de base pour les controleurs
*
* @details Cette classe définit comment accéder aux différents éléments.
* 
*/
	abstract class BaseControleur
	{		
		
		/**
		* @brief Permet d'afficher une vue
		* @details Utilise le répertoire vues.
		* @param point1 array $params
		* @param point2 nomVue
		* @param point3 data
		* @param point4 cheminVue
		* @return message d'erreur ou une vue
		*/
		public abstract function traite(array $params);

		protected function afficheVue($nomVue, $data = null)
		{
			$cheminVue = RACINE . "vues/" . $nomVue . ".php";

			if(file_exists($cheminVue))
			{
				/* include "vues/header.php" ; */
				include($cheminVue);
			}
			else
			{
				trigger_error("Erreur 404! La vue $cheminVue n'existe pas.");
			}
		}
		/**
		* @brief Permet d'aller chercher le modele
		* @details Utilise les trois modeles: Reponse,Sujets et Usagers.
		* @param point1 nomModele
		* @param point2 classe
		* @param point3 laDB
		* @param point4 objetModele
		* @return string objetModele
		*/	
		protected function getDAO($nomModele)
		{
			
			$classe = "Modele_" . $nomModele;
			if(class_exists($classe))
			{

				//on fait une connexion à la base de données
				$laDB = DBFactory::getDB(DBTYPE, DBNAME, HOST, USERNAME, PWD);

				//on crée une instance de la classe Modele_$classe
				
				$objetModele = new $classe($laDB);
				if($objetModele instanceof BaseDAO)
				{
					return $objetModele;
				}
				else
				{
					trigger_error("Le modèle n'est pas conforme.");
				}
			}
		}

	}
?>