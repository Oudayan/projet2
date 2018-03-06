<?php
/**
 * @file    TypeLogementTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    6 mars 2018
 * @brief 	PHPUnit pour la classe TypeLogement.
 * @details Teste les attributs de la classe TypeLogement
 */
 use PHPUnit\Framework\TestCase;
 
	class TypeLogementTest extends TestCase
	{
		/**
		 * @covers            \tests\TypeLogement::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_type_logement',TypeLogement::class);
			$this->assertClassHasAttribute('type_logement',TypeLogement::class);
		}	
		/**
		 * @covers            \tests\TypeLogement::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',TypeLogement::class);
			$this->assertClassNotHasAttribute('Mary',TypeLogement::class);
		}
		
		/**
		 * @covers            \tests\TypeLogement::__construct
		 * @covers            \tests\TypeLogement::ecrireIdTypeLogement
		 * @covers            \tests\TypeLogement::ecrireTypeLogement
		 * @covers            \tests\TypeLogement::lireIdTypeLogement
		 * @covers            \tests\TypeLogement::lireTypeLogement
		 */
		public function testTypeLogementEgaleEcrireLireSucces() 
		{
            $id_type_logement = new TypeLogement;
			$valeur = 1234;
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertNotEquals($valeur, $id_type_logement->lireIdTypeLogement());
			
			$type_logement = new TypeLogement;
			$valeur = "texte";
			$type_logement->ecrireTypeLogement($valeur);
			$this->assertEquals($valeur, $type_logement->lireTypeLogement());
		}
		
		/**
		 * @covers            \tests\TypeLogement::__construct
		 * @covers            \tests\TypeLogement::ecrireIdTypeLogement
		 * @covers            \tests\TypeLogement::ecrireTypeLogement
		 * @covers            \tests\TypeLogement::lireIdTypeLogement
		 * @covers            \tests\TypeLogement::lireTypeLogement
		 */
		public function testTypeLogementPasEgaleEcrireLireSucces() 
		{
            $id_type_logement = new TypeLogement;
			$valeur = "texte";
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertNotEquals($valeur, $id_type_logement->lireIdTypeLogement());
			
			$type_logement = new TypeLogement;
			$valeur = 1234;
			$type_logement->ecrireTypeLogement($valeur);
			$this->assertEquals($valeur, $type_logement->lireTypeLogement());
			
			$id_type_logement = new TypeLogement;
			$valeur = -1234;
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertNotEquals($valeur, $id_type_logement->lireIdTypeLogement());
		}
	
	} //fin de la classe
?>