-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2023 a las 19:39:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas-enfermeros`
--

CREATE TABLE `areas-enfermeros` (
  `numeroArea` int(11) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE `enfermeros` (
  `matricula` int(11) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `sexo` char(5) NOT NULL,
  `correoElectronico` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamados`
--

CREATE TABLE `llamados` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `historiaClinica` int(11) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correoElectronico` varchar(30) NOT NULL,
  `coberturaMedica` varchar(30) NOT NULL,
  `grupoSanguineo` varchar(5) NOT NULL,
  `numeroArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `origenLlamado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `areas-enfermeros`
--
ALTER TABLE `areas-enfermeros`
  ADD KEY `numeroArea` (`numeroArea`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `llamados`
--
ALTER TABLE `llamados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`historiaClinica`),
  ADD KEY `numeroArea` (`numeroArea`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas-enfermeros`
--
ALTER TABLE `areas-enfermeros`
  ADD CONSTRAINT `areas-enfermeros_ibfk_1` FOREIGN KEY (`numeroArea`) REFERENCES `areas` (`numero`),
  ADD CONSTRAINT `areas-enfermeros_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `enfermeros` (`matricula`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`numeroArea`) REFERENCES `areas` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
