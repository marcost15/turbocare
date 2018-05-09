<?php
function bd_buscar_personal($tipo,$texto)
{
	switch($tipo)
	{
		case 1: //Busqueda por letra de apellido
			$letra=$texto;
			$sql = "SELECT  id,apellido,nombre,login,nivel_id,estado,CONCAT( apellido, ', ', nombre ) AS nombreape
							FROM personal
							WHERE estado LIKE 'ACTIVO'
							AND apellido   LIKE  '{$letra}%'
							ORDER BY apellido ASC";
			break;
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,apellido,nombre,login,nivel_id,estado,CONCAT( apellido, ', ', nombre ) AS nombreape
							FROM personal
							WHERE estado     LIKE 'ACTIVO'
							AND(id           LIKE '%$texto%' 
 								OR apellido  LIKE '%$texto%'
								OR nombre    LIKE '%$texto%' 
								OR login     LIKE '%$texto%')
						  	ORDER BY apellido ASC";
			break;
	}
	return sql2array($sql);
}