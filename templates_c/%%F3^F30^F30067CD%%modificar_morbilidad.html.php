<?php /* Smarty version 2.6.26, created on 2014-03-04 12:30:40
         compiled from modificar_morbilidad.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Modificar Morbilidad')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['f1']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
    var f1 = new LiveValidation(\'patologia\'); f1.add( Validate.Presence ); 
	var f2 = new LiveValidation(\'dias_perdido\'); f2.add( Validate.Presence );
	var f3 = new LiveValidation(\'observaciones\'); f3.add( Validate.Presence ); 
</script>
'; ?>