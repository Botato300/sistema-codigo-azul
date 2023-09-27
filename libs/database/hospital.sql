-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 08:50:46
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
-- Estructura de tabla para la tabla `actomedico`
--

CREATE TABLE `actomedico` (
  `id` int(11) NOT NULL,
  `historiaClinica` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaEgreso` date NOT NULL,
  `horaIngreso` time NOT NULL,
  `horaEgreso` time NOT NULL,
  `motivoConsulta` varchar(50) NOT NULL,
  `antecedentes` varchar(100) NOT NULL,
  `diagnóstico` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE `enfermeros` (
  `matricula` int(11) NOT NULL,
  `estaDeGuardia` tinyint(1) NOT NULL,
  `horaInicioGuardia` time NOT NULL,
  `horaFinalGuardia` time NOT NULL,
  `fechaGuardia` date NOT NULL
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
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `matricula` int(11) NOT NULL,
  `estaDeGuardia` tinyint(1) NOT NULL,
  `horaInicioGuardia` time NOT NULL,
  `horaFinalGuardia` time NOT NULL,
  `fechaGuardia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `historiaClinica` int(11) NOT NULL,
  `grupoSanguineo` varchar(5) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `genero` char(5) NOT NULL,
  `correoElectronico` varchar(40) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quirofanos`
--

CREATE TABLE `quirofanos` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `correoElectronico` varchar(40) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `correoElectronico`, `contrasenia`, `token`) VALUES
(1, 'admin', 'admin@codigoazul.com', '$2y$10$su.KOXq//DFeQHoBTmEnuO8m9U7VeAps3wVCSG/2m6WGkHSYb633G', '5a0571b1d97e4323cc29'),
(2, 'generico', 'generico@codigoazul.com', '$2y$10$crZYFglGUZd0HYdHeaPglOvF0BGushBW6u7vbiwk.BwQhppNNz.U6', 'f2d3cb7e912c82284a6e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actomedico`
--
ALTER TABLE `actomedico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`numero`);

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
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`historiaClinica`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`tipoDocumento`,`numeroDocumento`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `quirofanos`
--
ALTER TABLE `quirofanos`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actomedico`
--
ALTER TABLE `actomedico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `llamados`
--
ALTER TABLE `llamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
