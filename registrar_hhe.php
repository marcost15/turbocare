<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_hhe.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_hhe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}


$f1=new FormHandler('hhe',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Registrar Horas Hombre');
$f1->jsDateField('Fecha','fecha','validafecha',1,'d-m-y',"10:00");
$f1->textfield("Taller", "taller",FH_FLOAT,20,15);
$f1->textfield("Campo", "campo",FH_FLOAT,20,15);
$f1->textfield("Contratista", "contratista",FH_FLOAT,20,15);
$f1->textfield("IFB", "ifb",FH_FLOAT,20,15);
$f1->textfield("IFN", "ifn",FH_FLOAT,20,15);
$f1->textfield("IS", "ist",FH_FLOAT,20,15);
$f1->textfield("IM", "im",FH_FLOAT,20,15);
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Registrar','registrar');
$f1->resetButton();
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
	$d['fecha'] = f2f($d['fecha']);
	bd_guardar_hhe($d);
	$_SESSION['mensaje']="HORAS HOMBRE REGISTRADAS CORRECTAMENTE";	
	ir('registrar_hhe.php');;
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);