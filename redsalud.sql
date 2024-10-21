-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 21:11:46
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redsalud`
--
CREATE DATABASE IF NOT EXISTS `redsalud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `redsalud`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `RutAdministrador` int(11) NOT NULL,
  `NombreAdmin` varchar(50) NOT NULL,
  `ApellidoAdmin` varchar(50) NOT NULL,
  `Cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anular`
--

CREATE TABLE `anular` (
  `IDAnulacion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` datetime NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Box` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `IDMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `IDdatos` int(11) NOT NULL,
  `fechaBloqueo` date NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `NombreMedico` varchar(50) NOT NULL,
  `ApellidoMedico` varchar(50) NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `CantidadHoras` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `RutMedico` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`RutAdministrador`);

--
-- Indices de la tabla `anular`
--
ALTER TABLE `anular`
  ADD PRIMARY KEY (`IDAnulacion`),
  ADD KEY `IDMedico` (`IDMedico`,`Especialidad`,`Unidad`) USING BTREE,
  ADD KEY `Motivo` (`Motivo`),
  ADD KEY `Fecha` (`Fecha`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`IDdatos`),
  ADD KEY `NombreMedico` (`NombreMedico`,`ApellidoMedico`),
  ADD KEY `Motivo_2` (`Motivo`),
  ADD KEY `Anular` (`fechaBloqueo`,`Especialidad`,`Unidad`) USING BTREE;

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`RutMedico`),
  ADD KEY `Nombre` (`Nombre`,`Apellido`),
  ADD KEY `Especialidad` (`Especialidad`,`Unidad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anular`
--
ALTER TABLE `anular`
  ADD CONSTRAINT `anular_ibfk_1` FOREIGN KEY (`IDMedico`,`Especialidad`,`Unidad`) REFERENCES `medico` (`RutMedico`, `Especialidad`, `Unidad`);

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`NombreMedico`,`ApellidoMedico`) REFERENCES `medico` (`Nombre`, `Apellido`),
  ADD CONSTRAINT `datos_ibfk_2` FOREIGN KEY (`Motivo`) REFERENCES `anular` (`Motivo`),
  ADD CONSTRAINT `datos_ibfk_3` FOREIGN KEY (`fechaBloqueo`) REFERENCES `anular` (`Fecha`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`RutMedico`,`Especialidad`,`Unidad`) REFERENCES `anular` (`IDMedico`, `Especialidad`, `Unidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
