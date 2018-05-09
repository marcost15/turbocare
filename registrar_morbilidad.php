<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_personal.php';
include './modelo/bd_lista_secciones_morb.php';
include './modelo/bd_lista_gerencias.php';
include './modelo/bd_guardar_morbilidad.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_morbilidad.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$sino = array(
 "SI" => "SI",
 "NO" => "NO"
);

$f1=new FormHandler('morbilidad',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Registrar Morbilidad');
$f1->jsDateField('Fecha','fecha','validafecha',1,'d-m-y',"10:00");
$f1->selectField("Personal", "personal_id",bd_lista_personal(),FH_NOT_EMPTY,true);
$f1->selectField("Secciones", "secciones_morb_id",bd_lista_secciones_morb(),FH_NOT_EMPTY,true);
$f1->textfield("Patologia", "patologia",FH_STRING,30,20,"onkeyup=\"morbilidad.patologia.value=morbilidad.patologia.value.toUpperCase();\"");
$f1->radiobutton("Amezulia", "amezulia",$sino,FH_NOT_EMPTY,true);
$f1->radiobutton("Consulta Externa", "consulta_ext",$sino,FH_NOT_EMPTY,true);
$f1->radiobutton("Reposo AC/EC", "reposos_ac_ec",$sino,FH_NOT_EMPTY,true);
$f1->radiobutton("Reposo AT/EO", "reposo_at_eo",$sino,FH_NOT_EMPTY,true);
$f1->textfield('Dias perdidos','dias_perdido',FH_STRING,30,5,"onkeyup=\"morbilidad.dias_perdido.value=morbilidad.dias_perdido.value.toUpperCase();\"");
$f1->textArea('Observaciones','observaciones',FH_STRING,30,3,"onkeyup=\"morbilidad.observaciones.value=morbilidad.observaciones.value.toUpperCase();\"");
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
	bd_guardar_morbilidad($d);
	$_SESSION['mensaje']="MORBILIDAD REGISTRADO CORRECTAMENTE";	
	ir('registrar_morbilidad.php');;
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);