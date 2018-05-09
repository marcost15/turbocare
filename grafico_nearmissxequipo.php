<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
include './modelo/bd_obt_equipos.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$c = sql2value("SELECT COUNT(id) FROM  equipos");
$equipos = bd_obt_equipos('todo');

$total=0;
foreach ($equipos as $i=>$c)
{
	$a = $equipos[$i]['id'];
	$equipos[$i][cant] = sql2value("SELECT COUNT(*) FROM informes WHERE equipo_id = '$a'");
	$total = $total	+ $equipos[$i][cant];			
}
foreach ($equipos as $i=>$c)
{
	$b = $equipos[$i][cant];
	if ($b != 0)
	{
	$equipos[$i][porc] = $b*100/$total;
	$equipos[$i][porc] = round($equipos[$i]['porc']);
	}
	else
	{
		$equipos[$i]['porc'] = 0;
	}
}

$chart = new HorizontalBarChart(850, 420);
$dataSet = new XYDataSet();
foreach ($equipos as $i=>$c)
{
	$nombre = $equipos[$i][nombre]; //caption de el eje y
	$porc = $equipos[$i][porc];
	$cant = $equipos[$i][cant];
	$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/gr_nearmissxequipo.png");
$smarty->disp();