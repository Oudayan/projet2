<?php
/**
 * @file     LocationTest.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  1.0
 * @date     5 mars 2018
 * @brief    PHPUnit pour la classe Location.
 * @details  Teste les attributs de la classe Location
 */
use PHPUnit\Framework\TestCase;
	
	class LocationTest 
	{
		/**
		 * @covers            \tests\Location::__construct
		 */
		public function testClassePossedeAttributsSucces()
		{
            $this->assertClassHasAttribute('id_location',Location::class);
			$this->assertClassHasAttribute('id_logement',Location::class);
			$this->assertClassHasAttribute('id_proprietaire',Location::class);
			$this->assertClassHasAttribute('id_locataire',Location::class);
			$this->assertClassHasAttribute('date_debut',Location::class);
			$this->assertClassHasAttribute('date_retour',Location::class);
			$this->assertClassHasAttribute('date_location',Location::class);
			$this->assertClassHasAttribute('cout',Location::class);
			$this->assertClassHasAttribute('valide',Location::class);
		}
		/**
		 * @covers            \tests\Location::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',Location::class);
			$this->assertClassNotHasAttribute('Mary',Location::class);
		}

		/**
		 * @covers            \tests\Location::__construct
		 * @covers            \tests\Location::ecrireIdReservation
		 * @covers            \tests\Location::ecrireIdLogement
		 * @covers            \tests\Location::ecrirecrireIdProprietaire
		 * @covers            \tests\Location::ecrireIdLocataire
		 * @covers            \tests\Location::ecrireDateDebut
		 * @covers            \tests\Location::ecrireDateRetour
		 * @covers            \tests\Location::ecrireDateReservation
		 * @covers            \tests\Location::ecrireCout
		 * @covers            \tests\Location::ecrireValide
		 * @covers            \tests\Location::lireIdReservation
		 * @covers            \tests\Location::lireIdLogement
		 * @covers            \tests\Location::lireIdProprietaire
		 * @covers            \tests\Location::lireIdLocataire
		 * @covers            \tests\Location::lireDateDebut
		 * @covers            \tests\Location::lireDateRetour
		 * @covers            \tests\Location::lireDateReservation
		 * @covers            \tests\Location::lireCout
		 * @covers            \tests\Location::lireValide
		 */
		public function testLocationEgaleEcrireLireSucces() 
		{
            $id_location = new Location;
			$valeur = 1234;
			$id_location->EcrireIdReservation($valeur);
			$this->assertEquals($valeur, $id_location->lireIdReservation());
			
			$id_logement = new Location;
			$valeur = 1234;
			$id_logement->ecrireIdLogement($valeur);
			$this->assertEquals($valeur, $id_logement->lireIdLogement());
			
			$id_proprietaire = new Location;
			$valeur = "texte";
			$id_proprietaire->ecrireIdProprietaire($valeur);
			$this->assertEquals($valeur, $id_proprietaire->lireIdProprietaire());
			
			$id_locataire = new Location;
			$valeur = "texte";
			$id_locataire->ecrireIdLocataire($valeur);
			$this->assertEquals($valeur, $id_locataire->lireIdLocataire());
			
			$date_debut = new Location;
			$valeur = "texte";
			$date_debut->ecrireDateDebut($valeur);
			$this->assertEquals($valeur, $date_debut->lireDateDebut());
			
			$date_retour = new Location;
			$valeur = "texte";
			$date_retour->ecrireDateRetour($valeur);
			$this->assertEquals($valeur, $date_retour->lireDateRetour());
			
			$date_location = new Location;
			$valeur = "texte";
			$date_location->ecrireDateReservation($valeur);
			$this->assertEquals($valeur, $date_location->lireDateReservation());
			
			$cout = new Location;
			$valeur = 1234;
			$cout->ecrireCout($valeur);
			$this->assertEquals($valeur, $cout->lireCout());
			
			$valide = new Location;
			$valeur = true;
			$valide->ecrireValide($valeur);
			$this->assertEquals($valeur, $valide->lireValide());
		}
		/**
		 * @covers            \tests\Location::__construct
		 * @covers            \tests\Location::ecrireIdReservation
		 * @covers            \tests\Location::ecrireIdLogement
		 * @covers            \tests\Location::ecrirecrireIdProprietaire
		 * @covers            \tests\Location::ecrireIdLocataire
		 * @covers            \tests\Location::ecrireDateDebut
		 * @covers            \tests\Location::ecrireDateRetour
		 * @covers            \tests\Location::ecrireDateReservation
		 * @covers            \tests\Location::ecrireCout
		 * @covers            \tests\Location::ecrireValide
		 * @covers            \tests\Location::lireIdReservation
		 * @covers            \tests\Location::lireIdLogement
		 * @covers            \tests\Location::lireIdProprietaire
		 * @covers            \tests\Location::lireIdLocataire
		 * @covers            \tests\Location::lireDateDebut
		 * @covers            \tests\Location::lireDateRetour
		 * @covers            \tests\Location::lireDateReservation
		 * @covers            \tests\Location::lireCout
		 * @covers            \tests\Location::lireValide
		 */
		public function testLocationPasEgaleEcrireLireSucces()
		{
            $id_location = new Location;
			$valeur = "texte";
			$id_location->EcrireIdReservation($valeur);
			$this->assertNotEquals($valeur, $id_location->lireIdReservation());
			
			$id_logement = new Location;
			$valeur = "texte";
			$id_logement->ecrireIdLogement($valeur);
			$this->assertNotEquals($valeur, $id_logement->lireIdLogement());
			
			$id_proprietaire = new Location;
			$valeur = 1234;
			$id_proprietaire->ecrireIdProprietaire($valeur);
			$this->assertNotEquals($valeur, $id_proprietaire->lireIdProprietaire());
			
			$id_locataire = new Location;
			$valeur = 1234;
			$id_locataire->ecrireIdLocataire($valeur);
			$this->assertNotEquals($valeur, $id_locataire->lireIdLocataire());
			
			$date_debut = new Location;
			$valeur = 1234;
			$date_debut->ecrireDateDebut($valeur);
			$this->assertNotEquals($valeur, $date_debut->lireDateDebut());
			
			$date_retour = new Location;
			$valeur = 1234;
			$date_retour->ecrireDateRetour($valeur);
			$this->assertNotEquals($valeur, $date_retour->lireDateRetour());
			
			$date_location = new Location;
			$valeur = 1234;
			$date_location->ecrireDateReservation($valeur);
			$this->assertNotEquals($valeur, $date_location->lireDateReservation());
			
			$cout = new Location;
			$valeur = "texte";
			$cout->ecrireCout($valeur);
			$this->assertNotEquals($valeur, $cout->lireCout());
			
			$valide = new Location;
			$valeur = "texte";
			$valide->ecrireValide($valeur);
			$this->assertNotEquals($valeur, $valide->lireValide());
			
			$valide = new Location;
			$valeur = 1234;
			$valide->ecrireValide($valeur);
			$this->assertNotEquals($valeur, $valide->lireValide());
        }
    }
