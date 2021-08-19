-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2021 a las 00:58:31
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

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
  `categoria` char(1) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cartonero`
--

INSERT INTO `cartonero` (`DNI_cartonero`, `nombre_cartonero`, `apellido_cartonero`, `direccion_cartonero`, `fecha_nac_cartonero`, `categoria`, `borrado`) VALUES
(15032693, 'Juan', 'Perez', 'Los alamos 223', '1988-06-07', 'c', 0),
(25039654, 'Lucia', 'Rodriguez', 'Mitre 123', '1970-03-12', 'd', 0),
(38366951, 'Luna', 'Lopez', 'Paz 281', '1995-05-20', 'b', 0);

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
(2, 'Cartón', 'Aceptamos envases de cartón liso como cajas de cereal, empaques de licores y cervezas, entre otros. \r\nCartulinas, cartón piedra. Cajas de cartón corrugado, empaques de productos.', 'No recibimos envases plastificados como de productos congelados o detergente en polvo. \r\nTampoco cajas de huevos y embalajes similares.', 'Deben entregarse desarmadas y limpias.\r\nSiempre desarma la caja, usa un cuchillo o tijera, revisa sus uniones, por lo general son muy fáciles de despegar. Con una punta podes romper fácilmente cintas adhesivas para desarmarlas.\r\nNo se reciben envases', 'img/temp/papel.jpg'),
(3, 'Plástico', 'Admitimos botellas plásticas transparentes y de color para bebidas, jugo y agua mineral, identificados como PET 1.\r\nBotellas duras para detergentes, limpiadores, shampoo, leche y yogurt de 1 litro. Tapitas a rosca SOLO de plástico de envases y botell', 'No aceptamos envases PET1 como botellas de detergente, aceites, vinagre, empaques de pastelería, comida rápida, vasos plásticos y similares.', 'Podes acercar envases de bebidas, productos de limpieza, etc.\r\nEntregar el material limpio y seco.\r\nAplasta tus botellas y sácale las tapas! De esta forma ocupan menos lugar y contribuís a recuperar el plástico de las tapas!\r\nSin restos líquidos u ot', 'img/temp/plastico.jpg'),
(4, 'Tetrabrik', 'Aceptamos envases para bebidas, juegos, alimentos, leche, licores.', ' ', '¿Cuál es la mejor manera de acopiarlos? Limpios, secos y doblados. Enjuagalos y dejalos secar. Desdoblale las solapas y aplastalo para que te ocupe menos lugar.\r\nSiempre desarmar la caja, abre las puntas. Para dar un pequeño enjuague para limpiarlos ', 'img/temp/tetrabrik.jpg'),
(5, 'Papel', 'Recibimos diarios, revistas, hojas impresas, fotocopias y hojas de cuaderno.', 'No disponer papeles pequeños, sobres, hojas picadas o despuntes; hojas con tempera, pegamentos u otros elementos contaminantes. Cuadernos sin tapa ni espirales.', 'Apilar en forma separada diarios, revistas y hojas impresas.\r\nSiempre estirados, evitar armar paquetes o hacer pelotas de papel.\r\nSólo en el caso de hojas blancas trituradas entregar en una bolsa plástica en forma separada.', 'img/temp/papel.jpg'),
(6, 'Latas', 'Tomamos tarros para café y conservas. Tapas metálicas de jugos boca ancha y frascos.', ' ', 'Limpios, sin restos de alimentos, líquidos o grasas.\r\nDar siempre un pequeño enjuague.', 'img/temp/latas.jpg'),
(7, 'Botellas de vidrio', 'Aceptamos botellas, frascos, envases, vasos de vidrio verde, blanco o marrón.', 'No tomamos lamparitas, vidrio laminado, vidrio roto, espejos, lozas y focos.', 'Sin restos de líquidos o alimentos en su interior (mermeladas, grasas, vinagretas, entre otros).\r\nSe recomienda limpiarlo con agua y dejar escurrir volteados en el lavaplatos por unos minutos antes de su acopio.\r\nImportante, no mezclar con loza, cerá', 'img/temp/vidrio.jpg');

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
  `material_recolectado` varchar(250) NOT NULL,
  `DNI_cartonero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recoleccion_materiales`
--

INSERT INTO `recoleccion_materiales` (`id_recoleccion`, `peso_material_recolectado`, `fecha_recoleccion`, `material_recolectado`, `DNI_cartonero`) VALUES
(23, 23, '2020-05-12', 'Plástico', 25039654),
(24, 2, '2021-05-20', 'Tetrabrik', 38366951),
(25, 21, '2020-03-31', 'Papel', 25039654),
(26, 23, '2019-12-04', 'Botellas de vidrio', 15032693);

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
(83, NULL, 'c', '13:00:00', '17:00:00', NULL, 83),
(84, NULL, 'd', '09:00:00', '12:00:00', NULL, 84);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `telefono_usuario` bigint(11) NOT NULL,
  `direccion_usuario` varchar(50) NOT NULL,
  `mail_usuario` varchar(70) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `direccion_usuario`, `mail_usuario`, `password`) VALUES
(81, 'Admin', 'Admin', 11111111, 'Direccion admin', 'admin@gmail.com', '$2y$10$.3oB9H9hrxOsrYOMfKOblOyckXpExiqnqtrzlVU5iRRJkPycjvlIi'),
(83, 'Magali', 'Medico', 2494028670, 'Pellegrini 1236', NULL, NULL),
(84, 'Nicolas', 'Aragolaza', 2494005900, 'Alonso 732', NULL, NULL);

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
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oferta_transporte`
--
ALTER TABLE `oferta_transporte`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recoleccion_materiales`
--
ALTER TABLE `recoleccion_materiales`
  MODIFY `id_recoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `retiro_materiales`
--
ALTER TABLE `retiro_materiales`
  MODIFY `id_retiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
