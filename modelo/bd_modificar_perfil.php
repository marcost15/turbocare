<?php
function bd_modificar_perfil($d)
{
	$id  = $d['id_per_est'];
	$sql = "UPDATE perfil_seguridad
			SET id_per_est   =  '$d[id_per_est]',
				tipo  		 =  '$d[tipo]',
				pre1         =  '$d[pre1]',
				pre2         =  '$d[pre2]',
				pre3         =  '$d[pre3]',
				res1         =  '$d[res1]',
				res2         =  '$d[res2]',
				res3         =  '$d[res3]'
				WHERE id_per_est = $id";
	enviar_sql($sql);
}