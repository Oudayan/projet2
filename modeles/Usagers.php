<?php
/**
* @file Usager.php
* @autheurs Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
* @version 1.0
* @date 27 octobre 2017
* @brief Définit la classe Usagers.
*
* @details Cette classe définit les attributs d'un usager
* 
*/

	class Usagers {
		private $courriel;
		private $nom;
		private $prenom;
		private $cellulaire;
		private $mot_de_passe;
		private $u_banni;
		private $u_commentaire_banni;
		private $u_date_banni;
		private $id_contact;
		private $id_type_usager;
		private $id_paiement;
		private $u_valide;
		private $u_actif;


		public function __construct($courriel = "", $nom = "", $prenom = "", $cellulaire = "", $mot_de_passe = "", $u_banni = 0, $u_commentaire_banni = "", $u_date_banni = "", $id_contact = 0, $id_type_usager = 2, $id_paiement=0, $u_valide=0, $u_actif=true )
		{
			$this->ecrireCourriel($courriel);
			$this->ecrireNom($nom);
			$this->ecrirepreNom($prenom);
			$this->ecrireCellulaire($cellulaire);
			$this->ecrireMotDePasse($mot_de_passe);
			$this->ecrireestBanni($u_banni);
			$this->ecrireCommentaireBanni($u_commentaire_banni);
			$this->ecrireDateBanni($u_date_banni);
			$this->ecrireContact($id_contact);
			$this->ecrireTypeUsager($id_type_usager);
			$this->ecrireTypePaiement($id_paiement);
			$this->ecrireUValide($u_valide);
			$this->ecrireUActif($u_actif);
		}
		
        // "SETTERS"
        // Écrire id_logement
		public function ecrireCourriel($courriel) {
            if (is_string($courriel) && trim($courriel) != "") {
                $this->courriel = $courriel;
            }
        }
		
		public function ecrireNom($nom) {
            if (is_string($nom) && trim($nom) != "") {
                $this->nom = $nom;
            }			
		}

		public function ecrirepreNom($prenom){
            if (is_string($prenom) && trim($prenom) != "") {
                $this->prenom = $prenom;
            }			
		}

		public function ecrireCellulaire($cellulaire){
            if (is_string($cellulaire) && trim($cellulaire) != "") {
                $this->cellulaire = $cellulaire;
            }			
		}
		public function ecrireMotDePasse($mot_de_passe){
            if (is_string($mot_de_passe) && trim($mot_de_passe) != "") {
                $this->mot_de_passe = $mot_de_passe;
            }			
		}

		public function ecrireestBanni($u_banni){
            if (is_numeric($u_banni) && trim($u_banni) != "") {
                $this->u_banni = $u_banni;
            }			
		}

		public function ecrireCommentaireBanni($u_commentaire_banni){
            if (is_string($u_commentaire_banni) && trim($u_commentaire_banni) != "") {
                $this->u_commentaire_banni = $u_commentaire_banni;
            }			
		}

		public function ecrireDateBanni($u_date_banni){
            if (is_string($u_date_banni) && trim($u_date_banni) != "") {
                $this->u_date_banni = $u_date_banni;
            }			
		}
		public function ecrireContact($id_contact){
            if (is_numeric($id_contact) && trim($id_contact) != "") {
                $this->id_contact = $id_contact;
            }			
		}

		public function ecrireTypeUsager($id_type_usager){
            if (is_numeric($id_type_usager) && trim($id_type_usager) != "") {
                $this->id_type_usager = $id_type_usager;
            }			
		}

		public function ecrireTypePaiement($id_paiement){
            if (is_numeric($id_paiement) && trim($id_paiement) != "") {
                $this->id_paiement = $id_paiement;
            }			
		}

		public function ecrireUValide($u_valide){
			if (is_numeric($u_valide)){
				$this->u_valide = $u_valide;
			}
		}

		public function ecrireUActif($u_actif){
			if (is_bool($u_actif)){
				$this->u_actif = $u_actif;
			}

		}
		
		// "GETTERS"				
		public function lireCourriel() {
            return $this->courriel;
        }
  
		public function lireNom() {
            return $this->nom;
		}

		public function lirepreNom(){
            return $this->prenom;
		}

		public function lireCellulaire(){
            return $this->cellulaire;
		}
		
		public function lireMotDePasse(){
            return $this->mot_de_passe;
		}

		public function lireestBanni(){
            return $this->u_banni;
		}

		public function lireCommentaireBanni(){
			return $this->u_commentaire_banni;
		}

		public function lireDateBanni(){
            return $this->u_date_banni;
		}
		
		public function lireContact(){
            return $this->id_contact;
		}

		public function lireTypeUsager(){
            return $this->id_type_usager;
		}

		public function lireTypePaiement(){
                return $this->id_paiement;
		}

		public function lireUValide(){
				return $this->u_valide;
		}
		
		public function lireUActif(){
			return $this->u_actif;
		}

		//public function 
	}

?>