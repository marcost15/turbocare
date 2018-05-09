<?php
function bd_buscar_incidentes($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT incidentes.id,CONCAT( apellido, ', ', nombre ) AS nombreape, fecha
							FROM personal, incidentes
							WHERE personal.id = incidentes.personal_id
							AND(   nombre           LIKE '%$texto%' 
 								OR apellido         LIKE '%$texto%'
								OR fecha            LIKE '%$texto%' 
								OR incidentes.id    LIKE '%$texto%'
								OR area             LIKE '%$texto%')
						  	ORDER BY incidentes.id ASC";
			break;
	}
	return sql2array($sql);
}