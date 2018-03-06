#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: al_type_contact
#------------------------------------------------------------

CREATE TABLE al_type_contact (
    id_contact Int (11) Auto_increment NOT NULL, 
    contact    Varchar (25), 
    PRIMARY KEY (id_contact)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_disponibilite
#------------------------------------------------------------

CREATE TABLE al_disponibilite (
    id_disponibilite    Int (11) Auto_increment NOT NULL, 
    id_logement         Int (11) NOT NULL, 
    date_debut          Date NOT NULL, 
    date_fin            Date NOT NULL, 
    d_active            Bool, 
    PRIMARY KEY (id_disponibilite), 
    INDEX (id_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_logements
#------------------------------------------------------------

CREATE TABLE al_logements (
    id_logement           Int (11) Auto_increment NOT NULL, 
    no_civique            Int (11) NOT NULL, 
    apt                   Varchar (75), 
    rue                   Varchar (75) NOT NULL, 
    ville                 Varchar (75) NOT NULL, 
    province              Varchar (75) NOT NULL, 
    pays                  Varchar (75) NOT NULL, 
    code_postal           Varchar (7) NOT NULL, 
    latitude              Varchar (25) NOT NULL, 
    longitude             Varchar (25) NOT NULL, 
    id_type_logement      Int (11) NOT NULL, 
    prix                  Decimal (15,2) NOT NULL, 
    evaluation            Decimal (15,12), 
    description           Text NOT NULL, 
    courriel              Varchar (25) NOT NULL, 
    nb_personnes          SmallInt(4), 
    nb_chambres           TinyInt, 
    nb_lits               TinyInt, 
    nb_salle_de_bain      TinyINT, 
    nb_demi_salle_de_bain TinyINT, 
    frais_nettoyage       Decimal (15,2),
    est_stationnement     Bool, 
    est_wifi              Bool, 
    est_cuisine           Bool, 
    est_tv                Bool, 
    est_fer_a_repasser    Bool, 
    est_cintres           Bool, 
    est_seche_cheveux     Bool, 
    est_climatise         Bool, 
    est_laveuse           Bool, 
    est_secheuse          Bool, 
    est_chauffage         Bool, 
    l_valide              Bool, 
    l_actif               Bool, 
    l_banni               Bool, 
    l_date_banni          Datetime, 
    l_commentaire_banni   Text, 
    PRIMARY KEY (id_logement), 
    INDEX (latitude, longitude)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_location
#------------------------------------------------------------

CREATE TABLE al_location (
    id_location         Int (11) Auto_increment NOT NULL, 
    id_logement         Int (11) NOT NULL, 
    id_proprietaire     Varchar (25) NOT NULL, 
    id_locataire        Varchar (25) NOT NULL,  
    date_debut          Date NOT NULL, 
    date_fin            Date NOT NULL, 
    date_location       Datetime NOT NULL, 
    cout                Decimal (15,2) NOT NULL, 
    valide              TinyINT NOT NULL, 
    evaluation          Decimal (4,2), 
    commentaire         Text, 
    date_evaluation     Datetime, 
    e_banni             Bool, 
    e_date_banni        Datetime, 
    e_commentaire_banni Text, 
    PRIMARY KEY (id_location), 
    INDEX (id_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_type_usager
#------------------------------------------------------------

CREATE TABLE al_type_usager (
    id_type_usager Int (11) Auto_increment NOT NULL, 
    type_usager    Varchar (35) NOT NULL, 
    PRIMARY KEY (id_type_usager)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_type_paiement
#------------------------------------------------------------

CREATE TABLE al_type_paiement (
    id_paiement Int (11) Auto_increment NOT NULL, 
    paiement    Varchar (25) NOT NULL, 
    PRIMARY KEY (id_paiement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_type_logement
#------------------------------------------------------------

CREATE TABLE al_type_logement (
    id_type_logement Int (11) Auto_increment NOT NULL, 
    type_logement    Varchar (55) NOT NULL, 
    PRIMARY KEY (id_type_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_usager
#------------------------------------------------------------

CREATE TABLE al_usager (
    courriel            Varchar (25) NOT NULL, 
    nom                 Char (25) NOT NULL, 
    prenom              Varchar (25) NOT NULL, 
    cellulaire          Varchar (25), 
    mot_de_passe        Char (25) NOT NULL, 
    u_banni             Bool, 
    u_commentaire_banni Text, 
    u_date_banni        Datetime, 
    id_contact          Int (11) NOT NULL, 
    id_type_usager      Int (11) NOT NULL, 
    id_paiement         Int (11) NOT NULL, 
    u_valide            Bool, 
    u_actif             Bool, 
    PRIMARY KEY (courriel)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_photos_logement
#------------------------------------------------------------

CREATE TABLE al_photos_logement (
    id_photo_logement   Int (11) Auto_increment NOT NULL, 
    chemin_photo        Varchar (175) NOT NULL, 
    id_piece            Int (11) NOT NULL,
    id_logement         Int (11) NOT NULL, 
    PRIMARY KEY (id_photo_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_pieces
#------------------------------------------------------------

CREATE TABLE al_pieces (
    id_piece            Int (11) Auto_increment NOT NULL, 
    description_piece   Varchar (255) NOT NULL, 
    PRIMARY KEY (id_piece)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_messagerie
#------------------------------------------------------------

CREATE TABLE al_messagerie (
    id_message    Int (11) Auto_increment NOT NULL, 
    id_reference  Int (11), 
    sujet         Varchar (255) NOT NULL, 
    fichier_joint Varchar (255), 
    message       Text NOT NULL, 
    msg_date      Datetime NOT NULL, 
    expediteur    Varchar (25) NOT NULL, 
    m_actif       Bool, 
    PRIMARY KEY (id_message), 
    INDEX (id_reference, msg_date)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_destinataire
#------------------------------------------------------------

CREATE TABLE al_destinataire(
    destinataire    Varchar (25) NOT NULL, 
    id_message      Int (11) NOT NULL, 
    lu              Bool, 
    d_actif         Bool, 
    PRIMARY KEY (destinataire, id_message)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_options
#------------------------------------------------------------

CREATE TABLE al_options(
    id_option       Int (11) Auto_increment NOT NULL, 
    nom_option      Varchar (255) NOT NULL, 
    valeurs_option  Varchar (5000) NOT NULL, 
    PRIMARY KEY (id_option)
)ENGINE=InnoDB;


-- --------------------------------------------------------

ALTER TABLE al_disponibilite ADD CONSTRAINT FK_al_disponibilite_id_logement FOREIGN KEY (id_logement) REFERENCES al_logements(id_logement);
ALTER TABLE al_logements ADD CONSTRAINT FK_al_logements_courriel FOREIGN KEY (courriel) REFERENCES al_usager(courriel);
ALTER TABLE al_logements ADD CONSTRAINT FK_al_logements_id_type_logement FOREIGN KEY (id_type_logement) REFERENCES al_type_logement(id_type_logement);
ALTER TABLE al_location ADD CONSTRAINT FK_al_location_id_proprietaire FOREIGN KEY (id_proprietaire) REFERENCES al_usager(courriel);
ALTER TABLE al_location ADD CONSTRAINT FK_al_location_id_locataire FOREIGN KEY (id_locataire) REFERENCES al_usager(courriel);
ALTER TABLE al_location ADD CONSTRAINT FK_al_location_id_logement FOREIGN KEY (id_logement) REFERENCES al_logements(id_logement);
ALTER TABLE al_usager ADD CONSTRAINT FK_al_usager_id_contact FOREIGN KEY (id_contact) REFERENCES al_type_contact(id_contact);
ALTER TABLE al_usager ADD CONSTRAINT FK_al_usager_id_type_usager FOREIGN KEY (id_type_usager) REFERENCES al_type_usager(id_type_usager);
ALTER TABLE al_usager ADD CONSTRAINT FK_al_usager_id_paiement FOREIGN KEY (id_paiement) REFERENCES al_type_paiement(id_paiement);
ALTER TABLE al_photos_logement ADD CONSTRAINT FK_al_photos_logement_id_logement FOREIGN KEY (id_logement) REFERENCES al_logements(id_logement);
ALTER TABLE al_photos_logement ADD CONSTRAINT FK_al_photos_logement_id_piece FOREIGN KEY (id_piece) REFERENCES al_pieces(id_piece);
ALTER TABLE al_messagerie ADD CONSTRAINT FK_al_messagerie_expediteur FOREIGN KEY (expediteur) REFERENCES al_usager(courriel);
ALTER TABLE al_destinataire ADD CONSTRAINT FK_destinataire_destinataire FOREIGN KEY (destinataire) REFERENCES al_usager(courriel);
ALTER TABLE al_destinataire ADD CONSTRAINT FK_destinataire_id_message FOREIGN KEY (id_message) REFERENCES al_messagerie(id_message);

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_type_contact`
-- 


INSERT INTO `al_type_contact` (`id_contact`, `contact`) VALUES
(1, 'Courriel'),
(2, 'Messagerie'),
(3, 'Téléphone');

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_type_logement`
-- 

INSERT INTO `al_type_logement` (`id_type_logement`, `type_logement`) VALUES
(1, 'Maison unifamiliale'),
(2, 'Maison en rangée'),
(3, 'Condominium'),
(4, 'Loft'),
(5, 'Chalet'),
(6, 'Chambre');

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_type_paiement`
-- 

INSERT INTO `al_type_paiement` (`id_paiement`, `paiement`) VALUES
(1, 'Interact'),
(2, 'Paypal'),
(3, 'MasterCard'), 
(4, 'Visa');

-- --------------------------------------------------------

-- 
-- Insertion des données de la table `al_type_usager`
-- 

INSERT INTO `al_type_usager` (`id_type_usager`, `type_usager`) VALUES
(1, 'Administrateur'),
(2, 'Propietaire'),
(3, 'Locataire');

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_usager`
-- 

INSERT INTO `al_usager` (`courriel`, `nom`, `prenom`, `cellulaire`, `mot_de_passe`, `u_valide`, `u_banni`, `u_commentaire_banni`, `u_date_banni`, `id_contact`, `id_type_usager`, `id_paiement`) VALUES
('chucknorris@gmail.com', 'Norris', 'Chuck', NULL, '12345', true, NULL, NULL, NULL, 3, 3, 1),
('jonathanmartel@gmail.com', 'Martel', 'Jonathan', NULL, '12345', true, NULL, NULL, NULL, 2, 2, 2),
('faycalabouzaid@gmail.com', 'Abouzaid', 'Fayçal', NULL, '12345', true, NULL, NULL, NULL, 1, 2, 3),
('gabrielzoraidag@gmail.com', 'Ortiz', 'Zoraida', NULL, 'ZOrtiz123', true, NULL, NULL, NULL, 1, 1, 4),
('jsubirats@yahoo.com', 'Subirats', 'Jorge', NULL, 'JSubirats123', true, NULL, NULL, NULL, 2, 1, 2),
('missde0404@gmail.com', 'Ratté', 'Denise', NULL, '12345', true, NULL, NULL, NULL, 3, 1, 1),
('oudayan@gmail.com', 'Dutta', 'Oudayan', NULL, '12345', true, NULL, NULL, NULL, 1, 1, 3);

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_logements`
-- 

INSERT INTO `al_logements` 
(`id_logement`, `no_civique`, `apt`, `rue`, `ville`, `province`, `pays`, `code_postal`, `latitude`, `longitude`, `courriel`, `id_type_logement`, `prix`, `evaluation`, `description`, `nb_personnes`, `nb_chambres`, `nb_lits`, `nb_salle_de_bain`, `nb_demi_salle_de_bain`, `frais_nettoyage`, `est_stationnement`, `est_wifi`, `est_cuisine`, `est_tv`, `est_fer_a_repasser`, `est_cintres`, `est_seche_cheveux`, `est_climatise`, `est_laveuse`, `est_secheuse`, `est_chauffage`, `l_valide`,  `l_actif`, `l_banni`, `l_date_banni`, `l_commentaire_banni`) VALUES 
(1, '2030', 'Suite 400', 'Pie-IX Blvd', 'Montreal', 'QC', 'Canada', 'H1V 2C8', '45.5502794', '-73.54264409999996', 'jonathanmartel@gmail.com', 6, 89.00, 4.02345, 'Description', '4', '2', '3', '1', '1', '50.00', true, true, false, true, true, false, true, true, true, true, true, true, true, NULL, NULL, NULL), 
(2, '688', 'Suite 520', 'Rue Notre-Dame O', 'Montreal', 'QC', 'Canada', 'H3C 0S5', '45.5001746', '-73.55989160000001', 'gabrielzoraidag@gmail.com', 4, 135.00, 4.52345, 'Appartement à 1 min de marche du métro Square-Victoria et ave McGill. Profitez de l\'énergie et de l\'architecture du Vieux_Montréal.', '4', '2', '2', '1', '', '', false, true, true, true, false, false, true, false, true, true, true, true, true, NULL, NULL, NULL), 
(3, '4386', 'Suite 120', 'Rue Berri', 'Montreal', 'QC', 'Canada', 'H2J 2R1', '45.5240338', '-73.58021389999999', 'oudayan@gmail.com', 3, 109.00, 4.22345, 'À la porte du métro Mont-Royale et de sa rue commerçante, magnifique condo. Une chambre fermée et une deuxième avec des portes française.', '4', '2', '2', '1', '', '', false, false, false, true, true, false, true, true, true, true, false, true, true, NULL, NULL, NULL), 
(4, '15120 A', '', 'Rue Camille-Laurin', 'Montreal', 'QC', 'Canada', 'H1A 5T4', '45.6846104', '-73.50309270000002', 'faycalabouzaid@gmail.com', 1, 150.00, 4.32345, 'À proximité de tout.', '4', '2', '2', '1', '1', '0.00', true, false, true, true, false, false, false, true, true, true, true, true, true, NULL, NULL, NULL), 
(5, '4719', '', 'Ave Papineau', 'Montreal', 'QC', 'Canada', 'H2H 1V4', '45.53425559999999', '-73.57709349999999', 'jsubirats@yahoo.com', 2, 69.00, 4.42345, 'Idéal pour faire du tourisme à votre ryhtme', '4', '2', '2', '2', '', '40.00', false, true, false, false, true, true, true, true, false, false, false, true, true, NULL, NULL, NULL), 
(6, '7385', '', 'Ave Jean-Desprez', 'Montreal', 'QC', 'Canada', 'H1K 5B9', '45.6167817', '-73.54753340000002', 'gabrielzoraidag@gmail.com', 1, 110.00, 4.52345, 'Résidence chaleureuse.', '2', '1', '1', '1', '1', '', true, true, true, false, false, true, true, false, true, true, true, true, true, NULL, NULL, NULL), 
(7, '1021', '', 'Rue Allard', 'Montreal', 'QC', 'Canada', 'H4H 2C7', '45.4466471', '-73.57856370000002', 'jsubirats@yahoo.com', 1, 90.00, 4.62345, 'Peut combler tout vos besoins.', '6', '3', '4', '2', '', '80.00', true, false, true, false, true, true, true, true, false, false, true, true, true, NULL, NULL, NULL), 
(8, '3907', '', 'Rue de Bullion', 'Montreal', 'QC', 'Canada', 'H2W 2E2', '45.517627', '-73.57632690000003', 'missde0404@gmail.com', 3, 149.00, 4.72345, 'Parmi les rues pleines d\'histoires, notre résidence vous offre un style de vie combinant le luxe et le divertissement.', '5', '3', '3', '2', '', '60.00', false, true, true, true, false, true, true, false, true, true, true, true, true, NULL, NULL, NULL),
(9, '3696', '', 'Ave du Parc-LaFontaine', 'Montreal', 'QC', 'Canada', 'H2L 3M4', '45.5222205', '-73.56778930000002', 'oudayan@gmail.com', 2, 120.00, 4.55345, 'Appartement idéal pour venir relaxer.', '4', '2', '2', '1', '', '33.33', false, true, true, false, false, true, true, false, true, true, false, true, true, NULL, NULL, NULL), 
(10, '4780', '302', 'Rue Fullum', 'Montreal', 'QC', 'Canada', 'H7H 2R9', '45.53893', '-73.5734913', 'jonathanmartel@gmail.com', 2, 75.00, 2.96345, 'Super bien localiser.', '4', '2', '2', '2', '', '0.00', true, true, false, true, false, true, true, true, false, false, true, true, true, NULL, NULL, NULL), 
(11, '1401', '', 'Argyle Avenue', 'Montreal', 'QC', 'Canada', 'H2C 0S5', '45.4945481', '-73.57175489999997', 'missde0404@gmail.com', 6, 99.00, 4.86345, 'Installée dans des résidences du début du 20ème siècle et situé près du Centre Bell, la Petite Auberge bénéficie d\'un super emplacement idéal pour explorer les attractions à proximité.', '5', '1', '1', '1', '', '50.00', false, true, false, true, false, true, false, false, true, true, true, true, true, NULL, NULL, NULL), 
(12, '137 A', '', 'Boul des Prairies', 'Laval', 'QC', 'Canada', 'H3C 4S5', '45.552302', '-73.68894799999998', 'faycalabouzaid@gmail.com', 5, 140.00, 3.7655, 'Chalet pour venir vous relaxer en toute saison. ', '6', '3', '3', '1', '1', '75.00', true, true, true, true, true, true, true, true, true, true, true, true, true, NULL, NULL, NULL);

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_pieces`
-- 

INSERT INTO `al_pieces` (`id_piece`, `description_piece`) VALUES 
(1, "Atelier"), 
(2, "Bureau"), 
(3, "Balcon"),
(4, "Chambre à coucher"), 
(5, "Chambre d'invités"), 
(6, "Chambre des maîtres"), 
(7, "Chambre froide"), 
(8, "Corridor"),
(9, "Cour avant"),
(10, "Cour arrière"),
(11, "Cuisine"), 
(12, "Escalier"), 
(13, "Façade"), 
(14, "Garage"), 
(15, "Garde-robe (Walk-in)"),
(16, "Salon"), 
(17, "Salle à manger"),
(18, "Salle de bain"), 
(19, "Salle d'eau"), 
(20, "Salle de lavage"),
(21, "Sous-sol"), 
(22, "Piscine / Spa"),
(23, "Remise"),
(24, "Terrasse"),
(25, "Vestibule"), 
(26, "Vue extérieure"),
(0, "Autre");

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_photos_logement`
-- 

INSERT INTO `al_photos_logement` (`id_photo_logement`, `chemin_photo`, `id_piece`, `id_logement`) VALUES 
(1, "images/Logements/1/image_1.jpg", 13, 1), 
(2, "images/Logements/1/image_2.jpg", 12, 1), 
(3, "images/Logements/1/image_3.jpg", 16, 1), 
(4, "images/Logements/1/image_4.jpg", 16, 1), 
(5, "images/Logements/1/image_5.jpg", 2, 1), 
(6, "images/Logements/1/image_6.jpg", 11, 1), 
(7, "images/Logements/1/image_7.jpg", 6, 1), 
(8, "images/Logements/1/image_8.jpg", 5, 1), 
(9, "images/Logements/1/image_9.jpg", 18, 1), 
(10, "images/Logements/1/image_10.jpg", 24, 1), 
(11, "images/Logements/2/image_1.jpg", 13, 2), 
(12, "images/Logements/2/image_2.jpg", 16, 2), 
(13, "images/Logements/2/image_3.jpg", 17, 2), 
(14, "images/Logements/2/image_4.jpg", 11, 2),
(15, "images/Logements/2/image_5.jpg", 11, 2), 
(16, "images/Logements/2/image_6.jpg", 2, 2),  
(17, "images/Logements/2/image_7.jpg", 6, 2), 
(18, "images/Logements/2/image_8.jpg", 5, 2), 
(19, "images/Logements/2/image_9.jpg", 18, 2), 
(20, "images/Logements/2/image_10.jpg", 8, 2),
(21, "images/Logements/3/image_1.jpg", 17, 3), 
(22, "images/Logements/3/image_2.jpg", 16, 3), 
(23, "images/Logements/3/image_3.jpg", 16, 3), 
(24, "images/Logements/3/image_4.jpg", 11, 3),
(25, "images/Logements/3/image_5.jpg", 11, 3),
(26, "images/Logements/3/image_6.jpg", 11, 3),
(27, "images/Logements/3/image_7.jpg", 6, 3),
(28, "images/Logements/3/image_8.jpg", 6, 3),
(29, "images/Logements/3/image_9.jpg", 5, 3), 
(30, "images/Logements/3/image_10.jpg", 8, 3), 
(31, "images/Logements/3/image_11.jpg", 18, 3),
(32, "images/Logements/3/image_12.jpg", 18, 3),
(33, "images/Logements/4/image_1.jpg", 16, 4), 
(34, "images/Logements/4/image_2.jpg", 16, 4), 
(35, "images/Logements/4/image_3.jpg", 17, 4),
(36, "images/Logements/4/image_4.jpg", 17, 4),
(37, "images/Logements/4/image_5.jpg", 11, 4), 
(38, "images/Logements/4/image_6.jpg", 11, 4), 
(39, "images/Logements/4/image_7.jpg", 11, 4),
(40, "images/Logements/4/image_8.jpg", 6, 4), 
(41, "images/Logements/4/image_9.jpg", 6, 4),
(42, "images/Logements/4/image_10.jpg", 5, 4), 
(43, "images/Logements/4/image_11.jpg", 8, 4),
(44, "images/Logements/4/image_12.jpg", 18, 4), 
(45, "images/Logements/4/image_13.jpg", 18, 4),
(46, "images/Logements/4/image_14.jpg", 18, 4),
(47, "images/Logements/5/image_1.jpg", 16, 5), 
(48, "images/Logements/5/image_2.jpg", 16, 5), 
(49, "images/Logements/5/image_3.jpg", 11, 5), 
(50, "images/Logements/5/image_4.jpg", 11, 5), 
(51, "images/Logements/5/image_5.jpg", 6, 5), 
(52, "images/Logements/5/image_6.jpg", 5, 5), 
(53, "images/Logements/5/image_7.jpg", 18, 5), 
(54, "images/Logements/5/image_8.jpg", 18, 5), 
(55, "images/Logements/5/image_9.jpg", 18, 5), 
(56, "images/Logements/6/image_1.jpg", 16, 6), 
(57, "images/Logements/6/image_2.jpg", 16, 6),
(58, "images/Logements/6/image_3.jpg", 16, 6), 
(59, "images/Logements/6/image_4.jpg", 11, 6), 
(60, "images/Logements/6/image_5.jpg", 11, 6),
(61, "images/Logements/6/image_6.jpg", 11, 6), 
(62, "images/Logements/6/image_7.jpg", 17, 6),
(63, "images/Logements/6/image_8.jpg", 6, 6),
(64, "images/Logements/6/image_9.jpg", 6, 6),
(65, "images/Logements/6/image_10.jpg", 6, 6),
(66, "images/Logements/6/image_11.jpg", 20, 6), 
(67, "images/Logements/6/image_12.jpg", 18, 6), 
(68, "images/Logements/6/image_13.jpg", 18, 6), 
(69, "images/Logements/6/image_14.jpg", 18, 6), 
(70, "images/Logements/7/image_1.jpg", 16, 7), 
(71, "images/Logements/7/image_2.jpg", 17, 7),
(72, "images/Logements/7/image_3.jpg", 11, 7),
(73, "images/Logements/7/image_4.jpg", 11, 7),
(74, "images/Logements/7/image_5.jpg", 11, 7),
(75, "images/Logements/7/image_6.jpg", 6, 7),
(76, "images/Logements/7/image_7.jpg", 6, 7), 
(77, "images/Logements/7/image_8.jpg", 5, 7), 
(78, "images/Logements/7/image_9.jpg", 8, 7),
(79, "images/Logements/7/image_10.jpg", 18, 7), 
(80, "images/Logements/7/image_11.jpg", 21, 7),
(81, "images/Logements/8/image_1.jpg", 16, 8),
(82, "images/Logements/8/image_2.jpg", 16, 8), 
(83, "images/Logements/8/image_3.jpg", 17, 8), 
(84, "images/Logements/8/image_4.jpg", 11, 8), 
(85, "images/Logements/8/image_5.jpg", 11, 8), 
(86, "images/Logements/8/image_6.jpg", 2, 8), 
(87, "images/Logements/8/image_7.jpg", 4, 8), 
(88, "images/Logements/8/image_8.jpg", 8, 8), 
(89, "images/Logements/8/image_9.jpg", 18, 8), 
(90, "images/Logements/8/image_10.jpg", 18, 8), 
(91, "images/Logements/8/image_11.jpg", 18, 8), 
(92, "images/Logements/8/image_12.jpg", 26, 8),
(93, "images/Logements/9/image_1.jpg", 16, 9), 
(94, "images/Logements/9/image_2.jpg", 16, 9), 
(95, "images/Logements/9/image_3.jpg", 16, 9), 
(96, "images/Logements/9/image_4.jpg", 11, 9), 
(97, "images/Logements/9/image_5.jpg", 11, 9), 
(98, "images/Logements/9/image_6.jpg", 6, 9),
(99, "images/Logements/9/image_7.jpg", 6, 9),
(100, "images/Logements/9/image_8.jpg", 6, 9), 
(101, "images/Logements/9/image_9.jpg", 5, 9), 
(102, "images/Logements/9/image_10.jpg", 18, 9), 
(103, "images/Logements/9/image_11.jpg", 18, 9), 
(104, "images/Logements/9/image_12.jpg", 24, 9),
(105, "images/Logements/10/image_1.jpg", 16, 10),
(106, "images/Logements/10/image_2.jpg", 16, 10), 
(107, "images/Logements/10/image_3.jpg", 11, 10), 
(108, "images/Logements/10/image_4.jpg", 11, 10), 
(109, "images/Logements/10/image_5.jpg", 11, 10), 
(110, "images/Logements/10/image_6.jpg", 11, 10), 
(111, "images/Logements/10/image_7.jpg", 17, 10),
(112, "images/Logements/10/image_8.jpg", 17, 10),
(113, "images/Logements/10/image_9.jpg", 17, 10),  
(114, "images/Logements/10/image_10.jpg", 6, 10), 
(115, "images/Logements/10/image_11.jpg", 6, 10), 
(116, "images/Logements/10/image_12.jpg", 18, 10),
(117, "images/Logements/10/image_13.jpg", 18, 10),  
(118, "images/Logements/11/image_1.jpg", 13, 11), 
(119, "images/Logements/11/image_2.jpg", 4, 11),
(120, "images/Logements/11/image_3.jpg", 4, 11), 
(121, "images/Logements/11/image_4.jpg", 4, 11), 
(122, "images/Logements/11/image_5.jpg", 4, 11), 
(123, "images/Logements/11/image_6.jpg", 4, 11), 
(124, "images/Logements/11/image_7.jpg", 4, 11),
(125, "images/Logements/11/image_8.jpg", 4, 11), 
(126, "images/Logements/11/image_9.jpg", 4, 11), 
(127, "images/Logements/11/image_10.jpg", 4, 11),  
(128, "images/Logements/11/image_11.jpg", 11, 11), 
(129, "images/Logements/11/image_12.jpg", 17, 11),  
(130, "images/Logements/11/image_13.jpg", 18, 11),
(131, "images/Logements/11/image_14.jpg", 18, 11),  
(132, "images/Logements/12/image_1.jpg", 13, 12), 
(133, "images/Logements/12/image_2.jpg", 11, 12), 
(134, "images/Logements/12/image_3.jpg", 17, 12), 
(135, "images/Logements/12/image_4.jpg", 6, 12), 
(136, "images/Logements/12/image_5.jpg", 5, 12), 
(137, "images/Logements/12/image_6.jpg", 5, 12), 
(138, "images/Logements/12/image_7.jpg", 18, 12), 
(139, "images/Logements/12/image_8.jpg", 26, 12), 
(140, "images/Logements/12/image_9.jpg", 22, 12); 

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_disponibilite`
-- 

INSERT INTO `al_disponibilite` (`id_disponibilite`, `id_logement`, `date_debut`, `date_fin`, `d_active`) VALUES
(1, 1, "2018-02-20", "2018-03-04", true),
(2, 1, "2018-03-15", "2018-03-31", true),
(3, 1, "2018-04-07", "2018-04-21", true),
(4, 2, "2018-02-25", "2018-03-15", true),
(5, 2, "2018-03-22", "2018-04-02", true),
(6, 2, "2018-04-10", "2018-04-30", true),
(7, 3, "2018-02-21", "2018-03-12", true),
(8, 3, "2018-03-21", "2018-03-31", true),
(9, 3, "2018-04-15", "2018-05-12", true),
(10, 4, "2018-02-21", "2018-03-21", true),
(11, 4, "2018-03-28", "2018-04-15", true),
(12, 4, "2018-04-20", "2018-05-30", true),
(13, 5, "2018-02-20", "2018-03-10", true),
(14, 5, "2018-03-24", "2018-04-20", true),
(15, 5, "2018-04-24", "2018-05-22", true),
(16, 6, "2018-02-19", "2018-03-17", true),
(17, 6, "2018-03-21", "2018-04-05", true),
(18, 6, "2018-04-17", "2018-05-11", true),
(19, 7, "2018-02-26", "2018-03-13", true),
(20, 7, "2018-03-18", "2018-04-22", true),
(21, 7, "2018-04-28", "2018-05-18", true),
(22, 8, "2018-02-22", "2018-03-20", true),
(23, 8, "2018-04-01", "2018-04-14", true),
(24, 8, "2018-04-21", "2018-06-14", true),
(25, 9, "2018-02-21", "2018-04-03", true),
(26, 9, "2018-04-10", "2018-05-03", true),
(27, 9, "2018-05-10", "2018-06-17", true),
(28, 10, "2018-02-20", "2018-03-11", true),
(29, 10, "2018-03-16", "2018-04-12", true),
(30, 10, "2018-04-23", "2018-06-10", true),
(31, 11, "2018-02-22", "2018-04-03", true),
(32, 11, "2018-04-11", "2018-04-28", true),
(33, 11, "2018-05-01", "2018-07-15", true),
(34, 12, "2018-02-24", "2018-03-22", true),
(35, 12, "2018-04-03", "2018-04-21", true),
(36, 12, "2018-04-28", "2018-05-25", true);

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_messagerie`
-- 

INSERT INTO `al_messagerie` (`id_message`, `id_reference`, `sujet`, `fichier_joint`, `message`, `msg_date`, `expediteur`, `m_actif`) VALUES
(1, NULL, "Question 1", "pieces_jointes/test 1.docx", "message 1", "2018-02-21 8:00", "chucknorris@gmail.com", true), 
(2, NULL, "Question 2", "pieces_jointes/test 2.docx", "message 2", "2018-02-21 8:30", "jonathanmartel@gmail.com", true), 
(3, NULL, "Question 3", "pieces_jointes/test 3.docx", "message 3", "2018-02-21 8:45", "faycalabouzaid@gmail.com", true), 
(4, NULL, "Question 4", NULL, "message 4", "2018-02-21 9:00", "gabrielzoraidag@gmail.com", true), 
(5, 4, "Question 4", NULL, "message 5", "2018-02-21 9:45", "jsubirats@yahoo.com", true), 
(6, 4, "Question 4", NULL, "message 6", "2018-02-21 9:50", "missde0404@gmail.com", true), 
(7, NULL, "Question 5", "pieces_jointes/test 4.docx", "message 7", "2018-02-21 9:00", "oudayan@gmail.com", true), 
(8, NULL, "Question 6", NULL, "message 8", "2018-02-21 9:50", "missde0404@gmail.com", true), 
(9, NULL, "Question 7", "pieces_jointes/test 5.docx", "message 9", "2018-02-22 9:00", "chucknorris@gmail.com", true), 
(10, NULL, "Question 8", "pieces_jointes/test 6.docx", "message 10", "2018-02-22 9:30", "jonathanmartel@gmail.com", true), 
(11, NULL, "Question 9", "pieces_jointes/test 7.docx", "message 11", "2018-02-22 9:45", "faycalabouzaid@gmail.com", true), 
(12, NULL, "Question 10", NULL, "message 12", "2018-02-22 10:00", "gabrielzoraidag@gmail.com", true), 
(13, 12, "Question 10", NULL, "message 13", "2018-02-22 11:45", "jsubirats@yahoo.com", true), 
(14, 12, "Question 10", NULL, "message 14", "2018-02-23 9:50", "missde0404@gmail.com", true), 
(15, NULL, "Question 11", "pieces_jointes/test 8.docx", "message 15", "2018-02-22 13:00", "oudayan@gmail.com", true), 
(16, NULL, "Question 12", NULL, "message 16", "2018-02-22 13:50", "missde0404@gmail.com", true), 
(17, NULL, "Question 13", "pieces_jointes/test 9.docx", "message 17", "2018-02-22 17:00", "chucknorris@gmail.com", true), 
(18, NULL, "Question 14", "pieces_jointes/test 10.docx", "message 18", "2018-02-22 17:30", "jonathanmartel@gmail.com", true), 
(19, NULL, "Question 15", "pieces_jointes/test 11.docx", "message 19", "2018-02-22 18:45", "faycalabouzaid@gmail.com", true), 
(20, NULL, "Question 16", NULL, "message 20", "2018-02-22 19:00", "gabrielzoraidag@gmail.com", true), 
(21, 20, "Question 16", NULL, "message 21", "2018-02-22 19:45", "jsubirats@yahoo.com", true), 
(22, 20, "Question 16", NULL, "message 22", "2018-02-22 19:50", "missde0404@gmail.com", true), 
(23, NULL, "Question 17", "pieces_jointes/test 12.docx", "message 23", "2018-02-22 20:00", "oudayan@gmail.com", true), 
(24, NULL, "Question 18", NULL, "message 24", "2018-02-22 20:50", "missde0404@gmail.com", true);

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_destinataire`
-- 

INSERT INTO `al_destinataire` (`destinataire`, `id_message`, `lu`, `d_actif`) VALUES
('jonathanmartel@gmail.com', 1, false, true), 
('faycalabouzaid@gmail.com', 2, false, true), 
('gabrielzoraidag@gmail.com', 3, false, true), 
('jsubirats@yahoo.com', 4, false, true), 
('missde0404@gmail.com', 4, false, true), 
('gabrielzoraidag@gmail.com', 5, false, true), 
('gabrielzoraidag@gmail.com', 6, false, true), 
('oudayan@gmail.com', 8, false, true), 
('chucknorris@gmail.com', 7, false, true), 
('jonathanmartel@gmail.com', 9, false, true), 
('faycalabouzaid@gmail.com', 10, false, true), 
('gabrielzoraidag@gmail.com', 11, false, true), 
('jsubirats@yahoo.com', 12, false, true), 
('missde0404@gmail.com', 12, false, true), 
('gabrielzoraidag@gmail.com', 13, false, true), 
('gabrielzoraidag@gmail.com', 14, false, true), 
('oudayan@gmail.com', 16, false, true), 
('chucknorris@gmail.com', 15, false, true), 
('jonathanmartel@gmail.com', 17, false, true), 
('faycalabouzaid@gmail.com', 18, false, true), 
('gabrielzoraidag@gmail.com', 19, false, true), 
('jsubirats@yahoo.com', 20, false, true), 
('missde0404@gmail.com', 20, false, true), 
('gabrielzoraidag@gmail.com', 21, false, true), 
('gabrielzoraidag@gmail.com', 22, false, true), 
('oudayan@gmail.com', 24, false, true), 
('chucknorris@gmail.com', 23, false, true);

-- --------------------------------------------------------


-- 
-- Insertion des données de la table `al_destinataire`
-- 

INSERT INTO `al_options` (`id_option`, `nom_option`, `valeurs_option`) VALUES
(1, 'forumlaire_recherche', 'a:11:{s:9:"affichage";s:5:"carte";s:3:"tri";s:10:"evaluation";s:3:"asc";s:4:"DESC";s:11:"nbPersonnes";i:1;s:8:"latitude";d:45.57;s:9:"longitude";d:-73.57;s:5:"rayon";i:20;s:4:"zoom";i:11;s:7:"prixMin";i:0;s:7:"prixMax";i:1000000;s:10:"evaluation";i:0;}'), 
(2, 'frais_service', '5.00'),
(3, 'taxes_canada', 'a:10:{i:0;a:3:{i:0;s:6:"Canada";i:1;s:3:"TPS";i:2;d:5;}i:1;a:3:{i:0;s:2:"QC";i:1;s:3:"TVQ";i:2;d:9.975;}i:2;a:3:{i:0;s:2:"ON";i:1;s:3:"HST";i:2;d:8;}i:3;a:3:{i:0;s:2:"NB";i:1;s:3:"HST";i:2;d:10;}i:4;a:3:{i:0;s:2:"NS";i:1;s:3:"HST";i:2;d:10;}i:5;a:3:{i:0;s:2:"NF";i:1;s:3:"HST";i:2;d:10;}i:6;a:3:{i:0;s:2:"PE";i:1;s:3:"HST";i:2;d:10;}i:7;a:3:{i:0;s:2:"MB";i:1;s:3:"PST";i:2;d:8;}i:8;a:3:{i:0;s:2:"SK";i:1;s:3:"PST";i:2;d:6;}i:9;a:3:{i:0;s:2:"BC";i:1;s:3:"PST";i:2;d:7;}}');


-- --------------------------------------------------------