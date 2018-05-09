<?php
function bd_guardar_incidente($d)
{
	enviar_sql("INSERT INTO incidentes (id,fecha,hora,personal_id,empresa_id,area,seccion_id,proyecto,clase_id,tipo_id,condicion_id,accion_id,region_id,causa_id,
	descripcion,tiempo_perdido,personal_reg_id,acto) 
	VALUES ('','$d[fecha]','$d[hora]','$d[personal_id]','$d[empresa_id]','$d[area]','$d[seccion_id]','$d[proyecto]','$d[clase_id]','$d[tipo_id]','$d[condicion_id]',
	'$d[accion_id]','$d[region_id]','$d[causa_id]','$d[descripcion]','$d[tiempo_perdido]','$d[personal_reg_id]','$d[acto]');");
}