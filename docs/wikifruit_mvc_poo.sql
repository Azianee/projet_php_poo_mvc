
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wikifruit_mvc_poo`
--
CREATE DATABASE IF NOT EXISTS `wikifruit_mvc_poo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `wikifruit_mvc_poo`;

-- --------------------------------------------------------

--
-- Structure de la table `fruit`
--

CREATE TABLE `fruit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_kilo` decimal(9,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fruit`
--

INSERT INTO `fruit` (`id`, `name`, `color`, `origin`, `price_per_kilo`, `user_id`, `description`) VALUES
(1, 'banane', 'jaune', 'antilles', '4.56', 1, 'La banane est le fruit ou la baie dérivant de l’inflorescence du bananier. Les bananes sont des fruits très généralement stériles issus de variétés domestiquées. Seuls les fruits des bananiers sauvages et de quelques cultivars domestiques contiennent des graines. Les bananes sont généralement jaunes avec des taches brunâtres lorsqu\'elles sont mûres et vertes quand elles ne le sont pas.\r\n\r\nLes bananes constituent un élément essentiel du régime alimentaire dans certaines régions, comme en Ouganda, qui offrirait une cinquantaine de variétés de ce fruit. '),
(2, 'orange', 'orange', 'brésil', '2.78', 1, 'L’orange ou orange douce est le fruit de l\'oranger (Citrus sinensis L.) de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride. Il existe plusieurs variétés d’oranges, classées en quatre groupes variétaux.\r\n\r\nComestible, elle est réputée pour sa grande teneur en vitamine C. C\'est le quatrième fruit le plus cultivé au monde.\r\n\r\nL’orange a donné son nom à la couleur secondaire qui, sur le cercle chromatique, prend place entre le rouge et le jaune.'),
(3, 'raisin', 'violet', 'france', '5.63', 1, 'Le raisin est le fruit de la vigne (Vitis). Le raisin de la vigne cultivée Vitis vinifera est un des fruits les plus cultivés au monde, avec 68 millions de tonnes produites en 2010, derrière les agrumes (124 millions), les bananes (102 millions) et les pommes (70 millions). Il se présente sous la forme de grappes composées de nombreux grains, qui sont sur le plan botanique des baies, de petite taille et de couleur claire, pour le raisin blanc (verdâtre, jaunâtre, jaune doré) ou plus foncée, pour le raisin rouge (mauve, rose ou noir-violet).\r\n\r\nIl sert surtout à la fabrication du vin à partir de son jus fermenté (on parle dans ce cas de raisin de cuve), mais il se consomme également comme fruit, soit frais, le raisin de table, soit sec, le raisin sec qui est utilisé surtout en pâtisserie ou en cuisine. On consomme également du jus de raisin. Des baies, on extrait aussi l\'huile de pépins de raisin. '),
(4, 'mangue', 'jaune', 'mexique', '8.00', 1, 'La mangue est le fruit du manguier, grand arbre tropical de la famille des Anacardiaceae, originaire des forêts d\'Inde, du Pakistan et de la Birmanie, où il pousse encore à l\'état sauvage.\r\n\r\nCet arbre, le Mangifera indica, a un feuillage persistant, dense et vert foncé.\r\n\r\nSon nom vient du tamoul : மாங்காய், māṅgāy, repris en portugais : manga.\r\n\r\nOn appelle « mangues sauvages » les fruits d\'autres arbres, appartenant au genre Irvingia (famille des Irvingiaceae) : ces fruits sont verts avec des taches noires et leur chair est d\'une belle couleur orangée et d\'un parfum exquis. ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` datetime NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `register_date`, `firstname`, `lastname`) VALUES
(1, 'a@a.a', '$2y$10$n6lutP7mltNQ61wmEOaBQ.Appr74iqL0nxrbpxwTm8mFtqA3qHMz2', '2022-01-01 12:30:00', 'Alice', 'Test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fruit`
--
ALTER TABLE `fruit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fruit`
--
ALTER TABLE `fruit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fruit`
--
ALTER TABLE `fruit`
  ADD CONSTRAINT `fruit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
