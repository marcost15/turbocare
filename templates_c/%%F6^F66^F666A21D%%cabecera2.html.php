<?php /* Smarty version 2.6.26, created on 2014-03-04 11:31:53
         compiled from cabecera2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'cabecera2.html', 7, false),)), $this); ?>
<html>
	<head>
		<link rel="icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<link rel="shortcut icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'TurboCare') : smarty_modifier_default($_tmp, 'TurboCare')); ?>
</title>
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
	<body background="./imagenes/papel_tapiz.jpg" topmargin="0" leftmargin="0">
		<div id = "fondoreporte">
		<div id="banner" align = "right"><img src="./imagenes/banner.jpg" width="1050" height="200"/></div>
		<div id="titulo">GERENCIA DE PROTECCION INTEGRAL <?php if ($_SESSION['usuario']): ?> Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
 <?php echo $_SESSION['usuario']['apellido']; ?>
<?php endif; ?></div><!-- titulo -->				
		<div id="contenido_reporte">