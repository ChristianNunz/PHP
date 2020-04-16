<?php
      include_once "../../Modelos/VendedorModel.php";
      include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Controladores/VendedorController.php";

      $c = new Coneccion();
      $coneccion = $c->ConeccionBD();  
      $vendedor = new VendedorController();
      $listaV = $vendedor->GetVendedores($coneccion);
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
        <h1 style="color: black">Lista De Vendedores</h1>
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
                            Nombre
                        </th>
                        <th>
                            Apellido 
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Usuario
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
                <?php foreach($listaV as $listaV){ ?>
                    <tr style="color: black">
                        <td>
                            <?php echo $listaV->id_vendedor?>
                        </td>
                        <td>
                            <?php echo $listaV->nombre_vendedor ?>
                        </td>
                        <td>
                            <?php echo $listaV->apellido_vendedor ?>
                        </td>
                        <td>
                        <?php echo $listaV->telefono_vendedor ?>
                        </td>
                        <td>
                        <?php echo $listaV->usuario ?>
                        </td>
                        <td>
                        <a class="btn btn-warning" href="<?php echo "../../Vistas/Vendedor/Editar_Vendedor.php?id_vendedor=" . $listaV->id_vendedor?>"> Editar 📝 </a>
                        </td>
                        <td>                         
                        <form action="" method="post">
                            <?php 
                                if (isset($_POST['idv'])) {
                                    $c = new Coneccion();
                                    $coneccion = $c->ConeccionBD();
                                    VendedorController::VendedorEliminar($coneccion,$_POST['idv']);                                                               
                                }
                            ?>
                            <input type="hidden" required name="idv" value="<?php echo $listaV->id_vendedor?>">
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