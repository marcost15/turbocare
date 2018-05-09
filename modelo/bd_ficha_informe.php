<?php
function bd_ficha_informe($id)
{
	$sql = "SELECT  id,fecha,personal_id,equipo_id,area,hallazgos,correcciones,acciones,evaluador_id,fecha_eva,
					personal_rev_id,fecha_revi,observaciones,personal_obs_id,fecha_obs,status,tipo_gestion_id
					FROM informes
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}