<?php
function bd_modificar_hhe($d)
{
	$id  = $d['id'];
	$sql = "UPDATE hhe
			SET fecha               =  '$d[fecha]',
				taller              =  '$d[taller]',
				campo               =  '$d[campo]',
				contratista         =  '$d[contratista]',
				ifb                 =  '$d[ifb]',
				ifn                 =  '$d[ifn]',
				ist                 =  '$d[ist]',
				im                  =  '$d[im]'
				WHERE CONVERT(`hhe`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }