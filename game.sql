-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2019 às 04:13
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `game`
--

CREATE TABLE `game` (
  `gameId` int(11) NOT NULL,
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  `word` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `game`
--

INSERT INTO `game` (`gameId`, `userId1`, `userId2`, `winner`, `word`) VALUES
(9, 2, 1, 0, 'sabao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `invite`
--

CREATE TABLE `invite` (
  `inviteId` int(11) NOT NULL,
  `PersonID_to` int(11) NOT NULL,
  `PersonID_from` int(11) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `invite`
--

INSERT INTO `invite` (`inviteId`, `PersonID_to`, `PersonID_from`, `result`) VALUES
(17, 2, 1, 'aceito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `active`) VALUES
(1, 'rafael', 1),
(2, 'roberta', 1),
(3, 'victor', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `word`
--

CREATE TABLE `word` (
  `wordId` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `word`
--

INSERT INTO `word` (`wordId`, `word`, `description`) VALUES
(1, 'abacate', 'fruto verde'),
(2, 'carro', 'usa-se para locomover'),
(3, 'sabao', 'limpeza'),
(4, 'mouse', 'usado no computador'),
(5, 'paralelepipedo', 'muito dificil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`inviteId`),
  ADD KEY `PersonID_to` (`PersonID_to`),
  ADD KEY `PersonID_from` (`PersonID_from`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`wordId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `inviteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `wordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`PersonID_to`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `invite_ibfk_2` FOREIGN KEY (`PersonID_from`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
