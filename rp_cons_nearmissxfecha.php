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
if (bd_verificar_privilegios('rp_cons_nearmissxfecha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$fecha_ini = $_REQUEST['fecha_ini'];
$fecha_fin = $_REQUEST['fecha_fin'];
$fecha_ini = f2f($fecha_ini);
$fecha_fin = f2f($fecha_fin);

$reporte = sql2array("SELECT id,fecha,personal_id,equipo_id,area,hallazgos,acciones,correcciones,fecha_eva,evaluador_id,personal_rev_id,fecha_revi,observaciones,
							personal_obs_id,fecha_obs,status,tipo_gestion_id FROM informes WHERE fecha between '$fecha_ini' AND '$fecha_fin'");

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

$fecha_ini = f2f($fecha_ini);
$fecha_fin = f2f($fecha_fin);

$smarty->assign('datos',$reporte);
$smarty->assign('secc',$secc);
$smarty->assign('fecha_ini',$fecha_ini);
$smarty->assign('fecha_fin',$fecha_fin);
$smarty->disp();
$_SESSION['data1']=array(
	'datos'      => $reporte,
	'secc'       => $secc,
	'fecha_ini'  => $fecha_ini,
	'fecha_fin'  => $fecha_fin
);