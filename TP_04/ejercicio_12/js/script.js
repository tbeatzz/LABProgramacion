// 1- declarar variables
const form = document.getElementById('form');
const formInputs = document.querySelectorAll('#form input');


// 2- expresiones regulares

const expresionesRegulares = {
    nombre: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,}$/,
    email: /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/,
    edad: /^(?:1[01][0-9]|120|[1-9][0-9]?)$/,
    fecha: /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/
}

// 3- Validar campos en tiempo real
const validarInputs = (e) =>{
    switch(e.target.name){
        case 'nombre':
            validarCampo(expresionesRegulares.nombre, e.target, 'Nombre');
        break;

        case 'email':
            validarCampo(expresionesRegulares.email, e.target, 'Email');
        break;

        case 'edad':
            validarCampo(expresionesRegulares.edad, e.target, 'Edad');
        break;
    }
}
const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.querySelector(`#form${campo} .formFeedback`).classList.remove('incorrecto')
        document.getElementById(`form${campo}`).classList.remove('incorrecto');
        document.getElementById(`form${campo}`).classList.add('correcto');
    }else{
        document.querySelector(`#form${campo} .formFeedback`).classList.add('incorrecto')
        document.getElementById(`form${campo}`).classList.add('incorrecto');
        document.getElementById(`form${campo}`).classList.remove('correcto');
    }
}

// 4- Validación en tiempo real para inputs de texto
formInputs.forEach( (input) =>{
    input.addEventListener('keyup', validarInputs);
    input.addEventListener('blur', validarInputs); //blur	An element loses focus w3c
});


// 5- Validación al hacer clic en el botón
btnForm.addEventListener('click', () => {
    let hasErrors = false;

    

    // Validar género (radio buttons)
    const generoSeleccionado = document.querySelector('input[name="genero"]:checked');
    const generoGroup = document.getElementById('formGenero');
    const generoFeedback = document.querySelector('#formGenero .formFeedback');
    if (!generoSeleccionado) {
        hasErrors = true;
        generoFeedback.classList.add('incorrecto');
        generoFeedback.textContent = 'Debes seleccionar un género';
        generoGroup.classList.add('incorrecto');
        generoGroup.classList.remove('correcto');
    } else {
        generoFeedback.classList.remove('incorrecto');
        generoGroup.classList.remove('incorrecto');
        generoGroup.classList.add('correcto');
    }

    // Validar satisfacción (select)
    const satisfaccion = document.getElementById('satisfaccion');
    const satisfaccionGroup = document.getElementById('formSatisfaccion');
    const satisfaccionFeedback = document.querySelector('#formSatisfaccion .formFeedback');
    if (!satisfaccion.value) {
        hasErrors = true;
        satisfaccionFeedback.classList.add('incorrecto');
        satisfaccionFeedback.textContent = 'Debes seleccionar un nivel de satisfacción';
        satisfaccionGroup.classList.add('incorrecto');
        satisfaccionGroup.classList.remove('correcto');
    } else {
        satisfaccionFeedback.classList.remove('incorrecto');
        satisfaccionGroup.classList.remove('incorrecto');
        satisfaccionGroup.classList.add('correcto');
    }

    // Validar características (checkboxes, opcional)
    const caracteristicas = document.querySelectorAll('input[name="caracteristicas[]"]:checked');
    const caracteristicasGroup = document.getElementById('formCaracteristicas');
    const caracteristicasFeedback = document.querySelector('#formCaracteristicas .formFeedback');
    // Dejar como opcional, no añadir error
    if (caracteristicas.length === 0) {
        hasErrors = true;
        caracteristicasFeedback.classList.add('incorrecto');
        caracteristicasFeedback.textContent = 'Debes seleccionar al menos una característica';
        caracteristicasGroup.classList.add('incorrecto');
        caracteristicasGroup.classList.remove('correcto');
    }

    // Validar recomendación (radio buttons)
    const recomendacionSeleccionada = document.querySelector('input[name="recomendarias"]:checked');
    const recomendacionGroup = document.getElementById('formRecomendacion');
    const recomendacionFeedback = document.querySelector('#formRecomendacion .formFeedback');
    if (!recomendacionSeleccionada) {
        hasErrors = true;
        recomendacionFeedback.classList.add('incorrecto');
        recomendacionFeedback.textContent = 'Debes indicar si nos recomendarías';
        recomendacionGroup.classList.add('incorrecto');
        recomendacionGroup.classList.remove('correcto');
    } else {
        recomendacionFeedback.classList.remove('incorrecto');
        recomendacionGroup.classList.remove('incorrecto');
        recomendacionGroup.classList.add('correcto');
    }

    // Enviar formulario si no hay errores
    if (!hasErrors) {
        form.submit();
        alert('Formulario enviado con éxito');
    }
});