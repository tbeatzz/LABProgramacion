// (9) Dado un array con objetos que representan tareas pendientes (descripción, completada <valor booleano>). 
// a) Usar un forEach para imprimir cada tarea con su estado. 
// b) Obtener un array nuevo solo con las tareas sin completar. 
// c) Verificar si todas las tareas están completadas (every). 
// d) Verificar si hay alguna sin completar (some). 
// e) Contar cuantas tareas fueron completadas

// Array de tareas
const tareas = [
    { descripcion: "ir a comprar", completada: true },
    { descripcion: "estudiar para LAB de programacion", completada: false },
    { descripcion: "terminar header pag. barberia", completada: true },
    { descripcion: "ir al gimnasio", completada: false },
];

// a) Imprimir cada tarea con su estado usando forEach
console.log("Lista de tareas:");
tareas.forEach(tarea => {
    console.log(`Tarea: ${tarea.descripcion}, Estado: ${tarea.completada ? "Completada" : "Pendiente"}`);
});

// b) Obtener tareas sin completar con filter
const tareasPendientes = tareas.filter(tarea => !tarea.completada);
console.log("Tareas pendientes:", tareasPendientes);

// c) Verificar si todas las tareas están completadas con every
const todasCompletadas = tareas.every(tarea => tarea.completada);
console.log("¿Todas las tareas están completadas?", todasCompletadas);

// d) Verificar si hay alguna tarea sin completar con some
const algunaPendiente = tareas.some(tarea => !tarea.completada);
console.log("¿Hay alguna tarea sin completar?", algunaPendiente);

// e) Contar tareas completadas
const tareasCompletadas = tareas.filter(tarea => tarea.completada).length;
console.log("Número de tareas completadas:", tareasCompletadas);