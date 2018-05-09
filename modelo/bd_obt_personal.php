<?php
function bd_obt_personal($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal WHERE id = $id LIMIT 1");
	}
}