<?php
function bd_lista_gestion()
{
	return sql2opciones("SELECT id,nombre FROM tipo_gestion ORDER BY id ASC");
}