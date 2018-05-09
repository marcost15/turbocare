<?php
function bd_guardar_personal($d)
{
	enviar_sql("INSERT INTO personal (id,nombre,apellido,login,clave,nivel_id,estado) 
	VALUES ('$d[id]','$d[nombre]','$d[apellido]','$d[login]',MD5('$d[clave]'),'$d[nivel_id]','ACTIVO');");
	
	enviar_sql("INSERT INTO personal_datos (personal_id,cargo_id,direccion,tlf_fijo,tlf_movil,correo,fecha_nac,foto,grado_instr,gerencia_id) 
	VALUES ('$d[id]','$d[cargo_id]','$d[direccion]','$d[tlf_fijo]','$d[tlf_movil]','$d[correo]','$d[fecha_nac]','$d[foto]','$d[grado_instr]','$d[gerencia_id]');");
}