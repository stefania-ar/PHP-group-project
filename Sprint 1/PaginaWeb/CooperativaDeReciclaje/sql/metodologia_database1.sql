-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2021 a las 02:35:48
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `metodologia_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartonero`
--

CREATE TABLE `cartonero` (
  `DNI_cartonero` int(11) NOT NULL,
  `nombre_cartonero` varchar(40) NOT NULL,
  `apellido_cartonero` varchar(40) NOT NULL,
  `direccion_cartonero` varchar(120) NOT NULL,
  `fecha_nac_cartonero` date NOT NULL,
  `categoria` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cartonero`
--

INSERT INTO `cartonero` (`DNI_cartonero`, `nombre_cartonero`, `apellido_cartonero`, `direccion_cartonero`, `fecha_nac_cartonero`, `categoria`) VALUES
(1, 'Florencia', 'Perez', 'calle rivadavia', '1996-06-15', 'b'),
(2, 'Maria', 'Lopez', 'calle favaloro', '1993-06-19', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion_materiales`
--

CREATE TABLE `especificacion_materiales` (
  `id_especificacion` int(11) NOT NULL,
  `nombre_mat` varchar(30) NOT NULL,
  `detalle` varchar(250) NOT NULL,
  `no_aceptado` varchar(250) NOT NULL,
  `forma_entrega` varchar(250) NOT NULL,
  `imagen_material` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especificacion_materiales`
--

INSERT INTO `especificacion_materiales` (`id_especificacion`, `nombre_mat`, `detalle`, `no_aceptado`, `forma_entrega`, `imagen_material`) VALUES
(7, 'Papel', 'asdf', 'asdf', 'asdf', 'img/temp/60ca964f4984c.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_transporte`
--

CREATE TABLE `oferta_transporte` (
  `id_oferta` int(11) NOT NULL,
  `texto_libre` varchar(250) NOT NULL,
  `espacio_disp` char(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recoleccion_materiales`
--

CREATE TABLE `recoleccion_materiales` (
  `id_recoleccion` int(11) NOT NULL,
  `peso_material_recolectado` int(11) NOT NULL,
  `fecha_recoleccion` date NOT NULL,
  `id_especificacion_material` varchar(250) NOT NULL,
  `DNI_cartonero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recoleccion_materiales`
--

INSERT INTO `recoleccion_materiales` (`id_recoleccion`, `peso_material_recolectado`, `fecha_recoleccion`, `id_especificacion_material`, `DNI_cartonero`) VALUES
(19, 500, '2001-02-25', '0', 1),
(20, 500, '2000-05-05', 'Papel', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiro_materiales`
--

CREATE TABLE `retiro_materiales` (
  `id_retiro` int(11) NOT NULL,
  `foto` varchar(90) DEFAULT NULL,
  `categoria` char(1) NOT NULL,
  `inicio_horario_retiro` time NOT NULL,
  `fin_horario_retiro` time NOT NULL,
  `DNI_cartonero` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `retiro_materiales`
--

INSERT INTO `retiro_materiales` (`id_retiro`, `foto`, `categoria`, `inicio_horario_retiro`, `fin_horario_retiro`, `DNI_cartonero`, `id_usuario`) VALUES
(79, 'img/temp/60ca89c7ba11c.jpg', 'a', '09:00:00', '12:00:00', NULL, 76);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `telefono_usuario` int(11) NOT NULL,
  `direccion_usuario` varchar(50) NOT NULL,
  `mail_usuario` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `direccion_usuario`, `mail_usuario`) VALUES
(76, 'Laura', 'Romero', 1544968, '40 N°55', NULL),
(77, 'dfsdf', 'dfsgsd', 0, 'sdfgsdf', NULL),
(78, 'asdf', 'asdf', 0, 'asdf', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartonero`
--
ALTER TABLE `cartonero`
  ADD PRIMARY KEY (`DNI_cartonero`);

--
-- Indices de la tabla `especificacion_materiales`
--
ALTER TABLE `especificacion_materiales`
  ADD PRIMARY KEY (`id_especificacion`);

--
-- Indices de la tabla `oferta_transporte`
--
ALTER TABLE `oferta_transporte`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `recoleccion_materiales`
--
ALTER TABLE `recoleccion_materiales`
  ADD PRIMARY KEY (`id_recoleccion`),
  ADD KEY `DNI_cartonero` (`DNI_cartonero`);

--
-- Indices de la tabla `retiro_materiales`
--
ALTER TABLE `retiro_materiales`
  ADD PRIMARY KEY (`id_retiro`),
  ADD KEY `FK_RETIRO_MATERIALES_CARTONERO` (`DNI_cartonero`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especificacion_materiales`
--
ALTER TABLE `especificacion_materiales`
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `oferta_transporte`
--
ALTER TABLE `oferta_transporte`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recoleccion_materiales`
--
ALTER TABLE `recoleccion_materiales`
  MODIFY `id_recoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `retiro_materiales`
--
ALTER TABLE `retiro_materiales`
  MODIFY `id_retiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oferta_transporte`
--
ALTER TABLE `oferta_transporte`
  ADD CONSTRAINT `oferta_transporte_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recoleccion_materiales`
--
ALTER TABLE `recoleccion_materiales`
  ADD CONSTRAINT `recoleccion_materiales_ibfk_1` FOREIGN KEY (`DNI_cartonero`) REFERENCES `cartonero` (`DNI_cartonero`);

--
-- Filtros para la tabla `retiro_materiales`
--
ALTER TABLE `retiro_materiales`
  ADD CONSTRAINT `FK_RETIRO_MATERIALES_CARTONERO` FOREIGN KEY (`DNI_cartonero`) REFERENCES `cartonero` (`DNI_cartonero`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `retiro_materiales_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
