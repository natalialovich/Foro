<?php

//Incluyo el fichero de conexión
include '../connection.php';

if (isset($_POST['form'])) {

    //variables con los datos del formulario
    if (filter_has_var(INPUT_POST, 'entrar')) {
        $idusuario = htmlspecialchars($_POST['idusuario']);
        $passwi = STRIP_TAGS($_POST['passwi']);

        //Validación 
        if (empty($idusuario)) {
            header("location: ../../login.php?erroridusuario=emailIncorrecto");
        }
        if (empty($passwi)) {
            header("location: ../../login.php?errorPasswi=contraseñaIncorrecta");
        }
        //Si no hay errores busco en la bd al usuario
        if ($idusuario && $passwi) {
            $buscaUsuario = $mibd->prepare("SELECT * FROM usuarios WHERE email = :idusuario LIMIT 1");

            $buscaUsuario->execute(
                [
                    ":idusuario" => $idusuario
                ]
            );

            $rowi = $buscaUsuario->fetch(PDO::FETCH_ASSOC);

            //Si existe el usuario, inicio sesión
            if ($buscaUsuario->rowCount() > 0) {
                if (password_verify($passwi, $rowi["contraseña"])) {
                    
                    $_SESSION['usuario']['usuario_ID']  = $rowi["usuario_ID"];
                    $_SESSION['usuario']['nombre']  = $rowi["nombre"];
                    $_SESSION['usuario']['email']  = $rowi["email"];
                    header("location:  ../../index.php");
                } else {
                    header("location: ../../login.php?mensajeError=emailocontraseñaIncorrectos");
                }
            } else {
                header("location: ../../login.php?mensajeError=emailocontraseñaIncorrectos");
            }
        }
    }
}

?>
