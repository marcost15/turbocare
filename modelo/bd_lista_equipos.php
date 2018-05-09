<?php
function bd_lista_equipos()
{
	return sql2opciones("SELECT id,nombre FROM equipos ORDER BY id ASC");
}