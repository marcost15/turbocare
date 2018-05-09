<?php
function bd_ficha_hhe($id)
{
	$sql = "SELECT  id,fecha,taller,campo,contratista,ifb,ifn,ist,im
					FROM hhe
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}