<?php

//Incluyo el fichero de conexión
include '../connection.php';

if (isset($_POST['publish'])) {

    if (!empty($_POST['title']) and !empty($_POST['text'])) {

        $topicID = $_POST['id-topic'];

        try {

            //inserto datos en tabla 
            $title = htmlspecialchars($_POST['title']);
            $text_content = nl2br(htmlspecialchars($_POST['text']));

            $insertNewTopic = $mibd->prepare('UPDATE tema SET titulo = ?, contenido = ? WHERE tema_ID = ?');

            $insertNewTopic->execute(
                array(
                    $title,
                    $text_content,
                    $topicID
                )
            );

            header('location:../../userTopics.php?envio=correcto');
        } catch (PDOException $e) {

            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    } else {

        header('location:../../editTopic.php?error6=rellenalosdatos');
    }
}
