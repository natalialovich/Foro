<?php

//Incluyo el fichero de conexión
include 'actions/connection.php';

if (isset($_GET['commentID']) and !empty($_GET['commentID'])) {

    $commentID = $_GET['commentID'];
    $veryfyInBD = $mibd->prepare('SELECT * FROM comentarios WHERE coment_ID = ?');
    $veryfyInBD->execute(array($commentID));

    if ($veryfyInBD->rowCount() > 0) {

        $commentInfo = $veryfyInBD->fetch();

        //confirmo que si es el autor del comentario y guardo datos en variables
        if ($commentInfo['usuario_ID'] === $_SESSION['usuario']['usuario_ID']) {

            $contenidostr = $commentInfo['contenido'];
            $contenido = str_replace('<br />', '', $contenidostr);
            $topicID = $commentInfo['tema_ID'];
        } else {

            header('location: index.php?error4=noereselautordeestetema');
        }
    } else {

        header('location: index.php?error2=nosehaencontrado');
    }
} else {

    header('location: index.php?error2=nosehaencontrado');
}
