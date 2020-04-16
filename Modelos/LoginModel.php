<?php 
    class LoginModel{

        private $usuario;
        private $contrasena;

        public function __construct($usuario,$contrasena){
            $this->usuario=$usuario;
            $this->contrasena=$contrasena;
        }

        public function getUsuario()
        {
                return $this->usuario;
        }

        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        public function getContrasena()
        {
                return $this->contrasena;
        }

        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }
    }
?>