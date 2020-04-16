<?php
    class VendedorModel{
        private $id_vendedor;
        private $nombre_vendedor;
        private $apellido_vendedor;
        private $telefono_vendedor;
        private $usuario;
        private $contrasena;
        
        public function __construct($nombre_vendedor,$apellido_vendedor,$telefono_vendedor,$usuario,$contrasena){
                $this->nombre_vendedor=$nombre_vendedor;
                $this->apellido_vendedor=$apellido_vendedor;
                $this->telefono_vendedor=$telefono_vendedor;
                $this->usuario=$usuario;
                $this->contrasena=$contrasena;
        }
   
        public function getId_vendedor()
        {
                return $this->id_vendedor;
        }

        public function setId_vendedor($id_vendedor)
        {
                $this->id_vendedor = $id_vendedor;

                return $this;
        }

        public function getNombre_vendedor()
        {
                return $this->nombre_vendedor;
        }

        public function setNombre_vendedor($nombre_vendedor)
        {
                $this->nombre_vendedor = $nombre_vendedor;

                return $this;
        }

        public function getApellido_vendedor()
        {
                return $this->apellido_vendedor;
        }

        public function setApellido_vendedor($apellido_vendedor)
        {
                $this->apellido_vendedor = $apellido_vendedor;

                return $this;
        }

        public function getTelefono_vendedor()
        {
                return $this->telefono_vendedor;
        }

        public function setTelefono_vendedor($telefono_vendedor)
        {
                $this->telefono_vendedor = $telefono_vendedor;

                return $this;
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