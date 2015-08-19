-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2015 at 01:12 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `areaampollas`
--

INSERT INTO `areaampollas` (`id`, `tipo`, `area_id`, `paciente_id`, `medico_id`, `estado`, `numero`, `created`, `modified`) VALUES
(1, 'Mucosas', 1, 1, 1, 1, 1, '2015-07-19 21:22:05', '2015-08-16 23:59:40'),
(2, 'Mucosas', 2, 1, 1, 1, 1, '2015-07-19 21:22:05', '2015-08-16 23:59:40'),
(3, 'Piel', 3, 1, 1, 1, 1, '2015-07-20 00:34:45', '2015-07-26 19:33:12'),
(4, 'Piel', 4, 1, 1, 1, 1, '2015-07-20 00:34:45', '2015-07-26 19:33:13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `tipo`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Mucosas', 'Conjuntiva', '', '55c4e27b-b724-4273-807a-230ec0a8006a.jpg'),
(2, 'Mucosas', 'Genitales', '', '55c4e2c6-c358-44bc-b3bb-065dc0a8006a.jpg'),
(3, 'Piel', 'Brazos', '', '55c4e2f8-ffc0-4f6a-a401-23bfc0a8006a.jpg'),
(4, 'Piel', 'Piernas', '', '55c4e40d-2a70-4f27-9d63-2141c0a8006a.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id`, `user_id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `fecha_nacimiento`, `lugar`, `sexo`, `tipo_medico`, `telefonos`, `centro_medico`, `estado`, `created`, `modified`) VALUES
(1, 1, 'Eynar David', 'Torrez', 'Torrez', '6847560', '1991-12-29', 'La Paz', 'Masculino', 'Medico General', '60147852', 'Hospital inventado ubicado en la calle no me acuredo con numero 123 de Lunes a Sabado en horarios de 8:00 a 16:00', 'Activo', '2015-07-13 00:47:57', '2015-08-17 00:05:07'),
(2, 0, 'Alicia ', 'Mercado', 'Calle', '11223344', '1987-05-11', 'La Paz', 'Femenino', 'Dermatologo', '1531564', 'dsadhjsabhj dmskalj', 'Activo', '2015-08-08 00:02:08', '2015-08-08 00:02:08'),
(3, 8, 'Jose Miguel', 'Mamani', 'Castro', '996633', '1985-04-15', 'La Paz', 'Masculino', 'Dermatologo', '620516484', 'dbusia v agfuigabs fbi bfa', 'Activo', '2015-08-17 00:52:57', '2015-08-17 01:03:27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `lugar`, `fecha_nacimiento`, `sexo`, `telefonos`, `antecedentes_personales`, `medicacion`, `antecedentes_familiares`, `created`, `modified`) VALUES
(1, 'Marcelo', 'Mayta', 'Salas', '456210655', 'La Paz', '1990-05-21', 'Masculino', '789456', NULL, NULL, NULL, '2015-07-14 00:16:25', '2015-07-16 12:55:47'),
(2, 'Estefani', 'Valdivieso', 'Camargo', '775533', 'La Paz', '1985-06-03', 'Femenino', '70436985', 'mis antecedentes personales', 'mis medicaciones', 'mis antecedentes familiares', '2015-08-17 23:35:43', '2015-08-17 23:35:43');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pacientes_medicos`
--

INSERT INTO `pacientes_medicos` (`id`, `paciente_id`, `medico_id`, `created`, `modified`) VALUES
(1, 1, 1, '2015-07-14 00:16:25', '2015-07-14 00:16:25'),
(2, 2, 1, '2015-08-17 23:35:43', '2015-08-17 23:35:43');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pacientes_pielsintomas`
--

INSERT INTO `pacientes_pielsintomas` (`id`, `paciente_id`, `pielsintoma_id`, `estado`, `medico_id`, `numero`, `created`, `modified`) VALUES
(1, 1, 1, 0, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(2, 1, 2, 1, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(3, 1, 3, 0, 1, 1, '2015-07-21 00:39:08', '2015-08-16 23:46:48'),
(4, 1, 4, 1, 1, 1, '2015-07-21 00:39:09', '2015-08-16 23:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes_signos`
--

CREATE TABLE IF NOT EXISTS `pacientes_signos` (
`id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `signo_id` int(11) NOT NULL,
  `valor` int(10) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pacientes_signos`
--

INSERT INTO `pacientes_signos` (`id`, `paciente_id`, `signo_id`, `valor`, `numero`, `created`, `modified`) VALUES
(1, 1, 1, 5, 1, '2015-08-19 11:02:58', '2015-08-19 11:06:30'),
(2, 1, 2, 3, 1, '2015-08-19 11:02:58', '2015-08-19 11:06:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(21, 1, 1, 7, 1, '2015-07-23 15:55:44', '2015-08-16 20:08:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(12, 4, 6, 0, '2015-07-20 00:43:26', '2015-07-21 11:17:38');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pacientes_tipoerociones`
--

INSERT INTO `pacientes_tipoerociones` (`id`, `tipoerocione_id`, `areaampolla_id`, `estado`, `created`, `modified`) VALUES
(1, 1, 1, 1, '2015-07-26 21:30:06', '2015-08-17 00:04:16'),
(2, 2, 1, 0, '2015-07-26 21:30:06', '2015-08-16 23:53:19'),
(3, 1, 2, 1, '2015-07-26 21:30:06', '2015-08-17 00:04:16'),
(4, 2, 2, 0, '2015-07-26 21:30:06', '2015-08-16 23:53:19');

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
(1, 'Dolor', '', '55c4de8b-4fdc-4fc0-8e1b-1fcfc0a8006a.jpg'),
(2, 'Ardor', '', '55c4de99-d6d4-4cf6-8c2c-111dc0a8006a.jpg'),
(3, 'Escosor', '', '55c4deaf-cb6c-4221-8b49-230ec0a8006a.jpg'),
(4, 'Signo de Nikolsky', 'El mÃ©dico o el personal de enfermerÃ­a usa el dedo para evaluar el signo de Nikolski. El dedo se coloca sobre la piel y se va girando suavemente de un lado para otro.\r\n\r\nSi el resultado del examen es positivo, por lo general se formarÃ¡ una ampolla en el Ã¡rea en cuestiÃ³n de minutos.\r\n\r\nUn resultado positivo generalmente es un signo de una afecciÃ³n de formaciÃ³n de ampollas en la piel. Las personas con un signo positivo tienen piel floja que se desprende de las capas subyacentes al frotarla. El Ã¡rea por debajo es de color rosa y hÃºmeda y por lo regular es muy sensible.', '55c4decb-7ff8-4359-8302-2304c0a8006a.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `signos`
--

INSERT INTO `signos` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Temperatura', NULL, NULL, NULL),
(2, 'Peso', NULL, NULL, NULL);

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
(1, 'Fiebre', 'eeeeeeeeeee', NULL, '2015-08-07 12:35:21'),
(2, 'Malestar General', NULL, NULL, NULL),
(3, 'Debilidad', NULL, NULL, NULL),
(4, 'Falta de apetito', NULL, NULL, NULL),
(5, 'Dolor Cabeza', NULL, NULL, NULL),
(6, 'Peso Bajo', NULL, NULL, NULL),
(7, 'Ampollas', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tipoampollas`
--

INSERT INTO `tipoampollas` (`id`, `nombre`, `descripcion`, `imagen`, `tipo`) VALUES
(1, 'Flacidas', '', '55c4def2-dea4-471f-a49d-111dc0a8006a.jpg', 'Mucosas'),
(2, 'Tensas', '', '55c4defc-b118-4a5d-95f1-065dc0a8006a.jpg', 'Mucosas'),
(3, 'Serosas', '', '55c4df1c-cbb4-4042-abf5-2141c0a8006a.jpg', 'Mucosas'),
(4, 'Erociones', '', '55c4df3e-bc2c-4a87-bc23-1fcfc0a8006a.jpg', 'Mucosas'),
(5, 'Flacidas', '', '55c4df52-fe08-46c3-a246-065dc0a8006a.jpg', 'Piel'),
(6, 'Tensas', '', '55c4df61-3fc8-480a-9429-0edcc0a8006a.jpg', 'Piel');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tipoerociones`
--

INSERT INTO `tipoerociones` (`id`, `nombre`, `descripcion`, `imagen`, `tipo`) VALUES
(1, 'Erosion blanquesina', '', '55c4dfb1-a8e8-4215-99e2-065dc0a8006a.jpg', 'Mucosas'),
(3, 'ErosiÃ³n con borde irregular', '', '55c4e074-1cbc-4e5b-9f53-2310c0a8006a.jpg', 'Piel'),
(4, 'ErosiÃ³n con collarete descamativo', '', '55c4e0ed-9548-44a9-bb8f-1fcfc0a8006a.jpg', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, '6847560', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-13 00:47:57', '2015-08-17 00:05:07'),
(3, '555888', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-17 23:31:18', '2015-07-17 23:31:18'),
(7, 'admin', 'f964ad03a2564b2dd19b2bed04c3307c5503b8f9', 'Administrador', '2015-07-29 07:38:51', '2015-08-17 00:57:41'),
(8, '996633', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Dermatologo', '2015-08-17 00:52:57', '2015-08-17 01:03:26');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lugares`
--
ALTER TABLE `lugares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pacientes_medicos`
--
ALTER TABLE `pacientes_medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pacientes_pielsintomas`
--
ALTER TABLE `pacientes_pielsintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pacientes_signos`
--
ALTER TABLE `pacientes_signos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pacientes_sintomas`
--
ALTER TABLE `pacientes_sintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pacientes_tipoampollas`
--
ALTER TABLE `pacientes_tipoampollas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pacientes_tipoerociones`
--
ALTER TABLE `pacientes_tipoerociones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `signos`
--
ALTER TABLE `signos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sintomas`
--
ALTER TABLE `sintomas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tipoampollas`
--
ALTER TABLE `tipoampollas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tipoerociones`
--
ALTER TABLE `tipoerociones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
