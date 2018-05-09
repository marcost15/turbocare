<?php
function bd_ficha_incidentes($id)
{
	$sql = "SELECT  id,fecha,hora,personal_id,empresa_id,area,seccion_id,proyecto,clase_id,tipo_id,condicion_id,
	accion_id,region_id,causa_id,descripcion,tiempo_perdido,personal_reg_id,acto
					FROM incidentes
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}