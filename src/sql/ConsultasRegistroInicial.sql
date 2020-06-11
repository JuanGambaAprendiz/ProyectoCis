-- MySQL DML document --

-- MySQL Schema `db_ngr_inventario`
USE `db_ngr_inventario`;
-- Consulta para registrar el primer usuario autorizado para registrarse en el sistema por defecto (tabla `db_ngr_inventario`.`UsuarioPermitido`)
INSERT INTO `UsuarioPermitido`(`fk_usuarioDocumento`) VALUES(987654321);
-- Consulta para registrar los Estados de Actividad posibles de los usuarios
INSERT INTO `EstadoUsuario`(`estadoUsuario`) VALUES("Activo");
INSERT INTO `EstadoUsuario`(`estadoUsuario`) VALUES("Inactivo");
-- Consulta para ingresar el Rol por defecto del sistema
INSERT INTO `Rol`(`rolNombre`) VALUES ("Usuario");-- El rol por defecto es "Usuario"
INSERT INTO `Rol`(`rolNombre`) VALUES ("Superadministrador");-- Rol Superadministrador
-- Consulta para registrar los tipos de documentos permitidos
INSERT INTO `TipoDocumento`(`tipodocumento`) VALUES("Cédula de Ciudadanía");
INSERT INTO `TipoDocumento`(`tipodocumento`) VALUES("Cédula de Extranjería");
-- Consulta para registrar rápidamente un primer usuario que irá por defecto (para efectos del uso inicial del sistema)
INSERT INTO `Usuario`(`usuarioDocumento`,`fk_id_TipoDocumento`,`usuarioNombre`,
`usuarioPswrd`,`usuarioCodigoVerif`,`usuarioCorreoElectronico`,`usuarioFechaRegistro`,
`fk_id_EstadoUsuario`,`fk_id_UsuarioPermitido`) VALUES (987654321,1,"User Default","852369741","7a4b1c2d5e8f",
"user@email.com",(SELECT NOW()),1,1);
-- Consulta para registrar el primer Permiso por defecto en el sistema
INSERT INTO `Permiso`(`fk_id_Rol`,`fk_usuarioDocumento`) VALUES(1,987654321);
INSERT INTO `Permiso`(`fk_id_Rol`,`fk_usuarioDocumento`) VALUES(2,987654321);
