// (7) Dado un array con notas numéricas de un estudiante, realizar las siguientes operaciones:
// a) Mostrar todas las notas usando el ciclo for.
// b) Calcular el promedio usando reduce.
// c) Crear un nuevo array con las notas aprobadas (mayores o iguales a 6) usando filter.
// d) Mostrar las notas multiplicadas por 10 con map (para simular escalado de puntajes).


let notas = [4, 6, 10, 7, 8, 2, 9, 1, 5];

// a) Mostrar todas las notas usando el ciclo for.
for (let i = 0; i < notas.length; i++) {
    console.log("Nota de la materia nro", i, ":", notas[i]);
}

// b) Calcular el promedio usando reduce.
let promedio = notas.reduce((acum, nota) => acum + nota, 0) / notas.length;
console.log("Promedio:", promedio);

// c) Crear un nuevo array con las notas aprobadas (mayores o iguales a 6).
let notasAprobadas = notas.filter(nota => nota >= 6);
console.log("Notas aprobadas:", notasAprobadas);

// d) Mostrar las notas multiplicadas por 10 con map.
let notasEscaladas = notas.map(nota => nota * 10);
console.log("Notas escaladas:", notasEscaladas);
