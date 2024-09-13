-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/09/2024 às 17:58
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `class_manager`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `start`, `end`) VALUES
(5, 'PortuguÃªs', 'Romantismo', '#00b3ff', '2024-09-10 08:40:00', '2024-09-10 09:30:00'),
(6, 'Intervalo', 'CafÃ© da ManhÃ£', '#a1a1a1', '2024-09-10 09:30:00', '2024-09-10 09:50:00'),
(7, 'PortuguÃªs', 'Romantismo', '#00aaff', '2024-09-10 09:50:00', '2024-09-10 10:40:00'),
(8, 'FÃ­sica', 'ForÃ§a Forte e ForÃ§a Fraca', '#006b20', '2024-09-10 10:40:00', '2024-09-10 11:30:00'),
(9, 'MatemÃ¡tica', 'Geometria Espacial', '#ffa200', '2024-09-10 07:00:00', '2024-09-10 07:50:00'),
(10, 'InglÃªs', 'Verbo To Be', '#00e1ff', '2024-09-10 07:50:00', '2024-09-10 08:40:00'),
(11, 'Biologia', 'MitocÃ´ndrias', '#00ff1e', '2024-09-10 11:30:00', '2024-09-10 12:20:00'),
(13, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-12 07:50:00', '2024-09-12 07:50:00'),
(14, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-13 07:50:00', '2024-09-13 07:50:00'),
(15, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-14 07:50:00', '2024-09-14 07:50:00'),
(16, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-15 07:50:00', '2024-09-15 07:50:00'),
(17, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-16 07:50:00', '2024-09-16 07:50:00'),
(18, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-17 07:50:00', '2024-09-17 07:50:00'),
(19, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-18 07:50:00', '2024-09-18 07:50:00'),
(20, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-19 07:50:00', '2024-09-19 07:50:00'),
(21, 'HistÃ³ria', 'RevoluÃ§Ã£o Francesa', '#fb00ff', '2024-09-20 07:50:00', '2024-09-20 07:50:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
