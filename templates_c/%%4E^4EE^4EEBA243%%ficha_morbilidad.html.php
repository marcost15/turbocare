<?php /* Smarty version 2.6.26, created on 2014-03-05 21:07:29
         compiled from ficha_morbilidad.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Morbilidad')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>FICHA DE MORBILIDAD</h3>

<table class = "retiro" align = "center" border="1">

	<tr>
		<th>Fecha</th>
		<td><?php echo $this->_tpl_vars['ficha']['fecha']; ?>
</td>
    <tr>
		<th>Personal</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_id']; ?>
</td>
	<tr>
		<th>Secciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['secciones_morb_id']; ?>
</td>
	</tr>
	<tr>
		<th>Patologia</th>
		<td><?php echo $this->_tpl_vars['ficha']['patologia']; ?>
</td>
	</tr>
	<tr>
		<th>Amezulia</th>
		<td><?php echo $this->_tpl_vars['ficha']['amezulia']; ?>
</td>
	</tr>
	<tr>
		<th>Consulta Externa</th>
		<td><?php echo $this->_tpl_vars['ficha']['consulta_ext']; ?>
</td>
	</tr>
	<tr>
		<th>Reposo AC/EC</th>
		<td><?php echo $this->_tpl_vars['ficha']['reposos_ac_ec']; ?>
</td>
	</tr>
	<tr>
		<th>Reposo AT/EO</th>
		<td><?php echo $this->_tpl_vars['ficha']['reposo_at_eo']; ?>
</td>
	</tr>
	<tr>
		<th>Dias Perdidos</th>
		<td><?php echo $this->_tpl_vars['ficha']['dias_perdido']; ?>
</td>
	</tr>
	<tr>
		<th>Observaciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['observaciones']; ?>
</td>
	</tr>
	<tr>
		<th>Personal que Registra</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_reg_id']; ?>
</td>
	</tr>
</table>
<p></p>
<hr/>	
<div id="boton" align="center"><a href="consmod_morbilidad.php"><img onmouseover='overlib("<strong>Volver</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" onmouseout='return nd();'/></a></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>