// 1- Declarar variables
const form = document.getElementById('form');
// Selecciona el elemento <form> con id="form" del HTML y lo almacena en la constante `form`.
// Esto permite acceder al formulario para manipularlo (por ejemplo, enviarlo con submit()).

const formInputs = document.querySelectorAll('#form input');
// Selecciona todos los elementos <input> dentro del formulario con id="form" y los almacena en `formInputs`.
// `formInputs` es una NodeList con todos los inputs (texto, radio, checkbox, etc.) del formulario.

// 2- Expresiones regulares
const expresionesRegulares = {
    nombre: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,}$/,
    // Define una expresión regular para validar el campo `nombre`.
    // Acepta letras (mayúsculas y minúsculas, incluidas tildes y ñ) y espacios, con un mínimo de 2 caracteres.

    email: /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/,
    // Define una expresión regular para validar el campo `email`.
    // Acepta correos electrónicos con formato estándar (por ejemplo, "usuario@dominio.com").
    // Permite letras, números, puntos y guiones antes del @, y un dominio con al menos 2 letras.

    edad: /^(?:1[01][0-9]|120|[1-9][0-9]?)$/,
    // Define una expresión regular para validar el campo `edad`.
    // Acepta números del 1 al 120 (incluye 1-9, 10-99, 100-119, y 120).

    fecha: /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/,
    // Define una expresión regular para validar el campo `fecha`.
    // Acepta fechas en formato YYYY-MM-DD, con meses de 01 a 12 y días de 01 a 31.
};

// 3- Validar campos en tiempo real
const validarInputs = (e) => {
    // Define una función `validarInputs` que se ejecuta cuando ocurre un evento (e) en un input.
    // `e` es el objeto del evento (por ejemplo, keyup o blur).

    switch(e.target.name) {
        // Usa un `switch` para determinar qué campo del formulario está siendo validado, según el atributo `name` del input.

        case 'nombre':
            validarCampo(expresionesRegulares.nombre, e.target, 'Nombre');
            // Si el campo es `nombre`, llama a `validarCampo` con la expresión regular de `nombre`, el input actual (`e.target`), y el nombre del campo ("Nombre").
            break;
            // Sale del `switch` para evitar ejecutar otros casos.

        case 'email':
            validarCampo(expresionesRegulares.email, e.target, 'Email');
            // Si el campo es `email`, llama a `validarCampo` con la expresión regular de `email`, el input actual, y el nombre del campo ("Email").
            break;

        case 'edad':
            validarCampo(expresionesRegulares.edad, e.target, 'Edad');
            // Si el campo es `edad`, llama a `validarCampo` con la expresión regular de `edad`, el input actual, y el nombre del campo ("Edad").
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    // Define la función `validarCampo` que valida un campo específico.
    // Recibe: `expresion` (expresión regular), `input` (elemento input), y `campo` (nombre del campo, como "Nombre").

    if(expresion.test(input.value)) {
        // Verifica si el valor del input cumple con la expresión regular usando el método `test`.
        // Si es válido:

        document.querySelector(`#form${campo} .formFeedback`).classList.remove('incorrecto')
        // Selecciona el elemento `.formFeedback` dentro del contenedor `#form${campo}` (por ejemplo, `#formNombre .formFeedback`) y elimina la clase `incorrecto`.
        // Esto oculta el mensaje de error (según el CSS).

        document.getElementById(`form${campo}`).classList.remove('incorrecto');
        // Selecciona el contenedor del campo (por ejemplo, `#formNombre`) y elimina la clase `incorrecto`.
        // Esto quita el estilo visual de error (como un borde rojo).

        document.getElementById(`form${campo}`).classList.add('correcto');
        // Añade la clase `correcto` al contenedor del campo.
        // Esto aplica un estilo visual de éxito (como un borde verde).
    } else {
        // Si el valor del input NO cumple con la expresión regular:

        document.querySelector(`#form${campo} .formFeedback`).classList.add('incorrecto')
        // Añade la clase `incorrecto` al elemento `.formFeedback`, mostrando el mensaje de error.

        document.getElementById(`form${campo}`).classList.add('incorrecto');
        // Añade la clase `incorrecto` al contenedor del campo, aplicando el estilo de error.

        document.getElementById(`form${campo}`).classList.remove('correcto');
        // Elimina la clase `correcto` del contenedor, asegurando que no se muestre el estilo de éxito.
    }
}

// 4- Validación en tiempo real para inputs de texto
formInputs.forEach( (input) => {
    // Itera sobre cada input en `formInputs` (todos los <input> del formulario).

    input.addEventListener('keyup', validarInputs);
    // Añade un evento `keyup` a cada input, que ejecuta `validarInputs` cada vez que el usuario suelta una tecla.
    // Esto permite validar el campo en tiempo real mientras el usuario escribe.

    input.addEventListener('blur', validarInputs);
    // Añade un evento `blur` a cada input, que ejecuta `validarInputs` cuando el input pierde el foco (el usuario hace clic fuera).
    // Esto valida el campo cuando el usuario termina de editarlo.
    // Nota: Esto aplica a todos los inputs, pero `validarInputs` solo maneja `nombre`, `email`, y `edad`.
});

// 5- Validación al hacer clic en el botón
btnForm.addEventListener('click', () => {
    // Añade un evento `click` al botón con id="btnForm" (nota: falta declarar `const btnForm = document.getElementById('btnForm');`).
    // Ejecuta una función cuando el usuario hace clic en "Enviar encuesta".

    let hasErrors = false;
    // Declara una variable `hasErrors` inicializada en `false`.
    // Se usará para rastrear si hay errores en la validación y decidir si enviar el formulario.

    // Validar género (radio buttons)
    const generoSeleccionado = document.querySelector('input[name="genero"]:checked');
    // Busca si hay un input de tipo radio con `name="genero"` que esté seleccionado (`:checked`).
    // Almacena el elemento seleccionado o `null` si no hay selección.

    const generoGroup = document.getElementById('formGenero');
    // Selecciona el contenedor del campo de género (`<div id="formGenero">`).

    const generoFeedback = document.querySelector('#formGenero .formFeedback');
    // Selecciona el elemento `.formFeedback` dentro de `#formGenero` para mostrar mensajes de error.

    if (!generoSeleccionado) {
        // Si no hay un radio button seleccionado (`generoSeleccionado` es `null`):

        hasErrors = true;
        // Marca que hay un error estableciendo `hasErrors` en `true`.

        generoFeedback.classList.add('incorrecto');
        // Añade la clase `incorrecto` al elemento `.formFeedback`, mostrando el mensaje de error.

        generoFeedback.textContent = 'Debes seleccionar un género';
        // Establece el texto del mensaje de error en el `.formFeedback`.

        generoGroup.classList.add('incorrecto');
        // Añade la clase `incorrecto` al contenedor `#formGenero`, aplicando el estilo de error.

        generoGroup.classList.remove('correcto');
        // Elimina la clase `correcto` del contenedor, asegurando que no se muestre el estilo de éxito.
    } else {
        // Si hay un radio button seleccionado:

        generoFeedback.classList.remove('incorrecto');
        // Elimina la clase `incorrecto` del `.formFeedback`, ocultando el mensaje de error.

        generoGroup.classList.remove('incorrecto');
        // Elimina la clase `incorrecto` del contenedor `#formGenero`.

        generoGroup.classList.add('correcto');
        // Añade la clase `correcto` al contenedor, aplicando el estilo de éxito.
    }

    // Validar satisfacción (select)
    const satisfaccion = document.getElementById('satisfaccion');
    // Selecciona el elemento `<select>` con id="satisfaccion".

    const satisfaccionGroup = document.getElementById('formSatisfaccion');
    // Selecciona el contenedor del campo de satisfacción (`<div id="formSatisfaccion">`).

    const satisfaccionFeedback = document.querySelector('#formSatisfaccion .formFeedback');
    // Selecciona el elemento `.formFeedback` dentro de `#formSatisfaccion`.

    if (!satisfaccion.value) {
        // Si el valor del `<select>` está vacío (es decir, está en la opción por defecto `value=""`):

        hasErrors = true;
        // Marca que hay un error.

        satisfaccionFeedback.classList.add('incorrecto');
        // Muestra el mensaje de error añadiendo la clase `incorrecto`.

        satisfaccionFeedback.textContent = 'Debes seleccionar un nivel de satisfacción';
        // Establece el texto del mensaje de error.

        satisfaccionGroup.classList.add('incorrecto');
        // Añade la clase `incorrecto` al contenedor.

        satisfaccionGroup.classList.remove('correcto');
        // Elimina la clase `correcto`.
    } else {
        // Si se seleccionó una opción válida:

        satisfaccionFeedback.classList.remove('incorrecto');
        // Oculta el mensaje de error.

        satisfaccionGroup.classList.remove('incorrecto');
        // Elimina el estilo de error.

        satisfaccionGroup.classList.add('correcto');
        // Añade el estilo de éxito.
    }

    // Validar características (checkboxes, obligatorio)
    const caracteristicas = document.querySelectorAll('input[name="caracteristicas[]"]:checked');
    // Selecciona todos los checkboxes con `name="caracteristicas[]"` que estén marcados.
    // `caracteristicas` es una NodeList con los checkboxes seleccionados (puede estar vacía).

    const caracteristicasGroup = document.getElementById('formCaracteristicas');
    // Selecciona el contenedor del campo de características (`<div id="formCaracteristicas">`).

    const caracteristicasFeedback = document.querySelector('#formCaracteristicas .formFeedback');
    // Selecciona el elemento `.formFeedback` dentro de `#formCaracteristicas`.

    if (caracteristicas.length === 0) {
        // Si no hay checkboxes seleccionados (la NodeList está vacía):

        hasErrors = true;
        // Marca que hay un error.

        caracteristicasFeedback.classList.add('incorrecto');
        // Muestra el mensaje de error.

        caracteristicasFeedback.textContent = 'Debes seleccionar al menos una característica';
        // Establece el texto del mensaje de error.

        caracteristicasGroup.classList.add('incorrecto');
        // Añade la clase `incorrecto` al contenedor.

        caracteristicasGroup.classList.remove('correcto');
        // Elimina la clase `correcto`.
    }
    // Nota: Aquí falta un bloque `else` para manejar el caso en que sí hay checkboxes seleccionados.
    // Debería añadirse para aplicar la clase `correcto`:
    // else {
    //     caracteristicasFeedback.classList.remove('incorrecto');
    //     caracteristicasGroup.classList.remove('incorrecto');
    //     caracteristicasGroup.classList.add('correcto');
    // }

    // Validar recomendación (radio buttons)
    const recomendacionSeleccionada = document.querySelector('input[name="recomendarias"]:checked');
    // Busca si hay un input de tipo radio con `name="recomendarias"` seleccionado.

    const recomendacionGroup = document.getElementById('formRecomendacion');
    // Selecciona el contenedor del campo de recomendación (`<div id="formRecomendacion">`).

    const recomendacionFeedback = document.querySelector('#formRecomendacion .formFeedback');
    // Selecciona el elemento `.formFeedback` dentro de `#formRecomendacion`.

    if (!recomendacionSeleccionada) {
        // Si no hay un radio button seleccionado:

        hasErrors = true;
        // Marca que hay un error.

        recomendacionFeedback.classList.add('incorrecto');
        // Muestra el mensaje de error.

        recomendacionFeedback.textContent = 'Debes indicar si nos recomendarías';
        // Establece el texto del mensaje de error.

        recomendacionGroup.classList.add('incorrecto');
        // Añade la clase `incorrecto` al contenedor.

        recomendacionGroup.classList.remove('correcto');
        // Elimina la clase `correcto`.
    } else {
        // Si hay un radio button seleccionado:

        recomendacionFeedback.classList.remove('incorrecto');
        // Oculta el mensaje de error.

        recomendacionGroup.classList.remove('incorrecto');
        // Elimina el estilo de error.

        recomendacionGroup.classList.add('correcto');
        // Añade el estilo de éxito.
    }

    // Enviar formulario si no hay errores
    if (!hasErrors) {
        // Si no se encontraron errores (`hasErrors` es `false`):

        form.submit();
        // Envía el formulario al servidor (a la URL especificada en `action="/enviar-encuesta"` con método POST).

        alert('Formulario enviado con éxito');
        // Muestra una alerta en el navegador indicando que el formulario se envió correctamente.
        // Nota: Esto puede no ser ideal si el envío al servidor falla, ya que la alerta se muestra antes de la respuesta del servidor.
    }
});