<?php
function bd_lista_tipos_sec()
{
	return sql2opciones("SELECT id,nombre FROM tipos_seccion ORDER BY id ASC");
}