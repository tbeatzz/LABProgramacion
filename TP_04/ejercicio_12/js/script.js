// 1- Declarar variables
const form = document.getElementById("form");
const btnForm = document.getElementById("btnForm");

// 2- Expresiones regulares para campos de texto
const expresionesRegulares = {
    nombre: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,}$/,
    email: /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/,
    edad: /^(?:1[01][0-9]|120|[1-9][0-9]?)$/,
    fecha: /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/,
    comentarios: /^[A-Za-z0-9ÁÉÍÓÚÑáéíóúñ\s.,!?()-]{0,500}$/, // Letras, números, espacios, y ciertos caracteres especiales, máx 500 caracteres
};

// 3- Función para actualizar el estado visual de un campo
const actualizarEstadoCampo = (esValido, groupId) => {
    const group = document.getElementById(groupId);
    const feedback = document.querySelector(`#${groupId} .formFeedback`);

    if (esValido) {
        feedback.classList.remove("incorrecto");
        group.classList.remove("incorrecto");
        group.classList.add("correcto");
    } else {
        feedback.classList.add("incorrecto");
        group.classList.add("incorrecto");
        group.classList.remove("correcto");
    }
};

// 4- Validación en tiempo real para campos de texto (nombre, email, edad, fecha, comentarios)
const validarCampoTexto = (input) => {
    switch (input.name) {
        case "nombre":
            actualizarEstadoCampo(expresionesRegulares.nombre.test(input.value), "formNombre");
            break;
        case "email":
            actualizarEstadoCampo(expresionesRegulares.email.test(input.value), "formEmail");
            break;
        case "edad":
            actualizarEstadoCampo(expresionesRegulares.edad.test(input.value), "formEdad");
            break;
        case "fecha":
            actualizarEstadoCampo(expresionesRegulares.fecha.test(input.value), "formFecha");
            break;
        case "comentarios":
            actualizarEstadoCampo(
                input.value === '' || expresionesRegulares.comentarios.test(input.value),
                "formComentarios"
            );
            break;
    }
};

// 5- Validación en tiempo real para campos de selección (genero, satisfaccion, caracteristicas, recomendarias)
const validarCampoSeleccion = (event) => {
    const target = event.target;

    if (target.name === "genero") {
        const seleccionado = document.querySelector('input[name="genero"]:checked');
        actualizarEstadoCampo(!!seleccionado, "formGenero");
    } else if (target.id === "satisfaccion") {
        actualizarEstadoCampo(!!target.value, "formSatisfaccion");
    } else if (target.name === "caracteristicas[]") {
        const seleccionados = document.querySelectorAll('input[name="caracteristicas[]"]:checked');
        actualizarEstadoCampo(seleccionados.length > 0, "formCaracteristicas");
    } else if (target.name === "recomendarias") {
        const seleccionado = document.querySelector('input[name="recomendarias"]:checked');
        actualizarEstadoCampo(!!seleccionado, "formRecomendacion");
    }
};

// 6- Asignar eventos de validación en tiempo real
// Campos de texto, email, número, fecha y textarea
document
    .querySelectorAll('#form input[type="text"], #form input[type="email"], #form input[type="number"], #form input[type="date"], #form textarea')
    .forEach((input) => {
        input.addEventListener("keyup", () => validarCampoTexto(input));
        input.addEventListener("blur", () => validarCampoTexto(input));
    });

// Campos de selección
document
    .querySelectorAll('#form input[type="radio"], #form input[type="checkbox"], #form select')
    .forEach((element) => {
        element.addEventListener("change", validarCampoSeleccion);
    });

// 7- Validación al enviar el formulario
btnForm.addEventListener("click", () => {
    let hayErrores = false;

    // Verificar la validez de un campo
    const verificarCampo = (condicion, groupId) => {
        const group = document.getElementById(groupId);
        const feedback = document.querySelector(`#${groupId} .formFeedback`);
        if (!condicion) {
            hayErrores = true;
            feedback.classList.add("incorrecto");
            group.classList.add("incorrecto");
            group.classList.remove("correcto");
        }
    };

    // Verificar campos obligatorios en tiempo real (nombre, email, edad, fecha)
    ["Nombre", "Email", "Edad", "Fecha"].forEach((campo) => {
        verificarCampo(document.getElementById(`form${campo}`).classList.contains("correcto"), `form${campo}`);
    });

    // Verificar género (radio buttons)
    verificarCampo(document.querySelector('input[name="genero"]:checked'), "formGenero");

    // Verificar satisfacción (select)
    verificarCampo(document.getElementById("satisfaccion").value, "formSatisfaccion");

    // Verificar características (checkboxes, obligatorio)
    verificarCampo(
        document.querySelectorAll('input[name="caracteristicas[]"]:checked').length > 0,
        "formCaracteristicas"
    );

    // Verificar recomendación (radio buttons)
    verificarCampo(document.querySelector('input[name="recomendarias"]:checked'), "formRecomendacion");

    // Verificar comentarios (textarea, opcional pero debe cumplir con la expresión regular si tiene contenido)
    const comentarios = document.getElementById("comentarios").value;
    verificarCampo(
        comentarios === '' || expresionesRegulares.comentarios.test(comentarios),
        "formComentarios"
    );

    // Enviar formulario si no hay errores
    if (!hayErrores) {
        // Crear objeto con los datos del formulario
        const formData = {
            nombre: document.getElementById("nombre").value,
            email: document.getElementById("email").value,
            edad: parseInt(document.getElementById("edad").value) || null,
            fecha: document.getElementById("fecha").value,
            genero: document.querySelector('input[name="genero"]:checked')?.value || null,
            satisfaccion: document.getElementById("satisfaccion").value,
            caracteristicas: (() => {
                const valores = [];
                for (const input of document.querySelectorAll('input[name="caracteristicas[]"]:checked')) {
                    valores.push(input.value);
                }
                return valores;
            })(),
            recomendarias: document.querySelector('input[name="recomendarias"]:checked')?.value || null,
            comentarios: document.getElementById("comentarios").value || null,
            novedades: document.getElementById("novedades").checked,
        };

        // Convertir el objeto a JSON con formato legible
        const jsonString = JSON.stringify(formData, null, 2);

        // Mostrar en la consola
        console.log(jsonString);

        const jsonOutput = document.getElementById("jsonOutput");
        jsonOutput.textContent = jsonString;
        alert("Datos capturados con éxito. Revisar el JSON en la consola.");
    }
});