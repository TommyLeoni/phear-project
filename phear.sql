-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Apr 2019 um 14:11
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `phear`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`pid`, `post`, `uid_FK`) VALUES
(14, 'Grüss dich Bruder', 31),
(17, 'greetings fellas', 33),
(18, 'oha 1 nice Konversation hier auf diesem Bhirne', 32);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geburtsdatum` date NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `geburtsdatum`, `bio`, `passwort`, `name`) VALUES
(31, 'jouniw', 'jouniw@gmx.ch', '0000-00-00', 'Click on the edit-button to edit your bio and everything else about your profile.', '$2y$10$OeXc9BoEnA75F0T1QMYZUuhYw7Uep1aa/bNLC.mp6tyxXJJbg2.E6', 'Jouni Wüthrich'),
(32, 'Tommy', 'tomasoleoni011@gmail.com', '2002-09-29', 'Click on the edit-button to edit your bio and everything else about your profile.', '$2y$10$KAVh7oZCuhjkpjeDUYUjxu8NdXBPT7gY6CjZdX9CPmTrJI.mDEiBG', 'Tomaso Leoni'),
(33, 'tester', 'tester@test.de', '1785-05-16', 'Click on the edit-button to edit your bio and everything else about your profile.', '$2y$10$jg0ofK7dbHOwidnPOeGyauiCMbahyBag8KLkNGKpoSNX6e8HdviXa', 'Der Tester');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `post_ibfk_1` (`uid_FK`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`uid_FK`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
