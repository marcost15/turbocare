<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_secciones_morb.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('secciones_morb.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('secciones_morb',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'secciones_morb','mysql');
$f1->borderStart('Secciones');
$f1->textField('Nombre de la Seccion','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"secciones_morb.nombre.value=secciones_morb.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre de la seccion');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="LA SECCION SE REGISTRO CORRECTAMENTE";
	ir("secciones_morb.php");
}

$delta=$_SESSION['ini']['global']['delta'];
$n=sql2value("SELECT COUNT(*) FROM secciones_morb");
$indice=array();
$li=0;
while($li<$n)
{
	$ls=$li+$delta-1;
	if($ls>$n)
	{
		$ls=$n;
	}
	$indice[]=array('li'=>$li,'ls'=>$ls);
	$li=$ls+1;
}
if (!isset($_REQUEST['li']))
 $_REQUEST['li'] = 0;
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('m',$n);
$smarty->assign('indice',$indice);
$smarty->assign('secciones_morb',bd_obt_secciones_morb($_REQUEST['li']));
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);