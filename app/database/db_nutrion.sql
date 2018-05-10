-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2018 às 17:18
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
  `caloria` float NOT NULL,
  `proteina` float NOT NULL,
  `carboidrato` float NOT NULL,
  `gordura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alimento`
--

INSERT INTO `tb_alimento` (`id`, `nome`, `caloria`, `proteina`, `carboidrato`, `gordura`) VALUES
(1, 'batata', 24, 4, 20, 0),
(2, 'ervilha', 6, 3, 3, 0),
(3, 'peixe', 50, 20, 20, 8),
(4, 'frango', 39, 25, 10, 4);

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
  `cpf` char(15) NOT NULL,
  `telefone` char(15) NOT NULL,
  `sexo` char(1) NOT NULL,
  `dataNasc` date NOT NULL,
  `id_nutricionista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_paciente`
--

INSERT INTO `tb_paciente` (`id`, `nome`, `cpf`, `telefone`, `sexo`, `dataNasc`, `id_nutricionista`) VALUES
(1, 'Everaldo Dias', '999.999.999-99', '(31)99999-9999', 'M', '1996-04-30', 1),
(2, 'Mariana Souza', '111.111.111-11', '(31)3030-4444', 'F', '1976-03-28', 2),
(3, 'Douglas Miranda', '222.222.222-22', '(31)3343-2244', 'M', '1985-02-11', 3);

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
-- Indexes for table `tb_infofisicas`
--
ALTER TABLE `tb_infofisicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_paciente` (`id_paciente`);

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
-- Limitadores para a tabela `tb_infofisicas`
--
ALTER TABLE `tb_infofisicas`
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD CONSTRAINT `fk_id_nutricionista` FOREIGN KEY (`id_nutricionista`) REFERENCES `tb_nutricionista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
