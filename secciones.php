<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_secciones.php';
include './modelo/bd_lista_tipos_sec.php';
include './modelo/bd_obt_tipos_sec.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('secciones.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('secciones',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'secciones','mysql');
$f1->borderStart('Secciones');
$f1->textField('Nombre de la seccion','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"secciones.nombre.value=secciones.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre de la seccion');
$f1->selectField("Tipo", "tipo_sec_id", bd_lista_tipos_sec(),FH_NOT_EMPTY,true);
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="LA SECCION SE REGISTRO CORRECTAMENTE";
	ir("secciones.php");
}

$delta=$_SESSION['ini']['global']['delta'];
$n=sql2value("SELECT COUNT(*) FROM secciones");
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

$secc = bd_obt_secciones($_REQUEST['li']);
foreach ($secc as $i=>$c)
{
	$secc[$i]['tipo_sec_id'] = bd_obt_tipos_sec($_REQUEST['li'],$secc[$i]['tipo_sec_id']);
}
 
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('m',$n);
$smarty->assign('indice',$indice);
$smarty->assign('secciones',$secc);
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);