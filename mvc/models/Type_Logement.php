<?php
/**
* @file Type_Logement.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 8 féevrier 2018
* @brief Définit la classe Type_Logement.
*
* @details Cette classe définit les attributs d'un Type de Logement
* 
*/
	class Type_Logement
	{
		public $id_type_logement;
		public $type_logement;


		public function __construct($id = 0, $t = "")
		{
			$this->id_type_logement = $id;
			$this->type_logement = $t;			
		}
	}
