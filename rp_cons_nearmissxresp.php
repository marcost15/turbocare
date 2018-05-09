<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_informe.php';
include './modelo/bd_obt_equipos.php';
include './modelo/bd_obt_secciones.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_obt_gestion.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_cons_nearmissxresp.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];

$reporte = sql2array("SELECT id,fecha,personal_id,equipo_id,area,hallazgos,acciones,correcciones,fecha_eva,evaluador_id,personal_rev_id,fecha_revi,observaciones,
							personal_obs_id,fecha_obs,status,tipo_gestion_id FROM informes WHERE personal_id = '$id'");

$secc = bd_obt_secciones('todo');
foreach ($reporte as $i=>$c)
{							
	$reporte[$i]['equipo_id'] = bd_obt_equipos(0,$reporte[$i]['equipo_id']);
	$reporte[$i]['tipo_gestion_id'] = bd_obt_gestion(0,$reporte[$i]['tipo_gestion_id']);
	$reporte[$i]['personal_id'] = bd_obt_personal($reporte[$i]['personal_id']);
	$reporte[$i]['fecha'] = f2f($reporte[$i]['fecha']);
	$reporte[$i]['fecha_obs'] = f2f($reporte[$i]['fecha_obs']);
	$id = $reporte[$i]['id']; 
	$reporte[$i]['secciones'] = sql2array("SELECT seccion_id FROM informe_secciones WHERE informe_id = '$id'");	
}

foreach ($reporte as $h=>$d)
{
	$rep = count($reporte[$h]['secciones']);
	for ($i = 0; $i <= $rep - 1; $i++)
	{
		$s50 = $reporte[$h]['secciones'][$i]['seccion_id'];
		foreach ($secc as $m=>$k)
		{
			$s = $secc[$m]['id'];
			$anterior = $reporte[$h]['secciones_marc'][$m];
			if ("$anterior" <> "X")
			{
				if ("$s50" === "$s")
				{
					$reporte[$h]['secciones_marc'][$m] = 'X';
				}
				else
				{
					$reporte[$h]['secciones_marc'][$m] = "0";
				}
			}
		}
	}
}
$personal_id = bd_obt_personal($_REQUEST['id']);
$smarty->assign('datos',$reporte);
$smarty->assign('secc',$secc);
$smarty->assign('personal_id',$personal_id);
$smarty->disp();
$_SESSION['data2']=array(
	'datos'      => $reporte,
	'secc'       => $secc,
	'personal_id'  => $personal_id
);