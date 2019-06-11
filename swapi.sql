-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/06/2019 às 12:36
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `swapi`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `planetas`
--

CREATE TABLE `planetas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `clima` varchar(50) NOT NULL,
  `terreno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `planetas`
--

INSERT INTO `planetas` (`id`, `nome`, `clima`, `terreno`) VALUES
(1, 'Tatooine', 'arid', 'desert'),
(2, 'Endor', 'temperate', 'forests'),
(3, 'Champala', 'temperate', 'oceans'),
(4, 'Corellia', 'temperate', 'plains'),
(5, 'Skako', 'temperate', 'urban');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `planetas`
--
ALTER TABLE `planetas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `planetas`
--
ALTER TABLE `planetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
