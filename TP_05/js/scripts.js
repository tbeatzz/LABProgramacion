const hamburguesa = document.getElementById('hamburguer');
const enlaces = document.getElementById('enlaces');

hamburguesa.addEventListener('click', () =>{
    console.log('hola');

    enlaces.classList.toggle('show');
})

