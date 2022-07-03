<?php
//Clase que permite la conexion con la base de datos
class ConectarDB
{
    private $servername;
    private $username;
    private $password;
    private $db;
    /**
     * Metodo constructor donde damos valores
     * a los atributos de la clase ConnectarDB
     */
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db = "gestion-in";
    }
    /**
     * Metodo conexion, hara posible la conexion con la base de datos
     * 
     */
    public function conexion()
    {
        try{
            $datosDb = "mysql:_host=".$this->servername.";dbname=". $this->db;
            
            $conn = new PDO($datosDb, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            print_r('Error de conexion con la db ' . $e->getMessage());
        }

    
    }
}
