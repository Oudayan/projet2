<?php
/**
 * @file 	Contact.php
 * @author 	Oudayan Dutta, Denise Ratté, Zoraida Ortiz, Jorge Subirats 
 * @version 1.0
 * @date 	8 février 2018
 * @brief 	Définit la classe Contact.
 *
 * @details Cette classe définit les attributs d'un contact
 * 
 */
	class Contact
	{
		//attributs
		public $id_contact;
		public $contac;

		//contructeur
		public function __construct($id = 0, $c = "")
		{
			$this->id_contact = $id;
			$this->contac = $c;			
		}
	}
