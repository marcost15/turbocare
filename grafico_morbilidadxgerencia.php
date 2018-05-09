<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
include './modelo/bd_obt_gerencias.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$c = sql2value("SELECT COUNT(id) FROM  gerencias");
$gerencias = bd_obt_gerencias('todo');

$total=0;
foreach ($gerencias as $i=>$c)
{
	$a = $gerencias[$i]['id'];
	$gerencias[$i][cant] = sql2value("SELECT COUNT(id) FROM morbilidad, personal_datos 
	WHERE gerencia_id = '$a' AND morbilidad.personal_id = personal_datos.personal_id");
	$total = $total	+ $gerencias[$i][cant];			
}
foreach ($gerencias as $i=>$c)
{
	$b = $gerencias[$i][cant];
	if ($b != 0)
	{
	$gerencias[$i][porc] = $b*100/$total;
	$gerencias[$i][porc] = round($gerencias[$i]['porc']);
	}
	else
	{
		$gerencias[$i]['porc'] = 0;
	}
	
}

$chart = new HorizontalBarChart(850, 420);
$dataSet = new XYDataSet();
foreach ($gerencias as $i=>$c)
{
	$nombre = $gerencias[$i]['nombre']; //caption de el eje y
	$porc = $gerencias[$i][porc];
	$cant = $gerencias[$i][cant];
	$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/gr_morbilidadxgerencia.png");
$smarty->disp();