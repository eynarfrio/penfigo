-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2015 at 09:37 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id`, `user_id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `fecha_nacimiento`, `lugar`, `sexo`, `tipo_medico`, `telefonos`, `centro_medico`, `created`, `modified`) VALUES
(1, 1, 'Eynar David', 'Torrez', 'Torrez', '6847560', '1991-12-29', '1', 'Masculino', 'Medico General', '60147852', 'Hospital inventado ubicado en la calle no me acuredo con numero 123 de Lunes a Sabado en horarios de 8:00 a 16:00', '2015-07-13 00:47:57', '2015-07-13 00:47:57');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, '6847560', '677149a4bb8a48006c8aaad4096f890a786b0a06', 'Medico General', '2015-07-13 00:47:57', '2015-07-13 00:47:57');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lugares`
--
ALTER TABLE `lugares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
