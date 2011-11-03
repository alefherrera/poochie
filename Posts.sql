CREATE TABLE posts
(
	idPostAuto int not null auto_increment,
	idPost int not null,
	idThread int not null,
	idPostPadre int not null,
	idUsuario int not null,
	Contenido text not null,
	FechaAlta timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	idUsuarioModificacion int not null,
	Votosp int not null,
    Votosn int not null,
	Status bit not null default true,
	constraint pk_posts PRIMARY KEY (idPostAuto)
);

CREATE PROCEDURE posts_SELECT($idPostAuto int, $idPost int, $idThread int, $idPostPadre int,
$idUsuario int,	$Contenido text, $FechaAlta timestamp, $FechaModificacion timestamp, $idUsuarioModificacion int, $Votos int, $Status bit)
BEGIN
    SELECT posts.idPostAuto,posts.idPost,posts.idThread,posts.idPostPadre,posts.idUsuario,posts.Contenido,posts.FechaAlta,posts.FechaModificacio,posts.idUsuarioModificacion,posts.Votosp,posts.Votosn,posts.Status,usuarios.Nombre
    FROM posts inner join usuarios on posts.idusuario = usuarios.idusuario WHERE
    ($idPostAuto = -1 or $idPostAuto = posts.idPostAuto) AND ($idPost = -1 or $idPost = posts.idPost) AND ($idThread = -1 or $idThread = posts.idThread)
    AND ($idUsuario = -1 or $idUsuario = posts.idUsuario) AND ($Contenido = '' or $Contenido = posts.Contenido) AND ($FechaAlta = 0 or $FechaAlta = posts.FechaAlta)
    AND ($FechaModificacion = 0 or $FechaModificacion = posts.FechaModificacion) AND ($idUsuarioModificacion = -1 or $idUsuarioModificacion = posts.idUsuarioModificacion)
    AND ($Votosp = -1 or $Votosp = threads.Votosp) AND ($Votosn = -1 or $Votosn = threads.Votosn) AND posts.Status = $Status;
END;

CREATE PROCEDURE posts_INSERT( $idThread int, $idPostPadre int, $idUsuario int, $Contenido text)
BEGIN
	INSERT INTO posts 
	VALUES (null, -1 , $idThread, $idPostPadre, $idUsuario, $Contenido, now(), now(), $idUsuario, 0, 0,true );
        UPDATE posts SET idUsuario = last_insert_id() where idUsuarioAuto =  last_insert_id();
END;

CREATE PROCEDURE posts_UPDATE($idPost int, $idThread int, $idPostPadre int, $idUsuario int, $Contenido text, $FechaAlta timestamp,$idUsuarioModificacion int, $Votosp int, $Votosn int)
BEGIN
        call posts_DELETE($idusuario);
        INSERT INTO threads
	VALUES (null, $idThread , $Titulo, $Contenido, $idUsuario, $FechaAlta, now(), $idUsuarioModificacion, $Votosp, $Votosn, true );
END;

CREATE PROCEDURE posts_DELETE( $idPost INT )
BEGIN
    UPDATE posts SET Status = false WHERE  idPost = $idPost AND Status = true;
END;

CREATE PROCEDURE posts_UPDATEVOTOS($idPost int, $Voto int)
BEGIN
IF $Voto > 0 THEN UPDATE posts SET Votosp = Votosp+1 WHERE  idPost = $idPost;
ELSE UPDATE post SET Votosn = Votosn+1 WHERE  idPost = $idPost;
END IF;   
END;