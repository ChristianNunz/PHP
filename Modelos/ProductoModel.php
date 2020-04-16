<?php 
    class ProductoModel{
        
        private $id_prodcuto;
        private $nombre_producto;
        private $precio_producto;
        private $cantidad_producto;
        private $descripcion_producto;

        public function __construct($nombre_producto,$precio_producto,$cantidad_producto,$descripcion_producto){
            $this->nombre_producto=$nombre_producto;
            $this->precio_producto=$precio_producto;
            $this->cantidad_producto=$cantidad_producto;
            $this->descripcion_producto=$descripcion_producto;
        }

        public function getId_prodcuto()
        {
                return $this->id_prodcuto;
        }

        public function setId_prodcuto($id_prodcuto)
        {
                $this->id_prodcuto = $id_prodcuto;

                return $this;
        }

        public function getNombre_producto()
        {
                return $this->nombre_producto;
        }

        public function setNombre_producto($nombre_producto)
        {
                $this->nombre_producto = $nombre_producto;

                return $this;
        }

        public function getCantidad_producto()
        {
                return $this->cantidad_producto;
        }

        public function setCantidad_producto($cantidad_producto)
        {
                $this->cantidad_producto = $cantidad_producto;

                return $this;
        }

        public function getPrecio_producto()
        {
                return $this->precio_producto;
        }

        public function setPrecio_producto($precio_producto)
        {
                $this->precio_producto = $precio_producto;

                return $this;
        }

        public function getDescripcion_producto()
        {
                return $this->descripcion_producto;
        }

    
        public function setDescripcion_producto($descripcion_producto)
        {
                $this->descripcion_producto = $descripcion_producto;

                return $this;
        }
    }
?>