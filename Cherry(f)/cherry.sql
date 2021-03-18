-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 16, 2020 la 11:08 AM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cherry`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `participants`
--

CREATE TABLE `participants` (
  `part_id` int(11) NOT NULL,
  `part_fullname` varchar(128) NOT NULL,
  `part_age` int(11) NOT NULL,
  `part_student` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `participants`
--

INSERT INTO `participants` (`part_id`, `part_fullname`, `part_age`, `part_student`) VALUES
(1, 'Raymond Boberly', 21, '2'),
(2, 'Raymond Boberly', 21, '2'),
(3, 'daiana', 23, '1'),
(4, 'bbbbbbbbbbbbbbbbbbbbbbb', 2, '2'),
(5, 'Raymond Borbely', 21, '1'),
(6, 'Raymond Borbely', 21, '1'),
(7, 'Beatrice Blidariu', 21, '0');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `responses`
--

CREATE TABLE `responses` (
  `resp_id` int(11) NOT NULL,
  `resp_part_id` int(11) NOT NULL,
  `resp_product` varchar(100) NOT NULL,
  `resp_how_purchased` varchar(50) NOT NULL,
  `resp_satisfied` int(11) NOT NULL,
  `resp_recommend` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `responses`
--

INSERT INTO `responses` (`resp_id`, `resp_part_id`, `resp_product`, `resp_how_purchased`, `resp_satisfied`, `resp_recommend`) VALUES
(1, 1, 'Desktop Computer', 'Online', 1, 'Maybe'),
(2, 2, 'Desktop Computer', 'Online', 1, 'Maybe'),
(3, 3, 'Home Phone', 'Online', 4, 'Yes'),
(4, 4, 'Tort aniversar', 'Online', 1, 'Nu'),
(5, 5, 'Cheese cake', 'Prin mail', 4, 'Poate'),
(6, 6, 'Cheese cake', 'Prin mail', 4, 'Poate'),
(7, 7, 'Cheese cake', 'Prin mail', 3, 'Da');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(6, 'Raymond Borbely', 'raymond@outlook.com', '$2y$10$/JxbjSiWTYcZiICZPz3frekVQP2FgC/1WL4Rf51S4Ir9cZNW3E9IO');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexuri pentru tabele `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`resp_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `participants`
--
ALTER TABLE `participants`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `responses`
--
ALTER TABLE `responses`
  MODIFY `resp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
