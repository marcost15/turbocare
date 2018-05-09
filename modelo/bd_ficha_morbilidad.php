<?php
function bd_ficha_morbilidad($id)
{
	$sql = "SELECT  id,fecha,personal_id,secciones_morb_id,patologia,amezulia,consulta_ext,reposos_ac_ec,reposo_at_eo,dias_perdido,observaciones,personal_reg_id
					FROM morbilidad
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}