<?php
/**
* @file Logement.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 8 féevrier 2018
* @brief Définit la classe Logement.
*
* @details Cette classe définit les attributs d'un Logement 
* 
*/
	class Logement
	{
		public $id_logement;
		public $nb_interieur;
		public $nb_civique;
		public $rue;		
		public $cod_post;
		public $province;
		public $ville;
		public $nb_persones;
		public $nb_chambres;
		public $nb_lits;
		public $nb_salle_de_bain;
		public $nb_demi_salle_de_bain;
		public $lat;
		public $lon;
		public $description;
		public $is_parking;
		public $is_wifi;
		public $is_cuisine;
		public $is_tv;
		public $is_fer_a_repasser;
		public $is_cintres;
		public $is_seche_chevaux;
		public $is_clima;
		public $is_laveuse;
		public $is_secheuse;
		public $is_chauffage;
		public $premiere_photo;
		public $notation_actuel;
		public $l_banned;
		public $l_banned_date;
		public $l_banned_commentaire;
		public $courriel;
		public $id_tye_logement;

		public function __construct($id = 0, $p = "")
		{
				this->id_logement = ;
				this->nb_interieur =;
				this->nb_civique =;
				this->rue =;		
				this->cod_post =;
				this->province =;
				this->ville =;
				this->nb_persones =;
				this->nb_chambres =;
				this->nb_lits =;
				this->nb_salle_de_bain =;
				this->nb_demi_salle_de_bain =;
				this->lat =;
				this->lon =;
				this->description =;
				this->is_parking =;
				this->is_wifi =;
				this->is_cuisine =;
				this->is_tv =;
				this->is_fer_a_repasser =;
				this->is_cintres =;
				this->is_seche_chevaux =;
				this->is_clima =;
				this->is_laveuse =;
				this->is_secheuse =;
				this->is_chauffage =;
				this->premiere_photo =;
				this->notation_actuel =;
				this->l_banned =;
				this->l_banned_date =;
				this->l_banned_commentaire =;
				this->courriel =;
				this->id_tye_logement =;		
		}
	}
