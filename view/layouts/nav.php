<?php

require_once("header.php");
?>
<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm  navbar-dark bg-dark pb-2 pt-2 ">
    <div class="container-fluid">
        <span class="navbar-brand" href="#">
            <img src="content/images/merce-logo.png" alt="logo-merce" width="35" class="pb-1 ms-3 me-2 d-inline-block align-text-center">
            Ins la Merce
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-white pe-5 ">
                <li class="nav-item pe-5 pb-3 pt-3 pb-lg-0 pt-lg-0 pb-md-0 pt-md-0 pt-sm-0 pb-sm-0">
                    <img src="content/images/user.png" alt="user-icon" class="d-inline-block align-text-center" width="25">
                    <?php echo $usuario->getNombre(); ?>
                    <?php echo $usuario->getIdUser() ?>
                </li>
                <li class="nav-item pb-1"><a href="controller/cerrar_sesion.php" class="text-decoration-none text-white">
                        <img src="content/images/logout.png" alt="icon-logout" class="d-inline-block align-text-center pb-1" width="25">
                        SALIR
                    </a>

                </li>
            </ul>
        </div>
    </div>
</nav>