-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 01:55 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `assunto`
--

INSERT INTO `assunto` (`idassunto`, `descricao`) VALUES
(1, 'Magia, Fantasia, Bruxaria'),
(2, 'Cálculo, Matemática'),
(3, 'Próbabilidade, Estatística'),
(4, 'Eletricidade, Física 3, Circuitos Elétricos, Circuitos de Potência.'),
(5, 'Programação, Linguagens de Programação, Developer'),
(6, 'Aventura'),
(7, 'Romance'),
(8, 'Auto-Ajuda'),
(9, 'Biografia'),
(10, 'Mecânica'),
(11, 'Sinais, Sistemas linearas'),
(12, 'Filtros Digitais, Filtros Analógicos'),
(13, 'Circuitos Digitais, Logica Computacional'),
(14, 'Biologia'),
(15, 'História');

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `idautor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='autores dos livros' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`idautor`, `nome`) VALUES
(1, 'Simon Haykin '),
(2, 'B.P. Lathi'),
(3, 'Smith Adel S. Sedra'),
(4, 'Gustavo Sapierri'),
(5, 'Eridson Fagundes'),
(6, 'Bento gonçalves'),
(7, 'choller Wings'),
(8, 'Abel Cabral'),
(9, 'Lumine Taylor'),
(10, 'Freed Crazy');

-- --------------------------------------------------------

--
-- Table structure for table `chefes`
--

CREATE TABLE IF NOT EXISTS `chefes` (
  `idchefes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`idchefes`),
  KEY `idchefes` (`idchefes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Chefes dos departamentos' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `chefes`
--

INSERT INTO `chefes` (`idchefes`, `nome`) VALUES
(1, 'Vicente Angelo'),
(2, 'Márcio Rodrigues'),
(3, 'Hertz Wilton');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Departamento do funcionário que concedeu o empréstimo.\nDeyvison Rodrigo' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nome`, `idchefes`) VALUES
(1, 'Física', 1),
(2, 'Comunicações', 2),
(3, 'Tecnologia da Informação', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `editora`
--

INSERT INTO `editora` (`ideditora`, `nome`, `cidade`) VALUES
(1, 'EBAL', 'São Paulo'),
(2, 'RGE', 'Recife'),
(3, 'NOVATEC', 'Rio de Janeiro'),
(4, 'Grupo Lund', 'Pernambuco'),
(5, 'Editora Hemos', 'São Paulo'),
(6, 'CNBB', 'São paulo'),
(7, 'Lote 42', 'Paraíba'),
(8, 'Deriva', 'Natal'),
(9, 'Vecchi', 'Rio grande do sul');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela de empréstimos\nDeyvison Rodrigo' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `emprestimo`
--

INSERT INTO `emprestimo` (`idemprestimo`, `idusuario`, `idexemplar`, `data_emprestimo`, `previsao_devolucao`, `idfuncionario`) VALUES
(1, 6, 18, '2016-05-25', '2016-06-10', 1),
(2, 4, 17, '2016-05-15', '2016-05-31', 3),
(4, 7, 1, '2016-05-01', '2016-06-15', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `exemplar`
--

INSERT INTO `exemplar` (`idexemplar`, `data_aquisicao`, `idobra`, `idsituacao`) VALUES
(1, '2016-06-01', 5, 2),
(2, '2016-03-15', 2, 3),
(3, '2016-01-25', 1, 1),
(4, '2016-01-25', 1, 1),
(5, '2016-01-25', 1, 1),
(6, '2016-01-25', 1, 1),
(7, '2016-01-25', 1, 1),
(8, '2016-01-25', 1, 1),
(9, '2016-06-01', 2, 1),
(10, '2016-06-01', 2, 1),
(11, '2016-06-01', 2, 1),
(12, '2016-06-01', 2, 1),
(13, '2016-06-01', 2, 1),
(14, '2016-06-01', 2, 1),
(15, '2016-06-01', 2, 1),
(16, '2016-06-01', 2, 1),
(17, '2016-03-09', 2, 2),
(18, '2016-04-05', 7, 2),
(19, '2015-08-18', 9, 1),
(20, '2015-08-18', 9, 1),
(21, '2015-08-18', 9, 1),
(22, '2015-08-18', 9, 1),
(23, '2015-08-18', 9, 1),
(24, '2015-08-18', 9, 1),
(25, '2015-08-18', 9, 1),
(26, '2015-08-18', 9, 1),
(27, '2015-08-18', 9, 1),
(28, '2015-08-18', 9, 1),
(29, '2015-08-18', 9, 1),
(30, '2015-08-18', 9, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Funcionário ligado a Devolução..\nDeyvison Rodrigo' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nome`, `salario`, `idDepartamento`) VALUES
(1, 'Julie Mendonça', 1890, 2),
(2, 'Adré Marcos Oliveira', 2500, 2),
(3, 'Maria Eduarda', 2000, 1),
(4, 'Fernando Pedrosa', 1500, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `obra`
--

INSERT INTO `obra` (`idobra`, `titulo`, `ano_publicacao`, `ideditora`, `idautor`, `idassunto`) VALUES
(1, 'Sistemas de Comunicação', '05/2010', 6, 1, 11),
(2, 'A Fábrica de Chocolate', '02/2015', 4, 3, 1),
(3, 'Projetando Banco de Dados', '12/2016', 7, 2, 5),
(4, 'As cronicas de gelo e fogo', '02/2008', 2, 8, 1),
(5, 'Cáculo 2', '01/2014', 8, 10, 2),
(6, 'O mundo mágico de Oz', '05/2000', 5, 6, 1),
(7, 'Aladin e a Lâmpada Mágica', '05/2005', 8, 8, 6),
(8, 'Eletricidade Aplicada', '04/2014', 6, 9, 4),
(9, 'Processos Estocásticos', '04/1999', 6, 4, 3),
(10, 'Como Viver Saudável', '12/2015', 2, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `situacao`
--

CREATE TABLE IF NOT EXISTS `situacao` (
  `idsituacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idsituacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Situação:\n1 -> Disponivel\n2 -> Emprestado\n3 -> Em Manutencao' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `situacao`
--

INSERT INTO `situacao` (`idsituacao`, `descricao`) VALUES
(1, 'ocupado'),
(2, 'disponível'),
(3, 'em manutenção');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='usuarios do sistema de bibliateca: \nauthor: deyvison Rodrigo' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `telefone`, `login`, `senha`, `situacao`) VALUES
(3, 'LUAN ANDERSON TEIXEIRA DE LIMA', '(84) 98847-5647', 'LUAN', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'DERVIS SERAFIM DA SILVA ', '(84) 98847-5648', 'DERVIS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'DEYVISON RODRIGO BERNARDO ESTEVAM', '(84) 98847-4265', 'DEYVISON', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'OTTONY CHAMBERLAINE TAVARES DA COSTA', '(84) 98847-4796', 'OTTONY', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'ANDERSON CLAUDIO RODRIGUES DA SILVA', '(84) 98847-1358', 'ANDERSON', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `usuarios_atrasados`
--
CREATE TABLE IF NOT EXISTS `usuarios_atrasados` (
`iduser` int(11)
,`nome` varchar(100)
,`idobra` int(11)
,`titulo` varchar(60)
,`previsao_devolucao` date
,`idexemplar` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `usuarios_atrasados`
--
DROP TABLE IF EXISTS `usuarios_atrasados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_atrasados` AS select `usuario`.`idusuario` AS `iduser`,`usuario`.`nome` AS `nome`,`obra`.`idobra` AS `idobra`,`obra`.`titulo` AS `titulo`,`emprestimo`.`previsao_devolucao` AS `previsao_devolucao`,`exemplar`.`idexemplar` AS `idexemplar` from (((`usuario` join `emprestimo`) join `obra`) join `exemplar` on(((`usuario`.`idusuario` = `emprestimo`.`idusuario`) and (`emprestimo`.`idexemplar` = `exemplar`.`idexemplar`) and (`exemplar`.`idobra` = `obra`.`idobra`) and (`emprestimo`.`previsao_devolucao` <= now()))));

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
