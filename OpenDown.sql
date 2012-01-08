create DATABASE if not exists OpenDown;
use OpenDown;

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
