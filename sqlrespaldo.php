<?php
session_start();
include "./configs/bd.php";
include "./configs/funciones.php";
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('sqlrespaldo.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$archivo='./respaldobd/'. date("YmdHis").'.sql';
exec("mysqldump -u{$config['bd']['login']} -p{$config['bd']['clave']} {$config['bd']['bd']} >{$archivo} ");
ir('sqlguardar.php');