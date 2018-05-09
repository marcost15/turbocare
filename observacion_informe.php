<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_verificar_privilegios.php';

$id = $_REQUEST['id'];
$observacion = sql2value("SELECT observaciones FROM informes WHERE id = '$id'");
$f1=new FormHandler('informe',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar Observaciones');
$f1->hiddenField('id', $id);
$f1->textArea('Observacion','observacion',FH_STRING,30,3,"onkeyup=\"informe.observacion.value=informe.observacion.value.toUpperCase();\"");
$f1->setvalue('observacion',$observacion);
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Registrar','registrar');
$f1->resetButton();
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
	$id = $d['id'];
	$fecha = date('Y-m-d');
	$personal_id = $_SESSION['usuario']['id'];
	$sql = "UPDATE informes
			SET fecha_obs             =  '$fecha',
				personal_obs_id       =  '$personal_id',
				status                =  'CERRADO',
				observaciones         =  '$d[observacion]'
				WHERE CONVERT(`informes`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	$_SESSION['mensaje'] = "OBSERVACION AGREGADA CORRECTAMENTE.. CIERRE LA VENTANA PARA CONTINUAR";
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);