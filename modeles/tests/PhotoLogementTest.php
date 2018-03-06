<?php
/**
 * @file    PhotoLogementTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    5 mars2018
 * @brief   PHPUnit pour la classe PhotoLogement.
 * @details Teste les attributs de la classe PhotoLogement
 */
use PHPUnit\Framework\TestCase;	
	class PhotoLogementTest extends TestCase
	{
		/**
		 * @covers            \tests\PhotoLogement::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_photo_logement',PhotoLogement::class);
			$this->assertClassHasAttribute('chemin_photo',PhotoLogement::class);
			$this->assertClassHasAttribute('id_piece',PhotoLogement::class);
			$this->assertClassHasAttribute('id_logement',PhotoLogement::class);
		}	
		/**
		 * @covers            \tests\PhotoLogement::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',PhotoLogement::class);
			$this->assertClassNotHasAttribute('Mary',PhotoLogement::class);
		}	
		/**
		 * @covers            \tests\PhotoLogement::__construct
		 * @covers            \tests\PhotoLogement::ecrireIdPhotoLogement
		 * @covers            \tests\PhotoLogement::ecrireCheminPhoto
		 * @covers            \tests\PhotoLogement::ecrireIdPiece
		 * @covers            \tests\PhotoLogement::ecrireIdLogement
		 * @covers            \tests\PhotoLogement::lireIdPhotoLogement
		 * @covers            \tests\PhotoLogement::lireCheminPhoto
		 * @covers            \tests\PhotoLogement::lireIdPiece
		 * @covers            \tests\PhotoLogement::lireIdLogement
		 */
		public function testPhotoLogementEgaleEcrireLireSucces() 
		{
            $id_photo_logement = new PhotoLogement;
			$valeur = 1234;
			$id_photo_logement->ecrireIdPhotoLogement($valeur);
			$this->assertEquals($valeur, $id_photo_logement->lireIdPhotoLogement());
			
			$chemin_photo = new PhotoLogement;
			$valeur = "texte";
			$chemin_photo->ecrireCheminPhoto($valeur);
			$this->assertEquals($valeur, $chemin_photo->lireCheminPhoto());
			
			$id_piece = new PhotoLogement;
			$valeur = 1234;
			$id_piece->ecrireIdPiece($valeur);
			$this->assertEquals($valeur, $id_piece->lireIdPiece());
			
			$id_logement = new PhotoLogement;
			$valeur = 1234;
			$id_logement->ecrireIdLogement($valeur);
			$this->assertEquals($valeur, $id_logement->lireIdLogement());
		}
		/**
		 * @covers            \tests\PhotoLogement::__construct
		 * @covers            \tests\PhotoLogement::ecrireIdPhotoLogement
		 * @covers            \tests\PhotoLogement::ecrireCheminPhoto
		 * @covers            \tests\PhotoLogement::ecrireIdPiece
		 * @covers            \tests\PhotoLogement::ecrireIdLogement
		 * @covers            \tests\PhotoLogement::lireIdPhotoLogement
		 * @covers            \tests\PhotoLogement::lireCheminPhoto
		 * @covers            \tests\PhotoLogement::lireIdPiece
		 * @covers            \tests\PhotoLogement::lireIdLogement
		 */
		public function testPhotoLogementPasEgaleEcrireLireSucces() 
		{
            $id_photo_logement = new PhotoLogement;
			$valeur = "texte";
			$id_photo_logement->ecrireIdPhotoLogement($valeur);
			$this->assertNotEquals($valeur, $id_photo_logement->lireIdPhotoLogement());
			
			$chemin_photo = new PhotoLogement;
			$valeur = 1234;
			$chemin_photo->ecrireCheminPhoto($valeur);
			$this->assertNotEquals($valeur, $chemin_photo->lireCheminPhoto());
			
			$id_piece = new PhotoLogement;
			$valeur = "texte";
			$id_piece->ecrireIdPiece($valeur);
			$this->assertNotEquals($valeur, $id_piece->lireIdPiece());
			
			$id_logement = new PhotoLogement;
			$valeur = "texte";
			$id_logement->ecrireIdLogement($valeur);
			$this->assertNotEquals($valeur, $id_logement->lireIdLogement());
		}
    } //fin de la classe
