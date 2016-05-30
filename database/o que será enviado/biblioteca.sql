-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 09:55 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `assunto`
--

CREATE TABLE IF NOT EXISTS `assunto` (
  `idassunto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`idassunto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `idautor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='autores dos livros' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chefes`
--

CREATE TABLE IF NOT EXISTS `chefes` (
  `idchefes` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`idchefes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Chefes dos departamentos';

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `idchefes` int(11) NOT NULL,
  PRIMARY KEY (`idDepartamento`,`idchefes`),
  KEY `fk_departamento_chefes1_idx` (`idchefes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Departamento do funcionário que concedeu o empréstimo.\nDeyvison Rodrigo' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `devolucao`
--

CREATE TABLE IF NOT EXISTS `devolucao` (
  `iddevolucao` int(11) NOT NULL AUTO_INCREMENT,
  `idfuncionario` int(11) NOT NULL,
  `idemprestimo` int(11) NOT NULL,
  PRIMARY KEY (`iddevolucao`,`idfuncionario`,`idemprestimo`),
  KEY `fk_devolucao_funcionario1_idx` (`idfuncionario`),
  KEY `fk_devolucao_emprestimo1_idx` (`idemprestimo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `ideditora` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ideditora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo`
--

CREATE TABLE IF NOT EXISTS `emprestimo` (
  `idemprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idexemplar` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `previsao_devolucao` date NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idemprestimo`,`idusuario`,`idexemplar`,`idfuncionario`),
  KEY `fk_emprestimo_usuario1_idx` (`idusuario`),
  KEY `fk_emprestimo_exemplar1_idx` (`idexemplar`),
  KEY `fk_emprestimo_funcionario1_idx` (`idfuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de empréstimos\nDeyvison Rodrigo' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exemplar`
--

CREATE TABLE IF NOT EXISTS `exemplar` (
  `idexemplar` int(11) NOT NULL AUTO_INCREMENT,
  `data_aquisicao` date NOT NULL,
  `idobra` int(11) NOT NULL,
  `idsituacao` int(11) NOT NULL,
  PRIMARY KEY (`idexemplar`,`idobra`,`idsituacao`),
  KEY `fk_exemplar_obra1_idx` (`idobra`),
  KEY `fk_exemplar_situacao1_idx` (`idsituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `salario` double DEFAULT NULL,
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idfuncionario`,`idDepartamento`),
  KEY `fk_funcionario_departamento1_idx` (`idDepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Funcionário ligado a Devolução..\nDeyvison Rodrigo' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `obra`
--

CREATE TABLE IF NOT EXISTS `obra` (
  `idobra` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `ano_publicacao` varchar(7) NOT NULL DEFAULT '00/0000',
  `ideditora` int(11) NOT NULL,
  `idautor` int(11) NOT NULL,
  `idassunto` int(11) NOT NULL,
  PRIMARY KEY (`idobra`,`ideditora`,`idautor`,`idassunto`),
  KEY `fk_obra_editora1_idx` (`ideditora`),
  KEY `fk_obra_autor1_idx` (`idautor`),
  KEY `fk_obra_assunto1_idx` (`idassunto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `situacao`
--

CREATE TABLE IF NOT EXISTS `situacao` (
  `idsituacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idsituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Situação:\n1 -> Disponivel\n2 -> Emprestado\n3 -> Em Manutencao' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '1' COMMENT '1->Ativo, 2->suspenso, 3->Em Debito',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='usuarios do sistema de bibliateca: \nauthor: deyvison Rodrigo' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_chefes1` FOREIGN KEY (`idchefes`) REFERENCES `chefes` (`idchefes`);

--
-- Constraints for table `devolucao`
--
ALTER TABLE `devolucao`
  ADD CONSTRAINT `fk_devolucao_emprestimo1` FOREIGN KEY (`idemprestimo`) REFERENCES `emprestimo` (`idemprestimo`),
  ADD CONSTRAINT `fk_devolucao_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`);

--
-- Constraints for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_exemplar1` FOREIGN KEY (`idexemplar`) REFERENCES `exemplar` (`idexemplar`),
  ADD CONSTRAINT `fk_emprestimo_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`),
  ADD CONSTRAINT `fk_emprestimo_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `exemplar`
--
ALTER TABLE `exemplar`
  ADD CONSTRAINT `fk_exemplar_obra1` FOREIGN KEY (`idobra`) REFERENCES `obra` (`idobra`),
  ADD CONSTRAINT `fk_exemplar_situacao1` FOREIGN KEY (`idsituacao`) REFERENCES `situacao` (`idsituacao`);

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_departamento1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`);

--
-- Constraints for table `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `fk_obra_assunto1` FOREIGN KEY (`idassunto`) REFERENCES `assunto` (`idassunto`),
  ADD CONSTRAINT `fk_obra_autor1` FOREIGN KEY (`idautor`) REFERENCES `autor` (`idautor`),
  ADD CONSTRAINT `fk_obra_editora1` FOREIGN KEY (`ideditora`) REFERENCES `editora` (`ideditora`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
