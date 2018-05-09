<?php
function bd_lista_secciones_morb()
{
	return sql2opciones("SELECT id,nombre FROM secciones_morb ORDER BY id ASC");
}