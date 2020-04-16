<?php
      include_once "../../Modelos/ClienteModel.php";
      include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Controladores/ClienteController.php";

      $c = new Coneccion();
      $coneccion = $c->ConeccionBD();  
      $Cliente = new ClienteController();
      $listaC = $Cliente->GetClientes($coneccion);
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
            <h1 style="color: black">Lista De Clientes</h1>
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
                                Nombre Cliente
                            </th>
                            <th>
                                Apellidos Clientes
                            </th>
                            <th>
                                Telefono
                            </th>
                            <th>

                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listaC as $listaC){ ?>
                        <tr style="color: black">
                            <td>
                                <?php echo $listaC->id_cliente?>
                            </td>
                            <td>
                                <?php echo $listaC->nombre_cliente ?>
                            </td>
                            <td>
                                <?php echo $listaC->apellidos_cliente ?>
                            </td>
                            <td>
                            <?php echo $listaC->telefono_cliente ?>
                            </td>
                            <td>
                            <a class="btn btn-warning" href="<?php echo "../../Vistas/Cliente/Editar_Cliente.php?id_cliente=" . $listaC->id_cliente?>"> Editar 📝 </a>
                            </td>
                            <td>                         
                            <form action="" method="post">
                                <?php 
                                    if (isset($_POST['idc'])) {
                                        ClienteController::ClienteEliminar($coneccion,$_POST['idc']);                                                               
                                    }
                                ?>
                                <input type="hidden" name="idc" value="<?php echo $listaC->id_cliente?>">
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