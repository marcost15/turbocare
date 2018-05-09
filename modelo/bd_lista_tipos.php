<?php
function bd_lista_tipos()
{
	return sql2opciones("SELECT id,nombre FROM tipo_incidentes ORDER BY id ASC");
}