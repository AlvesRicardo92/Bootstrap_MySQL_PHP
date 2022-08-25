-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Ago-2022 às 21:06
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_semaforica`
--
CREATE DATABASE IF NOT EXISTS `teste_semaforica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `teste_semaforica`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `numDiaria` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `origem` varchar(255) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(255) CHARACTER SET latin1 NOT NULL,
  `bairro` varchar(255) CHARACTER SET latin1 NOT NULL,
  `numEndereco` varchar(255) CHARACTER SET latin1 NOT NULL,
  `descricao` text CHARACTER SET latin1 NOT NULL,
  `tipoServico` text CHARACTER SET latin1 NOT NULL,
  `material` text CHARACTER SET latin1 NOT NULL,
  `quantidadeMaterial` text CHARACTER SET latin1 NOT NULL,
  `consorcio_pmsbc` text CHARACTER SET latin1 NOT NULL,
  `horarioRecebeu` time NOT NULL,
  `horarioChegou` time NOT NULL,
  `horarioInicio` time NOT NULL,
  `horarioFim` time NOT NULL,
  `veiculo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kmInicial` int(11) NOT NULL,
  `kmFinal` int(11) NOT NULL,
  `obs` text CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`numDiaria`, `data`, `hora`, `origem`, `endereco`, `bairro`, `numEndereco`, `descricao`, `tipoServico`, `material`, `quantidadeMaterial`, `consorcio_pmsbc`, `horarioRecebeu`, `horarioChegou`, `horarioInicio`, `horarioFim`, `veiculo`, `kmInicial`, `kmFinal`, `obs`, `status`) VALUES
(1, '2022-08-18', '16:20:22', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(2, '2022-08-19', '10:20:20', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(3, '2022-08-18', '12:17:59', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(4, '2022-08-18', '12:18:57', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(5, '2022-08-18', '12:20:41', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(6, '2022-08-18', '12:20:49', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(7, '2022-08-18', '12:22:04', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(8, '2022-08-18', '12:23:32', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(9, '2022-08-18', '12:24:01', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(10, '2022-08-18', '12:25:29', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(11, '2022-08-18', '12:26:58', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(12, '2022-08-18', '12:27:28', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(13, '2022-08-18', '12:44:11', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(14, '2022-08-18', '12:44:26', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(15, '2022-08-18', '14:31:46', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(16, '2022-08-18', '14:47:35', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(17, '2022-08-18', '15:31:55', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(18, '2022-08-18', '15:32:31', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(19, '2022-08-18', '15:34:44', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(20, '2022-08-18', '15:36:09', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(21, '2022-08-18', '16:22:32', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(22, '2022-08-18', '16:23:09', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(23, '2022-08-18', '16:23:52', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(24, '2022-08-18', '16:25:18', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(25, '2022-08-18', '16:25:48', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(26, '2022-08-18', '16:28:40', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(27, '2022-08-18', '16:28:56', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(28, '2022-08-18', '16:49:15', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(29, '2022-08-18', '16:49:54', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(30, '2022-08-18', '16:50:26', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(31, '2022-08-18', '16:50:46', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(32, '2022-08-18', '16:51:28', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1),
(33, '2022-08-18', '16:52:58', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '', 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `origem`
--

CREATE TABLE `origem` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) CHARACTER SET latin1 NOT NULL,
  `desativado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `origem`
--

INSERT INTO `origem` (`id`, `descricao`, `desativado`) VALUES
(1, 'PRODIGI', 0),
(2, 'Ronda', 0),
(3, 'Paulo de Tarso', 0),
(4, 'Marcos - Coordenador', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) CHARACTER SET latin1 NOT NULL,
  `modelo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `placa` varchar(255) CHARACTER SET latin1 NOT NULL,
  `desativado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `marca`, `modelo`, `cor`, `placa`, `desativado`) VALUES
(1, 'Volkswagen', 'Gol', 'Preto', 'ABC-1234', 0),
(2, 'Ford', 'Ka', 'Branco', 'DEF-5678', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`numDiaria`);

--
-- Índices para tabela `origem`
--
ALTER TABLE `origem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `numDiaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `origem`
--
ALTER TABLE `origem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
