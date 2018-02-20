INSERT INTO `al_logements` 
(`id_logement`, `no_civique`, `apt`, `rue`, `ville`, `province`, `pays`, `code_postal`, `latitude`, `longitude`, `courriel`, `id_type_logement`, `premiere_photo`, `prix`, `evaluation`, `description`, `nb_personnes`, `nb_chambres`, `nb_lits`, `nb_salle_de_bain`, `nb_demi_salle_de_bain`, `est_stationnement`, `est_wifi`, `est_cuisine`, `est_tv`, `est_fer_a_repasser`, `est_cintres`, `est_seche_cheveux`, `est_climatise`, `est_laveuse`, `est_secheuse`, `est_chauffage`, `l_actif`, `l_banni`, `l_date_banni`, `l_commentaire_banni`) VALUES 

(1, '2030', 'Suite 400', 'Pie-IX Blvd', 'Montreal', 'QC', 'CAN', 'H1V 2C8', '45.5502794', '-73.54264409999996', 'jonathanmartel@gmail.com', 2, 'images/Logements/1/image_1.jpg', 100.00, 4.52345, 'Description', '4', '2', '3', '1', '1', true, true, false, true, true, false, true, true, true, true, true, true, NULL, NULL, NULL); 

(2, '688', 'Suite 520', 'Rue Notre-Dame O', 'Montreal', 'QC', 'CAN', 'H3C 0S5', '45.5001746', '-73.55989160000001', 
'gabrielzoraidag@gmail.com', 2, 'images/Logements/2/image_1.jpg', 
135.00, 4.52345, 'Appartement à 1 min de marche du métro Square-Victoria et ave McGill. Profitez de l\'énergie et de l\'architecture du Vieux_Montréal.', 
'4', '2', '2', '1', '', false, true, true, true, false, false, true, false, true, true, true, true, NULL, NULL, NULL), 
 
(3, '4386', 'Suite 120', 'Rue Berri', 'Montreal', 'QC', 'CAN', 'H2J 2R1', '45.5240338', '-73.58021389999999',
 'oudayan@gmail.com', 2, 'images/Logements/3/image_1.jpg',
 130.00, 4.22345, 'À la porte du métro Mont-Royale et de sa rue commerçante, magnifique condo. Une chambre fermée et une deuxième avec des portes française.',
 '4', '2', '2', '1', '', false, false, false, true, true, false, true, true, true, true, false, true, NULL, NULL, NULL), 
 
 (4, '15120 A', '', 'Rue Camille-Laurin', 'Montreal', 'QC', 'CAN', 'H1A 5T4', '45.6846104', '-73.50309270000002',
 'faycalabouzaid@gmail.com', 1, 'images/Logements/4/image_1.jpg',
 180.00, 4.32345, 'À proximité de tout.',
 '4', '2', '2', '1', '1', true, false, true, true, false, false, false, true, true, true, true, true, NULL, NULL, NULL), 
 
 (5, '4719', '', 'Ave Papineau', 'Montreal', 'QC', 'CAN', 'H2H 1V4', '45.53425559999999', '-73.57709349999999',
 'jsubirats@yahoo.com', 2, 'images/Logements/5/image_1.jpg',
 145.00, 4.42345, 'Idéal pour faire du tourisme à votre ryhtme',
 '4', '2', '2', '2', '', false, true, false, false, true, true, true, true, false, false, false, true, NULL, NULL, NULL), 
 
 (6, '7385', '', 'Ave Jean-Desprez', 'Montreal', 'QC', 'CAN', 'H1K 5B9', '45.6167817', '-73.54753340000002',
 'gabrielzoraidag@gmail.com', 1, 'images/Logements/6/image_1.jpg',
 170.00, 4.52345, 'Résidence chaleureuse.',
 '2', '1', '1', '1', '1', true, true, true, false, false, true, true, false, true, true, true, true, NULL, NULL, NULL), 
 
 (7, '1021', '', 'Rue Allard', 'Montreal', 'QC', 'CAN', 'H4H 2C7', '45.4466471', '-73.57856370000002',
 'jsubirats@yahoo.com', 1, 'images/Logements/7/image_1.jpg',
 165.00, 4.62345, 'Peut combler tout vos besoins.',
 '6', '3', '4', '2', '', true, false, true, false, true, true, true, true, false, false, true, true, NULL, NULL, NULL), 
 
 (8, '3907', '', 'Rue de Bullion', 'Montreal', 'QC', 'CAN', 'H2W 2E2', '45.517627', '-73.57632690000003',
 'missde0404@gmail.com', 1, 'images/Logements/8/image_1.jpg',
 200.00, 4.72345, 'Parmi les rues pleines d\'histoires, notre résidence vous offre un style de vie combinant le luxe et le divertissement.',
 '5', '3', '3', '2', '', false, true, true, true, false, true, true, false, true, true, true, true, NULL, NULL, NULL),
 
 (9, '3696', '', 'Ave du Parc-LaFontaine', 'Montreal', 'QC', 'CAN', 'H2L 3M4', '45.5222205', '-73.56778930000002',
 'oudayan@gmail.com', 2, 'images/Logements/9/image_1.jpg',
 150.00, 4.55345, 'Appartement idéal pour venir relaxer.',
 '4', '2', '2', '1', '', false, true, true, false, false, true, true, false, true, true, false, true, NULL, NULL, NULL), 
 
 (10, '4780', '302', 'Rue Fullum', 'Montreal', 'QC', 'CAN', 'H7H 2R9', '45.53893', '-73.5734913',
 'jonathanmartel@gmail.com', 2, 'images/Logements/10/image_1.jpg',
 175.00, 4.56345, 'Super bien localiser.',
 '4', '2', '2', '2', '', true, true, false, true, false, true, true, true, false, false, true, true, NULL, NULL, NULL), 
 
 (11, '1401', '', 'Argyle Avenue', 'Montreal', 'QC', 'CAN', 'H2C 0S5', '45.4945481', '-73.57175489999997',
 'missde0404@gmail.com', 4, 'images/Logements/11/image_1.jpg',
 100.00, 4.88345, 'Installée dans des résidences du début du 20ème siècle et situé près du Centre Bell, la Petite Auberge bénéficie d\'un super emplacement idéal pour explorer les attractions à proximité.',
 '2', '1', '1', '1', '', false, true, false, true, false, true, false, false, true, true, true, true, NULL, NULL, NULL), 

(12, '137 A', '', 'Boul des Prairies', 'Laval', 'QC', 'CAN', 'H3C 4S5', '45.552302', '-73.68894799999998',
 'faycalabouzaid@gmail.com', 3, 'images/Logements/12/image_1.jpg',
 140.00, 4.55555, 'Chalet pour venir vous relaxer en toute saison. ',
 '6', '3', '3', '1', '1', true, true, true, true, true, true, true, true, true, true, true, true, NULL, NULL, NULL);