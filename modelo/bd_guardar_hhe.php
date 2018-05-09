<?php
function bd_guardar_hhe($d)
{
	enviar_sql("INSERT INTO hhe (id,fecha,taller,campo,contratista,ifb,ifn,ist,im) 
	VALUES ('','$d[fecha]','$d[taller]','$d[campo]','$d[contratista]','$d[ifb]','$d[ifn]','$d[ist]','$d[im]');");
}