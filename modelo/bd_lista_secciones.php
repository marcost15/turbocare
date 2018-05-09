<?php
function bd_lista_secciones()
{
	return sql2opciones("SELECT id,nombre FROM secciones ORDER BY id ASC");
}