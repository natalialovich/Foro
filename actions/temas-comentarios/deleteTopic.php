<?php

//Incluyo el fichero de conexión
include '../connection.php';

//Busco el comentario en la BD
if (isset($_GET['temaID']) and !empty($_GET['temaID'])) {

    $topicID = $_GET['temaID'];
    $serchTopic = $mibd->prepare('SELECT usuario_ID FROM tema WHERE tema_ID = ?');
    $serchTopic->execute(array($topicID));

    if ($serchTopic->rowCount() > 0) {

        $topicinfo = $serchTopic->fetch();

        //Elimino el tema si es del usuario
        if ($topicinfo['usuario_ID'] === $_SESSION['usuario']['usuario_ID']) {

            $deletetopic = $mibd->prepare('DELETE FROM tema WHERE tema_ID = ?');
            $deletetopic->execute(array($topicID));

            header('location: ../../userTopics.php?eliminado=correctamente');
        } else {

            header('location: ../../userTopics.php?error4=noereselautor');
        }
    } else {

        header('location: ../../userTopics.php?error2=nosehaencontrado');
    }
} else {

    header('location: ../../userTopics.php?error2=nosehaencontrado');
}
