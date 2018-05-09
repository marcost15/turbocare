<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_gestion.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('gestion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new dbFormHandler('gestion',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'tipo_gestion','mysql');//base de datos conexion
$f1->borderStart('Gestion');
$f1->textField('Nombre de la gestion','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"gestion.nombre.value=gestion.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre de la gestion');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL TIPO DE GESTION SE REGISTRO CORRECTAMENTE";
	ir("gestion.php");
}

$delta=$_SESSION['ini']['global']['delta'];
$n=sql2value("SELECT COUNT(*) FROM tipo_gestion");
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
$smarty->assign('gestion',bd_obt_gestion($_REQUEST['li']));
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);