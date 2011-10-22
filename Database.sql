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
	VALUES (0, -1 ,$Nombre, $Pass, $Mail, now(), now(), true );
        UPDATE usuarios SET idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END //
#terminar de verlo
#CREATE PROCEDURE usuarios_UPDATE( $idusuario INT, $nombre varchar(20), $marca varchar(20), $precio tinyint, $stock int) 
#BEGIN
#        INSERT INTO usuarios 
#	VALUES (-1 ,$Nombre, $Pass, $Mail, now(), now(), true );
#        UPDATE usuarios SET idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
#END //
CREATE PROCEDURE usuarios_DELETE( $idusuario INT )
BEGIN
    UPDATE usuarios SET Status = false WHERE idusuario = $idusuario;
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

CREATE PROCEDURE threads_SELECT($idThreadAuto int, $idThread int, $Titulo varchar(30), $Contenido text,
$idUsuario int,	$FechaCreacion timestamp, $FechaModificacion timestamp, $idUsuarioModificacion int,
$Visitas int, $Votos int not, $Status bit)
BEGIN
    SELECT *
    FROM threads WHERE
    ($idThreadAuto = -1 or $idThreadAuto = idThreadaAuto) AND ($idThread = -1 or $idThread = idThread) AND ($Titulo = '' or $Titulo = Titulo)
    AND ($Contenido = '' or $Contenido = Contenido) AND ($idUsuario = -1 or $idUsuario = idUsuario) AND	($FechaCreacion = 0 $FechaCreacion = FechaCreacion)
    AND ($FechaModificacion = 0 or $FechaModificacion = FechaModificacion) AND ($idUsuarioModificacion = -1 or $idUsuarioModificacion = idUsuarioModificacion)
    AND ($Visitas = -1 or $Visitas = Visitas) AND ($Votos = -1 or $Votos = Votos) AND Status = $Status;
END//

CREATE PROCEDURE threads_INSERT( $Titulo varchar(20), $Contenido text, $idUsuario int, $idUsuarioModificacion int, $Visitas int, $Votos int )
BEGIN
	INSERT INTO threads 
	VALUES (0, -1 ,$Titulo, $Contenido, $idUsuario, now(), now(), $idUsuarioModificacion, $Visitas, $Votos, true)
        UPDATE threads SET idThread = last_insert_id() where idThreadAuto =  last_insert_id();
END //
#terminar de verlo
#CREATE PROCEDURE threads_UPDATE( $idusuario INT, $nombre varchar(20), $marca varchar(20), $precio tinyint, $stock int) 
#BEGIN
#        INSERT INTO threads 
#	VALUES (-1 ,$Nombre, $Pass, $Mail, now(), now(), true );
#        UPDATE threads SET usuarios.idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
#END //
CREATE PROCEDURE threads_DELETE( $idThread INT )
BEGIN
    UPDATE threads SET Status = false WHERE  idThread = $idThread;
END //

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
	FechaCreacion timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	idUsuarioModificacion int not null,
	Votos int not null,
	Status bit not null default true,
	constraint pk_posts PRIMARY KEY (idPostAuto)
    #constraint fk_posts FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
delimiter //

CREATE PROCEDURE posts_SELECT($idPostAuto int, $idPost int, $idThread int, $idPostPadre int,
$idUsuario int,	$Mensaje text, $FechaAlta timestamp, $FechaModificacion timestamp, $idUsuarioModificacion int, $Votos int not, $Status bit)
BEGIN
    SELECT *
    FROM posts WHERE
    ($idPostAuto = -1 or $idPostAuto = idPostAuto) AND ($idPost = -1 or $idPost = idPost) AND ($idThread = -1 or $idThread = idThread)
    AND ($idUsuario = -1 or $idUsuario = idUsuario) AND ($Mensaje = '' or $Mensaje = Mensaje) AND ($FechaCreacion = 0 $FechaCreacion = FechaCreacion)
    AND ($FechaModificacion = 0 or $FechaModificacion = FechaModificacion) AND ($idUsuarioModificacion = -1 or $idUsuarioModificacion = idUsuarioModificacion)
    AND ($Votos = -1 or $Votos = Votos) AND Status = $Status;
END//

CREATE PROCEDURE posts_INSERT( $idThread int, $idPostPadre int, $idUsuario int)
BEGIN
	INSERT INTO posts 
	VALUES (0,-1 ,$Nombre, $Pass, $Mail, now(), now(), true );
        UPDATE usuarios SET usuarios.idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END //
#terminar de verlo
#CREATE PROCEDURE posts_UPDATE( $idusuario INT, $nombre varchar(20), $marca varchar(20), $precio tinyint, $stock int) 
#BEGIN
#        INSERT INTO usuarios 
#	VALUES (-1 ,$Nombre, $Pass, $Mail, now(), now(), true );
#        UPDATE usuarios SET usuarios.idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
#END //
CREATE PROCEDURE posts_DELETE( $idPost INT )
BEGIN
    UPDATE posts SET Status = false WHERE  idPost = $idPost;
END //

delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------