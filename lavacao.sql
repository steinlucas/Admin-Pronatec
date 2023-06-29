-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2019 às 02:52
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lavacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor_veiculos`
--

CREATE TABLE IF NOT EXISTS `cor_veiculos` (
  `cd_cor_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_cor_veiculo` varchar(50) NOT NULL,
  PRIMARY KEY (`cd_cor_veiculo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cor_veiculos`
--

INSERT INTO `cor_veiculos` (`cd_cor_veiculo`, `nm_cor_veiculo`) VALUES
(1, 'Amarelo'),
(2, 'Verde'),
(3, 'Preto'),
(4, 'Cinza'),
(5, 'Branco '),
(6, 'Azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `cd_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nm_marca` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`cd_marca`, `nm_marca`) VALUES
(1, 'Ford'),
(2, 'Chovrolet'),
(3, 'Audi'),
(4, 'Fiat'),
(5, 'Chery'),
(6, 'BMW'),
(7, 'Mercedes-Benz'),
(8, 'Rolls-Royce');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `cd_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `cd_marca` int(11) NOT NULL,
  `nm_modelo` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_modelo`),
  KEY `cd_marca` (`cd_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`cd_modelo`, `cd_marca`, `nm_modelo`) VALUES
(9, 1, 'KA'),
(10, 2, 'Onix'),
(11, 3, 'A3'),
(12, 4, 'Palio'),
(13, 5, 'QQ'),
(14, 6, 'X1'),
(15, 7, '320i'),
(16, 8, ' phantom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
  `cd_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nm_perfil` varchar(100) NOT NULL,
  `ds_cor_perfil` varchar(100) NOT NULL,
  `ds_img_perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`cd_perfil`, `nm_perfil`, `ds_cor_perfil`, `ds_img_perfil`) VALUES
(1, 'Administrator', 'danger', ''),
(2, 'Cliente', 'success', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_veiculo`
--

CREATE TABLE IF NOT EXISTS `tipo_veiculo` (
  `cd_tipo_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_veiculo` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_tipo_veiculo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_veiculo`
--

INSERT INTO `tipo_veiculo` (`cd_tipo_veiculo`, `nm_tipo_veiculo`) VALUES
(1, 'carro'),
(2, 'caminhão'),
(3, 'moto'),
(4, 'Utilitário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cd_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(100) NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `ds_senha` varchar(100) NOT NULL,
  `cd_perfil` int(11) NOT NULL,
  `fg_ativo` int(11) NOT NULL,
  `tp_sexo` enum('F','M','I') NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `dt_cadastro` date NOT NULL,
  `fg_idoso` int(11) NOT NULL,
  `fg_vip` int(11) NOT NULL,
  `fg_nec_especial` int(11) NOT NULL,
  `ds_nec_especial` varchar(500) NOT NULL,
  `dt_alteracao_senha` datetime NOT NULL,
  PRIMARY KEY (`cd_usuario`),
  KEY `cd_perfil` (`cd_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nm_usuario`, `ds_email`, `ds_senha`, `cd_perfil`, `fg_ativo`, `tp_sexo`, `dt_nascimento`, `dt_cadastro`, `fg_idoso`, `fg_vip`, `fg_nec_especial`, `ds_nec_especial`, `dt_alteracao_senha`) VALUES
(1, 'Lucas', 'lstein@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '0000-00-00 00:00:00'),
(2, 'Alfredo', 'alfredo@donalucia.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '0000-00-00 00:00:00'),
(3, 'Patrick', 'patrick@estrela.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '0000-00-00 00:00:00'),
(5, 'wdwdw', 'de', '614ffc31f4fee8657c20ce646171865677c3e653', 2, 1, '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '0000-00-00 00:00:00'),
(6, 'Joe', 'luiza@kischel.com', '123', 2, 1, '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '0000-00-00 00:00:00'),
(7, 'la', 'la@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, 'F', '2003-03-03', '2019-04-26', 0, 0, 0, 'nehuma', '0000-00-00 00:00:00'),
(8, 'kakaka', 'ka@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, 'I', '1111-01-01', '2019-04-26', 0, 0, 0, '', '0000-00-00 00:00:00'),
(9, 'yago', 'yago@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, 'M', '2000-04-15', '2019-05-02', 0, 0, 0, '', '0000-00-00 00:00:00'),
(10, 'enaile123', 'enaile@gmail.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2, 1, 'F', '2000-01-02', '2019-05-03', 0, 0, 0, 'lalal', '0000-00-00 00:00:00'),
(11, 'novo', 'a@a.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, 'M', '2001-01-01', '2019-05-03', 0, 0, 0, 'doido', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `cd_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `cd_tipo_veiculo` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_modelo` int(11) NOT NULL,
  `nr_ano` int(11) NOT NULL,
  `cd_cor_veiculo` int(11) NOT NULL,
  `ds_placa` varchar(20) NOT NULL,
  `cd_marca` int(11) NOT NULL,
  PRIMARY KEY (`cd_veiculo`),
  KEY `cd_cor_veiculo` (`cd_cor_veiculo`),
  KEY `cd_tipo_veiculo` (`cd_tipo_veiculo`),
  KEY `cd_usuario` (`cd_usuario`),
  KEY `cd_modelo` (`cd_modelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`cd_veiculo`, `cd_tipo_veiculo`, `cd_usuario`, `cd_modelo`, `nr_ano`, `cd_cor_veiculo`, `ds_placa`, `cd_marca`) VALUES
(1, 2, 6, 16, 2019, 2, 'hhh3223', 1),
(2, 2, 10, 16, 2019, 2, 'hhh3223', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`cd_marca`) REFERENCES `marca` (`cd_marca`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cd_perfil`) REFERENCES `perfil_usuario` (`cd_perfil`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_4` FOREIGN KEY (`cd_modelo`) REFERENCES `modelo` (`cd_modelo`),
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`cd_cor_veiculo`) REFERENCES `cor_veiculos` (`cd_cor_veiculo`),
  ADD CONSTRAINT `veiculo_ibfk_2` FOREIGN KEY (`cd_tipo_veiculo`) REFERENCES `tipo_veiculo` (`cd_tipo_veiculo`),
  ADD CONSTRAINT `veiculo_ibfk_3` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
