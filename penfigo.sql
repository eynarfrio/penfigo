-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2015 at 03:17 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penfigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `areaampollas`
--

CREATE TABLE IF NOT EXISTS `areaampollas` (
`id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `area_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `numero` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `areaampollas`
--

INSERT INTO `areaampollas` (`id`, `tipo`, `area_id`, `paciente_id`, `medico_id`, `estado`, `numero`, `created`, `modified`) VALUES
(1, 'Mucosas', 1, 1, 1, 1, 1, '2015-07-19 21:22:05', '2015-08-16 23:59:40'),
(2, 'Mucosas', 2, 1, 1, 1, 1, '2015-07-19 21:22:05', '2015-08-16 23:59:40'),
(3, 'Piel', 3, 1, 1, 1, 1, '2015-07-20 00:34:45', '2015-07-26 19:33:12'),
(4, 'Piel', 4, 1, 1, 1, 1, '2015-07-20 00:34:45', '2015-07-26 19:33:13'),
(5, 'Mucosas', 1, 3, 4, 1, 2, '2015-08-21 11:43:50', '2015-08-21 11:47:48'),
(6, 'Mucosas', 2, 3, 4, 0, 2, '2015-08-21 11:43:50', '2015-08-21 11:47:48'),
(7, 'Mucosas', 5, 3, 4, 0, 2, '2015-08-21 11:43:50', '2015-08-21 11:47:48'),
(8, 'Piel', 3, 3, 4, 0, 2, '2015-08-21 11:45:09', '2015-08-21 11:48:06'),
(9, 'Piel', 4, 3, 4, 0, 2, '2015-08-21 11:45:09', '2015-08-21 11:48:06'),
(10, 'Piel', 6, 3, 4, 1, 2, '2015-08-21 11:45:09', '2015-08-21 11:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
`id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `tipo`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Mucosas', 'Conjuntiva', 'La conjuntiva es una membrana mucosa que reviste la cara posterior de los dos parpados y la parte anterior o libre del globo del ojo.', '55c4e27b-b724-4273-807a-230ec0a8006a.jpg'),
(2, 'Mucosas', 'Genitales', 'Organos sexuales externos femeninos o masculinos', '55c4e2c6-c358-44bc-b3bb-065dc0a8006a.jpg'),
(3, 'Piel', 'Brazos', 'Miembro del cuerpo, que comprende desde el hombro a la extremidad de la mano.', '55c4e2f8-ffc0-4f6a-a401-23bfc0a8006a.jpg'),
(4, 'Piel', 'Piernas', 'Extremidad inferior del cuerpo humano, que va desde el tronco hasta el pie.', '55c4e40d-2a70-4f27-9d63-2141c0a8006a.jpg'),
(5, 'Mucosas', 'Boca', 'Abertura anterior del tubo digestivo, situada en la cabeza, que sirve de entrada a la cavidad bucal.', '55d73e99-6438-4b28-9f2e-11d2c0a8006a.jpg'),
(6, 'Piel', 'CueroCabelludo', 'Piel en donde nace el cabello,', '55d73ebe-f10c-44bf-9f22-1157c0a8006a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `examenes`
--

CREATE TABLE IF NOT EXISTS `examenes` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `examenes`
--

INSERT INTO `examenes` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Biopsia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
`id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `laboratorios`
--

INSERT INTO `laboratorios` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Hemograma', NULL, NULL, NULL),
(2, 'Glicemia', NULL, NULL, NULL),
(3, 'Creatinina', NULL, NULL, NULL),
(4, 'Electrolitos en sangre', NULL, NULL, NULL),
(5, 'Hepatograma', NULL, NULL, NULL),
(6, 'EGO', NULL, NULL, NULL),
(7, 'ASTO', NULL, NULL, NULL),
(8, 'PCR', NULL, NULL, NULL),
(9, 'Coproparasitologia simple', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`) VALUES
(1, 'La Paz');

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombres` varchar(70) NOT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `ci` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tipo_medico` varchar(20) NOT NULL,
  `telefonos` varchar(40) DEFAULT NULL,
  `centro_medico` text,
  `estado` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id`, `user_id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `fecha_nacimiento`, `lugar`, `sexo`, `tipo_medico`, `telefonos`, `centro_medico`, `estado`, `created`, `modified`) VALUES
(1, 1, 'Eynar David', 'Torrez', 'Torrez', '6847560', '1991-12-29', 'La Paz', 'Masculino', 'Medico General', '60147852', 'Hospital inventado ubicado en la calle no me acuredo con numero 123 de Lunes a Sabado en horarios de 8:00 a 16:00', 'Activo', '2015-07-13 00:47:57', '2015-08-17 00:05:07'),
(2, 0, 'Alicia ', 'Mercado', 'Calle', '11223344', '1987-05-11', 'La Paz', 'Femenino', 'Dermatologo', '1531564', 'dsadhjsabhj dmskalj', 'Activo', '2015-08-08 00:02:08', '2015-08-08 00:02:08'),
(3, 8, 'Jose Miguel', 'Mamani', 'Castro', '996633', '1985-04-15', 'La Paz', 'Masculino', 'Dermatologo', '620516484', 'dbusia v agfuigabs fbi bfa', 'Activo', '2015-08-17 00:52:57', '2015-08-17 01:03:27'),
(4, 9, 'Pedro', 'Pica', 'Piedra', '995511', '1984-04-25', 'La Paz', 'Masculino', 'Dermatologo', '426456414', 'bdhw bhew fbhwe bfhewfhhefbewf wgfwe ', 'Activo', '2015-08-21 11:19:42', '2015-08-21 11:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
`id` int(11) NOT NULL,
  `nombres` varchar(70) NOT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `ci` varchar(20) NOT NULL,
  `lugar` varchar(25) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `telefonos` varchar(30) DEFAULT NULL,
  `antecedentes_personales` text,
  `medicacion` text,
  `antecedentes_familiares` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `lugar`, `fecha_nacimiento`, `sexo`, `telefonos`, `antecedentes_personales`, `medicacion`, `antecedentes_familiares`, `created`, `modified`) VALUES
(1, 'Marcelo', 'Mayta', 'Salas', '456210655', 'La Paz', '1990-05-21', 'Masculino', '789456', NULL, NULL, NULL, '2015-07-14 00:16:25', '2015-07-16 12:55:47'),
(2, 'Estefani', 'Valdivieso', 'Camargo', '775533', 'La Paz', '1985-06-03', 'Femenino', '70436985', 'mis antecedentes personales', 'mis medicaciones', 'mis antecedentes familiares', '2015-08-17 23:35:43', '2015-08-17 23:35:43'),
(3, 'Javier', 'Torrico', 'Morales', '1234567', 'La Paz', '1983-02-02', 'Masculino', '4158641534', 'sgdahd vhja', 'fgseh fbhes fb', ' gfhs fvhsfjdsds', '2015-08-21 11:33:44', '2015-08-21 11:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_laboratorios`
--

CREATE TABLE IF NOT EXISTS `pacientes_laboratorios` (
`id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `laboratorio_id` int(11) NOT NULL,
  `hacer` int(1) DEFAULT NULL,
  `hecho` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pacientes_laboratorios`
--

INSERT INTO `pacientes_laboratorios` (`id`, `numero`, `paciente_id`, `laboratorio_id`, `hacer`, `hecho`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 0, '2015-08-20 08:57:32', '2015-08-20 09:03:06'),
(2, 1, 1, 2, 1, 1, '2015-08-20 08:57:32', '2015-08-20 09:03:06'),
(3, 2, 3, 1, 1, 1, '2015-08-21 11:53:35', '2015-08-21 11:53:52'),
(4, 2, 3, 2, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(5, 2, 3, 3, 0, 0, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(6, 2, 3, 4, 1, 0, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(7, 2, 3, 5, 0, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:52'),
(8, 2, 3, 6, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(9, 2, 3, 7, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(10, 2, 3, 8, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53'),
(11, 2, 3, 9, 1, 1, '2015-08-21 11:53:36', '2015-08-21 11:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_medicos`
--

CREATE TABLE IF NOT EXISTS `pacientes_medicos` (
`id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pacientes_medicos`
--

INSERT INTO `pacientes_medicos` (`id`, `paciente_id`, `medico_id`, `created`, `modified`) VALUES
(1, 1, 1, '2015-07-14 00:16:25', '2015-07-14 00:16:25'),
(2, 2, 1, '2015-08-17 23:35:43', '2015-08-17 23:35:43'),
(3, 1, 2, '2015-08-21 11:09:34', '2015-08-21 11:09:34'),
(4, 3, 4, '2015-08-21 11:33:44', '2015-08-21 11:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_pielsintomas`
--

CREATE TABLE IF NOT EXISTS `pacientes_pielsintomas` (
`id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `pielsintoma_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pacientes_pielsintomas`
--

INSERT INTO `pacientes_pielsintomas` (`id`, `paciente_id`, `pielsintoma_id`, `estado`, `medico_id`, `numero`, `created`, `modified`) VALUES
(1, 1, 1, 0, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(2, 1, 2, 1, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(3, 1, 3, 0, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(4, 1, 4, 1, 1, 1, '2015-07-21 00:39:09', '2015-08-16 23:46:48'),
(5, 3, 1, 0, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(6, 3, 2, 1, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(7, 3, 3, 1, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38'),
(8, 3, 4, 1, 4, 2, '2015-08-21 11:43:38', '2015-08-21 11:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_resultados`
--

CREATE TABLE IF NOT EXISTS `pacientes_resultados` (
`id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `resultado_id` int(11) NOT NULL,
  `examene_id` int(11) DEFAULT NULL,
  `observacion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pacientes_resultados`
--

INSERT INTO `pacientes_resultados` (`id`, `numero`, `paciente_id`, `resultado_id`, `examene_id`, `observacion`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 'dsadsadsasdsasa as eeeeeeeeeeeeee', '2015-08-21 08:35:26', '2015-08-21 08:38:54'),
(2, 1, 1, 2, 2, 'vdfvfdve', '2015-08-21 08:37:29', '2015-08-21 08:37:29'),
(3, 2, 3, 1, 1, 'thjke tber th tgrgregr eghr gtr', '2015-08-21 11:54:18', '2015-08-21 12:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_signos`
--

CREATE TABLE IF NOT EXISTS `pacientes_signos` (
`id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `signo_id` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pacientes_signos`
--

INSERT INTO `pacientes_signos` (`id`, `paciente_id`, `signo_id`, `valor`, `numero`, `created`, `modified`) VALUES
(1, 1, 1, 5.00, 1, '2015-08-19 11:02:58', '2015-08-19 11:06:30'),
(2, 1, 2, 3.00, 1, '2015-08-19 11:02:58', '2015-08-19 11:06:31'),
(3, 3, 1, 20.00, 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(4, 3, 2, 60.00, 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(5, 3, 3, 2.00, 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(6, 3, 4, 60.00, 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11'),
(7, 3, 5, 1.56, 2, '2015-08-21 11:35:11', '2015-08-21 11:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_sintomas`
--

CREATE TABLE IF NOT EXISTS `pacientes_sintomas` (
`id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `sintoma_id` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `pacientes_sintomas`
--

INSERT INTO `pacientes_sintomas` (`id`, `numero`, `paciente_id`, `sintoma_id`, `estado`, `created`, `modified`) VALUES
(15, 1, 1, 1, 1, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(16, 1, 1, 2, 1, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(17, 1, 1, 3, 1, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(18, 1, 1, 4, 0, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(19, 1, 1, 5, 0, '2015-07-23 15:55:43', '2015-08-16 20:08:37'),
(20, 1, 1, 6, 1, '2015-07-23 15:55:44', '2015-08-16 20:08:37'),
(21, 1, 1, 7, 1, '2015-07-23 15:55:44', '2015-08-16 20:08:37'),
(22, 2, 3, 1, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(23, 2, 3, 2, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(24, 2, 3, 3, 1, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(25, 2, 3, 4, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(26, 2, 3, 5, 1, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(27, 2, 3, 6, 0, '2015-08-21 11:36:09', '2015-08-21 11:40:50'),
(28, 2, 3, 7, 1, '2015-08-21 11:36:09', '2015-08-21 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_tipoampollas`
--

CREATE TABLE IF NOT EXISTS `pacientes_tipoampollas` (
`id` int(11) NOT NULL,
  `areaampolla_id` int(11) NOT NULL,
  `tipoampolla_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `pacientes_tipoampollas`
--

INSERT INTO `pacientes_tipoampollas` (`id`, `areaampolla_id`, `tipoampolla_id`, `estado`, `created`, `modified`) VALUES
(1, 1, 1, 0, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(2, 1, 2, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(3, 1, 3, 0, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(4, 1, 4, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(5, 2, 1, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(6, 2, 2, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(7, 2, 3, 0, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(8, 2, 4, 1, '2015-07-19 22:45:51', '2015-08-16 23:59:44'),
(9, 3, 5, 0, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(10, 3, 6, 1, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(11, 4, 5, 1, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(12, 4, 6, 0, '2015-07-20 00:43:26', '2015-07-21 11:17:38'),
(13, 5, 1, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(14, 5, 2, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(15, 5, 3, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(16, 5, 4, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(17, 5, 5, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(18, 5, 6, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(19, 5, 7, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(20, 5, 8, 0, '2015-08-21 11:44:11', '2015-08-21 11:47:51'),
(21, 5, 9, 1, '2015-08-21 11:44:11', '2015-08-21 11:47:52'),
(22, 10, 10, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:08'),
(23, 10, 11, 1, '2015-08-21 11:45:15', '2015-08-21 11:48:08'),
(24, 10, 12, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:08'),
(25, 10, 13, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:09'),
(26, 10, 14, 0, '2015-08-21 11:45:15', '2015-08-21 11:48:09'),
(27, 10, 15, 1, '2015-08-21 11:45:15', '2015-08-21 11:48:09'),
(28, 10, 16, 0, '2015-08-21 11:45:16', '2015-08-21 11:48:09'),
(29, 10, 17, 0, '2015-08-21 11:45:16', '2015-08-21 11:48:09'),
(30, 10, 18, 1, '2015-08-21 11:45:16', '2015-08-21 11:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_tipoerociones`
--

CREATE TABLE IF NOT EXISTS `pacientes_tipoerociones` (
`id` int(11) NOT NULL,
  `tipoerocione_id` int(11) NOT NULL,
  `areaampolla_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pacientes_tipoerociones`
--

INSERT INTO `pacientes_tipoerociones` (`id`, `tipoerocione_id`, `areaampolla_id`, `estado`, `created`, `modified`) VALUES
(1, 1, 1, 1, '2015-07-26 21:30:06', '2015-08-17 00:04:16'),
(2, 2, 1, 0, '2015-07-26 21:30:06', '2015-08-16 23:53:19'),
(3, 1, 2, 1, '2015-07-26 21:30:06', '2015-08-17 00:04:16'),
(4, 2, 2, 0, '2015-07-26 21:30:06', '2015-08-16 23:53:19'),
(5, 1, 5, 1, '2015-08-21 11:47:36', '2015-08-21 11:47:54'),
(6, 3, 10, 1, '2015-08-21 11:48:12', '2015-08-21 11:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `penfigoampollas`
--

CREATE TABLE IF NOT EXISTS `penfigoampollas` (
`id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `tipoampolla_id` int(11) NOT NULL,
  `importancia` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `penfigoampollas`
--

INSERT INTO `penfigoampollas` (`id`, `penfigo_id`, `area_id`, `tipoampolla_id`, `importancia`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, '2015-08-02 23:20:24', '2015-08-02 23:20:24'),
(2, 1, 3, 3, 1, '2015-08-02 23:20:33', '2015-08-02 23:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `penfigoerociones`
--

CREATE TABLE IF NOT EXISTS `penfigoerociones` (
`id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `tipoerocione_id` int(11) NOT NULL,
  `importancia` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penfigos`
--

CREATE TABLE IF NOT EXISTS `penfigos` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `penfigos`
--

INSERT INTO `penfigos` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Penfigo Vulgar', 'Representa 80 a 85% de los casos la erupciÃ³n empieza en cualquier parte de la piel o mucosas (60%), con predominio en piel cabelluda, \r\npliegues inguinales y axilares, ombligo y regiÃ³n submamaria.\r\n Hay ampollas flÃ¡cidas de I a 2 cm, que aparecen en piel sanao  eritematosa, y que al romperse dejan zonas denudadas, excoriaciones y costras melicÃ©ricas. \r\nHay dolor, pero no siempre prurito', '2015-07-29 23:59:04', '2015-08-07 12:50:33'),
(2, 'Penfigo foliaceo', 'Es una dermatosis que empieza como pÃ©nfigo o dermatitis seborreica y se transforma en eritrodermia exfoliativa y rezumante (de Darier). La ampolla es flÃ¡cida y delgada, y tiene una base eritematosa. No afecta las mucosas', '2015-08-07 12:51:39', '2015-08-07 12:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `penfigosintomas`
--

CREATE TABLE IF NOT EXISTS `penfigosintomas` (
`id` int(11) NOT NULL,
  `pielsintoma_id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `importancia` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `penfigosintomas`
--

INSERT INTO `penfigosintomas` (`id`, `pielsintoma_id`, `penfigo_id`, `importancia`, `created`, `modified`) VALUES
(1, 2, 1, NULL, '2015-07-30 00:53:59', '2015-08-02 23:22:03'),
(2, 3, 1, NULL, '2015-07-30 00:54:31', '2015-07-30 00:58:54'),
(3, 1, 1, NULL, '2015-07-30 00:58:27', '2015-07-30 00:58:46'),
(4, 4, 1, 1, '2015-07-30 00:59:01', '2015-07-30 00:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `pielsintomas`
--

CREATE TABLE IF NOT EXISTS `pielsintomas` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pielsintomas`
--

INSERT INTO `pielsintomas` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Dolor', 'El dolor es una sensacion desencadenada por el sistema nervioso. el dolor es producido por las lesiones de las ampollas.', '55c4de8b-4fdc-4fc0-8e1b-1fcfc0a8006a.jpg'),
(2, 'Ardor', 'SensaciÃ³n de calor vivo en una parte del cuerpo.', '55c4de99-d6d4-4cf6-8c2c-111dc0a8006a.jpg'),
(3, 'Escosor', 'Prurito, es un hormigueo o irritaciÃ³n de la piel que provoca el deseo de rascarse en la zona afectada. El prurito o picazÃ³n puede ocurrir en todo el cuerpo o solamente en un lugar.', '55c4deaf-cb6c-4221-8b49-230ec0a8006a.jpg'),
(4, 'Signo de Nikolsky', 'El mÃ©dico o el personal de enfermerÃ­a usa el dedo para evaluar el signo de Nikolski. El dedo se coloca sobre la piel y se va girando suavemente de un lado para otro.\r\n\r\nSi el resultado del examen es positivo, por lo general se formarÃ¡ una ampolla en el Ã¡rea en cuestiÃ³n de minutos.\r\n\r\nUn resultado positivo generalmente es un signo de una afecciÃ³n de formaciÃ³n de ampollas en la piel. Las personas con un signo positivo tienen piel floja que se desprende de las capas subyacentes al frotarla. El Ã¡rea por debajo es de color rosa y hÃºmeda y por lo regular es muy sensible.', '55c4decb-7ff8-4359-8302-2304c0a8006a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
`id` int(11) NOT NULL,
  `penfigo_id` int(11) NOT NULL,
  `examene_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `resultados`
--

INSERT INTO `resultados` (`id`, `penfigo_id`, `examene_id`, `descripcion`, `created`, `modified`) VALUES
(1, 1, 1, 'Histologia Acantosis suprabasal', NULL, NULL),
(2, 2, 1, 'Acantolisis subcorneal\r\ne intracorneal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signos`
--

CREATE TABLE IF NOT EXISTS `signos` (
`id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `signos`
--

INSERT INTO `signos` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Presion arterial', NULL, NULL, NULL),
(2, 'Pulso', NULL, NULL, NULL),
(3, 'Temperatura', NULL, NULL, NULL),
(4, 'Peso', NULL, NULL, NULL),
(5, 'Talla', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sintomas`
--

CREATE TABLE IF NOT EXISTS `sintomas` (
`id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sintomas`
--

INSERT INTO `sintomas` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Fiebre', 'La fiebre es el aumento temporal en la temperatura del cuerpo en respuesta a la enfermedad.', NULL, '2015-08-21 10:41:13'),
(2, 'Malestar General', 'Es una sensacion generalizada de molestia, enfermedad o falta de bienestar. Se tiene la sensaciÃ³n de no tener energÃ­a suficiente.', NULL, '2015-08-21 10:41:55'),
(3, 'Debilidad', 'ReducciÃ³n de la fuerza en uno o mas mÃºsculos.', NULL, '2015-08-21 10:42:15'),
(4, 'Falta de apetito', 'Inapetencia es una situacion que se da cuando se reduce el deseo de comer. ', NULL, '2015-08-21 10:42:38'),
(5, 'Dolor Cabeza', 'Cefalea dolor pulsante que se siente es debido a la presion arterial dentro de la cabeza, ya que no se recibe suficiente sangre y con ello nutrientes, tambien puede ser por inflamacion de nervios sensitivos', NULL, '2015-08-21 10:42:55'),
(6, 'Peso Bajo', 'Peso inferior al normal en relacion con la estatura, estructura corporal y edad.', NULL, '2015-08-21 10:43:24'),
(7, 'Ampollas', 'Estas ulceras cutaneas se pueden describir como lesiones que: Drenan, supuran, forman costra, se pelan y desprenden facilmente.', NULL, '2015-08-21 10:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `tipoampollas`
--

CREATE TABLE IF NOT EXISTS `tipoampollas` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tipoampollas`
--

INSERT INTO `tipoampollas` (`id`, `nombre`, `descripcion`, `imagen`, `tipo`) VALUES
(1, 'Tensas', 'Ampollas que se encuentran estiradas.', '55d739e5-c1d0-4df6-824b-10a1c0a8006a.jpg', 'Mucosas'),
(2, 'Serosas', 'Ampolla que contiene un fluido cuya apariencia es similar a la del suero sanguineo.', '55d73a1b-2448-4d62-91e1-10a8c0a8006a.jpg', 'Mucosas'),
(3, 'Hemorragicas', 'Ampolla que contiene sangre en su interior, que es generado a partir de la rutura de los vasos sanguÃ­neos.', '55d73a51-588c-450f-a3a3-0ea8c0a8006a.jpg', 'Mucosas'),
(4, 'Purulentas', 'Ampolla que contiene un liquido espeso, de color blanco amarillento o verdoso que se forma en los tejidos infectados o inflamados y fluye de algunas heridas y llagas.', '55d73a83-a18c-4a98-bf47-0ec4c0a8006a.jpg', 'Mucosas'),
(5, 'Flacidas', 'Ampolla que es o esta blando, sin consistencia ni tersura.', '55d73adf-1c4c-4185-8c24-0ec4c0a8006a.jpg', 'Mucosas'),
(6, 'TamaÃ±o variable', 'Ampollas que no tienen un tamaÃ±o definido, todas presentas caracterÃ­sticas de tamaÃ±o Ãºnicas.', '55d73b19-5f04-4b80-b4f3-0ea8c0a8006a.jpg', 'Mucosas'),
(7, 'Transparentes', 'Ampolla que permite ver a travÃ©s de su cuerpo lo que hay detrÃ¡s.', '55d73b5a-4928-4b8d-a626-10f5c0a8006a.jpg', 'Mucosas'),
(8, 'Color amarillento', 'Ampolla que se presenta de color amarillo.', '55d73b8f-4b84-44a3-90f9-0ea8c0a8006a.jpg', 'Mucosas'),
(9, 'Erosiones', 'Es una descomposicion o degradacion de las capas de la mucosa', '55d73bcf-6168-45c1-80d0-0ea7c0a8006a.jpg', 'Mucosas'),
(10, 'Tensas', 'Ampollas que se encuentran estiradas.', '55d73c01-e15c-4818-9135-0ea8c0a8006a.jpg', 'Piel'),
(11, 'Serosas', 'Ampolla que contiene un fluido cuya apariencia es similar a la del suero sanguineo.', '55d73c51-a7c4-455c-9deb-1109c0a8006a.jpg', 'Piel'),
(12, 'Hemorragicas', 'Ampolla que contiene sangre en su interior, que es generado a partir de la rutura de los vasos sanguÃ­neos.', '55d73c72-18a4-4a40-87ee-0ec4c0a8006a.jpg', 'Piel'),
(13, 'Purulentas', 'Ampolla que contiene un liquido espeso, de color blanco amarillento o verdoso que se forma en los tejidos infectados o inflamados y fluye de algunas heridas y llagas.', '55d73c93-de40-47b8-98eb-10b5c0a8006a.jpg', 'Piel'),
(14, 'Flacidas', 'Ampolla que es o esta blando, sin consistencia ni tersura.', '55d73cba-2298-4db5-b2ed-1157c0a8006a.jpg', 'Piel'),
(15, 'TamaÃ±o variable', 'Ampollas que no tienen un tamaÃ±o definido, todas presentas caracterÃ­sticas de tamaÃ±o Ãºnicas.', '55d73cd4-4874-41d6-8dc0-114bc0a8006a.jpg', 'Piel'),
(16, 'Transparentes', 'Ampolla que permite ver a travÃ©s de su cuerpo lo que hay detrÃ¡s.', '55d73d1b-4244-4c61-a1ab-0ec4c0a8006a.jpg', 'Piel'),
(17, 'Color amarillento', 'Ampolla que se presenta de color amarillo.', '55d73d3e-e80c-4712-9974-1161c0a8006a.jpg', 'Piel'),
(18, 'Erosiones', 'Es una descomposicion o degradacion de las capas de la mucosa', '55d73d69-1530-415b-b79e-1100c0a8006a.jpg', 'Piel');

-- --------------------------------------------------------

--
-- Table structure for table `tipoerociones`
--

CREATE TABLE IF NOT EXISTS `tipoerociones` (
`id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tipoerociones`
--

INSERT INTO `tipoerociones` (`id`, `nombre`, `descripcion`, `imagen`, `tipo`) VALUES
(1, 'Erosion con restos epidermicos', 'LesiÃ³n ulcerosa con membrana blanquecina.', '55c4dfb1-a8e8-4215-99e2-065dc0a8006a.jpg', 'Mucosas'),
(2, 'ErosiÃ³n con borde irregular', 'LesiÃ³n ulcerosa con contorno indefinido.', '55c4e074-1cbc-4e5b-9f53-2310c0a8006a.jpg', 'Mucosas'),
(3, 'ErosiÃ³n con costras de  collarete descamativo', 'LesiÃ³n ulcerosa con costras.', '55c4e0ed-9548-44a9-bb8f-1fcfc0a8006a.jpg', 'Mucosas'),
(4, 'Erosion con restos epidermicos', 'LesiÃ³n ulcerosa con membrana blanquecina.', '55d748bf-e9f8-4168-a6ce-1365c0a8006a.jpg', 'Piel'),
(5, 'ErosiÃ³n con borde irregular', 'LesiÃ³n ulcerosa con contorno indefinido.', '55d749c8-3dfc-4f40-9f4d-1419c0a8006a.jpg', 'Piel'),
(6, 'ErosiÃ³n con costras de  collarete descamativo', 'LesiÃ³n ulcerosa con costras.', '55d749fc-0c70-4ef5-959f-124fc0a8006a.jpg', 'Piel');

-- --------------------------------------------------------

--
-- Table structure for table `tratamientos`
--

CREATE TABLE IF NOT EXISTS `tratamientos` (
`id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `paciente_id`, `numero`, `descripcion`, `created`, `modified`) VALUES
(1, 1, 1, 'Corticosteroides prednisona ometilprednisona: 1 a 2.5 mg/k peso/dÃ­a Asatioprina Ciclofosfamida metotrexato micofenolato sales de oro hhhhh', '2015-08-21 10:53:06', '2015-08-21 10:53:19'),
(2, 3, 2, ' fejwig eg bre gbjregn ierhgt rhty jigdrh', '2015-08-21 12:02:58', '2015-08-21 12:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, '6847560', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-13 00:47:57', '2015-08-17 00:05:07'),
(3, '555888', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-17 23:31:18', '2015-07-17 23:31:18'),
(7, 'admin', 'f964ad03a2564b2dd19b2bed04c3307c5503b8f9', 'Administrador', '2015-07-29 07:38:51', '2015-08-17 00:57:41'),
(8, '996633', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-08-17 00:52:57', '2015-08-17 01:03:26'),
(9, '995511', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-08-21 11:19:42', '2015-08-21 11:25:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areaampollas`
--
ALTER TABLE `areaampollas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examenes`
--
ALTER TABLE `examenes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorios`
--
ALTER TABLE `laboratorios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lugares`
--
ALTER TABLE `lugares`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_laboratorios`
--
ALTER TABLE `pacientes_laboratorios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_pielsintomas`
--
ALTER TABLE `pacientes_pielsintomas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_resultados`
--
ALTER TABLE `pacientes_resultados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_signos`
--
ALTER TABLE `pacientes_signos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_tipoampollas`
--
ALTER TABLE `pacientes_tipoampollas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes_tipoerociones`
--
ALTER TABLE `pacientes_tipoerociones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penfigoampollas`
--
ALTER TABLE `penfigoampollas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penfigoerociones`
--
ALTER TABLE `penfigoerociones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penfigos`
--
ALTER TABLE `penfigos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penfigosintomas`
--
ALTER TABLE `penfigosintomas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pielsintomas`
--
ALTER TABLE `pielsintomas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultados`
--
ALTER TABLE `resultados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signos`
--
ALTER TABLE `signos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sintomas`
--
ALTER TABLE `sintomas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoampollas`
--
ALTER TABLE `tipoampollas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoerociones`
--
ALTER TABLE `tipoerociones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tratamientos`
--
ALTER TABLE `tratamientos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areaampollas`
--
ALTER TABLE `areaampollas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `examenes`
--
ALTER TABLE `examenes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laboratorios`
--
ALTER TABLE `laboratorios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lugares`
--
ALTER TABLE `lugares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pacientes_laboratorios`
--
ALTER TABLE `pacientes_laboratorios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pacientes_pielsintomas`
--
ALTER TABLE `pacientes_pielsintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pacientes_resultados`
--
ALTER TABLE `pacientes_resultados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pacientes_signos`
--
ALTER TABLE `pacientes_signos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `pacientes_tipoampollas`
--
ALTER TABLE `pacientes_tipoampollas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pacientes_tipoerociones`
--
ALTER TABLE `pacientes_tipoerociones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penfigoampollas`
--
ALTER TABLE `penfigoampollas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penfigoerociones`
--
ALTER TABLE `penfigoerociones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penfigos`
--
ALTER TABLE `penfigos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penfigosintomas`
--
ALTER TABLE `penfigosintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pielsintomas`
--
ALTER TABLE `pielsintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resultados`
--
ALTER TABLE `resultados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `signos`
--
ALTER TABLE `signos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sintomas`
--
ALTER TABLE `sintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tipoampollas`
--
ALTER TABLE `tipoampollas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tipoerociones`
--
ALTER TABLE `tipoerociones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tratamientos`
--
ALTER TABLE `tratamientos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
