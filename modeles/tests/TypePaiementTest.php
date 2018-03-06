<?php
/**
 * @file    TypePaiementTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    6 mars 2018
 * @brief 	PHPUnit pour la classe TypePaiement.
 * @details Teste les attributs de la classe TypePaiement 
 */
use PHPUnit\Framework\TestCase;

	class TypePaiementTest extends TestCase
	{
		/**TypePaiement
		 * @covers            \tests\::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_paiement',TypePaiement::class);
			$this->assertClassHasAttribute('paiement',TypePaiement::class);
		}	
		/**
		 * @covers            \tests\TypePaiement::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',TypePaiement::class);
			$this->assertClassNotHasAttribute('Mary',TypePaiement::class);
		}
		
		/**
		 * @covers            \tests\TypePaiement::__construct
		 * @covers            \tests\TypePaiement::ecrireidPaiement
		 * @covers            \tests\TypePaiement::ecrirePaiement
		 * @covers            \tests\TypePaiement::lireidPaiement
		 * @covers            \tests\TypePaiement::lirePaiement
		 */
		public function testTypePaiementEgaleEcrireLireSucces() 
		{
            $id_paiement = new TypePaiement;
			$valeur = 1234;
			$id_paiement->ecrireidPaiement($valeur);
			$this->assertEquals($valeur, $id_paiement->lireidPaiement());
			
			$paiement = new TypePaiement;
			$valeur = "texte";
			$paiement->ecrirePaiement($valeur);
			$this->assertEquals($valeur, $paiement->lirePaiement());
		}
		/**
		 * @covers            \tests\TypePaiement::__construct
		 * @covers            \tests\TypePaiement::ecrireidPaiement
		 * @covers            \tests\TypePaiement::ecrirePaiement
		 * @covers            \tests\TypePaiement::lireidPaiement
		 * @covers            \tests\TypePaiement::lirePaiement
		 */
		public function testTypePaiementPasEgaleEcrireLireSucces() 
		{
            $id_paiement = new TypePaiement;
			$valeur = "texte";
			$id_paiement->ecrireidPaiement($valeur);
			$this->assertNotEquals($valeur, $id_paiement->lireidPaiement());
			
			$paiement = new TypePaiement;
			$valeur = 1234;
			$paiement->ecrirePaiement($valeur);
			$this->assertNotEquals($valeur, $paiement->lirePaiement());
			
			$id_paiement = new TypePaiement;
			$valeur = -1234;
			$id_paiement->ecrireidPaiement($valeur);
			$this->assertEquals($valeur, $id_paiement->lireidPaiement());
		}

	} //fin de la classe

?>