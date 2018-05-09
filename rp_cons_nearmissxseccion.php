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
if (bd_verificar_privilegios('rp_cons_nearmissxseccion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];

$seccion_buscar = sql2array("SELECT DISTINCT informe_id FROM informe_secciones WHERE seccion_id = '$id'");	

foreach ($seccion_buscar as $i=>$c)
{
	$reporte_id = $seccion_buscar[$i][informe_id];
	$reporte = sql2array("SELECT id,fecha,personal_id,equipo_id,area,hallazgos,acciones,correcciones,fecha_eva,evaluador_id,personal_rev_id,fecha_revi,observaciones,
							personal_obs_id,fecha_obs,status,tipo_gestion_id FROM informes WHERE id = '$reporte_id'");
}
$secc = bd_obt_secciones('todo');
foreach ($reporte as $i=>$c)
{							
	$reporte[$i]['equipo_id'] = bd_obt_equipos($reporte[$i]['equipo_id']);
	$reporte[$i]['tipo_gestion_id'] = bd_obt_gestion(0,$reporte[$i]['tipo_gestion_id']);
	$reporte[$i]['personal_id'] = bd_obt_personal($reporte[$i]['personal_id']);
	$reporte[$i]['fecha'] = f2f($reporte[$i]['fecha']);
	$reporte[$i]['fecha_obs'] = f2f($reporte[$i]['fecha_obs']);	
}

$seccion_id = bd_obt_secciones(0,$_REQUEST['id']);
$smarty->assign('datos',$reporte);
$smarty->assign('seccion_id',$seccion_id);
$smarty->disp();
$_SESSION['data4']=array(
	'datos'       => $reporte,
	'seccion_id'  => $seccion_id
);