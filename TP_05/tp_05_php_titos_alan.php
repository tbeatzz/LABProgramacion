<?php

/**
 * Saluda a una persona por su nombre (Ejercicio 1).
 * @param string $nombre Nombre de la persona.
 * @return string Mensaje de saludo o error si el nombre está vacío.
 */
function saludar(string $nombre): string {    
    // Validar que el nombre tenga al menos 2 caracteres
    if (strlen($nombre) < 2) {
        return 'El nombre debe tener al menos 2 caracteres.';
    }
    
    // Validar que el nombre no contenga números
    if (preg_match('/[0-9]/', $nombre)) {
        return 'El nombre no puede contener números.';
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
            throw new InvalidArgumentException('El arreglo debe contener solo valores numéricos y sin espacios.');
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
 * add método getEstado() a la clase Alumno que devuelva un valor del enum EstadoAlumno basado en el promedio de notas.(Ejercicio 12).
 */
class Alumno extends Persona {
    private array $notas;
    private array $evaluaciones; // Para Ejercicio 16

    public function __construct(string $nombre, int $edad, array $notas = []) {
        parent::__construct($nombre, $edad);
        $this->setNotas($notas);
        $this->evaluaciones = []; //  para Ejercicio 16
    }

    public function calcularPromedio(): float {
        return empty($this->notas) ? 0.0 : array_sum($this->notas) / count($this->notas);
    }

    public function getNotas(): array {
        return $this->notas;
    }

    private function setNotas(array $notas): void {
        foreach ($notas as $nota) {
            if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
                throw new InvalidArgumentException('Las notas deben ser valores numéricos entre 0 y 10.');
            }
        }
        $this->notas = $notas;
    }

    // para Ejercicio 12
    public function getEstado(): EstadoAlumno {
        if (empty($this->notas)) {
            return EstadoAlumno::Ausente;
        }
        $promedio = $this->calcularPromedio();
        return $promedio >= 6 ? EstadoAlumno::Aprobado : EstadoAlumno::Desaprobado;
    }

    // para ejercicio 16

    /**
     * Agrega una evaluación al alumno.
     * @param Evaluacion $evaluacion Evaluación a agregar.
     */
    public function agregarEvaluacion(Evaluacion $evaluacion): void {
        $this->evaluaciones[] = $evaluacion;
        $this->notas[] = $evaluacion->getNota(); // Actualizar notas para mantener consistencia
    }

    /**
     * Devuelve la lista de evaluaciones.
     * @return array<int, Evaluacion> Lista de evaluaciones.
     */
    public function getEvaluaciones(): array {
        return $this->evaluaciones;
    }

    public function calcularPromedioPorMateria(string $materia): float {
        $notasMateria = array_filter($this->evaluaciones, function (Evaluacion $evaluacion) use ($materia) {
            return $evaluacion->getMateria() === $materia;
        });
        if (empty($notasMateria)) {
            return 0.0;
        }
        $suma = array_sum(array_map(function (Evaluacion $evaluacion) {
            return $evaluacion->getNota();
        }, $notasMateria));
        return $suma / count($notasMateria);
    }

    public function getEvaluacionesOrdenadasPorFecha(): array {
        $evaluaciones = $this->evaluaciones;
        usort($evaluaciones, function (Evaluacion $a, Evaluacion $b) {
            return $a->getFecha() <=> $b->getFecha();
        });
        return $evaluaciones;
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
 * Clase que representa un curso con una lista de alumnos (Ejercicio 9).
 */
class Curso {
    private string $nombre;
    private array $alumnos;

    /**
     * @param string $nombre Nombre del curso.
     * @param array<int, Alumno> $alumnos Lista inicial de alumnos (opcional).
     * @throws InvalidArgumentException Si el nombre está vacío.
     */
    public function __construct(string $nombre, array $alumnos = []) {
        if (empty($nombre)) {
            throw new InvalidArgumentException('El nombre del curso no puede estar vacío.');
        }
        $this->nombre = $nombre;
        $this->alumnos = [];
        foreach ($alumnos as $alumno) {
            $this->agregarAlumno($alumno);
        }
    }

    /**
     * Agrega un alumno al curso con validación de tipo (Ejercicio 10).
     * @param mixed $alumno Objeto a agregar.
     * @throws InvalidArgumentException Si el objeto no es una instancia de Alumno.
     */
    public function agregarAlumno($alumno): void {
        if (!($alumno instanceof Alumno)) {
            //solucion de nacho
            throw new InvalidArgumentException('El objeto debe ser una instancia de Alumno.');
        }
        $this->alumnos[] = $alumno;
    }

    /**
     * Calcula el promedio de notas de todos los alumnos del curso.
     * @return float Promedio general del curso, o 0 si no hay alumnos con notas.
     */
    public function calcularPromedio(): float {
        if (empty($this->alumnos)) {
            return 0;
        }
        $sumaPromedios = 0;
        $count = 0;
        foreach ($this->alumnos as $alumno) {
            $promedio = $alumno->calcularPromedio();
            if ($promedio > 0) { // Solo considera alumnos con notas
                $sumaPromedios += $promedio;
                $count++;
            }
        }
        return $count > 0 ? $sumaPromedios / $count : 0;
    }

    /**
     * Obtiene la lista de alumnos aprobados (promedio >= 6).
     * @return array<int, Alumno> Lista de alumnos aprobados.
     */
    public function getAlumnosAprobados(): array {
        return array_filter($this->alumnos, function ($alumno) {
            return $alumno->calcularPromedio() >= 6;
        });
    }

    /**
     * Obtiene la lista completa de alumnos.
     * @return array<int, Alumno> Lista de alumnos.
     */
    public function getAlumnos(): array {
        return $this->alumnos;
    }

    /**
     * Obtiene el nombre del curso.
     * @return string Nombre del curso.
     */
    public function getNombre(): string {
        return $this->nombre;
    }

   
}


/**
 * Enumerado para los estados posibles de un alumno (Ejercicio 11).
 */
enum EstadoAlumno: string {
    case Aprobado = 'Aprobado';
    case Desaprobado = 'Desaprobado';
    case Ausente = 'Ausente';
}

class RepositorioAlumnos {
    private array $alumnos;

    public function __construct() {
        $this->alumnos = [];
    }

    /**
     * Guarda o actualiza un alumno en el repositorio.
     * @param Alumno $alumno Alumno a guardar o actualizar.
     */
    public function guardar(Alumno $alumno): void {
        $this->alumnos[$alumno->getNombre()] = $alumno;
    }

    /**
     * Busca un alumno por nombre.
     * @param string $nombre Nombre del alumno.
     * @return Alumno|null El alumno encontrado o null si no existe.
     */
    public function buscarPorNombre(string $nombre): ?Alumno {
        return $this->alumnos[$nombre] ?? null;
    }

    /**
     * Devuelve la lista completa de alumnos.
     * @return array<string, Alumno> Lista de alumnos.
     */
    public function listar(): array {
        return $this->alumnos;
    }

    /**
     * Guarda los alumnos en un archivo JSON.
     * @param string $archivo Ruta del archivo JSON.
     * @throws RuntimeException Si no se puede escribir el archivo.
     */
    public function guardarEnJson(string $archivo): void {
        $datos = [];
        foreach ($this->alumnos as $alumno) {
            $datos[] = [
                'nombre' => $alumno->getNombre(),
                'edad' => $alumno->getEdad(),
                'notas' => $alumno->getNotas(),
                'evaluaciones' => array_map(function (Evaluacion $evaluacion) {
                    return [
                        'materia' => $evaluacion->getMateria(),
                        'nota' => $evaluacion->getNota(),
                        'fecha' => $evaluacion->getFecha()->format('Y-m-d'),
                    ];
                }, $alumno->getEvaluaciones()),
            ];
        }
        $json = json_encode($datos, JSON_PRETTY_PRINT);
        if (file_put_contents($archivo, $json) === false) {
            throw new RuntimeException("No se pudo guardar el archivo JSON: $archivo");
        }
    }

    /**
     * Carga alumnos desde un archivo JSON.
     * @param string $archivo Ruta del archivo JSON.
     * @throws RuntimeException Si no se puede leer el archivo o el JSON es inválido.
     */
    public function cargarDesdeJson(string $archivo): void {
        if (!file_exists($archivo)) {
            throw new RuntimeException("El archivo $archivo no existe.");
        }
        $json = file_get_contents($archivo);
        if ($json === false) {
            throw new RuntimeException("No se pudo leer el archivo $archivo.");
        }
        $datos = json_decode($json, true);
        if ($datos === null) {
            throw new RuntimeException("El formato del archivo JSON es inválido.");
        }
        $this->alumnos = [];
        foreach ($datos as $dato) {
            if (!isset($dato['nombre'], $dato['edad'], $dato['notas'])) {
                throw new RuntimeException("Datos incompletos en el archivo JSON.");
            }
            $alumno = new Alumno($dato['nombre'], $dato['edad'], $dato['notas']);
            if (!empty($dato['evaluaciones'])) {
                foreach ($dato['evaluaciones'] as $eval) {
                    if (!isset($eval['materia'], $eval['nota'], $eval['fecha'])) {
                        throw new RuntimeException("Datos de evaluación incompletos en el archivo JSON.");
                    }
                    $evaluacion = new Evaluacion($eval['materia'], $eval['nota'], $eval['fecha']);
                    $alumno->agregarEvaluacion($evaluacion);
                }
            }
            $this->guardar($alumno);
        }
    }
}

class Evaluacion {
    private string $materia;
    private float $nota;
    private DateTime $fecha;

    /**
     * @param string $materia Nombre de la materia.
     * @param float $nota Nota de la evaluación (0-10).
     * @param DateTime|string $fecha Fecha de la evaluación.
     * @throws InvalidArgumentException Si los datos son inválidos.
     */
    public function __construct(string $materia, float $nota, $fecha) {
        if (empty($materia)) {
            throw new InvalidArgumentException('La materia no puede estar vacía.');
        }
        if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
            throw new InvalidArgumentException('La nota debe ser un valor numérico entre 0 y 10.');
        }
        if (is_string($fecha)) {
            try {
                $fecha = new DateTime($fecha);
            } catch (Exception $e) {
                throw new InvalidArgumentException('La fecha debe tener un formato válido (YYYY-MM-DD).');
            }
        }
        $this->materia = $materia;
        $this->nota = $nota;
        $this->fecha = $fecha;
    }

    public function getMateria(): string {
        return $this->materia;
    }

    public function getNota(): float {
        return $this->nota;
    }

    public function getFecha(): DateTime {
        return $this->fecha;
    }
}

class ReporteMateria {
    private string $materia;
    private array $alumnos;
    private RepositorioAlumnos $repositorio;

    public function __construct(string $materia, RepositorioAlumnos $repositorio) {
        $this->materia = $materia;
        $this->repositorio = $repositorio;
        $this->alumnos = $this->obtenerAlumnosConEvaluaciones();
    }

    private function obtenerAlumnosConEvaluaciones(): array {
        $alumnos = [];
        foreach ($this->repositorio->listar() as $alumno) {
            $evaluaciones = array_filter($alumno->getEvaluaciones(), function (Evaluacion $evaluacion) {
                return $evaluacion->getMateria() === $this->materia;
            });
            if (!empty($evaluaciones)) {
                $alumnos[] = $alumno;
            }
        }
        return $alumnos;
    }

    public function calcularPromedio(): float {
        if (empty($this->alumnos)) {
            return 0.0;
        }
        $suma = 0.0;
        $totalNotas = 0;
        foreach ($this->alumnos as $alumno) {
            $evaluaciones = array_filter($alumno->getEvaluaciones(), function (Evaluacion $evaluacion) {
                return $evaluacion->getMateria() === $this->materia;
            });
            foreach ($evaluaciones as $evaluacion) {
                $suma += $evaluacion->getNota();
                $totalNotas++;
            }
        }
        return $totalNotas > 0 ? $suma / $totalNotas : 0.0;
    }

    public function generarReporte(): array {
        $aprobados = [];
        $desaprobados = [];
        $sinEvaluaciones = [];

        foreach ($this->repositorio->listar() as $alumno) {
            $promedioMateria = $alumno->calcularPromedioPorMateria($this->materia);
            if ($promedioMateria == 0.0) {
                $sinEvaluaciones[] = $alumno;
            } elseif ($promedioMateria >= 6.0) {
                $aprobados[] = $alumno;
            } else {
                $desaprobados[] = $alumno;
            }
        }

        return [
            'cantidadAlumnos' => count($this->alumnos),
            'promedio' => $this->calcularPromedio(),
            'aprobados' => $aprobados,
            'desaprobados' => $desaprobados,
            'sinEvaluaciones' => $sinEvaluaciones,
        ];
    }

    public function exportarReporte(string $archivo): void {
        $reporte = $this->generarReporte();
        $contenido = "Reporte de la materia: {$this->materia}\n";
        date_default_timezone_set('America/Argentina/Rio_Gallegos');
        $contenido .= "Fecha: " . date('Y-m-d H:i:s') . "\n\n";
        $contenido .= "Cantidad de alumnos: {$reporte['cantidadAlumnos']}\n";
        $contenido .= "Promedio general: " . ($reporte['promedio'] > 0 ? number_format($reporte['promedio'], 2) : 'No hay notas') . "\n\n";
        $contenido .= "Alumnos aprobados:\n";
        if (empty($reporte['aprobados'])) {
            $contenido .= "- Ninguno\n";
        } else {
            foreach ($reporte['aprobados'] as $alumno) {
                $contenido .= "- {$alumno->getNombre()} (Promedio: " . number_format($alumno->calcularPromedioPorMateria($this->materia), 2) . ")\n";
            }
        }
        $contenido .= "\nAlumnos desaprobados:\n";
        if (empty($reporte['desaprobados'])) {
            $contenido .= "- Ninguno\n";
        } else {
            foreach ($reporte['desaprobados'] as $alumno) {
                $contenido .= "- {$alumno->getNombre()} (Promedio: " . number_format($alumno->calcularPromedioPorMateria($this->materia), 2) . ")\n";
            }
        }
        $contenido .= "\nAlumnos sin evaluaciones:\n";
        if (empty($reporte['sinEvaluaciones'])) {
            $contenido .= "- Ninguno\n";
        } else {
            foreach ($reporte['sinEvaluaciones'] as $alumno) {
                $contenido .= "- {$alumno->getNombre()}\n";
            }
        }

        if (file_put_contents($archivo, $contenido) === false) {
            throw new RuntimeException("No se pudo exportar el reporte a $archivo.");
        }
    }
}

?>