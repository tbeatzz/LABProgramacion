const body = document.body;
const select = document.getElementById('colorSelect');
const cambiar = document.getElementById('colorBtnSubmit');

let ultimoColor;

const validarFormulario = () => {
    if(select.value === '-'){
        alert('seleccione un color');
    }
}


const colorChange = () => {
    validarFormulario();

    const color = select.value;

    if (ultimoColor) { ///podria ser una funcion
        body.classList.remove(ultimoColor); 
    }

    body.classList.remove();
    body.classList.add(color);

    ultimoColor = color;
}

const colorReset = ()=>{
    if (ultimoColor) {
        body.classList.remove(ultimoColor);
    }
}