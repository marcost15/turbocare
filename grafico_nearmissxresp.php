<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
include './modelo/bd_obt_personal.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$c = sql2value("SELECT COUNT(id) FROM  personal");
$responsables = bd_obt_personal();

$total=0;
foreach ($responsables as $i=>$c)
{
	$a = $responsables[$i]['id'];
	$responsables[$i][cant] = sql2value("SELECT COUNT(*) FROM informes WHERE personal_id = '$a'");
	$total = $total	+ $responsables[$i][cant];			
}
foreach ($responsables as $i=>$c)
{
	$b = $responsables[$i][cant];
	if ($b != 0)
	{
	$responsables[$i][porc] = $b*100/$total;
	$responsables[$i][porc] = round($responsables[$i]['porc']);
	}
	else
	{
		$responsables[$i]['porc'] = 0;
	}
}

$chart = new HorizontalBarChart(850, 420);
$dataSet = new XYDataSet();
foreach ($responsables as $i=>$c)
{
	$nombre = $responsables[$i][nombreape]; //caption de el eje y
	$porc = $responsables[$i][porc];
	$cant = $responsables[$i][cant];
	$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/gr_nearmissxresp.png");
$smarty->disp();