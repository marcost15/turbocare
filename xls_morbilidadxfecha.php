<?php
session_start();
include './configs/smarty.php';
include './configs/funciones.php';

$data = $_SESSION['data9'];

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=rp_cons_morbilidadxfecha.xls");
header("Pragma: no-cache");
header("Expires: 0");
$smarty->assign('datos',$data);
$smarty->disp();