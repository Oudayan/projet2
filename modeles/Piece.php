<?php
/**
 * @file    Piece.php
 * @author  Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version 1.0
 * @date    23 février 2018
 * @brief   Définit la classe Piece.
 * @details Cette classe définit les attributs privés d'un type de logement avec toutes les méthodes publiques "getters" et "setters" pour écrire et lire les attributs
 */
	class Piece {

		// Attributs
		private $id_piece;
		private $description_piece;

        // Constructeur
		public function __construct($id_piece = 0, $description_piece = "") {
			$this->ecrireIdPiece($id_piece);
			$this->ecrireDescriptionPiece($description_piece);			
		}
        
        // "SETTERS"
        // Écrire id_piece
        public function ecrireIdPiece($id_piece) {
            if (is_numeric($id_piece) && trim($id_piece) != "") {
                $this->id_piece = $id_piece;
            }
        }
        // Écrire description_piece
        public function ecrireDescriptionPiece($description_piece) {
            if (is_string($description_piece) && trim($description_piece) != "") {
                $this->description_piece = $description_piece;
            }
        }

        // "GETTERS"
        // Lire id_piece
        public function lireIdPiece() {
            return $this->id_piece;
        }
        // Lire description_piece
        public function lireDescriptionPiece() {
            return $this->description_piece;
        }

    }
