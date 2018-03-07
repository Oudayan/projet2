<?php
/**
 * @file    PaiementTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date 	5 mars 2018
 * @brief 	PHPUnit pour la classe Paiement.
 * @details Teste les attributs de la classe Paiement  
 */
use PHPUnit\Framework\TestCase;
	class PaiementTest extends TestCase
	{
		/**
		 * @covers            \tests\Paiement::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_paiement',Paiement::class);
			$this->assertClassHasAttribute('paiement',Paiement::class);
		}
		/**
		 * @covers            \tests\Paiement::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() {
            $this->assertClassNotHasAttribute('foo',Paiement::class);
			$this->assertClassNotHasAttribute('Mary',Paiement::class);
		}
		
	} //fin de la classe
