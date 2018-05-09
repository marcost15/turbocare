<?php
function bd_lista_condiciones()
{
	return sql2opciones("SELECT id,nombre FROM condiciones_inc ORDER BY id ASC");
}