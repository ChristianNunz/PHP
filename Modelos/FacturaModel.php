<?php 
    class FacturaModel {
        private $id_factura;
        private $cliente;
        private $vendedor;
        private $producto;
        private $cantidadVendida;
        private $totalVenta;
        private $fecha;
        public function __construct($cliente,$producto,$vendedor,$cantidadVendida,$totalVenta,$fecha){
            $this->cliente=$cliente;
            $this->vendedor=$vendedor;
            $this->producto=$producto;
            $this->cantidadVendida=$cantidadVendida;
            $this->totalVenta=$totalVenta;
            $this->fecha=$fecha;
            
        }

        public function getId_factura()
        {
                return $this->id_factura;
        }

        public function setId_factura($id_factura)
        {
                $this->id_factura = $id_factura;

                return $this;
        }

        public function getCantidadVendida()
        {
                return $this->cantidadVendida;
        }

        public function setCantidadVendida($cantidadVendida)
        {
                $this->cantidadVendida = $cantidadVendida;

                return $this;
        }

        public function getTotalVenta()
        {
                return $this->totalVenta;
        }


        public function setTotalVenta($totalVenta)
        {
                $this->totalVenta = $totalVenta;

                return $this;
        }

        public function getProducto()
        {
                return $this->producto;
        }

   
        public function setProducto($producto)
        {
                $this->producto = $producto;

                return $this;
        }

        public function getCliente()
        {
                return $this->cliente;
        }

        public function setCliente($cliente)
        {
                $this->cliente = $cliente;

                return $this;
        }


        public function getVendedor()
        {
                return $this->vendedor;
        }


        public function setVendedor($vendedor)
        {
                $this->vendedor = $vendedor;

                return $this;
        }

        public function getFecha()
        {
                return $this->fecha;
        }

        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }
    }
?>