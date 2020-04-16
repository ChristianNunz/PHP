<?php 
    class ClienteModel{
        private $id_cliente;
        private $nombre_cliente;
        private $apellidos_cliente;
        private $telefono_cliente;

        public function __construct($nombre_cliente,$apellidos_cliente,$telefono_cliente){
                $this->nombre_cliente=$nombre_cliente;
                $this->apellidos_cliente=$apellidos_cliente;
                $this->telefono_cliente=$telefono_cliente;
        }

        public function getId_cliente()
        {
                return $this->id_cliente;
        }

        public function setId_cliente($id_cliente)
        {
                $this->id_cliente = $id_cliente;

                return $this;
        }

        public function getNombre_cliente()
        {
                return $this->nombre_cliente;
        }

        public function setNombre_cliente($nombre_cliente)
        {
                $this->nombre_cliente = $nombre_cliente;

                return $this;
        }
    
        public function getApellidos_cliente()
        {
                return $this->apellidos_cliente;
        }

        public function setApellidos_cliente($apellidos_cliente)
        {
                $this->apellidos_cliente = $apellidos_cliente;

                return $this;
        }

        public function getTelefono_cliente()
        {
                return $this->telefono_cliente;
        }

        public function setTelefono_cliente($telefono_cliente)
        {
                $this->telefono_cliente = $telefono_cliente;

                return $this;
        }
    }
?>