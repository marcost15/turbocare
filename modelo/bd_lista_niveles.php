<?php
function bd_lista_niveles()
{
	return sql2opciones("SELECT id,nombre FROM niveles ORDER BY id ASC");
}