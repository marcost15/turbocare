<?php
function bd_lista_clases()
{
	return sql2opciones("SELECT id,nombre FROM clase_incidentes ORDER BY id ASC");
}