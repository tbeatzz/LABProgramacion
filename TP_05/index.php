<?php
// Incluir el archivo con las funciones y clases
require_once 'tp_05_php_titos_alan.php';

// Variable para almacenar un objeto Alumno (para ejercicios 6 y 7)
session_start(); 
$alumno = null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Probador funciones</title>

    <link rel="stylesheet" type='text/css' href="./css/style.css">

    <script src="./js/scripts.js" defer type="text/javascript"></script>
</head>
<body>
    
    <header>
       <div class="headerContainer">
            <div class="headerTitle">
                <h1>Trabajo practico 05 - php</h1>
            </div>
            <nav class="headerNav">
                <ul class="navUl" id="enlaces">
                    <li class="navLi"><a href="#ejercicio1">Pto. 1</a></li>
                    <li class="navLi"><a href="#ejercicio2">Pto. 2</a></li>
                    <li class="navLi"><a href="#ejercicio3">Pto. 3</a></li>
                    <li class="navLi"><a href="#ejercicio4">Pto. 4</a></li>
                    <li class="navLi"><a href="#ejercicio5">Pto. 5</a></li>
                    <li class="navLi"><a href="#ejercicio6y7">Pto. 6 y 7</a></li>
   
                    <li class="navLi"><a href="#ejercicio8">Pto. 8</a></li>
                    <li class="navLi"><a href="#ejercicio9">Pto. 9</a></li>
                    <li class="navLi"><a href="#ejercicio10">Pto. 10</a></li>
                    <li class="navLi"><a href="#ejercicio11y12">Pto. 11 y 12</a></li>
                    <li class="navLi"><a href="#ejercicioFinal">Pto. 13-20</a></li>

                </ul>
            </nav>

            <div class="hamburguer" id="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
       </div>
    </header>

    <main>
        <!-- Ejercicio 1 -->
        <section id="ejercicio1">
            <div class="ejercicioTitle">
                <h1>Ejercicio 1 - Saludo personalizado</h1>
                <p>Crear una función saludar($nombre) que imprima por pantalla un saludo con el nombre recibido.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio1" method="post">
                    <div class="formInput">
                        <label for="nombre">Ingresa tu nombre</label>
                        <input type="text" name="nombre" id="nombre" required placeholder="Ingresa tu nombre">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="saludar" value="Saludar">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['saludar']) && !empty($_POST['nombre'])) {
                        $nombre = htmlspecialchars($_POST['nombre']);
                        $_SESSION['ejercicio1']['nombre'] = $nombre;
                        echo "<p>" . saludar($nombre) . "</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 2 -->
        <section id="ejercicio2">
            <div class="ejercicioTitle">
                <h1>Ejercicio 2 - Verificar si es par</h1>
                <p>Crear una función esPar($numero) que retorne true si el número es par, o false en caso contrario.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio2" method="post">
                    <div class="formInput">
                        <label for="numero">Ingresa un número</label>
                        <input type="number" name="numero" id="numero" required placeholder="Ingresa un numero">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="verificarPar" value="Verificar">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['verificarPar']) && !empty($_POST['numero'])) {
                        $numero = (int)$_POST['numero'];
                        $esPar = esPar($numero);
                        $_SESSION['ejercicio2']['numero'] = $numero;
                        $_SESSION['ejercicio2']['esPar'] = $esPar ? 'Par' : 'Impar';
                        $resultado = $esPar ? "El número $numero es par." : "El número $numero es impar.";
                        echo "<p>$resultado</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 3 -->
        <section id="ejercicio3">
            <div class="ejercicioTitle">
                <h1>Ejercicio 3 - Mayor de tres números</h1>
                <p>Crear una función mayorDeTres($a, $b, $c) que devuelva el mayor de los tres</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio3" method="post">
                    <div class="formInput">
                        <label for="num1">Número 1</label>
                        <input type="number" name="num1" id="num1" required placeholder="Ingresa el primer numero">
                    </div>
                    <div class="formInput">
                        <label for="num2">Número 2</label>
                        <input type="number" name="num2" id="num2" required placeholder="Ingresa el segundo numero">
                    </div>
                    <div class="formInput">
                        <label for="num3">Número 3</label>
                        <input type="number" name="num3" id="num3" required placeholder="Ingresa el tercer numero">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="mayorDeTres" value="Encontrar Mayor">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['mayorDeTres']) && !empty($_POST['num1']) && !empty($_POST['num2']) && !empty($_POST['num3'])) {
                        $num1 = (float)$_POST['num1'];
                        $num2 = (float)$_POST['num2'];
                        $num3 = (float)$_POST['num3'];
                        $mayor = mayorDeTres($num1, $num2, $num3);
                        $_SESSION['ejercicio3']['numeros'] = "$num1, $num2, $num3";
                        $_SESSION['ejercicio3']['mayor'] = $mayor;
                        echo "<p>El mayor de los números $num1, $num2 y $num3 es: $mayor</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 4 -->
        <section id="ejercicio4">
            <div class="ejercicioTitle">
                <h1>Ejercicio 4 - Filtrar pares de un arreglo</h1>
                <p>Crear una función que reciba un arreglo de números y devuelva solo los pares.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio4" method="post">
                    <div class="formInput">
                        <label for="numeros">Números (separados por comas)</label>
                        <input type="text" id="numeros" name="numeros" placeholder="1,2,3,4" required>
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="filtrarPares" value="Filtrar">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['filtrarPares']) && !empty($_POST['numeros'])) {
                        $numeros = array_map('intval', explode(',', $_POST['numeros']));
                        $pares = filtrarPares($numeros);
                        $_SESSION['ejercicio4']['numeros'] = implode(', ', $numeros);
                        $_SESSION['ejercicio4']['pares'] = empty($pares) ? 'Ninguno' : implode(', ', $pares);
                        echo "<p>Números pares: " . (empty($pares) ? "Ninguno" : implode(', ', $pares)) . "</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 5 -->
        <section id="ejercicio5">
            <div class="ejercicioTitle">
                <h1>Ejercicio 5 - Promedio de un arreglo</h1>
                <p>Crear una función que calcule y devuelva el promedio de un arreglo de números.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio5" method="post">
                    <div class="formInput">
                        <label for="promedioNumeros">Números (separados por comas)</label>
                        <input type="text" id="promedioNumeros" name="promedioNumeros" placeholder="7,8,9" required>
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="calcularPromedio" value="Calcular promedio">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['calcularPromedio']) && !empty($_POST['promedioNumeros'])) {
                        try {
                            $numeros = array_map('floatval', explode(',', $_POST['promedioNumeros']));
                            $promedio = promedio($numeros);
                            $_SESSION['ejercicio5']['numeros'] = implode(', ', $numeros);
                            $_SESSION['ejercicio5']['promedio'] = number_format($promedio, 2);
                            echo "<p>El promedio es: " . number_format($promedio, 2) . "</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 6 y 7 -->
        <section id="ejercicio6y7">
            <div class="ejercicioTitle">
                <h1>Ejercicio 6 y 7 - Clase Persona y Alumno</h1>
                <p>Crear una clase Persona con propiedades nombre y edad. Incluir un método presentarse() que imprima los datos de la persona.</p>
                <p>Crear una clase Alumno que herede de Persona. Agregar una lista de notas y un método calcularPromedio() que devuelva el promedio de notas.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio6y7" method="post">
                    <div class="formInput">
                        <label for="nombreAlumno">Nombre</label>
                        <input type="text" id="nombreAlumno" name="nombreAlumno" value="<?= isset($_POST['nombreAlumno']) ? htmlspecialchars($_POST['nombreAlumno']) : '' ?>" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="formInput">
                        <label for="edadAlumno">Edad</label>
                        <input type="number" id="edadAlumno" name="edadAlumno" value="<?= isset($_POST['edadAlumno']) ? (int)$_POST['edadAlumno'] : '' ?>" placeholder="Ingrese una edad" required>
                    </div>
                    <div class="formInput">
                        <label for="notasAlumno">Notas (separadas por comas):</label>
                        <input type="text" id="notasAlumno" name="notasAlumno" value="<?= isset($_POST['notasAlumno']) ? htmlspecialchars($_POST['notasAlumno']) : '' ?>" placeholder="Ej: 7,8,9">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="crearAlumno" value="Crear Alumno">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="presentarAlumno" value="Presentarse" <?= isset($_SESSION['alumno']) ? '' : 'disabled' ?>>
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="promedioNotas" value="Promedio de notas" <?= isset($_SESSION['alumno']) ? '' : 'disabled' ?>>
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['crearAlumno']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['nombreAlumno']);
                            $edad = (int)$_POST['edadAlumno'];
                            $notas = !empty($_POST['notasAlumno']) ? array_map('floatval', explode(',', $_POST['notasAlumno'])) : [];
                            $alumno = new Alumno($nombre, $edad, $notas);
                            $_SESSION['alumno'] = serialize($alumno);
                            echo "<p>Alumno creado: $nombre, $edad años.</p>";
                            echo "<p>Notas: " . (empty($notas) ? "Ninguna" : implode(', ', $notas)) . "</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    if (isset($_POST['presentarAlumno']) && isset($_SESSION['alumno'])) {
                        $alumno = unserialize($_SESSION['alumno']);
                        echo "<p>" . $alumno->presentarse() . "</p>";
                    }
                    if (isset($_POST['promedioNotas']) && isset($_SESSION['alumno'])) {
                        $alumno = unserialize($_SESSION['alumno']);
                        $promedio = $alumno->calcularPromedio();
                        echo "<p>Promedio de notas: " . ($promedio > 0 ? number_format($promedio, 2) : "No hay notas") . "</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 8 -->
        <section id="ejercicio8">
            <div class="ejercicioTitle">
                <h1>Ejercicio 8 - Agrupar personas por edad</h1>
                <p>Crear una función que agrupe personas en tres categorías: niños (<13), adolescentes (13-17) y adultos (18+).</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio8" method="post">
                    <div class="formInput">
                        <label for="nombrePersona">Nombre</label>
                        <input type="text" id="nombrePersona" name="nombrePersona" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="formInput">
                        <label for="edadPersona">Edad</label>
                        <input type="number" id="edadPersona" name="edadPersona" placeholder="Ingrese una edad" required>
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="agregarPersona" value="Agregar Persona">
                    </div>
                </form>
                <form action="index.php#ejercicio8" method="post">
                    <div class="formBtn">
                        <input type="submit" name="agruparPorEdad" value="Agrupar por Edad">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (!isset($_SESSION['personas'])) {
                        $_SESSION['personas'] = [];
                    }
                    if (isset($_POST['agregarPersona']) && !empty($_POST['nombrePersona']) && !empty($_POST['edadPersona'])) {
                        try {
                            $persona = new Persona($_POST['nombrePersona'], (int)$_POST['edadPersona']);
                            $_SESSION['personas'][] = $persona;
                            echo "<p>Persona {$persona->getNombre()} agregada correctamente.</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    if (isset($_POST['agruparPorEdad'])) {
                        if (empty($_SESSION['personas'])) {
                            echo "<p>No hay personas para agrupar.</p>";
                        } else {
                            $grupos = agruparPorEdad($_SESSION['personas']);
                            echo "<p>Niños:</p><ul>";
                            echo empty($grupos['niños']) ? "<li>Ninguno</li>" : "";
                            foreach ($grupos['niños'] as $persona) {
                                echo "<li>{$persona->getNombre()} ({$persona->getEdad()} años)</li>";
                            }
                            echo "</ul>";
                            echo "<p>Adolescentes:</p><ul>";
                            echo empty($grupos['adolescentes']) ? "<li>Ninguno</li>" : "";
                            foreach ($grupos['adolescentes'] as $persona) {
                                echo "<li>{$persona->getNombre()} ({$persona->getEdad()} años)</li>";
                            }
                            echo "</ul>";
                            echo "<p>Adultos:</p><ul>";
                            echo empty($grupos['adultos']) ? "<li>Ninguno</li>" : "";
                            foreach ($grupos['adultos'] as $persona) {
                                echo "<li>{$persona->getNombre()} ({$persona->getEdad()} años)</li>";
                            }
                            echo "</ul>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 9 -->
        <section id="ejercicio9">
            <div class="ejercicioTitle">
                <h1>Ejercicio 9 - Clase Curso</h1>
                <p>Crear una clase Curso con una lista de alumnos y métodos para agregar alumnos, calcular promedio del curso, y obtener lista de alumnos aprobados (promedio >= 6).</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio9" method="post">
                    <div class="formInput">
                        <label for="nombreCurso">Nombre del Curso</label>
                        <input type="text" id="nombreCurso" name="nombreCurso" placeholder="Ingrese el nombre del curso" required>
                    </div>
                    <div class="formInput">
                        <label for="nombreAlumno">Nombre del Alumno</label>
                        <input type="text" id="nombreAlumno" name="nombreAlumno" placeholder="Ingrese el nombre del alumno" required>
                    </div>
                    <div class="formInput">
                        <label for="edadAlumno">Edad</label>
                        <input type="number" id="edadAlumno" name="edadAlumno" placeholder="Ingrese una edad" required>
                    </div>
                    <div class="formInput">
                        <label for="notaAlumno">Nota</label>
                        <input type="number" id="notaAlumno" name="notaAlumno" step="0.1" min="0" max="10" placeholder="Ej: 8.5">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="agregarAlumnoCurso" value="Agregar Alumno">
                    </div>
                </form>
                <form action="index.php#ejercicio9" method="post">
                    <div class="formInput">
                        <label for="nombreCursoAccion">Nombre del Curso</label>
                        <input type="text" id="nombreCursoAccion" name="nombreCurso" placeholder="Ingrese el nombre del curso" required>
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="calcularPromedioCurso" value="Calcular Promedio del Curso">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="listarAprobados" value="Listar Alumnos Aprobados">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['agregarAlumnoCurso']) && !empty($_POST['nombreCurso']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno'])) {
                        try {
                            if (!isset($_SESSION['cursos'][$_POST['nombreCurso']])) {
                                $_SESSION['cursos'][$_POST['nombreCurso']] = new Curso($_POST['nombreCurso']);
                            }
                            $notas = !empty($_POST['notaAlumno']) ? array_map('floatval', explode(',', $_POST['notaAlumno'])) : [];
                            $alumno = new Alumno($_POST['nombreAlumno'], (int)$_POST['edadAlumno'], $notas);
                            $_SESSION['cursos'][$_POST['nombreCurso']]->agregarAlumno($alumno);
                            echo "<p>Alumno {$alumno->getNombre()} agregado al curso {$_POST['nombreCurso']}.</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    if (isset($_POST['calcularPromedioCurso']) && !empty($_POST['nombreCurso'])) {
                        $curso = $_SESSION['cursos'][$_POST['nombreCurso']] ?? null;
                        if ($curso) {
                            $promedio = $curso->calcularPromedio();
                            echo "<p>Promedio del curso {$_POST['nombreCurso']}: " . ($promedio > 0 ? number_format($promedio, 2) : "No hay alumnos con notas") . "</p>";
                        } else {
                            echo "<p>Error: El curso no existe.</p>";
                        }
                    }
                    if (isset($_POST['listarAprobados']) && !empty($_POST['nombreCurso'])) {
                        $curso = $_SESSION['cursos'][$_POST['nombreCurso']] ?? null;
                        if ($curso) {
                            $aprobados = $curso->getAlumnosAprobados();
                            echo "<p>Alumnos aprobados en {$_POST['nombreCurso']}:</p><ul>";
                            if (empty($aprobados)) {
                                echo "<li>Ninguno</li>";
                            } else {
                                foreach ($aprobados as $alumno) {
                                    echo "<li>{$alumno->getNombre()} (Promedio: " . number_format($alumno->calcularPromedio(), 2) . ")</li>";
                                }
                            }
                            echo "</ul>";
                        } else {
                            echo "<p>Error: El curso no existe.</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 10 -->
        <section id="ejercicio10">
            <div class="ejercicioTitle">
                <h1>Ejercicio 10 - Validación de tipo con excepciones</h1>
                <p>Modificar el método de agregar alumno para que lance una excepción si el objeto no es instancia de Alumno.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio10" method="post">
                    <div class="formInput">
                        <label for="nombreCurso">Nombre del Curso</label>
                        <input type="text" id="nombreCurso" name="nombreCurso" placeholder="Ingrese el nombre del curso" required>
                    </div>
                    <div class="formInput">
                        <label for="objeto">Tipo de Objeto</label>
                        <select id="objeto" name="objeto" required>
                            <option value="alumno">Alumno</option>
                            <option value="otro">Otro (stdClass)</option>
                        </select>
                    </div>
                    <div class="formInput">
                        <label for="nombreAlumno">Nombre del Alumno</label>
                        <input type="text" id="nombreAlumno" name="nombreAlumno" placeholder="Ingrese el nombre del alumno">
                    </div>
                    <div class="formInput">
                        <label for="edadAlumno">Edad</label>
                        <input type="number" id="edadAlumno" name="edadAlumno" placeholder="Ingrese una edad">
                    </div>
                    <div class="formInput">
                        <label for="notaAlumno">Nota</label>
                        <input type="number" id="notaAlumno" name="notaAlumno" step="0.1" min="0" max="10" placeholder="Ej: 8.5">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="agregarObjeto" value="Agregar Objeto">
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['agregarObjeto']) && !empty($_POST['nombreCurso']) && !empty($_POST['objeto'])) {
                        try {
                            if (!isset($_SESSION['cursos'][$_POST['nombreCurso']])) {
                                $_SESSION['cursos'][$_POST['nombreCurso']] = new Curso($_POST['nombreCurso']);
                            }
                            if ($_POST['objeto'] === 'alumno') {
                                if (empty($_POST['nombreAlumno']) || empty($_POST['edadAlumno'])) {
                                    throw new InvalidArgumentException('El nombre y la edad son requeridos para crear un Alumno.');
                                }
                                $nombre = htmlspecialchars($_POST['nombreAlumno']);
                                $edad = (int)$_POST['edadAlumno'];
                                $notas = !empty($_POST['notaAlumno']) ? array_map('floatval', explode(',', $_POST['notaAlumno'])) : [];
                                $objeto = new Alumno($nombre, $edad, $notas);
                                $_SESSION['ejercicio10']['objeto'] = "Alumno: $nombre";
                            } else {
                                $objeto = new stdClass();
                                $_SESSION['ejercicio10']['objeto'] = "stdClass";
                            }
                            $_SESSION['ejercicio10']['curso'] = $_POST['nombreCurso'];
                            $_SESSION['cursos'][$_POST['nombreCurso']]->agregarAlumno($objeto);
                            echo "<p>Objeto agregado correctamente al curso {$_POST['nombreCurso']}.</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Ejercicio 11 y 12 -->
        <section id="ejercicio11y12">
            <div class="ejercicioTitle">
                <h1>Ejercicio 12 - Devolver estado del alumno</h1>
                <p>Crear un enum con los valores: Aprobado, Desaprobado, Ausente.</p>
                <p>Modificar la clase Alumno para que devuelva un estado según su promedio: Promedio >= 6: Aprobado, Promedio < 6: Desaprobado, Sin notas: Ausente.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio11y12" method="post">
                    <div class="formInput">
                        <label for="nombreAlumno">Nombre</label>
                        <input type="text" id="nombreAlumno" name="nombreAlumno" value="<?= isset($_POST['nombreAlumno']) ? htmlspecialchars($_POST['nombreAlumno']) : '' ?>" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="formInput">
                        <label for="edadAlumno">Edad</label>
                        <input type="number" id="edadAlumno" name="edadAlumno" value="<?= isset($_POST['edadAlumno']) ? (int)$_POST['edadAlumno'] : '' ?>" placeholder="Ingrese una edad" required>
                    </div>
                    <div class="formInput">
                        <label for="notasAlumno">Notas (separadas por comas):</label>
                        <input type="text" id="notasAlumno" name="notasAlumno" value="<?= isset($_POST['notasAlumno']) ? htmlspecialchars($_POST['notasAlumno']) : '' ?>" placeholder="Ej: 7,8,9">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="crearAlumno" value="Crear Alumno">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="mostrarEstado" value="Mostrar Estado" <?= isset($_SESSION['alumno']) ? '' : 'disabled' ?>>
                    </div>
                </form>
                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                    if (isset($_POST['crearAlumno']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['nombreAlumno']);
                            $edad = (int)$_POST['edadAlumno'];
                            $notas = !empty($_POST['notasAlumno']) ? array_map('floatval', explode(',', $_POST['notasAlumno'])) : [];
                            $alumno = new Alumno($nombre, $edad, $notas);
                            $_SESSION['alumno'] = serialize($alumno);
                            echo "<p>Alumno creado: $nombre, $edad años.</p>";
                            echo "<p>Notas: " . (empty($notas) ? "Ninguna" : implode(', ', $notas)) . "</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    if (isset($_POST['mostrarEstado']) && isset($_SESSION['alumno'])) {
                        $alumno = unserialize($_SESSION['alumno']);
                        echo "<p>Estado del alumno {$alumno->getNombre()}: {$alumno->getEstado()->value}</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="ejercicioFinal">
            <div class="ejercicioTitle">
                <h1>Ejercicios 13 al 20 - Repositorio de Alumnos, Evaluaciones, Reportes y JSON</h1>
                <p>Crear una clase que gestione una colección de alumnos, permitiendo: guardar alumnos, buscarlos por 
                nombre y listarlos</p>
                <p>Implementar la funcionalidad para guardar y cargar la informacion dee los alumnos en un archivo json.</p>
                <p>Crear una clase con propiedades: materia, nota y fecha. Asociar evaluaciones a los alumnos.</p>
                <p>Agregar un método en Alumno que devuelva las evaluaciones ordenadas por fecha.</p>
                <p>Crear un método que calcule el promedio de notas de una materia específica para un alumno.</p>
                <p>Crear una clase ReporteCurso que genere un resumen con: cantidad de alumnos, promedio general, y 
                alumnos aprobados por materia.</p>
                <p>Escribir el resumen generado por ReporteCurso en un archivo de texto</p>
            </div>
            <div class="ejercicioContainer">
                <div class="ejercicioBusqueda">
                    <h2>Buscar por Nombre</h2>
                    <form action="index.php#ejercicioFinal" method="post">
                        <div class="formInput">
                            <input type="text" id="buscarNombre" name="buscarNombre" placeholder="Ingrese el nombre" required>
                        </div>
                        <div class="formBtn">
                            <input type="submit" name="buscarAlumno" value="Buscar Alumno">
                        </div>
                        <div class="formBtn">
                            <input type="submit" name="verHistorial" value="Ver Historial de Notas">
                        </div>
                    </form>
                </div>

                <div class="ejercicioFuncionalidades">
                    <div class="ejercicioAddAlumno">
                        <h2>Cargar Alumno</h2>
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formInput">
                                <label for="nombreAlumno">Nombre</label>
                                <input type="text" id="nombreAlumno" name="nombreAlumno" placeholder="Ingrese el nombre" required>
                            </div>
                            <div class="formInput">
                                <label for="edadAlumno">Edad</label>
                                <input type="number" id="edadAlumno" name="edadAlumno" placeholder="Ingrese una edad" required>
                            </div>
                            <!-- <div class="formInput">
                                <label for="notasAlumno">Notas (separadas por comas):</label>
                                <input type="text" id="notasAlumno" name="notasAlumno" placeholder="Ej: 7,8,9">
                            </div> -->
                            <!-- <div class="formInput">
                                <label for="nombreCurso">Curso</label>
                                <input type="text" id="nombreCurso" name="nombreCurso" placeholder="Ingrese el nombre del curso" required>
                            </div> -->
                            <div class="formBtn">
                                <input type="submit" name="guardarAlumno" value="Guardar Alumno">
                            </div>
                        </form>
                    </div>

                    <div class="ejercicioEvaluacion">
                        <h2>Evaluación</h2>
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formInput">
                                <label for="nombreAlumno">Nombre del Alumno</label>
                                <input type="text" id="nombreAlumno" name="nombreAlumno" placeholder="Ingrese el nombre" required>
                            </div>
                            <div class="formInput">
                                <label for="materia">Materia</label>
                                <input type="text" id="materia" name="materia" placeholder="Ingrese la materia" required>
                            </div>
                            <div class="formInput">
                                <label for="nota">Nota</label>
                                <input type="number" id="nota" name="nota" step="0.1" min="0" max="10" placeholder="Ingrese la nota" required>
                            </div>
                            <div class="formInput">
                                <label for="fecha">Fecha (YYYY-MM-DD)</label>
                                <input type="date" id="fecha" name="fecha" required>
                            </div>
                            <div class="formBtn">
                                <input type="submit" name="agregarEvaluacion" value="Agregar Evaluación">
                            </div>
                        </form>
                    </div>

                    <div class="ejercicioReporteYExportar">
                        <h2>Reportes</h2>
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formInput">
                                <label for="materiaReporte">Materia</label>
                                <input type="text" id="materiaReporte" name="materiaReporte" placeholder="Ingrese la materia" required>
                            </div>
                            <div class="formBtn">
                                <input type="submit" name="generarReporte" value="Generar Reporte">
                            </div>
                            <div class="formBtn">
                                <input type="submit" name="exportarReporte" value="Exportar Reporte a Archivo">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ejercicioAcciones">
                    <h2>Opciones</h2>
                    <div class="accionesContainer">
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formBtn">
                                <input type="submit" name="listarAlumnos" value="Listar Alumnos">
                            </div>
                        </form>
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formBtn">
                                <input type="submit" name="guardarJson" value="Guardar en JSON">
                            </div>
                        </form>
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formBtn">
                                <input type="submit" name="cargarJson" value="Cargar desde JSON">
                            </div>
                        </form>
                    </div>

                    <div class="accionesContainer">
                        <form action="index.php#ejercicioFinal" method="post">
                            <div class="formInput">
                                <label for="nombreAlumno">Nombre del Alumno</label>
                                <input type="text" id="nombreAlumno" name="nombreAlumno" placeholder="Ingrese el nombre" required>
                            </div>
                            <div class="formInput">
                                <label for="materia">Materia</label>
                                <input type="text" id="materia" name="materia" placeholder="Ingrese la materia" required>
                            </div>
                            <div class="formBtn">
                                <input type="submit" name="calcularPromedioMateria" value="Calcular Promedio por Materia">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ejercicioResultado">
                <h2>Resultado</h2> 
                <?php
                    if (!isset($_SESSION['repositorio'])) {
                        $_SESSION['repositorio'] = serialize(new RepositorioAlumnos());
                    }
                    if (!isset($_SESSION['cursos'])) {
                        $_SESSION['cursos'] = [];
                    }
                    $repositorio = unserialize($_SESSION['repositorio']);

                    // Ejercicio 13: Guardar Alumno
                    if (isset($_POST['guardarAlumno']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['nombreAlumno']);
                            $edad = (int)$_POST['edadAlumno'];
                            $notas = !empty($_POST['notasAlumno']) ? array_map('floatval', explode(',', $_POST['notasAlumno'])) : [];
                            // $nombreCurso = htmlspecialchars($_POST['nombreCurso']);
                            foreach ($notas as $nota) {
                                if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
                                    throw new InvalidArgumentException('Las notas deben ser valores numéricos entre 0 y 10.');
                                }
                            }
                            $alumno = new Alumno($nombre, $edad, $notas);
                            $repositorio->guardar($alumno);
                            // if (!isset($_SESSION['cursos'][$nombreCurso])) {
                            //     $_SESSION['cursos'][$nombreCurso] = new Curso($nombreCurso);
                            // }
                            // $_SESSION['cursos'][$nombreCurso]->agregarAlumno($alumno);
                            $_SESSION['repositorio'] = serialize($repositorio);
                            echo "<p>Alumno $nombre guardado y agregado al curso correctamente.</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 13: Buscar Alumno
                    if (isset($_POST['buscarAlumno']) && !empty($_POST['buscarNombre'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['buscarNombre']);
                            $alumno = $repositorio->buscarPorNombre($nombre);
                            if ($alumno) {
                                echo "<p>Alumno encontrado: {$alumno->getNombre()}, {$alumno->getEdad()} años, Estado: {$alumno->getEstado()->value}</p>";
                            } else {
                                echo "<p>No se encontró ningún alumno con el nombre $nombre.</p>";
                            }
                        } catch (Exception $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 17: Ver Historial de Notas
                    if (isset($_POST['verHistorial']) && !empty($_POST['buscarNombre'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['buscarNombre']);
                            $alumno = $repositorio->buscarPorNombre($nombre);
                            if (!$alumno) {
                                throw new InvalidArgumentException("El alumno $nombre no existe.");
                            }
                            $evaluaciones = $alumno->getEvaluacionesOrdenadasPorFecha();
                            if (empty($evaluaciones)) {
                                echo "<p>El alumno $nombre no tiene evaluaciones.</p>";
                            } else {
                                echo "<p>Historial de evaluaciones para $nombre:</p><ul>";
                                foreach ($evaluaciones as $evaluacion) {
                                    echo "<li>{$evaluacion->getMateria()}: {$evaluacion->getNota()} (Fecha: {$evaluacion->getFecha()->format('Y-m-d')})</li>";
                                }
                                echo "</ul>";
                            }
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 13: Listar Alumnos
                    if (isset($_POST['listarAlumnos'])) {
                        try {
                            $alumnos = $repositorio->listar();
                            if (empty($alumnos)) {
                                echo "<p>No hay alumnos en el repositorio.</p>";
                            } else {
                                echo "<p>Lista de alumnos:</p><ul>";
                                foreach ($alumnos as $alumno) {
                                    echo "<li>{$alumno->getNombre()} ({$alumno->getEdad()} años, Estado: {$alumno->getEstado()->value})</li>";
                                }
                                echo "</ul>";
                            }
                        } catch (Exception $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 14: Guardar en JSON
                    if (isset($_POST['guardarJson'])) {
                        try {
                            $repositorio->guardarEnJson('alumnos.json');
                            echo "<p>Datos guardados en alumnos.json correctamente.</p>";
                        } catch (RuntimeException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 15: Cargar desde JSON
                    if (isset($_POST['cargarJson'])) {
                        try {
                            $repositorio->cargarDesdeJson('alumnos.json');
                            $_SESSION['repositorio'] = serialize($repositorio);
                            echo "<p>Datos cargados desde alumnos.json correctamente.</p>";
                        } catch (RuntimeException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 16: Agregar Evaluación
                    if (isset($_POST['agregarEvaluacion']) && !empty($_POST['nombreAlumno']) && !empty($_POST['materia']) && !empty($_POST['nota']) && !empty($_POST['fecha'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['nombreAlumno']);
                            $alumno = $repositorio->buscarPorNombre($nombre);
                            if (!$alumno) {
                                throw new InvalidArgumentException("El alumno $nombre no existe en el repositorio.");
                            }
                            $evaluacion = new Evaluacion($_POST['materia'], (float)$_POST['nota'], $_POST['fecha']);
                            $alumno->agregarEvaluacion($evaluacion);
                            $repositorio->guardar($alumno);
                            $_SESSION['repositorio'] = serialize($repositorio);
                            echo "<p>Evaluación agregada para {$alumno->getNombre()} en {$_POST['materia']} (Nota: {$_POST['nota']}, Fecha: {$_POST['fecha']}).</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        } catch (Exception $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 18: Calcular Promedio por Materia
                    if (isset($_POST['calcularPromedioMateria']) && !empty($_POST['nombreAlumno']) && !empty($_POST['materia'])) {
                        try {
                            $nombre = htmlspecialchars($_POST['nombreAlumno']);
                            $materia = htmlspecialchars($_POST['materia']);
                            $alumno = $repositorio->buscarPorNombre($nombre);
                            if (!$alumno) {
                                throw new InvalidArgumentException("El alumno $nombre no existe.");
                            }
                            $promedio = $alumno->calcularPromedioPorMateria($materia);
                            echo "<p>Promedio de $materia para $nombre: " . ($promedio > 0 ? number_format($promedio, 2) : "No hay evaluaciones") . "</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 19: Generar Reporte

                    if (isset($_POST['generarReporte']) && !empty($_POST['materiaReporte'])) {
                        try {
                            $materia = htmlspecialchars($_POST['materiaReporte']);
                            $reporteMateria = new ReporteMateria($materia, $repositorio);
                            $reporte = $reporteMateria->generarReporte();
                            echo "<p>Reporte de la materia: $materia</p>";
                            echo "<p>Cantidad de alumnos: {$reporte['cantidadAlumnos']}</p>";
                            echo "<p>Promedio general: " . ($reporte['promedio'] > 0 ? number_format($reporte['promedio'], 2) : 'No hay notas') . "</p>";
                            echo "<p>Alumnos aprobados:</p><ul>";
                            if (empty($reporte['aprobados'])) {
                                echo "<li>Ninguno</li>";
                            } else {
                                foreach ($reporte['aprobados'] as $alumno) {
                                    echo "<li>{$alumno->getNombre()} (Promedio: " . number_format($alumno->calcularPromedioPorMateria($materia), 2) . ")</li>";
                                }
                            }
                            echo "</ul>";
                            echo "<p>Alumnos desaprobados:</p><ul>";
                            if (empty($reporte['desaprobados'])) {
                                echo "<li>Ninguno</li>";
                            } else {
                                foreach ($reporte['desaprobados'] as $alumno) {
                                    echo "<li>{$alumno->getNombre()} (Promedio: " . number_format($alumno->calcularPromedioPorMateria($materia), 2) . ")</li>";
                                }
                            }
                            echo "</ul>";
                            echo "<p>Alumnos sin evaluaciones:</p><ul>";
                            if (empty($reporte['sinEvaluaciones'])) {
                                echo "<li>Ninguno</li>";
                            } else {
                                foreach ($reporte['sinEvaluaciones'] as $alumno) {
                                    echo "<li>{$alumno->getNombre()}</li>";
                                }
                            }
                            echo "</ul>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }

                    // Ejercicio 20: Exportar Reporte
                    if (isset($_POST['exportarReporte']) && !empty($_POST['materiaReporte'])) {
                        try {
                            $materia = htmlspecialchars($_POST['materiaReporte']);
                            $reporteMateria = new ReporteMateria($materia, $repositorio);
                            $archivo = "reporte_{$materia}_" . date('Ymd_His') . ".txt";
                            $reporteMateria->exportarReporte($archivo);
                            echo "<p>Reporte exportado a $archivo correctamente.</p>";
                        } catch (InvalidArgumentException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        } catch (RuntimeException $e) {
                            echo "<p>Error: {$e->getMessage()}</p>";
                        }
                    }
                    ?>  
            </div>
        </section>

        <div class="panel">
            <h3>Panel de Depuración</h3>
            <?php
            // Ejercicio 1
            echo "<p><strong>Ej. 1 - Saludo:</strong> " . ($_SESSION['ejercicio1']['nombre'] ?? 'Ninguno') . "</p>";

            // Ejercicio 2
            echo "<p><strong>Ej. 2 - Par/Impar:</strong> " . ($_SESSION['ejercicio2']['numero'] ?? 'Ninguno') . " (" . ($_SESSION['ejercicio2']['esPar'] ?? '-') . ")</p>";

            // Ejercicio 3
            echo "<p><strong>Ej. 3 - Mayor de Tres:</strong> " . ($_SESSION['ejercicio3']['numeros'] ?? 'Ninguno') . " (Mayor: " . ($_SESSION['ejercicio3']['mayor'] ?? '-') . ")</p>";

            // Ejercicio 4
            echo "<p><strong>Ej. 4 - Pares:</strong> " . ($_SESSION['ejercicio4']['numeros'] ?? 'Ninguno') . " (Pares: " . ($_SESSION['ejercicio4']['pares'] ?? '-') . ")</p>";

            // Ejercicio 5
            echo "<p><strong>Ej. 5 - Promedio:</strong> " . ($_SESSION['ejercicio5']['numeros'] ?? 'Ninguno') . " (Promedio: " . ($_SESSION['ejercicio5']['promedio'] ?? '-') . ")</p>";

            // Ejercicio 6 y 7
            if (isset($_SESSION['alumno'])) {
                $alumno = unserialize($_SESSION['alumno']);
                echo "<p><strong>Ej. 6/7 - Alumno:</strong> {$alumno->getNombre()} (Edad: {$alumno->getEdad()}, Notas: " . (empty($alumno->getNotas()) ? 'Ninguna' : implode(', ', $alumno->getNotas())) . ", Promedio: " . number_format($alumno->calcularPromedio(), 2) . ")</p>";
            } else {
                echo "<p><strong>Ej. 6/7 - Alumno:</strong> Ninguno</p>";
            }

            // Ejercicio 8
            echo "<p><strong>Ej. 8 - Agrupar por Edad:</strong> Niños: " . count($_SESSION['personas'] ? agruparPorEdad($_SESSION['personas'])['niños'] : []) . ", Adolescentes: " . count($_SESSION['personas'] ? agruparPorEdad($_SESSION['personas'])['adolescentes'] : []) . ", Adultos: " . count($_SESSION['personas'] ? agruparPorEdad($_SESSION['personas'])['adultos'] : []) . "</p>";

            // Ejercicio 9
            echo "<p><strong>Ej. 9 - Cursos:</strong> " . count($_SESSION['cursos'] ?? []) . "</p>";
            if (!empty($_SESSION['cursos'])) {
                echo "<ul>";
                foreach ($_SESSION['cursos'] as $nombreCurso => $curso) {
                    echo "<li>$nombreCurso (Alumnos: " . count($curso->getAlumnos()) . ")</li>";
                }
                echo "</ul>";
            }

            // Ejercicio 10
            echo "<p><strong>Ej. 10 - Último Objeto:</strong> " . ($_SESSION['ejercicio10']['objeto'] ?? 'Ninguno') . " (Curso: " . ($_SESSION['ejercicio10']['curso'] ?? '-') . ")</p>";

            // Ejercicio 11 y 12
            if (isset($_SESSION['alumno'])) {
                $alumno = unserialize($_SESSION['alumno']);
                echo "<p><strong>Ej. 11/12 - Estado:</strong> {$alumno->getNombre()} ({$alumno->getEstado()->value})</p>";
            } else {
                echo "<p><strong>Ej. 11/12 - Estado:</strong> Ninguno</p>";
            }

            // Ejercicio 13 al 20
            $repositorio = isset($_SESSION['repositorio']) ? unserialize($_SESSION['repositorio']) : new RepositorioAlumnos();
            echo "<p><strong>Ej. 13-20 - Alumnos:</strong> " . count($repositorio->listar()) . "</p>";
            if (!empty($repositorio->listar())) {
                echo "<ul>";
                foreach ($repositorio->listar() as $alumno) {
                    echo "<li>{$alumno->getNombre()} (Edad: {$alumno->getEdad()}, Evaluaciones: " . count($alumno->getEvaluaciones()) . ")</li>";
                }
                echo "</ul>";
            }
            ?>
            <form action="index.php" method="post">
                <button type="submit" name="reiniciarSesion">Reiniciar Sesión</button>
            </form>

            <?php
                // Reiniciar sesión
                if (isset($_POST['reiniciarSesion'])) {
                    session_destroy();
                }
            ?>
        </div>


    </main>

</body>
</html>