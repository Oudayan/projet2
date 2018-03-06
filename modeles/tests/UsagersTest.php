<?php
/**
 * @file    UsagersTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    6 mars 2018
 * @brief 	PHPUnit pour la classe Usagers.
 * @details Teste les attributs de la classe Usagers  
*/
use PHPUnit\Framework\TestCase;

	class UsagersTest extends TestCase
	{
		/**
		 * @covers            \tests\Usagers::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
           $this->assertClassHasAttribute('courriel',Usagers::class);
		   $this->assertClassHasAttribute('nom',Usagers::class);
			$this->assertClassHasAttribute('prenom',Usagers::class);
			$this->assertClassHasAttribute('cellulaire',Usagers::class);
			$this->assertClassHasAttribute('mot_de_passe',Usagers::class);
			$this->assertClassHasAttribute('u_banni',Usagers::class);
			$this->assertClassHasAttribute('u_commentaire_banni',Usagers::class);
			$this->assertClassHasAttribute('u_date_banni',Usagers::class);
			$this->assertClassHasAttribute('id_contact',Usagers::class);
			$this->assertClassHasAttribute('id_type_usager',Usagers::class);
			$this->assertClassHasAttribute('id_paiement',Usagers::class);
			$this->assertClassHasAttribute('u_valide',Usagers::class);
			$this->assertClassHasAttribute('u_actif',Usagers::class);
	
		}
		/**
		 * @covers            \tests\Usagers::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',Usagers::class);
			$this->assertClassNotHasAttribute('Mary',Usagers::class);
		}
		/**
		 * @covers            \tests\Usagers::__construct
		 * @covers            \tests\Usagers::ecrireCourriel
		 * @covers            \tests\Usagers::ecrireNom
		 * @covers            \tests\Usagers::ecrirepreNom
		 * @covers            \tests\Usagers::ecrireCellulaire
		 * @covers            \tests\Usagers::ecrireMotDePasse
		 * @covers            \tests\Usagers::ecrireestBanni
		 * @covers            \tests\Usagers::ecrireCommentaireBanni
		 * @covers            \tests\Usagers::ecrireDateBanni
		 * @covers            \tests\Usagers::ecrireContact
		 * @covers            \tests\Usagers::ecrireTypeUsager
		 * @covers            \tests\Usagers::ecrireTypePaiement
		 * @covers            \tests\Usagers::ecrireUValide
		 * @covers            \tests\Usagers::ecrireUActif
		 * @covers            \tests\Usagers::lireCourriel
		 * @covers            \tests\Usagers::lireNom
		 * @covers            \tests\Usagers::lirepreNom
		 * @covers            \tests\Usagers::lireCellulaire
		 * @covers            \tests\Usagers::lireMotDePasse
		 * @covers            \tests\Usagers::lireestBanni
		 * @covers            \tests\Usagers::lireCommentaireBanni
		 * @covers            \tests\Usagers::lireDateBanni
		 * @covers            \tests\Usagers::lireContact
		 * @covers            \tests\Usagers::lireTypeUsager
		 * @covers            \tests\Usagers::lireTypePaiement
		 * @covers            \tests\Usagers::lireUValide
		 * @covers            \tests\Usagers::lireUActif
		 */
		public function testUsagersEgaleEcrireLireSucces() 
		{
            $courriel = new Usagers;
			$valeur = "Texte";
			$courriel->ecrireCourriel($valeur);
			$this->assertEquals($valeur, $courriel->lireCourriel());
			
			$nom = new Usagers;
			$valeur = "Texte";
			$nom->ecrireNom($valeur);
			$this->assertEquals($valeur, $nom->lireNom());
			
			$prenom = new Usagers;
			$valeur = "Texte";
			$prenom->ecrirepreNom($valeur);
			$this->assertEquals($valeur, $prenom->lirepreNom());
			
			$cellulaire = new Usagers;
			$valeur = "Texte";
			$cellulaire->ecrireCellulaire($valeur);
			$this->assertEquals($valeur, $cellulaire->lireCellulaire());
			
			$mot_de_passe = new Usagers;
			$valeur = "Texte";
			$mot_de_passe->ecrireMotDePasse($valeur);
			$this->assertEquals($valeur, $mot_de_passe->lireMotDePasse());
			
			$u_banni = new Usagers;
			$valeur = 1234;
			$u_banni->ecrireestBanni($valeur);
			$this->assertEquals($valeur, $u_banni->lireestBanni());
			
			$u_commentaire_banni = new Usagers;
			$valeur = "texte";
			$u_commentaire_banni->ecrireCommentaireBanni($valeur);
			$this->assertEquals($valeur, $u_commentaire_banni->lireCommentaireBanni());
			
			$u_date_banni = new Usagers;
			$valeur = "texte";
			$u_date_banni->ecrireDateBanni($valeur);
			$this->assertEquals($valeur, $u_date_banni->lireDateBanni());
			
			$id_contact = new Usagers;
			$valeur = 1234;
			$id_contact->ecrireContact($valeur);
			$this->assertEquals($valeur, $id_contact->lireContact());
			
			$id_type_usager = new Usagers;
			$valeur = 1234;
			$id_type_usager->ecrireTypeUsager($valeur);
			$this->assertEquals($valeur, $id_type_usager->lireTypeUsager());
			
			$id_paiement = new Usagers;
			$valeur = 1234;
			$id_paiement->ecrireTypePaiement($valeur);
			$this->assertEquals($valeur, $id_paiement->lireTypePaiement());
			
			$u_valide = new Usagers;
			$valeur = true;
			$u_valide->ecrireUValide($valeur);
			$this->assertEquals($valeur, $u_valide->lireUValide());
			
			$u_actif = new Usagers;
			$valeur = true;
			$u_actif->ecrireUActif($valeur);
			$this->assertEquals($valeur, $u_actif->lireUActif());
		/**
		 * @covers            \tests\Usagers::__construct
		 * @covers            \tests\Usagers::ecrireCourriel
		 * @covers            \tests\Usagers::ecrireNom
		 * @covers            \tests\Usagers::ecrirepreNom
		 * @covers            \tests\Usagers::ecrireCellulaire
		 * @covers            \tests\Usagers::ecrireMotDePasse
		 * @covers            \tests\Usagers::ecrireestBanni
		 * @covers            \tests\Usagers::ecrireCommentaireBanni
		 * @covers            \tests\Usagers::ecrireDateBanni
		 * @covers            \tests\Usagers::ecrireContact
		 * @covers            \tests\Usagers::ecrireTypeUsager
		 * @covers            \tests\Usagers::ecrireTypePaiement
		 * @covers            \tests\Usagers::ecrireUValide
		 * @covers            \tests\Usagers::ecrireUActif
		 * @covers            \tests\Usagers::lireCourriel
		 * @covers            \tests\Usagers::lireNom
		 * @covers            \tests\Usagers::lirepreNom
		 * @covers            \tests\Usagers::lireCellulaire
		 * @covers            \tests\Usagers::lireMotDePasse
		 * @covers            \tests\Usagers::lireestBanni
		 * @covers            \tests\Usagers::lireCommentaireBanni
		 * @covers            \tests\Usagers::lireDateBanni
		 * @covers            \tests\Usagers::lireContact
		 * @covers            \tests\Usagers::lireTypeUsager
		 * @covers            \tests\Usagers::lireTypePaiement
		 * @covers            \tests\Usagers::lireUValide
		 * @covers            \tests\Usagers::lireUActif
		 */
		public function testUsagersPasEgaleEcrireLireSucces() 
		{
            $courriel = new Usagers;
			$valeur = 1234;
			$courriel->ecrireCourriel($valeur);
			$this->assertNotEquals($valeur, $courriel->lireCourriel());
			
			$nom = new Usagers;
			$valeur = 1234;
			$nom->ecrireNom($valeur);
			$this->assertNotEquals($valeur, $nom->lireNom());
			
			$prenom = new Usagers;
			$valeur = 1234;
			$prenom->ecrirepreNom($valeur);
			$this->assertNotEquals($valeur, $prenom->lirepreNom());
			
			$cellulaire = new Usagers;
			$valeur = 1234;
			$cellulaire->ecrireCellulaire($valeur);
			$this->assertNotEquals($valeur, $cellulaire->lireCellulaire());
			
			$mot_de_passe = new Usagers;
			$valeur = 1234;
			$mot_de_passe->ecrireMotDePasse($valeur);
			$this->assertNotEquals($valeur, $mot_de_passe->lireMotDePasse());
			
			$u_banni = new Usagers;
			$valeur = "texte";
			$u_banni->ecrireestBanni($valeur);
			$this->assertEquals($valeur, $u_banni->lireestBanni());
			
			$u_commentaire_banni = new Usagers;
			$valeur = 1234;
			$u_commentaire_banni->ecrireCommentaireBanni($valeur);
			$this->assertNotEquals($valeur, $u_commentaire_banni->lireCommentaireBanni());
			
			$u_date_banni = new Usagers;
			$valeur = 1234;
			$u_date_banni->ecrireDateBanni($valeur);
			$this->assertNotEquals($valeur, $u_date_banni->lireDateBanni());
			
			$id_contact = new Usagers;
			$valeur = "texte";
			$id_contact->ecrireContact($valeur);
			$this->assertEquals(assertNotEquals);
			
			$id_type_usager = new Usagers;
			$valeur = "texte";
			$id_type_usager->ecrireTypeUsager($valeur);
			$this->assertNotEquals($valeur, $id_type_usager->lireTypeUsager());
			
			$id_paiement = new Usagers;
			$valeur = "texte";
			$id_paiement->ecrireTypePaiement($valeur);
			$this->assertNotEquals($valeur, $id_paiement->lireTypePaiement());
			
			$u_valide = new Usagers;
			$valeur = "texte";
			$u_valide->ecrireUValide($valeur);
			$this->assertNotEquals($valeur, $u_valide->lireUValide());
			
			$u_actif = new Usagers;
			$valeur = "texte";
			$u_actif->ecrireUActif($valeur);
			$this->assertNotEquals($valeur, $u_actif->lireUActif());
			
			$u_valide = new Usagers;
			$valeur = 1234;
			$u_valide->ecrireUValide($valeur);
			$this->assertNotEquals($valeur, $u_valide->lireUValide());
			
			$u_actif = new Usagers;
			$valeur = 1234;
			$u_actif->ecrireUActif($valeur);
			$this->assertNotEquals($valeur, $u_actif->lireUActif());
			
			$id_contact = new Usagers;
			$valeur = -1234;
			$id_contact->ecrireContact($valeur);
			$this->assertEquals(assertNotEquals);
		}

	} //fin de la classe

?>