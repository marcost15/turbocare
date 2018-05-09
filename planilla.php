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
include './modelo/bd_obt_tipos_sec.php';
include './modelo/bd_obt_PERSONAL.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('planilla.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$informe = bd_ficha_informe($_REQUEST['id']);
$informe['equipo_id'] = bd_obt_equipos(0,$informe['equipo_id']);
$id = $informe['id']; 
$secciones = sql2array("SELECT seccion_id FROM informe_secciones WHERE informe_id = '$id'");
$gestion = bd_obt_gestion('todo');
foreach ($gestion as $i=>$c)
{
	$id25 = $gestion[$i]['id'];
	$gestion_informe = $informe['tipo_gestion_id'];
	if ($id25 == $gestion_informe)
	{
		$gestion[$i]['check'] = 'X';
	}
}
$tipos_seccion = bd_obt_tipos_sec('todo');
foreach ($tipos_seccion as $i=>$c)
{
	$id30 = $tipos_seccion[$i]['id']; 
	$tipos_seccion[$i]['secc'] = sql2array("SELECT id, nombre FROM secciones WHERE tipo_sec_id = '$id30'");
	$tipos_seccion[$i]['cont'] = count($tipos_seccion[$i]['secc']);
	$za = $tipos_seccion[$i]['cont'];
	if ($za > 4)
	{
		$za = $za/4;
		$za = ceil($za);
		$tipos_seccion[$i]['cont_v'] = $za;
	}
	else
	{
		$tipos_seccion[$i]['cont_v'] = 1;
	}
}
foreach ($tipos_seccion as $i=>$c)
{
	$duver = $tipos_seccion[$i]['secc'];
	foreach ($duver as $y=>$r)
	{
		$duver_secc_one = $duver[$y]['id'];
		foreach ($secciones as $w=>$q)
		{
			$sec_duver = $secciones[$w]['seccion_id'];
			if ($duver_secc_one == $sec_duver)
			{
				$tipos_seccion[$i]['secc'][$y]['check'] = 'X';
			}
		}
	}
}
	
foreach ($tipos_seccion as $i=>$c)
{
	$datos60 = $tipos_seccion[$i]['secc'];
	$vueltas = $tipos_seccion[$i]['cont_v'];
	$total_reg = $tipos_seccion[$i]['cont'];
	$acumulador = 0;
	for ($j = 1; $j <= $vueltas; $j++)
	{
		$contador = 0;
		if ($acumulador == 0)
		{
			foreach ($datos60 as $m=>$k)
			{
				$contador = $contador + 1;
				$tipos_seccion[$i]['secc_agrup'][$j-1]['fila'][$m] = $tipos_seccion[$i]['secc'][$m];
				if ($contador == 4)
				{
					$acumulador = $acumulador + 4;
					break;
				}
			}
		}
		else
		{
			for ($f = $acumulador; $f <= $total_reg; $f++)
			{
				$contador = $contador + 1;
				$tipos_seccion[$i]['secc_agrup'][$j-1]['fila'][$contador-1] = $tipos_seccion[$i]['secc'][$f];
				if ($contador == 4)
				{
					$acumulador = $acumulador + 4;
					break;
				}
			}
		}
	}
}
$informe['fecha'] = f2f($informe['fecha']);
$informe['fecha_eva'] = f2f($informe['fecha_eva']);
$informe['fecha_revi'] = f2f($informe['fecha_revi']);
$informe['fecha_obs'] = f2f($informe['fecha_obs']);
$informe['personal_id'] = bd_obt_personal($informe['personal_id']);
$informe['evaluador_id'] = bd_obt_personal($informe['evaluador_id']);
$informe['personal_rev_id'] = bd_obt_personal($informe['personal_rev_id']);
$informe['personal_obs_id'] = bd_obt_personal($informe['personal_obs_id']);
$informe['tipo_gestion_id'] = bd_obt_gestion(0,$informe['tipo_gestion_id']);
$fecha= date('d-m-Y');

$smarty->assign('ficha',$informe);
$smarty->assign('gestion',$gestion);
$smarty->assign('tipos_seccion',$tipos_seccion);
$smarty->assign('fecha',$fecha);
$smarty->disp();