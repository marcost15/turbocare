<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_incidentes.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_obt_empresas.php';
include './modelo/bd_obt_secciones.php';
include './modelo/bd_obt_clases.php';
include './modelo/bd_obt_tipos.php';
include './modelo/bd_obt_condiciones.php';
include './modelo/bd_obt_acciones.php';
include './modelo/bd_obt_regiones.php';
include './modelo/bd_obt_causas.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('ficha_incidentes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$incidentes = bd_ficha_incidentes($_REQUEST['id']);
$incidentes['personal_id'] = bd_obt_personal($incidentes['personal_id']);
$incidentes['empresa_id'] = bd_obt_empresas(0,$incidentes['empresa_id']);
$incidentes['seccion_id'] = bd_obt_secciones(0,$incidentes['seccion_id']);
$incidentes['clase_id'] = bd_obt_clases(0,$incidentes['clase_id']);
$incidentes['tipo_id'] = bd_obt_tipos(0,$incidentes['tipo_id']);
$incidentes['condicion_id'] = bd_obt_condiciones(0,$incidentes['condicion_id']);
$incidentes['accion_id'] = bd_obt_acciones(0,$incidentes['accion_id']);
$incidentes['region_id'] = bd_obt_regiones(0,$incidentes['region_id']);
$incidentes['causa_id'] = bd_obt_causas(0,$incidentes['causa_id']);
$incidentes['personal_reg_id'] = bd_obt_personal($incidentes['personal_reg_id']);
$smarty->assign('ficha',$incidentes);
$smarty->disp();