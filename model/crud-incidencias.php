<?php
//OPERACIONES  CRUD de incidencias
include_once 'userLogin.php';
class Incidencias extends ConectarDB
{
    private $id_incidencia;
    private $id_usuario;
    private $fecha_creacion;
    private $fecha_final;

    /**
     * Metodo que devuelve la fecha en la que se envia la incidencia 
     * y en la que se resuelve esa incidencia
     */
    public function getDate()
    {
        $fecha_creacion = new DateTime();
        $this->fecha_creacion = $fecha_creacion->format("Y-m-d h:i:s");
        return $this->fecha_creacion;
    }
    /**
     * Metodo que realiza una inserccion en la tabla incidencias 
     * pasamos como paremetro los datso que queremos insertar 
     */
    public function insertarIncidencia($id_usuario, $fecha_inicio, $material, $comentario, $aula, $prioridad)
    {

        $sql = "INSERT INTO incidencias (id_usuario, fecha_inicio, material, comentario, aula, prioridad)
        VALUES ($id_usuario, '$fecha_inicio', '$material', '$comentario', $aula, '$prioridad')";

        $query = $this->conexion()->prepare($sql);


        $query->execute();
    }

    /**
     * Metodo para el usuairo con ROLE_USER vera solo sus incidencias que estan 
     * aun sin resolver
     */
    public function viewData($id_usuario)
    {
        $sql = "SELECT fecha_inicio, comentario, material, aula, prioridad 
                FROM incidencias WHERE id_usuario = $id_usuario
                AND hecho IS NULL";
        $query = $this->conexion()->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }
    /**
     * Para facilitar  el envio datos de las incidencias del usuario
     * hacemos un getData que devolvera el resultado de ViewData()
     */
    public function getData($id_usuario)
    {
        return $this->viewData($id_usuario);
    }

    /**
     * Metodo que muestra todas las incidencias de todos los usuarios 
     * en resumen son sus tareas que tiene pendiente de resolver
     */
    public function dataAdmin()
    {
        $sql = "SELECT i.id, i.fecha_inicio, i.comentario, u.nombre, i.aula, i.material, i.prioridad, i.hecho 
                FROM incidencias i INNER JOIN usuarios u 
                ON u.id = i.id_usuario  AND i.hecho IS NULL";
        $query = $this->conexion()->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Metodo que  actualizara el campo de fecha_final y hecho en la base de datos
     * dependiendo de la solucion se enivaran e insertara los datos
     * Pasamos com parametro la solucion el id de la incidencia y la fecha en que se ha solucionado esa
     * incidencia
     */
    public function finalizarTarea($solucion, $id, $fecha_final)
    {
        $sql = "UPDATE incidencias
                SET hecho = '$solucion', fecha_final = '$fecha_final'
                WHERE id = $id";

        $query = $this->conexion()->prepare($sql);

        $query->execute();
    }
    /**
     * Historial de todas las incidencias resueltas que puede ver el administrador
     */
    public function historialAdmin()
    {
        $sql = "SELECT *
                FROM incidencias i  JOIN usuarios u
                ON i.id_usuario = u.id AND hecho IS NOT NULL";
        
        $query = $this->conexion()->prepare($sql);

        $query->execute();

        return $query->fetchAll();

    }
    /**
     * Historial de incidencias que puede ver el usuario, 
     * pasamos el id para ver que incidencias le pertence al usuario 
     */
    public function historialUser($id)
    {
        $sql = "SELECT  *
                FROM incidencias i  INNER JOIN usuarios u
                WHERE i.id_usuario = $id AND hecho IS NOT NULL
                AND $id = u.id";
        $query = $this->conexion()->prepare($sql);
     
        $query->execute();

        return $query->fetchAll();

    }
}
