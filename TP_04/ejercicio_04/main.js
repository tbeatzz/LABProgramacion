// (4) Escriba una función (range) que reciba dos argumentos, inicio y fin, y retorne un arreglo conteniendo todos 
// los números enteros desde inicio hasta fin.


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


let numeros = range(7, 10);

console.log(numeros);