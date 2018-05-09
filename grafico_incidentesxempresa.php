<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
include './modelo/bd_obt_empresas.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$c = sql2value("SELECT COUNT(id) FROM  empresas");
$empresas = bd_obt_empresas('todo');

$total=0;
foreach ($empresas as $i=>$c)
{
	$a = $empresas[$i]['id'];
	$empresas[$i]['cant'] = sql2value("SELECT COUNT(*) FROM incidentes WHERE empresa_id = '$a'");
	$total = $total	+ $empresas[$i][cant];			
}
foreach ($empresas as $i=>$c)
{
	$b = $empresas[$i]['cant'];
	if ($b != 0)
	{
	$empresas[$i]['porc'] = $b*100/$total;
	$empresas[$i]['porc'] = round($empresas[$i]['porc']);
	}
	else
	{
		$empresas[$i]['porc'] = 0;
	}
}

$chart = new HorizontalBarChart(850, 420);
$dataSet = new XYDataSet();
foreach ($empresas as $i=>$c)
{
	$nombre = $empresas[$i]['nombre']; //caption de el eje y
	$porc = $empresas[$i]['porc'];
	$cant = $empresas[$i]['cant'];
	$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/gr_incidentesxempresa.png");
$smarty->disp();