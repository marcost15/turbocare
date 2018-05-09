	function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control)
	{
        Control.value=Solo_Numerico(Control.value);
    }
	//*** Fin del Codigo para Validar que sea un campo Numerico*/
	
	function soloLetras(e)
	{
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key);
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789/-_;.@"; 
		especiales = [8,37,39,46,9,13];
		tecla_especial = false
		for(var i in especiales)
		{
			if(key == especiales[i])
			{
				tecla_especial = true;
				break;
			}
		}
		if(letras.indexOf(tecla)==-1 && !tecla_especial)
		{
			return false;
		}
	}
	
	function limpia(id){
    var val = document.getElementById(id).value;
    var tam = val.length;
    for(i=0;i<tam;i++)
	{
		if(!isNaN(val[i]))
		document.getElementById(id).value='';
    }
}