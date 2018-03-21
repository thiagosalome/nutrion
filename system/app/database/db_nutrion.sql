-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Mar-2018 às 00:36
-- Versão do servidor: 10.1.30-MariaDB
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
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_alimento`
--

INSERT INTO `tb_alimento` (`id`, `nome`, `descricao`) VALUES
(1, 'Batata', 'Tubérculo pertencente à família das Solanaceae'),
(2, 'Maçã', 'Pseudofruto pomáceo da macieira Malus domestica, árvore da família Rosaceae');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_infopaciente`
--

CREATE TABLE `tb_infopaciente` (
  `id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `imc` float NOT NULL,
  `dataAvaliacao` date NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_infopaciente`
--

INSERT INTO `tb_infopaciente` (`id`, `peso`, `altura`, `imc`, `dataAvaliacao`, `id_paciente`) VALUES
(1, 60.3, 1.6, 21.5, '2018-03-18', 1),
(2, 65.8, 1.73, 24.5, '2018-03-17', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nutricionista`
--

CREATE TABLE `tb_nutricionista` (
  `id` int(11) NOT NULL,
  `email` char(40) NOT NULL,
  `senha` char(10) NOT NULL,
  `nome` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_nutricionista`
--

INSERT INTO `tb_nutricionista` (`id`, `email`, `senha`, `nome`) VALUES
(1, 'cjunqueira@nutrion.com', 'abcde', 'Carlos Junqueira'),
(2, 'jtavares@nutrion.com', '12345', 'Juliana Tavares'),
(3, 'teste@teste.com', 'teste', 'testeuser');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_paciente`
--

CREATE TABLE `tb_paciente` (
  `id` int(11) NOT NULL,
  `nome` char(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `sexo` char(1) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_paciente`
--

INSERT INTO `tb_paciente` (`id`, `nome`, `telefone`, `sexo`, `dataNasc`) VALUES
(1, 'Everaldo Dias', '(31)99999-9999', 'M', '1996-04-30'),
(2, 'Mariana Souza', '(31)3030-4444', 'F', '1976-03-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alimento`
--
ALTER TABLE `tb_alimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_infopaciente`
--
ALTER TABLE `tb_infopaciente`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alimento`
--
ALTER TABLE `tb_alimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_infopaciente`
--
ALTER TABLE `tb_infopaciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_nutricionista`
--
ALTER TABLE `tb_nutricionista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_paciente`
--
ALTER TABLE `tb_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_infopaciente`
--
ALTER TABLE `tb_infopaciente`
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
