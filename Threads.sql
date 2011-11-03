CREATE TABLE threads
(
	idThreadAuto int not null auto_increment,
	idThread int not null,
	Titulo varchar(30) not null,
	Contenido text not null,
	idUsuario int not null,
	FechaAlta timestamp not null default current_timestamp,
	FechaModificacion timestamp not null,
	idUsuarioModificacion int not null,
	Visitas int not null,
	Votosp int not null,
        Votosn int not null,
	Status bit not null default true,
	constraint pk_threads PRIMARY KEY (idThreadAuto)
);

CREATE PROCEDURE threads_SELECT($idThreadAuto int, $idThread int, $Titulo varchar(30), $Contenido text, $idUsuario int,	$FechaAlta timestamp,
$FechaModificacion timestamp, $idUsuarioModificacion int, $Visitas int, $Votosp int, $Votosn int, $Status bit)
BEGIN
    SELECT threads.idThreadAuto,threads.idThread,threads.Titulo,threads.Contenido,threads.idUsuario,threads.FechaAlta,threads.FechaModificacion,threads.idUsuarioModificacion,threads.Visitas,threads.Votosp,threads.Votosn,threads.Status,usuarios.Nombre
    FROM threads inner join usuarios on threads.idusuario = usuarios.idusuario WHERE
    ($idThreadAuto = -1 or $idThreadAuto = threads.idThreadAuto) AND ($idThread = -1 or $idThread = threads.idThread) AND ($Titulo = '' or $Titulo = threads.Titulo) AND
    ($Contenido = '' or $Contenido = Contenido) AND ($idUsuario = -1 or $idUsuario = threads.idUsuario) AND ($FechaAlta = 0 or $FechaAlta = threads.FechaAlta) AND
    ($FechaModificacion = 0 or $FechaModificacion = threads.FechaModificacion) AND ($idUsuarioModificacion = -1 or $idUsuarioModificacion = threads.idUsuarioModificacion)AND 
    ($Visitas = -1 or $Visitas = threads.Visitas) AND ($Votosp = -1 or $Votosp = threads.Votosp) AND ($Votosn = -1 or $Votosn = threads.Votosn) AND threads.Status = $Status;
END;

CREATE PROCEDURE threads_INSERT( $Titulo varchar(20), $Contenido text, $idUsuario int)
BEGIN
	INSERT INTO threads 
	VALUES (null, -1 ,$Titulo, $Contenido, $idUsuario, now(), now(), $idUsuario, 0, 0, 0, true);
        UPDATE threads SET idThread = last_insert_id() where idThreadAuto =  last_insert_id();
END;

CREATE PROCEDURE threads_UPDATE($idThread int, $Titulo varchar(20), $Contenido text, $idUsuario int, $FechaAlta timestamp, $idUsuarioModificacion int, $Visitas int, $Votosp int, $Votosn int)
BEGIN
        call threads_DELETE($idThread);
        INSERT INTO threads
	VALUES (null ,$idThread ,$Titulo, $Contenido, $idUsuario, $FechaAlta, now(), $idUsuarioModificacion, $Visitas, $Votosp, $Votosn, true );
END;

CREATE PROCEDURE threads_DELETE( $idThread INT )
BEGIN
    UPDATE threads SET Status = false WHERE  idThread = $idThread AND Status = true;
END;

CREATE PROCEDURE threads_UPDATEVOTOS($idThread int, $Voto int)
BEGIN
IF $Voto > 0 THEN UPDATE threads SET Votosp = Votosp+1 WHERE  idThread = $idThread;
ELSE UPDATE threads SET Votosn = Votosn+1 WHERE  idThread = $idThread;
END IF;   
END;