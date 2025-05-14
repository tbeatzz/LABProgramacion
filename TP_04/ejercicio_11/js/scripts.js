// validación en tiempo real

document
    .querySelectorAll('#matricesForm .formGroup input[type="number"]')
    .forEach((input) => {
        input.addEventListener("keyup", () => validarCampo(input));
        input.addEventListener("blur", () => validarCampo(input));
    });

const validarCampo = (input) => {
    // valida un campo de texto según su name y la expresión regular correspondiente.
    const campo = input.id;
    const valor = input.value;

    if (valor === "" || valor <= 0) {
        input.classList.remove("correcto");
        input.classList.add("error");
    } else {
        input.classList.add("correcto");
        input.classList.remove("error");
    }
};

function generarMatriz(rows, cols, matrizId) {
    let html = `<h3>Matriz ${matrizId === "matrizA" ? "A" : "B"}</h3><table>`;
    for (let i = 0; i < rows; i++) {
        html += "<tr>";
        for (let j = 0; j < cols; j++) {
            html += `<td><input type="number" id="${matrizId}${i}${j}" min="0"></td>`;
        }
        html += "</tr>";
    }
    html += "</table>";
    document.getElementById(matrizId).innerHTML = html;

    //   document
    //     .querySelectorAll(`#${matrizId} input[type="number"]`)
    //     .forEach((input) => {
    //       input.addEventListener("keyup", () => validarCampoMatriz(input));
    //       input.addEventListener("blur", () => validarCampoMatriz(input));
    //     });
}

function validarDimensiones() {
    const filaA = document.getElementById("matAFila").value;
    const columnaA = document.getElementById("matAColumna").value;
    const filaB = document.getElementById("matBFila").value;
    const columnaB = document.getElementById("matBColumna").value;

    if (!filaA || !columnaA || !filaB || !columnaB) {
        document.getElementById("formError").innerText =
            "Todos los campos de dimensiones deben estar completos.";
        return false;
    }

    if (
        !/^\d+$/.test(filaA) ||
        parseInt(filaA) < 1 || //se usa la expresion regular para comprobar, verifica que sea una cadena de uno o más dígitos (entero no negativo). parseInt(valor) < 1 para asegurar que sea positivo
        !/^\d+$/.test(columnaA) ||
        parseInt(columnaA) < 1 ||
        !/^\d+$/.test(filaB) ||
        parseInt(filaB) < 1 ||
        !/^\d+$/.test(columnaB) ||
        parseInt(columnaB) < 1
    ) {
        document.getElementById("formError").innerText =
            "Todas las dimensiones deben ser números enteros mayores que 0.";
        return false;
    }

    if (
        parseInt(filaA) <= 0 ||
        parseInt(columnaA) <= 0 ||
        parseInt(filaB) <= 0 ||
        parseInt(columnaB) <= 0
    ) {
        document.getElementById("formError").innerText =
            "Las dimensiones deben ser mayores que 0.";
        return false;
    }

    if (filaA !== filaB || columnaA !== columnaB) {
        document.getElementById("formError").innerText =
            "Las dimensiones de las matrices A y B deben ser iguales.";
        return false;
    }

    return true;
}

const generarMatrices = () => {
    if (validarDimensiones()) {
        document.getElementById("formError").innerText = "";

        const span = document.querySelector(".formMatrices span");

        const rowsA = parseInt(document.getElementById("matAFila").value);
        const colsA = parseInt(document.getElementById("matAColumna").value);

        generarMatriz(rowsA, colsA, "matrizA");
        span.classList.add("mostrar");

        generarMatriz(rowsA, colsA, "matrizB");

        document.getElementById("btnCalcularSuma").disabled = false;
    }
};

function validarMatrices(rows, cols) {
    let esValido = true;
    const matrices = ["matrizA", "matrizB"];

    for (const matrixId of matrices) {
        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols; j++) {
                const input = document.getElementById(`${matrixId}${i}${j}`);
                const value = input.value.trim();
                if (value === "" || !/^-?\d+$/.test(value)) {
                    document.getElementById("formError").innerText =
                        `El campo en ${matrixId === "matrizA" ? "Matriz A" : "Matriz B"} [${i + 1}, ${j + 1}] no tiene que estar vacio y debe ser un número entero.`;
                    esValido = false;
                }
            }
        }
    }

    if (esValido) {
        document.getElementById("formError").innerText = "";
    }
    return esValido;
}
const calcularSuma = () => {
    const rowsA = parseInt(document.getElementById("matAFila").value);
    const colsA = parseInt(document.getElementById("matAColumna").value);

    if (validarMatrices(rowsA, colsA)) {
        let html = '<h3>Matriz Resultante (A + B)</h3><table>';
        for (let i = 0; i < rowsA; i++) {
            html += '<tr>';
            for (let j = 0; j < colsA; j++) {
                const valA = parseInt(document.getElementById(`matrizA${i}${j}`).value);
                const valB = parseInt(document.getElementById(`matrizB${i}${j}`).value);
                html += `<td><input type="number" readonly value="${valA + valB}"></td>`;
            }
            html += '</tr>';
        }
        html += '</table>';
        document.getElementById('formResultado').innerHTML = html;
        document.getElementById('formError').innerText = '';
    }
};

// // Asignar evento al botón de generar
document
    .getElementById("btnGenerarMatrices")
    .addEventListener("click", generarMatrices);

document
    .getElementById("btnCalcularSuma")
    .addEventListener("click", calcularSuma);