<?php
function bd_obt_niveles($li = null,$id = null)
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
		return sql2array("SELECT id,nombre FROM niveles ORDER BY id ASC" ."$limite");
	}
	else
	{
		return sql2value("SELECT nombre FROM niveles WHERE id = $id");
	}
}
