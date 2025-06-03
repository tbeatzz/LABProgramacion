<?php

/**
 * Saluda a una persona por su nombre (Ejercicio 1).
 * @param string $nombre Nombre de la persona.
 * @return string Mensaje de saludo o error si el nombre está vacío.
 */
function saludar(string $nombre): string {
    if (empty($nombre)) {
        return 'Debe ingresar un nombre.';
    }
    return "Hola, {$nombre}!";
}

/**
 * Verifica si un número es par (Ejercicio 2).
 * @param int $numero Número a evaluar.
 * @return bool Verdadero si el número es par, falso en caso contrario.
 */
function esPar(int $numero): bool {
    return $numero % 2 === 0;
}

/**
 * Encuentra el mayor de tres números (Ejercicio 3).
 * @param float $a Primer número.
 * @param float $b Segundo número.
 * @param float $c Tercer número.
 * @return float El mayor de los tres números.
 */
function mayorDeTres(float $a, float $b, float $c): float {
    return max($a, $b, $c);
}

/**
 * Filtra los números pares de un arreglo (Ejercicio 4).
 * @param array<int, int> $array Arreglo de números enteros.
 * @return array<int, int> Arreglo con solo los números pares.
 */
function filtrarPares(array $array): array {
    return array_filter($array, 'esPar');
}

/**
 * Calcula el promedio de un arreglo de números (Ejercicio 5).
 * @param array<int, float> $array Arreglo de números.
 * @return float Promedio del arreglo, o 0 si está vacío.
 * @throws InvalidArgumentException Si el arreglo contiene valores no numéricos.
 */
function promedio(array $array): float {
    if (empty($array)) {
        return 0.0;
    }
    foreach ($array as $valor) {
        if (!is_numeric($valor)) {
            throw new InvalidArgumentException('El arreglo debe contener solo valores numéricos.');
        }
    }
    return array_sum($array) / count($array);
}

/**
 * Clase que representa a una persona con nombre y edad (Ejercicio 6).
 */
class Persona {
    protected string $nombre;
    protected int $edad;
    
    /**
     * @param string $nombre Nombre de la persona.
     * @param int $edad Edad de la persona (debe ser no negativa).
     * @throws InvalidArgumentException Si la edad es negativa o el nombre está vacío.
     */
    public function __construct(string $nombre, int $edad) {
        if (empty($nombre)) {
            throw new InvalidArgumentException('El nombre no puede estar vacío.');
        }
        if ($edad < 0) {
            throw new InvalidArgumentException('La edad no puede ser negativa.');
        }
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    /**
     * Presenta a la persona mostrando su nombre y edad.
     * @return string Mensaje de presentación.
     */
    public function presentarse(): string {
        return "Hola, soy {$this->nombre} y tengo {$this->edad} años.";
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEdad(): int {
        return $this->edad;
    }
}

/**
 * Clase que representa a un alumno, hereda de Persona (Ejercicio 7).
 */
class Alumno extends Persona {
    private array $notas;
    private array $evaluaciones;

    public function __construct(string $nombre, int $edad, array $notas = [], array $evaluaciones = []) {
        parent::__construct($nombre, $edad);
        $this->setNotas($notas);
        $this->evaluaciones = $evaluaciones;
    }
    /**
     * Calcula el promedio de las notas del alumno 
     * @return float Promedio de las notas, o 0 si no hay notas.
     */
    public function calcularPromedio(): float {
        return promedio($this->notas);
    }

}

/**
 * Agrupa personas por categorías de edad (Ejercicio 8).
 * @param array<int, Persona> $personas Lista de personas.
 * @return array<string, array<int, Persona>> Grupos de personas por categoría.
 */
function agruparPorEdad(array $personas): array {
    $grupos = [
        'niños' => [],
        'adolescentes' => [],
        'adultos' => []
    ];
    
    foreach ($personas as $persona) {
        $edad = $persona->getEdad();
        if ($edad < 13) {
            $grupos['niños'][] = $persona;
        } elseif ($edad >= 13 && $edad <= 17) {
            $grupos['adolescentes'][] = $persona;
        } else {
            $grupos['adultos'][] = $persona;
        }
    }
    
    return $grupos;
}



/**
 * Enumerado para los estados posibles de un alumno (Ejercicio 11).
 */
enum EstadoAlumno: string {
    case Aprobado = 'Aprobado';
    case Desaprobado = 'Desaprobado';
    case Ausente = 'Ausente';
}

?>