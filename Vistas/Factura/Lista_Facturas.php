<?php
      include_once "../../Modelos/FacturaModel.php";
      include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Controladores/FacturaController.php";

      $c = new Coneccion();
      $coneccion = $c->ConeccionBD();  
      $factura = new FacturaController();
      $listaF = $factura->GetFacturas($coneccion);
      ob_start();   
      session_start();
      if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {
 
      }
      else{
         header("Location: ../../Index.php"); 
      }
?>
<?php include "../head.html"?>
    <div class="row">
        <div class="col-12">
        <br>
        <br>
        <h1 style="color: black">Lista De Ventas</h1>
        <br>
        <br>
            <div class="table table-responsive">
            <table class="table table-borderless" >
                <thead class="thead-dark" style="color: black">
                    <tr>
                        <th style="text-align: center">
                            ID
                        </th>
                        <th style="text-align: center">
                           Cliente
                        </th>
                        <th style="text-align: center">
                           Vendedor
                        </th>
                        <th style="text-align: center">
                           Producto
                        </th>
                    
                        <th style="text-align: center">
                            Cantidad Vendida
                        </th>
                        <th style="text-align: center">
                           Total
                        </th>
                        <th>
                           Fecha de Venta
                        </th>
                        <th style="text-align: center">

                        </th>
                         <th>

                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($listaF as $listaF){ ?>
                    <tr style="color: black" >
                        <td style="text-align: center">
                            <?php echo $listaF->id_factura?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $listaF->nombre_cliente ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $listaF->nombre_vendedor ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo $listaF->nombre_producto ?>
                        </td>
                        <td style="text-align: center">
                        <?php echo $listaF->cantidad_vendida ?>
                        </td>
                        <td style="text-align: center">
                        <?php echo  "$".$listaF->total_venta ?>
                        </td>
                        <td style="text-align: center">
                        <?php echo $listaF->fecha ?>
                        </td>
                        <td>                         
                        <form action="" method="post">
                            <?php 
                                if (isset($_POST['idf'])) {
                                    FacturaController::ElimarFactura($coneccion,$_POST['idf']);                                                               
                                }
                            ?>
                            <input type="hidden" required name="idf" value="<?php echo $listaF->id_factura?>">
                            <input type="submit" class="btn btn-danger"  name="accion" value="Eliminar 🗑️">
                        </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </div>
        </div>
    </div>
<?php include "../foot.html"?>