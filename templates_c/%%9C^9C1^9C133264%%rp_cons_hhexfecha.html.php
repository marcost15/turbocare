<?php /* Smarty version 2.6.26, created on 2014-03-10 09:37:51
         compiled from rp_cons_hhexfecha.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera2.html", 'smarty_include_vars' => array('title' => 'Control de Incidentes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id = "titulo2">
<table  class="enhancedtable" border="1" align="center" width="100%">
 <tr>
	<th width = "20%"><img src="./imagenes/tc_pequeño.jpg" align = "left" width="400" height="60"/></th>
	<th width = "60%"><FONT SIZE=10>Relacion de Incidentes Turbo Care</th>
	<th width = "20%"><img src="./imagenes/logos_iso.png" align = "right" width="400" height="60"/> </th>
 </tr>
</table>
</div>
<div id="resultados_reporte">
<p>
<div id = "indice">Control de Incidentes </br>Desde: <?php echo $this->_tpl_vars['fecha_ini']; ?>
 Hasta: <?php echo $this->_tpl_vars['fecha_fin']; ?>
 </div>
</p>
<?php if ($this->_tpl_vars['datos']): ?>
<div id="resultados">
<table class="enhancedtable" cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
<thead>
	<tr> 
		<th>NRO</th>
		<th>FECHA</th>
		<th>TALLER</th>
		<th>CAMPO</th>
		<th>CONTRATISTA</th>
		<th>IFB</th>
		<th>IFN</th>
		<th>IS</th>
		<th>IM</th>
		<th>TOTAL</th>
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
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['fecha']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['taller']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['campo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['contratista']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['ifb']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['ifn']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['ist']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['im']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['total']; ?>
</td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<?php else: ?>
	<h3>NO SE ENCONTRÓ NINGUN DATO QUE CORRESPONDA, VERIFIQUE...</h3>
<?php endif; ?>
<?php if ($this->_tpl_vars['datos']): ?>
<p>
<div id="boton">
<a href="xls_hhexfecha.php" target="_xls"><img onmouseover='overlib("<strong>Generar .xls</strong>",WIDTH, 70)' src="./imagenes/excel.png" width="50" height="50" onmouseout='return nd();'/></a>
<a href='./grafico_hhexfecha.php' class='claseiframe'><img onmouseover='overlib("<strong>Generar Grafico</strong>",WIDTH, 70)' src="./imagenes/grafico.png" width="50" height="50" onmouseout='return nd();'/></a></div>
<p>
</div><?php endif; ?>
<div id="boton" align="center"><a href="rp_frm_hhexfecha.php"><img onmouseover='overlib("<strong>Volver</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" onmouseout='return nd();'/></a></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>