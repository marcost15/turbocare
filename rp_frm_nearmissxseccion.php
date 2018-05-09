<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_secciones.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_frm_nearmissxseccion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('nearmissxseccion',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Informe de Inspecciones QEHS');
$f1->selectField("Secciones", "equipo_id",bd_lista_secciones(),FH_NOT_EMPTY,true);
$f1->submitButton('Aceptar','Aceptar');
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
	$id = $d['equipo_id'];
	ir("rp_cons_nearmissxseccion.php?id=$id");
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);
