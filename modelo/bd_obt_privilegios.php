<?php
function bd_obt_privilegios($id=NULL)
{
	if ($id==NULL)
	{
		return sql2array("
			SELECT pagina , nivel_id , acceso
			FROM privilegios
			WHERE acceso LIKE 'CONCEDER'
			ORDER BY pagina ASC, nivel_id ASC
		");
	}
	else
	{
	
	}
}