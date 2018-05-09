<?php
function bd_lista_regiones()
{
	return sql2opciones("SELECT id,nombre FROM regiones_inc ORDER BY id ASC");
}