-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2017 a las 12:54:17
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aves`
--

CREATE TABLE `aves` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aves`
--

INSERT INTO `aves` (`codigo`, `nombre`, `color`, `especie`, `imagen`, `descripcion`) VALUES
(1, 'Bowie', 'verde', 'amazonas', 'jsus366_2015-11-03_12-48-47.jpg', NULL),
(4, 'Amazona amazonica', 'Verde', 'Psittacidae', 'img/bowie.png', 'Es una especie de ave psitaciforme de la familia Psittacidae que vive en SudamÃ©rica.\r\n\r\nSe trata de un loro mediano, que mide 33 cm de largo y pesa 340 g de promedio. Ambos sexos son similares. Su pl'),
(5, 'Loro yaco', 'Gris y rojo', 'Psittacus erithacus', 'img/yaco.jpg', 'Es una especie de ave psitaciformes que pertenece a la familia Psittacidae. Es la Ãºnica especie del gÃ©nero monotÃ­pico Psittacus, y uno de los loros que viven en Ãfrica. Su aspecto es inconfundible'),
(6, 'Cacatua', 'Blanco y amarillo', 'Psitaciformes', 'img/cacatua.jpg', 'Son oriundas de Australia, continente muy rico en cuanto variedad de especies exÃ³ticas. En su territorio natal viven en comunidad y es fÃ¡cil avistarlas dado la abundancia de variedades que comprende'),
(7, 'Cotorra de kramer', 'Verde', 'Psittacula', 'img/cotorra_de_kramer.jpg', 'Debido a su potencial colonizador y por constituir una amenaza grave para las especies autÃ³ctonas, los hÃ¡bitats o los ecosistemas, esta especie ha sido incluida en el CatÃ¡logo EspaÃ±ol de Especies '),
(8, 'Cotorrita del sol', 'Amarillo, verde, rojo azul, verde y violeta.', 'Aratinga', 'img/cotorra_del_sol.jpg', 'Estas aves suelen ser muy domÃ©sticas y suelen criar fÃ¡cilmente, tanto en libertad como en cautividad. La pareja suele estar unida toda la vida. Ponen entre 3 y 5 huevos, con una incubaciÃ³n de 24 dÃ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avistar`
--

CREATE TABLE `avistar` (
  `fecha` date DEFAULT NULL,
  `usuarios_dni` int(11) DEFAULT NULL,
  `sitio` varchar(45) DEFAULT NULL,
  `aves_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avistar`
--

INSERT INTO `avistar` (`fecha`, `usuarios_dni`, `sitio`, `aves_codigo`) VALUES
('2017-01-19', 1, 'parque de maria luisa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `cod_pais` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_encuentra`
--

CREATE TABLE `se_encuentra` (
  `pais_cod_pais` int(11) NOT NULL,
  `aves_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pass` varchar(45) NOT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellidos`, `pais`, `ciudad`, `email`, `pass`, `rol`) VALUES
(1, 'Jesus', 'Zamora', 'España', 'Sevilla', 'jsus365@gmail.com', 'prueba', 'Administrador'),
(52, 'irene', 'irene', 'irene', 'irene', 'irene@irene.com', 'irene', ''),
(789, 'iojklm', 'iojkml', 'ijkml', 'ijkm', 'ikm@dg.com', 'sdccsdc', ''),
(6888, 'jesusito', 'zamora', 'espaÃ±a', 'sevilla', 'jsus365@gmail.com', 'prueba', ''),
(75645, 'hola', 'hola', 'hola', 'hola', 'hola@hola.com', 'hola', ''),
(98765, 'jhg', 'hgf', 'hgfj', 'hgf', 'adhgf@gomail.com', 'gh', ''),
(77823279, 'mercedes', 'marin gonzalez', 'espaÃ±a', 'sevill', 'mervisco@gmail.com', 'hola', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aves`
--
ALTER TABLE `aves`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `avistar`
--
ALTER TABLE `avistar`
  ADD KEY `fk_avistar_usuarios_idx` (`usuarios_dni`),
  ADD KEY `fk_avistar_aves1_idx` (`aves_codigo`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`cod_pais`),
  ADD UNIQUE KEY `cod_pais_UNIQUE` (`cod_pais`);

--
-- Indices de la tabla `se_encuentra`
--
ALTER TABLE `se_encuentra`
  ADD KEY `fk_se_encuentra_pais1_idx` (`pais_cod_pais`),
  ADD KEY `fk_se_encuentra_aves1_idx` (`aves_codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aves`
--
ALTER TABLE `aves`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avistar`
--
ALTER TABLE `avistar`
  ADD CONSTRAINT `fk_avistar_aves` FOREIGN KEY (`aves_codigo`) REFERENCES `aves` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avistar_usuarios` FOREIGN KEY (`usuarios_dni`) REFERENCES `usuarios` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `se_encuentra`
--
ALTER TABLE `se_encuentra`
  ADD CONSTRAINT `fk_se_encuentra_aves1` FOREIGN KEY (`aves_codigo`) REFERENCES `aves` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_se_encuentra_pais1` FOREIGN KEY (`pais_cod_pais`) REFERENCES `pais` (`cod_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
