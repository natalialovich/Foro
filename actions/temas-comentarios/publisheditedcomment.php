<?php

//Incluyo el fichero de conexión
include '../connection.php';
$commentID = $_POST['id-comment'];
$topicID = $_POST['id-topic'];

if (isset($_POST['text']) and !empty($_POST['text'])) {

    try {

        //Inserto comentario en tabla
        $title = htmlspecialchars($_POST['title']);
        $text_content = nl2br(htmlspecialchars($_POST['text']));

        $insertNewcomment = $mibd->prepare('UPDATE comentarios SET contenido = ? WHERE coment_ID = ?');

        $insertNewcomment->execute(
            array(
                $text_content,
                $commentID
            )
        );

        header('location:../../topiccomment.php?temaID=' . $topicID . '&envio=correcto');
    } catch (PDOException $e) {

        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
} else {

    header('location:../../editcomment.php?commentID=' . $commentID . '&error6=rellenalosdatos');
}
