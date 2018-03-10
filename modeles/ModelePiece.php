<?php
/**
 * @file     ModelePiece.php
 * @author   Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats
 * @version  1.0
 * @date     23 février 2018
 * @brief    Modèle Piece
 * 
 * @details  Fonctions "CRUD" pour la table al_piece 
 */

	class ModelePiece extends BaseDAO {

		public function lireNomTable() {
			return "al_pieces";
		}
        
		public function lirePieceParId($id) {
            $resultat = $this->lire($id);
			$resultat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Piece'); 
			return $resultat->fetch();
		}
		
        public function lireToutesPieces() {
            $resultat = $this->lireTous();
			return $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Piece");
    	}

		public function sauvegarderPiece(Piece $piece) {
			if ($piece->lireId() && $this->lire($piece->lireId())->fetch()) {
				// update
				$sql = "UPDATE " . $this->lireNomTable() . " SET description_piece=? WHERE " . $this->lireClePrimaire() . "=?";
                $donnees = array($piece->lireDescriptionPiece(), $piece->lireIdPiece());
			} 
			else {
				// insert
                $sql = "INSERT INTO " . $this->lireNomTable() . "(description_piece) VALUES (?)"; 
				$donnees = array($piece->lireDescriptionPiece());
			}
           	return $this->requete($sql, $donnees);
		}
       
        public function effacerPiece($id) {
        	return $this->effacer($id);
        }
        
    }

?>