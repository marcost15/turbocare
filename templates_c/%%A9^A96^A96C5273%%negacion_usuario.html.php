<?php /* Smarty version 2.6.26, created on 2014-03-04 14:58:48
         compiled from negacion_usuario.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="mensaje">
<p>NO TIENE LOS PERMISOS NECESARIOS PARA ACCEDER</p> 
<div><center><img src="./imagenes/stop.png" width="150" height="155"/></center></div>
<p>POR FAVOR CONTACTE AL ADMINISTRADOR</p> 
<p>...Espere por favor, será redireccionado en 5 segundos...</p> 
</div>
<?php echo '
<script type="text/javascript"> 
function redireccionar(){ 
  window.location="index.php"; 
}  
setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos 
</script> 
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>