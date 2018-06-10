-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2018 às 20:15
-- Versão do servidor: 5.7.21-log
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nutrion`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alimento`
--

CREATE TABLE `tb_alimento` (
  `id` int(11) NOT NULL,
  `nome` char(40) NOT NULL,
  `medida` varchar(50) NOT NULL,
  `tipoProteina` varchar(50) NOT NULL,
  `proteina` float NOT NULL,
  `carboidrato` float NOT NULL,
  `gordura` float NOT NULL,
  `caloria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alimento`
--

INSERT INTO `tb_alimento` (`id`, `nome`, `medida`, `tipoProteina`, `proteina`, `carboidrato`, `gordura`, `caloria`) VALUES
(1, 'batata', '', '', 4, 20, 0, 24),
(2, 'ervilha', '', '', 3, 3, 0, 6),
(3, 'peixe', '', '', 20, 20, 8, 50),
(4, 'frango', '', '', 25, 10, 4, 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_avaliacao`
--

CREATE TABLE `tb_avaliacao` (
  `id` int(11) NOT NULL,
  `id_infoFisicas` int(11) NOT NULL,
  `dataAval` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_avaliacao`
--

INSERT INTO `tb_avaliacao` (`id`, `id_infoFisicas`, `dataAval`) VALUES
(1, 1, '2018-02-21'),
(2, 2, '2018-01-01'),
(3, 3, '2018-04-15'),
(4, 4, '2018-04-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dieta`
--

CREATE TABLE `tb_dieta` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `dataDieta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_dieta`
--

INSERT INTO `tb_dieta` (`id`, `id_paciente`, `dataDieta`) VALUES
(1, 1, '2018-06-10'),
(2, 2, '2018-06-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_infofisicas`
--

CREATE TABLE `tb_infofisicas` (
  `id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` int(11) NOT NULL,
  `imc` float NOT NULL,
  `cintura` int(11) NOT NULL,
  `quadril` int(11) NOT NULL,
  `icq` float NOT NULL,
  `classificacaoIPAQ` char(25) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_infofisicas`
--

INSERT INTO `tb_infofisicas` (`id`, `peso`, `altura`, `imc`, `cintura`, `quadril`, `icq`, `classificacaoIPAQ`, `id_paciente`) VALUES
(1, 75.3, 180, 24.5, 70, 70, 0.85, 'Sedentário', 1),
(2, 65.8, 173, 21.5, 50, 50, 0.79, 'Ativo', 2),
(3, 68, 180, 24, 68, 68, 0.83, 'Irregularmente Ativo', 3),
(4, 66, 173, 22, 52, 52, 0.81, 'Muito Ativo', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itemrefeicao`
--

CREATE TABLE `tb_itemrefeicao` (
  `id_refeicao` int(11) NOT NULL,
  `id_alimento` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_itemrefeicao`
--

INSERT INTO `tb_itemrefeicao` (`id_refeicao`, `id_alimento`, `quantidade`) VALUES
(1, 2, 4),
(2, 4, 1),
(3, 3, 1),
(3, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nutricionista`
--

CREATE TABLE `tb_nutricionista` (
  `id` int(11) NOT NULL,
  `email` char(40) NOT NULL,
  `senha` char(10) NOT NULL,
  `nome` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_nutricionista`
--

INSERT INTO `tb_nutricionista` (`id`, `email`, `senha`, `nome`) VALUES
(1, 'cjunqueira@nutrion.com', '12345', 'Carlos Junqueira'),
(2, 'jtavares@nutrion.com', 'abcde', 'Juliana Tavares'),
(3, 'admin@admin.com', 'admin', 'Administrador'),
(4, 'teste@teste.com', 'teste', 'testeuser');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_paciente`
--

CREATE TABLE `tb_paciente` (
  `id` int(11) NOT NULL,
  `nome` char(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `sexo` char(1) NOT NULL,
  `cpf` char(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `id_nutricionista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_paciente`
--

INSERT INTO `tb_paciente` (`id`, `nome`, `telefone`, `sexo`, `cpf`, `email`, `dataNasc`, `id_nutricionista`) VALUES
(1, 'Everaldo Dias', '(31)99999-9999', 'M', '999.999.999-99', NULL, '1996-04-30', 1),
(2, 'Mariana Souza', '(31)3030-4444', 'F', '111.111.111-11', NULL, '1976-03-28', 2),
(3, 'Douglas Miranda', '(31)3343-2244', 'M', '222.222.222-22', NULL, '1985-02-11', 3),
(4, 'Tek', '(31)99659-9999', 'F', '850.224.880-43', 'tekuxuzeze@mailinator.com', '2013-03-16', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_refeicao`
--

CREATE TABLE `tb_refeicao` (
  `id` int(11) NOT NULL,
  `nome` char(40) NOT NULL,
  `horario` char(5) NOT NULL,
  `id_dieta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_refeicao`
--

INSERT INTO `tb_refeicao` (`id`, `nome`, `horario`, `id_dieta`) VALUES
(1, 'café da manhã', '09h00', 1),
(2, 'almoço', '12h00', 2),
(3, 'almoço', '12h00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alimento`
--
ALTER TABLE `tb_alimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_infoFisicas` (`id_infoFisicas`);

--
-- Indexes for table `tb_dieta`
--
ALTER TABLE `tb_dieta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_dietapaciente` (`id_paciente`);

--
-- Indexes for table `tb_infofisicas`
--
ALTER TABLE `tb_infofisicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_paciente` (`id_paciente`);

--
-- Indexes for table `tb_itemrefeicao`
--
ALTER TABLE `tb_itemrefeicao`
  ADD PRIMARY KEY (`id_refeicao`,`id_alimento`);

--
-- Indexes for table `tb_nutricionista`
--
ALTER TABLE `tb_nutricionista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_id_nutricionista` (`id_nutricionista`);

--
-- Indexes for table `tb_refeicao`
--
ALTER TABLE `tb_refeicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_dieta` (`id_dieta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alimento`
--
ALTER TABLE `tb_alimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_dieta`
--
ALTER TABLE `tb_dieta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_infofisicas`
--
ALTER TABLE `tb_infofisicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nutricionista`
--
ALTER TABLE `tb_nutricionista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_paciente`
--
ALTER TABLE `tb_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_refeicao`
--
ALTER TABLE `tb_refeicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD CONSTRAINT `fk_id_infoFisicas` FOREIGN KEY (`id_infoFisicas`) REFERENCES `tb_infofisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_dieta`
--
ALTER TABLE `tb_dieta`
  ADD CONSTRAINT `fk_id_dietapaciente` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_infofisicas`
--
ALTER TABLE `tb_infofisicas`
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD CONSTRAINT `fk_id_nutricionista` FOREIGN KEY (`id_nutricionista`) REFERENCES `tb_nutricionista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_refeicao`
--
ALTER TABLE `tb_refeicao`
  ADD CONSTRAINT `fk_id_dieta` FOREIGN KEY (`id_dieta`) REFERENCES `tb_dieta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
