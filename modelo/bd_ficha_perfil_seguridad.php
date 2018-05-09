<?php
function bd_ficha_perfil_seguridad($id)
{
	$sql = "SELECT  id_per_est,tipo,pre1,res1,pre2,res2,pre3,res3
					FROM perfil_seguridad
					WHERE id_per_est = '$id'
					LIMIT 0,1";
	return sql2row($sql);
}