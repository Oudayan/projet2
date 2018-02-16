#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: al_type_contact
#------------------------------------------------------------

CREATE TABLE al_type_contact(
    id_contact Int NOT NULL, 
    contact    Varchar (25), 
    PRIMARY KEY (id_contact)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_disponibilite
#------------------------------------------------------------

CREATE TABLE al_disponibilite(
    id_disponibilite         Int NOT NULL, 
    id_logement              Int NOT NULL, 
    date_debut               Date NOT NULL, 
    date_fin                 Date NOT NULL, 
    expire                   TinyINT NOT NULL, 
    id_logement_al_logements Int, 
    PRIMARY KEY (id_disponibilite), 
    INDEX (id_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_logements
#------------------------------------------------------------

CREATE TABLE al_logements(
    id_logement           Int(11) NOT NULL, 
    no_civique            Int(11) NOT NULL, 
    apt                   Varchar (75), 
    rue                   Varchar (75) NOT NULL, 
    ville                 Varchar (75) NOT NULL, 
    province              Varchar (75) NOT NULL, 
    pays                  Varchar (75) NOT NULL, 
    code_postal           Varchar (7) NOT NULL, 
    latitude              Varchar (25), 
    longitude             Varchar (25), 
    id_type_logement      Int NOT NULL, 
    premiere_photo        Varchar (75), 
    prix                  decimal (15,2), 
    evaluation            decimal (15,12), 
    description           Text NOT NULL, 
    courriel              Varchar (25) NOT NULL, 
    nb_personnes          SmallInt(4), 
    nb_chambres           TinyInt, 
    nb_lits               TinyInt, 
    nb_salle_de_bain      TinyINT, 
    nb_demi_salle_de_bain TinyINT, 
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
    l_actif               Bool, 
    l_banni               Bool, 
    l_date_banni          Date, 
    l_commentaire_banni   Text, 
    PRIMARY KEY (id_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_location
#------------------------------------------------------------

CREATE TABLE al_location(
    id_reservation           int (11) Auto_increment  NOT NULL, 
    id_logement              Int, 
    id_client                Int NOT NULL, 
    date_debut               Date NOT NULL, 
    date_retour              Date, 
    date_reservation         Date, 
    cout                     Float, 
    valide                   Bool, 
    id_logement_al_logements Int, 
    courriel                 Varchar (25) NOT NULL, 
    PRIMARY KEY (id_reservation), 
    INDEX (id_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_type_usager
#------------------------------------------------------------

CREATE TABLE al_type_usager(
    id_type_usager int (11) Auto_increment  NOT NULL, 
    type_usager    Varchar (35) NOT NULL, 
    PRIMARY KEY (id_type_usager)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_type_paiement
#------------------------------------------------------------

CREATE TABLE al_type_paiement(
    id_paiement int (11) Auto_increment  NOT NULL, 
    paiement    Varchar (25) NOT NULL, 
    PRIMARY KEY (id_paiement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_type_logement
#------------------------------------------------------------

CREATE TABLE al_type_logement(
    id_type_logement int (11) Auto_increment  NOT NULL, 
    type_logement    Varchar (55) NOT NULL, 
    PRIMARY KEY (id_type_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_usager
#------------------------------------------------------------

CREATE TABLE al_usager(
    courriel            Varchar (25) NOT NULL, 
    nom                 Char (25) NOT NULL, 
    prenom              Varchar (25) NOT NULL, 
    cellulaire          Varchar (25), 
    mot_de_passe        Char (25) NOT NULL, 
    u_banni             TinyINT, 
    u_commentaire_banni Text, 
    u_date_banni        Date, 
    id_contact          Int NOT NULL, 
    id_type_usager      Int NOT NULL, 
    id_paiement         Int NOT NULL, 
    PRIMARY KEY (courriel)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_evaluations
#------------------------------------------------------------

CREATE TABLE al_evaluations(
    id_evaluation       int (11) Auto_increment  NOT NULL, 
    commentaire         Text, 
    date_evaluation     Date NOT NULL, 
    ponctuation         Int NOT NULL, 
    e_banni             TinyINT, 
    e_date_banni        Date, 
    e_commentaire_banni Text, 
    courriel            Varchar (25) NOT NULL, 
    id_logement         Int, 
    PRIMARY KEY (id_evaluation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_photos_logement
#------------------------------------------------------------

CREATE TABLE al_photos_logement(
    id_photo_logement int (11) Auto_increment  NOT NULL, 
    chemin_photo      Varchar (175) NOT NULL, 
    description_photo Text, 
    id_logement       Int, 
    PRIMARY KEY (id_photo_logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: al_messagerie
#------------------------------------------------------------

CREATE TABLE al_messagerie(
    id_message    int (11) Auto_increment  NOT NULL, 
    id_reference  Int, 
    sujet         Varchar (255) NOT NULL, 
    fichier_joint Varchar (255), 
    message       Text NOT NULL, 
    msg_date      Date NOT NULL, 
    courriel      Varchar (25) NOT NULL, 
    PRIMARY KEY (id_message), 
    INDEX (id_reference, msg_date)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: assigner  destinataire
#------------------------------------------------------------

CREATE TABLE al_assigner_destinataire(
    courriel   Varchar (25) NOT NULL, 
    id_message Int NOT NULL, 
    PRIMARY KEY (courriel, id_message)
)ENGINE=InnoDB;

ALTER TABLE al_disponibilite ADD CONSTRAINT FK_al_disponibilite_id_logement_al_logements FOREIGN KEY (id_logement_al_logements) REFERENCES al_logements(id_logement);
ALTER TABLE al_logements ADD CONSTRAINT FK_al_logements_courriel FOREIGN KEY (courriel) REFERENCES al_usager(courriel);
ALTER TABLE al_logements ADD CONSTRAINT FK_al_logements_id_type_logement FOREIGN KEY (id_type_logement) REFERENCES al_type_logement(id_type_logement);
ALTER TABLE al_location ADD CONSTRAINT FK_al_location_id_logement_al_logements FOREIGN KEY (id_logement_al_logements) REFERENCES al_logements(id_logement);
ALTER TABLE al_location ADD CONSTRAINT FK_al_location_courriel FOREIGN KEY (courriel) REFERENCES al_usager(courriel);
ALTER TABLE al_usager ADD CONSTRAINT FK_al_usager_id_contact FOREIGN KEY (id_contact) REFERENCES al_type_contact(id_contact);
ALTER TABLE al_usager ADD CONSTRAINT FK_al_usager_id_type_usager FOREIGN KEY (id_type_usager) REFERENCES al_type_usager(id_type_usager);
ALTER TABLE al_usager ADD CONSTRAINT FK_al_usager_id_paiement FOREIGN KEY (id_paiement) REFERENCES al_type_paiement(id_paiement);
ALTER TABLE al_evaluations ADD CONSTRAINT FK_al_evaluations_courriel FOREIGN KEY (courriel) REFERENCES al_usager(courriel);
ALTER TABLE al_evaluations ADD CONSTRAINT FK_al_evaluations_id_logement FOREIGN KEY (id_logement) REFERENCES al_logements(id_logement);
ALTER TABLE al_photos_logement ADD CONSTRAINT FK_al_photos_logement_id_logement FOREIGN KEY (id_logement) REFERENCES al_logements(id_logement);
ALTER TABLE al_messagerie ADD CONSTRAINT FK_al_messagerie_courriel FOREIGN KEY (courriel) REFERENCES al_usager(courriel);
ALTER TABLE al_assigner_destinataire ADD CONSTRAINT FK_assigner_destinataire_courriel FOREIGN KEY (courriel) REFERENCES al_usager(courriel);
ALTER TABLE al_assigner_destinataire ADD CONSTRAINT FK_assigner_destinataire_id_message FOREIGN KEY (id_message) REFERENCES al_messagerie(id_message);




-- 
-- Insertion des données de la table `al_type_contact`
-- 


INSERT INTO `al_type_contact` (`id_contact`, `contact`) VALUES
(0, NULL),
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

INSERT INTO `al_usager` (`courriel`, `nom`, `prenom`, `cellulaire`, `mot_de_passe`, `u_banni`, `u_commentaire_banni`, `u_date_banni`, `id_contact`, `id_type_usager`, `id_paiement`) VALUES
('chucknorris@gmail.com', 'Norris', 'Chuck', NULL, '12345', NULL, NULL, NULL, 3, 3, 1),
('jonathanmartel@gmail.com', 'Martel', 'Jonathan', NULL, '12345', NULL, NULL, NULL, 2, 2, 2),
('faycalabouzaid@gmail.com', 'Abouzaid', 'Fayçal', NULL, '12345', NULL, NULL, NULL, 1, 2, 3),
('gabrielzoraidag@gmail.com', 'Ortiz', 'Zoraida', NULL, 'ZOrtiz123', NULL, NULL, NULL, 1, 1, 4),
('jsubirats@yahoo.com', 'Subirats', 'Jorge', NULL, 'JSubirats123', NULL, NULL, NULL, 2, 1, 2),
('missde0404@gmail.com', 'Ratté', 'Denise', NULL, '12345', NULL, NULL, NULL, 3, 1, 1),
('oudayan@gmail.com', 'Dutta', 'Oudayan', NULL, '12345', NULL, NULL, NULL, 1, 1, 3);


-- 
-- Insertion des données de la table `al_logements`
-- 

INSERT INTO `al_logements` 
(`id_logement`, `no_civique`, `apt`, `rue`, `ville`, `province`, `pays`, `code_postal`, `latitude`, `longitude`, `courriel`, `id_type_logement`, `premiere_photo`, `prix`, `evaluation`, `description`, `nb_personnes`, `nb_chambres`, `nb_lits`, `nb_salle_de_bain`, `nb_demi_salle_de_bain`, `est_stationnement`, `est_wifi`, `est_cuisine`, `est_tv`, `est_fer_a_repasser`, `est_cintres`, `est_seche_cheveux`, `est_climatise`, `est_laveuse`, `est_secheuse`, `est_chauffage`, `l_actif`, `l_banni`, `l_date_banni`, `l_commentaire_banni`) VALUES 
(1, '2030', 'Suite 400', 'Pie-IX Blvd', 'Montreal', 'QC', 'CAN', 'H1V 2C8', '45.5502794', '-73.54264409999996', 'jonathanmartel@gmail.com', 6, 'images/Logements/1/image_1.jpg', 100.00, 4.02345, 'Description', '4', '2', '3', '1', '1', true, true, false, true, true, false, true, true, true, true, true, true, NULL, NULL, NULL), 
(2, '688', 'Suite 520', 'Rue Notre-Dame O', 'Montreal', 'QC', 'CAN', 'H3C 0S5', '45.5001746', '-73.55989160000001', 'gabrielzoraidag@gmail.com', 4, 'images/Logements/2/image_1.jpg', 135.00, 4.52345, 'Appartement à 1 min de marche du métro Square-Victoria et ave McGill. Profitez de l\'énergie et de l\'architecture du Vieux_Montréal.', '4', '2', '2', '1', '', false, true, true, true, false, false, true, false, true, true, true, true, NULL, NULL, NULL), 
(3, '4386', 'Suite 120', 'Rue Berri', 'Montreal', 'QC', 'CAN', 'H2J 2R1', '45.5240338', '-73.58021389999999', 'oudayan@gmail.com', 3, 'images/Logements/3/image_1.jpg', 130.00, 4.22345, 'À la porte du métro Mont-Royale et de sa rue commerçante, magnifique condo. Une chambre fermée et une deuxième avec des portes française.', '4', '2', '2', '1', '', false, false, false, true, true, false, true, true, true, true, false, true, NULL, NULL, NULL), 
(4, '15120 A', '', 'Rue Camille-Laurin', 'Montreal', 'QC', 'CAN', 'H1A 5T4', '45.6846104', '-73.50309270000002', 'faycalabouzaid@gmail.com', 1, 'images/Logements/4/image_1.jpg', 180.00, 4.32345, 'À proximité de tout.', '4', '2', '2', '1', '1', true, false, true, true, false, false, false, true, true, true, true, true, NULL, NULL, NULL), 
(5, '4719', '', 'Ave Papineau', 'Montreal', 'QC', 'CAN', 'H2H 1V4', '45.53425559999999', '-73.57709349999999', 'jsubirats@yahoo.com', 2, 'images/Logements/5/image_1.jpg', 145.00, 4.42345, 'Idéal pour faire du tourisme à votre ryhtme', '4', '2', '2', '2', '', false, true, false, false, true, true, true, true, false, false, false, true, NULL, NULL, NULL), 
(6, '7385', '', 'Ave Jean-Desprez', 'Montreal', 'QC', 'CAN', 'H1K 5B9', '45.6167817', '-73.54753340000002', 'gabrielzoraidag@gmail.com', 1, 'images/Logements/6/image_1.jpg', 170.00, 4.52345, 'Résidence chaleureuse.', '2', '1', '1', '1', '1', true, true, true, false, false, true, true, false, true, true, true, true, NULL, NULL, NULL), 
(7, '1021', '', 'Rue Allard', 'Montreal', 'QC', 'CAN', 'H4H 2C7', '45.4466471', '-73.57856370000002', 'jsubirats@yahoo.com', 1, 'images/Logements/7/image_1.jpg', 165.00, 4.62345, 'Peut combler tout vos besoins.', '6', '3', '4', '2', '', true, false, true, false, true, true, true, true, false, false, true, true, NULL, NULL, NULL), 
(8, '3907', '', 'Rue de Bullion', 'Montreal', 'QC', 'CAN', 'H2W 2E2', '45.517627', '-73.57632690000003', 'missde0404@gmail.com', 3, 'images/Logements/8/image_1.jpg', 200.00, 4.72345, 'Parmi les rues pleines d\'histoires, notre résidence vous offre un style de vie combinant le luxe et le divertissement.', '5', '3', '3', '2', '', false, true, true, true, false, true, true, false, true, true, true, true, NULL, NULL, NULL),
(9, '3696', '', 'Ave du Parc-LaFontaine', 'Montreal', 'QC', 'CAN', 'H2L 3M4', '45.5222205', '-73.56778930000002', 'oudayan@gmail.com', 2, 'images/Logements/9/image_1.jpg', 150.00, 4.55345, 'Appartement idéal pour venir relaxer.', '4', '2', '2', '1', '', false, true, true, false, false, true, true, false, true, true, false, true, NULL, NULL, NULL), 
(10, '4780', '302', 'Rue Fullum', 'Montreal', 'QC', 'CAN', 'H7H 2R9', '45.53893', '-73.5734913', 'jonathanmartel@gmail.com', 2, 'images/Logements/10/image_1.jpg', 175.00, 3.76345, 'Super bien localiser.', '4', '2', '2', '2', '', true, true, false, true, false, true, true, true, false, false, true, true, NULL, NULL, NULL), 
(11, '1401', '', 'Argyle Avenue', 'Montreal', 'QC', 'CAN', 'H2C 0S5', '45.4945481', '-73.57175489999997', 'missde0404@gmail.com', 2, 'images/Logements/11/image_1.jpg', 100.00, 4.88345, 'Installée dans des résidences du début du 20ème siècle et situé près du Centre Bell, la Petite Auberge bénéficie d\'un super emplacement idéal pour explorer les attractions à proximité.', '2', '1', '1', '1', '', false, true, false, true, false, true, false, false, true, true, true, true, NULL, NULL, NULL), 
(12, '137 A', '', 'Boul des Prairies', 'Laval', 'QC', 'CAN', 'H3C 4S5', '45.552302', '-73.68894799999998', 'faycalabouzaid@gmail.com', 5, 'images/Logements/12/image_1.jpg', 140.00, 4.55555, 'Chalet pour venir vous relaxer en toute saison. ', '6', '3', '3', '1', '1', true, true, true, true, true, true, true, true, true, true, true, true, NULL, NULL, NULL);


-- 
-- Insertion des données de la table `al_photos_logement`
-- 

INSERT INTO `al_photos_logement` (`id_photo_logement`, `chemin_photo`, `description_photo`, `id_logement`) VALUES 
(1, "images/Logements/1/image_1.jpg", "Façade", 1), 
(2, "images/Logements/1/image_2.jpg", "Escalier", 1), 
(3, "images/Logements/1/image_3.jpg", "Salon 1", 1), 
(4, "images/Logements/1/image_4.jpg", "Salon 2", 1), 
(5, "images/Logements/1/image_5.jpg", "Bureau", 1), 
(6, "images/Logements/1/image_6.jpg", "Cuisine", 1), 
(7, "images/Logements/1/image_7.jpg", "Chambre des maîtres", 1), 
(8, "images/Logements/1/image_8.jpg", "Chambre d'invitéd", 1), 
(9, "images/Logements/1/image_9.jpg", "Salle de bain", 1), 
(10, "images/Logements/1/image_10.jpg", "Terasse", 1), 
(11, "images/Logements/2/image_1.jpg", "Façade", 2), 
(12, "images/Logements/2/image_2.jpg", "Salon", 2), 
(13, "images/Logements/2/image_3.jpg", "Salle à manger", 2), 
(14, "images/Logements/2/image_4.jpg", "Cuisine 1", 2),
(15, "images/Logements/2/image_5.jpg", "Cuisine 2", 2), 
(16, "images/Logements/2/image_6.jpg", "Bureau", 2),  
(17, "images/Logements/2/image_7.jpg", "Chambre des maîtres", 2), 
(18, "images/Logements/2/image_8.jpg", "Chambre d'invité", 2), 
(19, "images/Logements/2/image_9.jpg", "Salle de bain", 2), 
(20, "images/Logements/2/image_10 .jpg", "Corridor", 2),
(21, "images/Logements/3/image_1.jpg", "Salle à manger", 3), 
(22, "images/Logements/3/image_2.jpg", "Salon 1", 3), 
(23, "images/Logements/3/image_3.jpg", "Salon 2", 3), 
(24, "images/Logements/3/image_4.jpg", "Cuisine 1", 3),
(25, "images/Logements/3/image_5.jpg", "Cuisine 2", 3),
(26, "images/Logements/3/image_6.jpg", "Cuisine 3", 3),
(27, "images/Logements/3/image_7.jpg", "Chambre des maîtres 1", 3),
(28, "images/Logements/3/image_8.jpg", "Chambre des maîtres 2", 3),
(29, "images/Logements/3/image_9.jpg", "Chambre d'invité", 3), 
(30, "images/Logements/3/image_10.jpg", "Corridor", 3), 
(31, "images/Logements/3/image_11.jpg", "Salle de bain 1", 3),
(32, "images/Logements/3/image_12.jpg", "Salle de bain 2", 3),
(33, "images/Logements/4/image_1.jpg", "Salon 1", 4), 
(34, "images/Logements/4/image_2.jpg", "Salon 2", 4), 
(35, "images/Logements/4/image_3.jpg", "Salle à manger 1", 4),
(36, "images/Logements/4/image_4.jpg", "Salle à manger 2", 4),
(37, "images/Logements/4/image_5.jpg", "Cuisine 1", 4), 
(38, "images/Logements/4/image_6.jpg", "Cuisine 2", 4), 
(39, "images/Logements/4/image_7.jpg", "Cuisine 3", 4),
(40, "images/Logements/4/image_8.jpg", "Chambre des maîtres 1", 4), 
(41, "images/Logements/4/image_9.jpg", "Chambre des maîtres 2", 4),
(42, "images/Logements/4/image_10.jpg", "Chambre d'invité", 4), 
(43, "images/Logements/4/image_11.jpg", "Corridor", 4),
(44, "images/Logements/4/image_12.jpg", "Salle de bain 1", 4), 
(45, "images/Logements/4/image_13.jpg", "Salle de bain 2", 4),
(46, "images/Logements/4/image_14.jpg", "Salle de bain 3", 4),
(47, "images/Logements/5/image_1.jpg", "Salon 1", 5), 
(48, "images/Logements/5/image_2.jpg", "Salon 2", 5), 
(49, "images/Logements/5/image_3.jpg", "Cuisine 1", 5), 
(50, "images/Logements/5/image_4.jpg", "Cuisine 2", 5), 
(51, "images/Logements/5/image_5.jpg", "Chambre des maîtres", 5), 
(52, "images/Logements/5/image_6.jpg", "Chambre d'invité", 5), 
(53, "images/Logements/5/image_7.jpg", "Salle de bain 1", 5), 
(54, "images/Logements/5/image_8.jpg", "Salle de bain 2", 5), 
(55, "images/Logements/5/image_9.jpg", "Salle de bain 3", 5), 
(56, "images/Logements/6/image_1.jpg", "Salon 1", 6), 
(57, "images/Logements/6/image_2.jpg", "Salon 2", 6),
(58, "images/Logements/6/image_3.jpg", "Salon 3", 6), 
(59, "images/Logements/6/image_4.jpg", "Cuisine 1", 6), 
(60, "images/Logements/6/image_5.jpg", "Cuisine 2", 6),
(61, "images/Logements/6/image_6.jpg", "Cuisine 3", 6), 
(62, "images/Logements/6/image_7.jpg", "Salle à manger", 6),
(63, "images/Logements/6/image_8.jpg", "Chambre des maîtres 1", 6),
(64, "images/Logements/6/image_9.jpg", "Chambre des maîtres 2", 6),
(65, "images/Logements/6/image_10.jpg", "Chambre des maîtres 3", 6),
(66, "images/Logements/6/image_11.jpg", "Salle de lavage", 6), 
(67, "images/Logements/6/image_12.jpg", "Salle de bain 1", 6), 
(68, "images/Logements/6/image_13.jpg", "Salle de bain 2", 6), 
(69, "images/Logements/6/image_14.jpg", "Salle de bain 3", 6), 
(70, "images/Logements/7/image_1.jpg", "Salon", 7), 
(71, "images/Logements/7/image_2.jpg", "Salle à manger", 7),
(72, "images/Logements/7/image_3.jpg", "Cuisine 1", 7),
(73, "images/Logements/7/image_4.jpg", "Cuisine 2", 7),
(74, "images/Logements/7/image_5.jpg", "Cuisine 3", 7),
(75, "images/Logements/7/image_6.jpg", "Chambre des maîtres 1", 7),
(76, "images/Logements/7/image_7.jpg", "Chambre des maîtres 2", 7), 
(77, "images/Logements/7/image_8.jpg", "Chambre d'invité", 7), 
(78, "images/Logements/7/image_9.jpg", "Corridor", 7),
(79, "images/Logements/7/image_10.jpg", "Salle de bain", 7), 
(80, "images/Logements/7/image_11.jpg", "Sous-sol", 7),
(81, "images/Logements/8/image_1.jpg", "Salon 1", 8),
(82, "images/Logements/8/image_2.jpg", "Salon 2", 8), 
(83, "images/Logements/8/image_3.jpg", "Salle à manger", 8), 
(84, "images/Logements/8/image_4.jpg", "Cuisine 1", 8), 
(85, "images/Logements/8/image_5.jpg", "Cuisine 2", 8), 
(86, "images/Logements/8/image_6.jpg", "Bureau", 8), 
(87, "images/Logements/8/image_7.jpg", "Chambre", 8), 
(88, "images/Logements/8/image_8.jpg", "Corridor", 8), 
(89, "images/Logements/8/image_9.jpg", "Salle de bain 1", 8), 
(90, "images/Logements/8/image_10.jpg", "Salle de bain 2", 8), 
(91, "images/Logements/8/image_11.jpg", "Salle de bain 3", 8), 
(92, "images/Logements/8/image_12.jpg", "Extérieur", 8),
(93, "images/Logements/9/image_1.jpg", "Salon 1", 9), 
(94, "images/Logements/9/image_2.jpg", "Salon 2", 9), 
(95, "images/Logements/9/image_3.jpg", "Salon 3", 9), 
(96, "images/Logements/9/image_4.jpg", "Cuisine 1", 9), 
(97, "images/Logements/9/image_5.jpg", "Cuisine 2", 9), 
(98, "images/Logements/9/image_6.jpg", "Chambre des maîtres 1", 9),
(99, "images/Logements/9/image_7.jpg", "Chambre des maîtres 2", 9),
(100, "images/Logements/9/image_8.jpg", "Chambre des maîtres 3", 9), 
(101, "images/Logements/9/image_9.jpg", "Chambre d'invité", 9), 
(102, "images/Logements/9/image_10.jpg", "Salle de bain 1", 9), 
(103, "images/Logements/9/image_11.jpg", "Salle de bain 2", 9), 
(104, "images/Logements/9/image_12.jpg", "Terrasse", 9),
(105, "images/Logements/10/image_1.jpg", "Salon 1", 10),
(106, "images/Logements/10/image_2.jpg", "Salon 2", 10), 
(107, "images/Logements/10/image_3.jpg", "Cuisine 1", 10), 
(108, "images/Logements/10/image_4.jpg", "Cuisine 2", 10), 
(109, "images/Logements/10/image_5.jpg", "Cuisine 3", 10), 
(110, "images/Logements/10/image_6.jpg", "Cuisine 4", 10), 
(111, "images/Logements/10/image_7.jpg", "Salle à manger 1", 10),
(112, "images/Logements/10/image_8.jpg", "Salle à manger 2", 10),
(113, "images/Logements/10/image_9.jpg", "Salle à manger 3", 10),  
(114, "images/Logements/10/image_10.jpg", "Chambre des maîtres 1", 10), 
(115, "images/Logements/10/image_11.jpg", "Chambre des maîtres 2", 10), 
(116, "images/Logements/10/image_12.jpg", "Salle de bain 1", 10),
(117, "images/Logements/10/image_13.jpg", "Salle de bain 2", 10),  
(118, "images/Logements/11/image_1.jpg", "Façade", 11), 
(119, "images/Logements/11/image_2.jpg", "Chambre 1", 11),
(120, "images/Logements/11/image_3.jpg", "Chambre 2", 11), 
(121, "images/Logements/11/image_4.jpg", "Chambre 3", 11), 
(122, "images/Logements/11/image_5.jpg", "Chambre 4", 11), 
(123, "images/Logements/11/image_6.jpg", "Chambre 5", 11), 
(124, "images/Logements/11/image_7.jpg", "Chambre 6", 11),
(125, "images/Logements/11/image_8.jpg", "Chambre 7", 11), 
(126, "images/Logements/11/image_9.jpg", "Chambre 8", 11), 
(127, "images/Logements/11/image_10.jpg", "Chambre 9", 11),  
(128, "images/Logements/11/image_11.jpg", "Cuisine", 11), 
(129, "images/Logements/11/image_12.jpg", "Salle à manger", 11),  
(130, "images/Logements/11/image_13.jpg", "Salle de bain", 11),
(131, "images/Logements/11/image_14.jpg", "Salle de bain", 11),  
(132, "images/Logements/12/image_1.jpg", "Façade", 12), 
(133, "images/Logements/12/image_2.jpg", "Cuisine", 12), 
(134, "images/Logements/12/image_3.jpg", "Salle à manger", 12), 
(135, "images/Logements/12/image_4.jpg", "Chambre des maîtres", 12), 
(136, "images/Logements/12/image_5.jpg", "Chambre d'invité 1", 12), 
(137, "images/Logements/12/image_6.jpg", "Chambre d'invité 2", 12), 
(138, "images/Logements/12/image_7.jpg", "Salle de bain", 12), 
(139, "images/Logements/12/image_8.jpg", "Vue extérieur", 12), 
(140, "images/Logements/12/image_9.jpg", "Piscine", 12); 
