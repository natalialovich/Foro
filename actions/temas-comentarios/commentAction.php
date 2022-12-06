<?php

//Incluyo el fichero de conexión
include 'actions/connection.php';
include 'actions/temas-comentarios/getInfo.php';

// Verificar si el ID del tema esta en la URL
if(isset($_GET['temaID']) AND !empty($_GET['temaID'])){

    //Verificar si el tema existe en la BD
    $topicID = $_GET['temaID'];
    $serchTopic = $mibd->prepare('SELECT * FROM tema WHERE tema_ID = ?');
    $serchTopic->execute(array($topicID));

    //Asignar valores de la busqueda a variables
    if($serchTopic->rowCount() > 0){

        $topicinfo = $serchTopic->fetch();
        $userID = $topicinfo['usuario_ID'];
        $categID = $topicinfo['categ_ID'];
        $dateTopic = $topicinfo['fecha'];
        $title = $topicinfo['titulo'];
        $content = $topicinfo['contenido'];
        //Recojo los valores de la tabla de categoría y usuario
        $nombreUsuario = $info->userName($userID, $mibd);
        $categ = $info->categName($categID, $mibd);

    } else {

        header('location: index.php?error2=nosehaencontrado');
    }

    } else {

    header('location: index.php?error2=nosehaencontrado');

}
