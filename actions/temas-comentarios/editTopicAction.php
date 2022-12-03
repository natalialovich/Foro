<?php

//Incluyo el fichero de conexión
include 'actions/connection.php';

if (isset($_GET['temaID']) and !empty($_GET['temaID'])) {

    $topicID = $_GET['temaID'];
    $veryfyTopicBD = $mibd->prepare('SELECT * FROM tema WHERE tema_ID = ?');
    $veryfyTopicBD->execute(array($topicID));

    if ($veryfyTopicBD->rowCount() > 0) {

        $topicInfo = $veryfyTopicBD->fetch();

        //confirmo que si es el autor del comentario y guardo datos en variables
        if ($topicInfo['usuario_ID'] === $_SESSION['usuario']['usuario_ID']) {

            $titulo = $topicInfo['titulo'];
            $contenidostr = $topicInfo['contenido'];
            $contenido = str_replace('<br />', '', $contenidostr);
        } else {

            header('location: index.php?error4=noereselautordeestetema');
        }
    } else {

        header('location: index.php?error2=nosehaencontrado');
    }
} else {

    header('location: index.php?error2=nosehaencontrado');
}
