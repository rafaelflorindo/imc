-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2021 às 22:40
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinicanutricao`
--
DROP DATABASE IF EXISTS `clinicanutricao`;
CREATE DATABASE IF NOT EXISTS `clinicanutricao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clinicanutricao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(10) UNSIGNED NOT NULL,
  `Paciente_id` int(10) UNSIGNED NOT NULL,
  `peso` decimal(10,3) DEFAULT NULL,
  `altura` decimal(10,3) DEFAULT NULL,
  `pressao` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `Paciente_id`, `peso`, `altura`, `pressao`, `created`, `updated`) VALUES
(1, 1, '107.000', '1.860', '9:15', '2021-03-25 15:03:39', NULL),
(2, 1, '107.400', '1.880', '10:15', '2021-03-25 15:03:02', NULL),
(3, 1, '107.400', '1.880', '10:15', '2021-03-25 15:03:04', NULL),
(4, 1, '100.000', '1.700', '6:9', '2021-03-25 15:03:18', NULL),
(5, 1, '95.000', '1.800', '6:9', '0000-00-00 00:00:00', NULL),
(6, 1, '95.000', '1.800', '6:9', '0000-00-00 00:00:00', NULL),
(7, 1, '95.000', '1.800', '6:9', '2021-03-25 15:03:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `cpf`, `email`, `telefone`, `created`, `updated`) VALUES
(1, 'Rafael A. Florindo', '365.987.369-45', 'rafaelflorindo@hotmail.com', '(44) 92345-6789', '2021-03-25 10:54:32', '2021-03-25 13:54:46');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`,`Paciente_id`),
  ADD KEY `Atendimento_FKIndex1` (`Paciente_id`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
