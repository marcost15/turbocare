<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_personal.php';
include './modelo/bd_obt_niveles.php';
include './modelo/bd_obt_cargos.php';
include './modelo/bd_obt_gerencias.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('ficha_personal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$personal = bd_ficha_personal($_REQUEST['id']);
$personal['nivel_id'] = bd_obt_niveles(0,$personal['nivel_id']);
$personal['cargo_id'] = bd_obt_cargos(0,$personal['cargo_id']);
$personal['gerencia_id'] = bd_obt_gerencias(0,$personal['gerencia_id']);
$personal['fecha_nac'] = f2f("$personal[fecha_nac]");
$smarty->assign('ficha',$personal);
$smarty->disp();