-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Set-2024 às 16:38
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `classroms`
--

CREATE TABLE `classroms` (
  `id_class` int(11) NOT NULL,
  `identification` varchar(100) NOT NULL,
  `conditionstatus` varchar(255) NOT NULL,
  `equipaments` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_type`
--

CREATE TABLE `users_type` (
  `id_usertype` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classroms`
--
ALTER TABLE `classroms`
  ADD PRIMARY KEY (`id_class`);

--
-- Índices para tabela `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Índices para tabela `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id_usertype`),
  ADD KEY `users_type_id_users_type_user_FK` (`id_users`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classroms`
--
ALTER TABLE `classroms`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id_usertype` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `users_type`
--
ALTER TABLE `users_type`
  ADD CONSTRAINT `users_type_id_users_type_user_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
