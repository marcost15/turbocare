<?php
function bd_modificar_informe($d)
{
	$id  = $d['id'];
	$seccion_id = $d['seccion_id'];
	$sql = "UPDATE informes
			SET fecha              =  '$d[fecha]',
			    tipo_gestion_id      =  '$d[tipo_gestion_id]',
				equipo_id          =  '$d[equipo_id]',
				area               =  '$d[area]',
				hallazgos          =  '$d[hallazgos]',
				correcciones       =  '$d[correcciones]',
				acciones           =  '$d[acciones]',
				evaluador_id       =  '$d[evaluador_id]',
				fecha_eva          =  '$d[fecha_eva]',
				personal_rev_id    =  '$d[personal_rev_id]',
				fecha_revi         =  '$d[fecha_revi]',
				observaciones      =  '$d[observaciones]',
				personal_obs_id    =  '$d[personal_obs_id]',
				fecha_obs          =  '$d[fecha_obs]'
				WHERE CONVERT(`informes`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	enviar_sql("DELETE informe_secciones.* FROM informe_secciones WHERE informe_id = '$id'");
	foreach($seccion_id as $i=>$m)
	{
		$secc = $seccion_id[$i];
		enviar_sql("INSERT INTO informe_secciones (id,informe_id,seccion_id)
		VALUES ('','$id','$secc');");
	}
 }