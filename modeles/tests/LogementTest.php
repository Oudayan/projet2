<?php
/**
 * @file    Logement.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1
 * @date 	6 mars 2018
 * @brief 	PHPUnit pour la classe MessagesDestinataires.
 * @details Teste les attributs de la classe MessagesDestinataires 
 */
 use PHPUnit\Framework\TestCase;
 
	class LogementTest extends TestCase 
	{
        /**
		 * @covers            \tests\MessagesDestinataires::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_logement',MessagesDestinataires::class);
			$this->assertClassHasAttribute('no_civique',MessagesDestinataires::class);
			$this->assertClassHasAttribute('apt',MessagesDestinataires::class);
			$this->assertClassHasAttribute('rue',MessagesDestinataires::class);
			$this->assertClassHasAttribute('ville',MessagesDestinataires::class);
			$this->assertClassHasAttribute('province',MessagesDestinataires::class);
			$this->assertClassHasAttribute('pays',MessagesDestinataires::class);
			$this->assertClassHasAttribute('code_postal',MessagesDestinataires::class);
			$this->assertClassHasAttribute('latitude',MessagesDestinataires::class);
			$this->assertClassHasAttribute('longitude',MessagesDestinataires::class);
			$this->assertClassHasAttribute('courriel',MessagesDestinataires::class);
			$this->assertClassHasAttribute('id_type_logement',MessagesDestinataires::class);
			$this->assertClassHasAttribute('premiere_photo',MessagesDestinataires::class);
			$this->assertClassHasAttribute('prix',MessagesDestinataires::class);
			$this->assertClassHasAttribute('evaluation',MessagesDestinataires::class);
			$this->assertClassHasAttribute('description',MessagesDestinataires::class);
			$this->assertClassHasAttribute('nb_personnes',MessagesDestinataires::class);
			$this->assertClassHasAttribute('nb_chambres',MessagesDestinataires::class);
			$this->assertClassHasAttribute('nb_lits',MessagesDestinataires::class);
			$this->assertClassHasAttribute('nb_salle_de_bain',MessagesDestinataires::class);
			$this->assertClassHasAttribute('nb_demi_salle_de_bain',MessagesDestinataires::class);
			$this->assertClassHasAttribute('frais_nettoyage',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_stationnement',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_wifi',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_cuisine',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_tv',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_fer_a_repasser',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_cintres',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_seche_cheveux',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_climatise',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_laveuse',MessagesDestinataires::class);
			$this->assertClassHasAttribute('est_secheuse',MessagesDestinataires::class);
			$this->assertClassHasAttribute('expediteur',MessagesDestinataires::class);
			$this->assertClassHasAttribute('l_valide',MessagesDestinataires::class);
			$this->assertClassHasAttribute('l_actif',MessagesDestinataires::class);
			$this->assertClassHasAttribute('l_banni',MessagesDestinataires::class);
			$this->assertClassHasAttribute('l_date_banni',MessagesDestinataires::class);
			$this->assertClassHasAttribute('l_commentaire_banni',MessagesDestinataires::class);
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
		 * @covers            \tests\MessagesDestinataires::ecrireIdLogement
		 * @covers            \tests\MessagesDestinataires::ecrireNoCivique
		 * @covers            \tests\MessagesDestinataires::ecrireApt
		 * @covers            \tests\MessagesDestinataires::ecrireRue
		 * @covers            \tests\MessagesDestinataires::ecrireVille
		 * @covers            \tests\MessagesDestinataires::ecrireProvince
		 * @covers            \tests\MessagesDestinataires::ecrirePays
		 * @covers            \tests\MessagesDestinataires::ecrireCodePostal
		 * @covers            \tests\MessagesDestinataires::ecrireLatitude
		 * @covers            \tests\MessagesDestinataires::ecrireLongitude
		 * @covers            \tests\MessagesDestinataires::ecrireCourriel
		 * @covers            \tests\MessagesDestinataires::ecrireIdTypeLogement
		 * @covers            \tests\MessagesDestinataires::ecrirePremierePhoto
		 * @covers            \tests\MessagesDestinataires::ecrirePrix
		 * @covers            \tests\MessagesDestinataires::ecrireEvaluation
		 * @covers            \tests\MessagesDestinataires::ecrireDescription
		 * @covers            \tests\MessagesDestinataires::ecrireNbPersonnes
		 * @covers            \tests\MessagesDestinataires::ecrireNbChambres
		 * @covers            \tests\MessagesDestinataires::ecrireNbLits
		 * @covers            \tests\MessagesDestinataires::ecrireNbSalleDeBain
		 * @covers            \tests\MessagesDestinataires::ecrireNbDemiSalleDeBain
		 * @covers            \tests\MessagesDestinataires::ecrireFraisNettoyage
		 * @covers            \tests\MessagesDestinataires::ecrireEstStationnement
		 * @covers            \tests\MessagesDestinataires::ecrireEstWifi
		 * @covers            \tests\MessagesDestinataires::ecrireEstCuisine
		 * @covers            \tests\MessagesDestinataires::ecrireEstTv
		 * @covers            \tests\MessagesDestinataires::ecrireEstFerARepasser
		 * @covers            \tests\MessagesDestinataires::ecrireEstCintres
		 * @covers            \tests\MessagesDestinataires::ecrireEstSecheCheveux
		 * @covers            \tests\MessagesDestinataires::ecrireEstClimatise
		 * @covers            \tests\MessagesDestinataires::ecrireEstLaveuse
		 * @covers            \tests\MessagesDestinataires::ecrireEstSecheuse
		 * @covers            \tests\MessagesDestinataires::ecrireEstChauffage
		 * @covers            \tests\MessagesDestinataires::ecrireLvalide
		 * @covers            \tests\MessagesDestinataires::ecrireLActif
		 * @covers            \tests\MessagesDestinataires::ecrireLBanni
		 * @covers            \tests\MessagesDestinataires::ecrireLDateBanni
		 * @covers            \tests\MessagesDestinataires::ecrireLCommentaireBanni
		 * @covers            \tests\MessagesDestinataires::lireIdLogement
		 * @covers            \tests\MessagesDestinataires::lireNoCivique
		 * @covers            \tests\MessagesDestinataires::lireApt
		 * @covers            \tests\MessagesDestinataires::lireRue
		 * @covers            \tests\MessagesDestinataires::lireVille
		 * @covers            \tests\MessagesDestinataires::lireProvince
		 * @covers            \tests\MessagesDestinataires::lirePays
		 * @covers            \tests\MessagesDestinataires::lireCodePostal
		 * @covers            \tests\MessagesDestinataires::lireLatitude
		 * @covers            \tests\MessagesDestinataires::lireLongitude
		 * @covers            \tests\MessagesDestinataires::lireCourriel
		 * @covers            \tests\MessagesDestinataires::lireIdTypeLogement
		 * @covers            \tests\MessagesDestinataires::lirePremierePhoto
		 * @covers            \tests\MessagesDestinataires::lirePrix
		 * @covers            \tests\MessagesDestinataires::lireEvaluation
		 * @covers            \tests\MessagesDestinataires::lireDescription
		 * @covers            \tests\MessagesDestinataires::lireNbPersonnes
		 * @covers            \tests\MessagesDestinataires::lireNbChambres
		 * @covers            \tests\MessagesDestinataires::lireNbLits
		 * @covers            \tests\MessagesDestinataires::lireNbSalleDeBain
		 * @covers            \tests\MessagesDestinataires::lireNbDemiSalleDeBain
		 * @covers            \tests\MessagesDestinataires::lireFraisNettoyage
		 * @covers            \tests\MessagesDestinataires::lireEstStationnement
		 * @covers            \tests\MessagesDestinataires::lireEstWifi
		 * @covers            \tests\MessagesDestinataires::lireEstCuisine
		 * @covers            \tests\MessagesDestinataires::lireEstTv
		 * @covers            \tests\MessagesDestinataires::lireEstFerARepasser
		 * @covers            \tests\MessagesDestinataires::lireEstCintres
		 * @covers            \tests\MessagesDestinataires::lireEstSecheCheveux
		 * @covers            \tests\MessagesDestinataires::lireEstClimatise
		 * @covers            \tests\MessagesDestinataires::lireEstLaveuse
		 * @covers            \tests\MessagesDestinataires::lireEstSecheuse
		 * @covers            \tests\MessagesDestinataires::lireEstChauffage
		 * @covers            \tests\MessagesDestinataires::lireLvalide
		 * @covers            \tests\MessagesDestinataires::lireLActif
		 * @covers            \tests\MessagesDestinataires::lireLBanni
		 * @covers            \tests\MessagesDestinataires::lireLDateBanni
		 * @covers            \tests\MessagesDestinataires::lireLCommentaireBanni
		 */	
		public function testMessagesDestinatairesEgaleEcrireLireSucces() 
		{
            $id_logement = new MessagesDestinataires();
			$valeur = "texte";
			$id_logement->ecrireIdLogement($valeur);
			$this->assertEquals($valeur, $id_logement->lireIdLogement());
			
			$no_civique = new MessagesDestinataires();
			$valeur = true;
			$no_civique->ecrireNoCivique($valeur);
			$this->assertEquals($valeur, $no_civique->lireNoCivique());
		
			$apt = new MessagesDestinataires();
			$valeur = true;
			$apt->ecrireApt($valeur);
			$this->assertEquals($valeur, $apt->lireApt());
		
			$rue = new MessagesDestinataires();
			$valeur = true;
			$rue->ecrireRue($valeur);
			$this->assertEquals($valeur, $rue->lireRue());
			
			$ville = new MessagesDestinataires();
			$valeur = true;
			$ville->ecrireVille($valeur);
			$this->assertEquals($valeur, $ville->lireVille());
			
			$province = new MessagesDestinataires();
			$valeur = true;
			$province->ecrireProvince($valeur);
			$this->assertEquals($valeur, $province->lireProvince());
			
			$pays = new MessagesDestinataires();
			$valeur = true;
			$pays->ecrirePays($valeur);
			$this->assertEquals($valeur, $pays->lirePays());
			
			$code_postal = new MessagesDestinataires();
			$valeur = true;
			$code_postal->ecrireCodePostal($valeur);
			$this->assertEquals($valeur, $code_postal->lireCodePostal());
			
			$latitude = new MessagesDestinataires();
			$valeur = true;
			$latitude->ecrireLatitude($valeur);
			$this->assertEquals($valeur, $latitude->lireLatitude());
			
			$longitude = new MessagesDestinataires();
			$valeur = true;
			$longitude->ecrireLongitude($valeur);
			$this->assertEquals($valeur, $longitude->lireLongitude());
			
			$courriel = new MessagesDestinataires();
			$valeur = true;
			$courriel->ecrireCourriel($valeur);
			$this->assertEquals($valeur, $courriel->lireCourriel());
			
			$id_type_logement = new MessagesDestinataires();
			$valeur = true;
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertEquals($valeur, $id_type_logement->lireIdTypeLogement());
			
			$premiere_photo = new MessagesDestinataires();
			$valeur = true;
			$premiere_photo->ecrirePremierePhoto($valeur);
			$this->assertEquals($valeur, $premiere_photo->lirePremierePhoto());
			
			$prix = new MessagesDestinataires();
			$valeur = true;
			$prix->ecrirePrix($valeur);
			$this->assertEquals($valeur, $prix->lirePrix());
			
			$evaluation = new MessagesDestinataires();
			$valeur = true;
			$evaluation->ecrireEvaluation($valeur);
			$this->assertEquals($valeur, $evaluation->lireEvaluation());
			
			$description = new MessagesDestinataires();
			$valeur = true;
			$description->ecrireDescription($valeur);
			$this->assertEquals($valeur, $description->lireDescription());
			
			$nb_personnes = new MessagesDestinataires();
			$valeur = true;
			$nb_personnes->ecrireNbPersonnes($valeur);
			$this->assertEquals($valeur, $nb_personnes->lireNbPersonnes());
			
			$nb_chambres = new MessagesDestinataires();
			$valeur = true;
			$nb_chambres-> ecrireNbChambres($valeur);
			$this->assertEquals($valeur, $nb_chambres->lireNbChambres());
			
			$nb_lits = new MessagesDestinataires();
			$valeur = true;
			$nb_lits->ecrireNbLits($valeur);
			$this->assertEquals($valeur, $nb_lits->lireNbLits());
			
			$nb_salle_de_bain = new MessagesDestinataires();
			$valeur = true;
			$nb_salle_de_bain->ecrireNbSalleDeBain($valeur);
			$this->assertEquals($valeur, $nb_salle_de_bain->lireNbSalleDeBain());
			
			$nb_demi_salle_de_bain = new MessagesDestinataires();
			$valeur = true;
			$nb_demi_salle_de_bain->ecrireNbDemiSalleDeBain($valeur);
			$this->assertEquals($valeur, $nb_demi_salle_de_bain->lireNbDemiSalleDeBain());
			
			$frais_nettoyage = new MessagesDestinataires();
			$valeur = true;
			$frais_nettoyage->ecrireFraisNettoyage($valeur);
			$this->assertEquals($valeur, $frais_nettoyage->lireFraisNettoyage());
			
			$est_stationnement = new MessagesDestinataires();
			$valeur = true;
			$est_stationnement->ecrireEstStationnement($valeur);
			$this->assertEquals($valeur, $est_stationnement->lireEstStationnement());
			
			$est_wifi = new MessagesDestinataires();
			$valeur = true;
			$est_wifi-> ecrireEstWifi($valeur);
			$this->assertEquals($valeur, $est_wifi->lireEstWifi());
			
			$est_cuisine = new MessagesDestinataires();
			$valeur = true;
			$est_cuisine-> ecrireEstCuisine($valeur);
			$this->assertEquals($valeur, $est_cuisine->lireEstCuisine());
			
			$est_tv = new MessagesDestinataires();
			$valeur = true;
			$est_tv->ecrireEstTv($valeur);
			$this->assertEquals($valeur, $est_tv->lireEstTv());
			
			$est_fer_a_repasser = new MessagesDestinataires();
			$valeur = true;
			$est_fer_a_repasser->ecrireEstFerARepasser($valeur);
			$this->assertEquals($valeur, $est_fer_a_repasser->lireEstFerARepasser());
			
		
			$est_cintres = new MessagesDestinataires();
			$valeur = true;
			$est_cintres->ecrireEstCintres($valeur);
			$this->assertEquals($valeur, $est_cintres->lireEstCintres());
		
			$est_seche_cheveux = new MessagesDestinataires();
			$valeur = true;
			$est_seche_cheveux->ecrireEstSecheCheveux($valeur);
			$this->assertEquals($valeur, $est_seche_cheveux->lireEstSecheCheveux());
		
			$est_climatise = new MessagesDestinataires();
			$valeur = true;
			$est_climatise-> ecrireEstClimatise($valeur);
			$this->assertEquals($valeur, $est_climatise->lireEstClimatise());
		
			$est_laveuse = new MessagesDestinataires();
			$valeur = true;
			$est_laveuse-> ecrireEstLaveuse($valeur);
			$this->assertEquals($valeur, $est_laveuse->lireEstLaveuse());
		
			$est_secheuse = new MessagesDestinataires();
			$valeur = true;
			$est_secheuse->ecrireEstSecheuse($valeur);
			$this->assertEquals($valeur, $est_secheuse->lireEstSecheuse());
		
			$est_chauffage = new MessagesDestinataires();
			$valeur = true;
			$est_chauffage-> ecrireEstChauffage($valeur);
			$this->assertEquals($valeur, $est_chauffage-> lireEstChauffage());
		
			$l_valide = new MessagesDestinataires();
			$valeur = true;
			$l_valide->ecrireLvalide($valeur);
			$this->assertEquals($valeur, $l_valide->lireLvalide());
			
			$l_actif = new MessagesDestinataires();
			$valeur = true;
			$l_actif->ecrireLActif($valeur);
			$this->assertEquals($valeur, $l_actif->lireLActif());
			
			$l_banni = new MessagesDestinataires();
			$valeur = true;
			$l_banni->ecrireLBanni($valeur);
			$this->assertEquals($valeur, $l_banni->lireLBanni());
			
			$l_date_banni = new MessagesDestinataires();
			$valeur = true;
			$l_date_banni-> ecrireLDateBanni($valeur);
			$this->assertEquals($valeur, $l_date_banni->lireLDateBanni());
			
			$l_commentaire_banni = new MessagesDestinataires();
			$valeur = true;
			$l_commentaire_banni->ecrireLCommentaireBanni($valeur);
			$this->assertEquals($valeur, $l_commentaire_banni->lireLCommentaireBanni());
		}
		/**
		 * @covers            \tests\MessagesDestinataires::__construct
		 * @covers            \tests\MessagesDestinataires::ecrireIdLogement
		 * @covers            \tests\MessagesDestinataires::ecrireNoCivique
		 * @covers            \tests\MessagesDestinataires::ecrireApt
		 * @covers            \tests\MessagesDestinataires::ecrireRue
		 * @covers            \tests\MessagesDestinataires::ecrireVille
		 * @covers            \tests\MessagesDestinataires::ecrireProvince
		 * @covers            \tests\MessagesDestinataires::ecrirePays
		 * @covers            \tests\MessagesDestinataires::ecrireCodePostal
		 * @covers            \tests\MessagesDestinataires::ecrireLatitude
		 * @covers            \tests\MessagesDestinataires::ecrireLongitude
		 * @covers            \tests\MessagesDestinataires::ecrireCourriel
		 * @covers            \tests\MessagesDestinataires::ecrireIdTypeLogement
		 * @covers            \tests\MessagesDestinataires::ecrirePremierePhoto
		 * @covers            \tests\MessagesDestinataires::ecrirePrix
		 * @covers            \tests\MessagesDestinataires::ecrireEvaluation
		 * @covers            \tests\MessagesDestinataires::ecrireDescription
		 * @covers            \tests\MessagesDestinataires::ecrireNbPersonnes
		 * @covers            \tests\MessagesDestinataires::ecrireNbChambres
		 * @covers            \tests\MessagesDestinataires::ecrireNbLits
		 * @covers            \tests\MessagesDestinataires::ecrireNbSalleDeBain
		 * @covers            \tests\MessagesDestinataires::ecrireNbDemiSalleDeBain
		 * @covers            \tests\MessagesDestinataires::ecrireFraisNettoyage
		 * @covers            \tests\MessagesDestinataires::ecrireEstStationnement
		 * @covers            \tests\MessagesDestinataires::ecrireEstWifi
		 * @covers            \tests\MessagesDestinataires::ecrireEstCuisine
		 * @covers            \tests\MessagesDestinataires::ecrireEstTv
		 * @covers            \tests\MessagesDestinataires::ecrireEstFerARepasser
		 * @covers            \tests\MessagesDestinataires::ecrireEstCintres
		 * @covers            \tests\MessagesDestinataires::ecrireEstSecheCheveux
		 * @covers            \tests\MessagesDestinataires::ecrireEstClimatise
		 * @covers            \tests\MessagesDestinataires::ecrireEstLaveuse
		 * @covers            \tests\MessagesDestinataires::ecrireEstSecheuse
		 * @covers            \tests\MessagesDestinataires::ecrireEstChauffage
		 * @covers            \tests\MessagesDestinataires::ecrireLvalide
		 * @covers            \tests\MessagesDestinataires::ecrireLActif
		 * @covers            \tests\MessagesDestinataires::ecrireLBanni
		 * @covers            \tests\MessagesDestinataires::ecrireLDateBanni
		 * @covers            \tests\MessagesDestinataires::ecrireLCommentaireBanni
		 * @covers            \tests\MessagesDestinataires::lireIdLogement
		 * @covers            \tests\MessagesDestinataires::lireNoCivique
		 * @covers            \tests\MessagesDestinataires::lireApt
		 * @covers            \tests\MessagesDestinataires::lireRue
		 * @covers            \tests\MessagesDestinataires::lireVille
		 * @covers            \tests\MessagesDestinataires::lireProvince
		 * @covers            \tests\MessagesDestinataires::lirePays
		 * @covers            \tests\MessagesDestinataires::lireCodePostal
		 * @covers            \tests\MessagesDestinataires::lireLatitude
		 * @covers            \tests\MessagesDestinataires::lireLongitude
		 * @covers            \tests\MessagesDestinataires::lireCourriel
		 * @covers            \tests\MessagesDestinataires::lireIdTypeLogement
		 * @covers            \tests\MessagesDestinataires::lirePremierePhoto
		 * @covers            \tests\MessagesDestinataires::lirePrix
		 * @covers            \tests\MessagesDestinataires::lireEvaluation
		 * @covers            \tests\MessagesDestinataires::lireDescription
		 * @covers            \tests\MessagesDestinataires::lireNbPersonnes
		 * @covers            \tests\MessagesDestinataires::lireNbChambres
		 * @covers            \tests\MessagesDestinataires::lireNbLits
		 * @covers            \tests\MessagesDestinataires::lireNbSalleDeBain
		 * @covers            \tests\MessagesDestinataires::lireNbDemiSalleDeBain
		 * @covers            \tests\MessagesDestinataires::lireFraisNettoyage
		 * @covers            \tests\MessagesDestinataires::lireEstStationnement
		 * @covers            \tests\MessagesDestinataires::lireEstWifi
		 * @covers            \tests\MessagesDestinataires::lireEstCuisine
		 * @covers            \tests\MessagesDestinataires::lireEstTv
		 * @covers            \tests\MessagesDestinataires::lireEstFerARepasser
		 * @covers            \tests\MessagesDestinataires::lireEstCintres
		 * @covers            \tests\MessagesDestinataires::lireEstSecheCheveux
		 * @covers            \tests\MessagesDestinataires::lireEstClimatise
		 * @covers            \tests\MessagesDestinataires::lireEstLaveuse
		 * @covers            \tests\MessagesDestinataires::lireEstSecheuse
		 * @covers            \tests\MessagesDestinataires::lireEstChauffage
		 * @covers            \tests\MessagesDestinataires::lireLvalide
		 * @covers            \tests\MessagesDestinataires::lireLActif
		 * @covers            \tests\MessagesDestinataires::lireLBanni
		 * @covers            \tests\MessagesDestinataires::lireLDateBanni
		 * @covers            \tests\MessagesDestinataires::lireLCommentaireBanni
		 */	
		public function testMessagesDestinatairesPasEgaleEcrireLireSucces() 
		{
            $id_logement = new MessagesDestinataires();
			$valeur = "texte";
			$id_logement->ecrireIdLogement($valeur);
			$this->assertNotEquals($valeur, $id_logement->lireIdLogement());
			
			$no_civique = new MessagesDestinataires();
			$valeur = true;
			$no_civique->ecrireNoCivique($valeur);
			$this->assertNotEquals($valeur, $no_civique->lireNoCivique());
		
			$apt = new MessagesDestinataires();
			$valeur = true;
			$apt->ecrireApt($valeur);
			$this->assertNotEquals($valeur, $apt->lireApt());
		
			$rue = new MessagesDestinataires();
			$valeur = true;
			$rue->ecrireRue($valeur);
			$this->assertNotEquals($valeur, $rue->lireRue());
			
			$ville = new MessagesDestinataires();
			$valeur = true;
			$ville->ecrireVille($valeur);
			$this->assertNotEquals($valeur, $ville->lireVille());
			
			$province = new MessagesDestinataires();
			$valeur = true;
			$province->ecrireProvince($valeur);
			$this->assertNotEquals($valeur, $province->lireProvince());
			
			$pays = new MessagesDestinataires();
			$valeur = true;
			$pays->ecrirePays($valeur);
			$this->assertNotEquals($valeur, $pays->lirePays());
			
			$code_postal = new MessagesDestinataires();
			$valeur = true;
			$code_postal->ecrireCodePostal($valeur);
			$this->assertNotEquals($valeur, $code_postal->lireCodePostal());
			
			$latitude = new MessagesDestinataires();
			$valeur = true;
			$latitude->ecrireLatitude($valeur);
			$this->assertNotEquals($valeur, $latitude->lireLatitude());
			
			$longitude = new MessagesDestinataires();
			$valeur = true;
			$longitude->ecrireLongitude($valeur);
			$this->assertNotEquals($valeur, $longitude->lireLongitude());
			
			$courriel = new MessagesDestinataires();
			$valeur = true;
			$courriel->ecrireCourriel($valeur);
			$this->assertNotEquals($valeur, $courriel->lireCourriel());
			
			$id_type_logement = new MessagesDestinataires();
			$valeur = true;
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertNotEquals($valeur, $id_type_logement->lireIdTypeLogement());
			
			$premiere_photo = new MessagesDestinataires();
			$valeur = true;
			$premiere_photo->ecrirePremierePhoto($valeur);
			$this->assertNotEquals($valeur, $premiere_photo->lirePremierePhoto());
			
			$prix = new MessagesDestinataires();
			$valeur = true;
			$prix->ecrirePrix($valeur);
			$this->assertNotEquals($valeur, $prix->lirePrix());
			
			$evaluation = new MessagesDestinataires();
			$valeur = true;
			$evaluation->ecrireEvaluation($valeur);
			$this->assertNotEquals($valeur, $evaluation->lireEvaluation());
			
			$description = new MessagesDestinataires();
			$valeur = true;
			$description->ecrireDescription($valeur);
			$this->assertNotEquals($valeur, $description->lireDescription());
			
			$nb_personnes = new MessagesDestinataires();
			$valeur = true;
			$nb_personnes->ecrireNbPersonnes($valeur);
			$this->assertNotEquals($valeur, $nb_personnes->lireNbPersonnes());
			
			$nb_chambres = new MessagesDestinataires();
			$valeur = true;
			$nb_chambres-> ecrireNbChambres($valeur);
			$this->assertNotEquals($valeur, $nb_chambres->lireNbChambres());
			
			$nb_lits = new MessagesDestinataires();
			$valeur = true;
			$nb_lits->ecrireNbLits($valeur);
			$this->assertNotEquals($valeur, $nb_lits->lireNbLits());
			
			$nb_salle_de_bain = new MessagesDestinataires();
			$valeur = true;
			$nb_salle_de_bain->ecrireNbSalleDeBain($valeur);
			$this->assertNotEquals($valeur, $nb_salle_de_bain->lireNbSalleDeBain());
			
			$nb_demi_salle_de_bain = new MessagesDestinataires();
			$valeur = true;
			$nb_demi_salle_de_bain->ecrireNbDemiSalleDeBain($valeur);
			$this->assertNotEquals($valeur, $nb_demi_salle_de_bain->lireNbDemiSalleDeBain());
			
			$frais_nettoyage = new MessagesDestinataires();
			$valeur = true;
			$frais_nettoyage->ecrireFraisNettoyage($valeur);
			$this->assertNotEquals($valeur, $frais_nettoyage->lireFraisNettoyage());
			
			$est_stationnement = new MessagesDestinataires();
			$valeur = true;
			$est_stationnement->ecrireEstStationnement($valeur);
			$this->assertNotEquals($valeur, $est_stationnement->lireEstStationnement());
			
			$est_wifi = new MessagesDestinataires();
			$valeur = true;
			$est_wifi-> ecrireEstWifi($valeur);
			$this->assertNotEquals($valeur, $est_wifi->lireEstWifi());
			
			$est_cuisine = new MessagesDestinataires();
			$valeur = true;
			$est_cuisine-> ecrireEstCuisine($valeur);
			$this->assertNotEquals($valeur, $est_cuisine->lireEstCuisine());
			
			$est_tv = new MessagesDestinataires();
			$valeur = true;
			$est_tv->ecrireEstTv($valeur);
			$this->assertNotEquals($valeur, $est_tv->lireEstTv());
			
			$est_fer_a_repasser = new MessagesDestinataires();
			$valeur = true;
			$est_fer_a_repasser->ecrireEstFerARepasser($valeur);
			$this->assertNotEquals($valeur, $est_fer_a_repasser->lireEstFerARepasser());
			
		
			$est_cintres = new MessagesDestinataires();
			$valeur = true;
			$est_cintres->ecrireEstCintres($valeur);
			$this->assertNotEquals($valeur, $est_cintres->lireEstCintres());
		
			$est_seche_cheveux = new MessagesDestinataires();
			$valeur = true;
			$est_seche_cheveux->ecrireEstSecheCheveux($valeur);
			$this->assertNotEquals($valeur, $est_seche_cheveux->lireEstSecheCheveux());
		
			$est_climatise = new MessagesDestinataires();
			$valeur = true;
			$est_climatise-> ecrireEstClimatise($valeur);
			$this->assertNotEquals($valeur, $est_climatise->lireEstClimatise());
		
			$est_laveuse = new MessagesDestinataires();
			$valeur = true;
			$est_laveuse-> ecrireEstLaveuse($valeur);
			$this->assertNotEquals($valeur, $est_laveuse->lireEstLaveuse());
		
			$est_secheuse = new MessagesDestinataires();
			$valeur = true;
			$est_secheuse->ecrireEstSecheuse($valeur);
			$this->assertNotEquals($valeur, $est_secheuse->lireEstSecheuse());
		
			$est_chauffage = new MessagesDestinataires();
			$valeur = true;
			$est_chauffage-> ecrireEstChauffage($valeur);
			$this->assertNotEquals($valeur, $est_chauffage-> lireEstChauffage());
		
			$l_valide = new MessagesDestinataires();
			$valeur = true;
			$l_valide->ecrireLvalide($valeur);
			$this->assertNotEquals($valeur, $l_valide->lireLvalide());
			
			$l_actif = new MessagesDestinataires();
			$valeur = true;
			$l_actif->ecrireLActif($valeur);
			$this->assertNotEquals($valeur, $l_actif->lireLActif());
			
			$l_banni = new MessagesDestinataires();
			$valeur = true;
			$l_banni->ecrireLBanni($valeur);
			$this->assertNotEquals($valeur, $l_banni->lireLBanni());
			
			$l_date_banni = new MessagesDestinataires();
			$valeur = true;
			$l_date_banni-> ecrireLDateBanni($valeur);
			$this->assertNotEquals($valeur, $l_date_banni->lireLDateBanni());
			
			$l_commentaire_banni = new MessagesDestinataires();
			$valeur = true;
			$l_commentaire_banni->ecrireLCommentaireBanni($valeur);
			$this->assertNotEquals($valeur, $l_commentaire_banni->lireLCommentaireBanni());
		
		}
    

	}//fin de la classe

?>
