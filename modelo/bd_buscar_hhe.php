<?php
function bd_buscar_hhe($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT  id, fecha, taller, campo, contratista, ifb, ifn, ist, im
							FROM hhe
							WHERE id
							AND (  fecha           LIKE '%$texto%' 
 								OR taller          LIKE '%$texto%'
								OR campo           LIKE '%$texto%' 
								OR contratista     LIKE '%$texto%' 
								OR ifb             LIKE '%$texto%' 
								OR ifn             LIKE '%$texto%' 
								OR ist             LIKE '%$texto%' 
								OR im              LIKE '%$texto%' 
								OR id          LIKE '%$texto%')
						  	ORDER BY id ASC";
			break;
	}
	return sql2array($sql);
}