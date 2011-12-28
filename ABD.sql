

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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


-- Tabla `usuario-aplicacion`
DROP TABLE IF EXISTS `usuario-aplicacion`;
CREATE TABLE IF NOT EXISTS `usuario-aplicacion` (
  `idUsuario` int(10) unsigned NOT NULL,
  `idAplicacion` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idusuario`,`idAplicacion`),
  KEY `FK_usuarioevento_2` (`idAplicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Introduccion de tuplas en la tabla `usuario-aplicacion`
INSERT INTO `usuarioevento` (`idUsuario`, `idAplicacion`) VALUES
(3, 3),
(4, 3),
(4, 4),
(4, 5);



-- Tabla `usuario-juego`
DROP TABLE IF EXISTS `usuario-juego`;
CREATE TABLE IF NOT EXISTS `usuario-juego` (
  `idUsuario` int(10) unsigned NOT NULL,
  `idJuego` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idusuario`,`idJuego`),
  KEY `FK_usuarioevento_2` (`idJuego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Introduccion de tuplas en la tabla `usuario-juego`
INSERT INTO `usuario-juego` (`idUsuario`, `idJuego`) VALUES
(3, 3),
(4, 3),
(4, 4),
(4, 5);




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



-- Constraint para tabla `usuario-aplicacion`

ALTER TABLE `usuario-aplicacion`
  ADD CONSTRAINT `FK_aplicacion_1` FOREIGN KEY (`idAplicacion`) REFERENCES `Aplicaciones` (`idAplicacion`) ON DELETE CASCADE ON UPDATE CASCADE;
  ADD CONSTRAINT `FK_aplicacion_2` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraint para tabla `usuario-juego`
--
ALTER TABLE `usuario-juego`
  ADD CONSTRAINT `FK_Juego_1` FOREIGN KEY (`idJuego`) REFERENCES `Juegos` (`idJuegos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Juego_2` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
