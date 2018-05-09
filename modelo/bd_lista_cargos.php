<?php
function bd_lista_cargos()
{
	return sql2opciones("SELECT id,nombre FROM cargos ORDER BY id ASC");
}