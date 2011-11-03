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