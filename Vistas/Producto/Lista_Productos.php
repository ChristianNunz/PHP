<?php
      include_once "../../Modelos/ProductoModel.php";
      include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Controladores/ProductoController.php";

      $c = new Coneccion();
      $coneccion = $c->ConeccionBD();  
      $Producto = new ProductoController();
      $listaProducto = $Producto->GetProductos($coneccion);
      ob_start();
      session_start();
      if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {
 
      }
      else{
         header("Location: ../../Index.php"); 
      }
?>

<?php include "../head.html"?>
    <script type="text/javascript">
        function ConfrimarEliminacion(){
            var respuesta= confirm("Estas Seguro de eliminar el producto ?");
            if (respuesta == true) {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
    <div class="row">
        <div class="col-12">
        <br>
        <br>
        <h1 style="color: black">Lista De Productos</h1>
        <br>
        <br>
            <div class="table table-responsive">
            <table class="table table-borderless" >
                <thead class="thead-dark" style="color: black">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Producto
                        </th>
                        <th>
                            Precio 
                        </th>
                        <th>
                            Cantidad
                        </th>
                        <th>
                            Descripcion
                        </th>
                        <th>

                        </th>
                         <th>

                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($listaProducto as $listaProducto){ ?>
                    <tr style="color: black">
                        <td>
                            <?php echo $listaProducto->id_producto?>
                        </td>
                        <td>
                            <?php echo $listaProducto->nombre_producto ?>
                        </td>
                        <td>
                            <?php echo "$".$listaProducto->precio_producto ?>
                        </td>
                        <td>
                        <?php echo $listaProducto->cantidad_producto ?>
                        </td>
                        <td>
                        <?php echo $listaProducto->descripcion_producto ?>
                        </td>
                        <td>
                        <a class="btn btn-warning" href="<?php echo "../../Vistas/Producto/EditarProductos.php?id_producto=" . $listaProducto->id_producto?>"> Editar 📝 </a>
                        </td>
                        <td>                         
                        <form action="" method="post">
                            <?php 
                                if (isset($_POST['idp'])) {
                                    ProductoController::EliminarProducto($coneccion,$_POST['idp']);                                                               
                                }
                            ?>
                            <input type="hidden" required name="idp" value="<?php echo $listaProducto->id_producto?>">
                            <input type="submit" class="btn btn-danger"  name="accion" value="Eliminar 🗑️" onclick="return ConfrimarEliminacion()">
                        </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </div>
        </div>
    </div>
<?php include "../foot.html"?>