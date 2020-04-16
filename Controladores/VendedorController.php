<?php
    class VendedorController{

        public static function InsertarVendedor($conection, $Ven){
            $semilla1='!@11chN-27';
            $semilla2='>,A|3X>n*e$';

            if (isset($conection) && isset($Ven)) {

                $query = $conection->prepare("INSERT INTO VENDEDOR(nombre_vendedor, apellido_vendedor, telefono_vendedor,usuario,contrasena) 
                                              VALUES(?,?,?,?,?);");
                $nombre=$Ven->getNombre_vendedor();
                $apellido=$Ven->getApellido_vendedor();
                $tel=$Ven->getTelefono_vendedor();
                $user=$Ven->getUsuario();
                $pass=$Ven->getContrasena();

                $passE= md5(md5(sha1($semilla1.$pass.$semilla2)));

                $query->bindParam(1, $nombre);
                $query->bindParam(2, $apellido);
                $query->bindParam(3, $tel);
                $query->bindParam(4, $user);
                $query->bindParam(5, $passE); 
                $query->execute();
                $conection->closelog;
                header("Location: ../../Vistas/Vendedor/V_Vendedor.php"); 
            }
        }

        public static function EditarVendedor($conection ,$Ven){
            $query = $conection->prepare("UPDATE VENDEDOR SET nombre_vendedor = ?, apellido_vendedor = ?, telefono_vendedor = ? , usuario = ? , contrasena = ?
                                          WHERE id_vendedor = ?;");

                $semilla1='!@11chN-27';
                $semilla2='>,A|3X>n*e$';
    
                if (isset($Ven)) {
                    $id_vendedor=$Ven->getId_vendedor();
                    $nombre=$Ven->getNombre_vendedor();
                    $apellido=$Ven->getApellido_vendedor();
                    $tel=$Ven->getTelefono_vendedor();
                    $user=$Ven->getUsuario();
                    $pass=$Ven->getContrasena();

                    $passE= md5(md5(sha1($semilla1.$pass.$semilla2)));
       
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $apellido);
                    $query->bindParam(3, $tel);
                    $query->bindParam(4, $user);
                    $query->bindParam(5, $passE);
                    $query->bindParam(6,$id_vendedor); 
                    $query->execute(); 
                 
                    header("Location: ../../Vistas/Vendedor/Lista_Vendedores.php"); 
                }
        }

        public static function VendedorEliminar($conection, $idv){
            if (isset($idv) && isset($conection)) {
                $query = $conection->prepare("DELETE FROM VENDEDOR WHERE id_vendedor = ?;");
                $idv = $idv;
                $query->bindParam(1, $idv);
                $query->execute();
                $conection->closelog; 
                header("Location: ../../Vistas/Vendedor/Lista_Vendedores.php");   
                ob_end_flush();                  
            }
           
           }

        public static function GetVendedores($conection){
            $result = $conection->query("SELECT * FROM VENDEDOR order by id_vendedor");
              return  $listaVendedores = $result->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>