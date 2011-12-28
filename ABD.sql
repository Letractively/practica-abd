

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


-- Base de datos: `abd`

CREATE DATABASE IF NOT EXISTS `abd` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE abd;


-- Tabla `Aplicaciones`
DROP TABLE IF EXISTS `Aplicaciones`;
CREATE TABLE IF NOT EXISTS `Aplicaciones` (
  `idAplicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Foto` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idAplicaciones`),
  KEY `FK_evento_1` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--Introduccion de tuplas en la tabla `Aplicaciones`


-- Tabla `Juegos`
DROP TABLE IF EXISTS `Juegos`;
CREATE TABLE IF NOT EXISTS `Juegos` (
  `idJuego` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Foto` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idJuego`),
  KEY `FK_evento_1` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--Introduccion de tuplas en la tabla `Juegos`





--  Tabla `usuarios`
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `apellidos` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `poblacion` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `provincia` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cp` int(5) unsigned NOT NULL,
  `sexo` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `avatar` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- Introduccion de tuplas en la tabla `usuario`
INSERT INTO `usuarios` (`idusuario`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `poblacion`, `provincia`, `cp`, `sexo`, `foto`) VALUES
(1, 'Jose', 'Jose', 'Jose', 'Mena Gomez', 'josmengom@gmail.com', 'Cadiz', 'Cadiz', 11600, 'hombre', 'mena.JPG'),
(2, 'Javier', 'Javier', 'Javier', 'B', 'javierb@gmail.com', 'Sevilla', 'Sevilla', 41005, 'hombre', 'javi.JPG')
(3, 'Juanky', 'qwerty', 'Juan Carlos', 'Prieto', 'JuanC.Prieto.Silos@gmail.com', 'camas', 'Sevilla', 41900, 'hombre', null)



-- Constraint para tabla `Aplicacion`

ALTER TABLE `Aplicacion`
  ADD CONSTRAINT `FK_aplicacion_2` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para tabla `Juego`
--
ALTER TABLE `Juego`
  ADD CONSTRAINT `FK_Juego_2` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;



