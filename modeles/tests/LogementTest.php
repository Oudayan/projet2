<?php
/**
 * @file    LogementTest.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1
 * @date 	6 mars 2018
 * @brief 	PHPUnit pour la classe Logement.
 * @details Teste les attributs de la classe Logement 
 */
 use PHPUnit\Framework\TestCase;
 
	class LogementTest extends TestCase 
	{
        /**
		 * @covers            \tests\Logement::__construct
		 */
		public function testClassePossedeAttributsSucces() 
		{
            $this->assertClassHasAttribute('id_logement',Logement::class);
			$this->assertClassHasAttribute('no_civique',Logement::class);
			$this->assertClassHasAttribute('apt',Logement::class);
			$this->assertClassHasAttribute('rue',Logement::class);
			$this->assertClassHasAttribute('ville',Logement::class);
			$this->assertClassHasAttribute('province',Logement::class);
			$this->assertClassHasAttribute('pays',Logement::class);
			$this->assertClassHasAttribute('code_postal',Logement::class);
			$this->assertClassHasAttribute('latitude',Logement::class);
			$this->assertClassHasAttribute('longitude',Logement::class);
			$this->assertClassHasAttribute('courriel',Logement::class);
			$this->assertClassHasAttribute('id_type_logement',Logement::class);
			$this->assertClassHasAttribute('premiere_photo',Logement::class);
			$this->assertClassHasAttribute('prix',Logement::class);
			$this->assertClassHasAttribute('evaluation',Logement::class);
			$this->assertClassHasAttribute('description',Logement::class);
			$this->assertClassHasAttribute('nb_personnes',Logement::class);
			$this->assertClassHasAttribute('nb_chambres',Logement::class);
			$this->assertClassHasAttribute('nb_lits',Logement::class);
			$this->assertClassHasAttribute('nb_salle_de_bain',Logement::class);
			$this->assertClassHasAttribute('nb_demi_salle_de_bain',Logement::class);
			$this->assertClassHasAttribute('frais_nettoyage',Logement::class);
			$this->assertClassHasAttribute('est_stationnement',Logement::class);
			$this->assertClassHasAttribute('est_wifi',Logement::class);
			$this->assertClassHasAttribute('est_cuisine',Logement::class);
			$this->assertClassHasAttribute('est_tv',Logement::class);
			$this->assertClassHasAttribute('est_fer_a_repasser',Logement::class);
			$this->assertClassHasAttribute('est_cintres',Logement::class);
			$this->assertClassHasAttribute('est_seche_cheveux',Logement::class);
			$this->assertClassHasAttribute('est_climatise',Logement::class);
			$this->assertClassHasAttribute('est_laveuse',Logement::class);
			$this->assertClassHasAttribute('est_secheuse',Logement::class);
			$this->assertClassHasAttribute('expediteur',Logement::class);
			$this->assertClassHasAttribute('l_valide',Logement::class);
			$this->assertClassHasAttribute('l_actif',Logement::class);
			$this->assertClassHasAttribute('l_banni',Logement::class);
			$this->assertClassHasAttribute('l_date_banni',Logement::class);
			$this->assertClassHasAttribute('l_commentaire_banni',Logement::class);
		}
		/**
		 * @covers            \tests\Logement::__construct
		 */		
		public function testClasseNePossedePasAttributsSucces() 
		{
            $this->assertClassNotHasAttribute('foo',Logement::class);
			$this->assertClassNotHasAttribute('Mary',Logement::class);
		}
		/**
		 * @covers            \tests\Logement::__construct
		 * @covers            \tests\Logement::ecrireIdLogement
		 * @covers            \tests\Logement::ecrireNoCivique
		 * @covers            \tests\Logement::ecrireApt
		 * @covers            \tests\Logement::ecrireRue
		 * @covers            \tests\Logement::ecrireVille
		 * @covers            \tests\Logement::ecrireProvince
		 * @covers            \tests\Logement::ecrirePays
		 * @covers            \tests\Logement::ecrireCodePostal
		 * @covers            \tests\Logement::ecrireLatitude
		 * @covers            \tests\Logement::ecrireLongitude
		 * @covers            \tests\Logement::ecrireCourriel
		 * @covers            \tests\Logement::ecrireIdTypeLogement
		 * @covers            \tests\Logement::ecrirePremierePhoto
		 * @covers            \tests\Logement::ecrirePrix
		 * @covers            \tests\Logement::ecrireEvaluation
		 * @covers            \tests\Logement::ecrireDescription
		 * @covers            \tests\Logement::ecrireNbPersonnes
		 * @covers            \tests\Logement::ecrireNbChambres
		 * @covers            \tests\Logement::ecrireNbLits
		 * @covers            \tests\Logement::ecrireNbSalleDeBain
		 * @covers            \tests\Logement::ecrireNbDemiSalleDeBain
		 * @covers            \tests\Logement::ecrireFraisNettoyage
		 * @covers            \tests\Logement::ecrireEstStationnement
		 * @covers            \tests\Logement::ecrireEstWifi
		 * @covers            \tests\Logement::ecrireEstCuisine
		 * @covers            \tests\Logement::ecrireEstTv
		 * @covers            \tests\Logement::ecrireEstFerARepasser
		 * @covers            \tests\Logement::ecrireEstCintres
		 * @covers            \tests\Logement::ecrireEstSecheCheveux
		 * @covers            \tests\Logement::ecrireEstClimatise
		 * @covers            \tests\Logement::ecrireEstLaveuse
		 * @covers            \tests\Logement::ecrireEstSecheuse
		 * @covers            \tests\Logement::ecrireEstChauffage
		 * @covers            \tests\Logement::ecrireLvalide
		 * @covers            \tests\Logement::ecrireLActif
		 * @covers            \tests\Logement::ecrireLBanni
		 * @covers            \tests\Logement::ecrireLDateBanni
		 * @covers            \tests\Logement::ecrireLCommentaireBanni
		 * @covers            \tests\Logement::lireIdLogement
		 * @covers            \tests\Logement::lireNoCivique
		 * @covers            \tests\Logement::lireApt
		 * @covers            \tests\Logement::lireRue
		 * @covers            \tests\Logement::lireVille
		 * @covers            \tests\Logement::lireProvince
		 * @covers            \tests\Logement::lirePays
		 * @covers            \tests\Logement::lireCodePostal
		 * @covers            \tests\Logement::lireLatitude
		 * @covers            \tests\Logement::lireLongitude
		 * @covers            \tests\Logement::lireCourriel
		 * @covers            \tests\Logement::lireIdTypeLogement
		 * @covers            \tests\Logement::lirePremierePhoto
		 * @covers            \tests\Logement::lirePrix
		 * @covers            \tests\Logement::lireEvaluation
		 * @covers            \tests\Logement::lireDescription
		 * @covers            \tests\Logement::lireNbPersonnes
		 * @covers            \tests\Logement::lireNbChambres
		 * @covers            \tests\Logement::lireNbLits
		 * @covers            \tests\Logement::lireNbSalleDeBain
		 * @covers            \tests\Logement::lireNbDemiSalleDeBain
		 * @covers            \tests\Logement::lireFraisNettoyage
		 * @covers            \tests\Logement::lireEstStationnement
		 * @covers            \tests\Logement::lireEstWifi
		 * @covers            \tests\Logement::lireEstCuisine
		 * @covers            \tests\Logement::lireEstTv
		 * @covers            \tests\Logement::lireEstFerARepasser
		 * @covers            \tests\Logement::lireEstCintres
		 * @covers            \tests\Logement::lireEstSecheCheveux
		 * @covers            \tests\Logement::lireEstClimatise
		 * @covers            \tests\Logement::lireEstLaveuse
		 * @covers            \tests\Logement::lireEstSecheuse
		 * @covers            \tests\Logement::lireEstChauffage
		 * @covers            \tests\Logement::lireLvalide
		 * @covers            \tests\Logement::lireLActif
		 * @covers            \tests\Logement::lireLBanni
		 * @covers            \tests\Logement::lireLDateBanni
		 * @covers            \tests\Logement::lireLCommentaireBanni
		 */	
		public function testLogementEgaleEcrireLireSucces() 
		{
            $id_logement = new Logement();
			$valeur = 1234;
			$id_logement->ecrireIdLogement($valeur);
			$this->assertEquals($valeur, $id_logement->lireIdLogement());
			
			$no_civique = new Logement();
			$valeur = 1234;
			$no_civique->ecrireNoCivique($valeur);
			$this->assertEquals($valeur, $no_civique->lireNoCivique());
		
			$apt = new Logement();
			$valeur = "texte";
			$apt->ecrireApt($valeur);
			$this->assertEquals($valeur, $apt->lireApt());
		
			$rue = new Logement();
			$valeur = "texte";
			$rue->ecrireRue($valeur);
			$this->assertEquals($valeur, $rue->lireRue());
			
			$ville = new Logement();
			$valeur = "texte";
			$ville->ecrireVille($valeur);
			$this->assertEquals($valeur, $ville->lireVille());
			
			$province = new Logement();
			$valeur = "texte";
			$province->ecrireProvince($valeur);
			$this->assertEquals($valeur, $province->lireProvince());
			
			$pays = new Logement();
			$valeur = "texte";
			$pays->ecrirePays($valeur);
			$this->assertEquals($valeur, $pays->lirePays());
			
			$code_postal = new Logement();
			$valeur = "texte";
			$code_postal->ecrireCodePostal($valeur);
			$this->assertEquals($valeur, $code_postal->lireCodePostal());
			
			$latitude = new Logement();
			$valeur = "texte";
			$latitude->ecrireLatitude($valeur);
			$this->assertEquals($valeur, $latitude->lireLatitude());
			
			$longitude = new Logement();
			$valeur = "texte";
			$longitude->ecrireLongitude($valeur);
			$this->assertEquals($valeur, $longitude->lireLongitude());
			
			$courriel = new Logement();
			$valeur = "texte";
			$courriel->ecrireCourriel($valeur);
			$this->assertEquals($valeur, $courriel->lireCourriel());
			
			$id_type_logement = new Logement();
			$valeur = 1234;
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertEquals($valeur, $id_type_logement->lireIdTypeLogement());
			
			$premiere_photo = new Logement();
			$valeur = "texte";
			$premiere_photo->ecrirePremierePhoto($valeur);
			$this->assertEquals($valeur, $premiere_photo->lirePremierePhoto());
			
			$prix = new Logement();
			$valeur = 1234;
			$prix->ecrirePrix($valeur);
			$this->assertEquals($valeur, $prix->lirePrix());
			
			$evaluation = new Logement();
			$valeur = 1234;
			$evaluation->ecrireEvaluation($valeur);
			$this->assertEquals($valeur, $evaluation->lireEvaluation());
			
			$description = new Logement();
			$valeur = "texte";
			$description->ecrireDescription($valeur);
			$this->assertEquals($valeur, $description->lireDescription());
			
			$nb_personnes = new Logement();
			$valeur = 1234;
			$nb_personnes->ecrireNbPersonnes($valeur);
			$this->assertEquals($valeur, $nb_personnes->lireNbPersonnes());
			
			$nb_chambres = new Logement();
			$valeur = 1234;
			$nb_chambres-> ecrireNbChambres($valeur);
			$this->assertEquals($valeur, $nb_chambres->lireNbChambres());
			
			$nb_lits = new Logement();
			$valeur = 1234;
			$nb_lits->ecrireNbLits($valeur);
			$this->assertEquals($valeur, $nb_lits->lireNbLits());
			
			$nb_salle_de_bain = new Logement();
			$valeur = 1234;
			$nb_salle_de_bain->ecrireNbSalleDeBain($valeur);
			$this->assertEquals($valeur, $nb_salle_de_bain->lireNbSalleDeBain());
			
			$nb_demi_salle_de_bain = new Logement();
			$valeur = 1234;
			$nb_demi_salle_de_bain->ecrireNbDemiSalleDeBain($valeur);
			$this->assertEquals($valeur, $nb_demi_salle_de_bain->lireNbDemiSalleDeBain());
			
			$frais_nettoyage = new Logement();
			$valeur = 1234;
			$frais_nettoyage->ecrireFraisNettoyage($valeur);
			$this->assertEquals($valeur, $frais_nettoyage->lireFraisNettoyage());
			
			$est_stationnement = new Logement();
			$valeur = true;
			$est_stationnement->ecrireEstStationnement($valeur);
			$this->assertEquals($valeur, $est_stationnement->lireEstStationnement());
			
			$est_wifi = new Logement();
			$valeur = true;
			$est_wifi-> ecrireEstWifi($valeur);
			$this->assertEquals($valeur, $est_wifi->lireEstWifi());
			
			$est_cuisine = new Logement();
			$valeur = true;
			$est_cuisine-> ecrireEstCuisine($valeur);
			$this->assertEquals($valeur, $est_cuisine->lireEstCuisine());
			
			$est_tv = new Logement();
			$valeur = true;
			$est_tv->ecrireEstTv($valeur);
			$this->assertEquals($valeur, $est_tv->lireEstTv());
			
			$est_fer_a_repasser = new Logement();
			$valeur = true;
			$est_fer_a_repasser->ecrireEstFerARepasser($valeur);
			$this->assertEquals($valeur, $est_fer_a_repasser->lireEstFerARepasser());
			
		
			$est_cintres = new Logement();
			$valeur = true;
			$est_cintres->ecrireEstCintres($valeur);
			$this->assertEquals($valeur, $est_cintres->lireEstCintres());
		
			$est_seche_cheveux = new Logement();
			$valeur = true;
			$est_seche_cheveux->ecrireEstSecheCheveux($valeur);
			$this->assertEquals($valeur, $est_seche_cheveux->lireEstSecheCheveux());
		
			$est_climatise = new Logement();
			$valeur = true;
			$est_climatise-> ecrireEstClimatise($valeur);
			$this->assertEquals($valeur, $est_climatise->lireEstClimatise());
		
			$est_laveuse = new Logement();
			$valeur = true;
			$est_laveuse-> ecrireEstLaveuse($valeur);
			$this->assertEquals($valeur, $est_laveuse->lireEstLaveuse());
		
			$est_secheuse = new Logement();
			$valeur = true;
			$est_secheuse->ecrireEstSecheuse($valeur);
			$this->assertEquals($valeur, $est_secheuse->lireEstSecheuse());
		
			$est_chauffage = new Logement();
			$valeur = true;
			$est_chauffage-> ecrireEstChauffage($valeur);
			$this->assertEquals($valeur, $est_chauffage-> lireEstChauffage());
		
			$l_valide = new Logement();
			$valeur = true;
			$l_valide->ecrireLvalide($valeur);
			$this->assertEquals($valeur, $l_valide->lireLvalide());
			
			$l_actif = new Logement();
			$valeur = true;
			$l_actif->ecrireLActif($valeur);
			$this->assertEquals($valeur, $l_actif->lireLActif());
			
			$l_banni = new Logement();
			$valeur = true;
			$l_banni->ecrireLBanni($valeur);
			$this->assertEquals($valeur, $l_banni->lireLBanni());
			
			$l_date_banni = new Logement();
			$valeur = "texte";
			$l_date_banni-> ecrireLDateBanni($valeur);
			$this->assertEquals($valeur, $l_date_banni->lireLDateBanni());
			
			$l_commentaire_banni = new Logement();
			$valeur = "texte";
			$l_commentaire_banni->ecrireLCommentaireBanni($valeur);
			$this->assertEquals($valeur, $l_commentaire_banni->lireLCommentaireBanni());
		}
		/**
		 * @covers            \tests\Logement::__construct
		 * @covers            \tests\Logement::ecrireIdLogement
		 * @covers            \tests\Logement::ecrireNoCivique
		 * @covers            \tests\Logement::ecrireApt
		 * @covers            \tests\Logement::ecrireRue
		 * @covers            \tests\Logement::ecrireVille
		 * @covers            \tests\Logement::ecrireProvince
		 * @covers            \tests\Logement::ecrirePays
		 * @covers            \tests\Logement::ecrireCodePostal
		 * @covers            \tests\Logement::ecrireLatitude
		 * @covers            \tests\Logement::ecrireLongitude
		 * @covers            \tests\Logement::ecrireCourriel
		 * @covers            \tests\Logement::ecrireIdTypeLogement
		 * @covers            \tests\Logement::ecrirePremierePhoto
		 * @covers            \tests\Logement::ecrirePrix
		 * @covers            \tests\Logement::ecrireEvaluation
		 * @covers            \tests\Logement::ecrireDescription
		 * @covers            \tests\Logement::ecrireNbPersonnes
		 * @covers            \tests\Logement::ecrireNbChambres
		 * @covers            \tests\Logement::ecrireNbLits
		 * @covers            \tests\Logement::ecrireNbSalleDeBain
		 * @covers            \tests\Logement::ecrireNbDemiSalleDeBain
		 * @covers            \tests\Logement::ecrireFraisNettoyage
		 * @covers            \tests\Logement::ecrireEstStationnement
		 * @covers            \tests\Logement::ecrireEstWifi
		 * @covers            \tests\Logement::ecrireEstCuisine
		 * @covers            \tests\Logement::ecrireEstTv
		 * @covers            \tests\Logement::ecrireEstFerARepasser
		 * @covers            \tests\Logement::ecrireEstCintres
		 * @covers            \tests\Logement::ecrireEstSecheCheveux
		 * @covers            \tests\Logement::ecrireEstClimatise
		 * @covers            \tests\Logement::ecrireEstLaveuse
		 * @covers            \tests\Logement::ecrireEstSecheuse
		 * @covers            \tests\Logement::ecrireEstChauffage
		 * @covers            \tests\Logement::ecrireLvalide
		 * @covers            \tests\Logement::ecrireLActif
		 * @covers            \tests\Logement::ecrireLBanni
		 * @covers            \tests\Logement::ecrireLDateBanni
		 * @covers            \tests\Logement::ecrireLCommentaireBanni
		 * @covers            \tests\Logement::lireIdLogement
		 * @covers            \tests\Logement::lireNoCivique
		 * @covers            \tests\Logement::lireApt
		 * @covers            \tests\Logement::lireRue
		 * @covers            \tests\Logement::lireVille
		 * @covers            \tests\Logement::lireProvince
		 * @covers            \tests\Logement::lirePays
		 * @covers            \tests\Logement::lireCodePostal
		 * @covers            \tests\Logement::lireLatitude
		 * @covers            \tests\Logement::lireLongitude
		 * @covers            \tests\Logement::lireCourriel
		 * @covers            \tests\Logement::lireIdTypeLogement
		 * @covers            \tests\Logement::lirePremierePhoto
		 * @covers            \tests\Logement::lirePrix
		 * @covers            \tests\Logement::lireEvaluation
		 * @covers            \tests\Logement::lireDescription
		 * @covers            \tests\Logement::lireNbPersonnes
		 * @covers            \tests\Logement::lireNbChambres
		 * @covers            \tests\Logement::lireNbLits
		 * @covers            \tests\Logement::lireNbSalleDeBain
		 * @covers            \tests\Logement::lireNbDemiSalleDeBain
		 * @covers            \tests\Logement::lireFraisNettoyage
		 * @covers            \tests\Logement::lireEstStationnement
		 * @covers            \tests\Logement::lireEstWifi
		 * @covers            \tests\Logement::lireEstCuisine
		 * @covers            \tests\Logement::lireEstTv
		 * @covers            \tests\Logement::lireEstFerARepasser
		 * @covers            \tests\Logement::lireEstCintres
		 * @covers            \tests\Logement::lireEstSecheCheveux
		 * @covers            \tests\Logement::lireEstClimatise
		 * @covers            \tests\Logement::lireEstLaveuse
		 * @covers            \tests\Logement::lireEstSecheuse
		 * @covers            \tests\Logement::lireEstChauffage
		 * @covers            \tests\Logement::lireLvalide
		 * @covers            \tests\Logement::lireLActif
		 * @covers            \tests\Logement::lireLBanni
		 * @covers            \tests\Logement::lireLDateBanni
		 * @covers            \tests\Logement::lireLCommentaireBanni
		 */	
		public function testLogementPasEgaleEcrireLireSucces() 
		{
            $id_logement = new Logement();
			$valeur = "texte";
			$id_logement->ecrireIdLogement($valeur);
			$this->assertNotEquals($valeur, $id_logement->lireIdLogement());
			
			$no_civique = new Logement();
			$valeur = "texte";
			$no_civique->ecrireNoCivique($valeur);
			$this->assertNotEquals($valeur, $no_civique->lireNoCivique());
		
			$apt = new Logement();
			$valeur = 1234;
			$apt->ecrireApt($valeur);
			$this->assertNotEquals($valeur, $apt->lireApt());
		
			$rue = new Logement();
			$valeur = 1234;
			$rue->ecrireRue($valeur);
			$this->assertNotEquals($valeur, $rue->lireRue());
			
			$ville = new Logement();
			$valeur = 1234;
			$ville->ecrireVille($valeur);
			$this->assertNotEquals($valeur, $ville->lireVille());
			
			$province = new Logement();
			$valeur = 1234;
			$province->ecrireProvince($valeur);
			$this->assertNotEquals($valeur, $province->lireProvince());
			
			$pays = new Logement();
			$valeur = 1234;
			$pays->ecrirePays($valeur);
			$this->assertNotEquals($valeur, $pays->lirePays());
			
			$code_postal = new Logement();
			$valeur = 1234;
			$code_postal->ecrireCodePostal($valeur);
			$this->assertNotEquals($valeur, $code_postal->lireCodePostal());
			
			$latitude = new Logement();
			$valeur = 1234;
			$latitude->ecrireLatitude($valeur);
			$this->assertNotEquals($valeur, $latitude->lireLatitude());
			
			$longitude = new Logement();
			$valeur = 1234;
			$longitude->ecrireLongitude($valeur);
			$this->assertNotEquals($valeur, $longitude->lireLongitude());
			
			$courriel = new Logement();
			$valeur = 1234;
			$courriel->ecrireCourriel($valeur);
			$this->assertNotEquals($valeur, $courriel->lireCourriel());
			
			$id_type_logement = new Logement();
			$valeur = "texte";
			$id_type_logement->ecrireIdTypeLogement($valeur);
			$this->assertNotEquals($valeur, $id_type_logement->lireIdTypeLogement());
			
			$premiere_photo = new Logement();
			$valeur = 1234;
			$premiere_photo->ecrirePremierePhoto($valeur);
			$this->assertNotEquals($valeur, $premiere_photo->lirePremierePhoto());
			
			$prix = new Logement();
			$valeur = "texte";
			$prix->ecrirePrix($valeur);
			$this->assertNotEquals($valeur, $prix->lirePrix());
			
			$evaluation = new Logement();
			$valeur = "texte";
			$evaluation->ecrireEvaluation($valeur);
			$this->assertNotEquals($valeur, $evaluation->lireEvaluation());
			
			$description = new Logement();
			$valeur = 1234;
			$description->ecrireDescription($valeur);
			$this->assertNotEquals($valeur, $description->lireDescription());
			
			$nb_personnes = new Logement();
			$valeur = "texte";
			$nb_personnes->ecrireNbPersonnes($valeur);
			$this->assertNotEquals($valeur, $nb_personnes->lireNbPersonnes());
			
			$nb_chambres = new Logement();
			$valeur = "texte";
			$nb_chambres-> ecrireNbChambres($valeur);
			$this->assertNotEquals($valeur, $nb_chambres->lireNbChambres());
			
			$nb_lits = new Logement();
			$valeur = "texte";
			$nb_lits->ecrireNbLits($valeur);
			$this->assertNotEquals($valeur, $nb_lits->lireNbLits());
			
			$nb_salle_de_bain = new Logement();
			$valeur = "texte";
			$nb_salle_de_bain->ecrireNbSalleDeBain($valeur);
			$this->assertNotEquals($valeur, $nb_salle_de_bain->lireNbSalleDeBain());
			
			$nb_demi_salle_de_bain = new Logement();
			$valeur = "texte";
			$nb_demi_salle_de_bain->ecrireNbDemiSalleDeBain($valeur);
			$this->assertNotEquals($valeur, $nb_demi_salle_de_bain->lireNbDemiSalleDeBain());
			
			$frais_nettoyage = new Logement();
			$valeur = "texte";
			$frais_nettoyage->ecrireFraisNettoyage($valeur);
			$this->assertNotEquals($valeur, $frais_nettoyage->lireFraisNettoyage());
			
			$est_stationnement = new Logement();
			$valeur = "texte";
			$est_stationnement->ecrireEstStationnement($valeur);
			$this->assertNotEquals($valeur, $est_stationnement->lireEstStationnement());
			
			$est_wifi = new Logement();
			$valeur = "texte";
			$est_wifi-> ecrireEstWifi($valeur);
			$this->assertNotEquals($valeur, $est_wifi->lireEstWifi());
			
			$est_cuisine = new Logement();
			$valeur = "texte";
			$est_cuisine-> ecrireEstCuisine($valeur);
			$this->assertNotEquals($valeur, $est_cuisine->lireEstCuisine());
			
			$est_tv = new Logement();
			$valeur = "texte";
			$est_tv->ecrireEstTv($valeur);
			$this->assertNotEquals($valeur, $est_tv->lireEstTv());
			
			$est_fer_a_repasser = new Logement();
			$valeur = "texte";
			$est_fer_a_repasser->ecrireEstFerARepasser($valeur);
			$this->assertNotEquals($valeur, $est_fer_a_repasser->lireEstFerARepasser());
			
		
			$est_cintres = new Logement();
			$valeur = "texte";
			$est_cintres->ecrireEstCintres($valeur);
			$this->assertNotEquals($valeur, $est_cintres->lireEstCintres());
		
			$est_seche_cheveux = new Logement();
			$valeur = "texte";
			$est_seche_cheveux->ecrireEstSecheCheveux($valeur);
			$this->assertNotEquals($valeur, $est_seche_cheveux->lireEstSecheCheveux());
		
			$est_climatise = new Logement();
			$valeur = "texte";
			$est_climatise-> ecrireEstClimatise($valeur);
			$this->assertNotEquals($valeur, $est_climatise->lireEstClimatise());
		
			$est_laveuse = new Logement();
			$valeur = "texte";
			$est_laveuse-> ecrireEstLaveuse($valeur);
			$this->assertNotEquals($valeur, $est_laveuse->lireEstLaveuse());
		
			$est_secheuse = new Logement();
			$valeur = "texte";
			$est_secheuse->ecrireEstSecheuse($valeur);
			$this->assertNotEquals($valeur, $est_secheuse->lireEstSecheuse());
		
			$est_chauffage = new Logement();
			$valeur = "texte";
			$est_chauffage-> ecrireEstChauffage($valeur);
			$this->assertNotEquals($valeur, $est_chauffage-> lireEstChauffage());
		
			$l_valide = new Logement();
			$valeur = "texte""texte";
			$l_valide->ecrireLvalide($valeur);
			$this->assertNotEquals($valeur, $l_valide->lireLvalide());
			
			$l_actif = new Logement();
			$valeur = "texte";
			$l_actif->ecrireLActif($valeur);
			$this->assertNotEquals($valeur, $l_actif->lireLActif());
			
			$l_banni = new Logement();
			$valeur = "texte";
			$l_banni->ecrireLBanni($valeur);
			$this->assertNotEquals($valeur, $l_banni->lireLBanni());
			
			$l_date_banni = new Logement();
			$valeur = 1234;
			$l_date_banni-> ecrireLDateBanni($valeur);
			$this->assertNotEquals($valeur, $l_date_banni->lireLDateBanni());
			
			$l_commentaire_banni = new Logement();
			$valeur = 1234;
			$l_commentaire_banni->ecrireLCommentaireBanni($valeur);
			$this->assertNotEquals($valeur, $l_commentaire_banni->lireLCommentaireBanni());
		
		}
    

	}//fin de la classe

?>
