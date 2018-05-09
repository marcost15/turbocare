<?php
function bd_lista_empresas()
{
	return sql2opciones("SELECT id,nombre FROM empresas ORDER BY id ASC");
}