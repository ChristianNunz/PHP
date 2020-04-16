<?php
    class Coneccion{
        private $password = "crud";
        private $user = "crud";
        private $bd = "crud";
        private $server = "localhost";
        private $puerto = "5432";

         public function ConeccionBD()
        {
          
            try {
                $conection = new PDO("pgsql:host={$this->server};port={$this->puerto};dbname={$this->bd}", $this->user, $this->password);
                $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "ERROR: " . $e->getMessage();
            }
            return $conection;
        }

    }
?>