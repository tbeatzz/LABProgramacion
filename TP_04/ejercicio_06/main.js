// (6) Modifique la función range para que tome un tercer parámetro opcional, el cual indique el valor de
// incremento que debe ser usado para construir el arreglo. Si no se especifica el incremento, entonces, este
// será de 1 o -1, según inicio sea menor que fin, o mayor que fin respectivamente. Ejemplos:
// a) La función range(1,10,2) debería retornar [1,3,5,7,9].
// b) La función range(5,1,-2) retornaría [5,3,1].
// c) La función range(10,8) retornaría [10,9,8].
// d) La función range(7,9) retornaría [7,8,9].


function range(inicio, fin, _incremento = 1) {
    let arreglo = [];

    if(fin == inicio || inicio == fin){
        console.log("error: inicio y fin son iguales");
    }

    if(inicio > fin && _incremento ==1){
        _incremento = -_incremento; 
    }

    // if para cuando incremento es 0
    

    
    if (inicio < fin) {
        for (let i = inicio; i <= fin; i += _incremento) {
            arreglo.push(i);
        }
    } else if (inicio > fin) {
        for (let i = inicio; i >= fin; i += _incremento) {
            arreglo.push(i);
        }
    }
    
    return arreglo;
}


// pruebas


// a) La función range(1,10,2) debería retornar [1,3,5,7,9].
// b) La función range(5,1,-2) retornaría [5,3,1].
// c) La función range(10,8) retornaría [10,9,8].
// d) La función range(7,9) retornaría [7,8,9].

let prueba1 = range(1,10,2)
console.log("A)",prueba1)
let prueba2 = range(5,1,-2)
console.log("B)", prueba2)
let prueba3 = range(10,8)
console.log("C)",prueba3)
let prueba4 = range(7,9)
console.log("D)",prueba4)

