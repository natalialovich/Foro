<!DOCTYPE html>
<html lang="es">

<?php 
include 'includes/head.php'; 
include 'actions/connection.php';
?>
<body class=" bg-dark pb-5">
    <?php include 'includes/navbar.php'; ?>
    <section class=" bg-dark pb-5">
        <?php include 'includes/errorAlerts.php'; ?>
        <div class="container p-2 my-3 bg-success text-white rounded">
            <h1 class="display-3 text-center">Inicia sesión</h1>
        </div>
        <div class="container p-5 bg-light" style="width: 28rem;">
            <form id="entra" method="post" action="actions/usuarios/loginAction.php">
                <input type="hidden" name="form" value="iniciaform">
                <div class="form-group">
                    <label for="idusuario">Correo electrónico: </label>
                    <input class="form-control" type="email" name="idusuario" value="">
                </div>
                <div class="form-group">
                    <label for="passwi">Contraseña: </label>
                    <input class="form-control" type=password name="passwi" value="">
                </div>
                <button class="btn btn-primary m-3" name="entrar">Entrar</button>
            </form>
            <p>Aun no tienes una cuenta? <a href="signup.php">Regístrate</a></p>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>