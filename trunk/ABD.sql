-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-01-2012 a las 02:49:37
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `abd`
--
CREATE DATABASE `abd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `abd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones`
--

CREATE TABLE IF NOT EXISTS `aplicaciones` (
  `idAplicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Imagen` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `Aaplicacion` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idAplicacion`),
  KEY `FK_evento_1` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `aplicaciones`
--

INSERT INTO `aplicaciones` (`idAplicacion`, `Nombre`, `Descripcion`, `Imagen`, `idUsuario`, `Aaplicacion`, `tipo`) VALUES
(1, 'Aplicacion prueba 1', 'Aplicacion de Prueba numero 1', '', 1, '', 'Imagen'),
(2, 'Aplicacion prueba 2', 'Aplicacion de prueba 2', '', 1, '', 'Internet'),
(3, 'Aplicacion prueba 3', 'Aplicacion de prueba 3', '', 1, '', 'Personalizacion'),
(4, 'Aplicacion prueba 4', 'Aplicacion de prueba 4', '', 1, '', 'Otros'),
(5, 'Aplicacion prueba 5', 'Aplicacion de prueba 5', '', 1, '', 'Utilidades'),
(6, 'Aplicacion prueba 6', 'Aplicacion de prueba 6', '', 1, '', 'Seguridad'),
(7, 'aplicacion guay', 'aplicaicom subidaa', '2u5dqj4.jpg', 0, 'aad1f_v108.zip', ''),
(8, 'Apliii', 'fsef', '2u5dqj.jpg', 0, 'aad1f_v108.zip', ''),
(9, 'fsf', 'aplicaicom subidaa', '2u5dqj.jpg', 0, 'aad1f_v108.zip', 'Imagen'),
(10, 'Apliii', 'fsef', 'default_aplicacion.jpg', 0, '', 'Imagen/Audio/Vi'),
(11, 'efsfs', 'grege', 'default_aplicacion.jpg', 0, '', 'Imagen/Audio/Video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE IF NOT EXISTS `juegos` (
  `idJuego` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Foto` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `tipo` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idJuego`),
  KEY `FK_evento_1` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`idJuego`, `Nombre`, `Descripcion`, `Foto`, `idUsuario`, `tipo`) VALUES
(1, 'Juego de prueba 1', 'Juego de prueba 1', '', 1, 'Accion'),
(2, 'Juego de prueba 2', 'Juego de prueba 2', '', 1, 'Simulacion'),
(3, 'Juego de prueba 3', 'Juego de prueba 3', '', 1, 'Aventura'),
(4, 'Juego de prueba 4', 'Juego de prueba 4', '', 1, 'Rpg'),
(5, 'Juego de prueba 5', 'Juego de prueba 5', '', 1, 'Estrategia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nick` varchar(16) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `poblacion` varchar(30) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `codigoPostal` int(5) DEFAULT NULL,
  `sexo` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nick`, `pass`, `mail`, `fechaRegistro`, `nombre`, `apellidos`, `poblacion`, `provincia`, `codigoPostal`, `sexo`) VALUES
(1, 'Juanky', '1234', 'JuanC.Prieto.Silos@gmail.com', '2012-01-01', 'Juan Carlos', 'Prieto', 'Camas', 'Sevilla', 41900, 'hombre');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
