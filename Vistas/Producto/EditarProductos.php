<?php include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Modelos/ProductoModel.php";
      include_once "../../Controladores/ProductoController.php";
     $c = new Coneccion();
     $conection = $c->ConeccionBD();
     session_start();
     if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {

     }
     else{
        header("Location: ../../Index.php"); 
     }
?>
<?php 
    //Consulta de la persona a Editar
      if (!isset($_GET["id_producto"])) {
        exit();
     }
            $query = $conection->prepare("SELECT *  FROM PRODUCTO 
                                        WHERE id_producto =?;");
            $query->execute([$_GET["id_producto"]]);
            $result = $query->fetchObject();
            if (!$result) {
                echo "No existe este producto";
                exit();
            }
?>
<?php include "../head.html"?>
<main role="main" class="container" >
    <div class="row">
        <div class="col-12">
               <br>
                <br>
            <h1 style="color: black"> Editar Producto</h1>
            <br><br>
        <form action="" method="POST">
                <?php 
                    if ( isset($_POST['nombreProducto']) && isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['descripcion'])) {       
                        $Producto = new ProductoModel($_POST['nombreProducto'],$_POST['precio'],$_POST['cantidad'],$_POST['descripcion']);  
                        $Producto->setId_prodcuto($_POST['id_producto']);                       
                        ProductoController::EditarProducto($conection,$Producto);
                    }
                ?>
                
                <div class="form-group">
                        <h5><label for="nombrep"  style="color: black">Nombre ✏️</label></h5>
                        <input required name="id_producto" type="hidden" id="id_producto" value="<?php echo $result->id_producto; ?>" >
                        <input required name="nombreProducto" type="text" id="nombreProducto" value="<?php echo $result->nombre_producto; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                            <h5> <label for="precio"  style="color: black">Precio 💲  </label></h5>
                                <input type="number" id="quantity" required name="precio" value="<?php echo $result->precio_producto; ?>"  class="form-control-lg">
                            </div>
                            <div class="col-6">
                                <h5><label for="quantity"  style="color: black">Cantidad  🛒</label></h5>
                                <input type="number" id="quantity" required name="cantidad" value="<?php echo $result->cantidad_producto; ?>" class="form-control-lg">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class ="row">
                            <div clas="col-12">
                                <h5><label for="descripcion"  style="color: black">Descripcion ✏️</label></h5>
                                <textarea  required name="descripcion" id="descripcion" rows="4" cols="50" ><?php echo $result->descripcion_producto; ?></textarea> 
                            </div>
                            
                        </div>
                    </div>
                <button type="submit" class="btn btn-success">Actualizar Producto ✔️ </button>
                <a href="../../Vistas/Producto/Lista_Productos.php" class="btn btn-info">Ver Lista de Producto ➡</a>
            </form>   
        </div>
    </div>
</main>