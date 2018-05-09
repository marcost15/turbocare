<?php
function bd_buscar_informe($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT informes.id,CONCAT( apellido, ', ', nombre ) AS nombreape, fecha, status
							FROM personal, informes
							WHERE personal.id = informes.personal_id
							AND(   nombre         LIKE '%$texto%' 
 								OR apellido       LIKE '%$texto%'
								OR fecha          LIKE '%$texto%' 
								OR status         LIKE '%$texto%'
								OR informes.id    LIKE '%$texto%')
						  	ORDER BY informes.id ASC";
			break;
	}
	return sql2array($sql);
}
function bd_buscar_responsable($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT informes.id,CONCAT( apellido, ', ', nombre ) AS nombreape, fecha
							FROM personal, informes
							WHERE personal.id = informes.personal_id
							AND(   nombre         LIKE '%$texto%' 
 								OR apellido       LIKE '%$texto%'
								OR informes.id    LIKE '%$texto%')
						  	ORDER BY informes.id ASC";
			break;
	}
	return sql2array($sql);
}