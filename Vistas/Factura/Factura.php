<?php include_once "../../Modelos/BD_coneccion.php";
     include_once "../../Modelos/FacturaModel.php";
     include_once "../../Controladores/FacturaController.php";
     $c = new Coneccion();
     $conection = $c->ConeccionBD(); 

        session_start();
     if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {

     }
     else{
        header("Location: ../../Index.php"); 
     }
?>

<?php include "../head.html" ?>

<main  role="main" class="container">
    <br>
    <br> 
    <div><h1> <span class="badge badge-primary">Facturacion</span></h1></div>
    <br>
    <form action="" method="POST">
      <?php     
        if (isset($_POST['cliente']) && isset($_POST['producto']) && isset($_POST['vendedor']) && isset($_POST['cantidad'])&&isset($_POST['calendar'])) {
         
          $cantidad = $_POST['cantidad'];
          $precioV = $_POST['precioVenta'];
          $ventaT = $cantidad * $precioV ;
        
         $factura= new FacturaModel($_POST['cliente'],$_POST['producto'],$_POST['vendedor'],$_POST['cantidad'],$ventaT,$_POST['calendar']);
          FacturaController::Facturar($conection,$factura);
        }
      ?>
    <div class="form-group"> 
            <div class="row">
                 <div class="col-sm-2">
                    <h4><a for="nombrep"  style="color: black"style="text-align: right"> 🧑 Cliente </a></h4>
                </div>
                <div class="col-sm-10">
                  <select  class="form-control" required name="cliente">
                    <?php
                        $query = $conection->prepare("SELECT *  FROM CLIENTE ");
                        $query->execute();
                   ?>
                   <?php foreach($query as $query): ?>
                     
                        <option value="<?php echo $query['id_cliente']?>"> <?php echo $query['nombre_cliente']?>  </option>
                      <?php endforeach ?>
                  </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-2">
                    <h4><a for="nombrep"  style="color: black" style="text-align: right"> 🧑Vendedor </a></h4>
                 </div>
                 <div class="col-sm-10">
                    <select required name="vendedor" class="form-control">
                    <?php
                                $query = $conection->prepare("SELECT *  FROM VENDEDOR ");
                                $query->execute();
                    ?>
                    <?php foreach($query as $query): ?>
                        <option value="<?php echo $query['id_vendedor']?>"> <?php echo $query['nombre_vendedor']?>  </option>
                    <?php endforeach ?>
                    </select>
                 </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-2">
                 <h4><a for="nombrep"  style="color: black"style="text-align: right" >📦 Producto  </a></h4>
                </div>
                <div class="col-sm-3">
                   <select class="form-control" required name="producto" id="producto">
                     <?php
                       $query = $conection->prepare("SELECT *  FROM PRODUCTO ");
                       $query->execute();
                     ?>
                     <?php foreach($query as $query): ?>
                    <option value="<?php echo $query['id_producto']?>"> <?php echo $query['nombre_producto']?>  </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-sm-3"  style="text-align: right">
                  <h5><a style="text-align: right">Precio de Venta 💲</a></h5>
                </div>
                <div class="col-sm-4">
                <input type="number" id="quantity"  required name="precioVenta" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-2" style="text-align: right">
                  <h5><label for="quantity"  style="color: black">Cantidad 🛒</label></h5>
               </div>
               <div class="col-sm-4">
               <input type="number" id="quantity"  requiered name="cantidad" class="form-control">
               </div>
               <div class="col-sm-2">
                 <h4><a style="text-align: right">Fecha 🗓</a></h4>
               </div>
               <div class="col-sm-4">
               <input type="date" required name="calendar" class="form-control">
               </div>
            </div>
        </div>
        <br>
       <div class="form-group">
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-8">
                <button type="submit" class="btn btn-success " >Facturar ✔️ </button>
                <a href="../../Vistas/Factura/Lista_Facturas.php" class="btn btn-info">Ver Facturas ➡</a>
                </div>
            </div>
       </div>
    </form>
</main>
<?php include "../foot.html" ?>