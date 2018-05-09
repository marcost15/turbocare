<?php /* Smarty version 2.6.26, created on 2014-03-04 12:27:03
         compiled from observacion_informe.html */ ?>
﻿
<?php echo $this->_tpl_vars['f1']; ?>

<div align="center"><font color="red"><?php echo $_SESSION['mensaje']; ?>
</font></div>
<?php echo '
<script>
	var f1 = new LiveValidation(\'observacion\'); f1.add( Validate.Presence );
</script>
'; ?>