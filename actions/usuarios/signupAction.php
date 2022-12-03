<?php

//Incluyo el fichero de conexión
include '../connection.php' ?>
<?php

   if(isset ($_POST['form'])) {
   
    if (filter_has_var(INPUT_POST, 'enviar')) {
        $nombre = htmlspecialchars($_POST['nombre']);
        $passw = STRIP_TAGS($_POST['passw']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        //Validación 
        if (empty($nombre)) {
            header("location: ../../signup.php?errorNombre=NOMBREesobligatorio");
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            header("location: ../../signup.php?errorEmail=emailInvalido");
            $email = 0;
        }
        if (strlen($passw) < 6) {
            header("location: ../../signup.php?errorPassw=LaContraseñaDebeTener&caracteres");
            $passw = 0;
        }

        //envío de email si todo está correcto
        if ($nombre && $passw && $email) {

            try {
                //impide inyeciones de SQL
                $seleccion = $mibd->prepare("SELECT nombre,email FROM usuarios WHERE email = :email");
                $seleccion->execute([':email' => $email]);
                $row = $seleccion->fetch(PDO::FETCH_ASSOC);

                if (isset($row['email']) == $email) {
                    header('location:../../signup.php?error=yaexisteelusuario');
                } else {
                    //Encripta la contraseña 
                    $hashed_passw = password_hash($passw, PASSWORD_DEFAULT);
                    //INSERTO LA INFO
                    $insertar = $mibd->prepare("INSERT INTO usuarios (nombre,email, contraseña) VALUES (:nombre,:email,:passw)");
                    if ($insertar->execute(
                        [
                            ':nombre' => $nombre,
                            ':email' => $email,
                            ':passw' => $hashed_passw
                        ]
                    )) {

                        $para = $email;
                        $asunto = 'Alta de usuario nuevo: ' . $nombre;
                        $mensaje = 'Abre el link para validar tu correo';
                        $cabeceras = 'From: ramonalarotta@gmail.com' . "\r\n" .
                            'Reply-To: ramonalarotta@gmail.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();;

                        mail($para, $asunto, $mensaje, $cabeceras);

                        $_SESSION['usuario']['nombre']  = $rowi["nombre"];
                        $_SESSION['usuario']['email']  = $rowi["email"];
                        header("location:  ../../login.php?Alta=realizadaCorrectamente");

                    }
                }
            } catch (PDOException $e) {
                $errorPdo = $e->getMessage();
                echo 'error sql';
            }
        }
    }
}



?>
