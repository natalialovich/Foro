<!--Trabajo final presentado por Natalia Lovich para la asignatura PHP-MYSQL, SEAS 2022-->
<?php
//verifico que el usuario ha iniciado sesión 
session_start();

if (!isset($_SESSION['usuario']['usuario_ID'])) {

    header('location: index.php?error3=nohainiciadosesion');
}

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
            <form id="comenta" method="post" action="actions/temas-comentarios/AddTopicAction.php">
                <h2>Nuevo tema</h2>
                <div class="form-group">
                    <input type="hidden" name="form" value="iniciaform">
                    <label for="title">Título:</label>
                    <input class="form-control" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="text">Descripción:</label>
                    <textarea rows="5" class="form-control" type="text" name="text"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Categoría</label>
                    <select id="category" name='category' class="form-control">
                        <option selected value='1'>Juntas</option>
                        <option value='2'>Maderas</option>
                        <option value='3'>Herramientas</option>
                        <option value='4'>Taller</option>
                        <option value='5'>Acabados</option>
                        <option value='6'>Maquinaria</option>
                        <option value='7'>Torno</option>
                        <option value='8'>Talla</option>
                    </select>
                </div>
                <button class="btn btn-primary m-3" name="publish">Publicar</button>
            </form>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>