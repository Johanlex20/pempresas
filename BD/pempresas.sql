-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2023 a las 20:27:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pempresas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `tipoId` varchar(100) NOT NULL,
  `identificacion` int(11) DEFAULT NULL,
  `programa` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `creacionaprendiz` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id`, `nombre`, `tipoId`, `identificacion`, `programa`, `email`, `password`, `telefono`, `creacionaprendiz`) VALUES
(1, 'JOHAN ALEXANDER RODRIGUEZ CADE', '', 123456, NULL, 'j@hotmail.com', '1234', 3102420656, NULL),
(2, '', '', 0, NULL, '', '', 0, NULL),
(3, '', '', 0, NULL, '', '', 0, NULL),
(4, 'yese', '', 1234568, NULL, 'yese@g.com', '1234', 321000000, NULL),
(5, 'j', '', 1, NULL, 'j20@hotmail.com', '258', 32100000, NULL),
(6, 'yese', '', 545, NULL, 'yese@g.com', '147258', 325689689, NULL),
(7, '', '', 0, NULL, '', '', 0, NULL),
(8, '', '', 0, NULL, '', '', 0, NULL),
(9, '', '', 0, NULL, '', '', 0, NULL),
(10, '', '', 0, NULL, '', '', 0, NULL),
(11, '', '', 0, NULL, '', '', 0, NULL),
(12, '', '', 0, NULL, '', '', 0, NULL),
(13, 'yese', '', 0, NULL, '', '', 0, NULL),
(14, 'yese', '', 0, NULL, 'y@hotmail.com', '', 123456789, NULL),
(15, '', '', 0, NULL, '', '', 0, NULL),
(16, '', '', 0, NULL, '', '', 0, NULL),
(17, 'yese', '', 12, NULL, 'yesenia@gmail.com', '1', 321000000, NULL),
(18, 'yesenia gomez garcia', '', 2587896, NULL, 'yesa@gmail.com', '1', 3698788787, NULL),
(19, 'yese', '', 12, NULL, 'johanlex524420@hotmail.com', '1', 3102420656, NULL),
(20, 'g', '', 147147147, NULL, 'g@gmail.com', 'g', 1123654, NULL),
(21, 'j', '', 1012406908, NULL, 'g@gmail.com', '1', 3698788787, NULL),
(22, 'w', 'tipoId', 747474, '1', 'w@gmail.com', '321', 321, NULL),
(23, 'o', 'tipoId', 9000257, '4', 'o@hotmail.com', '369', 369, NULL),
(24, 'o', 'tipoId', 9000257, '4', 'o@hotmail.com', '369', 369, NULL),
(25, 'i', 'tipoId', 5, '1', 'i@gmial.com', 'i', 587, NULL),
(26, 'w', '5', 90035, '3', 'w@gmail.com', '357357357', 357357, NULL),
(27, 'w', '5', 90035, '3', 'w@gmail.com', '357357357', 357357, NULL),
(28, 'z', '2', 58, '2', 'z@gmil.com', 'zzzz', 11111, NULL),
(29, 'z', '1', 222, '1', 'z@gamil.com', 'zzz', 111111, NULL),
(30, 'yese', 'tipoId', 1012406908, '3', 'z@gmil.com', '1', 1123654, NULL),
(31, 'yese', 'tipoId', 1012406908, '3', 'z@gmil.com', '1', 1123654, NULL),
(32, 'z', '4', 2147483647, '3', 'z@yahoo.com', 'zyahoo', 222222222222222, NULL),
(33, 'y', '1', 2147483647, '1', 'y@yahoo.es', 'y', 2222, '2023-04-24'),
(34, 'i', '3', 2147483647, '3', 'i@imail.com', 'i', 111, '2023-04-24'),
(35, 'q', '4', 900065656, '4', 'q@qmail.co448m', 'q', 33535353535, '2023-04-24'),
(36, 'f', '2', 5, '4', 'f@gmail.com', 'f', 8888, '2023-04-24'),
(37, 'f', '2', 5, '4', 'f@gmail.com', 'f', 8888, '2023-04-24'),
(38, 'r', '2', 1, '2', '1@gmail.com', '1', 11, '2023-04-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `tipoPrograma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `tipoPrograma`) VALUES
(1, 'Programacion de Software'),
(2, 'Sistemas'),
(3, 'Soldadura'),
(4, 'Bisuteria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentificacion`
--

CREATE TABLE `tipoidentificacion` (
  `idtipoId` int(11) NOT NULL,
  `tipoId` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoidentificacion`
--

INSERT INTO `tipoidentificacion` (`idtipoId`, `tipoId`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Cedula de Extrangeria'),
(3, 'Registro civil'),
(4, 'Numero de Pasaporte'),
(5, 'NIT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indices de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  ADD PRIMARY KEY (`idtipoId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `idprograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  MODIFY `idtipoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
