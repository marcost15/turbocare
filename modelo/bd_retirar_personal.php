<?php
function bd_retirar_personal($id)
{
	enviar_sql("UPDATE personal
					SET estado = 'INACTIVO' 
					WHERE id  = '$id' LIMIT 1;");
}