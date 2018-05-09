<?php
function bd_verificar_privilegios($pagina,$nivel_id)
{
	if ($nivel_id == '')
	{
		$nivel_id=-1;
	}
	$sql="
		SELECT acceso
		FROM privilegios
		WHERE pagina LIKE '$pagina'
		AND nivel_id = '$nivel_id'
		LIMIT 1
	";
	$resultado=sql2value($sql);
	return $resultado;
}
