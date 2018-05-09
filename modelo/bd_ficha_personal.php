<?php
function bd_ficha_personal($id)
{
	$sql = "SELECT  id,apellido,nombre,login,nivel_id,estado,direccion,tlf_fijo,tlf_movil,correo,fecha_nac,estado,foto,cargo_id,gerencia_id,grado_instr
					FROM personal,personal_datos
					WHERE id = '$id' and personal_id = '$id'
					LIMIT 0,1";
	return sql2row($sql);
}