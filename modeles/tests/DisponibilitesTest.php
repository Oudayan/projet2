<?php
/**
 * @file    DisponibilitesTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    5 mars 2018
 * @brief   PHPUnit pour la classe Disponibilites
 * @details Teste les attributs de la classe Disponibilites
 */
use PHPUnit\Framework\TestCase;
	
	class DisponibilitesTest extends TestCase
	{
		/**
		 * @covers            \tests\Disponibilites::__construct
		 */
		public function testClassePossedeAttributsSucces()
		{
            $this->assertClassHasAttribute('id_disponibilite',Disponibilites::class);
			$this->assertClassHasAttribute('id_logement',Disponibilites::class);
			$this->assertClassHasAttribute('date_debut',Disponibilites::class);
			$this->assertClassHasAttribute('date_fin',Disponibilites::class);
			$this->assertClassHasAttribute('expire',Disponibilites::class);
		}
		/**
		 * @covers            \tests\Disponibilites::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',Disponibilites::class);
			$this->assertClassNotHasAttribute('Mary',Disponibilites::class);
		}
       
		}
		/**
		 * @covers            \tests\Disponibilites::__construct
		 * @covers            \tests\Disponibilites::ecrireId_disponibilite
		 * @covers            \tests\Disponibilites::ecrireId_logement
		 * @covers            \tests\Disponibilites::ecrireDate_debut
		 * @covers            \tests\Disponibilites::ecrireDate_fin
		 * @covers            \tests\Disponibilites::ecrireExpire
		 * @covers            \tests\Disponibilites::lireId_disponibilite
		 * @covers            \tests\Disponibilites::lireId_logement
		 * @covers            \tests\Disponibilites::lireDate_debut
		 * @covers            \tests\Disponibilites::lireDate_fin
		 * @covers            \tests\Disponibilites::lireExpire
		 */
		public function testDisponibilitesEgaleEcrireLireSucces()
		{
            $id_disponibilite = new Disponibilites;
			$valeur = 1234;
			$id_disponibilite->ecrireId_disponibilite($valeur);
			$this->assertEquals($valeur, $id_disponibilite->lireId_disponibilite());
			
			$id_logement = new Disponibilites;
			$valeur = 1234;
			$id_logement->ecrireId_logement($valeur);
			$this->assertEquals($valeur, $id_logement->lireId_logement());
			
			$date_debut = new Disponibilites;
			$valeur = "texte";
			$date_debut->ecrireDate_debut($valeur);
			$this->assertEquals($valeur, $date_debut->lireDate_debut());
			
			$date_fin = new Disponibilites;
			$valeur = "texte";
			$date_fin->ecrireDate_fin($valeur);
			$this->assertEquals($valeur, $date_fin->lireDate_fin());
			
			$expire = new Disponibilites;
			$valeur = true;
			$expire->ecrireExpire($valeur);
			$this->assertEquals($valeur, $expire->lireExpire());
		}
		
		/**
		 * @covers            \tests\Disponibilites::__construct
		 * @covers            \tests\Disponibilites::ecrireId_disponibilite
		 * @covers            \tests\Disponibilites::ecrireId_logement
		 * @covers            \tests\Disponibilites::ecrireDate_debut
		 * @covers            \tests\Disponibilites::ecrireDate_fin
		 * @covers            \tests\Disponibilites::ecrireExpire
		 * @covers            \tests\Disponibilites::lireId_disponibilite
		 * @covers            \tests\Disponibilites::lireId_logement
		 * @covers            \tests\Disponibilites::lireDate_debut
		 * @covers            \tests\Disponibilites::lireDate_fin
		 * @covers            \tests\Disponibilites::lireExpire
		 */
		public function testDisponibilitesPasEgalEcrireLireSucces() {
            $id_disponibilite = new Disponibilites;
			$valeur = "texte";
			$id_disponibilite->ecrireId_disponibilite($valeur);
			$this->assertNotEquals($valeur, $id_disponibilite->lireId_disponibilite());
			
			$id_logement = new Disponibilites;
			$valeur = "texte";
			$id_logement->ecrireId_logement($valeur);
			$this->assertNotEquals($valeur, $id_logement->lireId_logement());
			*/
			$date_debut = new Disponibilites;
			$valeur = 1234;
			$date_debut->ecrireDate_debut($valeur);
			$this->assertNotEquals($valeur, $date_debut->lireDate_debut());
			
			$date_fin = new Disponibilites;
			$valeur = 1234;
			$date_fin->ecrireDate_fin($valeur);
			$this->assertNotEquals($valeur, $date_fin->lireDate_fin());
			
			$expire = new Disponibilites;
			$valeur = "texte"
			$expire->ecrireExpire($valeur);
			$this->assertNotEquals($valeur, $expire->lireExpire());
			
			$id_logement = new Disponibilites;
			$valeur = -1234;
			$id_logement->ecrireId_logement($valeur);
			$this->assertNotEquals($valeur, $id_logement->lireId_logement());
			
		}

	}//fin de la classe

?>