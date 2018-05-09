<?php /* Smarty version 2.6.26, created on 2014-03-04 11:53:41
         compiled from sqlguardar.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>Respaldos realizados</h3>
<p>Si desea guardar un archivo de la base de datos, haga click derecho
sobre el enlace y , en el menú emergente, haga click en "Guardar Como".</p>
<p>Si desea realizar un respaldo haga click en </p>
<p><a href="sqlrespaldo.php">Respaldo de la BD</a></p>
<div class="archivossql">
<ol>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['a']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><li><a 
        href="./respaldobd/<?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['basename']; ?>
">
        <?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['d']; ?>
/<?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['mes']; ?>
/<?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['a']; ?>
, <?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['h']; ?>
:<?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['m']; ?>
:<?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['s']; ?>

        </a>&nbsp;::&nbsp;<a href="sqlelim.php?a=<?php echo $this->_tpl_vars['a'][$this->_sections['i']['index']]['basename']; ?>
">[X]</a></li><?php endfor; endif; ?>
</ol>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 