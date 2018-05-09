<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_informe.php';
include './modelo/bd_obt_equipos.php';
include './modelo/bd_obt_gestion.php';
include './modelo/bd_obt_secciones.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('ficha_informe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$informe = bd_ficha_informe($_REQUEST['id']);
$informe['equipo_id'] = bd_obt_equipos(0,$informe['equipo_id']);
$informe['fecha'] = f2f($informe['fecha']);
$informe['fecha_eva'] = f2f($informe['fecha_eva']);
$informe['fecha_revi'] = f2f($informe['fecha_revi']);
$informe['fecha_obs'] = f2f($informe['fecha_obs']);
$informe['personal_id'] = bd_obt_personal($informe['personal_id']);
$informe['evaluador_id'] = bd_obt_personal($informe['evaluador_id']);
$informe['personal_rev_id'] = bd_obt_personal($informe['personal_rev_id']);
$informe['personal_obs_id'] = bd_obt_personal($informe['personal_obs_id']);
$informe['tipo_gestion_id'] = bd_obt_gestion(0,$informe['tipo_gestion_id']);
$id = $informe['id']; 
$secciones = sql2array("SELECT seccion_id FROM informe_secciones WHERE informe_id = '$id'");
foreach ($secciones as $i=>$c)
{
	$secciones[$i]['seccion_id'] = bd_obt_secciones(0,$secciones[$i]['seccion_id']);
}
$smarty->assign('ficha',$informe);
$smarty->assign('secciones',$secciones);
$smarty->disp();