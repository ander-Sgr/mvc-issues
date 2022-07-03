<section class="h-100 mt-5 ">
    <div class="container h-100 top-mg">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5  ">
                <div class="card rounded-3 text-black">
                    <div class="col-lg-12 ">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center fs-3">
                                <img src="content/images/form-icon.png" alt="logo-merce" class="img-fluid align-text-center" width="100px">
                                FORMULARIO
                            </div>
                            <form method="POST" action="" class="pt-5">
                                <div class="form-outline mb-4">
                                    <label for="material" class="mb-2">MATERIAL</label>
                                    <select id="material" name="material[]" class="form-select">
                                        <option value="teclado">Teclado</option>
                                        <option value="raton">Raton</option>
                                        <option value="monitor">Monitor</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                </div>
                                <div class="form-outline mb-3">
                                    <label for="aula" class="mb-2">AULA</label>
                                    <select id="aula" name="aula[]" class="form-select">
                                        <option value="204">Taller</option>
                                        <option value="102">Informatica</option>
                                        <option value="123">DPT Mecanica</option>
                                        <option value="240">Actos </option>
                                    </select>
                                </div>
                                <div class="form-outiline mb-3">
                                    <label for="prioridad">PRIORIDAD</label>
                                    <select id="prioridad" name="prioridad" class="form-select">
                                        <option value="alta">ALTA</option>
                                        <option value="media">MEDIA</option>
                                        <option value="baja">BAJA</option>
                                    </select>
                                </div>
                                <div class="form-outline mb-3">
                                    <label for="comentario" class="mb-2">Comentario</label>
                                    <textarea class="form-control" name="input-comment" id="comentario" rows="3"></textarea>
                                </div>
                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button class="btn btn-primary pe-lg-5 ps-lg-5 mt-3" type="submit" name="enviar-incidencia">ENVIAR</button>
                                </div>
                                <?php
                                if (isset($_POST['enviar-incidencia'])) {
                                    echo '<div class="container text-center text-white pb-2 bg-success fs-2  pt-1 mb-3">Incidencia Enviada</div>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>