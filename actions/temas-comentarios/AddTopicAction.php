<?php

//Incluyo el fichero de conexión
include '../connection.php';

//Verifico que se haya enviado el formulario y guardo la info en variables
if (isset($_POST['publish'])){
    if(!empty($_POST['title']) AND !empty($_POST['text'])){

        $title = htmlspecialchars($_POST['title']);
        $text_content = nl2br(htmlspecialchars($_POST['text']));
        $user_id = $_SESSION['usuario']['usuario_ID'];
        $category = $_POST['category'];

        //Inserto los datos en BD
        $insertTopic = $mibd->prepare('INSERT INTO tema(usuario_ID, categ_ID, titulo, contenido) VALUES (?, ?, ?, ?)');

        $insertTopic->execute(
            array(
                $user_id,
                $category,
                $title,
                $text_content
                )
            );

            header('location:../../index.php?envio=correcto');

    } else {

        header('location:../../AddTopic.php?error1=rellenaloscampos');
    }
} else { 

    header('location:../../AddTopic.php?error2=nosehaencontradolapublicacion');

}


?>