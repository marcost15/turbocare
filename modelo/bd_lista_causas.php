<?php
function bd_lista_causas()
{
	return sql2opciones("SELECT id,nombre FROM causa_inc ORDER BY id ASC");
}