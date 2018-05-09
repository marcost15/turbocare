<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_status.php';
include './modelo/bd_lista_status.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('status.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$status = bd_lista_status();
array_unshift($status,'Ninguna');
$f1=new dbFormHandler('tipos_ingreso',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'status','mysql');
$f1->addHTML(" <br />"."<div id='titulo'>STATUS</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Status','nombre',FH_NOT_EMPTY,40,255,"onkeyup=\"tipos_ingreso.nombre.value=tipos_ingreso.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el Nombre del status');
$f1->selectField("Prelacion","prelacion",$status,FH_NOT_EMPTY,true);
$f1->textField('Dias limite','dias',FH_DIGIT,3,5);
$f1->setValue('dias','0');
$f1->setHelpText('dias','Por Favor Introduzca el Nro de Dias limite antes de la fecha de viaje');
$f1->submitButton('Continuar','continuar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onSaved('mensaje');

function mensaje($id,$d)
{
    $_SESSION['mensaje']="STATUS PROCESADO CORRECTAMENTE";
	ir('status.php');
}

$delta=$_SESSION['ini']['global']['delta'];
$n=sql2value("SELECT COUNT(*) FROM status");
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
$status = bd_obt_status($_REQUEST['li']);
foreach ($status as $i=>$c)
{
	if ($status[$i]['prelacion'] == 0)
	{
		$status[$i]['prelacion'] = 'NINGUNA';
	}
	else
	{
		$status[$i]['prelacion'] = bd_obt_status($_REQUEST['li'],$status[$i]['prelacion']);
	}
}
$smarty->assign('status',$status);
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('n',$n);
$smarty->assign('indice',$indice);
$smarty->disp();
unset($_SESSION['mensaje']);