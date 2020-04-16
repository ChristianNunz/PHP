<?php
    class ClienteController{

        public static function InsertarCliente($conection,$Cliente){
            if (isset($Cliente)) {
                $query = $conection->prepare("INSERT INTO CLIENTE(nombre_cliente, apellidos_cliente, telefono_cliente) 
                                              VALUES(?,?,?);");                 
                    $nombrec=$Cliente->getNombre_cliente();
                    $apellidoc=$Cliente->getApellidos_cliente();
                    $telc=$Cliente->getTelefono_cliente();
                   
                    $query->bindParam(1, $nombrec);
                    $query->bindParam(2, $apellidoc);
                    $query->bindParam(3, $telc);
                    $query->execute();
                    header("Location: ../../Vistas/Cliente/Lista_Clientes.php"); 
                    }
        }
        public static function EditarCliente($conection,$Cliente){
            $query = $conection->prepare("UPDATE CLIENTE SET nombre_cliente = ?, apellidos_cliente = ?, telefono_cliente = ?
                                         WHERE id_cliente = ?;");
                if (isset($Cliente)) {
                    $id_cliente=$Cliente->getId_cliente();
                    $nombrec=$Cliente->getNombre_cliente();
                    $apellidoc=$Cliente->getApellidos_cliente();
                    $tel=$Cliente->getTelefono_cliente();
                 
       
                    $query->bindParam(1, $nombrec);
                    $query->bindParam(2, $apellidoc);
                    $query->bindParam(3, $tel);
                    $query->bindParam(4, $id_cliente);
                   
                    $query->execute(); 
                 
                    header("Location: ../../Vistas/Cliente/Lista_Clientes.php"); 
                }
            
        }
        public static function ClienteEliminar($conection, $idC){
            if (isset($idC) && isset($conection)) {
                $query = $conection->prepare("DELETE FROM CLIENTE WHERE id_cliente = ?;");
                $idc = $idC;
                $query->bindParam(1, $idc);
                $query->execute();
                $conection->closelog; header("Location: ../../Vistas/Cliente/Lista_Clientes.php");   
                ob_end_flush();                  
            }
           
           }
        public static function GetClientes($conection){
            $result = $conection->query("SELECT * FROM CLIENTE order by id_cliente");
              return  $listaClientes = $result->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>