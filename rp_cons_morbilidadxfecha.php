<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_obt_secciones_morb.php';
include './modelo/bd_obt_gerencias.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_cons_morbilidadxfecha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$fecha_ini = $_REQUEST['fecha_ini'];
$fecha_fin = $_REQUEST['fecha_fin'];
$fecha_ini = f2f($fecha_ini);
$fecha_fin = f2f($fecha_fin);

$reporte = sql2array("SELECT id,fecha,personal_id,secciones_morb_id,patologia,amezulia,consulta_ext,reposos_ac_ec,
                             reposo_at_eo,dias_perdido,observaciones,personal_reg_id FROM morbilidad WHERE fecha between '$fecha_ini' AND '$fecha_fin'");

foreach ($reporte as $i=>$c)
{		
	$personal_id = $reporte[$i]['personal_id'];
	$reporte[$i]['gerencia_id'] = sql2value("SELECT gerencia_id FROM personal_datos WHERE personal_id = '$personal_id'");
	$reporte[$i]['personal_id'] = bd_obt_personal($reporte[$i]['personal_id']);
	$reporte[$i]['secciones_morb_id'] = bd_obt_secciones_morb(0,$reporte[$i]['secciones_morb_id']);
	$reporte[$i]['gerencia_id'] = bd_obt_gerencias(0,$reporte[$i]['gerencia_id']);
	$reporte[$i]['personal_reg_id'] = bd_obt_personal($reporte[$i]['personal_reg_id']);
	$reporte[$i]['fecha'] = f2f($reporte[$i]['fecha']);
	
}

$smarty->assign('datos',$reporte);
$smarty->assign('fecha_ini',$fecha_ini);
$smarty->assign('fecha_fin',$fecha_fin);
$smarty->disp();
$_SESSION['data9']=array(
	'datos'      => $reporte,
	'secc'       => $secc,
	'fecha_ini'  => $fecha_ini,
	'fecha_fin'  => $fecha_fin
);