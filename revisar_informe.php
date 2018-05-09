<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_verificar_privilegios.php';

if (bd_verificar_privilegios('revisar_informe.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];
$fecha = date('Y-m-d');
$personal_id = $_SESSION['usuario']['id'];

	$sql = "UPDATE informes
			SET fecha_revi            =  '$fecha',
				personal_rev_id       =  '$personal_id'
				WHERE CONVERT(`informes`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);

?>
		<script type="text/javascript">
		window.alert('INFORME REVISADO CORRECTAMENTE');
		location.href='consmod_informes.php';
	</script>
<?php	