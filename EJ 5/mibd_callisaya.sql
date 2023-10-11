-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 19:03:20
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
-- Base de datos: `mibd_callisaya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_dep` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dep`, `nombre`) VALUES
(1, 'La Paz'),
(2, 'Cochabamba'),
(3, 'Santa Cruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `appat` varchar(50) DEFAULT NULL,
  `apmat` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(50) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ci`, `nombre`, `appat`, `apmat`, `fecha_nac`, `genero`, `usuario`, `contrasenia`, `id_dep`, `color`) VALUES
(101112, 'NombreDocente2', 'ApellidoPaternoDoc2', 'ApellidoMaternoDoc2', '1980-11-25', 'F', 'docente2', 'docentecontrasenia2', 3, '#0000FF'),
(456789, 'NombreDocente1', 'ApellidoPaternoDoc1', 'ApellidoMaternoDoc1', '1975-08-10', 'M', 'docente1', 'docentecontrasenia1', 1, '#a96060');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `appat` varchar(50) DEFAULT NULL,
  `apmat` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(50) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ci`, `nombre`, `appat`, `apmat`, `fecha_nac`, `genero`, `usuario`, `contrasenia`, `id_dep`, `id_mat`, `color`) VALUES
(123456, 'NombreEstudiante1', 'ApellidoPaterno1', 'ApellidoMaterno1', '2000-01-15', 'M', 'usuario1', 'contrasenia1', 1, 1, '#9d0101'),
(789012, 'NombreEstudiante2', 'ApellidoPaterno2', 'ApellidoMaterno2', '1999-05-20', 'F', 'usuario2', 'contrasenia2', 2, 2, '#008000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_materia`
--

CREATE TABLE `estudiante_materia` (
  `ci` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `nota` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiante_materia`
--

INSERT INTO `estudiante_materia` (`ci`, `id_mat`, `nota`) VALUES
(123456, 1, 85.50),
(789012, 2, 90.20),
(789012, 3, 78.80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_mat` int(11) NOT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_mat`, `sigla`, `nombre`) VALUES
(1, 'inf-111', 'Introducción a la Informática'),
(2, 'inf-121', 'Algoritmos y Programación'),
(3, 'inf-113', 'Laboratorio de Computación');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `id_dep` (`id_dep`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `id_dep` (`id_dep`),
  ADD KEY `id_mat` (`id_mat`);

--
-- Indices de la tabla `estudiante_materia`
--
ALTER TABLE `estudiante_materia`
  ADD PRIMARY KEY (`ci`,`id_mat`),
  ADD KEY `id_mat` (`id_mat`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_mat`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `departamento` (`id_dep`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `departamento` (`id_dep`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_mat`) REFERENCES `materia` (`id_mat`);

--
-- Filtros para la tabla `estudiante_materia`
--
ALTER TABLE `estudiante_materia`
  ADD CONSTRAINT `estudiante_materia_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `estudiante` (`ci`),
  ADD CONSTRAINT `estudiante_materia_ibfk_2` FOREIGN KEY (`id_mat`) REFERENCES `materia` (`id_mat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
