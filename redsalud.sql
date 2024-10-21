-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.1
-- Generation Time: Oct 21, 2024 at 06:35 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `IDagenda` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`IDagenda`, `fecha`, `paciente`, `rut`, `numero`, `Estado`) VALUES
(1, '2024-10-01', 'si', '123456789', '123123', 'Programada'),
(2, '2024-10-23', 'el paciente', '232323424', '353459966', 'Anulada');

-- --------------------------------------------------------

--
-- Table structure for table `anular`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datos`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historial_bloqueos`
--

CREATE TABLE `historial_bloqueos` (
  `id_bloqueo` int(11) NOT NULL,
  `fecha_bloqueo` varchar(50) NOT NULL,
  `mes_bloqueo` varchar(15) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `horas_bloqueadas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`horas_bloqueadas`)),
  `motivo` varchar(100) NOT NULL,
  `nombre_doctor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `historial_bloqueos`
--

INSERT INTO `historial_bloqueos` (`id_bloqueo`, `fecha_bloqueo`, `mes_bloqueo`, `unidad`, `especialidad`, `horas_bloqueadas`, `motivo`, `nombre_doctor`) VALUES
(1, '', '01', 'Consulta Médica', 'doctor', '3', 'Familiar', 'si no');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `RutMedico` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `rut_medico` varchar(20) NOT NULL,
  `rut_paciente` varchar(20) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `rut_medico`, `rut_paciente`, `texto`) VALUES
(1, '123456789', '123456789', 'alo');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_us`
--

CREATE TABLE `tipo_us` (
  `id_tipo_us` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `us_tipo` int(1) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena_us` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rut`, `nombre`, `apellido`, `us_tipo`, `correo`, `contrasena_us`) VALUES
(1, '123456789', 'juan', 'nauj', 1, 'aqui@alla.com', 'si');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDagenda`);

--
-- Indexes for table `anular`
--
ALTER TABLE `anular`
  ADD PRIMARY KEY (`IDAnulacion`),
  ADD KEY `IDMedico` (`IDMedico`,`Especialidad`,`Unidad`) USING BTREE,
  ADD KEY `Motivo` (`Motivo`),
  ADD KEY `Fecha` (`Fecha`);

--
-- Indexes for table `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`IDdatos`),
  ADD KEY `NombreMedico` (`NombreMedico`,`ApellidoMedico`),
  ADD KEY `Motivo_2` (`Motivo`),
  ADD KEY `Anular` (`fechaBloqueo`,`Especialidad`,`Unidad`) USING BTREE;

--
-- Indexes for table `historial_bloqueos`
--
ALTER TABLE `historial_bloqueos`
  ADD PRIMARY KEY (`id_bloqueo`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`RutMedico`),
  ADD KEY `Nombre` (`Nombre`,`Apellido`),
  ADD KEY `Especialidad` (`Especialidad`,`Unidad`),
  ADD KEY `medico_ibfk_1` (`RutMedico`,`Especialidad`,`Unidad`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indexes for table `tipo_us`
--
ALTER TABLE `tipo_us`
  ADD PRIMARY KEY (`id_tipo_us`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historial_bloqueos`
--
ALTER TABLE `historial_bloqueos`
  MODIFY `id_bloqueo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_us`
--
ALTER TABLE `tipo_us`
  MODIFY `id_tipo_us` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
