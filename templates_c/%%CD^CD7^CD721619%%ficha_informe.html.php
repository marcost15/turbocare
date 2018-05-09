<?php /* Smarty version 2.6.26, created on 2014-03-04 12:26:22
         compiled from ficha_informe.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Informe')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>FICHA DE INFORME</h3>

<table class = "retiro" align = "center" border="1">

	<tr>
		<th>Fecha</th>
		<td><?php echo $this->_tpl_vars['ficha']['fecha']; ?>
</td>
	</tr>
	<tr>
		<th>Personal</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_id']; ?>
</td>
	</tr>
	<tr>
		<th>Tipo de Gestion</th>
		<td><?php echo $this->_tpl_vars['ficha']['tipo_gestion_id']; ?>
</td>
	</tr>
	<tr>
		<th>Equipos</th>
		<td><?php echo $this->_tpl_vars['ficha']['equipo_id']; ?>
</td>
	</tr>
	<tr>
		<th>Area</th>
		<td><?php echo $this->_tpl_vars['ficha']['area']; ?>
</td>
	</tr>
	<tr>
		<th>Hallazgos</th>
		<td><?php echo $this->_tpl_vars['ficha']['hallazgos']; ?>
</td>
	</tr>
	<tr>
		<th>Correcciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['correcciones']; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['ficha']['evaluador_id']): ?>
	<tr>
		<th>Evaluador</th>
		<td><?php echo $this->_tpl_vars['ficha']['evaluador_id']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['fecha_eva'] != 0000 -00 -00): ?>
	<tr>
		<th>Fecha de Evalucion</th>
		<td><?php echo $this->_tpl_vars['ficha']['fecha_eva']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['personal_rev_id']): ?>
	<tr>
		<th>Revisado Por</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_rev_id']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['fecha_revi'] != 0000 -00 -00): ?>
		<tr>
		<th>Fecha de Revision</th>
		<td><?php echo $this->_tpl_vars['ficha']['fecha_revi']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['observaciones']): ?>
		<tr>
		<th>Observaciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['observaciones']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['personal_obs_id']): ?>
		<tr>
		<th>Persona/Cierre de Acciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['personal_obs_id']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['fecha_obs'] != 0000 -00 -00): ?>
		<tr>
		<th>Fecha de Observaciones</th>
		<td><?php echo $this->_tpl_vars['ficha']['fecha_obs']; ?>
</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>Status</th>
		<td><?php echo $this->_tpl_vars['ficha']['status']; ?>
</td>
	</tr>
</table>
<p></p>
<?php if ($this->_tpl_vars['secciones']): ?>
<h3>SECCIONES INSPECCIONADAS</h3>
<table class = "retiro" align = "center" border="1">
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['secciones']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
	<tr>
		<td><?php echo $this->_tpl_vars['secciones'][$this->_sections['p']['index']]['seccion_id']; ?>
</td>
	</tr>
	<?php endfor; endif; ?>
</table>
<?php endif; ?>
<hr/>	
<div id="boton" align="center"><a href="consmod_informes.php"><img onmouseover='overlib("<strong>Volver</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" onmouseout='return nd();'/></a></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>