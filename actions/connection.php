<?php

$usuario = "root";
$contraseña = "";
//Conexión a travez de un PDO, nombre de la base de datos es "foro-maderas", dentro de la cual se encuentra la tabla usuarios, categoría, comentarios y tema.
try {
    $mibd = new PDO('mysql:host=localhost;dbname=foro_maderas', $usuario, $contraseña);
    $mibd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
// inicio sesión
session_start();
