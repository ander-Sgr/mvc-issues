<?php
include_once 'model/userLogin.php';
include_once 'model/sesiones.php';
//instancioamos el objeto userSession que contendra los metodos para inicar la sesion
$sessionUsuario = new UserSession();
//instancioamos el objeto User contendra el crud que podra hacer el usuario
$usuario = new User();

//$tipoRole = $usuario->getRole($mailForm);
//verificamos si las variables user y role estan definidas y esta condicion lo que hara es hacer un check si existe una sesion
if (isset($_SESSION['user']) && isset($_SESSION['role'])) {

    //si el usuario es Admin establecemos la sesion de ese usuario y lo mandamos a la pagina del admin
    if ($sessionUsuario->getRole() == 'ROLE_ADMIN') {
        $usuario->setUser($sessionUsuario->getUsuario(),  $sessionUsuario->getRole());
        include_once 'view/paginas/admin.php';
    } else {
        //entonces si no es admin lo redireccionamos a la pagina del user
        $usuario->setUser($sessionUsuario->getUsuario(),  $sessionUsuario->getRole());
        include_once 'view/paginas/user.php';
    }
    //ahora verificamos si las variables de emial-input y password-input estan definidasa
} else if (isset($_POST['email-input']) && isset($_POST['password-input'])) {
    //echo 'Validacion de login';
    //recogemos los datos del formulario y el tipo de role del usuario
    $mailForm = $_POST['email-input'];
    $passForm = $_POST['password-input'];
    $tipoRole = $usuario->getRole($mailForm);
    //si el usuario existe hacemos un switch para ver que tipo de usuario es y de acuerdo a eso lo enviamos a su pagina 
    $row = $tipoRole['role'];
    if ($usuario->userExists($mailForm, $passForm)) {
        switch ($row) {
            case 'ROLE_ADMIN':
                $sessionUsuario->setUusario($mailForm);
                $sessionUsuario->setRole($row);
                $usuario->setUser($mailForm, $row);
                include_once 'view/paginas/admin.php';
                break;

            case 'ROLE_USER':
                $sessionUsuario->setUusario($mailForm);
                $sessionUsuario->setRole($row);
                $usuario->setUser($mailForm, $row);
                include_once 'view/paginas/user.php';
                break;
        }
        // si el usuario no existe le indicamos un error de mensaje
    } else {
        $errorMSG = '<div class="container text-center text-white pb-2 bg-danger fs-4  pt-1 mb-3">Correo y/o contraseÃ±a incorrecta</div>';
        // y lo mandamos al login
        include 'view/paginas/login.php';
    }
    /* if ($row == "ROLE_ADMIN" && $usuario->userExists($mailForm, $passForm)) {
        $sessionUsuario->setUusario($mailForm);
        $sessionUsuario->setRole($row);
        $usuario->setUser($mailForm, $row);
        include_once 'view/paginas/admin.php';
    } else {
        $sessionUsuario->setUusario($mailForm);
        $sessionUsuario->setRole($row);
        $usuario->setUser($mailForm, $row);
        include_once 'view/paginas/user.php';
    }*/
} else {
    //en caso de que no exista ninguna sesion mostraremos el login
    include_once 'view/paginas/login.php';
}