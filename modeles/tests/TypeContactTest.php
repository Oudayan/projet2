<?php
/**
 * @file 	TypeContactTest.php
 * @author 	Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date 	5 mars 2018
 * @brief 	PHPUnit pour la classe TypeContact.
 * @details Teste les attributs de la classe TypeContact 
 */
use PHPUnit\Framework\TestCase;
	
	class TypeContactTest extends TestCase
	{
		/**
		 * @covers            \tests\TypeContact::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_contact',TypeContact::class);
			$this->assertClassHasAttribute('contact',TypeContact::class);
		}	
		/**
		 * @covers            \tests\TypeContact::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',TypeContact::class);
			$this->assertClassNotHasAttribute('Mary',TypeContact::class);
		}
		
		/**
		 * @covers            \tests\TypeContact::__construct
		 * @covers            \tests\TypeContact::ecrireIdcontact
		 * @covers            \tests\TypeContact::ecrireContact
		 * @covers            \tests\TypeContact::lireIdcontact
		 * @covers            \tests\TypeContact::lireContact
		 */
		public function testTypeContactEgaleEcrireLireSucces() 
		{
            $id_contact = new TypeContact();
			$valeur = 1234;
			$id_contact->ecrireIdcontact($valeur);
			$this->assertEquals($valeur, $id_contact->lireDestinataire());
			
			$contact = new TypeContact();
			$valeur = "texte";
			$contact->ecrireContact($valeur);
			$this->assertEquals($valeur, $contact->lireContact());
		}
		
		/**
		 * @covers            \tests\TypeContact::__construct
		 * @covers            \tests\TypeContact::ecrireIdcontact
		 * @covers            \tests\TypeContact::ecrireContact
		 * @covers            \tests\TypeContact::lireIdcontact
		 * @covers            \tests\TypeContact::lireContact
		 */
		public function testTypeContactPasEgaleEcrireLireSucces() 
		{
            $id_contact = new TypeContact();
			$valeur = 1234;
			$id_contact->ecrireIdcontact($valeur);
			$this->assertNotEquals($valeur, $id_contact->lireIdcontact());
			
			$contact = new TypeContact();
			$valeur = "texte";
			$contact->ecrireContact($valeur);
			$this->assertNotEquals($valeur, $contact->lireContact());
			
			$id_contact = new TypeContact();
			$valeur = -1234;
			$id_contact->ecrireIdcontact($valeur);
			$this->assertNotEquals($valeur, $id_contact->lireIdcontact());
		}
	
	} //fin de la classe

?>