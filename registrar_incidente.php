<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_personal.php';
include './modelo/bd_lista_empresas.php';
include './modelo/bd_lista_secciones.php';
include './modelo/bd_lista_clases.php';
include './modelo/bd_lista_tipos.php';
include './modelo/bd_lista_condiciones.php';
include './modelo/bd_lista_acciones.php';
include './modelo/bd_lista_regiones.php';
include './modelo/bd_lista_causas.php';
include './modelo/bd_guardar_incidente.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_incidente.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new FormHandler('incidente',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Registrar Incidente');
$f1->jsDateField('Fecha','fecha','validafecha',1,'d-m-y',"10:00");
$f1 -> timeField("Hora", "hora");
$f1->selectField("Personal", "personal_id",bd_lista_personal(),FH_NOT_EMPTY,true);
$f1->selectField("Empresas", "empresa_id", bd_lista_empresas(),FH_NOT_EMPTY,true);
$f1->selectField("Secciones", "seccion_id",bd_lista_secciones(),FH_NOT_EMPTY,true);
$f1->selectField("Clases", "clase_id",bd_lista_clases(),FH_NOT_EMPTY,true);
$f1->selectField("Tipos", "tipo_id",bd_lista_tipos(),FH_NOT_EMPTY,true);
$f1->selectField("Condiciones", "condicion_id",bd_lista_condiciones(),FH_NOT_EMPTY,true);
$f1->selectField("Acciones", "accion_id",bd_lista_acciones(),FH_NOT_EMPTY,true);
$f1->selectField("Regiones", "region_id",bd_lista_regiones(),FH_NOT_EMPTY,true);
$f1->selectField("Causas", "causa_id",bd_lista_causas(),FH_NOT_EMPTY,true);
$f1->textfield('Acto','acto',FH_STRING,30,15,"onkeyup=\"incidente.acto.value=incidente.acto.value.toUpperCase();\"");
$f1->textfield('Area','area',FH_STRING,30,15,"onkeyup=\"incidente.area.value=incidente.area.value.toUpperCase();\"");
$f1->textfield('Tiempo perdido','tiempo_perdido',FH_STRING,30,15,"onkeyup=\"incidente.tiempo_perdido.value=incidente.tiempo_perdido.value.toUpperCase();\"");
$f1->textArea('Proyecto','proyecto',FH_STRING,30,3,"onkeyup=\"incidente.proyecto.value=incidente.proyecto.value.toUpperCase();\"");
$f1->textArea('Descripcion','descripcion',FH_STRING,30,3,"onkeyup=\"incidente.descripcion.value=incidente.descripcion.value.toUpperCase();\"");
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
	$d['personal_reg_id'] = $_SESSION['usuario']['id'];
	bd_guardar_incidente($d);
	$_SESSION['mensaje']="INCIDENTE REGISTRADO CORRECTAMENTE";	
	ir('registrar_incidente.php');;
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);