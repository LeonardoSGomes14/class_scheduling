-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2024 às 20:10
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
-- Estrutura da tabela `classrooms`
--

CREATE TABLE `classrooms` (
  `id_class` int(11) NOT NULL,
  `identification` varchar(100) NOT NULL,
  `conditionstatus` tinyint(1) NOT NULL,
  `equipaments` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `classrooms`
--

INSERT INTO `classrooms` (`id_class`, `identification`, `conditionstatus`, `equipaments`, `description`) VALUES
(1, 'A24', 0, 'quadro negro, marcadores ou giz, projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas. Em ambientes mais tecnológicos, pode haver uma lousa digital, ar-condicionado, alto-falantes e apagador com pincéis.', 'alto-falantes com problemas'),
(2, 'A23', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(3, 'A22', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(4, 'A21', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(5, 'A20', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(6, 'A19', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(7, 'A18', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(8, 'A17', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(9, 'A16', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(10, 'A15', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(11, 'A14', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(12, 'A13', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(13, 'A12', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(14, 'A11', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(15, 'A10', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(16, 'A09', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(17, 'A08', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(18, 'A07', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(19, 'A06', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas'),
(20, 'A05', 0, 'projetor multimídia, tela de projeção, computador ou notebook, cadeiras e mesas, Além disso, há ventiladores e ar-condicionado, alto-falantes e apagador com pincéis.', 'Ventiladores com problemas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `id_mail` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `year_school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id_group`, `teacher`, `year_school`) VALUES
(1, 'Rodrigo Humberto Figuereto', '9 Ano do Ensino Fundamental'),
(2, 'Frederico Alberto da Silva', '9 Ano do Ensino Fundamental'),
(3, 'Bianca de Souza', '9 Ano do Ensino Fundamental'),
(4, 'Helena Roberta de Andrade', '8 Ano do Ensino Fundamental'),
(5, 'Luan Castilho', '8 Ano do Ensino Fundamental'),
(6, 'Beatriz Andrade', '8 Ano do Ensino Fundamental'),
(7, 'Rodrigo Humberto Figuereto', '7 Ano do Ensino Fundamental'),
(8, 'Rafael Moura', '7 Ano do Ensino Fundamental'),
(9, 'Bianca de Souza', '7 Ano do Ensino Fundamental'),
(10, 'Luan Castilho', '6 Ano do Ensino Fundamental'),
(11, 'Frederico Alberto da Silva', '6 Ano do Ensino Fundamental'),
(12, 'Rafael Moura', '6 Ano do Ensino Fundamental'),
(13, 'Helena Roberta de Andrade', '1 Ano do Ensino Médio'),
(14, 'Beatriz Andrade', '1 Ano do Ensino Médio'),
(15, 'Frederico Alberto da Silva', '1 Ano do Ensino Médio'),
(16, 'Bianca de Souza', '2 Ano do Ensino Médio'),
(17, 'Rodrigo Humberto Figuereto', '2 Ano do Ensino Médio'),
(18, 'Rafael Moura', '2 Ano do Ensino Médio'),
(19, 'Bianca de Souza', '3 Ano do Ensino Médio'),
(20, 'Helena Roberta de Andrade', '3 Ano do Ensino Médio'),
(21, 'Rodrigo Humberto Figuereto', '3 Ano do Ensino Médio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `scheduling`
--

CREATE TABLE `scheduling` (
  `id_scheduling` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `id_class` int(11) NOT NULL,
  `scheduling_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `school_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `subjects`
--

INSERT INTO `subjects` (`id_subject`, `name`) VALUES
(1, 'História'),
(3, 'Geografia'),
(4, 'Matemática'),
(5, 'Física'),
(6, 'Química'),
(7, 'Biologia'),
(8, 'Português'),
(9, 'Filosofia'),
(10, 'Sociologia'),
(11, 'Artes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `password`, `user_type`, `school_year`, `subject`) VALUES
(1, 'Administrador', 'administrativo@gmail.com', '123', 3, '', ''),
(6, 'Frederico Alberto da Silva', 'fred@gmail.com', '1234567', 1, '', 'Biologia'),
(7, 'Rodrigo Humberto Figuereto', 'fig@gmail.com', '1234567', 1, '', 'Química'),
(8, 'Bianca de Souza', 'bia@gmail.com', '1234567', 1, '', 'Física'),
(9, 'Helena Roberta de Andrade', 'helen@gmail.com', '1234567', 1, '', 'Matemática'),
(10, 'Luan Castilho', 'luan@gmail.com', '1234567', 1, '', 'Português'),
(11, 'Beatriz Andrade', 'bee@gmail.com', '1234567', 1, '', 'História'),
(12, 'Rafael Moura', 'rafa@gmail.com', '1234567', 1, '', 'Geografia'),
(13, 'Ana Carolina', 'anac@gmail.com', '12345', 2, '3 Ano do Ensino Médio', ''),
(14, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(15, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(16, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(17, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(18, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(19, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(20, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(21, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(22, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(23, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(24, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(25, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(26, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', ''),
(27, 'Luísa Martins', 'luisa@gmail.com', '12345', 2, '2 Ano do Ensino Médio', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id_class`);

--
-- Índices para tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id_mail`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Índices para tabela `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`id_scheduling`),
  ADD KEY `scheduling_id_teacher_id_user_users_FK` (`id_teacher`),
  ADD KEY `scheduling_id_class_id_class_FK` (`id_class`);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `id_scheduling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `scheduling`
--
ALTER TABLE `scheduling`
  ADD CONSTRAINT `scheduling_id_class_id_class_FK` FOREIGN KEY (`id_class`) REFERENCES `classrooms` (`id_class`),
  ADD CONSTRAINT `scheduling_id_teacher_id_user_users_FK` FOREIGN KEY (`id_teacher`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
