<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_causas.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('causas.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('causas',NULL,'onclick="highlight(event)"');//Nombre del Formulario
$f1->setLanguage('es');
$f1->setConnectionResource($link,'causa_inc','mysql');//Nombre bd
$f1->borderStart('Causa de Incidentes');
$f1->textField('Nombre de la Causa','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"causas.nombre.value=causas.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca la Causa de Incidencia');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="LA CAUSA SE REGISTRO CORRECTAMENTE";
	ir("causas.php");
}

$delta=$_SESSION['ini']['global']['delta'];
$n=sql2value("SELECT COUNT(*) FROM causa_inc");
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
$smarty->assign('causas',bd_obt_causas($_REQUEST['li']));//Nombre del Archivo en el modelo
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);