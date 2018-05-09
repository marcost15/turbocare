<?php
function bd_guardar_informe($d)
{
	$fecha = date('Y-m-d');
	enviar_sql("INSERT INTO informes (id,fecha,personal_id,equipo_id,area,hallazgos,correcciones,acciones,status,tipo_gestion_id) 
	VALUES ('','$fecha','$d[personal_id]','$d[equipo_id]','$d[area]','$d[hallazgos]','$d[correcciones]','$d[acciones]','EN PROCESO','$d[tipo_gestion_id]');");
	$informe_id = sql2value("SELECT id FROM informes ORDER BY id DESC LIMIT 0,1");	
	$seccion_id = $d['seccion_id'];
	foreach($seccion_id as $i=>$m)
	{
		$secc = $seccion_id[$i];
		enviar_sql("INSERT INTO informe_secciones (id,informe_id,seccion_id)
		VALUES ('','$informe_id','$secc');");
	}
}