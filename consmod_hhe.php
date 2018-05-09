<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_buscar_hhe.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('consmod_hhe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$error1 = '0';
$f1  = new formHandler('busqueda_personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Consultar Horas Hombre');
$f1 -> textField('Texto a buscar','texto');
$f1->setHelpText('texto','Para consultas por fecha por Favor Introduzca la fecha con formato año-mes-dia Ejm 2014-02-24');
$f1 -> submitButton('Continuar');
$f1->borderStop();
$f1 ->onCorrect('procesar');

function procesar($d)
{
	global $smarty;
	$texto=$d['texto'];
	$datos15 = bd_buscar_hhe(2,$texto);
	if (isset($datos15))
	{
		$error1 = '2';
	}
	foreach ($datos15 as $i=>$c)
	{
		$datos15[$i]['fecha'] = f2f($datos15[$i]['fecha']);
	}
	$smarty->assign('error1',$error1);
	$smarty->assign('datos',$datos15);
	return false;
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();