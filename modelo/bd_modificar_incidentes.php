<?php
function bd_modificar_incidentes($d)
{
	$id  = $d['id'];
	$sql = "UPDATE incidentes
			SET fecha             =  '$d[fecha]',
				hora              =  '$d[hora]',
				empresa_id        =  '$d[empresa_id]',
				area              =  '$d[area]',
				seccion_id        =  '$d[seccion_id]',
				proyecto          =  '$d[proyecto]',
				clase_id          =  '$d[clase_id]',
				tipo_id           =  '$d[tipo_id]',
				condicion_id      =  '$d[condicion_id]',
				accion_id         =  '$d[accion_id]',
				region_id         =  '$d[region_id]',
				causa_id          =  '$d[causa_id]',
				descripcion       =  '$d[descripcion]',
				tiempo_perdido    =  '$d[tiempo_perdido]',
			    acto              =  '$d[acto]'
			
				WHERE CONVERT(`incidentes`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }