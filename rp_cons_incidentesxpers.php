<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_obt_empresas.php';
include './modelo/bd_obt_secciones.php';
include './modelo/bd_obt_clases.php';
include './modelo/bd_obt_tipos.php';
include './modelo/bd_obt_condiciones.php';
include './modelo/bd_obt_acciones.php';
include './modelo/bd_obt_regiones.php';
include './modelo/bd_obt_causas.php';
include './modelo/bd_obt_cargos.php';
include './modelo/bd_obt_gerencias.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_cons_incidentesxpers.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];

$reporte = sql2array("SELECT id,fecha,hora,personal_id,empresa_id,area,seccion_id,proyecto,clase_id,tipo_id,condicion_id,accion_id,region_id,causa_id,
							descripcion,tiempo_perdido,personal_reg_id,acto FROM incidentes WHERE personal_id = '$id'");

foreach ($reporte as $i=>$c)
{		
	$personal_id = $reporte[$i]['personal_id'];
	$reporte[$i]['fecha_nac'] = sql2value("SELECT fecha_nac FROM personal_datos WHERE personal_id = '$personal_id'");
	$reporte[$i]['grado_instr'] = sql2value("SELECT grado_instr FROM personal_datos WHERE personal_id = '$personal_id'");
	$reporte[$i]['cargo_id'] = sql2value("SELECT cargo_id FROM personal_datos WHERE personal_id = '$personal_id'");
	$reporte[$i]['gerencia_id'] = sql2value("SELECT gerencia_id FROM personal_datos WHERE personal_id = '$personal_id'");
	$reporte[$i]['edad'] = edad($reporte[$i]['fecha_nac']);
	$reporte[$i]['personal_id'] = bd_obt_personal($reporte[$i]['personal_id']);
	$reporte[$i]['seccion_id'] = bd_obt_secciones(0,$reporte[$i]['seccion_id']);
	$reporte[$i]['empresa_id'] = bd_obt_empresas(0,$reporte[$i]['empresa_id']);
	$reporte[$i]['clase_id'] = bd_obt_clases(0,$reporte[$i]['clase_id']);
	$reporte[$i]['tipo_id'] = bd_obt_tipos(0,$reporte[$i]['tipo_id']);
	$reporte[$i]['cargo_id'] = bd_obt_cargos(0,$reporte[$i]['cargo_id']);
	$reporte[$i]['gerencia_id'] = bd_obt_gerencias(0,$reporte[$i]['gerencia_id']);
	$reporte[$i]['condicion_id'] = bd_obt_condiciones(0,$reporte[$i]['condicion_id']);
	$reporte[$i]['accion_id'] = bd_obt_acciones(0,$reporte[$i]['accion_id']);
	$reporte[$i]['region_id'] = bd_obt_regiones(0,$reporte[$i]['region_id']);
	$reporte[$i]['causa_id'] = bd_obt_causas(0,$reporte[$i]['causa_id']);
	$reporte[$i]['personal_reg_id'] = bd_obt_personal($reporte[$i]['personal_reg_id']);
	$reporte[$i]['fecha'] = f2f($reporte[$i]['fecha']);
	
}
$smarty->assign('datos',$reporte);
$personal_id = bd_obt_personal($_REQUEST['id']);
$smarty->assign('personal_id',$personal_id);
$smarty->disp();
$_SESSION['data7']=array(
	'datos'      => $reporte,
	'secc'       => $secc,
	'personal_id'  => $personal_id
);