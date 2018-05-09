<?php
function bd_verifica_login($d)
{
	$login=$d['usuario'];
	$clave=$d['contrasena'];
	$sql="SELECT id,apellido,nombre,login,nivel_id
		  FROM personal 
		  WHERE login LIKE '$login' AND clave LIKE MD5('$clave') AND estado = 'ACTIVO'
		  LIMIT 0,1";
	return sql2row($sql);
}