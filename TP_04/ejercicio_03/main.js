// (3) Escriba un programa que cree un String que represente una grilla de 8 x 8, usando el carácter especial “ \n ” 
// para las nuevas líneas. En cada posición de la grilla puede haber un espacio en blanco “ “ o un numeral “#“. 
// Los caracteres deberían formar una tabla de ajedrez. Mostrar por consola: 
//    #  #  #  # 
//  #  #  #  # 
//    #  #  #  # 
//  #  #  #  # 
//    #  #  #  # 
//  #  #  #  # 
//    #  #  #  # 
//  #  #  #  #



function imprimirTablero() {
    let tablero = "";
    for (let i = 1; i <= 8; i++) {
        let linea = "";
        for (let j = 1; j <= 8; j++) {
            // Si (i + j) es par, ponemos un espacio; si es impar, ponemos un numeral
            linea += (i + j) % 2 === 0 ? " " : "#";
        }
        tablero += linea + "\n"; // Añadimos la línea al tablero con un salto de línea
    }
    console.log(tablero);
}

imprimirTablero();
