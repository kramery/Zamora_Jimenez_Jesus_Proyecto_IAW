-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2017 at 12:47 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id134523_proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `aves`
--

CREATE TABLE `aves` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aves`
--

INSERT INTO `aves` (`codigo`, `nombre`, `color`, `especie`, `imagen`, `descripcion`) VALUES
(65, 'Gallina', 'marron y gris', ' domÃ©stica de la especie Gallus gallus', 'img/gallo.jpg', 'El gallo y la gallina (Gallus gallus domesticus) son la subespecie domÃ©stica de la especie Gallus gallus, una especie de ave galliforme de la familia Phasianidae procedente del sudeste asiÃ¡tico. Los'),
(66, 'Cacatua', 'blanco', 'Cacatuidae', 'img/cacatua.jpg', 'Las cacatÃºas son las 21 especies de aves psitaciformes que pertenecen a la familia Cacatuidae, la Ãºnica familia de la superfamilia Cacatuoidea. Junto a las superfamilias Psittacoidea (loros verdader'),
(67, 'Cotorra de Kramer', 'verde', 'Psittacula krameri', 'img/cotorra_de_kramer.jpg', 'La cotorra de Kramer Psittacula krameri) es una especie de ave psitaciforme de la familia Psittaculidae originaria de Ãfrica y el sur de Asia, que estÃ¡ ampliamente distribuida por otras partes del '),
(68, 'cotorra del Sol', 'principalmente amarillo, con tonos arlequÃ­n', 'Aratinga solstitialis', 'img/cotorra_del_sol.jpg', 'La cotorrita del sol (Aratinga solstitialis), tambiÃ©n conocida como cotorra solar, aratinga sol o periquito dorado, es una especie de ave psitaciforme de la familia de los loros (Psittacidae). Proced'),
(69, 'Loro Yaco', 'Gris y rojo', 'Psittacus erithacus', 'img/yaco.jpg', 'El loro gris (Psittacus erithacus), tambiÃ©n conocido como loro gris de cola roja o yaco, es una especie de ave psitaciformes que pertenece a la familia Psittacidae. Es la Ãºnica especie del gÃ©nero m'),
(70, 'Mirlo comÃºn', 'Negro', 'Turdus merula', 'img/mirlo.jpg', 'El mirlo se distribuye por Europa, Asia y Ãfrica del Norte, y fue introducido en Australia, Nueva Zelanda y AmÃ©rica del Sur. Existen varias subespecies de mirlo en su amplia Ã¡rea de expansiÃ³n, ent'),
(71, 'Falso trato de patita ', 'Verde envidia', '', 'img/screenshot_20161004-172829~02.png', 'Ave perversa sin buenas intenciones'),
(72, 'gorrion', 'marron', 'gorrion comun', 'img/gorrion.jpg', 'En general, los gorriones suelen ser aves pequeñas, color marrón-gris con cola corta y pico rechoncho, de gran alcance. Las diferencias entre las especies de gorrión pueden ser sutiles. Son principalm');

-- --------------------------------------------------------

--
-- Table structure for table `avistar`
--

CREATE TABLE `avistar` (
  `sitio` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `usuarios_dni` varchar(10) NOT NULL,
  `aves_codigo` int(11) NOT NULL,
  `usuarios_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avistar`
--

INSERT INTO `avistar` (`sitio`, `fecha`, `usuarios_dni`, `aves_codigo`, `usuarios_nombre`) VALUES
('alcala de henares', '2017-03-12', '45675634T', 69, 'miguel'),
('En el parque', '2017-03-10', '77893457L', 66, 'dragon'),
('en la playa', '2017-03-10', '77854688k', 68, 'eugenio'),
('La he visto en el parque', '2017-03-10', '77854688k', 67, 'eugenio'),
('sevilla', '2017-03-12', '45675634T', 72, 'miguel'),
('zxcvbv', '2017-03-10', 'dani', 68, 'dani');

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`nombre`) VALUES
('Ãfrica'),
('Belgica'),
('Espana'),
('Europa'),
('Sur de Ãfrica');

-- --------------------------------------------------------

--
-- Table structure for table `se_encuentra`
--

CREATE TABLE `se_encuentra` (
  `aves_codigo` int(11) NOT NULL,
  `aves_nombre` varchar(45) NOT NULL,
  `pais_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `se_encuentra`
--

INSERT INTO `se_encuentra` (`aves_codigo`, `aves_nombre`, `pais_nombre`) VALUES
(65, 'Gallina', 'Espana'),
(66, 'Cacatua', 'Espana'),
(67, 'Cotorra de Kramer', 'Sur de Ãfrica'),
(68, 'cotorra del Sol', 'Sur de Ãfrica'),
(69, 'Loro Yaco', 'Ãfrica'),
(70, 'Mirlo comÃºn', 'Europa'),
(71, 'Falso trato de patita ', 'Espana'),
(72, 'gorrion', 'Europa');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `rol` varchar(45) DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellidos`, `pais`, `ciudad`, `email`, `pass`, `rol`) VALUES
('1', 'Jesus', 'Zamora', 'España', 'Sevilla', 'jsus365@gmail.com', '926e27eecdbc7a18858b3798ba99bddd', 'Administrador'),
('2548744g', 'juandiego', 'perez', 'españa', 'Zaragoza', 'jperjim398@iestriana.com', '7b6581ee30595c57d61332654cf30b0b', 'Administrador'),
('288887a', 'juandiegouser', 'perez', 'espana', 'zaragoza', 'jperjim398@iestriana.com', '7b6581ee30595c57d61332654cf30b0b', 'usuario'),
('28888847', 'juandiego', 'juandiego', 'juandiego', 'juandiego', 'juandiego@juandiego.com', '9bdaf116541ebb6cc57839e7d4292ed5', 'Administrador'),
('2888888k', 'juandiego', 'perez jimenez', 'España', 'Zaragoza', 'jperjim398@iestriana.com', '7b6581ee30595c57d61332654cf30b0b', 'usuario'),
('45210', 'jkhj', 'hjgh', 'hjgh', 'hjghmj', 'ghfgg@df.com', 'dfvdfv', 'Usuario'),
('45675634T', 'miguel', 'miguel', 'miguel', 'evilla', 'migue@migue.com', 'e048f419e83cc9de419d09efd73cd3aa', 'usuario'),
('52', 'irene1', 'irene1', 'irene1', 'irene1', 'irene1@irene.com', '156044609eb527b3b743accc8e7b6d8a', 'usuario1'),
('66545678h', 'espe1', 'espe1', 'espe1', 'espe1', 'espe1@espe1.com', '2e31c07c6f08616d081d5667c8a4241d', 'usuario'),
('6888', 'jesusito', 'zamora', 'espaÃ±a', 'sevilla', 'jsus365@gmail.com', 'irene1', ''),
('77854688k', 'eugenio', 'eugenio', 'eugenio', 'eugenio', 'eugenio@eugenio.com', '926e27eecdbc7a18858b3798ba99bddd', 'usuario'),
('77893457L', 'dragon', 'dragon', 'dragon', 'dragon', 'dragon@dragon.com', '8621ffdbc5698829397d97767ac13db3', 'usuario'),
('852', 'quique', 'quique', 'quique', 'quique', 'quique@quique.com', 'quique', 'usuario'),
('865132', 'ivan', 'ivan', 'ivan', 'ivan', 'ivan@ivan.com', 'cc57018e0cd61542cac0bc84ed44fa38', 'usuario'),
('98765', 'jhg', 'hgf', 'hgfj', 'hgf', 'adhgf@gomail.com', 'irene1', ''),
('aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'dani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'usuario'),
('aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', 'admin@sa', '560a04571b65fc14d13efd7f5a9843ee', 'usuario'),
('dani', 'dani', 'dani', 'dani', 'dani', 'dani@dani.com', '926e27eecdbc7a18858b3798ba99bddd', 'usuario'),
('video', 'video', 'video', 'video', 'video', 'video@video.com', 'b7a304ea5fca9b1ef0868218f75ea816', 'usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aves`
--
ALTER TABLE `aves`
  ADD PRIMARY KEY (`codigo`,`nombre`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indexes for table `avistar`
--
ALTER TABLE `avistar`
  ADD PRIMARY KEY (`sitio`,`fecha`,`usuarios_dni`,`aves_codigo`,`usuarios_nombre`),
  ADD KEY `fk_avistar_usuarios` (`usuarios_dni`),
  ADD KEY `fk_aves_codigo` (`aves_codigo`),
  ADD KEY `fk_avistar_usuarios1_idx` (`usuarios_nombre`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`nombre`);

--
-- Indexes for table `se_encuentra`
--
ALTER TABLE `se_encuentra`
  ADD PRIMARY KEY (`aves_codigo`,`aves_nombre`,`pais_nombre`),
  ADD KEY `fk_se_encuentra_aves1_idx` (`aves_codigo`,`aves_nombre`),
  ADD KEY `fk_se_encuentra_pais1_idx` (`pais_nombre`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`,`nombre`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aves`
--
ALTER TABLE `aves`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `avistar`
--
ALTER TABLE `avistar`
  ADD CONSTRAINT `fk_aves_codigo` FOREIGN KEY (`aves_codigo`) REFERENCES `aves` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_avistar_usuarios` FOREIGN KEY (`usuarios_dni`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `se_encuentra`
--
ALTER TABLE `se_encuentra`
  ADD CONSTRAINT `fk_se_encuentra_aves1` FOREIGN KEY (`aves_codigo`,`aves_nombre`) REFERENCES `aves` (`codigo`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_se_encuentra_pais1` FOREIGN KEY (`pais_nombre`) REFERENCES `pais` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
