// (5) Escriba una función (sum) que reciba como argumento un arreglo de números enteros (generado por range) 
// y retorne la suma de esos números



function range(inicio, fin){
    let arreglo = [];
    if(inicio < fin){
        for(let i=inicio; i<=fin; i++){
            arreglo.push(i);
        }
        return arreglo;
    }else {
        console.log("error: fin es > que inicio");
    }
}


function sum(arreglo) {
    let suma = 0;

    for(let i = 0; i < arreglo.length; i++) {
        console.log("num a sumar = ", arreglo[i]);
        suma += arreglo[i];
    }
    
    return suma;
}


let numeros = range(1, 5); // [1, 2, 3, 4, 5]
console.log( "suma de valores del arreglo: ", sum(numeros)); // 15