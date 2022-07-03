<?php
$title = "Log-in";
$link = "content/style/login-style.css";
require_once("view/layouts/header.php");
?>

<section class="h-100 mt-5 ">
    <div class="container h-100 top-mg">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-10  ">
                <?php
                    if(isset($errorMSG)){
                        echo $errorMSG;
                    }
                ?>
                <div class="card rounded-3 text-black">
                    <div class="row ">
                        <div class="col-lg-6 ">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center ">
                                    <img src="content/images/merce-logo.png" alt="logo-merce" class="img-fluid" width="100px">
                                    <div class="fs-3 h1 mt-3 pt-3 mb-3 pb-1">INS LA MERCE</div>
                                </div>
                                <form action="" method="POST" class="pt-5">
                                    <div class="form-outline mb-3">
                                        <label for="correo">E-mail / Nombre de Usuario</label>
                                        <input type="email" class="form-control" name="email-input" id="correo" placeholder="example@example.com">
                                    </div>
                                    <div class="form-outline mb-3">
                                        <label for="passwd">Contraseña</label>
                                        <input type="password" class="form-control" name="password-input" id="correo" placeholder="introduce contraseña">
                                    </div>
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary pe-lg-5 ps-lg-5 mt-3" type="submit">INICIAR SESION</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 bg-image image-back "></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>