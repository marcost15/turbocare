<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_personal.php';
include './modelo/bd_modificar_personal.php';
include './modelo/bd_lista_niveles.php';
include './modelo/bd_lista_cargos.php';
include './modelo/bd_lista_gerencias.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('modificar_personal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$foto = array(
  "path"        => './upload/personal',
  "type" 		=> "JPG jpg JPEG jpeg GIF gif PNG png BMP bmp",
  "required"    => false,
  "exists"      => "overwrite"
);
$personal = bd_ficha_personal($_REQUEST['id']);
$fecha1 = f2f($personal['fecha_nac']);

$estado = array(
'ACTIVO' => 'ACTIVO',
'INACTIVO' => 'INACTIVO'
);
$grado_int = array(
	"PRIMARIA"      => "PRIMARIA",
	"SECUNDARIA"    => "SECUNDARIA",
	"TECNICO MEDIO" => "TECNICO MEDIO",
	"TSU"           => "TSU",
	"UNIVERSITARIO" => "UNIVERSITARIO",
	"MAGISTER"      => "MAGISTER",
	"ESPECIALISTA"  => "ESPECIALISTA",
	"DOCTOR"        => "DOCTOR",
	"NINGUNO"       => "NINGUNO"
);

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->borderStart('Modificar Personal');
$f1->hiddenField('id', $personal['id']);
$f1->textField($star.'Nombre','nombre',FH_STRING,30,35,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->setValue('nombre', $personal['nombre']);
$f1->textField($star.'Apellido','apellido',FH_STRING,30,35,"onkeyup=\"personal.apellido.value=personal.apellido.value.toUpperCase();\"");
$f1->setValue('apellido', $personal['apellido']);
$f1->textArea($star.'Direccion','direccion',FH_STRING,30,3,"onkeyup=\"personal.direccion.value=personal.direccion.value.toUpperCase();\"");
$f1->setValue('direccion', $personal['direccion']);
$f1->textField('Teléfono Fijo','tlf_fijo',_FH_DIGIT,15,20,"onkeyup=\"return ValNumero(this);\"");
$f1->setHelpText('tlf_fijo','El formato es solo numero 0000999999');
$f1->setValue('tlf_fijo', $personal['tlf_fijo']);
$f1->textField('Teléfono Movil','tlf_movil',_FH_DIGIT,15,20,"onkeyup=\"return ValNumero(this);\"");
$f1->setHelpText('tlf_movil','El formato es solo numero 0000999999');
$f1->setValue('tlf_movil', $personal['tlf_movil']);
$f1->textField('Correo Electronico','correo',_FH_EMAIL,30,50);
$f1->setValue('correo', $personal['correo']);
$f1->jsDateField('Fecha de Nacimiento','fecha_nac','validafecha',1,'d-m-y',"90:00");
$f1->setValue('fecha_nac', $personal['fecha_nac']);
$f1->selectField($star."Nivel de Acceso", "nivel_id",bd_lista_niveles(),FH_NOT_EMPTY,true);
$f1->setValue('nivel_id', $personal['nivel_id']);
$f1->selectField($star."Cargo", "cargo_id",bd_lista_cargos(),FH_NOT_EMPTY,true);
$f1->setValue('cargo_id', $personal['cargo_id']);
$f1->selectField($star."Gerencia", "gerencia_id",bd_lista_gerencias(),FH_NOT_EMPTY,true);
$f1->setValue('gerencia_id', $personal['gerencia_id']);
$f1->selectField($star."Grado de Instruccion", "grado_instr",$grado_int,FH_NOT_EMPTY,true);
$f1->setValue('grado_instr', $personal['grado_instr']);
$f1->uploadField('Foto', 'foto', $foto);
$f1->setValue('foto', $personal['foto']);
$f1->selectField($star."Estado", "estado",$estado,FH_NOT_EMPTY,true);
$f1->setValue('estado', $personal['estado']);
$f1->addLine($star ." = Campos Requeridos Obligatoriamente");
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
		$d['fecha_nac'] = f2f("$d[fecha_nac]");
		bd_modificar_personal($d);
		?>
				<script type="text/javascript">
				window.alert('PERSONAL MODIFICADO CORRECTAMENTE');
				location.href='consmod_personal.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();