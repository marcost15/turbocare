<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$datos = $_SESSION['data5'];
$desde = $datos['fecha_ini'];
$hasta = $datos['fecha_fin'];
$desde1 = explode('-',$desde);
$hasta1 = explode('-',$hasta);

$meses=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo',
   '04'=>'Abril','05'=>'Mayo','06'=>'Junio',
   '07'=>'Julio','08'=>'Agosto','09'=>'Septiembre',
   '10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
$total = count($datos['datos']);
if ($desde1[2] == $hasta1[2])
{
	foreach ($meses as $i=>$c)
	{
		$meses1[$i]['id'] = $i;	
		$meses1[$i]['nombre'] = $meses[$i];	
		$meses1[$i]['cant'] = 0;
	}	
	for ($j =0; $j <= $total -1; $j++)
	{
		$fecha_registro = $datos['datos'][$j]['fecha'];
		$fecha_registro = explode('-',$fecha_registro);
		foreach ($meses1 as $i=>$c)
		{
			$m = $meses1[$i]['id'];
			$m_resg = $fecha_registro[1];
			if ($m == $m_resg)
			{	
				$meses1[$i]['cant'] = $meses1[$i]['cant'] + 1;
			}
		}
	}
	foreach ($meses1 as $i=>$c)
	{
		if ($meses1[$i]['cant'] != 0)
		{
			$b = $meses1[$i]['cant'];
			$meses1[$i]['porc'] = $b*100/$total;
			$meses1[$i]['porc'] = round($meses1[$i]['porc']);
		}
	}
	$chart = new HorizontalBarChart(850, 420);
	$dataSet = new XYDataSet();
	foreach ($meses1 as $i=>$c)
	{
		if ($meses1[$i]['cant'] != 0)
		{
			$nombre = $meses1[$i]['nombre'];
			$cant = $meses1[$i]['cant'];			
			$porc = $meses1[$i]['porc'];
			$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
		}
	}
}	
else
{
	$cant_ano = $hasta1[2] - $desde1[2];
	$ano_actual = $desde1[2] - 1;
	for ($p = 0; $p <= $cant_ano ; $p++)
	{
		$ano_actual = $ano_actual + 1;
		foreach ($meses as $i=>$c)
		{
			$meses1[$p][$i]['id'] = $i;	
			$meses1[$p][$i]['nombre'] = $meses[$i]." $ano_actual";	
			$meses1[$p][$i]['cant'] = 0;
		}
		for ($j =0; $j <= $total -1; $j++)
		{
			$fecha_registro = $datos['datos'][$j]['fecha'];
			$fecha_registro = explode('-',$fecha_registro);
			foreach ($meses as $i=>$c)
			{
				$m = $meses1[$p][$i]['id'];
				$m_resg = $fecha_registro[1];
				$ano_pasando =  $fecha_registro[2];
				if ($m == $m_resg AND $ano_actual == $ano_pasando)
				{	
					$meses1[$p][$i]['cant'] = $meses1[$p][$i]['cant'] + 1;
				}
			}
		}
		foreach ($meses as $i=>$c)
		{
			if ($meses1[$p][$i]['cant'] != 0)
			{
				$b = $meses1[$p][$i]['cant'];
				$meses1[$p][$i]['porc'] = $b*100/$total;
				$meses1[$p][$i]['porc'] = round($meses1[$p][$i]['porc']);
			}
		}
	}
	$chart = new HorizontalBarChart(850, 420);
	$dataSet = new XYDataSet();
	foreach ($meses1 as $i=>$c)
	{
		$ano = $meses1[$i];
		foreach ($ano as $t=>$k)
		{
			if ($meses1[$i][$t]['cant'] != 0)
			{
				$nombre = $meses1[$i][$t]['nombre'];
				$cant = $meses1[$i][$t]['cant'];			
				$porc = $meses1[$i][$t]['porc'];
				$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
			}
		}
	}
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/gr_incidentexfecha.png");
$smarty->disp();