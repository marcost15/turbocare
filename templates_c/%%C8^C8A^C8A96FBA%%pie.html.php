<?php /* Smarty version 2.6.26, created on 2018-05-09 01:47:57
         compiled from pie.html */ ?>
<!-- /Contenido-->
			</div><!-- contenido -->	
			<div id="pie">Desarrollado en Turbocare Zona Industrial, calle 146,
Esq. Av. 62 parcela Nro 5,
Diagonal al Cuerpo de Bomberos.
Maracaibo, Venezuela.</br> Por Marcos Torrealba</br>
					Todos los derechos Reservados
                  </div><!-- pie -->		
		</div><!-- fondo -->	
	</body>
</html>
<?php echo '
<script>
$(document).ready(function(){
   	$(".claseiframe").fancybox({
				\'width\'				: \'98%\',
				\'height\'			: \'98%\',
				\'autoScale\'			: false,
				\'transitionIn\'		: \'elastic\',
				\'transitionOut\'		: \'elastic\',
				\'type\'				: \'iframe\'
			});
});

$(document).ready(function(){
   	$(".claseiframe2").fancybox({
				\'width\'				: \'48%\',
				\'height\'			: \'35%\',
				\'autoScale\'			: false,
				\'transitionIn\'		: \'elastic\',
				\'transitionOut\'		: \'elastic\',
				\'type\'				: \'iframe\'
			});
});

var myWindow;
function openCenteredWindow(width, height, url) {
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + 
        ",status,resizable,left=" + left + ",top=" + top + 
        ",screenX=" + left + ",screenY=" + top;
    myWindow = window.open(url, "subWind", windowFeatures);
}
</script>
'; ?>