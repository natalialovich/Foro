<?php
/*Trabajo final presentado por Natalia Lovich para la asignatura PHP-MYSQL, SEAS 2022*/
include 'actions/temas-comentarios/editTopicAction.php';
?>
<!DOCTYPE HTML>
<html lang="es">

<?php include 'includes/head.php'; ?>

<body class=" bg-dark pb-5">
    <?php include 'includes/navbar.php'; ?>
    <section class=" bg-dark pb-5">
        <?php
        include 'includes/userInfo.php';
        include 'includes/errorAlerts.php'; ?>
        <div class="container p-5 bg-light">
            <form id="comenta" method="post" action="actions/temas-comentarios/publishEditedAction.php">
                <h2>Editar</h2>
                <div class="form-group">
                    <input type="hidden" name="id-topic" value="<?php echo $topicID ?>">
                    <label for="title">Título:</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $titulo; ?>">
                </div>
                <div class="form-group">
                    <label for="text">Descripción:</label>
                    <textarea rows="5" class="form-control" type="text" name="text"><?php echo $contenido; ?></textarea>
                </div>
                <button class="btn btn-primary m-3" name="publish">Publicar</button>
            </form>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>