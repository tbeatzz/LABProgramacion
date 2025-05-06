// 1- declarar variables
const form = document.getElementById('form');
const formInputs = document.querySelectorAll('#form input');
const formSelect = document.getElementById('satisfaccion');
const formTextarea = document.getElementById('comentarios')

// 2- expresiones regulares

const expresionesRegulares = {
    nombre: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,}$/,
    email: /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/,
    edad: /^(?:1[01][0-9]|120|[1-9][0-9]?)$/,
    fecha: /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$|^\d{4}-\d{2}-\d{2}$/
}

// 

const validarInputs = (e) =>{
    switch(e.target.name){
        case 'nombre':
            validarCampo(expresionesRegulares.nombre, e.target, 'Nombre');
        break;

        case 'email':
            console.log('email');
        break;

        case 'edad':
            console.log('edad');
        break;

        case 'masculino':
            console.log('masculino');
        break;

        case 'femenino':
            console.log('femenino');
        break;

        case 'otro':
            console.log('otro');
        break;

        case 'rapidez':
            console.log('rapidez');
        break;

        case 'amabilidad':
            console.log('amabilidad');
        break;
        case 'resolucion':
            console.log('resolucion');
        break;
        case 'recom-si':
            console.log('recom-si');
        break;
        case 'recom-no':
            console.log('recom-no');
        break;
        case 'fecha':
            console.log('fecha'); 
        break;
        case 'novedades':
            console.log('novedades');
        break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.querySelector('.formFeedback').classList.remove('incorrecto');

        document.getElementById(`form${campo}`).classList.remove('incorrecto');
        document.getElementById(`form${campo}`).classList.add('correcto');
    }else{
        document.querySelector('.formFeedback').classList.add('incorrecto');

        document.getElementById(`form${campo}`).classList.remove('correcto');
        document.getElementById(`form${campo}`).classList.add('incorrecto');
    }
}

formInputs.forEach( (input) =>{
    input.addEventListener('keyup', validarInputs);
    input.addEventListener('blur', validarInputs); //blur	An element loses focus w3c
});