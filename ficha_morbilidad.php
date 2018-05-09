<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_morbilidad.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_obt_secciones_morb.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('ficha_morbilidad.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$morbilidad = bd_ficha_morbilidad($_REQUEST['id']);
$morbilidad['personal_id'] = bd_obt_personal($morbilidad['personal_id']);
$morbilidad['secciones_morb_id'] = bd_obt_secciones_morb(0,$morbilidad['secciones_morb_id']);
$morbilidad['personal_reg_id'] = bd_obt_personal($morbilidad['personal_reg_id']);
$smarty->assign('ficha',$morbilidad);
$smarty->disp();