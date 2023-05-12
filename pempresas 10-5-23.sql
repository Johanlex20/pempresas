-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 23:47:48
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
  `tipoPrograma` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `creacionaprendiz` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id`, `nombre`, `tipoId`, `identificacion`, `tipoPrograma`, `email`, `password`, `telefono`, `creacionaprendiz`) VALUES
(66, 'johan', '1', 101239655, '2', 'johan@johan.com', '$2y$10$5.iFa.c93jbAJbyZsGTZgu8.3vhFl5g6ua8nCnDZoN1GAe.AqPxU2', 1234656, '2023-05-03'),
(74, 'pachin', '1', 121212, '2', 'pachin@hotmail.com', '$2y$10$n4JNJr8x1bgs5NJL243RjuPcxzCUURE6r2ALMk5cpLUJw7KXnNyDi', 3657415, '2023-05-04'),
(147, ' prueba', '1', 1010, '1', 'prueba@prueba.com', 'preuba', 1234656, '2023-05-08'),
(151, ' yy', '1', 10, '1', 'y@y.com', 'y', 10, '2023-05-10'),
(152, '  yy', '1', 10, '3', 'yesenia@gmail.com', 'y', 321000000, '2023-05-10'),
(153, ' prueba', '2', 1010, '17', 'prueba@prueba.com', 'prueba', 1234656, '2023-05-10'),
(154, ' prueba 2 ', '1', 1010, '1', 'yesenia@gmail.com', 'prueba', 321000000, '2023-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(11) NOT NULL,
  `tipoPrograma` varchar(70) NOT NULL,
  `moda_prog` varchar(15) DEFAULT NULL,
  `tipo_form_prog` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `tipoPrograma`, `moda_prog`, `tipo_form_prog`) VALUES
(1, 'Programación de Software', 'Presencial', 'Técnico'),
(2, 'Sistemas', 'Presencial', 'Técnico'),
(3, 'Soldadura de productos metálicos en platina', 'Presencial', 'Técnico'),
(4, 'Bisutería artesanal', 'Presencial', 'Operario'),
(5, 'Laminación manual fibra de vidrio', 'Presencial', 'Operario'),
(6, 'Carpintería metálica', 'Presencial', 'Técnico'),
(7, 'Inspección y ensayos con procesos no destructivos', 'Presencial', 'Técnico'),
(8, 'Alistamiento de laboratorios de análisis y ensayos \npara la industria', 'Presencial', 'Técnico'),
(9, 'Soldadura de tubería de acero al carbono \ncon procesos SMAW', 'Presencial', 'Profundización técnica'),
(10, 'Soldadura en tuberías de acero al carbono \ncon procesos GTAW Y SMAW', 'Presencial', 'Profundización técnica'),
(11, 'Supervisión de la Fabricación de productos metálicos', 'Presencial', 'Tecnólogo'),
(12, 'Operaciones de comercio exterior', 'Virtual', 'Técnico'),
(13, 'Contabilización de operaciones comerciales y \nfinancieras', 'Virtual', 'Técnico'),
(14, 'Desarrollo multimedia y web', 'Virtual', 'Tecnólogo'),
(15, 'Animación digital', 'Virtual', 'Tecnólogo'),
(16, 'Análisis y desarrollo de software', 'Virtual', 'Tecnólogo'),
(17, 'Desarrollo publicitario', 'Virtual', 'Tecnólogo'),
(18, 'Desarrollo de medios gráficos visuales', 'Virtual', 'Tecnólogo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentificacion`
--

CREATE TABLE `tipoidentificacion` (
  `id` int(11) NOT NULL,
  `tipoId` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipoidentificacion`
--

INSERT INTO `tipoidentificacion` (`id`, `tipoId`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Cedula de Extrangeria'),
(3, 'Registro civil'),
(4, 'Numero de Pasaporte'),
(5, 'NIT'),
(6, 'Tarjeta de identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'correo@correo.com', '$2y$10$VnzbBQc709np2Bd8Lso.5eZK7dMJRe.H.p0NV2IUA1aAp/t9xrFDS');

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
