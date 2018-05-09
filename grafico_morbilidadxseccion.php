<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
include './modelo/bd_obt_secciones_morb.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$c = sql2value("SELECT COUNT(*) FROM  secciones_morb");
$seccion = bd_obt_secciones_morb('todo');
$total=0;
foreach ($seccion as $i=>$c)
{
	$a = $seccion[$i]['id'];
	$seccion[$i]['cant'] = sql2value("SELECT COUNT(*) FROM morbilidad WHERE secciones_morb_id = '$a'");
	$total = $total	+ $seccion[$i]['cant'];			
}
foreach ($seccion as $i=>$c)
{
	$b = $seccion[$i]['cant'];
	if ($b != 0)
	{
		$seccion[$i]['porc'] = $b*100/$total;
		$seccion[$i]['porc'] = round($seccion[$i]['porc']);
	}
	else
	{
		$seccion[$i][porc] = 0;
	}
}

$chart = new HorizontalBarChart(850, 420);
$dataSet = new XYDataSet();
foreach ($seccion as $i=>$c)
{
	$nombre = $seccion[$i]['nombre']; //caption de el eje y
	$porc = $seccion[$i]['porc'];
	$cant = $seccion[$i]['cant'];
	$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/gr_morbilidadxseccion.png");
$smarty->disp();