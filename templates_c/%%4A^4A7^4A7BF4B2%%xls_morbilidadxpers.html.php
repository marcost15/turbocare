<?php /* Smarty version 2.6.26, created on 2014-03-04 21:02:11
         compiled from xls_morbilidadxpers.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera2.html", 'smarty_include_vars' => array('title' => 'Control de Morbilidad')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="resultados_reporte">
<p>
<div id = "indice">Relacion de Morbilidad Turbo Care </br>Seccion: <?php echo $this->_tpl_vars['datos']['personal_id']; ?>
 </div>
</p>
<?php if ($this->_tpl_vars['datos']['datos']): ?>
<div id="resultados">
<table class="enhancedtable" cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
<thead>
	<tr> 
		<th>NRO</th>
		<th>FECHA</th>
		<th>APELLIDO Y NOMBRE</th>
		<th>GERENCIA</th>
		<th>SECCION</th>
		<th>PATOLOGIA</th>
		<th>AMEZULIA</th>
		<th>CONSULTA EXTERNA</th>
		<th>REPOSO AC/EC</th>
		<th>REPOSO AT/EO</th>
		<th>DIAS PERDIDOS/REPOSO MEDICO</th>
		<th>OBSERVACIONES/COMENTARIOS</th>
		<th>PERSONAL REGISTRA</th>
		
	</tr>
</thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['datos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['fecha']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['personal_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['gerencia_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['seccion_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['patologia']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['amezulia']; ?>
</td>
		<?php if ("{".($this->_tpl_vars['datos']).".datos[p].amezulia" == 'SI'): ?>
		<td>X</td>
		else
		<td>&nbsp;</td>
		<?php endif; ?>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['consulta_ext']; ?>
</td>
		<?php if ("{".($this->_tpl_vars['datos']).".datos[p].consulta_ext" == 'SI'): ?>
		<td>X</td>
		else
		<td>&nbsp;</td>
		<?php endif; ?>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['reposos_ac_ec']; ?>
</td>
		<?php if ("{".($this->_tpl_vars['datos']).".datos[p].reposos_ac_ec" == 'SI'): ?>
		<td>X</td>
		else
		<td>&nbsp;</td>
		<?php endif; ?>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['reposo_at_eo']; ?>
</td>
		<?php if ("{".($this->_tpl_vars['datos']).".datos[p].reposo_at_eo" == 'SI'): ?>
		<td>X</td>
		else
		<td>&nbsp;</td>
		<?php endif; ?>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['dias_perdido']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['observaciones']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos']['datos'][$this->_sections['p']['index']]['personal_reg_id']; ?>
</td>	
		
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<?php else: ?>
	<h3>NO SE ENCONTRÓ NINGUN DATO QUE CORRESPONDA, VERIFIQUE...</h3>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>