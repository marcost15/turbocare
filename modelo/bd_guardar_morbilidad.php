<?php
function bd_guardar_morbilidad($d)
{
	enviar_sql("INSERT INTO morbilidad (id,fecha,personal_id,secciones_morb_id,patologia,amezulia,consulta_ext,reposos_ac_ec,reposo_at_eo,dias_perdido,observaciones,personal_reg_id) 
	VALUES ('','$d[fecha]','$d[personal_id]','$d[secciones_morb_id]','$d[patologia]','$d[amezulia]','$d[consulta_ext]','$d[reposos_ac_ec]','$d[reposo_at_eo]','$d[dias_perdido]','$d[observaciones]','$d[personal_reg_id]');");
}