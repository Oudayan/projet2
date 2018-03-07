<?php
/**
 * @file    Type_Logement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date 	6 mars 2018
 * @brief 	PHPUnit pour la classe Option.
 * @details Teste les attributs de la classe Option 
 */
	class OptionTest extends TestCase
	{
	    /**
		 * @covers            \tests\Option::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_option',Option::class);
			$this->assertClassHasAttribute('nom_option',Option::class);
			$this->assertClassHasAttribute('valeurs_option',Option::class);
		}
		/**
		 * @covers            \tests\Option::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',Option::class);
			$this->assertClassNotHasAttribute('Mary',Option::class);
		}	
		
		/**
		 * @covers            \tests\Option::__construct
		 * @covers            \tests\Option::ecrireIdOption
		 * @covers            \tests\Option::ecrireNomOption
		 * @covers            \tests\Option::ecrireValeursOption	
		 * @covers            \tests\Option::lireIdOption
		 * @covers            \tests\Option::lireNomOption
		 * @covers            \tests\Option::lireValeursOption
		 */	
		public function testOptionEgaleEcrireLireSucces() 
		{
            $id_option = new Option();
			$valeur = 1234;
			$id_option->ecrireIdOption($valeur);
			$this->assertEquals($valeur, $id_option->lireIdOption());
			
			$nom_option = new Option();
			$valeur = "texte";
			$nom_option->ecrireIdOption($valeur);
			$this->assertEquals($valeur, $nom_option->lireNomOption());
			
			$d_actif = new Option();
			$valeurs_option = "texte";
			$valeurs_option->ecrireValeursOption($valeur);
			$this->assertEquals($valeur, $valeurs_option->lireValeursOption());	
		}	
		/**
		 * @covers            \tests\Option::__construct
		 * @covers            \tests\Option::ecrireIdOption
		 * @covers            \tests\Option::ecrireNomOption
		 * @covers            \tests\Option::ecrireValeursOption
		 * @covers            \tests\Option::lireIdOption
		 * @covers            \tests\Option::lireNomOption
		 * @covers            \tests\Option::lireValeursOption
		 */	
		public function testOptionPasEgaleEcrireLireSucces() 
		{
            $id_option = new Option();
			$valeur = "texte";
			$id_option->ecrireIdOption($valeur);
			$this->assertNotEquals($valeur, $id_option->lireIdOption());
			
			$nom_option = new Option();
			$valeur = 1234;
			$nom_option->ecrireIdOption($valeur);
			$this->assertNotEquals($valeur, $nom_option->lireNomOption());
			
			$d_actif = new Option();
			$valeurs_option = 1234;
			$valeurs_option->ecrireValeursOption($valeur);
			$this->assertNotEquals($valeur, $valeurs_option->lireValeursOption());	
			
			$d_actif = new Option();
			$valeurs_option = -1234;
			$valeurs_option->ecrireValeursOption($valeur);
			$this->assertNotEquals($valeur, $valeurs_option->lireValeursOption());
		}		

    } //fin de la classe
