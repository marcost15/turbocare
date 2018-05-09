<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './modelo/bd_verifica_login.php';
include './modelo/bd_cambiar_clave.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('cambiar_clave.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new formHandler('modif_clave',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>CAMBIAR CLAVE</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Login Anterior','login_viejo',FH_STRING,15,30);
$f1->textField('Nuevo Login','login_nuevo',FH_STRING,15,30);
$f1->passField('Clave actual','clave_actual',FH_STRING,15,30);
$f1->passField('Nueva clave','clave_nueva',FH_PASSWORD,15,30);
$f1->passField('Confirmar Clave','clave_conf',FH_PASSWORD,15,30);
$f1->checkPassword("clave_nueva", "clave_conf");
$f1->setHelpText('clave_actual','Por Favor Introduzca la Clave que Actualmente Usa y luego Ingrese su Nueva Clave');
$f1->onCorrect('proceso');
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Cambiar la clave','registrar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");

function proceso($d)
{  
	$mark = true;
	$usuario=bd_verifica_login(array('usuario'=>$_SESSION['usuario']['login'],'contrasena'=>$d['clave_actual']));
	$d['usuario']=$login;
	$d['id']=$_SESSION['usuario']['id'];
	if(!isset($usuario['id']))
	{
  		$_SESSION['mensaje']="CLAVE ACTUAL INCORRECTA VERIFIQUE";
		$mark = false;
	}
	$login1 = $d['login_viejo'];
	$resp = sql2value("SELECT COUNT(*) FROM personal WHERE login = '$login1'");
	if ($resp == 0)
	{
		$_SESSION['mensaje']="LOGIN ACTUAL INCORRECTO VERIFIQUE";
		$mark = false;
	}
	if ($mark == true)
	{
		bd_cambiar_clave($d);
		ir('index.php');
	}
	ir('cambiar_clave.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);