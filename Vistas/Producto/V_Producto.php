<?php
     include_once "../../Modelos/BD_coneccion.php";
     include_once "../../Modelos/ProductoModel.php";
     include_once "../../Controladores/ProductoController.php";
     
     $c = new Coneccion();
     $coneccion = $c->ConeccionBD(); 
     session_start();
     if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {

     }
     else{
        header("Location: ../../Index.php"); 
     }
?>
<?php include "../head.html" ?>
<main role="main" class="container">
<div class="row">
        <div class="col-12">
                <br>
                <br>
            <h1 style="color: black"> Agregar Producto</h1>
            <br><br>
            <form action="" method="POST">
                <?php 
                    if ( isset($_POST['nombreProducto']) && isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['descripcion'])) {       
                        $Producto = new ProductoModel($_POST['nombreProducto'],$_POST['precio'],$_POST['cantidad'],$_POST['descripcion']);                            
                        ProductoController::InsertarProducto($coneccion,$Producto);
                    }
                ?>
                    <div class="form-group">
                        <h5><label for="nombrep"  style="color: black">Nombre ✏️</label></h5>
                        <input required name="nombreProducto" type="text" id="nombreProducto" placeholder="Nombre de la Persona" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                            <h5> <label for="precio"  style="color: black">Precio 💲  </label></h5>
                                <input type="text" id="quantity" required name="precio"  class="form-control-lg">
                            </div>
                            <div class="col-6">
                                <h5><label for="quantity"  style="color: black">Cantidad  🛒</label></h5>
                                <input type="number" id="quantity" required name="cantidad" class="form-control-lg">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class ="row">
                            <div clas="col-12">
                                <h5><label for="descripcion"  style="color: black">Descripcion ✏️</label></h5>
                                <textarea  required name="descripcion" id="descripcion" rows="4" cols="50" ></textarea> 
                            </div>
                            
                        </div>
                    </div>
                <button type="submit" class="btn btn-success">Agregar Producto ✔️ </button>
                <a href="../../Vistas/Producto/Lista_Productos.php" class="btn btn-info">Ver Lista de Producto ➡</a>
            </form>   
        </div>
    </div> 
</main>
<?php  include "../foot.html"?>