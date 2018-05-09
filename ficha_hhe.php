<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_hhe.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('ficha_hhe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$hhe = bd_ficha_hhe($_REQUEST['id']);
$smarty->assign('ficha',$hhe);
$smarty->disp();