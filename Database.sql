#Base de datos
CREATE DATABASE IF NOT EXISTS PoochieDB;
USE PoochieDB;
SET autocommit=1;

#delimiter ;
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
#delimiter //

CREATE PROCEDURE usuarios_SELECT($idUsuarioAuto int ,$idUsuario int ,$Nombre varchar(20),
$Pass varchar(20),$Mail varchar(50),$FechaAlta timestamp ,$FechaModificacion timestamp,$Status bit)
BEGIN
        SELECT usuarios.idUsuarioAuto,usuarios.idUsuario,usuarios.Nombre,usuarios.Pass,usuarios.Mail,usuarios.FechaAlta,usuarios.FechaModificacion,usuarios.Status
        FROM usuarios WHERE
        ($idUsuarioAuto = -1 or $idUsuarioAuto = idUsuarioAuto) AND ($idUsuario =  -1 or $idUsuario = idUsuario) AND ($Nombre = '' or $Nombre = Nombre) AND ($Pass = '' or $Pass = Pass) AND 
        ($Mail = '' or $Mail = Mail) AND ($FechaAlta = 0 or $FechaAlta = FechaAlta) AND ($FechaModificacion = 0 or $FechaModificacion = FechaModificacion) AND Status = $Status;
END;
CREATE PROCEDURE usuarios_INSERT( $Nombre varchar(20), $Pass varchar(20), $Mail varchar(50) )
BEGIN
	INSERT INTO usuarios 
	VALUES (null, -1 ,$Nombre, $Pass, $Mail, now(), now(), true );
        UPDATE usuarios SET idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END;
CREATE PROCEDURE usuarios_UPDATE( $idUsuario INT, $Nombre varchar(20), $Pass varchar(20), $Mail varchar(50), $FechaAlta timestamp)
BEGIN
        call usuarios_DELETE($idUsuario);
        INSERT INTO usuarios 
	VALUES (null ,$idusuario ,$Nombre, $Pass, $Mail, $FechaAlta, now(), true );
END;
CREATE PROCEDURE usuarios_DELETE( $idusuario INT )
BEGIN
    UPDATE usuarios SET Status = false WHERE idusuario = $idusuario  AND Status = true;
END;

#delimiter ;
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
	Votosp int not null,
        Votosn int not null,
	Status bit not null default true,
	constraint pk_threads PRIMARY KEY (idThreadAuto)
    #constraint fk_threads FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
#delimiter //
CREATE PROCEDURE threads_SELECT($idThreadAuto int, $idThread int, $Titulo varchar(30), $Contenido text, $idUsuario int,	$FechaCreacion timestamp,
$FechaModificacion timestamp, $idUsuarioModificacion int, $Visitas int, $Votosp int, $Votosn int, $Status bit)
BEGIN
    SELECT threads.idThreadAuto,threads.idThread,threads.Titulo,threads.Contenido,threads.idUsuario,threads.FechaCreacion,threads.FechaModificacion,threads.idUsuarioModificacion,threads.Visitas,threads.Votosp,threads.Votosn,threads.Status,usuarios.Nombre
    FROM threads inner join usuarios on threads.idusuario = usuarios.idusuario WHERE
    ($idThreadAuto = -1 or $idThreadAuto = threads.idThreadAuto) AND ($idThread = -1 or $idThread = threads.idThread) AND ($Titulo = '' or $Titulo = threads.Titulo) AND
    ($Contenido = '' or $Contenido = Contenido) AND ($idUsuario = -1 or $idUsuario = threads.idUsuario) AND ($FechaCreacion = 0 or $FechaCreacion = threads.FechaCreacion) AND
    ($FechaModificacion = 0 or $FechaModificacion = threads.FechaModificacion) AND ($idUsuarioModificacion = -1 or $idUsuarioModificacion = threads.idUsuarioModificacion)AND 
    ($Visitas = -1 or $Visitas = threads.Visitas) AND ($Votos = -1 or $Votos = threads.Votos) AND threads.Status = $Status;
END;

CREATE PROCEDURE threads_INSERT( $Titulo varchar(20), $Contenido text, $idUsuario int)
BEGIN
	INSERT INTO threads 
	VALUES (null, -1 ,$Titulo, $Contenido, $idUsuario, now(), now(), $idUsuario, 0, 0, true);
        UPDATE threads SET idThread = last_insert_id() where idThreadAuto =  last_insert_id();
END;
CREATE PROCEDURE threads_UPDATE($idThread int, $Titulo varchar(20), $Contenido text, $idUsuario int, $FechaAlta timestamp, $idUsuarioModificacion int)
BEGIN
        call threads_DELETE($idThread);
        INSERT INTO threads
	VALUES (null ,$idThread ,$Titulo, $Contenido, $idUsuario, $FechaAlta, now(), $idUsuarioModificacion, 0, 0, true );
END;
CREATE PROCEDURE threads_DELETE( $idThread INT )
BEGIN
    UPDATE threads SET Status = false WHERE  idThread = $idThread AND Status = true;
END;

#delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE posts
(
	idPostAuto int not null auto_increment,
	idPost int not null,
	idThread int not null,
	idPostPadre int not null,
	idUsuario int not null,
	Contenido text not null,
	FechaCreacion timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	idUsuarioModificacion int not null,
	Votosp int not null,
        Votosn int not null,
	Status bit not null default true,
	constraint pk_posts PRIMARY KEY (idPostAuto)
    #constraint fk_posts FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
#delimiter //

CREATE PROCEDURE posts_SELECT($idPostAuto int, $idPost int, $idThread int, $idPostPadre int,
$idUsuario int,	$Contenido text, $FechaAlta timestamp, $FechaModificacion timestamp, $idUsuarioModificacion int, $Votos int, $Status bit)
BEGIN
    SELECT posts.idPostAuto,posts.idPost,posts.idThread,posts.idPostPadre,posts.idUsuario,posts.Contenido,posts.FechaAlta,posts.FechaModificacio,posts.idUsuarioModificacion,posts.Votosp,posts.Votosn,posts.Status,usuarios.Nombre
    FROM posts inner join usuarios on posts.idusuario = usuarios.idusuario WHERE
    ($idPostAuto = -1 or $idPostAuto = posts.idPostAuto) AND ($idPost = -1 or $idPost = posts.idPost) AND ($idThread = -1 or $idThread = posts.idThread)
    AND ($idUsuario = -1 or $idUsuario = posts.idUsuario) AND ($Contenido = '' or $Contenido = posts.Contenido) AND ($FechaCreacion = 0 or $FechaCreacion = posts.FechaCreacion)
    AND ($FechaModificacion = 0 or $FechaModificacion = posts.FechaModificacion) AND ($idUsuarioModificacion = -1 or $idUsuarioModificacion = posts.idUsuarioModificacion)
    AND ($Votos = -1 or $Votos = posts.Votos) AND posts.Status = $Status;
END;
CREATE PROCEDURE posts_INSERT( $idThread int, $idPostPadre int, $idUsuario int, $Contenido text)
BEGIN
	INSERT INTO posts 
	VALUES (null, -1 , $idThread, $idPostPadre, $idUsuario, $Contenido, now(), now(), $idUsuario,0,true );
        UPDATE posts SET idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END;
CREATE PROCEDURE posts_UPDATE($idPost int, $idThread int, $idPostPadre int, $idUsuario int, $Contenido text, $FechaAlta timestamp,$idUsuarioModificacion int)
BEGIN
        call posts_DELETE($idusuario);
        INSERT INTO threads
	VALUES (null, $idThread , $Titulo, $Contenido, $idUsuario, $FechaAlta, now(), $idUsuarioModificacion, 0, true );
END;
CREATE PROCEDURE posts_DELETE( $idPost INT )
BEGIN
    UPDATE posts SET Status = false WHERE  idPost = $idPost AND Status = true;
END;

#delimiter ;
#--------------------------------------------------------------------------------------------------------------------------------------------------