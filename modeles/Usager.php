<?php
/**
* @file Usager.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 9 février 2018
* @brief Définit la classe 
*/
	class Usager
	{
		public $courriel;
		public $nom;
		public $prenom;
		public $cellulaire;		
		public $mot_de_passe;
		public $u_banned;
		public $u_commentaire_banned;
		public $u_date_banned;
		public $id_contact;
		public $id_type_usager;
		public $id_paiement;		



		public function __construct($c = "", $n = "", $pnom = "", $cell ="", $mdp = "", $u_b = 0, $u_c= "", $u_db="", 
									$id_c = 0, $id_tu = 0, $id_p = 0)
		{
			this->courriel = $c;
			this->nom = $n;
			this->prenom = $pnom;
			this->cellulaire = $cell ;		
			this->mot_de_passe = $mdp;
			this->u_banned = $u_b;
			this->u_commentaire_banned = $u_c;
			this->u_date_banned = $u_db;
			this->id_contact = $id_c;
			this->id_type_usager = $id_tu;
			this->id_paiement = $id_p;		
		}
	}
