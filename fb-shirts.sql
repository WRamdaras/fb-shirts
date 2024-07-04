-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 mrt 2024 om 19:29
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fb-shirts`
--
CREATE DATABASE IF NOT EXISTS `fb-shirts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fb-shirts`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `description`) VALUES
(1, 'New Shirts', 'new-shirts.jpg', 'Shirts of this season'),
(2, 'Classic Shirts', 'old-shirts.jpg', 'Classic and old shirts'),
(3, 'Signed Shirts', 'signed-shirts.jpg', 'Authentic shirts that are signed'),
(4, 'Player Worn Shirts', 'pws.jpg', 'Shirts that are match worn');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240216105956', '2024-02-16 12:00:05', 38),
('DoctrineMigrations\\Version20240307125123', '2024-03-07 13:51:29', 19),
('DoctrineMigrations\\Version20240307125641', '2024-03-07 13:56:47', 45),
('DoctrineMigrations\\Version20240314130136', '2024-03-14 14:01:44', 8),
('DoctrineMigrations\\Version20240322075615', '2024-03-22 08:56:21', 22),
('DoctrineMigrations\\Version20240322081142', '2024-03-22 09:11:46', 47),
('DoctrineMigrations\\Version20240322081351', '2024-03-22 09:13:54', 7),
('DoctrineMigrations\\Version20240322081546', '2024-03-22 09:15:51', 5),
('DoctrineMigrations\\Version20240322081649', '2024-03-22 09:16:52', 45),
('DoctrineMigrations\\Version20240322081951', '2024-03-22 09:19:54', 16),
('DoctrineMigrations\\Version20240322090421', '2024-03-22 10:04:26', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `shirts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`id`, `name`, `last_name`, `adress`, `zip_code`, `mail`, `phone_number`, `shirts_id`) VALUES
(8, 'test', 'test', 'test straat 1', '1010AB', 'test@gmail.com', '06123456789', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shirts`
--

DROP TABLE IF EXISTS `shirts`;
CREATE TABLE `shirts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `shirts`
--

INSERT INTO `shirts` (`id`, `name`, `price`, `description`, `size`, `category_id`, `img`) VALUES
(1, 'Ajax', 50.00, 'Ajax 23/24', 'l', 1, 'ajax.jpg'),
(2, 'FC Barcelona', 50.00, 'FC Barcelona 23/24', 'l', 1, 'fcb-24.jpg'),
(3, 'Juventus', 100.00, 'Juventus 2011/12', 'l', 2, 'juventus.jpg'),
(4, 'Manchester United', 100.00, 'Manchester united 93/94', 'l', 2, 'man-united.jpg'),
(7, 'Inter Miami', 90.00, 'Inter Miami 23/24', 'M', 1, 'inter-miami.jpg'),
(8, 'FC Bayern Munchen', 50.00, 'FC Bayern Munchen 23/24', 'm', 1, 'bayern.jpg'),
(9, 'Arsenal', 50.00, 'Arsenal 92/93', 'm', 2, 'arsenal.jpg'),
(10, 'Brazil', 100.00, 'Brazil 1970 World Cup', 'M', 2, 'brazil.jpg'),
(11, 'Lionel Messi', 100.00, 'Signed Barcelona shirt', 'M', 3, 'messi.jpg'),
(12, 'Cristiano Ronaldo', 100.00, 'Signed Real Madrid shirt', 'M', 3, 'cr7.jpg'),
(13, 'Diego Maradona', 100.00, 'Signed Diego Maradona shirt', 'M', 3, 'dm.jpg'),
(14, 'Pele', 100.00, 'Signed Pele shirt', 'M', 3, 'pele.jpg'),
(15, 'Neymar', 100.00, 'Neymar match worn', 'M', 4, 'neymar.jpg'),
(16, 'Andres Iniesta', 100.00, 'Andres Iniesta match worn', 'M', 4, 'iniesta.jpg'),
(17, 'David Beckham', 100.00, 'David Beckham match worn', 'M', 4, 'beckham.jpg'),
(18, 'Zinedine Zidane', 100.00, 'Zinedine Zidane match worn', 'M', 4, 'zidane.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexen voor tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F52993989835A013` (`shirts_id`);

--
-- Indexen voor tabel `shirts`
--
ALTER TABLE `shirts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6327A8312469DE2` (`category_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `shirts`
--
ALTER TABLE `shirts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F52993989835A013` FOREIGN KEY (`shirts_id`) REFERENCES `shirts` (`id`);

--
-- Beperkingen voor tabel `shirts`
--
ALTER TABLE `shirts`
  ADD CONSTRAINT `FK_6327A8312469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
