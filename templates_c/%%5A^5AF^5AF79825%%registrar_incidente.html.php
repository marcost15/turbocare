<?php /* Smarty version 2.6.26, created on 2014-03-04 12:23:01
         compiled from registrar_incidente.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Incidente')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['f1']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	var f1 = new LiveValidation(\'area\'); f1.add( Validate.Presence );
	var f2 = new LiveValidation(\'area\'); f2.add( Validate.Presence );
	var f3 = new LiveValidation(\'proyecto\'); f3.add( Validate.Presence ); 
	var f4 = new LiveValidation(\'descripcion\'); f4.add( Validate.Presence ); 
	var f5 = new LiveValidation(\'tiempo_perdido\'); f5.add( Validate.Presence ); 
'; ?>
