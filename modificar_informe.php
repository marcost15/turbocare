<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_informe.php';
include './modelo/bd_lista_equipos.php';
include './modelo/bd_lista_secciones.php';
include './modelo/bd_modificar_informe.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('modificar_informe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];
$informe = bd_ficha_informe($id);
$secciones = sql2array("SELECT seccion_id FROM informe_secciones WHERE informe_id = '$id'");
foreach($secciones as $i=>$m)
{
	$secciones[$i] = $secciones[$i]['seccion_id'];
}

$f1=new FormHandler('informe',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar Informe');
$f1->hiddenField('id', $informe['id']);
$f1->selectField("Tipo de Gestion", "tipo_gestion_id",bd_lista_equipos(),FH_NOT_EMPTY,true);
$f1->setValue('tipo_gestion_id', $informe['tipo_gestion_id']);
$f1->selectField("Equipo", "equipo_id",bd_lista_equipos(),FH_NOT_EMPTY,true);
$f1->setValue('equipo_id', $informe['equipo_id']);
$f1->textArea('Area','area',FH_STRING,30,3,"onkeyup=\"informe.area.value=informe.area.value.toUpperCase();\"");
$f1->setValue('area', $informe['area']);
$f1->textArea('Hallazgos','hallazgos',FH_STRING,30,3,"onkeyup=\"informe.hallazgos.value=informe.hallazgos.value.toUpperCase();\"");
$f1->setValue('hallazgos', $informe['hallazgos']);
$f1->textArea('Correcciones','correcciones',FH_STRING,30,3,"onkeyup=\"informe.correcciones.value=informe.correcciones.value.toUpperCase();\"");
$f1->setValue('correcciones', $informe['correcciones']);
$f1->textArea('Acciones','acciones',FH_STRING,30,3,"onkeyup=\"informe.acciones.value=informe.acciones.value.toUpperCase();\"");
$f1->setValue('acciones', $informe['acciones']);
$f1->ListField("Secciones", "seccion_id", bd_lista_secciones(),FH_NOT_EMPTY,true,'SELECCIONADOS','DISPONIBLE',5); 
$f1->setValue('seccion_id', $secciones);
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
		bd_modificar_informe($d);
		?>
				<script type="text/javascript">
				window.alert('INFORME MODIFICADO CORRECTAMENTE');
				location.href='consmod_informes.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();