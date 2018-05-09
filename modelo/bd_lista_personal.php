<?php
function bd_lista_personal()
{
	return sql2opciones("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal ORDER BY nombreape ASC");
}