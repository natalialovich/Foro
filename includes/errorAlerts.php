<?php
//Alertas de error y de envío coorrecto
if (isset($_GET['envio'])) {
    echo '<h3 class="alert alert-success d-flex justify-content-center">Se ha publicado correctamente</h3>';
}
if (isset($_GET['eliminado'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">Eliminada correctamente</h3>';
}
if (isset($_GET['error1'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">Por favor rellena los campos </h3>';
}
if (isset($_GET['error2'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">No se ha encontrado la publicación</h3>';
}
if (isset($_GET['error3'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">No has iniciado sesión</h3>';
}
if (isset($_GET['error4'])) {
    echo '<h3 class="bg-light d-flex  justify-content-center">No eres el autor de esta publicación<h3>';
}
if (isset($_GET['error5'])) {
    echo '<h3 class="bg-light d-flex  justify-content-center">Página no encontrada<h3>';
}
if (isset($_GET['error6'])) {
    echo '<h3 class="bg-light d-flex  justify-content-center">Por favor rellena los campos<h3>';
}
//Mensajes de error login
if (isset($_GET['erroridusuario'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">El apartado email es obligatorio</h3>';
}
if (isset($_GET['errorPasswi'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">Por favor ingresa una contraseña</h3>';
}
if (isset($_GET['mensajeError'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">Email o contraseña incorrectos</h3>';
}
if (isset($_GET['Alta'])) {
    echo '<h3 class="alert alert-success d-flex justify-content-center">Alta realizada correctamente! Te hemos enviado un correo electrónico, abre el link que hemos enviado para validar tu correo.</h3>';
}
//Mensajes de error signup
if (isset($_GET['errorNombre'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">El apartado NOMBRE es obligatorio</h3>';
}
if (isset($_GET['error'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">Ya existe este usuario, por favior inicia sesión</h3>';
}
if (isset($_GET['errorEmail'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center"> Por favor usa un email válido</h3>';
}
if (isset($_GET['errorPassw'])) {
    echo '<h3 class="alert alert-danger d-flex justify-content-center">La contraseña debe tener almenos 6 carácteres</h3>';
}
