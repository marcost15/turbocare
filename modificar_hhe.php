<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_hhe.php';
include './modelo/bd_modificar_hhe.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('modificar_hhe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$hhe = bd_ficha_hhe($_REQUEST['id']);
$fecha1 = f2f($hhe['fecha']);

$f1=new FormHandler('hhe',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar Horas Hombre');
$f1->hiddenField('id', $hhe['id']);
$f1->jsDateField('Fecha','fecha','validafecha',1,'d-m-y',"90:00");
$f1->setValue('fecha', $hhe['fecha']);
$f1->textfield("Taller", "taller",FH_FLOAT,20,15);
$f1->setValue('taller', $hhe['taller']);
$f1->textfield("Campo", "campo",FH_FLOAT,20,15);
$f1->setValue('campo', $hhe['campo']);
$f1->textfield("Contratista", "contratista",FH_FLOAT,20,15);
$f1->setValue('contratista', $hhe['contratista']);
$f1->textfield("IFB", "ifb",FH_FLOAT,20,15);
$f1->setValue('ifb', $hhe['ifb']);
$f1->textfield("IFN", "ifn",FH_FLOAT,20,15);
$f1->setValue('ifn', $hhe['ifn']);
$f1->textfield("IS", "ist",FH_FLOAT,20,15);
$f1->setValue('ist', $hhe['ist']);
$f1->textfield("IM", "im",FH_FLOAT,20,15);
$f1->setValue('im', $hhe['im']);
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
		$d['fecha'] = f2f("$d[fecha]");
		bd_modificar_hhe($d);
		?>
				<script type="text/javascript">
				window.alert('HORAS HOMBRE MODIFICADAS CORRECTAMENTE');
				location.href='consmod_hhe.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();