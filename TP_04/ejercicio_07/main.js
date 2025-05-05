// (7) Dado un array con notas numéricas de un estudiante, realizar las siguientes operaciones:
// a) Mostrar todas las notas usando el ciclo for.
// b) Calcular el promedio usando reduce.
// c) Crear un nuevo array con las notas aprobadas (mayores o iguales a 6) usando filter.
// d) Mostrar las notas multiplicadas por 10 con map (para simular escalado de puntajes).


let notas = [4,6,10,7,8,2,9,1,5];
for(let i = 0; i< notas.length; i++){
    console.log("nota de la materia nro ",i ," : ", notas[i])
}


function calcPromedio(arreglo, cantNotas=arreglo.length){
    let promedio=0;
    for(let i=0; i<cantNotas; i++){
        promedio += arreglo[i];

        console.log(promedio, arreglo[i]);
    }

    return promedio/cantNotas;
}




