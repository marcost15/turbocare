<?php /* Smarty version 2.6.26, created on 2014-03-04 12:30:57
         compiled from registrar_hhe.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Horas Hombre')));
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
    var f1 = new LiveValidation(\'taller\'); f1.add( Validate.Presence ); f1.add( Validate.Numericality );
	var f2 = new LiveValidation(\'campo\'); f2.add( Validate.Presence );f2.add( Validate.Numericality );
	var f3 = new LiveValidation(\'contratista\'); f3.add( Validate.Presence ); f3.add( Validate.Numericality );
	var f4 = new LiveValidation(\'ifb\'); f4.add( Validate.Presence ); f4.add( Validate.Numericality );
    var f5 = new LiveValidation(\'ifn\'); f5.add( Validate.Presence ); f5.add( Validate.Numericality );
	var f6 = new LiveValidation(\'is\'); f6.add( Validate.Presence ); f6.add( Validate.Numericality );
	var f7 = new LiveValidation(\'im\'); f7.add( Validate.Presence ); f7.add( Validate.Numericality );
</script>
'; ?>
