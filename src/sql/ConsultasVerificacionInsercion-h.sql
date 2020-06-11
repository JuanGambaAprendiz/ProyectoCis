-- MySQL DML document

-- Consulta para verificar los registros de los Usuarios Habilitados para el Registro en el Sistema (tabla UsuarioPermitido)
SELECT * FROM `UsuarioPermitido`;
-- Consulta para verificar los registros en la tabla EstadoUsuario
SELECT * FROM `EstadoUsuario`;
-- Consulta para verificar los registros en la tabla Rol
SELECT * FROM `Rol`;
-- Consulta para verificar los registros en la tabla TipoDocumento
SELECT * FROM `TipoDocumento`;
-- Consulta para verificar los registros en la tabla Usuario
SELECT * FROM `Usuario`;
-- Consulta para verificar los registros de los Permisos para Acceder a los roles (tabla Permiso)
SELECT * FROM `Permiso`;
-- Consulta para verificar los roles que poseen usuarios y compararlos con los nombres de los roles
SELECT * FROM `Permiso` INNER JOIN `Rol` ON `fk_id_Rol`=`id_Rol`;