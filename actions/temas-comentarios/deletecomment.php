<?php

//Incluyo el fichero de conexión
include '../connection.php';

//Busco el comentario en la BD
if (isset($_GET['commentID']) and !empty($_GET['commentID'])) {

    $commentID = $_GET['commentID'];
    $topicID = $_GET['temaID'];
    $serchcomment = $mibd->prepare('SELECT usuario_ID FROM comentarios WHERE coment_ID = ?');
    $serchcomment->execute(array($commentID));

    if ($serchcomment->rowCount() > 0) {

        $commentinfo = $serchcomment->fetch();

        //Elimino el comentario si es del usuario
        if ($commentinfo['usuario_ID'] === $_SESSION['usuario']['usuario_ID']) {

            $deletecomment = $mibd->prepare('DELETE FROM comentarios WHERE coment_ID = ?');
            $deletecomment->execute(array($commentID));

            header('location: ../../topiccomment.php?temaID=' . $topicID . '&eliminado=correctamente');
        } else {

            header('location: ../../topiccomment.php?temaID=' . $topicID . '&error=noereselautor');
        }
    } else {

        header('location: ../../topiccomment.php?temaID=' . $topicID . '&error2=nosehaencontrado');
    }
} else {

    header('location: ../../topiccomment.php?temaID=' . $topicID . '&error2=nosehaencontrado');
}
