<?php
function bd_cambiar_clave($d)
{
  	$id_usuario=$d['id'];
	$clave=$d['clave_nueva'];
	$login = $d['login_nuevo'];
	enviar_sql("
		UPDATE personal 
		SET login = '$login',
			clave = MD5('$clave') 
		WHERE id = $id_usuario LIMIT 1;"
	);
}