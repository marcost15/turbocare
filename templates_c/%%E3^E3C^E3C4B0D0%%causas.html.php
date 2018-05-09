<?php /* Smarty version 2.6.26, created on 2014-03-04 12:08:34
         compiled from causas.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Causas de Incidencia')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="90%">
<tr>
	<td><?php echo $this->_tpl_vars['f1']; ?>

	<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
</td>
</tr>
</table>
<p></p>
<div id = "indice" align = "center" ><b>Total de Registros:<?php echo $this->_tpl_vars['m']; ?>
 -	<?php unset($this->_sections['z']);
$this->_sections['z']['name'] = 'z';
$this->_sections['z']['loop'] = is_array($_loop=$this->_tpl_vars['indice']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['z']['show'] = true;
$this->_sections['z']['max'] = $this->_sections['z']['loop'];
$this->_sections['z']['step'] = 1;
$this->_sections['z']['start'] = $this->_sections['z']['step'] > 0 ? 0 : $this->_sections['z']['loop']-1;
if ($this->_sections['z']['show']) {
    $this->_sections['z']['total'] = $this->_sections['z']['loop'];
    if ($this->_sections['z']['total'] == 0)
        $this->_sections['z']['show'] = false;
} else
    $this->_sections['z']['total'] = 0;
if ($this->_sections['z']['show']):

            for ($this->_sections['z']['index'] = $this->_sections['z']['start'], $this->_sections['z']['iteration'] = 1;
                 $this->_sections['z']['iteration'] <= $this->_sections['z']['total'];
                 $this->_sections['z']['index'] += $this->_sections['z']['step'], $this->_sections['z']['iteration']++):
$this->_sections['z']['rownum'] = $this->_sections['z']['iteration'];
$this->_sections['z']['index_prev'] = $this->_sections['z']['index'] - $this->_sections['z']['step'];
$this->_sections['z']['index_next'] = $this->_sections['z']['index'] + $this->_sections['z']['step'];
$this->_sections['z']['first']      = ($this->_sections['z']['iteration'] == 1);
$this->_sections['z']['last']       = ($this->_sections['z']['iteration'] == $this->_sections['z']['total']);
?> <a href="?li=<?php echo $this->_tpl_vars['indice'][$this->_sections['z']['index']]['li']; ?>
">[<?php echo $this->_tpl_vars['indice'][$this->_sections['z']['index']]['li']; ?>
-<?php echo $this->_tpl_vars['indice'][$this->_sections['z']['index']]['ls']; ?>
]</a> <?php endfor; endif; ?>
		<a href="?li=todo">[Todos]</b></a>
</div>
<div id="resultados">
<table class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
<tr>
	<th colspan="2">CAUSA INCIDENTES</th>
</tr>
</thead>
<tbody>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['causas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
	<td><?php echo $this->_tpl_vars['causas'][$this->_sections['i']['index']]['nombre']; ?>
</td>
	<td width="10%"><a href="?id=<?php echo $this->_tpl_vars['causas'][$this->_sections['i']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 70)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></a></td>
</tr>
<?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	var f1 = new LiveValidation(\'nombre\'); f1.add( Validate.Presence );
</script>
'; ?>
