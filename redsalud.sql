-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.1
-- Generation Time: Oct 21, 2024 at 06:13 PM
-- Server version: 11.4.2-MariaDB-ubu2404
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redsalud`
--
CREATE DATABASE IF NOT EXISTS `redsalud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
USE `redsalud`;

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `idagenda` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  PRIMARY KEY (`idagenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anular`
--

CREATE TABLE IF NOT EXISTS `anular` (
  `IDAnulacion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` datetime NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Box` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `IDMedico` int(11) NOT NULL,
  PRIMARY KEY (`IDAnulacion`),
  KEY `IDMedico` (`IDMedico`,`Especialidad`,`Unidad`) USING BTREE,
  KEY `Motivo` (`Motivo`),
  KEY `Fecha` (`Fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datos`
--

CREATE TABLE IF NOT EXISTS `datos` (
  `IDdatos` int(11) NOT NULL,
  `fechaBloqueo` date NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `NombreMedico` varchar(50) NOT NULL,
  `ApellidoMedico` varchar(50) NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `CantidadHoras` varchar(50) NOT NULL,
  PRIMARY KEY (`IDdatos`),
  KEY `NombreMedico` (`NombreMedico`,`ApellidoMedico`),
  KEY `Motivo_2` (`Motivo`),
  KEY `Anular` (`fechaBloqueo`,`Especialidad`,`Unidad`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historial_bloqueos`
--

CREATE TABLE IF NOT EXISTS `historial_bloqueos` (
  `id_bloqueo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_bloqueo` varchar(50) NOT NULL,
  `mes_bloqueo` varchar(15) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `horas_bloqueadas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`horas_bloqueadas`)),
  `motivo` varchar(100) NOT NULL,
  `nombre_doctor` varchar(30) NOT NULL,
  PRIMARY KEY (`id_bloqueo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `historial_bloqueos`
--

INSERT INTO `historial_bloqueos` (`id_bloqueo`, `fecha_bloqueo`, `mes_bloqueo`, `unidad`, `especialidad`, `horas_bloqueadas`, `motivo`, `nombre_doctor`) VALUES
(1, '', '01', 'Consulta Médica', 'doctor', '3', 'Familiar', 'si no');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
  `RutMedico` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  PRIMARY KEY (`RutMedico`),
  KEY `Nombre` (`Nombre`,`Apellido`),
  KEY `Especialidad` (`Especialidad`,`Unidad`),
  KEY `medico_ibfk_1` (`RutMedico`,`Especialidad`,`Unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `rut_medico` varchar(20) NOT NULL,
  `rut_paciente` varchar(20) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `rut_medico`, `rut_paciente`, `texto`) VALUES
(1, '123456789', '123456789', 'alo');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_us`
--

CREATE TABLE IF NOT EXISTS `tipo_us` (
  `id_tipo_us` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `us_tipo` int(1) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena_us` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rut`, `nombre`, `apellido`, `us_tipo`, `correo`, `contrasena_us`) VALUES
(1, '123456789', 'juan', 'nauj', 1, 'aqui@alla.com', 'si');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`NombreMedico`,`ApellidoMedico`) REFERENCES `medico` (`Nombre`, `Apellido`),
  ADD CONSTRAINT `datos_ibfk_2` FOREIGN KEY (`Motivo`) REFERENCES `anular` (`Motivo`),
  ADD CONSTRAINT `datos_ibfk_3` FOREIGN KEY (`fechaBloqueo`) REFERENCES `anular` (`Fecha`);

--
-- Constraints for table `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`RutMedico`,`Especialidad`,`Unidad`) REFERENCES `anular` (`IDMedico`, `Especialidad`, `Unidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
