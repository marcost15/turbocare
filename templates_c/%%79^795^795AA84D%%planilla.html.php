<?php /* Smarty version 2.6.26, created on 2014-03-06 13:34:34
         compiled from planilla.html */ ?>
<html>
	<head>
		<link rel="icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<link rel="shortcut icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<script type="text/javascript" src="./js/highlight.js"></script>
		<script type="text/javascript" src="./js/domtableenhance.js"></script>
		<script type="text/javascript" src="../libreriasphp/FH3/FHTML/overlib/overlib.js"></script>
		<script type="text/javascript" src="./js/livevalidation.js"></script>
		<script type="text/javascript" src="./js/validacion.js"></script>
		<script type="text/javascript" src="./js/jquery/jquery.min.js"></script><!-- Jquery -->
		<script type="text/javascript" src="./js/jquery/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="./js/tinydropdown.js"></script><!-- Para el Menú -->
		<link rel="stylesheet" type="text/css" href="./js/jquery/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="./estilo/layout.css"/> 
		<link rel="stylesheet" type="text/css" href="./estilo/layoutprint.css" media="print"/>
		<link rel="stylesheet" type="text/css" href="./estilo/menu.css"/>
	</head>
	<body>
<div id = "titulo5">
<table  class="enhancedtable" border="1" align="center" width="100%">
 <tr>
	<th width = "20%"><img src="./imagenes/tc_pequeño.jpg" align = "left" width="350" height="50"/></th>
	<th width = "60%"><font SIZE=3>INFORME DE INSPECCIONES</font></th>
 </tr>
  <tr>
	<th colspan = "2"><font SIZE=3>MANUAL DE SEGURIDAD Y SALUD OCUPACIONAL</font></th>
 </tr>
</table>
</div>
</p>
<div id="resultados50">
<table cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
	<tr> 
		<td  colspan = "2" align="right"><b>Numero de Informe:</b> <?php echo $this->_tpl_vars['ficha']['id']; ?>
</td>
	</tr>
	<tr> 
		<td colspan = "2" align="center"><font SIZE=3><b>DATOS GENERALES</b></font></td>
	</tr>
	<tr> 
		<td colspan = "2"><b>Inspeccion Asociada al sistema de Gestion:</b> 
		<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['gestion']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><?php echo $this->_tpl_vars['gestion'][$this->_sections['p']['index']]['nombre']; ?>
: <b><?php echo $this->_tpl_vars['gestion'][$this->_sections['p']['index']]['check']; ?>
</b> <?php endfor; endif; ?></td>
	</tr>
	<tr> 
		<td width = "50%"><b>Fecha de Inspeccion:</b><?php echo $this->_tpl_vars['ficha']['fecha']; ?>
</td>
		<td width = "50%"><b>Equipo Inspeccionado:</b> <?php echo $this->_tpl_vars['ficha']['equipo_id']; ?>
</td>
	</tr>
	<tr> 
		<td colspan = "2" align="center"><font SIZE=3><b>SECCION INSPECCIONADA</b></font></td>
	</tr>
	</table>
<table cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['tipos_seccion']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<td colspan = "4" align="center"><b><?php echo $this->_tpl_vars['tipos_seccion'][$this->_sections['p']['index']]['nombre']; ?>
</b></td>		
		</tr>
		
				<?php unset($this->_sections['d']);
$this->_sections['d']['name'] = 'd';
$this->_sections['d']['loop'] = is_array($_loop=$this->_tpl_vars['tipos_seccion'][$this->_sections['p']['index']]['secc_agrup']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['d']['show'] = true;
$this->_sections['d']['max'] = $this->_sections['d']['loop'];
$this->_sections['d']['step'] = 1;
$this->_sections['d']['start'] = $this->_sections['d']['step'] > 0 ? 0 : $this->_sections['d']['loop']-1;
if ($this->_sections['d']['show']) {
    $this->_sections['d']['total'] = $this->_sections['d']['loop'];
    if ($this->_sections['d']['total'] == 0)
        $this->_sections['d']['show'] = false;
} else
    $this->_sections['d']['total'] = 0;
if ($this->_sections['d']['show']):

            for ($this->_sections['d']['index'] = $this->_sections['d']['start'], $this->_sections['d']['iteration'] = 1;
                 $this->_sections['d']['iteration'] <= $this->_sections['d']['total'];
                 $this->_sections['d']['index'] += $this->_sections['d']['step'], $this->_sections['d']['iteration']++):
$this->_sections['d']['rownum'] = $this->_sections['d']['iteration'];
$this->_sections['d']['index_prev'] = $this->_sections['d']['index'] - $this->_sections['d']['step'];
$this->_sections['d']['index_next'] = $this->_sections['d']['index'] + $this->_sections['d']['step'];
$this->_sections['d']['first']      = ($this->_sections['d']['iteration'] == 1);
$this->_sections['d']['last']       = ($this->_sections['d']['iteration'] == $this->_sections['d']['total']);
?>
				<tr>
					<?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['tipos_seccion'][$this->_sections['p']['index']]['secc_agrup'][$this->_sections['d']['index']]['fila']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t']['show'] = true;
$this->_sections['t']['max'] = $this->_sections['t']['loop'];
$this->_sections['t']['step'] = 1;
$this->_sections['t']['start'] = $this->_sections['t']['step'] > 0 ? 0 : $this->_sections['t']['loop']-1;
if ($this->_sections['t']['show']) {
    $this->_sections['t']['total'] = $this->_sections['t']['loop'];
    if ($this->_sections['t']['total'] == 0)
        $this->_sections['t']['show'] = false;
} else
    $this->_sections['t']['total'] = 0;
if ($this->_sections['t']['show']):

            for ($this->_sections['t']['index'] = $this->_sections['t']['start'], $this->_sections['t']['iteration'] = 1;
                 $this->_sections['t']['iteration'] <= $this->_sections['t']['total'];
                 $this->_sections['t']['index'] += $this->_sections['t']['step'], $this->_sections['t']['iteration']++):
$this->_sections['t']['rownum'] = $this->_sections['t']['iteration'];
$this->_sections['t']['index_prev'] = $this->_sections['t']['index'] - $this->_sections['t']['step'];
$this->_sections['t']['index_next'] = $this->_sections['t']['index'] + $this->_sections['t']['step'];
$this->_sections['t']['first']      = ($this->_sections['t']['iteration'] == 1);
$this->_sections['t']['last']       = ($this->_sections['t']['iteration'] == $this->_sections['t']['total']);
?>
						<?php if ($this->_tpl_vars['tipos_seccion'][$this->_sections['p']['index']]['secc_agrup'][$this->_sections['d']['index']]['fila'][$this->_sections['t']['index']]['nombre']): ?>
							<td align="center"><font SIZE=2><b><?php echo $this->_tpl_vars['tipos_seccion'][$this->_sections['p']['index']]['secc_agrup'][$this->_sections['d']['index']]['fila'][$this->_sections['t']['index']]['nombre']; ?>
:<?php echo $this->_tpl_vars['tipos_seccion'][$this->_sections['p']['index']]['secc_agrup'][$this->_sections['d']['index']]['fila'][$this->_sections['t']['index']]['check']; ?>
</font></b></td>
						<?php endif; ?>
					<?php endfor; endif; ?>
				</tr>
				<?php endfor; endif; ?>
			
		
	<?php endfor; endif; ?>
</table>
<table cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
	<tr> 
		<td colspan = "3" align="center"><font SIZE=3><b>HALLAZGOS</b></font></td>
	</tr>
	<tr> 
		<td colspan = "3" align="center"><?php echo $this->_tpl_vars['ficha']['hallazgos']; ?>
</b></td>
	</tr>
	<tr> 
		<td width = "70%"  align="center"><font SIZE=3><b>CORREPCIONES Y ACCIONES PREVENTIVAS</b></font></td>
		<td colspan = "2" width = "30%"  align="center"><font SIZE=3><b>RESPONSABLE</b></font></td>
	</tr>
	<tr> 
		<td  width = "70%" align="center"><?php echo $this->_tpl_vars['ficha']['correcciones']; ?>
</b></td>
		<td colspan = "2" width = "30%" align="center"><?php echo $this->_tpl_vars['ficha']['personal_id']; ?>
</b></td>
	</tr>
	<tr> 
		<td colspan = "3" align="center"><font SIZE=3><b>ACCIONES PREVENTIVAS</b></font></td>
	</tr>
	<tr> 
		<td colspan = "3" align="center"><?php echo $this->_tpl_vars['ficha']['acciones']; ?>
</b></td>
	</tr>
	<tr> 
		<td  width = "50%" align="center"><b>EVALUADOR:</b></td>
		<td colspan = "2" width = "50%" align="center"><b>REVISADO POR:</b></td>
	</tr>
	<tr> 
		<?php if ($this->_tpl_vars['ficha']['evaluador_id']): ?>
			<td width = "50%" align="center"><?php echo $this->_tpl_vars['ficha']['evaluador_id']; ?>
</td>
		<?php else: ?>
			<td>&nbsp;</td>
		<?php endif; ?>	
		<?php if ($this->_tpl_vars['ficha']['personal_rev_id']): ?>
			<td colspan = "2" width = "50%" align="center"><?php echo $this->_tpl_vars['ficha']['personal_rev_id']; ?>
</td>
		<?php else: ?>
			<td colspan = "2">&nbsp;</td>
		<?php endif; ?>	
	</tr>
	<tr> 
		<td  width = "50%" align="center">
			<table border = "0"  width = "100%">
				<tr>
					<td  width = "50%" align="left"><b>Firma:</b></td>
					<td  width = "50%" align="left"><b>Fecha:</b> <?php echo $this->_tpl_vars['ficha']['fecha_eva']; ?>
</td>
				</tr>
			</table>
		</td>
		<td  width = "50%" align="center">
			<table border = "0"  width = "100%">
				<tr>
					<td  width = "50%" align="left"><b>Firma:</b></td>
					<td width = "50%" align="left"><b>Fecha:</b> <?php echo $this->_tpl_vars['ficha']['fecha_revi']; ?>
</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td colspan = "3" align="center"><font SIZE=3><b>VERIFICACION DE CIERRE DE ACCIONES</b></font></td>
	</tr>
	<tr> 
		<td colspan = "3" align="left"><b>Observaciones: <?php echo $this->_tpl_vars['ficha']['observaciones']; ?>
</b></td>
	</tr>
	<tr> 
</table>
<table border = "1"  width = "100%">
			<tr>
				<td  width = "35%" align="left"><b>Nombre y Apellido:</b> <?php echo $this->_tpl_vars['ficha']['personal_obs_id']; ?>
</td>
				<td  width = "30%" align="left"><b>Fecha:</b> <?php echo $this->_tpl_vars['ficha']['fecha_obs']; ?>
 </td>
				<td  width = "35%" align="left"><b>Firma:</b></td>
			</tr>
		
	</tr>
</table>
<p>
<table border = "0"  width = "100%">
			<tr>
				<td align="center">ELABORADO POR DPTO DE PROTECCION INTEGRAL FECHA DE ELABORACION: <?php echo $this->_tpl_vars['fecha']; ?>
</b></td>
			</tr>
		</table>
</div>
<p>
<div id="boton" align="center">
<a href='javascript:window.print(); void 0;'><img onmouseover='overlib("<strong>IMPRIMIR</strong>",WIDTH, 70)' src="./imagenes/imprimir.gif" onmouseout='return nd();'/></a>
</div>
</body>
</html>