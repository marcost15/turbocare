<?php
function bd_obt_tipos($li = null,$id = null)
{
	$delta=$_SESSION['ini']['global']['delta'];
	if ($li!='')
	{
		$limite=" LIMIT $li, $delta";
	}
	else
	{
		$limite=" LIMIT 0, $delta";
	}	
	if ("$li" == 'todo')
	{ 
		$limite='';
	}
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM tipo_incidentes ORDER BY id ASC" ."$limite");
	}
	else
	{
		return sql2value("SELECT nombre FROM tipo_incidentes WHERE id = $id");
	}
}
