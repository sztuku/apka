-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Kwi 2019, 16:54
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lista`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `idzamowienia`
--

CREATE TABLE `idzamowienia` (
  `Id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `idzamowienia`
--

INSERT INTO `idzamowienia` (`Id`, `data`, `User_id`) VALUES
(1, '2019-03-18 21:18:43', 1),
(2, '2019-03-18 21:22:29', 1),
(3, '2019-03-18 21:23:33', 1),
(4, '2019-03-18 21:42:12', 1),
(5, '2019-03-18 21:44:21', 1),
(6, '2019-03-18 21:44:44', 1),
(7, '2019-03-18 21:45:22', 1),
(8, '2019-03-18 21:50:36', 2),
(9, '2019-03-19 13:08:18', 2),
(10, '2019-03-19 16:11:08', 3),
(11, '2019-03-19 16:15:57', 4),
(12, '2019-03-19 16:16:12', 4),
(13, '2019-03-19 16:16:17', 4),
(14, '2019-03-19 16:16:17', 4),
(15, '2019-03-19 16:16:42', 4),
(16, '2019-03-19 16:16:42', 4),
(17, '2019-03-19 16:37:35', 4),
(18, '2019-03-19 16:37:42', 4),
(19, '2019-03-19 16:37:47', 4),
(20, '2019-03-19 16:37:47', 4),
(21, '2019-03-19 16:37:47', 4),
(22, '2019-03-19 16:38:48', 4),
(23, '2019-03-19 16:39:33', 4),
(24, '2019-03-19 16:40:01', 4),
(25, '2019-03-19 16:40:01', 4),
(26, '2019-03-19 16:40:01', 4),
(27, '2019-03-19 16:40:01', 4),
(28, '2019-03-19 16:42:39', 4),
(29, '2019-03-19 16:43:39', 4),
(30, '2019-03-19 16:43:39', 4),
(31, '2019-03-19 16:43:39', 4),
(32, '2019-03-19 16:44:12', 4),
(33, '2019-03-19 16:46:14', 4),
(34, '2019-03-19 16:46:26', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista`
--

CREATE TABLE `lista` (
  `lp` int(11) NOT NULL,
  `Item` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Ilosc` int(11) NOT NULL,
  `Id_zamowienia` int(11) NOT NULL,
  `comment` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lista`
--

INSERT INTO `lista` (`lp`, `Item`, `Ilosc`, `Id_zamowienia`, `comment`, `userid`) VALUES
(1, 'asd', 1, 4, '', 1),
(2, 'asd', 1, 4, '', 1),
(3, 'asd', 1, 4, '', 1),
(4, 'sad', 1, 4, '', 1),
(5, 'asd', 1, 5, '', 1),
(6, 'asd', 1, 5, '', 1),
(7, 'asd', 1, 5, '', 1),
(8, 'sad', 1, 5, '', 1),
(9, 'asd', 1, 6, '', 1),
(10, 'asd', 1, 6, '', 1),
(11, 'asd', 1, 6, '', 1),
(12, 'sad', 1, 6, '', 1),
(13, 'asd', 1, 7, '', 1),
(14, 'asd', 1, 7, '', 1),
(15, 'asd', 1, 7, '', 1),
(16, 'sad', 1, 7, '', 1),
(17, 'asd', 1, 8, '', 2),
(18, 'ads', 1, 8, '', 2),
(19, 'asdas', 1, 10, '', 3),
(20, 'werwer', 1, 11, '', 4),
(21, 'werwer', 1, 12, '', 4),
(22, 'fg', 1, 13, '', 4),
(23, 'sfd', 1, 14, '', 4),
(24, 'chleb', 3, 15, '', 4),
(25, 'pomarancz', 2, 16, '', 4),
(26, 'asdas', 1, 17, '', 4),
(27, 'szdsfs', 4, 18, '', 4),
(28, 'adsds', 1, 19, '', 4),
(29, 'asd', 3, 20, '', 4),
(30, 'asd', 1, 21, '', 4),
(31, 'gfjhg', 1, 22, '', 4),
(32, 'gfjhg', 1, 23, '', 4),
(33, 'dfsa', 1, 24, '', 4),
(34, 'asd', 1, 25, '', 4),
(35, 'sad', 1, 26, '', 4),
(36, 'sad', 1, 27, '', 4),
(37, 'sdf', 1, 28, '', 4),
(38, 'dsaf', 1, 0, '', 4),
(39, 'ds', 1, 0, '', 4),
(40, 'sfd', 1, 29, '', 4),
(41, 'asd', 1, 30, '', 4),
(42, 'asd', 1, 31, '', 4),
(43, 'hjg', 1, 32, '', 4),
(44, 'asd', 1, 33, '', 4),
(45, 'sad', 1, 33, '', 4),
(46, 'a', 1, 34, '', 4),
(47, 'b', 1, 34, '', 4),
(48, 'c', 1, 34, '', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`Id`, `login`, `haslo`, `email`) VALUES
(1, 'admin', '2b9da5268e51a206d6de3fd29482e3db4bcb9983', 'admin@gmail.com'),
(2, 'wrednakrowa', '2b9da5268e51a206d6de3fd29482e3db4bcb9983', 'www@gmail.com'),
(3, 'wiktor', '2b9da5268e51a206d6de3fd29482e3db4bcb9983', 'wiktor@gmnail.com'),
(4, 'iwonka', '2b9da5268e51a206d6de3fd29482e3db4bcb9983', 'iwonka@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `idzamowienia`
--
ALTER TABLE `idzamowienia`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`lp`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `idzamowienia`
--
ALTER TABLE `idzamowienia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `lista`
--
ALTER TABLE `lista`
  MODIFY `lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
