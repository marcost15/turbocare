<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_morbilidad.php';
include './modelo/bd_modificar_morbilidad.php';
include './modelo/bd_lista_secciones_morb.php';
include './modelo/bd_lista_gerencias.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('modificar_morbilidad.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$morbilidad = bd_ficha_morbilidad($_REQUEST['id']);
$fecha1 = f2f($morbilidad['fecha']);

$sino = array(
 "SI" => "SI",
 "NO" => "NO"
);

$f1=new FormHandler('morbilidad',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar Morbilidad');
$f1->hiddenField('id', $morbilidad['id']);
$f1->jsDateField('Fecha','fecha','validafecha',1,'d-m-y',"90:00");
$f1->setValue('fecha', $morbilidad['fecha']);
$f1->selectField("Secciones", "secciones_morb_id",bd_lista_secciones_morb(),FH_NOT_EMPTY,true);
$f1->setValue('secciones_morb_id', $morbilidad['secciones_morb_id']);
$f1->textfield("Patologia", "patologia",FH_STRING,30,20,"onkeyup=\"morbilidad.patologia.value=morbilidad.patologia.value.toUpperCase();\"");
$f1->setValue('patologia', $morbilidad['patologia']);
$f1->radiobutton("Amezulia", "amezulia",$sino,FH_NOT_EMPTY,true);
$f1->setValue('amezulia', $morbilidad['amezulia']);
$f1->radiobutton("Consulta Externa", "consulta_ext",$sino,FH_NOT_EMPTY,true);
$f1->setValue('consulta_ext', $morbilidad['consulta_ext']);
$f1->radiobutton("Reposo AC/EC", "reposos_ac_ec",$sino,FH_NOT_EMPTY,true);
$f1->setValue('reposos_ac_ec', $morbilidad['reposos_ac_ec']);
$f1->radiobutton("Reposo AT/EO", "reposo_at_eo",$sino,FH_NOT_EMPTY,true);
$f1->setValue('reposo_at_eo', $morbilidad['reposo_at_eo']);
$f1->textfield('Dias perdidos','dias_perdido',FH_STRING,30,5,"onkeyup=\"morbilidad.dias_perdido.value=morbilidad.dias_perdido.value.toUpperCase();\"");
$f1->setValue('dias_perdido', $morbilidad['dias_perdido']);
$f1->textArea('Observaciones','observaciones',FH_STRING,30,3,"onkeyup=\"morbilidad.observaciones.value=morbilidad.observaciones.value.toUpperCase();\"");
$f1->setValue('observaciones', $morbilidad['observaciones']);
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
		bd_modificar_morbilidad($d);
		?>
				<script type="text/javascript">
				window.alert('MORBILIDAD MODIFICADO CORRECTAMENTE');
				location.href='consmod_morbilidad.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();