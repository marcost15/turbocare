<?php
session_start();
include "./configs/bd.php";
include "./configs/funciones.php";

$archivo=$_REQUEST['a'];
unlink("./respaldobd/{$archivo}");
ir('sqlguardar.php');