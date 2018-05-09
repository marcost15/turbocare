<?php
function bd_lista_personal_activo()
{
	return sql2opciones("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal WHERE estado LIKE 'ACTIVO' ORDER BY nombreape ASC");
}