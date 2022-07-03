<?php
include_once 'model/crud-incidencias.php';
// DATA TABLES DEL ADMIN
$incidencia = new Incidencias();
?>
<!-- Tablas del admin que puede ver-->
<div class="container-fluid  mt-5">
    <nav class="ms-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">INCIDENCIAS</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">HISTORIAL-RESUELTOS </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row ms-2 me-3">
                <div class="col-12 bg-light pt-3  pb-3 border">
                    <span class="fs-2 ">
                        <img src="content/images/task-icon.png" alt="task-icon align-text-center" class="img-fluid" width="40">
                        TAREAS PENDIENTES
                    </span>
                    <div class="row me-2 ms-2 mt-5 border border-bottom-0 pt-3">
                        <div class="col">
                            <!-- Datos de todas las incidencias que tiene que resolver el administrador -->
                            <table class="table table-striped mt-5" id="incidencias-in" id="listado">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha Peticion</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Aula</th>
                                        <th scope="col">Material</th>
                                        <th scope="col">Prioridad</th>
                                        <th scope="col">Realizado</th>
                                        <th scope="col">Mensaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //Al instanciar el objeto llamamos al metodo dataAdmin el cual hara posible la recuperacion de datos de la db
                                    $data = $incidencia->dataAdmin();
                                    foreach ($data as $incidencias) {
                                    ?>

                                        <tr>

                                            <td><?php echo $incidencias['fecha_inicio'] ?></td>
                                            <td><?php echo $incidencias['comentario'] ?></td>
                                            <td><?php echo $incidencias['nombre'] ?></td>
                                            <td><?php echo $incidencias['aula'] ?></td>
                                            <td><?php echo $incidencias['material'] ?></td>
                                            <td><?php echo $incidencias['prioridad'] ?></td>
                                            <td>
                                                <!-- Al finalizar la tarea tenemos que enviar los datos modificando solo el campo de hecho
                                                    Al enviar el form se tendra que eliminar la tarea y pasara al historial del admin -->
                                                <form id="form-in" method="POST"><input type="hidden" name="id" value=<?php echo $incidencias['id'] ?> />

                                                    <select form="form-in" name="solucion[]" class="form-select ">
                                                        <option value="ya funciona correctamente">Ya funciona correctamente</option>
                                                        <option value="oido chef">Oido Chef</option>
                                                        <option value="falta comprobarlo">Falta Comprobarlo</option>
                                                        <option value="otros">Otros</option>
                                                    </select>
                                            </td>

                                            <td><input form="form-in" type="submit" class="btn btn-outline-success" name="envia-historial" value="FINALIZAR"></input>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row ms-2 me-2">
                <div class="col-12 bg-light pt-3 pb-3 border">
                    <span class="fs-2 ">
                        <img src="content/images/task-icon.png" alt="task-icon align-text-center" class="img-fluid" width="40">
                        HISTORIAL RESUELTOS
                    </span>
                    <div class="row mt-5 border border-bottom-0 pt-3">
                        <div class="col">
                            <!-- Historial de todas las incidencias resuletas por el administrador -->
                            <table class="table table-striped mt-5" id="incidencias-out" id="listado">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha Realizacion</th>
                                        <th scope="col">Fecha Peticion</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Comentario Admin</th>
                                        <th scope="col">Aula</th>
                                        <th scope="col">Material</th>
                                        <th scope="col">Prioridad</th>
                                    </tr>
                                <tbody>
                                    <?php
                                    //Hacemos una recogida de datos llamando al metodo historialAdmin()
                                    $datos = $incidencia->historialAdmin();
                                    foreach ($datos as $resultos) {
                                    ?>
                                        <tr>
                                            <td><?php echo $resultos['fecha_final'] ?></td>
                                            <td><?php echo $resultos['fecha_inicio'] ?></td>
                                            <td><?php echo $resultos['nombre'] ?></td>
                                            <td><?php echo $resultos['comentario'] ?></td>
                                            <td><?php echo $resultos['hecho'] ?></td>
                                            <td><?php echo $resultos['aula'] ?></td>
                                            <td><?php echo $resultos['material'] ?></td>
                                            <td><?php echo $resultos['prioridad'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$incidencia = "#incidencias-in";
$incidencia2 = "#incidencias-out";
include 'view/layouts/footer.php'; ?>