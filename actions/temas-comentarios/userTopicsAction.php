<?php

//Incluyo el fichero de conexión
require 'actions/connection.php';

//Verifico que es el usuario
if (!isset($_SESSION['usuario']['usuario_ID'])) {

    header('location: index.php?error3=nohainiciadosesion');
} else {
    
    //muestro las publicaciones
    $getTopics = $mibd->prepare('SELECT * FROM tema WHERE usuario_ID = ? ORDER BY tema_ID DESC');
    $getTopics->execute(
        array($_SESSION['usuario']['usuario_ID'])
    );
}
