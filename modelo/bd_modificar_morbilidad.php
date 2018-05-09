<?php
function bd_modificar_morbilidad($d)
{
	$id  = $d['id'];
	$sql = "UPDATE morbilidad
			SET fecha              =  '$d[fecha]',
				secciones_morb_id  =  '$d[secciones_morb_id]',
				patologia          =  '$d[patologia]',
				amezulia           =  '$d[amezulia]',
				consulta_ext       =  '$d[consulta_ext]',
				reposos_ac_ec      =  '$d[reposos_ac_ec]',
				reposo_at_eo       =  '$d[reposo_at_eo]',
				dias_perdido       =  '$d[dias_perdido]',
				observaciones      =  '$d[observaciones]'
				WHERE CONVERT(`morbilidad`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }