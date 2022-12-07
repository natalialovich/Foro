<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>
<?php include 'actions/temas-comentarios/commentAction.php'; ?>

<body class=" bg-dark pb-5">
    <?php include 'includes/navbar.php'; ?>
    <section class=" bg-dark pb-5">
        <?php 
        include 'includes/userInfo.php';
        include 'includes/errorAlerts.php';
        
        if (isset($content)) {
        ?>
            <div class="container py-3 px-5 bg-light">
                <div class="card">
                    <h4 class="card-header">
                        <?php echo $title . '<span class=" h6 d-flex flex-row justify-content-end pt-3">Publicado por ' . $nombreUsuario['nombre'] . ' </span><span class=" h6 d-flex flex-row justify-content-end"> Categoría: ' . $categ['nombre_cat'] . ' </span>' ?>
                    </h4>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $content . '<span class=" h6 d-flex flex-row justify-content-end text-info pt-3"> Publicado el  ' . $dateTopic . ' </span>'; ?></p>
                        </p>
                        <?php
                        //Si el usuario ha iniciado sesión se muestra un botón de comentar
                        if (isset($_SESSION['usuario']['nombre'])) {
                            //si es el autor se muestra un botón de modificar 
                            if ($userID === $_SESSION['usuario']['usuario_ID']) {
                        ?>
                                <a href="<?php echo 'editTopic.php?temaID=' . $topicID; ?>" class="btn btn-warning">Modificar la pregunta</a>
                            <?php } ?>
                            <form class="mt-5" method="POST" action="actions/temas-comentarios/postAnswer.php?temaID=<?php echo $topicID ?>">
                                <label class="fs-5" for="answer">Responder:</label>
                                <textarea name="answer" cols="10" rows="3" class="form-control my-3"></textarea>
                                <button name="send" class="btn btn-primary mb-3">Comentar</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="container py-3 px-5 bg-light">
            <h3>Comentarios:</h3>
        </div>

        <?php
        //Sección de comentarios
        $getAnswersTopic = $mibd->prepare('SELECT * FROM comentarios WHERE tema_ID = ? ORDER BY coment_ID DESC');
        $getAnswersTopic->execute(array($topicID));

        while ($answers = $getAnswersTopic->fetch()) {

            $nombreUsuario2 = $info->userName($answers['usuario_ID'], $mibd);
        ?>
            <div class="container py-2 px-5 bg-light">
                <div class="card">
                    <h4 class="card-header">
                        <?php echo $nombreUsuario2['nombre'] . ' </span>' ?>
                    </h4>
                    <div class="card-body pb-0">
                        <p class="card-text">
                            <?php echo $answers['contenido'] . '<span class=" h6 d-flex flex-row justify-content-end text-info pt-2"> Publicado el  ' . $answers['fecha'] . ' </span>'; ?></p>
                        <?php

                        if (isset($_SESSION['usuario']['usuario_ID']) AND $answers['usuario_ID'] === $_SESSION['usuario']['usuario_ID']) { ?>
                            <a href="<?php echo 'editcomment.php?commentID=' . $answers['coment_ID']; ?>" class="btn btn-warning btn-sm">Modificar comentario</a>
                            <a href="<?php echo 'actions/temas-comentarios/deletecomment.php?commentID=' . $answers['coment_ID'] . '&temaID=' . $answers['tema_ID']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>