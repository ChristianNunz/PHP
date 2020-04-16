<?php 
    class ProductoController{
        
        public static function InsertarProducto($conection,$Producto){
            if (isset($Producto)) {
                $query = $conection->prepare("INSERT INTO PRODUCTO(nombre_producto, precio_producto, cantidad_producto, descripcion_producto) 
                                              VALUES(?,?,?,?);");                 
                    $nombrep=$Producto->getNombre_producto();
                    $precio=$Producto->getPrecio_producto();
                    $cantidad=$Producto->getCantidad_producto();
                    $descripcion=$Producto->getDescripcion_producto();
                   
                    $query->bindParam(1, $nombrep);
                    $query->bindParam(2, $precio);
                    $query->bindParam(3, $cantidad);
                    $query->bindParam(4, $descripcion);
                    $query->execute();
                    header("Location: ../../Vistas/Producto/Lista_Productos.php"); 
                    }
        }

        public static function EditarProducto($conection,$Producto){
            $query = $conection->prepare("UPDATE PRODUCTO SET nombre_producto = ?, precio_producto = ?, cantidad_producto = ? , descripcion_producto = ? 
                                         WHERE id_producto = ?;");
                if (isset($Producto)) {
                    $id_producto=$Producto->getId_prodcuto();
                    $nombrep=$Producto->getNombre_producto();
                    $precio=$Producto->getPrecio_producto();
                    $cantidad=$Producto->getCantidad_producto();
                    $descripcion=$Producto->getDescripcion_producto();
       
                    $query->bindParam(1, $nombrep);
                    $query->bindParam(2, $precio);
                    $query->bindParam(3, $cantidad);
                    $query->bindParam(4, $descripcion);
                    $query->bindParam(5, $id_producto);
                  
                    $query->execute(); 
                 
                    header("Location: ../../Vistas/Producto/Lista_Productos.php"); 
                }
         }

         public static function EliminarProducto($conection, $id_producto){
            if (isset($id_producto) && isset($conection)) {
                $query = $conection->prepare("DELETE FROM PRODUCTO WHERE id_producto = ?;");
                $idp = $id_producto;
                $query->bindParam(1, $idp);
                $query->execute();
                $conection->closelog; 
                header("Location: ../../Vistas/Producto/Lista_Productos.php");   
                ob_end_flush();                  
            }
    }

            public static function GetProductos($conection){
                $result = $conection->query("SELECT * FROM PRODUCTO order by id_producto");
            return  $listaProductos = $result->fetchAll(PDO::FETCH_OBJ);
            }
}
?>