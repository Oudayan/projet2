<?php
/**
 * @file 	MessagesDestinatairesTest.php
 * @author 	Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date 	5 mars 2018
 * @brief 	PHPUnit pour la classe MessagesDestinataires.
 * @details Teste les attributs de la classe MessagesDestinataires 
 */
use PHPUnit\Framework\TestCase;

	class MessagesDestinatairesTest extends TestCase
	{	
		/**
		 * @covers            \tests\MessagesDestinataires::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('destinataire',MessagesDestinataires::class);
			$this->assertClassHasAttribute('lu',MessagesDestinataires::class);
			$this->assertClassHasAttribute('d_actif',MessagesDestinataires::class);
			$this->assertClassHasAttribute('id_message',MessagesDestinataires::class);
			$this->assertClassHasAttribute('id_reference',MessagesDestinataires::class);
			$this->assertClassHasAttribute('sujet',MessagesDestinataires::class);
			$this->assertClassHasAttribute('fichier_joint',MessagesDestinataires::class);
			$this->assertClassHasAttribute('message',MessagesDestinataires::class);
			$this->assertClassHasAttribute('msg_date',MessagesDestinataires::class);
			$this->assertClassHasAttribute('m_actif',MessagesDestinataires::class);
			$this->assertClassHasAttribute('expediteur',MessagesDestinataires::class);
		}
		/**
		 * @covers            \tests\MessagesDestinataires::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',MessagesDestinataires::class);
			$this->assertClassNotHasAttribute('Mary',MessagesDestinataires::class);
		}
		
		/**
		 * @covers            \tests\MessagesDestinataires::__construct
		 * @covers            \tests\MessagesDestinataires::ecrireDestinataire
		 * @covers            \tests\MessagesDestinataires::ecrireLu
		 * @covers            \tests\MessagesDestinataires::ecrireD_actif
		 * @covers            \tests\MessagesDestinataires::ecrireId_message
		 * @covers            \tests\MessagesDestinataires::ecrireId_reference
		 * @covers            \tests\MessagesDestinataires::ecrireSujet
		 * @covers            \tests\MessagesDestinataires::ecrireFichier_joint
		 * @covers            \tests\MessagesDestinataires::ecrireMessage
		 * @covers            \tests\MessagesDestinataires::ecrireMsg_date
		 * @covers            \tests\MessagesDestinataires::ecrireM_actif
		 * @covers            \tests\MessagesDestinataires::ecrireExpediteur
		 * @covers            \tests\MessagesDestinataires::lireDestinataire
		 * @covers            \tests\MessagesDestinataires::lireLu
	     * @covers            \tests\MessagesDestinataires::lireD_actif
		 * @covers            \tests\MessagesDestinataires::lireId_message
		 * @covers            \tests\MessagesDestinataires::lireId_reference
		 * @covers            \tests\MessagesDestinataires::lireSujet
		 * @covers            \tests\MessagesDestinataires::lireFichier_joint
		 * @covers            \tests\MessagesDestinataires::lireMessage
		 * @covers            \tests\MessagesDestinataires::lireMsg_date
		 * @covers            \tests\MessagesDestinataires::lireM_actif
		 * @covers            \tests\MessagesDestinataires::lireExpediteur
		 */
		public function testMessagesDestinatairesEgaleEcrireLireSucces() 
		{
            $destinataire = new MessagesDestinataires;
			$valeur = "texte";
			$destinataire->ecrireDestinataire($valeur);
			$this->assertEquals($valeur, $destinataire->lireDestinataire());
			
			$lu = new MessagesDestinataires;
			$valeur = true;
			$lu->ecrireLu($valeur);
			$this->assertEquals($valeur, $lu->lireLu());
			
			$d_actif = new MessagesDestinataires;
			$valeur = true;
			$d_actif->ecrireD_actif($valeur);
			$this->assertEquals($valeur, $d_actif->lireD_actif());
			
			$id_message = new MessagesDestinataires;
			$valeur = 4;
			$id_message->ecrireId_message($valeur);
			$this->assertEquals($valeur, $id_message->lireId_message());
			
			$id_reference = new MessagesDestinataires;
			$valeur = 4;
			$id_reference->ecrireId_reference($valeur);
			$this->assertEquals($valeur, $id_reference->lireId_reference());
			
			$sujet = new MessagesDestinataires;
			$valeur = "texte";
			$sujet->ecrireSujet($valeur);
			$this->assertEquals($valeur, $sujet->lireSujet());
			
			$fichier_joint = new MessagesDestinataires;
			$valeur = "texte";
			$fichier_joint->ecrireFichier_joint($valeur);
			$this->assertEquals($valeur, $fichier_joint->lireFichier_joint());
			
			$message = new MessagesDestinataires;
			$valeur = "texte";
			$message->ecrireMessage($valeur);
			$this->assertEquals($valeur, $message->lireMessage());
			
			$msg_date = new MessagesDestinataires;
			$valeur = "2018-02-21 08:00";
			$msg_date->ecrireMsg_date($valeur);
			$this->assertEquals($valeur, $msg_date->lireMsg_date());
			
			$m_actif = new MessagesDestinataires;
			//a corriger apres une mise à jour
			$valeur = "texte";
			$m_actif->ecrireM_actif($valeur);
			$this->assertEquals($valeur, $m_actif->lireM_actif());
			
			$expediteur = new MessagesDestinataires;
			$valeur = "texte";
			$expediteur->ecrireExpediteur($valeur);
			$this->assertEquals($valeur, $expediteur->lireExpediteur());
		}
		/**
		 * @covers            \tests\MessagesDestinataires::__construct
		 * @covers            \tests\MessagesDestinataires::ecrireDestinataire
		 * @covers            \tests\MessagesDestinataires::ecrireLu
		 * @covers            \tests\MessagesDestinataires::ecrireD_actif
		 * @covers            \tests\MessagesDestinataires::ecrireId_message
		 * @covers            \tests\MessagesDestinataires::ecrireId_reference
		 * @covers            \tests\MessagesDestinataires::ecrireSujet
		 * @covers            \tests\MessagesDestinataires::ecrireFichier_joint
		 * @covers            \tests\MessagesDestinataires::ecrireMessage
		 * @covers            \tests\MessagesDestinataires::ecrireMsg_date
		 * @covers            \tests\MessagesDestinataires::ecrireM_actif
		 * @covers            \tests\MessagesDestinataires::ecrireExpediteur
		 * @covers            \tests\MessagesDestinataires::ecrireDestinataire
		 * @covers            \tests\MessagesDestinataires::lireLu
		 * @covers            \tests\MessagesDestinataires::lireId_message
		 * @covers            \tests\MessagesDestinataires::lireId_reference
		 * @covers            \tests\MessagesDestinataires::lireSujet
		 * @covers            \tests\MessagesDestinataires::lireFichier_joint
		 * @covers            \tests\MessagesDestinataires::lireMessage
		 * @covers            \tests\MessagesDestinataires::lireMsg_date
		 * @covers            \tests\MessagesDestinataires::lireM_actif
		 * @covers            \tests\MessagesDestinataires::lireExpediteur
		 */
		public function testMessagesDestinatairesPasEgalEcrireLireSucces() 
		{
            $destinataire = new MessagesDestinataires;
			$valeur = 123;
			$destinataire->ecrireDestinataire($valeur);
			$this->assertNotEquals($valeur, $destinataire->lireDestinataire());
			
			$lu = new MessagesDestinataires;
			$valeur = "texte";
			$lu->ecrireLu($valeur);
			$this->assertNotEquals($valeur, $lu->lireLu());
			
			$d_actif = new MessagesDestinataires;
			$valeur = "texte";
			$d_actif->ecrireD_actif($valeur);
			$this->assertNotEquals($valeur, $d_actif->lireD_actif());
			
			$id_message = new MessagesDestinataires;
			$valeur = "texte";
			$id_message->ecrireId_message($valeur);
			$this->assertNotEquals($valeur, $id_message->lireId_message());
			
			$id_reference = new MessagesDestinataires();
			$valeur = "texte";
			$id_reference->ecrireId_reference($valeur);
			$this->assertNotEquals($valeur, $id_reference->lireId_reference());
			
			$sujet = new MessagesDestinataires;
			$valeur = 123;
			$sujet->ecrireSujet($valeur);
			$this->assertNotEquals($valeur, $sujet->lireSujet());
			
			$fichier_joint = new MessagesDestinataires;
			$valeur = 123;
			$fichier_joint->ecrireFichier_joint($valeur);
			$this->assertNotEquals($valeur, $fichier_joint->lireFichier_joint());
			
			$message = new MessagesDestinataires;
			$valeur = 123;
			$message->ecrireMessage($valeur);
			$this->assertNotEquals($valeur, $message->lireMessage());
			
			$msg_date = new MessagesDestinataires;
			$valeur = 123;
			$msg_date->ecrireMsg_date($valeur);
			$this->assertNotEquals($valeur, $msg_date->lireMsg_date());
			
			$m_actif = new MessagesDestinataires;
			$valeur = 123;
			$m_actif->ecrireM_actif($valeur);
			$this->assertNotEquals($valeur, $m_actif->lireM_actif());
			
			$expediteur = new MessagesDestinataires;
			$valeur = 123;
			$expediteur->ecrireExpediteur($valeur);
			$this->assertNotEquals($valeur, $expediteur->lireExpediteur());
			
			$expediteur = new MessagesDestinataires;
			$valeur = -123;
			$expediteur->ecrireExpediteur($valeur);
			$this->assertNotEquals($valeur, $expediteur->lireExpediteur());
		}
		
	} //fin de la classe

?>