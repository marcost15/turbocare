<?php /* Smarty version 2.6.26, created on 2014-03-04 21:03:50
         compiled from consmod_personal.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Consultas de Personal')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h4>BUSQUEDA DEL PERSONAL</h4>
<p>Selecione una letra para mostrar el personal cuyo apellido comienza por la letra indicada</p>
<div class="abc">
	<a href="?letra=a&amp;accion=letra">A</a> 
	<a href="?letra=b&amp;accion=letra">B</a> 
	<a href="?letra=c&amp;accion=letra">C</a> 
	<a href="?letra=d&amp;accion=letra">D</a> 
	<a href="?letra=e&amp;accion=letra">E</a> 
	<a href="?letra=f&amp;accion=letra">F</a> 
	<a href="?letra=g&amp;accion=letra">G</a> 
	<a href="?letra=h&amp;accion=letra">H</a> 
	<a href="?letra=i&amp;accion=letra">I</a> 
	<a href="?letra=j&amp;accion=letra">J</a> 
	<a href="?letra=k&amp;accion=letra">K</a> 
	<a href="?letra=l&amp;accion=letra">L</a> 
	<a href="?letra=m&amp;accion=letra">M</a> 
	<a href="?letra=n&amp;accion=letra">N</a> 
	<a href="?letra=o&amp;accion=letra">O</a> 
	<a href="?letra=p&amp;accion=letra">P</a> 
	<a href="?letra=q&amp;accion=letra">Q</a> 
	<a href="?letra=r&amp;accion=letra">R</a> 
	<a href="?letra=s&amp;accion=letra">S</a> 
	<a href="?letra=t&amp;accion=letra">T</a> 
	<a href="?letra=u&amp;accion=letra">U</a> 
	<a href="?letra=v&amp;accion=letra">V</a> 
	<a href="?letra=w&amp;accion=letra">W</a> 
	<a href="?letra=x&amp;accion=letra">X</a> 
	<a href="?letra=y&amp;accion=letra">Y</a> 
	<a href="?letra=z&amp;accion=letra">Z</a> 
</div>

<p>O si lo desea, escriba en el cuadro texto para hacer una busqueda completa</p>

<?php echo $this->_tpl_vars['f1']; ?>

<?php if ($this->_tpl_vars['datos']): ?>
<h4>USUARIOS SOLICITADOS</h4>
<div id="resultados">
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Cedula</th>
		<th>Apellidos y Nombres</th>
		<th>Login</th>
		<th>Nivel</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
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
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['apellido']; ?>
, <?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['login']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['nivel_id']; ?>
</td>
		<td><a href="ficha_personal.php?id=<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Ver Ficha</strong>",WIDTH, 70)' src="./imagenes/ver.ico" onmouseout='return nd();'/></a></td>
		<td><a href="modificar_personal.php?id=<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 70)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
		<td><a href="retirar_personal.php?id=<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Retirar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<?php else: ?>
	<?php if ($this->_tpl_vars['error1'] == 2): ?> 
		<h3>NO SE ENCONTRÓ PERSONAL CON ESOS PARAMETROS, VERIFIQUE...</h3>
	<?php else: ?>
		<?php if ($this->_tpl_vars['error1'] == 1): ?> 
			<h3>NO SE ENCONTRÓ PERSONAL CUYO APELLIDO COMIENZA POR ESA LETRA, VERIFIQUE...</h3>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>