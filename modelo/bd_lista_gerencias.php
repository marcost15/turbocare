<?php
function bd_lista_gerencias()
{
	return sql2opciones("SELECT id,nombre FROM gerencias ORDER BY id ASC");
}