-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/06/2019 às 14:58
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
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` char(2) NOT NULL,
  `status` char(2) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `senha`, `nivel`, `status`, `data`) VALUES
(14, 'Admin', 'admin@admin.com', '$2a$08$17ba0791499db908433b8uHdFlClPXsJ3XvtqpbCgWtAJ1sR61aTa', '1', '1', '2015-01-15 17:53:18');

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
(2, 'Alderaan', 'temperate', 'grasslands, mountains'),
(3, 'Yavin IV', 'temperate, tropical', 'jungle, rainforests'),
(4, 'Hoth', 'frozen', 'tundra, ice caves, mountain ranges'),
(5, 'Dagobah', 'murky', 'swamp, jungles'),
(6, 'Bespin', 'temperate', 'gas giant'),
(7, 'Endor', 'temperate', 'forests, mountains, lakes'),
(8, 'Naboo', 'temperate', 'grassy hills, swamps, forests, mountains'),
(9, 'Coruscant', 'temperate', 'cityscape, mountains'),
(10, 'Kamino', 'temperate', 'ocean'),
(11, 'Geonosis', 'temperate, arid', 'rock, desert, mountain, barren'),
(12, 'Utapau', 'temperate, arid, windy', 'scrublands, savanna, canyons, sinkholes'),
(13, 'Mustafar', 'hot', 'volcanoes, lava rivers, mountains, caves'),
(14, 'Kashyyyk', 'tropical', 'jungle, forests, lakes, rivers'),
(15, 'Polis Massa', 'artificial temperate', 'airless asteroid'),
(16, 'Mygeeto', 'frigid', 'glaciers, mountains, ice canyons'),
(17, 'Felucia', 'hot, humid', 'fungus forests'),
(18, 'Cato Neimoidia', 'temperate, moist', 'mountains, fields, forests, rock arches'),
(19, 'Saleucami', 'hot', 'caves, desert, mountains, volcanoes'),
(20, 'Stewjon', 'temperate', 'grass'),
(21, 'Eriadu', 'polluted', 'cityscape'),
(22, 'Corellia', 'temperate', 'plains, urban, hills, forests'),
(23, 'Rodia', 'hot', 'jungles, oceans, urban, swamps'),
(24, 'Nal Hutta', 'temperate', 'urban, oceans, swamps, bogs'),
(25, 'Dantooine', 'temperate', 'oceans, savannas, mountains, grasslands'),
(26, 'Bestine IV', 'temperate', 'rocky islands, oceans'),
(27, 'Ord Mantell', 'temperate', 'plains, seas, mesas'),
(28, 'unknown', 'unknown', 'unknown'),
(29, 'Trandosha', 'arid', 'mountains, seas, grasslands, deserts'),
(30, 'Socorro', 'arid', 'deserts, mountains'),
(31, 'Mon Cala', 'temperate', 'oceans, reefs, islands'),
(32, 'Chandrila', 'temperate', 'plains, forests'),
(33, 'Sullust', 'superheated', 'mountains, volcanoes, rocky deserts'),
(34, 'Toydaria', 'temperate', 'swamps, lakes'),
(35, 'Malastare', 'arid, temperate, tropical', 'swamps, deserts, jungles, mountains'),
(36, 'Dathomir', 'temperate', 'forests, deserts, savannas'),
(37, 'Ryloth', 'temperate, arid, subartic', 'mountains, valleys, deserts, tundra'),
(38, 'Aleen Minor', 'unknown', 'unknown'),
(39, 'Vulpter', 'temperate, artic', 'urban, barren'),
(40, 'Troiken', 'unknown', 'desert, tundra, rainforests, mountains'),
(41, 'Tund', 'unknown', 'barren, ash'),
(42, 'Haruun Kal', 'temperate', 'toxic cloudsea, plateaus, volcanoes'),
(43, 'Cerea', 'temperate', 'verdant'),
(44, 'Glee Anselm', 'tropical, temperate', 'lakes, islands, swamps, seas'),
(45, 'Iridonia', 'unknown', 'rocky canyons, acid pools'),
(46, 'Tholoth', 'unknown', 'unknown'),
(47, 'Iktotch', 'arid, rocky, windy', 'rocky'),
(48, 'Quermia', 'unknown', 'unknown'),
(49, 'Dorin', 'temperate', 'unknown'),
(50, 'Champala', 'temperate', 'oceans, rainforests, plateaus'),
(51, 'Mirial', 'unknown', 'deserts'),
(52, 'Serenno', 'unknown', 'rainforests, rivers, mountains'),
(53, 'Concord Dawn', 'unknown', 'jungles, forests, deserts'),
(54, 'Zolan', 'unknown', 'unknown'),
(55, 'Ojom', 'frigid', 'oceans, glaciers'),
(56, 'Skako', 'temperate', 'urban, vines'),
(57, 'Muunilinst', 'temperate', 'plains, forests, hills, mountains'),
(58, 'Shili', 'temperate', 'cities, savannahs, seas, plains'),
(59, 'Kalee', 'arid, temperate, tropical', 'rainforests, cliffs, canyons, seas'),
(60, 'Umbara', 'unknown', 'unknown'),
(61, 'Jakku', 'unknown', 'deserts');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planetas`
--
ALTER TABLE `planetas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `planetas`
--
ALTER TABLE `planetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
