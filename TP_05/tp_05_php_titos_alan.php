<?php

function saludar($nombre){
    if ($nombre == ""){ // empty($nombre)
        return "debe ingresar un nombre"
    }
    echo 'Hola, '$nombre'. !';
}

function esPar ($numero):bool{
    return $numero % 2 === 0; 
}

function mayorDeTres($a, $b, $c){
    return max($a, $b, $c)
}
function filtrarPares($array){
    return array_filter($array, 'esPar');
}
function promedio($array){
    return array_sum($array) / count($array);
}

class Persona{
    private $nombre
    private $edad

    public function __construct($nombre,edad){
        
    }
}

?>