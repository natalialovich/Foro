<nav class="navbar navbar-expand-lg bg-dark navbar-dark border-bottom border-light">
    <div class="container-fluid d-flex justify-content-end">
        <a href="index.php" class="navbar-brand h1 fs-3 mx-4 flex-grow-1">Foro Ebanistería</a>
        <span class="navbar-text text-muted">CATEGORÍAS:</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="index.php?categ_id=1" class="nav-link">Juntas</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=2" class="nav-link">Maderas</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=3" class="nav-link">Herramientas</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=4" class="nav-link">Taller</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=5" class="nav-link">Acabados</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=6" class="nav-link">Maquinaria</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=7" class="nav-link">Torno</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?categ_id=8" class="nav-link">Talla</a>
                </li>
            </ul>

            <?php
            //verifico que el usuario ha iniciado sesión para mostrar el botón de inicio se sesión

            if (!isset($_SESSION['usuario']['usuario_ID'])) {

                echo '<a href="login.php" class="btn btn-outline-warning me-2" type="submit">Iniciar sesión</a>
                <a href="signup.php" class="btn btn-outline-warning me-2" type="submit">Registrarse</a>';

            } else {

                echo ' <a class="btn btn-outline-primary me-2" href= "actions/usuarios/logoutAction.php">Cerrar Sesión</a>';
            }

            ?>
        </div>
    </div>
</nav>