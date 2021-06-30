-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/06/2021 às 21:55
-- Versão do servidor: 10.4.19-MariaDB
-- Versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id17044767_nutri`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `calorias` float NOT NULL,
  `proteinas` float NOT NULL,
  `carboidratos` float NOT NULL,
  `gorduras` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `alimentos`
--

INSERT INTO `alimentos` (`id`, `nome`, `calorias`, `proteinas`, `carboidratos`, `gorduras`) VALUES
(3, 'Maçã', 1, 1, 1, 1),
(4, 'Macarrão', 1, 1, 1, 1),
(6, 'Feijão', 2.3, 0.2, 3, 1),
(8, 'Filé de frango', 2.3, 0.2, 3, 1),
(11, 'Aveia', 3, 2, 4, 3),
(14, 'banana', 1, 1, 2, 0),
(16, 'batata doce', 4, 3, 1, 2),
(17, 'arroz', 1, 1, 3, 1),
(18, 'chá de camomila', 1, 0, 0, 0),
(19, 'pasta de amendoim', 12, 1, 2, 4),
(20, 'leite integral', 2, 1, 1, 1),
(21, 'pão francês', 1, 1, 1, 1),
(22, 'pão de forma', 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alimentos_consumidos`
--

CREATE TABLE `alimentos_consumidos` (
  `id` int(11) NOT NULL,
  `id_alimento` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_refeicao` int(11) DEFAULT NULL,
  `quantidade` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `alimentos_consumidos`
--

INSERT INTO `alimentos_consumidos` (`id`, `id_alimento`, `id_paciente`, `data`, `id_refeicao`, `quantidade`) VALUES
(2, 4, 2, '2020-11-20', 1, '33'),
(10, 2, 2, '2020-11-21', 1, '200'),
(16, 5, 2, '2020-11-21', 1, '72346'),
(17, 4, 2, '2020-11-21', 1, '1213'),
(18, 6, 2, '2020-11-23', 1, '201'),
(27, 4, 2, '2020-12-02', 1, '233'),
(29, 6, 2, '2020-12-02', 1, '1'),
(30, 3, 2, '2020-12-02', 1, '444'),
(31, 3, 2, '2020-12-02', 2, '432'),
(32, 8, 2, '2020-12-02', 2, '220'),
(35, 6, 2, '2020-12-02', 3, '223'),
(36, 3, 2, '2020-12-02', 3, '122'),
(40, 4, 2, '2020-12-03', 1, '233'),
(41, 6, 2, '2020-12-03', 1, '1'),
(42, 3, 2, '2020-12-03', 1, '444'),
(44, 6, 2, '2020-12-08', 4, '521'),
(45, 14, 2, '2020-12-09', 2, '3431'),
(46, 3, 2, '2020-12-09', 1, '444'),
(47, 15, 2, '2020-12-09', 1, '81'),
(48, 11, 2, '2020-12-10', 1, '201'),
(49, 3, 2, '2020-12-10', 1, '444'),
(50, 16, 2, '2020-12-10', 1, '142'),
(51, 18, 2, '2020-12-10', 5, '200'),
(52, 17, 2, '2020-12-10', 2, '100'),
(53, 3, 2, '2020-12-10', 3, '200'),
(54, 6, 2, '2020-12-10', 4, '160'),
(55, 16, 6, '2020-12-10', 5, '300'),
(56, 6, 6, '2020-12-10', 5, '160'),
(57, 4, 7, '2020-12-10', 2, '101'),
(58, 14, 9, '2021-02-10', 1, '200'),
(59, 14, 11, '2021-05-23', 1, '300'),
(60, 20, 11, '2021-05-23', 1, '150'),
(62, 14, 6, '2021-06-13', 1, '80'),
(65, 20, 12, '2021-06-15', 1, '100'),
(66, 17, 13, '2021-06-16', 1, '1'),
(67, 8, 13, '2021-06-16', 1, '12'),
(68, 19, 13, '2021-06-16', 3, '20'),
(69, 17, 13, '2021-06-21', 1, '200');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `dataNascimento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `objetivo` varchar(50) DEFAULT NULL,
  `anotacoes` text DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `inicio_acompanhamento` date DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`nome`, `cpf`, `dataNascimento`, `email`, `telefone`, `peso`, `objetivo`, `anotacoes`, `id`, `inicio_acompanhamento`, `senha`, `id_plano`) VALUES
('Vinícius', '399.399.399-40', '2003-03-27', 'vinicius@gmail.com', '951236458', 70, 'Ganho de massa muscular', 'intolerante a lactose', 2, '2001-02-20', '$2y$10$91MCykv0WlWT7yne/CKItO5U4Jl27xm.Krfb4t.Pxia3hiLGJxviS', 2),
('Maressa', '399.399.399-43', '2003-03-27', 'maressa123@yahoo.com', '923459765', 75, 'Ganho de massa muscular', 'nada a declarar', 3, NULL, NULL, 3),
('Mariana', '399.399.399-42', '2002-03-22', 'mari@yahoo.com', '67993567741', 70, 'Ganhar massa magra', 'Alérgica a orégano', 4, '2016-09-01', NULL, 4),
('Emerson Gabs', '00800899543', '2003-03-29', 'emerson@yahoo.com', '981217210', 70, 'ganhar 80 quilos', 'tem o sonho de ser strongman\r\n', 6, NULL, '$2y$10$FJbNSO8wLfW1yf3ZXxZEMuSAH.xxwX2sCDL/7.viVDaJcJGqR/Wby', 5),
('Cesar', '00896577231', '2002-04-30', 'cesar@gmail.com', '988345611', 110, 'Emagrecer', 'lindo', 7, '2020-12-10', '$2y$10$.Zgp7PnaWoi3/3lWLmb1.ObTL3uMBgcRct4eVUskXHEODGHmppUEi', 6),
('Rafaela', '00044455573', '2006-01-22', 'rafinha@gmail.com', '67988324516', 0, '', NULL, 8, NULL, '$2y$10$6lRBBSh0kw71l6JwDI3y2ecqFxVWdhrEJ2BgLBb5IOu33fQqclWfu', 7),
('Cardoso', '00906751432', '1979-09-21', 'cardoso@gmail.com', '9819239842', 70, 'Ganhar massa magra', 'Não gosta de pão', 9, NULL, '$2y$10$B2GKbuAngV6JDId2MxTwTuBJHqSWGLHZkp6.BE4YpVQh2M/wX17qO', 8),
('Matheus', '23i4723o4u', '4802-09-23', 'matheus@gmail.com', '92835792385', 0, '', NULL, 10, NULL, '$2y$10$8N/4m4QOvvHSNkBHAEK4MutDy8jeQCKs257gWZQb/oxxYVh2d8xzG', 9),
('Marcos', '07278177682', '2003-05-23', 'marcosvelho@gmail.com', '67992373842', 0, '', NULL, 11, NULL, '$2y$10$ixtamP4/xaIPBavByQJMsuIlAPOZ70NLel.oGLTTtpTCGq.WQf35y', 10),
('Vinicius Dantas Gonçalves', '89763211104', '2002-06-22', 'user@test.com', '67998324156', NULL, NULL, NULL, 12, NULL, '$2y$10$76PiqKBB/rTXfk9k2QFCduKbBpYs0U7ZZfxPfYDPuHd3cO/Be65le', 11),
('Marcos', '00', '2005-04-22', 'marcos', '67981176462', NULL, NULL, NULL, 13, NULL, '$2y$10$IWv2hoeJL95kyM8.SYFcZOKeuI8czrkJkG/HpAr23VYtHtW93jgCK', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_dicas`
--

CREATE TABLE `tb_dicas` (
  `id` int(11) NOT NULL,
  `dica` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_dicas`
--

INSERT INTO `tb_dicas` (`id`, `dica`) VALUES
(5, 'Esta é uma nova dica'),
(7, 'Treino todos os dias até desmaiar na academia'),
(8, 'Esta é uma dica totalmentee nova'),
(12, 'Esta é uma dica com espaço adicional na esquerda.'),
(13, 'Ok, outra dicazinha'),
(15, 'Evitar ingestão de alimentos de alto índice glicêmico'),
(16, 'Sem glúten');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_dicas_pacientes`
--

CREATE TABLE `tb_dicas_pacientes` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_dica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_dicas_pacientes`
--

INSERT INTO `tb_dicas_pacientes` (`id`, `id_paciente`, `id_dica`) VALUES
(35, 4, 5),
(61, 2, 7),
(62, 2, 13),
(63, 6, 7),
(64, 6, 5),
(65, 11, 7),
(66, 12, 7),
(67, 12, 15),
(68, 13, 5),
(69, 9, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_macros_pacientes`
--

CREATE TABLE `tb_macros_pacientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `calorias` float DEFAULT NULL,
  `proteinas` float DEFAULT NULL,
  `carboidratos` float DEFAULT NULL,
  `gorduras` float DEFAULT NULL,
  `data_insercao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tb_macros_pacientes`
--

INSERT INTO `tb_macros_pacientes` (`id`, `id_usuario`, `calorias`, `proteinas`, `carboidratos`, `gorduras`, `data_insercao`) VALUES
(1, 13, 710.6, 339.4, 223, 1403, '2021-06-16'),
(2, 13, 1100, 425, 221, 89, '2021-06-17'),
(3, 13, 200, 200, 200, 600, '2021-06-21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_nutricionista`
--

CREATE TABLE `tb_nutricionista` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_nutricionista`
--

INSERT INTO `tb_nutricionista` (`nome`, `email`, `senha`) VALUES
('Paulo', 'root@gmail.com', '$2y$10$b8k7oAMUlzlcFsWKj2.BMeNNmvpvGlXQxX.H67a8zTNSVmhBySaaa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_planos`
--

CREATE TABLE `tb_planos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_planos`
--

INSERT INTO `tb_planos` (`id`, `id_paciente`) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 11),
(11, 12),
(12, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_planos_refeicoes`
--

CREATE TABLE `tb_planos_refeicoes` (
  `id` int(11) NOT NULL,
  `id_plano` int(11) DEFAULT NULL,
  `id_refeicao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_planos_refeicoes`
--

INSERT INTO `tb_planos_refeicoes` (`id`, `id_plano`, `id_refeicao`) VALUES
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(11, 3, 1),
(12, 3, 2),
(13, 3, 3),
(14, 3, 4),
(15, 3, 5),
(16, 3, 6),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 5, 5),
(22, 5, 6),
(23, 6, 1),
(24, 6, 2),
(25, 6, 3),
(26, 6, 4),
(27, 6, 5),
(28, 6, 6),
(29, 7, 1),
(30, 7, 2),
(31, 7, 3),
(32, 7, 4),
(33, 7, 5),
(34, 7, 6),
(35, 8, 1),
(36, 8, 2),
(37, 8, 3),
(38, 8, 4),
(39, 8, 5),
(40, 8, 6),
(41, 9, 1),
(42, 9, 2),
(43, 9, 3),
(44, 9, 4),
(45, 9, 5),
(46, 9, 6),
(47, 10, 1),
(48, 10, 2),
(49, 10, 3),
(50, 10, 4),
(51, 10, 5),
(52, 10, 6),
(53, 11, 1),
(54, 11, 2),
(55, 11, 3),
(56, 11, 4),
(57, 11, 5),
(58, 11, 6),
(59, 12, 1),
(60, 12, 2),
(61, 12, 3),
(62, 12, 4),
(63, 12, 5),
(64, 12, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_refeicoes`
--

CREATE TABLE `tb_refeicoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_refeicoes`
--

INSERT INTO `tb_refeicoes` (`id`, `nome`) VALUES
(1, 'Café da manhã'),
(2, 'Lanche da manhã'),
(3, 'Almoço'),
(4, 'Lanche da tarde'),
(5, 'Jantar'),
(6, 'Ceia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_refeicoes_alimentos`
--

CREATE TABLE `tb_refeicoes_alimentos` (
  `id` int(11) NOT NULL,
  `id_alimento` int(11) DEFAULT NULL,
  `id_refeicao` int(11) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL,
  `qtd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_refeicoes_alimentos`
--

INSERT INTO `tb_refeicoes_alimentos` (`id`, `id_alimento`, `id_refeicao`, `id_plano`, `qtd`) VALUES
(1, 1, 1, 1, '200'),
(2, 2, 1, 1, '130'),
(3, 5, 2, 1, '220'),
(4, 7, 2, 1, '178'),
(6, 5, 1, 2, '111'),
(7, 1, 2, 2, '22'),
(8, 2, 4, 2, '134'),
(10, 1, 1, 2, '5'),
(12, 5, 4, 2, '2423'),
(14, 1, 5, 2, '123'),
(15, 3, 3, 2, '200 '),
(16, 5, 5, 2, '111'),
(19, 7, 5, 1, '54'),
(20, 1, 5, 2, '31'),
(21, 5, 3, 3, '25'),
(22, 7, 3, 3, '243'),
(23, 8, 3, 3, '235'),
(24, 3, 1, 2, '444'),
(25, 7, 4, 2, '222'),
(26, 9, 2, 2, '12'),
(27, 5, 1, 2, '1123'),
(28, 8, 2, 2, '200'),
(29, 10, 5, 2, NULL),
(33, 17, 2, 2, '100'),
(34, 16, 1, 2, '142'),
(36, 14, 3, 2, '100'),
(37, 11, 3, 2, '30'),
(38, 17, 4, 2, '210'),
(39, 6, 4, 2, '160'),
(40, 8, 4, 2, '180'),
(41, 18, 5, 2, '200'),
(42, 19, 5, 2, '40'),
(43, 11, 1, NULL, '101'),
(44, 11, 1, 3, '1'),
(46, 17, 5, 3, '28'),
(47, 14, 1, 3, '88'),
(48, 11, 1, 2, '201'),
(49, 16, 5, 5, '300'),
(50, 6, 5, 5, '160'),
(51, 11, 2, 6, '22'),
(52, 14, 1, 5, '100'),
(53, 18, 2, 5, '200'),
(55, 17, 3, 5, '300'),
(56, 13, 4, 5, '22'),
(57, 19, 6, 5, '50'),
(58, 14, 1, 8, '200'),
(59, 14, 1, 10, '300'),
(60, 11, 1, 10, '50'),
(61, 20, 1, 10, '150'),
(62, 20, 1, 11, '200'),
(63, 17, 3, 11, '300'),
(64, 8, 3, 11, '180'),
(65, 6, 3, 11, '90'),
(66, 3, 4, 11, '100'),
(67, 14, 4, 11, '200'),
(68, 17, 5, 11, '300'),
(69, 6, 5, 11, '90'),
(70, 8, 5, 11, '190'),
(71, 18, 6, 11, '150'),
(72, 21, 2, 11, '180'),
(73, 19, 2, 11, '30'),
(74, 17, 1, 12, '500');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `alimentos_consumidos`
--
ALTER TABLE `alimentos_consumidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_dicas`
--
ALTER TABLE `tb_dicas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_dicas_pacientes`
--
ALTER TABLE `tb_dicas_pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_macros_pacientes`
--
ALTER TABLE `tb_macros_pacientes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `tb_planos`
--
ALTER TABLE `tb_planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_planos_refeicoes`
--
ALTER TABLE `tb_planos_refeicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_refeicoes`
--
ALTER TABLE `tb_refeicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_refeicoes_alimentos`
--
ALTER TABLE `tb_refeicoes_alimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `alimentos_consumidos`
--
ALTER TABLE `alimentos_consumidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_dicas`
--
ALTER TABLE `tb_dicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_dicas_pacientes`
--
ALTER TABLE `tb_dicas_pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `tb_macros_pacientes`
--
ALTER TABLE `tb_macros_pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_planos`
--
ALTER TABLE `tb_planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_planos_refeicoes`
--
ALTER TABLE `tb_planos_refeicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `tb_refeicoes`
--
ALTER TABLE `tb_refeicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_refeicoes_alimentos`
--
ALTER TABLE `tb_refeicoes_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
