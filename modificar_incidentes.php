<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_incidentes.php';
include './modelo/bd_modificar_incidentes.php';
include './modelo/bd_lista_empresas.php';
include './modelo/bd_lista_secciones.php';
include './modelo/bd_lista_clases.php';
include './modelo/bd_lista_tipos.php';
include './modelo/bd_lista_condiciones.php';
include './modelo/bd_lista_acciones.php';
include './modelo/bd_lista_regiones.php';
include './modelo/bd_lista_causas.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('modificar_incidentes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$incidentes = bd_ficha_incidentes($_REQUEST['id']);
$fecha1 = f2f($incidentes['fecha']);

$f1=new FormHandler('incidentes',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar Incidente');
$f1->hiddenField('id', $incidentes['id']);
$f1->jsDateField('Fecha','fecha','validafecha',1,'d-m-y',"90:00");
$f1->setValue('fecha', $incidentes['fecha']);
$f1 ->timeField("Hora", "hora");
$f1->setValue('hora', $incidentes['hora']);
$f1->selectField("Empresas", "empresa_id", bd_lista_empresas(),FH_NOT_EMPTY,true);
$f1->setValue('empresa_id', $incidentes['empresa_id']);
$f1->selectField("Secciones", "seccion_id",bd_lista_secciones(),FH_NOT_EMPTY,true);
$f1->setValue('seccion_id', $incidentes['seccion_id']);
$f1->selectField("Clases", "clase_id",bd_lista_clases(),FH_NOT_EMPTY,true);
$f1->setValue('clase_id', $incidentes['clase_id']);
$f1->selectField("Tipos", "tipo_id",bd_lista_tipos(),FH_NOT_EMPTY,true);
$f1->setValue('tipo_id', $incidentes['tipo_id']);
$f1->selectField("Condiciones", "condicion_id",bd_lista_condiciones(),FH_NOT_EMPTY,true);
$f1->setValue('condicion_id', $incidentes['condicion_id']);
$f1->selectField("Acciones", "accion_id",bd_lista_acciones(),FH_NOT_EMPTY,true);
$f1->setValue('accion_id', $incidentes['accion_id']);
$f1->selectField("Regiones", "region_id",bd_lista_regiones(),FH_NOT_EMPTY,true);
$f1->setValue('region_id', $incidentes['region_id']);
$f1->selectField("Causas", "causa_id",bd_lista_causas(),FH_NOT_EMPTY,true);
$f1->setValue('causa_id', $incidentes['causa_id']);
$f1->textfield('Tiempo perdido','tiempo_perdido',FH_STRING,30,3,"onkeyup=\"incidentes.tiempo_perdido.value=incidentes.tiempo_perdido.value.toUpperCase();\"");
$f1->setValue('tiempo_perdido', $incidentes['tiempo_perdido']);
$f1->textfield('Acto','acto',FH_STRING,30,20,"onkeyup=\"incidentes.acto.value=incidentes.acto.value.toUpperCase();\"");
$f1->setValue('acto', $incidentes['acto']);
$f1->textfield('Area','area',FH_STRING,30,20,"onkeyup=\"incidentes.area.value=incidentes.area.value.toUpperCase();\"");
$f1->setValue('area', $incidentes['area']);
$f1->textArea('Proyecto','proyecto',FH_STRING,30,3,"onkeyup=\"incidentes.proyecto.value=incidentes.proyecto.value.toUpperCase();\"");
$f1->setValue('proyecto', $incidentes['proyecto']);
$f1->textArea('Descripcion','descripcion',FH_STRING,30,3,"onkeyup=\"incidentes.descripcion.value=incidentes.descripcion.value.toUpperCase();\"");
$f1->setValue('descripcion', $incidentes['descripcion']);
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
		bd_modificar_incidentes($d);
		?>
				<script type="text/javascript">
				window.alert('INCIDENTE MODIFICADO CORRECTAMENTE');
				location.href='consmod_incidentes.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();