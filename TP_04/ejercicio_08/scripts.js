// (8) Dado un array de objetos que simulan productos en una tienda (nombre y precio): 
// a) Iterar con for of para mostrar todos los productos con nombre y precio. 
// b) Encontrar el producto más caro usando reduce. 
// c) Crear un nuevo array solo con los nombres de los productos usando map.


const productos = [
    { nombre: "notebook", precio: 1200 },
    { nombre: "telefono", precio: 800 },
    { nombre: "ipad", precio: 300 },
    { nombre: "auriculares", precio: 150 },
    { nombre: "monitor", precio: 400 }
];

// a) Iterar con for of
console.log("Lista de productos:");
for (const producto of productos) {
    console.log(`Nombre: ${producto.nombre}, Precio: $${producto.precio}`);
}

// b) Encontrar el producto más caro con reduce
const productoMasCaro = productos.reduce((masCaro, producto) => { // masCaro, el acumulador

    return producto.precio > masCaro.precio ? producto : masCaro;
}, productos[0]);

console.log("Producto más caro:", productoMasCaro); // Compara el precio del producto actual con el del acumulador. Si el actual es mayor, devuelve el producto actual; si no, mantiene el acumulador.

// c) Crear un array con los nombres usando map
const nombresProductos = productos.map(producto => producto.nombre);

console.log("Nombres de los productos:", nombresProductos);