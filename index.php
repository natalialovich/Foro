<!--Trabajo final presentado por Natalia Lovich para la asignatura PHP-MYSQL, SEAS 2022*/-->

<!DOCTYPE HTML>
<html lang="es">

<?php
include 'includes/head.php';
include 'actions/connection.php';
?>

<body class=" bg-dark pb-5">
    <?php include 'includes/navbar.php'; ?>
    <section class=" bg-dark pb-5">
        <?php
        include 'includes/userInfo.php';
        include 'includes/errorAlerts.php';
        include 'actions/temas-comentarios/getInfo.php';

        //Si no hay categoría seleccionada las muestro todas 
        if (!isset($_GET['categ_id'])) {

            echo '<div class="container p-2 my-3 bg-success text-white rounded">
            <h2 class="display-3 text-center">Todas las categorías</h2>
            </div>';

            $feed = $mibd->prepare('SELECT * FROM tema ORDER BY fecha DESC');
            $feed->execute();

            while ($feedDisplay = $feed->fetch()) {

                $nombreUsuario = $info->userName($feedDisplay['usuario_ID'], $mibd);
                $categ = $info->categName($feedDisplay['categ_ID'], $mibd);
        ?>
                <div class="container py-3 px-5 bg-light">
                    <div class="card">
                        <h4 class="card-header">
                            <?php echo $feedDisplay['titulo'] . '<span class=" h6 d-flex flex-row justify-content-end pt-3">Publicado por ' . $nombreUsuario['nombre'] . ' </span><span class=" h6 d-flex flex-row justify-content-end"> Categoría: ' . $categ['nombre_cat'] . ' </span>' ?>
                        </h4>
                        <div class="card-body">
                            <p class="fw-normal fs-6">
                                <?php echo $feedDisplay['contenido'] . '<span class=" h6 d-flex flex-row justify-content-end text-info pt-3"> Publicado el  ' . $feedDisplay['fecha'] . ' </span>'; ?></p>
                            </p>
                            <a href="<?php echo 'topiccomment.php?temaID=' . $feedDisplay['tema_ID']; ?>" class="btn btn-warning">Ver comentarios</a>
                        </div>
                    </div>
                </div>
            <?php
            };
            //Si está seleccionada categoría muestro las publicaciones de esta
        } else {

            $feedCateg = $mibd->prepare('SELECT * FROM tema WHERE categ_ID = ? ORDER BY categ_ID DESC');
            $feedCateg->execute(array($_GET['categ_id']));
            $categ = $info->categName($_GET['categ_id'], $mibd);

            echo '<div class="container p-2 my-3 bg-success text-white rounded">
            <h2 class="display-3 text-center">' . $categ['nombre_cat'] . '</h2></div>';

            while ($feedDisplayCat = $feedCateg->fetch()) {

                $nombreUsuario = $info->userName($feedDisplayCat['usuario_ID'], $mibd);
            ?>
                <div class="container py-3 px-5 bg-light">
                    <div class="card">
                        <h4 class="card-header">
                            <?php echo $feedDisplayCat['titulo'] . '<span class=" h6 d-flex flex-row justify-content-end pt-3">Publicado por ' . $nombreUsuario['nombre'] . ' </span>' ?>
                        </h4>
                        <div class="card-body">
                            <p class="fw-normal fs-6">
                                <?php echo $feedDisplayCat['contenido'] . '<span class=" h6 d-flex flex-row justify-content-end text-info pt-3"> Publicado el  ' . $feedDisplayCat['fecha'] . ' </span>'; ?></p>
                            </p>
                            <a href="<?php echo 'topiccomment.php?temaID=' . $feedDisplayCat['tema_ID']; ?>" class="btn btn-warning">Ver comentarios</a>
                        </div>
                    </div>
                </div>
        <?php
            };
        }
        ?>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>