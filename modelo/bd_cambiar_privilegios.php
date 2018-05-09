<?php
function bd_cambiar_privilegios($d)
{
	$sql="
		SELECT id,pagina,nivel_id
		FROM privilegios
		WHERE pagina LIKE '$d[pagina]'
			AND nivel_id = $d[nivel_id]
		LIMIT 1
	";
	$res=sql2row($sql);
	$id=$res['id'];
	if(!$id)
	{
		$sql="
			INSERT INTO privilegios (id,pagina,nivel_id,acceso)
			VALUES ('','$d[pagina]','$d[nivel_id]','$d[acceso]')
		";
		$res2=enviar_sql($sql);
	}
	else
	{
		$sql="
			UPDATE privilegios
			SET acceso ='$d[acceso]'
			WHERE id = '$id'
			LIMIT 1 
		";
		$res2=enviar_sql($sql);
	}
}