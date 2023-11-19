-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Nov 2023 um 22:21
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `handgemachteschaetze`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artists`
--

CREATE TABLE `artists` (
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `artists`
--

INSERT INTO `artists` (`name`, `email`, `date_of_birth`) VALUES
('Anna Schmidt', 'anna@example.com', '1985-12-10'),
('Ava Clark', 'ava@example.com', '1994-03-19'),
('Benjamin Walker', 'benjamin@example.com', '1981-08-29'),
('Bruce Wayne', 'bruce.wayne@gmail.com', '2023-11-08'),
('Chloe Adams', 'chloe@example.com', '1990-01-08'),
('Christopher Robinson', 'christopher@example.com', '1987-04-17'),
('Daniel Lee', 'daniel@example.com', '1991-08-09'),
('David Johnson', 'david@example.com', '1982-06-14'),
('Dennis Schröder', 'dennis.schroeder@gmail.com', '1985-06-11'),
('Emily Brown', 'emily@example.com', '1993-04-21'),
('Emma Davis', 'emma@example.com', '1998-01-03'),
('Franz Wagner', 'franz.wagner@gmail.com', '2023-12-08'),
('Hans Peter', 'hans.peter@gmail.com', '2023-11-24'),
('James Harris', 'james@example.com', '1983-12-05'),
('John Doe', 'john@example.com', '1995-07-25'),
('Laura Wilson', 'laura@example.com', '1997-11-30'),
('Lebron James', 'lebron.james@gmail.com', '1985-06-11'),
('Luka Doncic', 'luka.doncic@gmail.com', '1985-06-11'),
('Matthew Taylor', 'matthew@example.com', '1984-07-12'),
('Max Mustermann', 'max@example.com', '1990-05-15'),
('Mia Martinez', 'mia@example.com', '1999-06-26'),
('Michael Smith', 'michael@example.com', '1992-09-18'),
('Micheal Jordan', 'micheal.jordan@gmail.com', '2023-11-13'),
('Olivia Jones', 'olivia@example.com', '1986-02-28'),
('Sarah Miller', 'sarah@example.com', '1988-03-02'),
('Sophia Hall', 'sophia@example.com', '1989-09-23'),
('Stephen Curry', 'stephen.curry@gmail.com', '1985-06-11'),
('William White', 'william@example.com', '1996-10-07');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_position`
--

CREATE TABLE `order_position` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(60) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `artist_name` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `pname`, `description`, `img_path`, `price`, `artist_name`, `category`, `available`) VALUES
(2, 'Glitzernde Saphir-Halskette', 'Eine atemberaubende Halskette mit glitzernden Saphiren.', 'saphirhalskette.jpg', 1500, 'Max Mustermann', 'Schmuck', 1),
(3, 'Kunstvolle Batik-Tischdecke', 'Handgefertigte Tischdecke mit einzigartigem Batikmuster.', 'batik_tischdecke.jpg', 80, 'Max Mustermann', 'Textil', 1),
(4, 'Abstrakte Gemälde-Serie', 'Eine Serie abstrakter Kunstwerke auf Leinwand in verschiedenen Größen.', NULL, 500, 'Max Mustermann', 'Kunst', 1),
(5, 'Diamantbesetzter Goldring', 'Ein luxuriöser Goldring mit Diamanten für besondere Anlässe.', 'diamantgoldring.jfif', 2500, 'Max Mustermann', 'Schmuck', 1),
(6, 'Handgewebter Alpakaschal', 'Wärmender und weicher Schal aus Alpakawolle für den Winter.', 'alpakaschal.jfif', 120, 'Max Mustermann', 'Textil', 1),
(7, 'Elegante Perlmutt-Ohrringe', 'Wunderschöne Ohrringe mit Perlmutt und Silberdetails.', 'perlmutohrring.jfif', 350, 'Anna Schmidt', 'Schmuck', 1),
(8, 'Handgefertigte Patchwork-Decke', 'Einzigartige Patchwork-Decke aus recycelten Stoffen.', 'patchworkdecke.jfif', 120, 'Anna Schmidt', 'Textil', 1),
(9, 'Aquarell-Bilderzyklus', 'Ein Zyklus von Aquarellbildern, die die Natur darstellen.', 'bilderzyklus.jpg', 300, 'Anna Schmidt', 'Kunst', 1),
(10, 'Smaragd und Diamant-Armband', 'Ein Armband mit Smaragden und Diamanten für besondere Anlässe.', 'smaragddiamantarm.jfif', 1800, 'Anna Schmidt', 'Schmuck', 1),
(11, 'Samtige Sammlerstücke', 'Sammlerstücke aus Samt in verschiedenen Formen und Farben.', NULL, 90, 'Anna Schmidt', 'Kunst', 1),
(12, 'Glänzende Opal-Ohrringe', 'Elegante Ohrringe mit schimmernden Opalen und Silberfassung.', NULL, 400, 'Ava Clark', 'Schmuck', 1),
(13, 'Handgestrickter Wollpullover', 'Gemütlicher Pullover aus handgestrickter Wolle in verschiedenen Farben.', NULL, 80, 'Ava Clark', 'Textil', 1),
(14, 'Abstrakte Acrylgemälde', 'Moderne abstrakte Kunstwerke auf Leinwand, die die Fantasie anregen.', NULL, 350, 'Ava Clark', 'Kunst', 1),
(15, 'Diamantverzierter Anhänger', 'Ein edler Anhänger mit Diamanten und Goldkette für besondere Anlässe.', NULL, 1200, 'Ava Clark', 'Schmuck', 1),
(16, 'Vintage-Seidenkimonos', 'Sammlung von Vintage-Seidenkimonos in verschiedenen Designs.', NULL, 150, 'Ava Clark', 'Textil', 1),
(17, 'Mystischer Amethyst-Ring', 'Ein einzigartiger Ring mit einem großen Amethyst-Edelstein.', NULL, 650, 'Benjamin Walker', 'Schmuck', 1),
(18, 'Handgewebter Alpakapullover', 'Warm und weich: Ein Pullover aus handgewebter Alpakawolle.', NULL, 120, 'Benjamin Walker', 'Textil', 1),
(19, 'Abstrakte Metallskulptur', 'Moderne Metallskulptur, die die Vorstellungskraft anregt.', NULL, 480, 'Benjamin Walker', 'Kunst', 1),
(20, 'Diamantbesetzte Goldohrringe', 'Elegante Goldohrringe mit funkelnden Diamanten.', NULL, 850, 'Benjamin Walker', 'Schmuck', 1),
(21, 'Kunstvolle Seidenmalerei', 'Einzigartiges Kunstwerk auf Seide, handgemalt und signiert.', NULL, 300, 'Benjamin Walker', 'Kunst', 1),
(22, 'Zarte Perlenohrringe', 'Elegante Ohrringe mit zarten Perlen und Silberfassung.', NULL, 350, 'Chloe Adams', 'Schmuck', 1),
(23, 'Handgewebter Baumwollteppich', 'Ein kunstvoll handgewebter Teppich aus hochwertiger Baumwolle.', NULL, 120, 'Chloe Adams', 'Textil', 1),
(24, 'Moderne Acrylgemälde', 'Moderne Acrylgemälde in verschiedenen Stilen und Farben.', NULL, 400, 'Chloe Adams', 'Kunst', 1),
(25, 'Smaragd und Rubin-Ring', 'Ein edler Ring mit Smaragden, Rubinen und Diamanten.', 'smaragdrubin.jfif', 1200, 'Chloe Adams', 'Schmuck', 1),
(26, 'Handbemalte Seidenkimonos', 'Einzigartige Seidenkimonos, handbemalt und von Hand gefertigt.', NULL, 180, 'Chloe Adams', 'Textil', 1),
(27, 'Opulent verzierte Perlenkette', 'Eine opulent verzierte Perlenkette in antikem Stil.', NULL, 850, 'Christopher Robinson', 'Kunst', 1),
(28, 'Handgefertigter Kaschmirschal', 'Ein handgefertigter Kaschmirschal in warmen Farbtönen.', NULL, 180, 'Christopher Robinson', 'Textil', 1),
(29, 'Abstrakte Skulptur aus Metall', 'Moderne abstrakte Skulptur aus Metall, die die Sinne anspricht.', NULL, 550, 'Christopher Robinson', 'Kunst', 1),
(30, 'Diamantbesetzte Goldohrringe', 'Elegante Goldohrringe mit funkelnden Diamanten.', NULL, 1200, 'Christopher Robinson', 'Schmuck', 1),
(31, 'Künstlerische Leinwandgemälde', 'Eine Sammlung künstlerischer Leinwandgemälde in verschiedenen Stilen.', NULL, 350, 'Christopher Robinson', 'Kunst', 1),
(32, 'Eleganter Diamantring', 'Ein eleganter Diamantring in 18-karätigem Weißgold.', NULL, 1200, 'Daniel Lee', 'Schmuck', 1),
(33, 'Handgestrickter Wollschal', 'Gemütlicher handgestrickter Wollschal in verschiedenen Farben.', NULL, 80, 'Daniel Lee', 'Textil', 1),
(34, 'Abstraktes Ölgemälde', 'Ein abstraktes Ölgemälde mit lebendigen Farben und dynamischem Pinselstrich.', NULL, 450, 'Daniel Lee', 'Kunst', 1),
(35, 'Smaragd und Perlenhalskette', 'Eine luxuriöse Halskette mit Smaragden und Perlen in einer einzigartigen Komposition.', NULL, 950, 'Daniel Lee', 'Schmuck', 1),
(36, 'Kunstvolle Tapisserie', 'Eine kunstvolle Tapisserie mit aufwendigen Details und handgefertigten Elementen.', NULL, 300, 'Daniel Lee', 'Textil', 1),
(37, 'Elegante Perlenhalskette', 'Wunderschöne Halskette mit hochwertigen Perlen und Silberverschluss.', NULL, 450, 'David Johnson', 'Schmuck', 1),
(38, 'Handgewebter Seidenschal', 'Einzigartiger handgewebter Seidenschal in verschiedenen Farbtönen.', NULL, 90, 'David Johnson', 'Textil', 1),
(39, 'Moderne Acrylmalerei', 'Abstrakte Acrylmalerei auf Leinwand in lebendigen Farben.', NULL, 350, 'David Johnson', 'Kunst', 1),
(40, 'Diamantbesetzte Goldohrringe', 'Elegante Goldohrringe mit funkelnden Diamanten.', NULL, 1200, 'David Johnson', 'Schmuck', 1),
(41, 'Künstlerische Textilskulptur', 'Eine textile Skulptur, die Kunst und Handwerk vereint.', NULL, 280, 'David Johnson', 'Kunst', 1),
(42, 'Schmuckset mit Saphiren', 'Ein komplettes Schmuckset mit Saphiren und passenden Ohrringen.', NULL, 800, 'Emily Brown', 'Kunst', 1),
(43, 'Handgestrickte Wollmütze', 'Gemütliche handgestrickte Wollmütze in verschiedenen Designs.', NULL, 40, 'Emily Brown', 'Textil', 1),
(44, 'Realistisches Ölgemälde', 'Ein realistisches Ölgemälde mit feinen Details und lebensechten Motiven.', NULL, 700, 'Emily Brown', 'Kunst', 1),
(45, 'Tansanit-Ring in Weißgold', 'Ein eleganter Tansanit-Ring in Weißgold mit Diamanten.', NULL, 1500, 'Emily Brown', 'Schmuck', 1),
(46, 'Kunstvolle Batik-Decke', 'Eine kunstvolle Batik-Decke in warmen Farbtönen.', NULL, 120, 'Emily Brown', 'Textil', 1),
(47, 'Eleganter Smaragdanhänger', 'Ein eleganter Smaragdanhänger mit Goldkette für besondere Anlässe.', NULL, 800, 'Emma Davis', 'Schmuck', 1),
(48, 'Handgewebter Alpakapullover', 'Gemütlicher handgewebter Alpakapullover für kalte Tage.', NULL, 120, 'Emma Davis', 'Textil', 1),
(49, 'Abstrakte Holzskulptur', 'Moderne abstrakte Holzskulptur in organischen Formen.', NULL, 450, 'Emma Davis', 'Kunst', 1),
(50, 'Saphir und Diamant-Ring', 'Ein luxuriöser Saphir und Diamant-Ring mit Platinfassung.', NULL, 2200, 'Emma Davis', 'Schmuck', 1),
(51, 'Kunstvolles Textilkunstwerk', 'Ein kunstvolles Textilkunstwerk in handgefertigter Technik.', NULL, 180, 'Emma Davis', 'Kunst', 1),
(52, 'Kreatives Acrylgemälde', 'Ein kreatives Acrylgemälde mit spielerischen Farbkombinationen.', NULL, 300, 'James Harris', 'Kunst', 1),
(53, 'Handgefertigte Leinwandtasche', 'Einzigartige handgefertigte Leinwandtasche mit Kunstmotiv.', NULL, 60, 'James Harris', 'Kunst', 1),
(54, 'Abstrakte Skulptur aus Metall', 'Moderne abstrakte Skulptur aus Metall, die die Sinne anspricht.', NULL, 550, 'James Harris', 'Kunst', 1),
(55, 'Diamantbesetzte Goldkette', 'Eine elegante Goldkette mit Diamanten für besondere Anlässe.', NULL, 1400, 'James Harris', 'Kunst', 1),
(56, 'Künstlerisches Batikgewebe', 'Ein künstlerisches Batikgewebe mit traditionellem Muster.', NULL, 70, 'James Harris', 'Kunst', 1),
(57, 'Eleganter Rubinring', 'Ein eleganter Rubinring in 18-karätigem Weißgold.', NULL, 1200, 'John Doe', 'Schmuck', 1),
(58, 'Handgewebter Alpakaschal', 'Gemütlicher handgewebter Alpakaschal für kalte Tage.', NULL, 120, 'John Doe', 'Textil', 1),
(59, 'Abstrakte Acrylmalerei', 'Moderne abstrakte Acrylmalerei in lebendigen Farben.', NULL, 350, 'John Doe', 'Kunst', 1),
(60, 'Diamantbesetzte Goldohrringe', 'Elegante Goldohrringe mit funkelnden Diamanten.', NULL, 1200, 'John Doe', 'Schmuck', 1),
(61, 'Künstlerische Textilskulptur', 'Eine künstlerische Textilskulptur, die die Fantasie anregt.', NULL, 280, 'John Doe', 'Kunst', 1),
(62, 'Perlen und Diamanthalskette', 'Eine luxuriöse Halskette mit Perlen und Diamanten in Gold.', NULL, 850, 'Laura Wilson', 'Schmuck', 1),
(63, 'Handgestrickter Wollpullover', 'Gemütlicher handgestrickter Wollpullover in verschiedenen Farben.', NULL, 90, 'Laura Wilson', 'Textil', 1),
(64, 'Moderne Leinwandkunst', 'Moderne Leinwandkunst in verschiedenen Stilen und Größen.', NULL, 400, 'Laura Wilson', 'Kunst', 1),
(65, 'Saphir und Smaragdring', 'Ein eleganter Ring mit Saphiren und Smaragden in Weißgold.', NULL, 1800, 'Laura Wilson', 'Schmuck', 1),
(66, 'Handgefertigte Batiktasche', 'Handgefertigte Batiktasche in lebendigen Farben und Mustern.', NULL, 60, 'Laura Wilson', 'Kunst', 1),
(67, 'Abstrakte Holzskulptur', 'Moderne abstrakte Holzskulptur in organischen Formen.', NULL, 550, 'Matthew Taylor', 'Kunst', 1),
(68, 'Handgewebte Teppiche', 'Eine Sammlung handgewebter Teppiche in verschiedenen Designs.', NULL, 300, 'Matthew Taylor', 'Textil', 1),
(69, 'Kunstvolle Metallskulptur', 'Eine kunstvolle Metallskulptur in innovativem Design.', NULL, 700, 'Matthew Taylor', 'Kunst', 1),
(70, 'Diamantbesetzte Goldkette', 'Eine elegante Goldkette mit funkelnden Diamanten für besondere Anlässe.', NULL, 1400, 'Matthew Taylor', 'Kunst', 1),
(71, 'Kunstvolles Batikgewebe', 'Kunstvolles Batikgewebe mit handgefertigten Details.', NULL, 180, 'Matthew Taylor', 'Kunst', 1),
(72, 'Goldener Anhänger', 'Ein wunderschöner goldener Anhänger mit einem funkelnden Diamanten.', NULL, 500, 'William White', 'Schmuck', 1),
(73, 'Seidenkleid', 'Ein elegantes Seidenkleid in Smaragdgrün, perfekt für besondere Anlässe.', NULL, 250, 'William White', 'Textil', 1),
(74, 'Ölgemälde \"Abstrakte Träume\"', 'Ein faszinierendes abstraktes Ölgemälde, das die Vorstellungskraft anregt.', NULL, 800, 'William White', 'Kunst', 1),
(75, 'Silberarmband', 'Ein filigranes Silberarmband mit kunstvollen Verzierungen.', NULL, 150, 'William White', 'Schmuck', 1),
(76, 'Keramikskulptur \"Harmonie\"', 'Eine einzigartige Keramikskulptur, die die Harmonie der Natur einfängt.', NULL, 350, 'William White', 'Kunst', 1),
(77, 'Diamantring \"Ewige Eleganz\"', 'Ein atemberaubender Diamantring, der zeitlose Eleganz verkörpert.', NULL, 2000, 'Sophia Hall', 'Schmuck', 1),
(78, 'Seidenschal \"Federleicht\"', 'Ein luxuriöser Seidenschal mit einem federleichten Muster, perfekt für jede Jahreszeit.', NULL, 180, 'Sophia Hall', 'Textil', 1),
(79, 'Acrylgemälde \"Schmetterlingsflügel\"', 'Ein farbenfrohes Acrylgemälde, das die Schönheit von Schmetterlingsflügeln einfängt.', NULL, 450, 'Sophia Hall', 'Kunst', 1),
(80, 'Perlenohrringe \"Ozeanträume\"', 'Zarte Perlenohrringe, die an die Farben des Ozeans erinnern.', NULL, 350, 'Sophia Hall', 'Schmuck', 1),
(81, 'Keramikskulptur \"Abstrakte Formen\"', 'Eine einzigartige Keramikskulptur, die abstrakte Formen und Strukturen darstellt.', NULL, 300, 'Sophia Hall', 'Kunst', 1),
(82, 'Opulent Opal-Anhänger', 'Ein opulenter Anhänger mit einem schillernden Opal, der die Blicke auf sich zieht.', NULL, 750, 'Sarah Miller', 'Schmuck', 1),
(83, 'Samt-Abendkleid \"Mitternachtszauber\"', 'Ein elegantes Samt-Abendkleid in tiefem Mitternachtsblau für besondere Anlässe.', NULL, 320, 'Sarah Miller', 'Textil', 1),
(84, 'Aquarellgemälde \"Waldgeheimnisse\"', 'Ein bezauberndes Aquarellgemälde, das die Geheimnisse eines verzauberten Waldes zeigt.', NULL, 550, 'Sarah Miller', 'Kunst', 1),
(85, 'Perlenarmreif \"Elegante Perlenspirale\"', 'Ein handgefertigter Armreif aus Perlen in einer eleganten Spiralenform.', NULL, 180, 'Sarah Miller', 'Schmuck', 1),
(86, 'Bronze-Skulptur \"Freiheitsflamme\"', 'Eine beeindruckende Bronze-Skulptur, die die Flamme der Freiheit darstellt.', NULL, 680, 'Sarah Miller', 'Kunst', 1),
(87, 'Saphir und Diamant-Armband', 'Ein exquisites Armband aus Saphiren und Diamanten, handgefertigt für Eleganz.', NULL, 1200, 'Olivia Jones', 'Schmuck', 1),
(88, 'Kaschmir-Wolldecke \"Himalaya-Träume\"', 'Eine luxuriöse Kaschmir-Wolldecke, die Wärme und Eleganz in Ihr Zuhause bringt.', NULL, 350, 'Olivia Jones', 'Textil', 1),
(89, 'Skulptur \"Der Tanz der Elemente\"', 'Eine faszinierende Skulptur, die den Tanz der Elemente in abstrakter Form darstellt.', NULL, 800, 'Olivia Jones', 'Kunst', 1),
(90, 'Perlmutt-Ohrringe \"Mondlichtglanz\"', 'Elegante Ohrringe aus Perlmutt, inspiriert vom Glanz des Mondlichts auf Wasser.', NULL, 250, 'Olivia Jones', 'Schmuck', 1),
(91, 'Batik-Tischdecke \"Tropische Vibes\"', 'Eine farbenfrohe Batik-Tischdecke, die tropische Vibes in Ihre Mahlzeiten bringt.', NULL, 65, 'Olivia Jones', 'Textil', 1),
(92, 'Diamant-Herzanhänger \"Ewige Liebe\"', 'Ein glänzender Diamant-Herzanhänger, der die ewige Liebe symbolisiert.', NULL, 800, 'Michael Smith', 'Schmuck', 1),
(93, 'Kaschmir-Schal \"Himalaya-Wärme\"', 'Ein luxuriöser Kaschmir-Schal, der Wärme und Eleganz verbindet.', NULL, 300, 'Michael Smith', 'Textil', 1),
(94, 'Ölgemälde \"Traumlandschaft\"', 'Ein beeindruckendes Ölgemälde, das eine verträumte Landschaft in lebendigen Farben darstellt.', NULL, 600, 'Michael Smith', 'Kunst', 1),
(95, 'Smaragd-Ring \"Grüne Eleganz\"', 'Ein eleganter Smaragd-Ring, der die Schönheit des Smaragdgrüns einfängt.', NULL, 450, 'Michael Smith', 'Schmuck', 1),
(96, 'Batik-Tapisserie \"Tropische Oase\"', 'Eine farbenfrohe Batik-Tapisserie, die eine exotische tropische Oase zeigt.', NULL, 150, 'Michael Smith', 'Textil', 1),
(97, 'Smaragd-Halskette \"Ewige Eleganz\"', 'Eine elegante Halskette mit einem glänzenden Smaragd, die zeitlose Eleganz verkörpert.', NULL, 950, 'Mia Martinez', 'Schmuck', 1),
(98, 'Samt-Kissen \"Königliche Gemütlichkeit\"', 'Ein luxuriöses Samt-Kissen, das königliche Gemütlichkeit in Ihr Zuhause bringt.', NULL, 50, 'Mia Martinez', 'Textil', 1),
(99, 'Aquarellgemälde \"Abstrakte Welten\"', 'Ein faszinierendes Aquarellgemälde, das abstrakte Welten in lebendigen Farben zeigt.', NULL, 700, 'Mia Martinez', 'Kunst', 1),
(100, 'Perlmutt-Ohrringe \"Mondstrahlen\"', 'Elegante Ohrringe aus Perlmutt, inspiriert von den sanften Strahlen des Mondes.', NULL, 120, 'Mia Martinez', 'Schmuck', 1),
(101, 'Seidenmalerei \"Tropische Träume\"', 'Eine farbenfrohe Seidenmalerei, die exotische tropische Träume festhält.', NULL, 220, 'Mia Martinez', 'Kunst', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`name`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `order_position`
--
ALTER TABLE `order_position`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
