<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_cons_hhexfecha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$fecha_ini = $_REQUEST['fecha_ini'];
$fecha_fin = $_REQUEST['fecha_fin'];
$fecha_ini = f2f($fecha_ini);
$fecha_fin = f2f($fecha_fin);

$reporte = sql2array("SELECT id,fecha,taller,campo,contratista,ifb,ifn,ist,im FROM hhe WHERE fecha between '$fecha_ini' AND '$fecha_fin'");

foreach ($reporte as $i=>$c)
{		
	$reporte[$i]['fecha'] = f2f($reporte[$i]['fecha']);
	$reporte[$i]['total'] = $reporte[$i]['taller'] + $reporte[$i]['campo'];
	
}
$fecha_ini = f2f($fecha_ini);
$fecha_fin = f2f($fecha_fin);

$smarty->assign('datos',$reporte);
$smarty->assign('fecha_ini',$fecha_ini);
$smarty->assign('fecha_fin',$fecha_fin);
$smarty->disp();
$_SESSION['data12']=array(
	'datos'      => $reporte,
	'fecha_ini'  => $fecha_ini,
	'fecha_fin'  => $fecha_fin
);