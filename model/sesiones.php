<?php
//Clase con los metodos que establece la sesion a cada usuario
    class UserSession{
        /**
         * Inicioamos una sesion llamando al metodo
         * session_start()
         */
        public function __construct()
        {
            session_start();    
        }
        /**
         * Establecemos la sesion del usuario de acuerdo a su 
         * mail 
         */
        public function setUusario($mail){
            $_SESSION['user'] = $mail;
       
        }
        /**
         * A su vez tambien establecemos la sesion del usuario 
         * de acuerdo a su role
         */
        public function setRole($role){
            $_SESSION['role'] = $role;
        }

        /**
         * Obtenemos el usuario
         */
        public function getUsuario(){
            return $_SESSION['user'];
        }
        /**
         * Obtenemos el role del usuario que ha iniciado sesion
         */
        public function getRole(){
            return $_SESSION['role'];
        }

        public function cerrarSesion(){
            session_unset();
            session_destroy();
        }



    }



?>