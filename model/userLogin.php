<?php
//CRUD de lo que puede hacer un usuario
    include 'db.php';
    class User extends ConectarDB{
        private $nombre;
        private $correo;
        private $role;
        private $id;

        /**
         * Funcion que verifca de acuerdo al mail y si el password es igual al
         * que tiene ese mail lo dejara entrar
         */
        public function userExists($mail, $pass){
           // $md5pass = md5($pass);
            $sql = $this->conexion()->prepare('SELECT * FROM usuarios WHERE mail = :mail AND password = :pass');
            $sql->execute(['mail' => $mail, 'pass' => $pass]);
    
            if($sql->rowCount()){
                return true;
            }else{
                return false;
            }
        }
        /**
         * De acuerdo al mail pasado como parametro
         * verificamos el tipo de role que tiene ese usuario
         */
        public function getRole($mail){
            $sql = $this->conexion()->prepare('SELECT * FROM usuarios WHERE mail = :mail');
            $sql->execute(['mail' => $mail]);
            $fila = $sql->fetch();

            return $fila;

        }
    
        /**
         * Establecemos los datos del ususario para facilitar el acceso a
         * algunos datos
         */
        public function setUser($mail, $role){
            $sql = $this->conexion()->prepare('SELECT * FROM usuarios WHERE mail=:mail AND role = :role');
            $sql->execute(['mail' => $mail, 'role' => $role]);

            foreach($sql as $usuario){
                $this->correo = $usuario['mail'];
                $this->nombre = $usuario['nombre'];
                $this->role = $usuario['role'];
                $this->id = $usuario['id'];
            }
        }
        /**
         * Accedemos al nombre del usuario
         */
        public function getNombre(){
           return  $this->nombre;
        }
        /**
         * Nos devuelve el id del usuario
         */
        public function getIdUser(){
            return $this->id;;
        }
        /***
         * Nos devuelve el mail de usuario
         */
        public function getMail(){
            return $this->mail;
        }



    }
