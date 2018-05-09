<?php /* Smarty version 2.6.26, created on 2014-03-04 12:14:39
         compiled from registrar_personal.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Personal')));
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
	var f1 = new LiveValidation(\'id\'); f1.add( Validate.Presence ); f1.add( Validate.Length, { minimum: 7 } );
	var f2 = new LiveValidation(\'nombre\'); f2.add( Validate.Presence ); 
	var f3 = new LiveValidation(\'apellido\'); f3.add( Validate.Presence ); 
	var f4 = new LiveValidation(\'direccion\'); f4.add( Validate.Presence ); 
	var f6 = new LiveValidation(\'tlf_fijo\'); f6.add( Validate.Length, { minimum: 7 } );
	var f10 = new LiveValidation(\'tlf_movil\'); f10.add( Validate.Length, { minimum: 7 } );
	var f7 = new LiveValidation(\'clave\'); f7.add( Validate.Presence ); f7.add( Validate.Length, { minimum: 6 } );
	var f8 = new LiveValidation(\'clave2\'); f8.add( Validate.Presence ); f8.add( Validate.Length, { minimum: 6 } ); f8.add( Validate.Confirmation, { match: \'clave\' } );
	var f9 = new LiveValidation(\'correo\'); f9.add( Validate.Email );
	var f5 = new LiveValidation(\'login\'); f5.add( Validate.Presence ); f5.add( Validate.Length, { minimum: 6 } );
	
</script>
'; ?>
