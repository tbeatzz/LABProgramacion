// 1- declarar variables
const form = document.getElementById('form');
const formInputs = document.querySelectorAll('#form input');
const formSelect = document.getElementById('satisfaccion');
const formTextarea = document.getElementById('comentarios')
const formBtn = document.getElementById('btnForm');

// 2- expresiones regulares

const expresionesRegulares = {
    nombre: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,}$/,
    email: /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/,
    edad: /^(?:1[01][0-9]|120|[1-9][0-9]?)$/,
    fecha: /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/
}

// 

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

formInputs.forEach( (input) =>{
    input.addEventListener('keyup', validarInputs);
    input.addEventListener('blur', validarInputs); //blur	An element loses focus w3c
});