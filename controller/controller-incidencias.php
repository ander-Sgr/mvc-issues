<?php
include_once 'model/crud-incidencias.php';

$crudIn = new Incidencias();
$date = $crudIn->getDate();


function getValues($index)
{

    foreach ((array)$index as $key => $value) {
        return $value;
    }
}

if (isset($_POST['enviar-incidencia'])) {

    $material = $_REQUEST['material'];
    $aula = $_REQUEST['aula'];
    $prioridad = $_REQUEST['prioridad'];
    $comentario = $_REQUEST['input-comment'];
    // print $usuario->getIdUser() . "ID USUARIO";

    $idUser = $usuario->getIdUser();

    $envio = $crudIn->insertarIncidencia($idUser, $date, getValues($material), $comentario, getValues($aula),  getValues($prioridad));
    
  
}else if(isset($_POST['envia-historial'])){
    $id = $_REQUEST['id'];
    $solucion = $_REQUEST['solucion'];
    $sol = getValues($solucion);

    echo $sol;

    $crudIn->finalizarTarea(getValues($solucion), $id, $date);
}



