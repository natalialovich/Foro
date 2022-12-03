<?php

if (isset($_SESSION['usuario']['nombre'])) { ?>

    <div class="containerp-5 bg-light mb-2">
        <h2 class="d-flex flex-row justify-content-end px-3">Bienvenido <?php echo $_SESSION['usuario']['nombre']?>!</h2>
        <div class="d-flex justify-content-end">
            <a href="AddTopic.php" class="btn btn-outline-success btn-sm m-2" type="submit">Publicar una pregunta</a>
            <a href="userTopics.php" class="btn btn-outline-dark btn-sm m-2" type="submit">Ver mis publicaciones</a>
        </div>
    </div>
<?php
} else { ?>
    <h3 class="bg-light d-flex flex-row justify-content-end p-4">Inicia sesión para poder comentar</h3>
<?php
};
