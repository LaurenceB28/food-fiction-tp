-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2023 at 02:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-fictions`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id_genres` int NOT NULL,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id_genres`, `genre`) VALUES
(1, 'Fantasy'),
(2, 'Comique'),
(3, 'Drame'),
(4, 'Polar'),
(5, 'Aventure'),
(6, 'Marvel'),
(7, 'Science-Fiction'),
(8, 'Tarantino'),
(9, 'Horreur'),
(10, 'Histoire'),
(11, 'Adolescent'),
(16, 'Comédie'),
(17, 'Policier'),
(18, 'Animations'),
(19, 'Zombies'),
(20, 'Vampires');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id_medias` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `id_types` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id_medias`, `title`, `id_types`) VALUES
(58, 'Harry Potter', 2),
(59, 'Le Seigneur des Anneaux', 2),
(62, 'Le Parrain', 2),
(63, 'Pulp Fiction', 2),
(64, 'Avengers', 2),
(65, 'Le Voyage de Chihiro', 2),
(66, 'Kung Fu Panda', 2),
(67, 'American Pie', 2),
(68, 'La soupe au Chou', 2),
(69, 'Le Diable s\'habille en Prada', 2),
(70, 'Friends', 1),
(71, 'Breaking Bad', 1),
(72, 'Desperate Housewives', 1),
(73, 'Glee', 1),
(74, 'Hannibal', 1),
(75, 'Riverdale', 1),
(76, 'Stanger Things', 1),
(77, 'Izombies', 1),
(78, 'True Blood', 1),
(79, 'The Walking Dead', 1),
(83, 'buffy contre les vampires', 1),
(101, 'Indiana Jones et le temple maudit', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medias_genres`
--

CREATE TABLE `medias_genres` (
  `id_genres` int NOT NULL,
  `id_medias` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `medias_genres`
--

INSERT INTO `medias_genres` (`id_genres`, `id_medias`) VALUES
(1, 58),
(1, 59),
(4, 62),
(16, 63),
(6, 64),
(16, 67),
(16, 68),
(16, 69),
(2, 70),
(3, 71),
(16, 72),
(2, 73),
(9, 74),
(11, 75),
(7, 76),
(19, 77),
(19, 79),
(5, 101);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id_recipes` int NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `ingredient` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_medias` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id_recipes`, `title`, `ingredient`, `description`, `id_medias`) VALUES
(20, 'La bolo du Parrain \"Sauce Clemenza\"', 'Pour 4 personnes\r\nTemps de préparation : 15 minutes\r\nTemps de cuisson : 30 minutes\r\n\r\n2 cuillères à soupe d’huile d’olive\r\n2 têtes d’ail émincées\r\n2 boites de tomates pelées\r\n1 cuillère à café de concentré de tomates\r\n2 saucisses italiennes (saucisse de veau aux herbes)\r\n1 dizaine de boulettes de bœuf\r\n1 cuillère à soupe de sucre\r\n10 ml de vin rouge\r\nSel et poivre', 'Faites chauffer l’huile dans une grande casserole et faites y revenir l’ail émincé. Salez et poivrez.\r\nMalaxez les tomates avec vos mains pour les réduire en morceaux. Ajoutez les dans la casserole avec le concentré et remuez bien à l’aide d’une cuillère en bois.\r\n\r\nLaissez cuire pendant une dizaine de minutes jusqu’à ce que le mélange commence à compoter.\r\nAjoutez les boulettes de viande et les saucisses grillées et finement émincées.\r\nAjoutez enfin le vin rouge et le sucre. Laissez mijoter à feu doux pendant 20 minutes en remuant de temps en temps.\r\nPendant ce temps faites cuire les spaghetti dans l’eau bouillante le temps indiqué sur le paquet.\r\nVersez les spaghettis égouttés dans la sauce chaude, remuez, et dégustez aussitôt !', 62),
(21, 'Le Super Moelleux de Ross', '3 tranches de pains de ton choix\r\n180 ml (¾ de tasse) de sauce aux canneberges	\r\nEnviron 1 lbs (450 g) de dinde cuite, viande blanche ou brune selon vos goûts\r\n180 ml (¾ de tasse) de pomme de terre aligot	\r\n250 ml (1 tasse) de sauce brune ou sauce à poutine\r\n250 ml (1 tasse) (de bébé épinards)\r\n15 ml (1 c. à soupe) de mayonnaise maison	\r\nSel, poivre au goût\r\n', 'Griller le pain\r\nTartiner une tranche de pain avec la sauce aux canneberges, ensuite la farce, ensuite la moitié de la dinde\r\nCouvrir avec une deuxième tranche de pain, celle-ci noyée dans la sauce brune (ou sauce à poutine)\r\nGarnir avec les pommes de terre aligot, le reste de la dinde et les feuilles de bébé épinards \r\nTerminer avec la dernière tranche de pain tartinée de mayonnaise \r\nAssaisonner au besoin et servir aussitôt!', 70),
(22, 'La tarte aux noix de Pécan de Sookie', 'Ingrédients:\r\n180 g de de farine\r\n50 g de sucre roux\r\n50 g de poudre d\'amandes\r\n50 g de beurre\r\n1 œuf\r\n1 pincée de sel\r\n1 sachet de sucre vanillé\r\n\r\nPour la Garniture:\r\n200 g de noix de pecan\r\n50 g de beurre\r\n2 œufs\r\n100 g de cassonade\r\n10 cl de crème fraîche\r\n', '1) Dans un récipient, commencez par mélanger le beurre (ramolli à température ambiante) avec le sucre roux et le sucre vanillé de façon à obtenir une préparation homogène. Ajoutez la farine en la passant à travers un tamis, ainsi que la poudre d’amandes avec une pincée de sel. Incorporez l’œuf et mélangez à nouveau. Étalez ensuite la pâte à l’aide d’un rouleau à pâtisserie avant d’en faire une boule que vous réserverez 2h au frigo dans un film plastique.\r\n\r\n2) À l’issue du temps de repos de la pâte, beurrez un moule à tarte d’un diamètre d’une trentaine de cm et préchauffez votre four à 200°C (thermostat 6). Étalez la pâte sur une épaisseur d’environ 5 mm et déposez-la dans le plat prévu à cet effet, en veillant à y percer de petits trous avec une fourchette. Afin que la pâte prenne mieux, placez-la 5 min au congélateur. Faites cuire un quart d’heure à 200°C.\r\n\r\n3) Réservez ensuite 15 cerneaux de noix de pécan et concasser le reste jusqu’à obtenir une poudre à laquelle vous ajouterez les œufs et le sucre. Versez-y la crème et le beurre fondu, puis mélangez le tout au fouet. Enfin, sortez le fond de tarte du four pour le laisser refroidir quelques instants et versez-y la préparation. Laissez cuire une quarantaine de min supplémentaires. Enfin, mettez la touche finale en ornant votre tarte des noix restées entières.', 78),
(23, 'Le big kahuna burger', 'Ingrédients :\r\n4 pains à burger\r\n4 steaks hachés\r\n4 tranches d\'ananas\r\n4 tranches de cheddar\r\n4 feuilles de salade\r\n4 rondelles de tomate\r\n2 oignons rouges\r\nBeurre\r\nKetchup\r\nSauce Teriyaki\r\nSel\r\nPoivre \r\n\r\n', 'Préparation : 10 minutes - Temps de cuisson : 10 minutes - Quantité : 4 personnes \r\n\r\nÉtape 1 :\r\nPréchauffez votre four à 160°.\r\nÉpluchez et taillez les oignons rouges en tranches fines.\r\nÉpluchez et coupez l\'ananas en tranches.\r\nLavez et couper les tomates en rondelles.\r\nLavez les feuilles de salade.\r\n\r\nÉtape 2 :\r\n\r\nFaites fondre une noix de beurre dans une poêle, puis faites revenir les oignons jusqu\'à ce qu\'ils soient confits. Réservez.\r\nFaites rôtir les tranches d\'ananas dans cette même poêle, pour les caraméliser, puis réservez.\r\nFaites cuire et assaisonnez les steaks hachés.\r\nPendant la cuisson, coupez les pains à burger en deux et déposez-les sur une plaque allant au four avec une tranche de cheddar sur chaque base de burger.\r\nEnfournez-les brièvement, juste le temps de faire fondre le fromage.\r\n\r\nÉtape 3 :\r\nPosez les steaks sur les pains où il y a le fromage fondu.\r\nAjoutez un peu de ketchup.\r\nAjoutez les oignons confits et les tranches d\'ananas caramélisées.\r\nVersez de la sauce Teriyaki sur les pains dépourvus de fromage, puis refermez les burgers.\r\nServez. ', 63),
(24, 'Bière au beurre Harry Potter', '1 litre d\'eau \r\n2 c à s de fleur d\'hibiscus séchées\r\n2 c à s de sirop d\'agave', 'Dans une grande carafe, mélanger l\'eau et les fleur d\'hibiscus et laisser reposer au frais ou à température ambiante 1h à 2h. \r\n\r\nFiltrer et mélanger avec le sirop d\'agave pour sucrer. \r\n\r\nVerser dans une bouteille et conserver au frais avant de servir. \r\n\r\nSe conserve 48h au frais.\r\n', 58),
(25, 'La pizza de Breaking Bad', '    Tranche(s) de pepperoni\r\n    Mozzarella di Bufala\r\n    Purée de tomate fraîche\r\n    Oignon\r\n    Ail\r\n    Huile d’olive\r\n    Basilic\r\n    1 pate à pizza\r\n    Sel\r\n    Poivre', 'Préchauffer le four à 250 °C\r\nÉplucher l’oignon et l’ail et faire suer dans un peu d’huile d’olive , saler, poivrer et débarrasser dans la cuve du blender.\r\nAjouter la purée de tomates et quelques feuilles de basilic. Mixer pour obtenir une sauce lisse.\r\nDébarrasser.\r\nÉgoutter les boules de mozzarella et les couper en tranches.\r\nÉtaler la pâte à pizza sur une plaque allant au four. Répartir ensuite la sauce tomate sur une épaisseur de quelques millimètres, disposer les tranches de mozzarella.\r\nEnfourner pendant 8 min.\r\nSorter du four et déguster!', 71),
(26, 'Le Milkshake double chocolat de Riverdale', 'Pour 2 milkshakes:\r\n50 cl de lait\r\n6 c. à café de cacao en poudre\r\n1 c. à soupe de glace au chocolat noir\r\n1 c. à soupe de glace au chocolat au lait\r\nChantilly\r\nCopeaux de chocolat', 'Préparer un milkshake n’a rien de bien compliqué. Il suffit de verser dans un mixeur le lait, le cacao et la glace et de mixer.\r\n\r\nVersez ensuite le contenu dans un grand verre, recouvrez de chantilly et de copeaux de chocolat.\r\n\r\nDégustez votre milkshake double chocolat !', 75),
(27, 'Les gaufres d’Eleven', 'Pour 15 gaufres\r\n\r\n1 pincée de Sel\r\n\r\n25 cl Lait\r\n\r\n30 g Sucre\r\n\r\n200 g Farine\r\n\r\n3 Oeufs\r\n\r\n20 g de beurre', 'Mettre la farine dans un saladier, y ajouter le sucre, les jaunes d’œufs et le beurre ramolli.\r\n\r\nDélayer peu à peu le tout en y ajoutant le lait pour qu’il n’y ait pas de grumeaux.\r\n\r\nBattre les blancs en neige avec une pincée de sel et les ajouter au restant en remuant délicatement.\r\n\r\nCuire le tout dans un gaufrier légèrement beurré.', 76),
(28, 'La tarte aux pommes d\'American Pie', 'Pour 6 personnes:\r\n    1 kg Pomme Reinette(s)\r\n    25 g Cassonade\r\n    5 g Cannelle en poudre\r\n    1 Citron(s) jaune(s)\r\n    300 g Farine\r\n    190 g Beurre mou\r\n    5 cl Eau\r\n    0,5 c. à café Bicarbonate de soude\r\n    1 pincée(s) Sel\r\n\r\n  ', 'Préparation20 min\r\nCuisson55 min\r\n\r\n  1.\r\n\r\n    Préparez la pâte. Coupez le beurre ramolli en dés. Dans un saladier, versez la farine et creusez-y un puits. Versez-y le beurre, le sel et le bicarbonate. Pétrissez grossièrement, puis incorporez progressivement l’eau. Pétrissez à nouveau jusqu’à former une boule. Couvrez le saladier et laissez reposer 30 min au frais.\r\n    2.\r\n\r\n    Préchauffez le four th.6 (180°C). Épluchez et épépinez les pommes, puis coupez-les en morceaux. Arrosez-les du jus du citron jaune dans un saladier, ajoutez la cannelle et mélangez pour enrober les pommes.\r\n    3.\r\n\r\n    Sortez la pâte et étalez-la sur un plan de travail fariné, assez pour y découper deux disques plus grands que votre moule. Placez le premier au fond du moule. Tapissez-le de morceaux de pommes. Recouvrez avec le second disque de pâte. Scellez les bords en pinçant avec les doigts, puis découpez des incisions en étoile sur le dessus, afin que la vapeur s’échappe. Saupoudrez de cassonade et enfournez pour 55 min.\r\n\r\n\r\n', 67),
(29, 'La soupe aux choux ', '\r\n    500 tranche(s) Poitrine fumée\r\n    4 Pomme(s) de terre\r\n    2 Carotte(s)\r\n    1 Chou vert\r\n    1 Poireau(x)\r\n', '\r\n\r\n    Préparation :\r\n    Préparation20 min\r\n    Cuisson1 h\r\n\r\n    1.\r\n\r\n    Lavez le poireau et coupez-le en rondelles. Épluchez la carotte et détaillez-la en morceaux. Lavez le chou, détachez les feuilles. Épluchez les pommes de terre et coupez-les en cubes..\r\n    2.\r\n\r\n    Dans une cocotte, faites fondre le beurre à feu doux. Ajoutez le poireau, les carottes, la rave et les pommes de terre. Salez, poivrez.\r\n    3.\r\n\r\n    Recouvrez d’eau puis ajoutez les feuilles du chou, ainsi que la poitrine fumée.\r\n    4.\r\n\r\n    Laissez mijoter 1 heure à feu doux et servez.\r\n', 68),
(30, 'Shrimp salsa, salade de crevette sauce piquante', '    1 tomate coupée en petits dés\r\n    1 oignon rouge émincé\r\n    2 càs de feuilles de coriandre\r\n    1 douzaine de crevettes décortiquées et coupées\r\n    Jus d’un citron vert\r\n    Sel poivre, paprika\r\n    1 filet d’huile d’olive\r\n    Sauce piquante', 'Mélanger tous les ingrédients dans un bol. Réserver au réfrigérateur. Déguster avec des chips de tortilla.', 77),
(31, 'Les roulades de boeuf d\'Hannibal', 'Pour 4 personnes\r\n\r\n    200 g de riz pour sushi\r\n    20 cl de vinaigre de riz\r\n    10 g de sucre\r\n    Sel fin\r\n    Piment d’Espelette\r\n    12 tranches rondes de bacon\r\n    12 tranches de carpaccio de bœuf\r\n    3 tomates cerises\r\n    Parmesan râpé\r\n    Quelques feuilles de basilic\r\n    Ciboulette\r\n', '\r\n\r\n    1 Faites cuire le riz et ajoutez-y un peu de piment d’Espelette.\r\n    2 Posez à plat les tranches de bacon. Déposez une cuillère à café de riz au milieu de chaque tranche.\r\n    3 Coupez les tomates cerises en quatre dans le sens de la longueur. Déposez deux morceaux sur chaque tas de riz. Saupoudrez de parmesan râpé et ajoutez une feuille de basilic. Roulez et faites cuire à la poêle pendant 20 secondes de chaque côté.\r\n    Pour finir\r\n    Quand le bacon est cuit, enroulez chaque bouchée d’une fine tranche de carpaccio de bœuf et scellez avec deux brins de ciboulette.\r\n\r\n', 74),
(32, 'Chawarma : le sandwich des Avengers', 'Pour 2 à 4 personnes (selon les appétits)\r\n2 blancs de poulet coupés en petites lamelles\r\n1 petit oignon rouge finement émincé\r\n1 petites tomates coupée en dés\r\n1 yaourt nature\r\n4 cc de moutarde à l’ancienne\r\n1 jus de citron quelques feuilles de menthe et de coriandre\r\n\r\nPour la marinade :\r\n1 cc de coriandre en poudre\r\n1 cc de canelle\r\n4 graines de cardamome écrasées\r\n1 pointe de couteau de poivre blanc\r\n1 pointe de couteau de poivre noir\r\n1 clou de girofle écrasé\r\n2 cs d’huile d’olive', '    Mettez les dés de poulet dans un récipient hermétique avec les élements de la marinade. Remuez et couvrez. Laissez mariner à minima 1/2 heure\r\n    Dressez les dés de tomates et les oignons dans de jolis petits bols\r\n    Préparez la sauce au yaourt en mélangeant la moutarde et le citron, versez dans un joli bol de service\r\n    Dans un poêle bien chaude, versez la viande et faites la revenir de tous côtés. Stoppez la cuisson lorsqu’elle est bien dorée\r\n    Faites chauffez les tortillas (soit en en mettant plusieurs au micro ondes, soit dans une pôle sans ajout de matière grasse une par une.)\r\n    Servez et composez votre chawarma en associant un peu de viande, de la sauce au yaourt, des dés de tomates, des oignons émincés et quelques feuilles de menthe et coriandre hachées sur une tortillas, puis roulez tout ça et c’est prêt !', 64),
(33, 'Les onigiri de Chihiro', '150-200 g de riz jasmin\r\n4 cuillères à soupe de vinaigre d’alcool blanc\r\nSel\r\nSucre\r\n1 boîte de thon nature\r\n500 g mayonnaise\r\n4 feuilles d’algue nori ', 'Bien laver le riz dans une casserole. Égoutter et rincer jusqu’à ce que l’eau soit nette. Astuce : le volume d’eau doit dépasser celui du riz d’une demi-phalange. Faire cuire le riz. \r\n\r\nUne fois le riz cuit, verser le vinaigre d’alcool blanc dessous et mélanger avec un peu de sel et de sucre.\r\n\r\nÉmietter le thon dans un bol et bien le mélanger avec de la mayonnaise, à doser selon votre goût.\r\n\r\nSe mouiller les mains, former 4 galettes de riz, déposer sur chacune une couche plate de thon, puis une autre couche plate de riz par-dessus. En faire des boules, puis modeler les coins pour obtenir des triangles.\r\nHumecter les feuilles d’algue puis les poser sous les onigiri.\r\nDeguster! ', 65),
(34, 'Soupe de nouilles Kung Fu Panda', 'Pour les boulettes de viande\r\n1 lb de porc haché\r\n1/2 c. huile de sésame\r\n1/2 tasse de chapelure nature, sèche\r\n1/4 c. gingembre moulu\r\n1 œuf, légèrement battu\r\n2 gousses d’ail émincées\r\nPour la soupe\r\n1 carton (32 oz) de bouillon de volaille\r\n1/4 c. gingembre moulu\r\n1 paquet (16 oz) nouilles chow mein\r\n1 bouquet de brocoli, paré et cuit à la vapeur jusqu’à ce qu’il soit tendre et croustillant\r\n4 oignons verts, tranchés\r\nFlocons de poivron rouge, facultatif', '    Préchauffer le four à 200 °c. Vaporiser une plaque à pâtisserie d’enduit à cuisson et réserver.\r\n    Dans un grand bol, mélanger tous les ingrédients des boulettes de viande jusqu’à ce qu’ils soient bien mélangés. Formez des boules de 1-1½ pouces. Placer les boulettes de viande sur la plaque à pâtisserie préparée et cuire de 18 à 20 minutes ou jusqu’à ce que la viande ne soit plus rose.\r\n    Pendant ce temps, porter à ébullition le bouillon de poulet et le gingembre moulu dans une grande marmite. Ajouter les nouilles chow mein et cuire selon les instructions sur l’emballage.\r\n    Une fois les nouilles cuites, divisez les nouilles et le bouillon dans 4 bols. Ensuite, divisez les boulettes de viande, les brocolis et les oignons verts entre les bols.\r\n    Garnir les portions individuelles de flocons de piment rouge, si désiré.', 66),
(35, 'Les Cookies de Carol', 'Pour une vingtaine des cookies:\r\n- 145 g de compote de pomme. J\'ai choisi une compote de pomme sans morceaux et allégée en sucre.\r\n- 120 g de margarine\r\n- 120 g de sucre en poudre\r\n- 120 g de vergeoise blonde\r\n- 320 g de farine. J\'utilise de la T45.\r\n- 1/2 cuillère à café de levure chimique\r\n- 1/2 cuillère à café de bicarbonate alimentaire\r\n- 1 bonne pincée de sel fin\r\n- 115 g de chocolat noir. J\'ai choisi le chocolat Valrhona Guanaja à 70% de cacao.', 'Dans un saladier (ou au robot avec l\'outil feuille), fouettez la compote + la margarine + le sucre + la vergeoise jusqu\'à obtenir une préparation fluide avec seulement de petits morceaux résiduels de margarine.\r\n2. Tamisez ensemble la farine + la levure + le bicarbonte. Ajoutez ce mélange au saladier et fouettez à nouveau.\r\n3. Ajoutez le sel et fouettez encore jusqu\'à obtenir une préparation souple comme une pâte à cake.\r\n4. Concassez le chocolat en pépites. Je vous recommande de tailler des pépites plus grosses que celles que l\'on trouve dans le commerce ; ça sera plus gourmand. Ajoutez les pépites à la pâte et mélangez briévement à la cuillère en bois pour les incorporer.\r\n5. À l\'aide d\'une cuillère à boule de glace, prélevez de la pâte et déposez les demi-boules ainsi formées sur une assiette ou un plateau qui passe au congélateur.\r\n6. Stockez les demi-boules de pâte au congélateur au moins 2h. Perso, j\'ai préparé mes cookies le soir et ils ont dormi au congélateur toute la nuit.\r\n7. Après passage au congélateur, passez à la cuisson ! Préchauffez le four à 180°C. Sortez les demi-boules de pâte du congélateur et répartissez-les en quiconce sur une plate (ou une grille fine) couverte de papier sulfurisé. Ne cherchez surtout pas à réchauffer ou à décongeler la pâte à cookies, enfournez illico la plaque pour 15 minutes (et vérifiez bien si, pour votre four, 15 mn de cuisson c\'est ni trop, ni trop peu). Répétez l\'opération autant de fois que vous avez de plaques de cookies.\r\n8. À la sortie du four, vos cookies seront gonflés, dodus. Glissez aussitôt la feuille de papier sulfurisé avec vos cookies cuits sur une grille pour qu\'ils refroidissent. Ils vous semblent très mous ? En refroidissant, ils vont se durcir juste ce qu\'il faut. Ils vont aussi se dégonfler.', 79);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id_types` int NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id_types`, `type`) VALUES
(1, 'Série'),
(2, 'Film');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `lastname`, `firstname`, `email`, `password`, `pseudo`, `picture`, `created_at`, `validated_at`, `updated_at`, `deleted_at`, `role`) VALUES
(1, 'brdx', 'laurence', 'laula@gmail.com', 'azer', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'bertrand', 'lucien', 'b@gmail.com', '$2y$10$a0gbNcB3BFUtSLvGSYVHsOclZ65v9PzXOtZLeE1DOBIl91YgN/sCa', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_recipes`
--

CREATE TABLE `users_recipes` (
  `id_users` int NOT NULL,
  `id_recipes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genres`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id_medias`),
  ADD KEY `id_types` (`id_types`);

--
-- Indexes for table `medias_genres`
--
ALTER TABLE `medias_genres`
  ADD PRIMARY KEY (`id_genres`,`id_medias`),
  ADD KEY `id_medias` (`id_medias`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id_recipes`),
  ADD KEY `id_medias` (`id_medias`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_types`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `users_recipes`
--
ALTER TABLE `users_recipes`
  ADD PRIMARY KEY (`id_users`,`id_recipes`),
  ADD KEY `id_recipes` (`id_recipes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genres` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id_medias` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id_recipes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id_types` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_ibfk_1` FOREIGN KEY (`id_types`) REFERENCES `types` (`id_types`);

--
-- Constraints for table `medias_genres`
--
ALTER TABLE `medias_genres`
  ADD CONSTRAINT `medias_genres_ibfk_1` FOREIGN KEY (`id_genres`) REFERENCES `genres` (`id_genres`),
  ADD CONSTRAINT `medias_genres_ibfk_2` FOREIGN KEY (`id_medias`) REFERENCES `medias` (`id_medias`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`id_medias`) REFERENCES `medias` (`id_medias`);

--
-- Constraints for table `users_recipes`
--
ALTER TABLE `users_recipes`
  ADD CONSTRAINT `users_recipes_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `users_recipes_ibfk_2` FOREIGN KEY (`id_recipes`) REFERENCES `recipes` (`id_recipes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
