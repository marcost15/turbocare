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
if (bd_verificar_privilegios('rp_cons_morbilidadxgerencia.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];

$reporte = sql2array("SELECT morbilidad.id,fecha,morbilidad.personal_id,secciones_morb_id,patologia,amezulia,consulta_ext,reposos_ac_ec,reposo_at_eo,
                             dias_perdido,observaciones,personal_reg_id FROM morbilidad, personal_datos
							 WHERE gerencia_id = '$id' AND morbilidad.personal_id = personal_datos.personal_id");

foreach ($reporte as $i=>$c)
{		
	$personal_id = $reporte[$i]['personal_id'];
	$reporte[$i]['personal_id'] = bd_obt_personal($reporte[$i]['personal_id']);
	$reporte[$i]['secciones_morb_id'] = bd_obt_secciones_morb(0,$reporte[$i]['secciones_morb_id']);
	$reporte[$i]['personal_reg_id'] = bd_obt_personal($reporte[$i]['personal_reg_id']);
	$reporte[$i]['fecha'] = f2f($reporte[$i]['fecha']);
	
}
$smarty->assign('datos',$reporte);
$gerencia_id = bd_obt_gerencias(0,$_REQUEST['id']);
$smarty->assign('gerencia_id',$gerencia_id);
$smarty->disp();
$_SESSION['data10']=array(
	'datos'      => $reporte,
	'gerencia_id'  => $gerencia_id
);