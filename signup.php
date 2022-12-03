<!DOCTYPE HTML>
<html lang="es">

<?php 
include 'includes/head.php';
include 'actions/connection.php';
?>

<body class=" bg-dark pb-5">
    <?php include 'includes/navbar.php'; ?>
    <section class=" bg-dark pb-5">
        <?php include 'includes/errorAlerts.php';?>
        <div class="container p-2 my-3 bg-success text-white rounded">
            <h1 class="display-3 text-center">Regístrate</h1>
        </div>
        <div class="container p-5 bg-light" style="width: 28rem;">
            <form id="alta" method="post" action="actions/usuarios/signupAction.php">
                <input type="hidden" name="form" value="altaform">
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input class="form-control" type="text" name="nombre" value="">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input class="form-control" type="email" name="email" value="">
                </div>
                <div class="form-group">
                    <label for="passw">Contraseña: </label>
                    <input class="form-control" type=password name="passw" value="">
                </div>
                <button class="btn btn-primary m-3" name="enviar">Darse de alta</button>
            </form>
            <p>Ya tienes una cuenta? <a href="login.php">inicia sesión</a></p>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>