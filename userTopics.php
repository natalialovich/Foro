<?php
/*Trabajo final presentado por Natalia Lovich para la asignatura PHP-MYSQL, SEAS 2022*/

include 'actions/temas-comentarios/userTopicsAction.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body class=" bg-dark pb-5">
    <?php include 'includes/navbar.php'; ?>
    <section class=" bg-dark pb-5">
    <?php
     include 'includes/userInfo.php';
     include 'includes/errorAlerts.php'; ?>

        <div class="container p-2 my-3 bg-success text-white rounded">
            <h1 class="display-3 text-center">Tus publicaciones</h1>
        </div>
        <?php
        if($getTopics->rowCount() <= 0){
            echo '<h3 class="bg-light p-3 d-flex justify-content-center">Aún no tienes publicaciones</h3>';
        }

        while ($topics = $getTopics->fetch()) {

            $getCateg = $mibd->prepare('SELECT * FROM categoria WHERE categ_ID = ?');
            $getCateg->execute(
                array($topics['categ_ID'])
            );
            $categ = $getCateg->fetch();
        ?>
            <div class="container py-3 px-5 bg-light">
                <div class="card">
                    <h4 class="card-header">
                        <?php echo $topics['titulo'] . '<span class=" h6 d-flex flex-row justify-content-end"> Categoría: ' . $categ['nombre_cat'] . ' </span>' ?>
                        </h5>
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo $topics['contenido']; ?></p>
                            </p>
                            <a href="<?php echo'topiccomment.php?temaID=' . $topics['tema_ID'];?>" class="btn btn-success">Ver comentarios</a>
                            <a href="<?php echo'editTopic.php?temaID=' . $topics['tema_ID'];?>" class="btn btn-warning">Modificar la pregunta</a>
                            <a href="<?php echo'actions/temas-comentarios/deleteTopic.php?temaID=' . $topics['tema_ID'];?>" class="btn btn-danger">Eliminar</a>
                        </div>
                </div>
            </div>
        <?php
        };
        ?>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>