<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_lista_personal.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_buscar_incidentes.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_frm_incidentesxpers.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$error1 = '0';
$f1  = new formHandler('busqueda_personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Reporte por Persona');
$f1->selectField("Personal", "personal_id",bd_lista_personal(),FH_NOT_EMPTY,true);
$f1->setHelpText('texto','Para consultas por fecha por Favor Introduzca la fecha con formato año-mes-dia Ejm 2014-02-24');
$f1 -> submitButton('Continuar');
$f1->borderStop();
$f1 ->onCorrect('procesar');

function procesar($d)
{
	$id = $d['personal_id'];
	ir("rp_cons_incidentesxpers.php?id=$id");
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();