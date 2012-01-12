CREATE DATABASE IF NOT EXISTS `abd`;
USE abd;

DROP TABLE IF EXISTS `Aplicaciones`;
CREATE TABLE IF NOT EXISTS `Aplicaciones` (
  `idAplicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Foto` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idAplicacion`),
  KEY `FK_evento_1` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

drop table if exists Usuarios;
create table if not exists Usuarios(
	idUsuario int(10) not null AUTO_INCREMENT,
	nick varchar(16) not null,
	pass varchar(8) not null,
	mail varchar(30) not null,
	fechaRegistro date not null,
	nombre varchar(30),
	apellidos varchar(30),
	poblacion varchar(30),
	provincia varchar(30),
	codigoPostal int(5),
	sexo varchar(6),
	foto varchar(100),
	PRIMARY KEY (idUsuario))
	ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	
insert into Usuarios (nick, pass, mail, fechaRegistro, nombre, apellidos, poblacion, provincia, codigoPostal, sexo) values
	('Juanky', '1234', 'JuanC.Prieto.Silos@gmail.com', '2012-01-01', 'Juan Carlos', 'Prieto', 'Camas', 'Sevilla', '41900', 'hombre');
