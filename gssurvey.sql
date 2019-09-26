-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2019 at 11:35 AM
-- Server version: 10.3.13-MariaDB-2
-- PHP Version: 7.3.7-2+ubuntu19.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gssurvey`
--

-- --------------------------------------------------------

--
-- Table structure for table `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`) VALUES
(18, 'Limpeza'),
(19, 'Iluminação'),
(20, 'Variedade de marcas'),
(21, 'Preço');

-- --------------------------------------------------------

--
-- Table structure for table `perguntas_setores`
--

CREATE TABLE `perguntas_setores` (
  `id` int(11) NOT NULL,
  `id_perg` int(11) NOT NULL,
  `id_set` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perguntas_setores`
--

INSERT INTO `perguntas_setores` (`id`, `id_perg`, `id_set`) VALUES
(22, 18, 11),
(23, 18, 13),
(24, 18, 14),
(25, 18, 15),
(26, 19, 11),
(27, 19, 12),
(28, 19, 13),
(29, 19, 14),
(30, 19, 15),
(31, 20, 15),
(32, 21, 11);

-- --------------------------------------------------------

--
-- Table structure for table `setores`
--

CREATE TABLE `setores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setores`
--

INSERT INTO `setores` (`id`, `nome`) VALUES
(11, 'Pet Shop'),
(12, 'Higiene Pessoal'),
(13, 'Hortifruti'),
(14, 'Açougue'),
(15, 'Adega');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perguntas_setores`
--
ALTER TABLE `perguntas_setores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_perg` (`id_perg`),
  ADD KEY `fk_set` (`id_set`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `perguntas_setores`
--
ALTER TABLE `perguntas_setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perguntas_setores`
--
ALTER TABLE `perguntas_setores`
  ADD CONSTRAINT `fk_perg` FOREIGN KEY (`id_perg`) REFERENCES `perguntas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_set` FOREIGN KEY (`id_set`) REFERENCES `setores` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
