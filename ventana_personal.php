<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_buscar_personal.php';
if (bd_verificar_privilegios('ventana_personal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$error1 = '0';

$f1  = new formHandler('busqueda_personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>BUSQUEDA DE PERSONAL</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1 -> textField('Texto a buscar','texto');
$f1 -> submitButton('Continuar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1 ->onCorrect('procesar');
if (isset($_REQUEST['accion']))
{
	$accion=$_REQUEST['accion'];
	switch($accion)
	{
		case 'letra':
		    $datos15 = bd_buscar_personal(1,$_REQUEST['letra']);
			if (isset($datos15))
			{
				$error1 = '1';
			}
			$smarty->assign('error1',$error1);
			$smarty->assign('datos', $datos15);
		break;
	}
}

function procesar($d)
{
	global $smarty;
	$texto=$d['texto'];
	$datos15 = bd_buscar_personal(2,$texto);
	if (isset($datos15))
	{
		$error1 = '2';
	}
	$smarty->assign('error1',$error1);
	$smarty->assign('datos',$datos15);
	return false;
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['datos']);