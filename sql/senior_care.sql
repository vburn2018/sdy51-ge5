-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Μάη 2019 στις 23:25:08
-- Έκδοση διακομιστή: 10.1.35-MariaDB
-- Έκδοση PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `senior_care`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `reminder`
--

CREATE TABLE `reminder` (
  `id_reminder` smallint(5) NOT NULL,
  `id_user` smallint(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `start_date` text NOT NULL,
  `repetition` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `reminder`
--

INSERT INTO `reminder` (`id_reminder`, `id_user`, `title`, `message`, `start_date`, `repetition`) VALUES
(1, 1, 'Επίσκεψη στο γιατρό', 'Σε 1 ώρα από τώρα', '18-04-2019 12:00', '0000000'),
(3, 1, 'Χάπι για την πίεση', 'Το χάπι είναι το κόκκινο', '14-04-2019 12:00', '0100100'),
(5, 1, 'Γενέθλια Μαρίας', 'Το τηλέφωνο είναι 12345678', '15-04-2019', '0000000'),
(6, 1, 'Τηλέφωνο στον Κώστα', 'Το νούμερο είναι 1234567', '12:00', '0000101'),
(10, 1, 'vvvvvvvvvvv', 'bbbbbbbbbbbbb', '2019-05-09 02:02', '1111111'),
(12, 1, 'lllllllllllll', 'gggggggggggggggggg', '2019-05-10T00:27', '0000000'),
(13, 1, 'WWWWWWWWWWWWWw', 'SSSSSSSSSSSSs', '2019-05-09 02:44', '0000000'),
(14, 1, 'fxdfxd', 'fxdfdx', '2019-05-14 23:19', '0000000'),
(15, 1, 'qqqqqqqqqqqqqqq', 'qqqqqqq', '2019-05-14 23:24', '0000000'),
(16, 1, 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaa', '2019-05-14 23:45', '0000000'),
(17, 1, 'tttttttttttt', 'tttttt', '2019-05-14 23:49', '0000000'),
(18, 1, 'rrrrrrrr', 'rrrrrr', '2019-05-14 23:53', '0000000'),
(19, 1, 'hggggggggggg', 'ggggggg', '2019-05-14 23:59', '0000000'),
(20, 1, 'gfggfg', 'fgdg', '2019-05-15 00:13', '0000000');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(1) NOT NULL,
  `role_descr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `role`
--

INSERT INTO `role` (`id_role`, `role_descr`) VALUES
(1, 'Χρήστης'),
(2, 'Φροντιστής'),
(3, 'Φορέας'),
(4, 'Διαχειριστής');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `service`
--

CREATE TABLE `service` (
  `id_service` smallint(5) NOT NULL,
  `id_user` smallint(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `service`
--

INSERT INTO `service` (`id_service`, `id_user`, `title`, `description`, `address`, `phone`) VALUES
(2, 1, 'ΚΑΠΗ', 'Α\' ΚΑΠΗ ΚΗΦΙΣΙΑΣ', 'ΑΓ. ΠΑΡΑΣΚΕΥΗΣ 57, ΚΗΦΙΣΙΑ', '210 8080108'),
(3, 1, 'ΚΑΠΗ', 'Β\' ΚΑΠΗ ΚΗΦΙΣΙΑΣ', 'ΑΓ.ΤΡΥΦΩΝΟΣ & ΚΑΡΠΑΘΟΥ, ΚΗΦΙΣΙΑ', '210 8013820'),
(4, 5, 'ΚΑΠΗ', 'ΚΑΠΗ Ν.ΕΡΥΘΡΑΙΑΣ', 'Κ.ΒΑΡΝΑΛΗ 58, Ν.ΕΡΥΘΡΑΙΑ', '210 6205006'),
(5, 1, 'Βοήθεια στο σπίτι', 'Δήμος Θεσσαλονίκης', 'Καρακάση 1', ' 2310 300261'),
(6, 1, 'Βοήθεια στο σπίτι', 'Δήμος Αθηναίων - ΝΕΟΣ ΚΟΣΜΟΣ', 'ΣΩΣΤΡΑΤΟΥ 5', '210 9231466'),
(7, 1, 'Βοήθεια στο σπίτι', 'Δήμος Αθηναίων - ΒΟΤΑΝΙΚΟΣ', 'ΚΟΖΑΝΗΣ 4', '210 3423716'),
(8, 1, 'Ηλεκτρονική Συνταγογράφηση', 'On-Line Ηλεκτρονική Συνταγογράφηση', 'https://www.e-prescription.gr', '11131');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `id_user` smallint(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_role` tinyint(2) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(40) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telephone` varchar(15) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `email`, `fname`, `lname`, `birthdate`, `city`, `address`, `creationdate`, `telephone`, `activated`) VALUES
(1, 'admin', '123', 1, 'fadffsd@FSAE', 'v', 'burn', NULL, NULL, '', '2019-04-07 00:27:35', NULL, 1),
(2, 'aa', 'aa', 3, 'aa@aa', 'aa', 'aa', NULL, NULL, '', '2019-04-07 02:06:59', NULL, 0),
(3, 'fsdf', '123', 1, 'rr@rr', 'rr', 'rr', NULL, NULL, '', '2019-04-07 02:10:27', NULL, 1),
(4, 'ee', 'ee', 2, 'ee@ee', 'ee', 'ee', NULL, NULL, '', '2019-04-07 02:11:09', NULL, 0),
(5, 'vburn', '123', 1, 'vburn@hotmail.com', 'Βασίλης', 'Μπουρνούτος', NULL, NULL, '', '2019-05-16 23:36:35', NULL, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_service_call`
--

CREATE TABLE `user_service_call` (
  `id_user` smallint(5) NOT NULL,
  `id_service` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `user_service_call`
--

INSERT INTO `user_service_call` (`id_user`, `id_service`) VALUES
(1, 5),
(1, 5),
(1, 5),
(1, 5),
(1, 5),
(1, 5),
(1, 2),
(1, 4),
(1, 3),
(1, 5),
(1, 7),
(1, 7),
(1, 7),
(1, 5),
(1, 6),
(1, 2),
(1, 2),
(1, 5),
(1, 5),
(1, 7),
(1, 8),
(1, 7),
(1, 5),
(1, 5),
(1, 5),
(1, 5),
(1, 7),
(1, 6),
(1, 5),
(1, 5),
(1, 7),
(1, 5),
(1, 5),
(1, 6),
(1, 5),
(1, 6),
(1, 4),
(1, 4),
(1, 4),
(1, 6),
(1, 4),
(1, 5),
(1, 5),
(1, 4),
(1, 4),
(1, 7),
(1, 8),
(1, 4),
(1, 5),
(5, 4),
(5, 4);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id_reminder`);

--
-- Ευρετήρια για πίνακα `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Ευρετήρια για πίνακα `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id_reminder` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT για πίνακα `service`
--
ALTER TABLE `service`
  MODIFY `id_service` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
