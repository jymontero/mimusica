-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2016 a las 18:17:20
-- Versión del servidor: 5.5.46-0+deb8u1
-- Versión de PHP: 5.6.19-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mimusica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comento_cancion`
--

CREATE TABLE IF NOT EXISTS `comento_cancion` (
  `email` char(50) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `comentario` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluo_cancion`
--

CREATE TABLE IF NOT EXISTS `evaluo_cancion` (
  `email` char(50) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_a_admin`
--

CREATE TABLE IF NOT EXISTS `mensaje_a_admin` (
  `leido` tinyint(1) NOT NULL,
  `fecha_envio` date NOT NULL,
  `id_mensaje` int(11) NOT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_artista`
--

CREATE TABLE IF NOT EXISTS `t_artista` (
  `nombre_autor` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cancion`
--

CREATE TABLE IF NOT EXISTS `t_cancion` (
  `id_cancion` int(11) NOT NULL,
  `nombre_autor` char(100) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `titulo_cancion` char(50) NOT NULL,
  `genero` char(50) NOT NULL,
  `album` char(50) DEFAULT NULL,
  `anio_creacion` int(11) NOT NULL,
  `url_video` char(100) DEFAULT NULL,
  `url_audio` char(100) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `letra` text NOT NULL,
  `total_reproduciones` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_estado_usuario`
--

CREATE TABLE IF NOT EXISTS `t_estado_usuario` (
  `estado` int(11) NOT NULL,
  `nombre_estado` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_estado_usuario`
--

INSERT INTO `t_estado_usuario` (`estado`, `nombre_estado`) VALUES
(0, 'INACTIVO'),
(1, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `t_tipo_usuario` (
  `tipo_usuario` int(11) NOT NULL DEFAULT '1',
  `nombre_tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_usuario`
--

INSERT INTO `t_tipo_usuario` (`tipo_usuario`, `nombre_tipo`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE IF NOT EXISTS `t_usuarios` (
`id_tusuario` int(11) NOT NULL,
  `email` char(50) CHARACTER SET latin1 NOT NULL,
  `password` char(30) CHARACTER SET latin1 NOT NULL,
  `nombres` char(50) CHARACTER SET latin1 NOT NULL,
  `apellidos` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `apodo` char(30) CHARACTER SET latin1 NOT NULL,
  `foto` char(255) CHARACTER SET latin1 DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL DEFAULT '0',
  `codigo_verificacion` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `accessToken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `authKey` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1722 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_tusuario`, `email`, `password`, `nombres`, `apellidos`, `apodo`, `foto`, `tipo`, `estado`, `codigo_verificacion`, `accessToken`, `authKey`) VALUES
(1710, 'vpolitisc@hotmail.com', '12345', 'VERONICA', 'POLITIS', 'VERONICA', 'foto', 1, 1, '12345', '12345', '12345'),
(1711, 'vseyler@pedrodevaldivia.cl', '12345', 'VIRGINIA', 'SEYLER', 'VIRGINIA', 'foto', 1, 1, '12345', '12345', '12345'),
(1712, 'x.josegonzalez@gmail.com', '12345', 'JOSE', 'GONZALEZ', 'JOSE', 'foto', 1, 1, '12345', '12345', '12345'),
(1713, 'x.the.paula.x@hotmail.com', '12345', 'PAULA', 'VILLALON', 'PAULA', 'foto', 1, 1, '12345', '12345', '12345'),
(1714, 'xfreitte@gmail.com', '12345', 'XIMENA', 'FREITE', 'XIMENA', 'foto', 1, 1, '12345', '12345', '12345'),
(1715, 'xicagogo@yahoo.es', '12345', 'XIMENA', 'GOMARA', 'XIMENA', 'foto', 1, 1, '12345', '12345', '12345'),
(1716, 'xpashii@hotmail.com', '12345', 'MARCELA', 'ZANDOVAL', 'MARCELA', 'foto', 1, 1, '12345', '12345', '12345'),
(1717, 'xroca@bancochile.cl', '12345', 'XIMENA', 'ROCA', 'XIMENA', 'foto', 1, 1, '12345', '12345', '12345'),
(1718, 'yaz_antu@yahoo.com', '12345', 'YASMIN', 'CABBADA', 'YASMIN', 'foto', 1, 1, '12345', '12345', '12345'),
(1719, 'ana@gmail.com', '123456789', 'ana', 'tobar', 'ana', NULL, 1, 0, NULL, NULL, NULL),
(1720, 'luisaben@hotmail.es', '123456789', 'luisa', 'benites', 'luisa', NULL, 1, 0, NULL, NULL, NULL),
(1721, 'admin', 'admin', 'admin', 'admin', 'admin', NULL, 1, 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comento_cancion`
--
ALTER TABLE `comento_cancion`
 ADD PRIMARY KEY (`email`,`id_cancion`), ADD KEY `FK_comento_cancion2` (`id_cancion`);

--
-- Indices de la tabla `evaluo_cancion`
--
ALTER TABLE `evaluo_cancion`
 ADD PRIMARY KEY (`email`,`id_cancion`), ADD KEY `FK_evaluo_cancion2` (`id_cancion`);

--
-- Indices de la tabla `mensaje_a_admin`
--
ALTER TABLE `mensaje_a_admin`
 ADD PRIMARY KEY (`id_mensaje`), ADD KEY `FK_relationship_2` (`email`);

--
-- Indices de la tabla `t_artista`
--
ALTER TABLE `t_artista`
 ADD PRIMARY KEY (`nombre_autor`);

--
-- Indices de la tabla `t_cancion`
--
ALTER TABLE `t_cancion`
 ADD PRIMARY KEY (`id_cancion`), ADD KEY `FK_es_autor_de` (`nombre_autor`), ADD KEY `FK_subio_cancion` (`email`);

--
-- Indices de la tabla `t_estado_usuario`
--
ALTER TABLE `t_estado_usuario`
 ADD PRIMARY KEY (`estado`);

--
-- Indices de la tabla `t_tipo_usuario`
--
ALTER TABLE `t_tipo_usuario`
 ADD PRIMARY KEY (`tipo_usuario`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
 ADD PRIMARY KEY (`id_tusuario`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `id_tusuario` (`id_tusuario`), ADD KEY `FK_esta_en_un` (`estado`), ADD KEY `FK_pertenece_a` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
MODIFY `id_tusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1722;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comento_cancion`
--
ALTER TABLE `comento_cancion`
ADD CONSTRAINT `FK_comento_cancion` FOREIGN KEY (`email`) REFERENCES `t_usuarios` (`email`),
ADD CONSTRAINT `FK_comento_cancion2` FOREIGN KEY (`id_cancion`) REFERENCES `t_cancion` (`id_cancion`);

--
-- Filtros para la tabla `evaluo_cancion`
--
ALTER TABLE `evaluo_cancion`
ADD CONSTRAINT `FK_evaluo_cancion` FOREIGN KEY (`email`) REFERENCES `t_usuarios` (`email`),
ADD CONSTRAINT `FK_evaluo_cancion2` FOREIGN KEY (`id_cancion`) REFERENCES `t_cancion` (`id_cancion`);

--
-- Filtros para la tabla `mensaje_a_admin`
--
ALTER TABLE `mensaje_a_admin`
ADD CONSTRAINT `FK_relationship_2` FOREIGN KEY (`email`) REFERENCES `t_usuarios` (`email`);

--
-- Filtros para la tabla `t_cancion`
--
ALTER TABLE `t_cancion`
ADD CONSTRAINT `FK_es_autor_de` FOREIGN KEY (`nombre_autor`) REFERENCES `t_artista` (`nombre_autor`),
ADD CONSTRAINT `FK_subio_cancion` FOREIGN KEY (`email`) REFERENCES `t_usuarios` (`email`);

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
ADD CONSTRAINT `FK_esta_en_un` FOREIGN KEY (`estado`) REFERENCES `t_estado_usuario` (`estado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
