<?php
include_once 'model/crud-incidencias.php';
$incidencia = new Incidencias();
$idUser = $usuario->getIdUser();
?>
<!-- DATA TABLES DEL USUARIO-->
<div class="container-md mt-5">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">INCIDENCIAS</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">HISTORIAL-RESUELTOS </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-12 bg-light pt-3 pb-3 border">
                    <span class="fs-2 ">
                        <img src="content/images/task-icon.png" alt="task-icon align-text-center" class="img-fluid" width="40">
                        INCIDENCIAS
                    </span>
                    <div class="row mt-5 border border-bottom-0 pt-3">
                        <div class="col">
                            <table class="table table-striped mt-5" id="incidencias-in" id="listado">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha Peticion</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Material</th>
                                        <th scope="col">Aula</th>
                                        <th scope="col">Prioridad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $incidencia->getData($idUser);
                                    foreach ($data as $incidencias) {
                                    ?>
                                        <tr>
                                            <td><?php echo $incidencias['fecha_inicio'] ?></td>
                                            <td><?php echo $incidencias['comentario'] ?></td>
                                            <td><?php echo $incidencias['material'] ?></td>
                                            <td><?php echo $incidencias['aula'] ?></td>
                                            <?php
                                            if ($incidencias['prioridad'] == 'baja') {
                                                echo '<td class="fw-bold text-white" style="background-color:  #96cdd0  ">' . $incidencias['prioridad'] . '</td>';
                                            } else if ($incidencias['prioridad'] == 'media') {
                                                echo '<td class="fw-bold text-white" style="background-color:  #ec7a4f   ">' . $incidencias['prioridad'] . '</td>';
                                            } else {
                                                echo '<td class="fw-bold text-white" style="background-color:  #c86c6a    ">' . $incidencias['prioridad'] . '</td>';
                                            }
                                            ?>


                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
                <div class="col-12 bg-light pt-3 pb-3 border">
                    <span class="fs-2 ">
                        <img src="content/images/task-icon.png" alt="task-icon align-text-center" class="img-fluid" width="40">
                        HISTORIAL RESUELTOS
                    </span>
                    <div class="row mt-5 border border-bottom-0 pt-3">
                        <div class="col">
                            <table class="table table-striped mt-5" id="incidencias-out" id="listado">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha Peticion</th>
                                        <th scope="col">Fecha Realizacion</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Comentario Admin</th>
                                        <th scope="col">Aula</th>
                                        <th scope="col">Material</th>
                                        <th scope="col">Prioridad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $datos = $incidencia->historialUser($idUser);
                                    foreach ($datos as $resultos) {
                                    ?>
                                        <tr>
                                            <td><?php echo $resultos['fecha_inicio'] ?></td>
                                            <td><?php echo $resultos['fecha_final'] ?></td>
                                            <td><?php echo $resultos['comentario'] ?></td>
                                            <td><?php echo $resultos['hecho'] ?></td>
                                            <td><?php echo $resultos['aula'] ?></td>
                                            <td><?php echo $resultos['material'] ?></td>
                                            <td><?php echo $resultos['prioridad'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
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