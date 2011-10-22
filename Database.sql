#Base de datos
CREATE DATABASE IF NOT EXISTS PoochieDB;
USE PoochieDB;
SET autocommit=1;

delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios
(
	idUsuarioAuto int not null auto_increment,
	idUsuario int not null,
	Nombre varchar(20) not null,
	Pass varchar(20) not null,
	Mail varchar(50) not null,
	FechaAlta timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	Status bit not null default true,
	constraint pk_usuarios PRIMARY KEY (idUsuarioAuto)
);
delimiter //

CREATE PROCEDURE usuarios_SELECT($idUsuarioAuto int ,$idUsuario int ,$Nombre varchar(20) ,
$Pass varchar(20),$Mail varchar(50),$FechaAlta timestamp ,$FechaModificacion timestamp,$Status bit)
BEGIN
SELECT *
FROM usuarios WHERE
($idUsuarioAuto = -1 or $idUsuarioAuto = idUsuarioAuto) AND ($idUsuario =  -1 or $idUsuario = idUsuario) AND ($Nombre = '' or $Nombre = Nombre) AND ($Pass = '' or $Pass = Pass) AND 
($Mail = '' or $Mail = Mail) AND ($FechaAlta = 0 or $FechaAlta = FechaAlta) AND ($FechaModificacion = 0 or $FechaModificacion = FechaModificacion) AND Status = $Status;
END

CREATE PROCEDURE usuarios_INSERT( $Nombre varchar(20), $Pass varchar(20), $Mail varchar(50) )
BEGIN
	INSERT INTO usuarios 
	VALUES (-1 ,$Nombre, $Pass, $Mail, now(), now(), true );
        UPDATE usuarios SET usuarios.idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END //
#terminar de verlo
CREATE PROCEDURE usuarios_UPDATE( $idusuario INT, $nombre varchar(20), $marca varchar(20), $precio tinyint, $stock int) 
BEGIN
        INSERT INTO usuarios 
	VALUES (-1 ,$Nombre, $Pass, $Mail, now(), now(), true );
        UPDATE usuarios SET usuarios.idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END //
CREATE PROCEDURE usuarios_DELETE( $idusuario INT )
BEGIN
    UPDATE usuarios SET usuarios.Status = false WHERE  usuarios.idusuario = $idusuario;
END //

delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE threads
(
	idThreadAuto int not null auto_increment,
	idThread int not null,
	Titulo varchar(30) not null,
	Contenido text not null,
	idUsuario int not null,
	FechaCreacion timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	idUsuarioModificacion int not null,
	Visitas int not null,
	Votos int not null,
	Status bit not null default true,
	constraint pk_threads PRIMARY KEY (idThreadAuto)
    #constraint fk_threads FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
delimiter //
delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE posts
(
	idPostAuto int not null auto_increment,
	idPost int not null,
	idThread int not null,
	idPostPadre int not null,
	idUsuario int not null,
	Mensaje text not null,
	FechaAlta timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	idUsuarioModificacion int not null,
	Votos int not null,
	Status bit not null default true,
	constraint pk_posts PRIMARY KEY (idPostAuto)
    #constraint fk_posts FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
delimiter //
delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------