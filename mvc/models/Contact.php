<?php
/**
* @file Contact.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 8 féevrier 2018
* @brief Définit la classe Contact.
*
* @details Cette classe définit les attributs d'un contact
* 
*/
	class Contact
	{
		public $id_contact;
		public $contac;


		public function __construct($id = 0, $c = "")
		{
			$this->id_contact = $id;
			$this->contac = $c;			
		}
	}
