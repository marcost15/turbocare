<?php /* Smarty version 2.6.26, created on 2014-03-04 12:25:03
         compiled from ficha_incidentes.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Incidentes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>FICHA DE INCIDENTES</h3>

<table class = "retiro" align = "center" border="1">

	<tr>
		<th>Fecha</th>
		<td><?php echo $this->_tpl_vars['ficha']['fecha']; ?>
</td>
	</tr>
	<tr>
		<th>Hora</th>
		<td><?php echo $this->_tpl_vars['ficha']['hora']; ?>
</td>
	</tr>
	<tr>
		<th>Personal</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_id']; ?>
</td>
	</tr>
	<tr>
		<th>Empresas</th>
		<td><?php echo $this->_tpl_vars['ficha']['empresa_id']; ?>
</td>
	</tr>
	<tr>
		<th>Secciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['seccion_id']; ?>
</td>
	</tr>
	<tr>
		<th>Clases</th>
		<td><?php echo $this->_tpl_vars['ficha']['clase_id']; ?>
</td>
	</tr>
	<tr>
		<th>Tipos</th>
		<td><?php echo $this->_tpl_vars['ficha']['tipo_id']; ?>
</td>
	</tr>
	<tr>
		<th>Condiciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['condicion_id']; ?>
</td>
	</tr>
	<tr>
		<th>Acciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['accion_id']; ?>
</td>
	</tr>
	<tr>
		<th>Regiones</th>
		<td><?php echo $this->_tpl_vars['ficha']['region_id']; ?>
</td>
	</tr>
	<tr>
		<th>Causas</th>
		<td><?php echo $this->_tpl_vars['ficha']['causa_id']; ?>
</td>
	</tr>
	<tr>
		<th>Acto</th>
		<td><?php echo $this->_tpl_vars['ficha']['acto']; ?>
</td>
	</tr>
	<tr>
		<th>Area</th>
		<td><?php echo $this->_tpl_vars['ficha']['area']; ?>
</td>
	</tr>
	<tr>
		<th>Tiempo Perdido</th>
		<td><?php echo $this->_tpl_vars['ficha']['tiempo_perdido']; ?>
</td>
	</tr>
		<tr>
		<th>Proyecto</th>
		<td><?php echo $this->_tpl_vars['ficha']['proyecto']; ?>
</td>
	</tr>
		<tr>
		<th>Descripcion</th>
		<td><?php echo $this->_tpl_vars['ficha']['descripcion']; ?>
</td>
	</tr>
	</tr>
		<tr>
		<th>Personal que Registra</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_reg_id']; ?>
</td>
	</tr>
</table>
<p></p>
<hr/>	
<div id="boton" align="center"><a href="consmod_incidentes.php"><img onmouseover='overlib("<strong>Volver</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" onmouseout='return nd();'/></a></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>