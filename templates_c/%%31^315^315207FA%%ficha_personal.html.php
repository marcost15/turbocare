<?php /* Smarty version 2.6.26, created on 2014-03-05 13:38:27
         compiled from ficha_personal.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Personal')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>FICHA DE PERSONAL</h3>
<?php if ($this->_tpl_vars['ficha']['foto']): ?>
<div id = "foto15"><img src="./upload/personal/<?php echo $this->_tpl_vars['ficha']['foto']; ?>
" width="120" height="120" /></div>
<?php endif; ?>
<table class = "retiro" align = "center" border="1">
	<tr>
		<th>Cedula</th>
		<td><?php echo $this->_tpl_vars['ficha']['id']; ?>
</td>
	</tr>
	<tr>
		<th>Apellido</th>
		<td><?php echo $this->_tpl_vars['ficha']['apellido']; ?>
</td>
	</tr>
	<tr>
		<th>Nombre</th>
		<td><?php echo $this->_tpl_vars['ficha']['nombre']; ?>
</td>
	</tr>
	<tr>
		<th>Dirección</th>
		<td><?php echo $this->_tpl_vars['ficha']['direccion']; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['ficha']['tlf_fijo']): ?>
	<tr>
		<th>Telefono Fijo</th>
		<td><?php echo $this->_tpl_vars['ficha']['tlf_fijo']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['tlf_movil']): ?>
	<tr>
		<th>Telefono Movil</th>
		<td><?php echo $this->_tpl_vars['ficha']['tlf_movil']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['correo']): ?>
	<tr>
		<th>Correo electronico</th>
		<td><?php echo $this->_tpl_vars['ficha']['correo']; ?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<th>Nombre de Usuario</th>
		<td><?php echo $this->_tpl_vars['ficha']['login']; ?>
</td>
	</tr>
	<tr>
		<th>Estado</th>
		<td><?php echo $this->_tpl_vars['ficha']['estado']; ?>
</td>
	</tr>
	<tr>
		<th>Nivel de Acceso</th>
		<td><?php echo $this->_tpl_vars['ficha']['nivel_id']; ?>
</td>
	</tr>
	<tr>
		<th>Grado de Intruccion</th>
		<td><?php echo $this->_tpl_vars['ficha']['grado_instr']; ?>
%</td>
	</tr>
	<tr>
		<th>Cargo</th>
		<td><?php echo $this->_tpl_vars['ficha']['cargo_id']; ?>
</td>
	</tr>
	<tr>
		<th>Gerencia</th>
		<td><?php echo $this->_tpl_vars['ficha']['gerencia_id']; ?>
</td>
	</tr>
</table>
<p></p>
<hr/>	
<div id="boton" align="center"><a href="consmod_personal.php"><img onmouseover='overlib("<strong>Volver</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" onmouseout='return nd();'/></a></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>