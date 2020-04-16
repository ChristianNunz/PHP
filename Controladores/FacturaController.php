<?php 
    class FacturaController{
        public static function Facturar($conection,$factura){
            if (isset($conection) && isset($factura)) {
               
                $query = $conection->prepare("INSERT INTO FACTURA(cantidad_vendida, total_venta, id_cliente, id_producto, id_vendedor, fecha) 
                VALUES(?,?,?,?,?,?);");  

                $cantidad=$factura->getCantidadVendida();
                $totalventa=$factura->getTotalVenta();
                $id_cliente = $factura->getCliente();
                $id_producto= $factura->getProducto();
                $id_vendedor =$factura->getVendedor();
                $fecha=$factura->getFecha();

                $query->bindParam(1, $cantidad);
                $query->bindParam(2, $totalventa);
                $query->bindParam(3, $id_cliente);
                $query->bindParam(4, $id_producto);
                $query->bindParam(5, $id_vendedor); 
                $query->bindParam(6, $fecha); 
                $query->execute();
                 
                //resta al Stock de producto
                $queryR = $conection->prepare("UPDATE producto SET cantidad_producto = cantidad_producto  - ?  where id_producto = ?;");
                $queryR->bindParam(1,$cantidad);
                $queryR->bindParam(2,$id_producto);
                $queryR->execute();
                header("Location: ../../Vistas/Factura/Lista_Facturas.php"); 
            }
        }
            public static function GetFacturas($conection){

                 $result = $conection->query("select id_factura, ct.nombre_cliente,vd.nombre_vendedor, pd.nombre_producto, fa.cantidad_vendida, fa.total_venta, 
                                                                                fa.fecha  from factura fa " . "
                                                     inner join cliente ct on fa.id_cliente = ct.id_cliente " . "
                                                     inner join producto pd on fa.id_producto = pd.id_producto " . "
                                                     inner join vendedor vd on fa.id_vendedor = vd.id_vendedor order by id_factura");
                return  $ListaFacturas = $result->fetchAll(PDO::FETCH_OBJ);
             }

            public static function ElimarFactura($conection, $idf){
                if (isset($idf) && isset($conection)) {
                    $query = $conection->prepare("DELETE FROM FACTURA WHERE id_factura = ?;");
                    $idf = $idf;
                    $query->bindParam(1, $idf);
                    $query->execute();
                    $conection->closelog; 
                    header("Location: ../../Vistas/Factura/Lista_Facturas.php");  
            }
         }
}
?>
