<?php
// Incluir el archivo con las funciones y clases
require_once 'tp_05_php_titos_alan.php';

// Variable para almacenar un objeto Alumno (para ejercicios 6 y 7)
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
                    <li class="navLi"><a href="#ejercicio1">Ejercicio 1</a></li>
                    <li class="navLi"><a href="#ejercicio2">Ejercicio 2</a></li>
                    <li class="navLi"><a href="#ejercicio3">Ejercicio 3</a></li>
                    <li class="navLi"><a href="#ejercicio4">Ejercicio 4</a></li>
                    <li class="navLi"><a href="#ejercicio5">Ejercicio 5</a></li>
                    <li class="navLi"><a href="#ejercicio6">Ejercicio 6</a></li>
                    <li class="navLi"><a href="#ejercicio7">Ejercicio 7</a></li>
                    <li class="navLi"><a href="#ejercicio8">Ejercicio 8</a></li>
                    <li class="navLi"><a href="#ejercicio9">Ejercicio 9</a></li>
                    <li class="navLi"><a href="#ejercicio10">Ejercicio 10</a></li>
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
                            $nombre = ($_POST['nombre']);
                            echo "<p>" . saludar($nombre) . "</p>";
                        }
                    ?>
                    
                </div>
            </div>
            
        </section>

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
                            $resultado = esPar($numero) ? "El número $numero es par." : "El número $numero es impar.";
                            echo "<p>$resultado</p>";
                        }
                    ?>
                </div>
            </div>
        </section>

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
                            echo "<p>El mayor de los números $num1, $num2 y $num3 es: $mayor</p>";
                        }
                    ?>
                </div>
            </div>
        </section>

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
                            echo "<p>Números pares: " . (empty($pares) ? "Ninguno" : implode(', ', $pares)) . "</p>";
                        }
                    ?>
                </div>
            </div>
        </section>

        <section id="ejercicio5">
            <div class="ejercicioTitle">
                <h1>Ejercicio 5 - Promedio de un arreglo</h1>
                <p>Crear una función que calcule y devuelva el promedio de un arreglo de números.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio5" method="post">
                    <div class="formInput">
                        <label for="promedioNumeros">Numeros (separados por comas)</label>
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
                            // Convierte la cadena "1.5,2,3.25" en el array [1.5, 2.0, 3.25]
                            $numeros = array_map('floatval', explode(',', $_POST['promedioNumeros']));
                            
                            // Calcula el promedio con la función personalizada
                            $promedio = promedio($numeros);
                            
                            echo "<p>El promedio es: $promedio</p>";
                        }
                    ?>

                </div>
            </div>
        </section>

        <section id="ejercicio6y7">
            <div class="ejercicioTitle">
                <h1>Ejercicio 6y7 - Clase Persona y Alumno</h1>
                <p>Crear una clase Persona con propiedades nombre y edad. Incluir un método presentarse() que imprima 
                los datos de la persona.</p>
                <p>Crear  una  clase  Alumno  que  herede  de  Persona.  Agregar  una  lista  de  notas  y  un  método 
                calcularPromedio() que devuelva el promedio de notas.</p>
            </div>
            <div class="ejercicioContainer">
                <form action="index.php#ejercicio6y7" method="post">
                    <div class="formInput">
                        <label for="nombreAlumno">Nombre</label>
                        <input type="text" id="nombreAlumno" name="nombreAlumno"
                            value="<?= isset($_POST['nombreAlumno']) ? htmlspecialchars($_POST['nombreAlumno']) : '' ?>"
                            required placeholder="Ingrese el nombre">
                    </div>

                    <div class="formInput">
                        <label for="edadAlumno">Edad</label>
                        <input type="number" id="edadAlumno" name="edadAlumno"
                            value="<?= isset($_POST['edadAlumno']) ? (int)$_POST['edadAlumno'] : '' ?>"
                            required placeholder="Ingrese una edad">
                    </div>

                    <div class="formInput">
                        <label for="notasAlumno">Notas (separadas por comas):</label>
                        <input type="text" id="notasAlumno" name="notasAlumno"
                            value="<?= isset($_POST['notasAlumno']) ? htmlspecialchars($_POST['notasAlumno']) : '' ?>"
                            placeholder="Ej: 7,8,9">
                    </div>

                    <div class="formBtn">
                        <input type="submit" name="crearAlumno" value="Crear Alumno">
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="presentarAlumno" value="Presentarse" <?= isset($_POST['crearAlumno']) ? '' : 'disabled' ?>>
                    </div>
                    <div class="formBtn">
                        <input type="submit" name="promedioNotas" value="Promedio de notas" <?= isset($_POST['crearAlumno']) ? '' : 'disabled' ?>>
                    </div>

                </form>

                <div class="ejercicioResultado">
                    <h2>Resultado</h2>
                    <?php
                        if (isset($_POST['crearAlumno']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno'])) {
                            $nombre = htmlspecialchars($_POST['nombreAlumno']);
                            $edad = (int)$_POST['edadAlumno'];
                            $notas = !empty($_POST['notasAlumno']) ? array_map('floatval', explode(',', $_POST['notasAlumno'])) : [];

                            $alumno = new Alumno($nombre, $edad, $notas);
                            echo "<p>Alumno creado: $nombre, $edad años.</p>";
                            echo "<p>Notas: " . implode(', ', $alumno->getNotas()) . "</p>";
                        }
                        if (isset($_POST['presentarAlumno']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno'])) {
                            $alumno = new Alumno($_POST['nombreAlumno'], (int)$_POST['edadAlumno']);
                            echo "<p>" . $alumno->presentarse() . "</p>";
                        }

                        if (isset($_POST['promedioNotas']) && !empty($_POST['nombreAlumno']) && !empty($_POST['edadAlumno']) && !empty($_POST['notasAlumno'])) {
                            $notas = array_map('floatval', explode(',', $_POST['notasAlumno']));
                            $alumno = new Alumno($_POST['nombreAlumno'], (int)$_POST['edadAlumno'], $notas);
                            echo "<p>Promedio de notas: " . $alumno->calcularPromedio() . "</p>";
                        }
                    ?>
                </div>
            </div>
        </section>

    </main>

</body>
</html>