<?php

//Incluyo el fichero de conexión
include '../connection.php';

$topicID = $_GET['temaID'];

if (isset($_POST['send'])) {

    //Inserto datos en la tabla de comentarios
    if (!empty($_POST['answer'])) {

        $userAnswer = nl2br(htmlspecialchars($_POST['answer']));
        $insertAnswer = $mibd->prepare('INSERT INTO comentarios(usuario_ID,tema_ID, contenido) VALUES(?, ? ,?)');
        $insertAnswer->execute(
            array(
                $_SESSION['usuario']['usuario_ID'],
                $topicID,
                $userAnswer
            )
        );

        header('location: ../../topiccomment.php?temaID=' . $topicID . '&envio=correcto');
    } else {

        header('location: ../../topiccomment.php?temaID=' . $topicID . '&error6=rellenalosdatos');
    }
} else {

    header('location: ../../topiccomment.php?temaID=' . $topicID . '&error5=paginanoencontrada');
}
