<?php
function bd_buscar_morbilidad($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT morbilidad.id,CONCAT( apellido, ', ', nombre ) AS nombreape, fecha
							FROM personal, morbilidad
							WHERE personal.id = morbilidad.personal_id
							AND (  nombre           LIKE '%$texto%' 
 								OR apellido         LIKE '%$texto%'
								OR fecha            LIKE '%$texto%' 
								OR morbilidad.id    LIKE '%$texto%')
						  	ORDER BY morbilidad.id ASC";
			break;
	}
	return sql2array($sql);
}