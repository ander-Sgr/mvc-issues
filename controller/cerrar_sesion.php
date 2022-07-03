<?php
    //Destruimos la sesion del usuario y nos redirigira al apartado del login
    require '../model/sesiones.php';
    $cerrarSesion = new UserSession();
    $cerrarSesion->cerrarSesion();
    header("Location: ../index.php");
?>