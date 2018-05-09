// LiveValidation 1.3 (standalone version)
// Copyright (c) 2007-2008 Alec Hill (www.livevalidation.com)
// LiveValidation is licensed under the terms of the MIT License
/*********************************************** LiveValidation class ***********************************/
/**
 *	valida un campo de formulario en tiempo real basado en las validaciones que se asigna a la
 *	
 *	@var element {mixed} - una referencia de elemento de libertad o el identificador de cadena del elemento para validar
 *	@var optionsObj {Object} - las opciones generales, ver más abajo para obtener más detalles
 *
 *	optionsObj Propiedades:
 *							validMessage {String} 	- el mensaje para mostrar cuando el campo supera la validación
 *													  (DEFAULT: "Gracias!")
 *							onValid {Function} 		- la función a ejecutar cuando el campo supera la validación
 *													  (DEFAULT: function(){ this.insertMessage(this.createMessageSpan()); this.addFieldClass(); } )	
 *							onInvalid {Function} 	- la función a ejecutar cuando el campo no supera la validación
 *													  (DEFAULT: function(){ this.insertMessage(this.createMessageSpan()); this.addFieldClass(); })
 *							insertAfterWhatNode {Int} 	- la posición para insertar mensaje predeterminado
 *													  (DEFAULT: el campo que se está validando)	
 *              onlyOnBlur {Boolean} - si desea que para validar a medida que escribe o sólo en la falta de definición
 *                            (DEFAULT: false)
 *              wait {Integer} - el momento en que se quiere hacer una pausa de la última pulsación de tecla antes de que se valida (ms)
 *                            (DEFAULT: 0)
 *              onlyOnSubmit {Boolean} - si debe ser validada sólo cuando la forma que pertenece a se presenta
 *                            (DEFAULT: false)						
 */

var LiveValidation = function(element, optionsObj){
  	this.initialize(element, optionsObj);
}

LiveValidation.VERSION = '1.3 standalone';

/** Tipos de elementos constantes ****/

LiveValidation.TEXTAREA 		= 1;
LiveValidation.TEXT 			    = 2;
LiveValidation.PASSWORD 		= 3;
LiveValidation.CHECKBOX 		= 4;
LiveValidation.SELECT = 5;
LiveValidation.FILE = 6;

/****** Los métodos estáticos *******/

/**
 *	pasar un array de objetos LiveValidation y validará todas ellas
 *	
 *	@var validations {Array} - una matriz de objetos LiveValidation
 *	@return {Bool} - true, si todo no pasó la validación, falso si falla						
 */
LiveValidation.massValidate = function(validations){
  var returnValue = true;
	for(var i = 0, len = validations.length; i < len; ++i ){
		var valid = validations[i].validate();
		if(returnValue) returnValue = valid;
	}
	return returnValue;
}

/****** prototype ******/

LiveValidation.prototype = {

    validClass: 'LV_valid',
    invalidClass: 'LV_invalid',
    messageClass: 'LV_validation_message',
    validFieldClass: 'LV_valid_field',
    invalidFieldClass: 'LV_invalid_field',

    /**
     *	inicializa todas las propiedades y eventos
     *
     * @var - Igual que el constructor anterior
     */
    initialize: function(element, optionsObj){
      var self = this;
      if(!element) throw new Error("LiveValidation::initialize - No se hace referencia o elemento de Identificación del elemento ha sido siempre!");
    	this.element = element.nodeName ? element : document.getElementById(element);
    	if(!this.element) throw new Error("LiveValidation::initialize - No element with reference or id of '" + element + "' exists!");
      // propiedades por defecto que no pudo ser inicializado por encima de
    	this.validations = [];
      this.elementType = this.getElementType();
      this.form = this.element.form;
      // opciones
    	var options = optionsObj || {};
    	this.validMessage = options.validMessage || '';
    	var node = options.insertAfterWhatNode || this.element;
		this.insertAfterWhatNode = node.nodeType ? node : document.getElementById(node);
      this.onValid = options.onValid || function(){ this.insertMessage(this.createMessageSpan()); this.addFieldClass(); };
       this.onInvalid = options.onInvalid || function(){ this.insertMessage(this.createMessageSpan()); this.addFieldClass();};	
    	this.onlyOnBlur =  options.onlyOnBlur || false;
    	this.wait = options.wait || 0;
      this.onlyOnSubmit = options.onlyOnSubmit || false;
      // añadir a la forma si se ha previsto
      if(this.form){
        this.formObj = LiveValidationForm.getInstance(this.form);
        this.formObj.addField(this);
      }
      // eventos
      // recopilar eventos antiguos
      this.oldOnFocus = this.element.onfocus || function(){};
      this.oldOnBlur = this.element.onblur || function(){};
      this.oldOnClick = this.element.onclick || function(){};
      this.oldOnChange = this.element.onchange || function(){};
      this.oldOnKeyup = this.element.onkeyup || function(){};
      this.element.onfocus = function(e){ self.doOnFocus(e); return self.oldOnFocus.call(this, e); }
      if(!this.onlyOnSubmit){
        switch(this.elementType){
          case LiveValidation.CHECKBOX:
            this.element.onclick = function(e){ self.validate(); return self.oldOnClick.call(this, e); }
          // se deja correr en el siguiente para añadir un evento de cambio también
          case LiveValidation.SELECT:
          case LiveValidation.FILE:
            this.element.onchange = function(e){ self.validate(); return self.oldOnChange.call(this, e); }
            break;
          default:
            if(!this.onlyOnBlur) this.element.onkeyup = function(e){ self.deferValidation(); return self.oldOnKeyup.call(this, e); }
      	    this.element.onblur = function(e){ self.doOnBlur(e); return self.oldOnBlur.call(this, e); }
        }
      }
    },
	
	/**
     *	destruye los acontecimientos de la instancia (la restauración de los anteriores) y lo elimina de cualquier LiveValidationForms
     */
    destroy: function(){
  	  if(this.formObj){
		// quitar el campo de la LiveValidationForm
		this.formObj.removeField(this);
		// destruir el LiveValidationForm si no hay campos LiveValidation dejado en él
		this.formObj.destroy();
	  }
      // eliminar eventos - los puso de nuevo a los eventos anteriores
	  this.element.onfocus = this.oldOnFocus;
      if(!this.onlyOnSubmit){
        switch(this.elementType){
          case LiveValidation.CHECKBOX:
            this.element.onclick = this.oldOnClick;
          // se deja correr en el siguiente para añadir un evento de cambio también
          case LiveValidation.SELECT:
          case LiveValidation.FILE:
            this.element.onchange = this.oldOnChange;
            break;
          default:
            if(!this.onlyOnBlur) this.element.onkeyup = this.oldOnKeyup;
      	    this.element.onblur = this.oldOnBlur;
        }
      }
      this.validations = [];
	  this.removeMessageAndFieldClass();
    },
    
    /**
     *	añade una validación a realizar en un objeto de LiveValidation
     *
     *	@var validationFunction {Function} - la función de validación que se utilizarán (por ejemplo, Validate.Presence)
     *	@var validationParamsObj {Object} - parámetros para hacer la validación, si se desea o es necesario
     * @return {Object} - el objeto en sí LiveValidation para que las llamadas se pueden encadenar
     */
    add: function(validationFunction, validationParamsObj){
      this.validations.push( {type: validationFunction, params: validationParamsObj || {} } );
      return this;
    },
    
	/**
     *	elimina la validación de un objeto LiveValidation - debe tener exactamente los mismos argumentos que utiliza para añadirlo
     *
      *	@var validationFunction {Function} - la función de validación que se utilizarán (por ejemplo, Validate.Presence)
     *	@var validationParamsObj {Object} - parámetros para hacer la validación, si se desea o es necesario
     * @return {Object} - el objeto en sí LiveValidation para que las llamadas se pueden encadenar
     */
    remove: function(validationFunction, validationParamsObj){
	  var found = false;
	  for( var i = 0, len = this.validations.length; i < len; i++ ){
	  		if( this.validations[i].type == validationFunction ){
				if (this.validations[i].params == validationParamsObj) {
					found = true;
					break;
				}
			}
	  }
      if(found) this.validations.splice(i,1);
      return this;
    },
    
	
    /**
     * hace que la validación de esperar el tiempo asignado de la última pulsación de tecla
     */
    deferValidation: function(e){
      if(this.wait >= 300) this.removeMessageAndFieldClass();
    	var self = this;
      if(this.timeout) clearTimeout(self.timeout);
      this.timeout = setTimeout( function(){ self.validate() }, self.wait); 
    },
        
    /**
     * establece el indicador se centró en falso cuando el campo pierde el foco
     */
    doOnBlur: function(e){
      this.focused = false;
      this.validate(e);
    },
        
    /**
     * establece la marca enfocada a cierto cuando las ganancias de campo se centran
     */
    doOnFocus: function(e){
      this.focused = true;
      this.removeMessageAndFieldClass();
    },
    
    /**
     * obtiene el tipo de elemento, para comprobar si es compatible
     *
     *	@var validationFunction {Function} - la función de validación que se utilizarán (por ejemplo, Validate.Presence)
     *	@var validationParamsObj {Object} - parámetros para hacer la validación, si se desea o es necesario
     */
    getElementType: function(){
      switch(true){
        case (this.element.nodeName.toUpperCase() == 'TEXTAREA'):
        return LiveValidation.TEXTAREA;
      case (this.element.nodeName.toUpperCase() == 'INPUT' && this.element.type.toUpperCase() == 'TEXT'):
        return LiveValidation.TEXT;
      case (this.element.nodeName.toUpperCase() == 'INPUT' && this.element.type.toUpperCase() == 'PASSWORD'):
        return LiveValidation.PASSWORD;
      case (this.element.nodeName.toUpperCase() == 'INPUT' && this.element.type.toUpperCase() == 'CHECKBOX'):
        return LiveValidation.CHECKBOX;
      case (this.element.nodeName.toUpperCase() == 'INPUT' && this.element.type.toUpperCase() == 'FILE'):
        return LiveValidation.FILE;
      case (this.element.nodeName.toUpperCase() == 'SELECT'):
        return LiveValidation.SELECT;
        case (this.element.nodeName.toUpperCase() == 'INPUT'):
        	throw new Error('LiveValidation::getElementType - Cannot use LiveValidation on an ' + this.element.type + ' input!');
        default:
        	throw new Error('LiveValidation::getElementType - Element must be an input, select, or textarea!');
      }
    },
    
    /**
     *	bucles a través de todas las validaciones agrega al objeto LiveValidation y comprueba uno por uno
     *
     *	@var validationFunction {Function} - la función de validación que se utilizarán (por ejemplo, Validate.Presence)
     *	@var validationParamsObj {Object} - parámetros para hacer la validación, si se desea o es necesario
     * @return {Boolean} - si las todas las validaciones pasado o si uno no
     */
    doValidations: function(){
      	this.validationFailed = false;
      	for(var i = 0, len = this.validations.length; i < len; ++i){
    	 	var validation = this.validations[i];
    		switch(validation.type){
    		   	case Validate.Presence:
                case Validate.Confirmation:
                case Validate.Acceptance:
    		   		this.displayMessageWhenEmpty = true;
    		   		this.validationFailed = !this.validateElement(validation.type, validation.params); 
    				break;
    		   	default:
    		   		this.validationFailed = !this.validateElement(validation.type, validation.params);
    		   		break;
    		}
    		if(this.validationFailed) return false;	
    	}
    	this.message = this.validMessage;
    	return true;
    },
    
    /**
     *	realiza la validación en el elemento y se ocupa de cualquier error (la validación o no) que arroja
     *
     *	@var validationFunction {Function} - la función de validación que se utilizarán (por ejemplo, Validate.Presence)
     *	@var validationParamsObj {Object} - parámetros para hacer la validación, si se desea o es necesario
     * @return {Boolean} - si la validación ha pasado o no
     */
    validateElement: function(validationFunction, validationParamsObj){
      	var value = (this.elementType == LiveValidation.SELECT) ? this.element.options[this.element.selectedIndex].value : this.element.value;     
        if(validationFunction == Validate.Acceptance){
    	    if(this.elementType != LiveValidation.CHECKBOX) throw new Error('LiveValidation::validateElement - Element to validate acceptance must be a checkbox!');
    		value = this.element.checked;
    	}
        var isValid = true;
      	try{    
    		validationFunction(value, validationParamsObj);
    	} catch(error) {
    	  	if(error instanceof Validate.Error){
    			if( value !== '' || (value === '' && this.displayMessageWhenEmpty) ){
    				this.validationFailed = true;
    				this.message = error.message;
    				isValid = false;
    			}
    		}else{
    		  	throw error;
    		}
    	}finally{
    	    return isValid;
        }
    },
    
    /**
     *	hace ver las todas las validaciones y los incendios fuera de la onValid o onInvalid devoluciones de llamada de
     *
     * @return {Boolean} - si las todas las validaciones pasado o si uno no
     */
    validate: function(){
      if(!this.element.disabled){
		var isValid = this.doValidations();
		if(isValid){
			this.onValid();
			return true;
		}else {
			this.onInvalid();
			return false;
		}
	  }else{
      return true;
    }
    },
	
 /**
   *  permite que el campo
   *
   *  @return {LiveValidation} - the LiveValidation objecto para encadenar
   */
  enable: function(){
  	this.element.disabled = false;
	return this;
  },
  
  /**
   *  deshabilita el campo y elimina cualquier mensaje y estilos asociados con el campo
   *
   *  @return {LiveValidation} - the LiveValidation objecto para encadenar
   */
  disable: function(){
  	this.element.disabled = true;
	this.removeMessageAndFieldClass();
	return this;
  },
    
    /** Métodos de inserción de mensajes ****************************
     * 
	 * Estos sólo se utilizan en las funciones de devolución de llamada y onValid onInvalid y, por lo que si overide las devoluciones de 
		llamada por defecto
     * Usted debe impliment sus propias funciones para hacer lo que quieras, o llamar a algunos de ellos de ellos si
     * Quiere mantener algunas de las funciones
     */
    
    /**
     *	hace una vida que contenía el mensaje que se transmite o no
     *
     * @return {HTMLSpanObject} - un elemento span con el mensaje en ella
     */
    createMessageSpan: function(){
        var span = document.createElement('span');
    	var textNode = document.createTextNode(this.message);
      	span.appendChild(textNode);
        return span;
    },
    
    /**
     *	inserta el elemento que contiene el mensaje en lugar del elemento que ya existe (si lo hace)
     *
     * @var elementToIsert {HTMLElementObject} - un nodo de elemento a insertar
     */
    insertMessage: function(elementToInsert){
      	this.removeMessage();
      	if( (this.displayMessageWhenEmpty && (this.elementType == LiveValidation.CHECKBOX || this.element.value == ''))
    	  || this.element.value != '' ){
            var className = this.validationFailed ? this.invalidClass : this.validClass;
    	  	elementToInsert.className += ' ' + this.messageClass + ' ' + className;
            if(this.insertAfterWhatNode.nextSibling){
    		  		this.insertAfterWhatNode.parentNode.insertBefore(elementToInsert, this.insertAfterWhatNode.nextSibling);
    		}else{
    			    this.insertAfterWhatNode.parentNode.appendChild(elementToInsert);
    	    }
    	}
    },
    
    
    /**
     *	los cambios de la clase del campo en función de si es válido o no
     */
    addFieldClass: function(){
        this.removeFieldClass();
        if(!this.validationFailed){
            if(this.displayMessageWhenEmpty || this.element.value != ''){
                if(this.element.className.indexOf(this.validFieldClass) == -1) this.element.className += ' ' + this.validFieldClass;
            }
        }else{
            if(this.element.className.indexOf(this.invalidFieldClass) == -1) this.element.className += ' ' + this.invalidFieldClass;
        }
    },
    
    /**
     *	elimina el elemento mensaje si es que existe, de modo que el nuevo mensaje va a sustituir
     */
    removeMessage: function(){
    	var nextEl;
    	var el = this.insertAfterWhatNode;
    	while(el.nextSibling){
    	    if(el.nextSibling.nodeType === 1){
    		  	nextEl = el.nextSibling;
    		  	break;
    		}
    		el = el.nextSibling;
    	}
      	if(nextEl && nextEl.className.indexOf(this.messageClass) != -1) this.insertAfterWhatNode.parentNode.removeChild(nextEl);
    },
    
    /**
     *	elimina la clase que se ha aplicado al campo a Indicarán si es válido o no
     */
    removeFieldClass: function(){
      if(this.element.className.indexOf(this.invalidFieldClass) != -1) this.element.className = this.element.className.split(this.invalidFieldClass).join('');
      if(this.element.className.indexOf(this.validFieldClass) != -1) this.element.className = this.element.className.split(this.validFieldClass).join(' ');
    },
        
    /**
     *	elimina el mensaje y la clase de campo
     */
    removeMessageAndFieldClass: function(){
      this.removeMessage();
      this.removeFieldClass();
    }

} // end of LiveValidation class

/*************************************** LiveValidationForm clase ****************************************/
/**
 * Esta clase se utiliza internamente por la clase LiveValidation para asociar un campo LiveValidation con una forma en que se icontained en una
 * 
 * No será por lo tanto, realmente siempre se necesita para ser utilizado directamente por el promotor, a menos que quieran asociar
	un LiveValidation
 * campo con una forma que no es un niño de
 */

/**
   *	se encarga de la validación de los campos de LiveValidation pertenecientes a esta forma en su presentación
   *	
   *	@var element {HTMLFormElement} - un elemento de referencia libertad a la forma de convertirse en una LiveValidationForm
   */
var LiveValidationForm = function(element){
  this.initialize(element);
}

/**
 * espacio de nombres para mantener instancias
 */
LiveValidationForm.instances = {};

/**
   *	obtiene el ejemplo de la LiveValidationForm si ya se ha hecho o lo crea si no existe
   *	
   *	@var element {HTMLFormElement} - un elemento de referencia a una forma de libertad
   */
LiveValidationForm.getInstance = function(element){
  var rand = Math.random() * Math.random();
  if(!element.id) element.id = 'formId_' + rand.toString().replace(/\./, '') + new Date().valueOf();
  if(!LiveValidationForm.instances[element.id]) LiveValidationForm.instances[element.id] = new LiveValidationForm(element);
  return LiveValidationForm.instances[element.id];
}

LiveValidationForm.prototype = {
  
  /**
   *	constructor de LiveValidationForm - se encarga de la validación de los campos de LiveValidation pertenecientes a esta forma en
   su presentación
   *	
   *	@var element {HTMLFormElement} - un elemento de referencia libertad a la forma de convertirse en una LiveValidationForm
   */
  initialize: function(element){
  	this.name = element.id;
    this.element = element;
    this.fields = [];
    // preserve the old onsubmit event
	this.oldOnSubmit = this.element.onsubmit || function(){};
    var self = this;
    this.element.onsubmit = function(e){
      return (LiveValidation.massValidate(self.fields)) ? self.oldOnSubmit.call(this, e || window.event) !== false : false;
    }
  },
  
  /**
   *	agrega un campo LiveValidation a la matriz de las formas campos
   *	
   *	@var element {LiveValidation} - a LiveValidation objecto
   */
  addField: function(newField){
    this.fields.push(newField);
  },
  
  /**
   *	elimina un campo LiveValidation de la matriz de las formas campos
   *	
   *	@var victim {LiveValidation} - a LiveValidation object
   */
  removeField: function(victim){
  	var victimless = [];
  	for( var i = 0, len = this.fields.length; i < len; i++){
		if(this.fields[i] !== victim) victimless.push(this.fields[i]);
	}
    this.fields = victimless;
  },
  
  /**
   *	destruir esta instancia y sus eventos
   *
   * @var force {Boolean} - si se debe forzar la detruction incluso si hay campos todavía asociados
   */
  destroy: function(force){
  	// only destroy if has no fields and not being forced
  	if (this.fields.length != 0 && !force) return false;
	// remove events - set back to previous events
	this.element.onsubmit = this.oldOnSubmit;
	// remove from the instances namespace
	LiveValidationForm.instances[this.name] = null;
	return true;
  }
   
}// end of LiveValidationForm prototype

/*************************************** Validate class ****************************************/
/**
 * Esta clase contiene todos los métodos necesarios para hacer la validación en sí
  *
  * Todos los métodos son estáticos, para que puedan ser utilizados fuera del contexto de un campo de formulario
  *, Ya que podría ser útil para la validación de material en cualquier lugar que desee realmente
  *
  * Todos ellos devolverá true si la validación es correcta, pero se genera un ValidationError si
  * Que no, por lo que este puede ser capturado y el mensaje explicando el error se puede acceder (como se acaba
  * Falso que regresan le dejaría un poco en la oscuridad en cuanto a por qué no)
  *
  * Puede utilizar los métodos de validación solo y envolverlo en un intento .. catch a ti mismo si quieres acceder a la falta de
  * Mensaje y gestionar el error, o utilizar el método de validación :: Ahora si lo que desea verdadero o falso
 */

var Validate = {

    /**
     *	valida que el campo se ha llenado
     *
     *	@var value {mixed} - valor que se comprueba
     *	@var paramsObj {Object} -Que se comprueba valor
     *
     *	paramsObj properties:
     *							failureMessage {String} - el mensaje para mostrar cuando el campo no supera la validación
     *													  (DEFAULT: "Can't be empty!")
     */
    Presence: function(value, paramsObj){
      	var paramsObj = paramsObj || {};
    	var message = paramsObj.failureMessage || "No puede ser Vacio";
    	if(value === '' || value === null || value === undefined){ 
    	  	Validate.fail(message);
    	}
    	return true;
    },
    
    /**
     *	valida que el valor es numérico, no se encuentra dentro de un rango determinado de números
     *	
     *	@var value {mixed} - valor que se comprueba
     *	@var paramsObj {Object} - parámetros para la validación de este particular, ver más abajo para obtener más detalles
     *
     *	paramsObj properties:
     *							notANumberMessage {String} - el mensaje para mostrar que el error de validación cuando el valor no es un número
     *													  	  (DEFAULT: "Must be a number!")
     *							notAnIntegerMessage {String} - el mensaje para mostrar que el error de validación cuando el valor no es un entero
     *													  	  (DEFAULT: "Must be a number!")
     *							wrongNumberMessage {String} - el mensaje para mostrar que el error de validación cuando se param se utiliza
     *													  	  (DEFAULT: "Must be {is}!")
     *							tooLowMessage {String} 		- el mensaje para mostrar que el error de validación cuando se utilice un parámetro
     *													  	  (DEFAULT: "Must not be less than {minimum}!")
     *							tooHighMessage {String} 	- el mensaje para mostrar que el error de validación cuando se param máxima se utiliza
     *													  	  (DEFAULT: "Must not be more than {maximum}!")
     *							is {Int} 					- la longitud debe ser este tiempo
     *							minimum {Int} 				- la longitud mínima permitida
     *							maximum {Int} 				- la longitud máxima permitida
     *                         onlyInteger {Boolean} - si es cierto sólo permitirá números enteros para ser válido
     *                                                             (DEFAULT: false)
     *
     *  NB. se puede comprobar si está dentro de un rango especificando tanto un mínimo y un máximo
     *  NB. evaluará los números representados en forma científica (es decir, 2e10) correctamente los números de			
     */
    Numericality: function(value, paramsObj){
        var suppliedValue = value;
        var value = Number(value);
    	var paramsObj = paramsObj || {};
        var minimum = ((paramsObj.minimum) || (paramsObj.minimum == 0)) ? paramsObj.minimum : null;;
        var maximum = ((paramsObj.maximum) || (paramsObj.maximum == 0)) ? paramsObj.maximum : null;
    	var is = ((paramsObj.is) || (paramsObj.is == 0)) ? paramsObj.is : null;
        var notANumberMessage = paramsObj.notANumberMessage || "Debe ser un numero!";
        var notAnIntegerMessage = paramsObj.notAnIntegerMessage || "Debe ser Entero!";
    	var wrongNumberMessage = paramsObj.wrongNumberMessage || "Debe ser " + is + "!";
    	var tooLowMessage = paramsObj.tooLowMessage || "No debe ser inferior a " + minimum + "!";
    	var tooHighMessage = paramsObj.tooHighMessage || "No debe ser superar a " + maximum + "!";
        if (!isFinite(value)) Validate.fail(notANumberMessage);
        if (paramsObj.onlyInteger && (/\.0+$|\.$/.test(String(suppliedValue))  || value != parseInt(value)) ) Validate.fail(notAnIntegerMessage);
    	switch(true){
    	  	case (is !== null):
    	  		if( value != Number(is) ) Validate.fail(wrongNumberMessage);
    			break;
    	  	case (minimum !== null && maximum !== null):
    	  		Validate.Numericality(value, {tooLowMessage: tooLowMessage, minimum: minimum});
    	  		Validate.Numericality(value, {tooHighMessage: tooHighMessage, maximum: maximum});
    	  		break;
    	  	case (minimum !== null):
    	  		if( value < Number(minimum) ) Validate.fail(tooLowMessage);
    			break;
    	  	case (maximum !== null):
    	  		if( value > Number(maximum) ) Validate.fail(tooHighMessage);
    			break;
    	}
    	return true;
    },
    
    /**
     *	valida contra un patrón RegExp
     *	
     *	@var value {mixed} - valor que se comprueba
     *	@var paramsObj {Object} - parámetros para la validación de este particular, ver más abajo para obtener más detalles
     *
     *	paramsObj properties:
     *							failureMessage {String} - el mensaje para mostrar cuando el campo no supera la validación
     *													  (DEFAULT: "Not valid!")
     *							pattern {RegExp} 		- el patrón de expresión regular
     *													  (DEFAULT: /./)
     *             negate {Boolean} - si es true, validará cierto si el patrón no se corresponde
   *                           (DEFAULT: false)
     *
     *  NB. devolverá true para una cadena vacía, para permitir no necesarios, los campos vacíos para validar.
      * Si usted no quiere que este sea el caso, entonces usted debe agregar una validación LiveValidation.PRESENCE
      * O construirlo en el patrón de expresión regular
     */
	
    Format: function(value, paramsObj){
      var value = String(value);
    	var paramsObj = paramsObj || {};
    	var message = paramsObj.failureMessage || "No es Valido!";
      var pattern = paramsObj.pattern || /./;
      var negate = paramsObj.negate || false;
      if(!negate && !pattern.test(value)) Validate.fail(message); // normal
      if(negate && pattern.test(value)) Validate.fail(message); // negated
    	return true;
    },
    
    /**
     *	validates that the field contains a valid email address
     *	
     *	@var value {mixed} - value to be checked
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							failureMessage {String} - the message to show when the field fails validation
     *													  (DEFAULT: "Must be a number!" or "Must be an integer!")
     */
    Email: function(value, paramsObj){
    	var paramsObj = paramsObj || {};
    	var message = paramsObj.failureMessage || "Debe ser un Email Valido!";
    	Validate.Format(value, { failureMessage: message, pattern: /^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i } );
    	return true;
    },
    
    /**
     *	validates the length of the value
     *	
     *	@var value {mixed} - value to be checked
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							wrongLengthMessage {String} - the message to show when the fails when is param is used
     *													  	  (DEFAULT: "Must be {is} characters long!")
     *							tooShortMessage {String} 	- the message to show when the fails when minimum param is used
     *													  	  (DEFAULT: "Must not be less than {minimum} characters long!")
     *							tooLongMessage {String} 	- the message to show when the fails when maximum param is used
     *													  	  (DEFAULT: "Must not be more than {maximum} characters long!")
     *							is {Int} 					- the length must be this long 
     *							minimum {Int} 				- the minimum length allowed
     *							maximum {Int} 				- the maximum length allowed
     *
     *  NB. can be checked if it is within a range by specifying both a minimum and a maximum				
     */
    Length: function(value, paramsObj){
    	var value = String(value);
    	var paramsObj = paramsObj || {};
        var minimum = ((paramsObj.minimum) || (paramsObj.minimum == 0)) ? paramsObj.minimum : null;
    	var maximum = ((paramsObj.maximum) || (paramsObj.maximum == 0)) ? paramsObj.maximum : null;
    	var is = ((paramsObj.is) || (paramsObj.is == 0)) ? paramsObj.is : null;
        var wrongLengthMessage = paramsObj.wrongLengthMessage || "Debe ser " + is + " caracteres de longitud!";
    	var tooShortMessage = paramsObj.tooShortMessage || "No debe ser inferior a " + minimum + " caracteres de longitud!";
    	var tooLongMessage = paramsObj.tooLongMessage || "No debe ser superior a " + maximum + " caracteres de longitud!";
    	switch(true){
    	  	case (is !== null):
    	  		if( value.length != Number(is) ) Validate.fail(wrongLengthMessage);
    			break;
    	  	case (minimum !== null && maximum !== null):
    	  		Validate.Length(value, {tooShortMessage: tooShortMessage, minimum: minimum});
    	  		Validate.Length(value, {tooLongMessage: tooLongMessage, maximum: maximum});
    	  		break;
    	  	case (minimum !== null):
    	  		if( value.length < Number(minimum) ) Validate.fail(tooShortMessage);
    			break;
    	  	case (maximum !== null):
    	  		if( value.length > Number(maximum) ) Validate.fail(tooLongMessage);
    			break;
    		default:
    			throw new Error("Validate::Length - Longitud para validar contra se debe proporcionar!");
    	}
    	return true;
    },
    
    /**
     *	valida que el valor se encuentra dentro de un conjunto determinado de valores
     *	
     *	@var value {mixed} - value to be checked
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							failureMessage {String} - the message to show when the field fails validation
     *													  (DEFAULT: "Must be included in the list!")
     *							within {Array} 			- an array of values that the value should fall in 
     *													  (DEFAULT: [])	
     *							allowNull {Bool} 		- if true, and a null value is passed in, validates as true
     *													  (DEFAULT: false)
     *             partialMatch {Bool} 	- if true, will not only validate against the whole value to check but also if it is a substring of the value 
     *													  (DEFAULT: false)
     *             caseSensitive {Bool} - if false will compare strings case insensitively
     *                          (DEFAULT: true)
     *             negate {Bool} 		- if true, will validate that the value is not within the given set of values
     *													  (DEFAULT: false)			
     */
    Inclusion: function(value, paramsObj){
    	var paramsObj = paramsObj || {};
    	var message = paramsObj.failureMessage || "Debe ser incluido en la lista!";
      var caseSensitive = (paramsObj.caseSensitive === false) ? false : true;
    	if(paramsObj.allowNull && value == null) return true;
      if(!paramsObj.allowNull && value == null) Validate.fail(message);
    	var within = paramsObj.within || [];
      //if case insensitive, make all strings in the array lowercase, and the value too
      if(!caseSensitive){ 
        var lowerWithin = [];
        for(var j = 0, length = within.length; j < length; ++j){
        	var item = within[j];
          if(typeof item == 'string') item = item.toLowerCase();
          lowerWithin.push(item);
        }
        within = lowerWithin;
        if(typeof value == 'string') value = value.toLowerCase();
      }
    	var found = false;
    	for(var i = 0, length = within.length; i < length; ++i){
    	  if(within[i] == value) found = true;
        if(paramsObj.partialMatch){ 
          if(value.indexOf(within[i]) != -1) found = true;
        }
    	}
    	if( (!paramsObj.negate && !found) || (paramsObj.negate && found) ) Validate.fail(message);
    	return true;
    },
    
    /**
     *	valida que el valor no está comprendido en un determinado conjunto de valores
     *	
     *	@var value {mixed} - value to be checked
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							failureMessage {String} - the message to show when the field fails validation
     *													  (DEFAULT: "Must not be included in the list!")
     *							within {Array} 			- an array of values that the value should not fall in 
     *													  (DEFAULT: [])
     *							allowNull {Bool} 		- if true, and a null value is passed in, validates as true
     *													  (DEFAULT: false)
     *             partialMatch {Bool} 	- if true, will not only validate against the whole value to check but also if it is a substring of the value 
     *													  (DEFAULT: false)
     *             caseSensitive {Bool} - if false will compare strings case insensitively
     *                          (DEFAULT: true)			
     */
    Exclusion: function(value, paramsObj){
      var paramsObj = paramsObj || {};
    	paramsObj.failureMessage = paramsObj.failureMessage || "No deben ser incluidos en la lista!";
      paramsObj.negate = true;
    	Validate.Inclusion(value, paramsObj);
      return true;
    },
    
    /**
     *	valida que el valor coincide con que en otro campo
     *	
     *	@var value {mixed} - value to be checked
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							failureMessage {String} - the message to show when the field fails validation
     *													  (DEFAULT: "Does not match!")
     *							match {String} 			- id of the field that this one should match						
     */
    Confirmation: function(value, paramsObj){
      	if(!paramsObj.match) throw new Error("Validate::Confirmation - Error al validar la confirmación: Id del elemento para que coincida debe proporcionarse!");
    	var paramsObj = paramsObj || {};
    	var message = paramsObj.failureMessage || "No coincide!";
    	var match = paramsObj.match.nodeName ? paramsObj.match : document.getElementById(paramsObj.match);
    	if(!match) throw new Error("Validate::Confirmation - There is no reference with name of, or element with id of '" + paramsObj.match + "'!");
    	if(value != match.value){ 
    	  	Validate.fail(message);
    	}
    	return true;
    },
    
    /**
     *	valida que el valor es true (principalmente para uso en detemining si una casilla de verificación se ha comprobado)
     *	
     *	@var value {mixed} - value to be checked if true or not (usually a boolean from the checked value of a checkbox)
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							failureMessage {String} - the message to show when the field fails validation 
     *													  (DEFAULT: "Must be accepted!")
     */
    Acceptance: function(value, paramsObj){
      	var paramsObj = paramsObj || {};
    	var message = paramsObj.failureMessage || "Debe Aceptar!";
    	if(!value){ 
    	  	Validate.fail(message);
    	}
    	return true;
    },
    
	 /**
     *	valida contra una función personalizada que devuelve true o false (o lanza un Validate.Error) cuando se pasa el valor
     *	
     *	@var value {mixed} - value to be checked
     *	@var paramsObj {Object} - parameters for this particular validation, see below for details
     *
     *	paramsObj properties:
     *							failureMessage {String} - el mensaje para mostrar cuando el campo no supera la validación
     *													  (DEFAULT: "Not valid!")
     *							against {Function} 			- una función que tendrá el valor y el objeto de los argumentos y devolver verdadero o falso 
     *													  (DEFAULT: function(){ return true; })
     *							args {Object} 		- un objeto de argumentos con nombre que se pasarán a la función personalizada que se puede acceder 
															a través de este objeto en su interior
     *													  (DEFAULT: {})
     */
	Custom: function(value, paramsObj){
		var paramsObj = paramsObj || {};
		var against = paramsObj.against || function(){ return true; };
		var args = paramsObj.args || {};
		var message = paramsObj.failureMessage || "No es Valido!";
	    if(!against(value, args)) Validate.fail(message);
	    return true;
	  },
	
    /**
     *	valida lo que sea que pase, y maneja el error de validación para que por lo que da una respuesta bien verdadero o falso
     *
     *	@var validationFunction {Function} - la función de validación que se utilizarán (por ejemplo, Validation.validatePresence)
     *	@var value {mixed} - valor que se debe comprobar si es cierto o no (por lo general un valor lógico a partir del valor de activación
	 de una casilla de verificación)
     *	@var validationParamsObj {Object} - parámetros para hacer la validación, si se desea o es necesario
     */
    now: function(validationFunction, value, validationParamsObj){
      	if(!validationFunction) throw new Error("Validate::now - La función de validación se debe proporcionar!");
    	var isValid = true;
        try{    
    		validationFunction(value, validationParamsObj || {});
    	} catch(error) {
    		if(error instanceof Validate.Error){
    			isValid =  false;
    		}else{
    		 	throw error;
    		}
    	}finally{ 
            return isValid 
        }
    },
    
    /**
     * acceso directo para no tirar un error de validación
     *
     *	@var errorMessage {String} - message to display
     */
    fail: function(errorMessage){
            throw new Validate.Error(errorMessage);
    },
    
    Error: function(errorMessage){
    	this.message = errorMessage;
    	this.name = 'ValidationError';
    }

}