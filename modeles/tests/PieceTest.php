<?php
/**
 * @file    PieceTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    5 mars 2018
 * @brief 	PHPUnit pour la classe Piece
 * @details Teste les attributs de la classe Piece 
 */
use PHPUnit\Framework\TestCase;
	class PieceTest extends TestCase
	{
		/**
		 * @covers            \tests\Piece::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_piece',Piece::class);
			$this->assertClassHasAttribute('description_piece',Piece::class);
		}	
		/**
		 * @covers            \tests\Piece::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() {
            $this->assertClassNotHasAttribute('foo',Piece::class);
			$this->assertClassNotHasAttribute('Mary',Piece::class);
		}
		/**
		 * @covers            \tests\Piece::__construct
		 * @covers            \tests\Piece::ecrireId_piece
		 * @covers            \tests\Piece::ecrireDescription_piece
		 * @covers            \tests\Piece::lireId_piece
		 * @covers            \tests\Piece::lireDescription_piece
		 */
		public function testPieceEgaleEcrireLireSucces() 
		{
            $id_piece = new Piece();
			$valeur = "John";
			$id_piece->ecrireId_piece($valeur);
			$this->assertEquals($valeur, $id_piece->lireId_piece());
			
			$description_piece = new Piece();
			$valeur = true;
			$description_piece->ecrireDescription_piece($valeur);
			$this->assertEquals($valeur, $description_piece->lireDescription_piece());
		}
		/**
		 * @covers            \tests\Piece::__construct
		 * @covers            \tests\Piece::ecrireIdpiece
		 * @covers            \tests\Piece::ecrireDescriptionPiece
		 * @covers            \tests\Piece::lireIdpiece
		 * @covers            \tests\Piece::lireDescriptionPiece
		 */
		public function testPiecePasEgaleEcrireLireSucces() 
		{
            $id_piece = new Piece();
			$valeur = "John";
			$id_piece->ecrireIdpiece($valeur);
			$this->assertNotEquals($valeur, $id_piece->lireIdpiece());
			
			$description_piece = new Piece();
			$valeur = true;
			$description_piece->ecrireDescriptionPiece($valeur);
			$this->assertNotEquals($valeur, $description_piece->lireDescriptionPiece());
		}
		

    }  //fin de la classe
