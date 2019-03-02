-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 02-Mar-2019 às 06:31
-- Versão do servidor: 5.7.20
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assistenciatecnica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadcliente`
--

CREATE TABLE `cadcliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadcliente`
--

INSERT INTO `cadcliente` (`idCliente`, `nome`, `telefone`, `email`, `endereco`, `complemento`, `bairro`, `cidade`) VALUES
(1, 'jardriel ', 85528894, 'jardriel.redes18', 'rua 01 ', 'apt 103', 'centro', NULL),
(2, 'mae ', 85747989, 'sandramaria@gmail.com', 'rua 01 ', 'apt 103', 'centro', NULL),
(8, 'teste cliente', 11, 'teste@131', '22', 'rr', 'rr', 'rr'),
(9, 'jardriel', 88, 'Jardriel@gmail.com', 'aa', 'aa', 'aa', 'aa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadmaterial`
--

CREATE TABLE `cadmaterial` (
  `idMaterial` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorCompra` double NOT NULL,
  `valorVenda` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadmaterial`
--

INSERT INTO `cadmaterial` (`idMaterial`, `nome`, `tipo`, `quantidade`, `valorCompra`, `valorVenda`) VALUES
(1, 'NoteBook Positivo', 'Modelo 467', 2, 1200, 1500),
(2, 'teclados oak', 'slim', 5, 80, 100),
(3, 'display', 'celular', 5, 80, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadservico`
--

CREATE TABLE `cadservico` (
  `idServico` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `tipoServico` varchar(150) NOT NULL,
  `valorServico` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadservico`
--

INSERT INTO `cadservico` (`idServico`, `idMaterial`, `tipoServico`, `valorServico`) VALUES
(1, 1, 'manutencao', 100),
(2, 2, 'revisao', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadusuario`
--

CREATE TABLE `cadusuario` (
  `idUsuarios` int(11) NOT NULL,
  `nomeUsuarios` varchar(150) NOT NULL,
  `emailUsuarios` varchar(150) NOT NULL,
  `funcao` varchar(150) NOT NULL,
  `nivel` int(1) NOT NULL,
  `senhaUsuario` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadusuario`
--

INSERT INTO `cadusuario` (`idUsuarios`, `nomeUsuarios`, `emailUsuarios`, `funcao`, `nivel`, `senhaUsuario`) VALUES
(1, 'root', 'root@123', 'administrador', 3, 'qwe123'),
(2, 'jardriel', 'jardri@123', 'administrador', 3, 'qwe123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordensdeservicos`
--

CREATE TABLE `ordensdeservicos` (
  `idOS` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ordensdeservicos`
--

INSERT INTO `ordensdeservicos` (`idOS`, `idCliente`, `idMaterial`, `idServico`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadcliente`
--
ALTER TABLE `cadcliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cadmaterial`
--
ALTER TABLE `cadmaterial`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indexes for table `cadservico`
--
ALTER TABLE `cadservico`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `idMaterial` (`idMaterial`);

--
-- Indexes for table `cadusuario`
--
ALTER TABLE `cadusuario`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `emailUsuarios` (`emailUsuarios`);

--
-- Indexes for table `ordensdeservicos`
--
ALTER TABLE `ordensdeservicos`
  ADD PRIMARY KEY (`idOS`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idMaterial` (`idMaterial`),
  ADD KEY `idServico` (`idServico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadcliente`
--
ALTER TABLE `cadcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cadmaterial`
--
ALTER TABLE `cadmaterial`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cadservico`
--
ALTER TABLE `cadservico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cadusuario`
--
ALTER TABLE `cadusuario`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordensdeservicos`
--
ALTER TABLE `ordensdeservicos`
  MODIFY `idOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadservico`
--
ALTER TABLE `cadservico`
  ADD CONSTRAINT `cadservico_ibfk_1` FOREIGN KEY (`idMaterial`) REFERENCES `cadmaterial` (`idMaterial`);

--
-- Limitadores para a tabela `ordensdeservicos`
--
ALTER TABLE `ordensdeservicos`
  ADD CONSTRAINT `ordensdeservicos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cadcliente` (`idCliente`),
  ADD CONSTRAINT `ordensdeservicos_ibfk_2` FOREIGN KEY (`idMaterial`) REFERENCES `cadmaterial` (`idMaterial`),
  ADD CONSTRAINT `ordensdeservicos_ibfk_3` FOREIGN KEY (`idServico`) REFERENCES `cadservico` (`idServico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
