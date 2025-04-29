// (2) Imprimir por consola los números del 1 al 100, con las siguientes excepciones: 
// a) “Fizz” cuando el número es divisible por 3, pero no por 5. 
// b) “Buzz” cuando el número es divisible por 5, pero no por 3. 
// c) “FizzBuzz” cuando es divisible por 3 y también por 5

function imprimirNumeros() {
    for (let i = 1; i <= 100; i++) {
        if (i % 3 === 0 && i % 5 ===0) console.log("FizzBuzz");
        else if (i % 3 === 0) console.log("Fizz");
        else if (i % 5 === 0) console.log("Buzz");
        else console.log(i);
    }
    
}




imprimirNumeros();

// //version optimizada 
// function imprimirNumerosOptimizado() {
//     for (let i = 1; i <= 100; i++) {
//         let salida = "";
//         if (i % 3 === 0) salida += "Fizz";
//         if (i % 5 === 0) salida += "Buzz";
//         console.log(salida || i);
//     }
// }