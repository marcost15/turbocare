<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_personal.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_obt_niveles.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

if (bd_verificar_privilegios('retirar_personal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$personal = bd_ficha_personal($_REQUEST['id']);
$personal['nivel_id'] = bd_obt_niveles(0,$personal['nivel_id']);

$smarty->assign('ficha',$personal);
$smarty->disp();