<?php
function bd_lista_acciones()
{
	return sql2opciones("SELECT id,nombre FROM acciones_inc ORDER BY id ASC");
}