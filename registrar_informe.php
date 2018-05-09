<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_equipos.php';
include './modelo/bd_lista_gestion.php';
include './modelo/bd_lista_secciones.php';
include './modelo/bd_guardar_informe.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_informe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new FormHandler('informe',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Registrar Informe');
$f1->selectField("Tipos de Gestion", "tipo_gestion_id",bd_lista_gestion(),FH_NOT_EMPTY,true);
$f1->selectField("Equipo", "equipo_id",bd_lista_equipos(),FH_NOT_EMPTY,true);
$f1->textArea('Area','area',FH_STRING,30,3,"onkeyup=\"informe.area.value=informe.area.value.toUpperCase();\"");
$f1->textArea('Hallazgos','hallazgos',FH_STRING,30,3,"onkeyup=\"informe.hallazgos.value=informe.hallazgos.value.toUpperCase();\"");
$f1->textArea('Correcciones','correcciones',FH_STRING,30,3,"onkeyup=\"informe.correcciones.value=informe.correcciones.value.toUpperCase();\"");
$f1->textArea('Acciones','acciones',FH_STRING,30,3,"onkeyup=\"informe.acciones.value=informe.acciones.value.toUpperCase();\"");
$f1->ListField("Secciones", "seccion_id", bd_lista_secciones(),FH_NOT_EMPTY,true,'SELECCIONADOS','DISPONIBLE',5); 
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
	$d['personal_id'] = $_SESSION['usuario']['id'];
	bd_guardar_informe($d);
	$_SESSION['mensaje']="INFORME REGISTRADO CORRECTAMENTE";	
	ir('registrar_informe.php');;
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);