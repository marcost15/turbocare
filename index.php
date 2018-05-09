<?php
session_start();
$_SESSION=array();
session_destroy();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/funciones.php';
include './configs/fh3.php';
include './modelo/bd_verifica_login.php';

$f=new formHandler('login',NULL,'onclick="highlight(event)"');
$f->setLanguage('es');
$f->borderStart('Registro de Usuario');
$f->textField('Login','usuario',FH_ALPHA_NUM,15,30);
$f->passField('Clave','contrasena',FH_STRING,15,30);
$f->submitButton('Aceptar','verificar');
$f->borderStop();
$f->onCorrect('procesar');

function procesar($d)
{
	if($res=bd_verifica_login($d))
	{
		session_start();
		$_SESSION['usuario']=$res;
 		ir('registrar_informe.php');
	}
	else
	{
		ir('negacion_usuario.php');
	}	
}
$smarty->assign('f',$f->flush(true));
$smarty->disp();