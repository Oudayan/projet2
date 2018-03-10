<?php
/**
 * @file Paiement.php
 * @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date 8 féevrier 2018
 * @brief Définit la classe Paiement.
 *
 * @details Cette classe définit les attributs d'un type de paiement
 * 
 */
	class Paiement
	{
		//attributs
		public $id_paiement;
		public $paiement;

		//constructeur
		public function __construct($id = 0, $p = "")
		{
			$this->id_paiement = $id;
			$this->paiement = $t;			
		}
	}
