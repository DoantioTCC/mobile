-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 01:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donatio`
--

-- --------------------------------------------------------

--
-- Table structure for table `doacao`
--

CREATE TABLE `doacao` (
  `id` int(11) NOT NULL,
  `cpfdoador` varchar(14) NOT NULL,
  `cnpjdoador` varchar(20) NOT NULL,
  `identregador` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `cpfpessoaf` varchar(14) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `datadoacao` date NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doador`
--

CREATE TABLE `doador` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `ddd` int(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `nasc` date NOT NULL,
  `senha` varchar(150) NOT NULL,
  `permissao` int(1) DEFAULT 4,
  `datacriacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doador`
--

INSERT INTO `doador` (`cpf`, `nome`, `cep`, `numero`, `complemento`, `ddd`, `tel`, `email`, `nasc`, `senha`, `permissao`, `datacriacao`) VALUES
('123.123.123-65', 'test', 'cep', 12, 'test', 10, 'test', 'test@gmail.com', '2023-05-31', '$2y$10$Pky4irEoZ/Xj.9vFBFWs/.opym9CzjUdRnF0lc1BWyho1J6G646cq', 4, '2023-06-07 20:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `doadorj`
--

CREATE TABLE `doadorj` (
  `cnpj` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `ddd` int(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `permissao` int(1) DEFAULT 4,
  `datacriacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empresaterceira`
--

CREATE TABLE `empresaterceira` (
  `cnpj` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `ddd` int(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entregador`
--

CREATE TABLE `entregador` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `ddd` int(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `nasc` date NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `permissao` int(1) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pessoaf`
--

CREATE TABLE `pessoaf` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `ddd` int(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `nasc` date NOT NULL,
  `senha` varchar(30) NOT NULL,
  `permissao` int(1) DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pessoaj`
--

CREATE TABLE `pessoaj` (
  `cnpj` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `ddd` int(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `permissao` int(1) DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `veiculo`
--

CREATE TABLE `veiculo` (
  `placa` varchar(10) NOT NULL,
  `montadora` varchar(15) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `identregador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpfdoador` (`cpfdoador`),
  ADD KEY `cnpjdoador` (`cnpjdoador`),
  ADD KEY `identregador` (`identregador`),
  ADD KEY `placa` (`placa`),
  ADD KEY `cpfpessoaf` (`cpfpessoaf`),
  ADD KEY `cnpj` (`cnpj`);

--
-- Indexes for table `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `doadorj`
--
ALTER TABLE `doadorj`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `empresaterceira`
--
ALTER TABLE `empresaterceira`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cnpj` (`cnpj`);

--
-- Indexes for table `pessoaf`
--
ALTER TABLE `pessoaf`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `pessoaj`
--
ALTER TABLE `pessoaj`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `identregador` (`identregador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entregador`
--
ALTER TABLE `entregador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`cpfdoador`) REFERENCES `doador` (`cpf`),
  ADD CONSTRAINT `doacao_ibfk_2` FOREIGN KEY (`cnpjdoador`) REFERENCES `doadorj` (`cnpj`),
  ADD CONSTRAINT `doacao_ibfk_3` FOREIGN KEY (`identregador`) REFERENCES `entregador` (`id`),
  ADD CONSTRAINT `doacao_ibfk_4` FOREIGN KEY (`placa`) REFERENCES `veiculo` (`placa`),
  ADD CONSTRAINT `doacao_ibfk_5` FOREIGN KEY (`cpfpessoaf`) REFERENCES `pessoaf` (`cpf`),
  ADD CONSTRAINT `doacao_ibfk_6` FOREIGN KEY (`cnpj`) REFERENCES `pessoaj` (`cnpj`);

--
-- Constraints for table `entregador`
--
ALTER TABLE `entregador`
  ADD CONSTRAINT `entregador_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `empresaterceira` (`cnpj`);

--
-- Constraints for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`identregador`) REFERENCES `entregador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;